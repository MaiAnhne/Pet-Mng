@extends('layouts.app')

@section('content')
<h1>Pets List</h1>
<a href="{{ route('pets.create') }}" class="btn btn-success">Add Pet</a>
<ul>
    @foreach($pets as $pet)
        <li>
            {{ $pet->name }} ({{ $pet->species }})
            <a href="{{ route('pets.show', $pet) }}">View</a> |
            <a href="{{ route('pets.edit', $pet) }}">Edit</a> |
            <form method="POST" action="{{ route('pets.destroy', $pet) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
