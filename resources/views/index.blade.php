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
    <ul>
        @if(empty($events))
            <div>
                {{ __('Il n\'y a pas d\'évènements de créé, soyez le premier à en créer un !') }}
            </div>
        @endif
        @foreach($events as $event)
            <li>
                <!-- TODO : get user name from event -->
                <!-- TODO : get picture from event -->
                <div>{{ $event->title }}</div>
                <div>{{ $event->content }}</div>
                <div>@dump($event)</div>
            </li>
        @endforeach
    </ul>
</x-app-layout>
