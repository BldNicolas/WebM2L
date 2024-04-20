<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('events.store') }}">
            @csrf
            <textarea
                name="title"
                placeholder="{{ __('Titre de l\'évènement') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('title') }}</textarea>
            <textarea
                name="content"
                placeholder="{{ __('Contenu de l\'évènement') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Event') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
