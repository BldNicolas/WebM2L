<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créer un évènement
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ action([\App\Http\Controllers\EventController::class, 'store']) }}" method="POST">
                        @csrf
                        <label for="">Titre :</label>
                        <input type="text" name="Title" id="title">
                        <label for="">Content :</label>
                        <input type="text" name="Content" id="content">

                        <button type="submit"> Fromage </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
