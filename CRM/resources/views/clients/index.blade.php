@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Clients List</h1>
            <a href="{{ route('clients.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">Create Client</a>
        </div>

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100 text-left text-sm uppercase">
                <tr>
                    <th class="px-6 py-3 font-medium">Company</th>
                    <th class="px-6 py-3 font-medium">VAT</th>
                    <th class="px-6 py-3 font-medium">Address</th>
                    <th class="px-6 py-3 font-medium">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $client->company }}</td>
                        <td class="px-6 py-4">{{ $client->vat }}</td>
                        <td class="px-6 py-4">{{ $client->address }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('clients.edit', $client) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded mr-2">Edit</a>
                            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($clients->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center px-6 py-4 text-gray-500">No clients found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
