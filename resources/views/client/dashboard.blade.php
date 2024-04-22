<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Clients List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">   
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Practitioner
                    </h2>
                    <br> 
                    @if ($practitioner)
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">First Name</th>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Last Name</th>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>                                </tr>
                            </thead>
                            <tbody class="dark:divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4">{{ $practitioner->first_name }}</td>
                                    <td class="px-6 py-4">{{ $practitioner->last_name }}</td>
                                    <td class="px-6 py-4">{{ $practitioner->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <div>No practitioner found.</div>
                    @endif
                </div>
            </div>

            @if ($practice)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900 dark:text-gray-100">   
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Practice
                        </h2>
                        <br> 
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                </tr>
                            </thead>
                            <tbody class="dark:divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4">{{ $practice->name }}</td>
                                    <td class="px-6 py-4">{{ $practice->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div>No practice found.</div>
            @endif

            @if ($fields1)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900 dark:text-gray-100">   
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Fields
                        </h2>
                        <br> 
                        <ul>
                            @foreach ($fields1 as $field)
                                <li>{{ $field->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div>No fields found.</div>
            @endif
        </div>
    </div>
</x-app-layout>
