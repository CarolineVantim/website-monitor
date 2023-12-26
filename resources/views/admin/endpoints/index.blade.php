<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mx-4">
                {{ __("Endpoints {$site->url}") }}
            </h2>
            <a type="button" href="{{ route('sites.create') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 px-4 ml-4">+</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="relative overflow-x-asuto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-alerts/>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="stext-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-6">Endpoints</th>
                                <th scope="col" class="px-6 py-6">Frequencia</th>
                                <th scope="col" class="px-6 py-6">Próxima verifição</th>
                                <th scope="col" class="px-6 py-6">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($endpoints as $endpoint)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $endpoint->endpoint }}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $endpoint->frequency }}</td>
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $endpoint->next_check }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('sites.edit', $site->id) }}">Editar</a>
                                        <a href="{{ route('endpoints.index', $site->id) }}">Endpoints</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
