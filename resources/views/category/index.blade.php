@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Category</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Enter category name" class="form-control mb-3" required>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>

    <hr>

    <h4>All Categories</h4>
    <ul>
        @foreach($categories as $cat)
            <li>{{ $cat->name }}</li>
        @endforeach
    </ul>
</div>
@endsection
