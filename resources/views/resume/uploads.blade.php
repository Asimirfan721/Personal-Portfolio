@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resume Upload</h1>
    <form method="POST" action="{{ route('resume.upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <h2 class="mt-5">Uploaded Files</h2>
    <ul>
        @foreach($uploads as $upload)
            <li>
                <a href="{{ asset('storage/' . $upload->file_path) }}" target="_blank">
                    {{ $upload->file_path }}
                </a> - {{ $upload->description }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
