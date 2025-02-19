@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Personal Statements</h2>
        <a href="{{ route('personal_statements.create') }}" class="btn btn-primary">Create New</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul>
            @foreach($statements as $statement)
                <li>
                    <a href="{{ route('personal_statements.show', $statement->id) }}">{{ $statement->title }}</a>
                    <a href="{{ route('personal_statements.edit', $statement->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('personal_statements.destroy', $statement->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
