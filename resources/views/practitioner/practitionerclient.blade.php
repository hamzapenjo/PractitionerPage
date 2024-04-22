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
                    @if ($clients->isEmpty())
                        <div>No clients found.</div>
                    @else
                        <a href="{{ route('add-client') }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">New Client</a>
                        <br><br>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">First Name</th>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Last Name</th>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"></th>
                                    <th class="px-6 py-3 text-left text-m font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"></th>
                                </tr>
                            </thead>
                            <tbody class=" dark:divide-gray-700">
                                @foreach($clients as $client)
                                    <tr>
                                        <td class="px-6 py-4">{{ $client->first_name }}</td>
                                        <td class="px-6 py-4">{{ $client->last_name }}</td>
                                        <td class="px-6 py-4">{{ $client->email }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('client-show', ['id' => $client->id]) }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">View</a>
                                            <a href="{{ route('edit-client', ['id' => $client->id]) }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300">Edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form name="delete-client" id="delete-client" method="post" action="{{route('delete-client', ['id'=> $client->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button>Delete</button>
                                            </form>
                                        </td>
                                    
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
