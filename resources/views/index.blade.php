<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maison des ligues') }}
        </h1>
    </x-slot>
    @if(!$user)
        <h2>{{ __('Inscrivez vous pour publier votre annonce.') }}</h2>
        <h3>{{ __('Déjà membre ? Connectez vous !') }}</h3>
        <div>
            <a href="{{ route('register') }}">{{ __('Inscription') }}</a>
            <a href="{{ route('login') }}">{{ __('Connexion') }}</a>
        </div>
    @else
        <h2>{{ __('Bienvenue') }} {{ $user->first_name }} {{ $user->last_name }}</h2>
        <h3>{{ __('Accéder à mon profil') }}</h3>
        <a href="{{ route('profile.edit') }}">{{ __('Mon profil') }}</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Déconnexion') }}
            </x-dropdown-link>
        </form>
    @endif
    <h2>{{ __('Prêt(e) à vous lancer dans la compétition ?') }}</h2>
    <h3>{{ __('Voici les évènements disponibles :') }}</h3>
    @if(empty($events[0]))
        <div>
            {{ __('Il n\'y a pas d\'évènements de créé, soyez le premier à en créer un !') }}
        </div>
    @else
        <ul>
            @foreach($events as $event)
                <li class="p-5 bg">
                    <div>{{ $event->user->first_name }} {{ $event->user->last_name }}</div>
                    <!-- TODO : get picture from event -->
                    <div>{{ $event->title }}</div>
                    <div>{{ $event->content }}</div>
                </li>
            @endforeach
        </ul>
    @endif
</x-app-layout>
