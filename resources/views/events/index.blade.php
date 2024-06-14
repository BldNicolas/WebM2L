<ul class="flex flex-col gap-6 px-12">
    @foreach($events as $event)
        <li class="flex flex-col gap-2.5 py-2.5">
            <div class="flex gap-3">
                <!-- TODO : get picture from event -->
                <div class="w-24 h-24 rounded-full border-4 border-white bg-default-bg bg-cover text-7xl leading-inherit text-center content-center">
                    {{ strtoupper(mb_substr($event->title, 0, 1)) }}
                </div>
                <div class="flex flex-col gap-2.5">
                    <div>{{ $event->user->first_name }} {{ $event->user->last_name }}</div>
                    <div class="text-5xl">{{ $event->title }}</div>
                </div>
            </div>
            <div>{{ $event->content }}</div>
        </li>
        @if(count($events)>1)
            <hr class="border-two">
        @endif
    @endforeach
</ul>
