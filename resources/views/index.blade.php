<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maison des ligues') }}
        </h1>
    </x-slot>
    <div class="flex flex-col items-center gap-20 p-24">
    @if(!$user)
        <h2>{{ __('Inscrivez vous pour publier votre annonce.') }}</h2>
        <h3>{{ __('Déjà membre ? Connectez vous !') }}</h3>
        <div>
            <a href="{{ route('register') }}">{{ __('Inscription') }}</a>
            <a href="{{ route('login') }}">{{ __('Connexion') }}</a>
        </div>
    @else
            <div class="flex flex-col gap-2.5">
                <h2 class="text-7xl text-three">{{ __('Bienvenue') }} {{ $user->first_name }} {{ $user->last_name }}</h2>
                <h3 class="text-5xl text-three">{{ __('Accéder à mon profil') }}</h3>
            </div>
            <div class="flex items-center gap-32">
                <a href="{{ route('profile.edit') }}" class="flex justify-center p-2.5 min-w-48 rounded-xl border-2 border-three text-three">{{ __('Mon profil') }}</a>
                <form method="POST" action="{{ route('logout') }}" class="flex justify-center p-2.5 min-w-48 rounded-xl border-2 border-three">
                    @csrf
                    <a href="route('logout')"
                                     onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="text-three">
                        {{ __('Déconnexion') }}
                    </a>
                </form>
                <a href="{{ route('events.create') }}" class="flex justify-center p-2.5 min-w-48 rounded-xl border-2 border-three text-three">{{ __('Nouvel évènement') }}</a>
            </div>
    @endif
    </div>
    <div class="flex flex-col gap-20 p-24 bg-three text-white">
        <div class="flex flex-col items-center gap-2.5">
            <h2 class="text-7xl text-center">{{ __('Prêt(e) à vous lancer dans la compétition ?') }}</h2>
            <h3 class="text-5xl text-center">{{ __('Voici les évènements disponibles :') }}</h3>
        </div>
        @if(empty($events[0]))
        <div class="flex flex-col gap-6 px-12">
                {{ __('Il n\'y a pas d\'évènements de créé, soyez le premier à en créer un !') }}
        </div>
        @else
            @include('events.index')
        @endif
        </div>
    </div>
</x-app-layout>
