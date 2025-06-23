<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($category) ? ucfirst($category) . ' Upload' : 'Upload' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="{{ ('/home') }}" class="btn btn-secondary">Home</a>
        <h1>Upload {{ isset($category) ? ucfirst($category) : 'Default' }} File</h1>
        

        <!-- Upload Form -->
        <form method="POST" action="{{ route('coursera.upload', ['category' => isset($category) ? $category : 'default']) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Upload Image or PDF</label>
                <input type="file" name="file" id="file" class="form-control" accept="image/*,.pdf">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
                 <div>
    <label for="category">Select Category:</label>
    <select name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

        </form>
              
        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
     </div>
</body>
</html> 
