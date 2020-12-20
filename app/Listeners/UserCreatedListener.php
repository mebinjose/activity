<?php

namespace App\Listeners;

use App\Mail\WelcomeMail;
use App\Models\Activity;
use App\Traits\CommonFunctions;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Action;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserCreatedListener
{
    use CommonFunctions;
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $type = $event->user->type;
        $url = config('constants.BORED_API_URL').'?type='.$type;
        $arr = [];
        for($i = 0; $i < 10; $i++){
            $data = $this->curl($url);
            array_push($arr, [
                'user_id' => $event->user->id,
                'activity' => json_decode($data)->activity,
                'data' => $data]
            );
        }
        Activity::insert($arr);

        Mail::to($event->user->email)->send(new WelcomeMail($event->user));
    }
}
