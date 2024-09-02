<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($category) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function previewFile() {
            const fileInput = document.getElementById('file');
            const preview = document.getElementById('preview');
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                if (file.type.startsWith('image/')) {
                    preview.innerHTML = '<img src="' + reader.result + '" alt="Image Preview" class="img-fluid">';
                } else if (file.type === 'application/pdf') {
                    preview.innerHTML = '<a href="' + reader.result + '" target="_blank">View PDF</a>';
                }
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1>{{ ucfirst($category) }}</h1>

        <!-- Upload Form -->
        <form method="POST" action="{{ route('coursera.uploadFile', ['category' => $category]) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Upload Image or PDF</label>
                <input type="file" name="file" id="file" class="form-control" accept="image/*,.pdf" onchange="previewFile()">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $description ?? '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        <!-- Display Uploaded File -->
        <div class="mt-4">
            @if (!empty($imagePath))
                @if (Str::endsWith($imagePath, '.pdf'))
                    <a href="{{ asset($imagePath) }}" target="_blank">View Uploaded PDF</a>
                @else
                    <img src="{{ asset($imagePath) }}" alt="Uploaded Image" class="img-fluid">
                @endif
                <p class="mt-3">{{ $description ?? 'No description available.' }}</p>
            @else
                <p>No file uploaded.</p>
            @endif
        </div>
    </div>
</body>
</html>
