<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pets List</h2>
    </x-slot>

    <div class="p-4">
        <a href="{{ route('pets.create') }}" class="bg-green-500 text-white rounded p-2">Add Pet</a>
        <ul class="mt-4 space-y-2">
            @foreach($pets as $pet)
                <li class="bg-white rounded p-3 flex justify-between items-center">
                    <span>{{ $pet->name }} ({{ $pet->species }})</span>
                    <div class="space-x-2">
                        <a href="{{ route('pets.show', $pet) }}" class="text-blue-500">View</a> |
                        <a href="{{ route('pets.edit', $pet) }}" class="text-yellow-500">Edit</a> |
                        <form method="POST" action="{{ route('pets.destroy', $pet) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
