@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Upload Your Resume</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('resume.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Select File (PDF/Image)</label>
            <input type="file" name="file" id="file" class="form-control" required>
            @error('file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter a brief description" required>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <h2 class="mt-5">Uploaded Files</h2>
    <ul class="list-group">
        @foreach ($files as $file)
            <li class="list-group-item">
                <a href="{{ asset('storage/' . $file) }}" target="_blank">{{ basename($file) }}</a>
                <p>{{ $descriptions[$file] ?? '' }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection
