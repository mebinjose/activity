<div x-data="{isShow: @if(Session::get('message')==true) true @else false @endif}">
    <div x-show="isShow" class="absolute top-0 right-0 m-3 w-2/3 md:w-1/3"
        x-transition:enter="transition transform ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition transform ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1">
        <div class="bg-white border-gray-300 border p-3 flex items-start shadow-lg rounded-md space-x-2">
            <div class="flex-1 space-y-1">
                <p class="text-base leading-6 font-medium text-gray-700">{{Session::get('content')}}</p>
            </div>
            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 cursor-pointer" x-on:click="isShow = false"
                stroke="currentColor" viewBox="0 0 20 20">
                <path stroke-width="1.2"
                    d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                </path>
            </svg>
        </div>
    </div>
</div>