@extends('layouts.app')

@section('content')
<h1>Owners List</h1>
<a href="{{ route('owners.create') }}" class="btn btn-success">Add Owner</a>
<ul>
    @foreach($owners as $owner)
        <li>
            {{ $owner->name }} - {{ $owner->email }}
            <a href="{{ route('owners.show', $owner) }}">View</a> |
            <a href="{{ route('owners.edit', $owner) }}">Edit</a> |
            <form method="POST" action="{{ route('owners.destroy', $owner) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
