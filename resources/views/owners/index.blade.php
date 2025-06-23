<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Owners List</h2>
    </x-slot>

    <div class="p-4">
        <a href="{{ route('owners.create') }}" class="bg-green-500 text-white rounded p-2">Add Owner</a>
        <ul class="mt-4 space-y-2">
            @foreach($owners as $owner)
                <li class="bg-white rounded p-3 flex justify-between items-center">
                    <span>{{ $owner->name }} - {{ $owner->email }}</span>
                    <div class="space-x-2">
                        <a href="{{ route('owners.show', $owner) }}" class="text-blue-500">View</a> |
                        <a href="{{ route('owners.edit', $owner) }}" class="text-yellow-500">Edit</a> |
                        <form method="POST" action="{{ route('owners.destroy', $owner) }}" class="inline">
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
