<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvel évènement') }}
        </h1>
    </x-slot>

    <form method="POST" action="{{ route('events.store') }}" class="py-20 px-96 w-full flex flex-col gap-3.5 items-center">
        @csrf
        <div class="w-full">
            <div>{{ __('Titre de l\'évènement :') }}</div>
            <textarea
                name="title"
                placeholder="{{ __('Votre titre de l\'évènement') }}"
                class="p-2 rounded-xl resize-none h-11 w-full border-three"
            >{{ old('title') }}</textarea>
        </div>
        <div class="w-full">
            <div>{{ __('Contenu de l\'évènement :') }}</div>
            <textarea
                name="content"
                placeholder="{{ __('Votre contenu de l\'évènement') }}"
                class="p-2 rounded-xl resize-none h-auto w-full border-three"
            >{{ old('content') }}</textarea>
        </div>
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button>{{ __('Ajouter l\'évènement') }}</x-primary-button>
    </form>
</x-app-layout>
