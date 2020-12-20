<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Traits\CommonFunctions;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    use CommonFunctions;

    public function home(){
        if(auth()->guest()){
            return view('welcome');    
        }
        return redirect(route('dashboard'));
    }

    public function activities() {
        $activities = Activity::select('id', 'user_id', 'activity')->where('user_id', auth()->id())->paginate(3);
        return view('dashboard', compact('activities'));
    }

    public function fetchMore(){
        $authUser = auth()->user();        

        $isFetchedToday = isset($authUser->fetched_at) ? Carbon::parse($authUser->fetched_at)->isToday() : false;

        if (!$isFetchedToday || $authUser->fetched_count < config('constants.FETCH_LIMIT')){
            $url = config('constants.BORED_API_URL').'?type='.$authUser->type;
            $data = $this->curl($url);    
            Activity::create([
                'user_id' => $authUser->id,
                'activity' => json_decode($data)->activity,
                'data' => $data
            ]);

            $fetchedCount = 1;
            if($isFetchedToday){
                $fetchedCount = $authUser->fetched_count + 1;
            }
            User::where('id', $authUser->id)->update([
                'fetched_at' => Carbon::now(),
                'fetched_count' => $fetchedCount
            ]);
            return back()->with(['message' => true, 'content' => 'Successfully fetched!']);
        }
        return back()->with(['message' => true, 'content' => 'You have already reached your fetching limit for the day!!']);
    }

    public function update($id, Request $request){
        $activity = Activity::where('user_id', auth()->id())->where('id', $id)->first();
        if($activity){
            if(strlen($request->activity) == 0){
                return back()->with(['message' => true, 'content' => 'Cannot store empty value']);    
            }
            $activity->update(['activity' => $request->activity]);
            return back()->with(['message' => true, 'content' => 'Updated successfully']);
        }
        abort(403);
    }

    public function admin(Request $request){
        $activities = Activity::select('id', 'user_id', 'activity')->paginate(3);
        return view('admin', compact('activities'));
    }

    public function delete($id, Request $request){
        Activity::where('id', $id)->delete();
        return back()->with(['message' => true, 'content' => 'Deleted successfully']);   
    }
}
