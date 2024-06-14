<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrer') }}
        </h2>
    </x-slot>

    <div class="flex flex-col p-5 px-96">
        @if(empty($events[0]))
            <div>
                {{ __('Il n\'y a pas d\'évènement de créé.') }}
            </div>
        @else
            <h2 class="text-7xl text-three">{{ __('Liste des évènements :') }}</h2>
            <ul>
                @foreach($events as $event)
                    <li class="p-5 bg flex flex-col">
                        <div>{{ $event->user->first_name }} {{ $event->user->last_name }}</div>
                        <!-- TODO : get picture from event -->
                        <div>{{ $event->title }}</div>
                        <div>{{ $event->content }}</div>
                        <form method="POST" action="{{ route('events.destroy', $event) }}" class="flex justify-center p-2.5 w-80 rounded-xl border-2 border-three">
                            @csrf
                            @method('delete')
                            <a href="route('events.destroy', $event" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Supprimer l\'évènement') }}</a>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="flex flex-col p-5 px-96">
        @if(empty($users))
            <div>
                {{ __('Il n\'y a pas d\'utilisateur') }}
            </div>
        @else
            <h2 class="text-7xl text-three">{{ __('Liste des utilisateurs :') }}</h2>
            <ul>
                @foreach($users as $user)
                    <li class="p-5 bg">
                        <div>{{ __('Nom :') }} {{ $user->first_name }}</div>
                        <div>{{ __('Prénom :')}} {{ $user->last_name }}</div>
                        <div>{{ __('Date de naissance :') }} {{ $user->birth_date }}</div>
                        <div>{{ __('Ville :') }} {{ $user->city }}</div>
                        <div>{{ __('Adresse mail :') }} {{ $user->email }}</div>
                        <div>{{ __('Créé à :') }} {{ $user->created_at }}</div>
                        <div>{{ __('Dernière modification :') }} {{ $user->updated_at }}</div>
                        <!-- TODO : get picture from user -->
                        <!-- TODO : delete user -->
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
