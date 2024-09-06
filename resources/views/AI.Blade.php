<!-- Blade File (AI.blade.php) -->

<!-- Styles for Professional Design -->
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #f9f9f9;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .btn-home {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
        font-weight: bold;
    }
    .btn-Category {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
        font-weight: bold;
    }
    .upload-form {
        margin-bottom: 30px;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }
    input[type="text"], input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button[type="submit"] {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }
    button[type="submit"]:hover {
        background-color: #218838;
    }
    .message {
        font-size: 1.2em;
        font-weight: bold;
        color: green;
        margin-bottom: 20px;
        text-align: center;
    }
    .error {
        font-size: 1.2em;
        font-weight: bold;
        color: red;
        margin-bottom: 20px;
        text-align: center;
    }
    .uploaded-files {
        margin-top: 40px;
    }
    .uploaded-files img {
        width: 400px; /* Set initial image size */
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: transform 0.3s ease; /* Smooth transition for zoom effect */
    }
    .uploaded-files img:hover {
        transform: scale(1.2); /* Zoom effect on hover */
    }
    .uploaded-files p {
        font-size: 1em;
        margin-top: 10px;
    }
    .uploaded-file-item {
        margin-bottom: 30px;
        text-align: center;
    }
    .sequence-number {
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    
    <!-- Home Button at the Top -->
    <div class="header">
        <a href="{{ url('/home') }}" class="btn-home">Home</a>
        
    </div>
    <div class="header">
    <a href="{{ route('coursera.showButtons') }}" class="btn btn-Category">Category</a>
    </div>

    <!-- Show Success or Error Messages at the Top -->
    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="upload-form">
        @csrf

        <input type="hidden" name="category" value="AI">

        <div>
            <label for="file">Choose a file:</label>
            <input type="file" name="file" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" required>
        </div>

        <button type="submit">Upload</button>
    </form>

    <!-- Uploaded Files Section -->
    @if(isset($uploads) && count($uploads) > 0)
        <h3>Uploaded Files</h3>
        <div class="uploaded-files">
            @foreach ($uploads as $index => $upload)
                <div class="uploaded-file-item">
                    <div class="sequence-number">#{{ $index + 1 }}</div>
                    <img src="{{ asset($upload->image_path) }}" alt="Uploaded Image">
                    <p>{{ $upload->description }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
