<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Editar Endpoint  {$endpoint->endpoint}") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-alerts/>

                    <form class="max-w-sm mx-auto" action={{ route('endpoints.update', [$site->id, $endpoint->id]) }} method="POST">
                        @method('PUT')
                        @include('admin/endpoints/partials/form')
                    </form>

                    <form action="{{ route('endpoints.destroy', [$site->id, $endpoint->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 bg-red-700 focus:ring-red-900 p-2">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
