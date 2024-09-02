<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($category) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function previewFile() {
            const fileInput = document.querySelector('#file');
            const file = fileInput.files[0];
            const previewImage = document.querySelector('#preview-image');
            const previewPdf = document.querySelector('#preview-pdf');
            const descriptionBox = document.querySelector('#description');

            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    if (file.type.includes('pdf')) {
                        previewImage.style.display = 'none';
                        previewPdf.style.display = 'block';
                        previewPdf.src = event.target.result;
                    } else if (file.type.includes('image')) {
                        previewPdf.style.display = 'none';
                        previewImage.style.display = 'block';
                        previewImage.src = event.target.result;
                    }
                };

                reader.readAsDataURL(file);
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
            <div id="file-preview">
                @if (isset($imagePath))
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

        <!-- Preview Elements -->
        <div id="preview" class="mt-4">
            <img id="preview-image" style="display:none;" class="img-fluid" alt="Preview Image">
            <iframe id="preview-pdf" style="display:none;" width="100%" height="600px"></iframe>
        </div>
    </div>
</body>
</html>
