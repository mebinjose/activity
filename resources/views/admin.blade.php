<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-auto">
                {{ __('Admin') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($activities as $activity)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="view_{{$activity->id}}">
                    {{$activity->activity}}
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400 cursor-pointer float-right" stroke="currentColor"
                        viewBox="0 0 24 24" onclick="toggleEdit({{$activity->id}})">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>

                <div class="flex p-6 bg-white border-b border-gray-200 bg-grey-500" id="edit_{{$activity->id}}"
                    style="display: none">
                    <form method="POST" action="{{route('delete', ['id' => $activity->id])}}">
                        @csrf
                        <span>Are you sure ??</span>
                        <button type="submit"
                            class="py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                            Delete
                        </button>
                    </form>
                    <svg class="float-right flex-shrink-0 h-5 w-5 text-gray-400 cursor-pointer"
                        onclick="closeEdit({{$activity->id}})" stroke="currentColor" viewBox="0 0 20 20">
                        <path stroke-width="1.2"
                            d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                        </path>
                    </svg>
                </div>

            </div>
            @endforeach
            {{ $activities->links() }}
        </div>
    </div>

    @include('layouts.notification')
</x-app-layout>

@include('layouts.toggle_script')