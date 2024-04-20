<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Clients Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-3">{{ $practice->name }}</h3>
                    <p class="text-gray-500 dark:text-gray-300 mb-3">{{ $practice->description }}</p>
                    <ul>
                        @foreach ($fields as $field)
                            <li class="mb-3">
                                <span class="font-medium text-gray-500 dark:text-gray-300">{{ $field->name }}: </span>{{ $field->value }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
