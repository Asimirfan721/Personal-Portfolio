@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $personalStatement->title }}</h2>
        <p>{{ $personalStatement->content }}</p>
        <a href="{{ route('personal_statements.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
