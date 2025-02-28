<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image Upload</title>
</head>
<body>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Upload</button>
    </form>

    <h2>Uploaded Images:</h2>
    @foreach($images as $image)
        <img src="{{ asset($image->image_path) }}" width="200px">
    @endforeach
</body>
</html>
