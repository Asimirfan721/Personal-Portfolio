<!-- Blade File (AI.blade.php) -->

<!-- Styles for Dark Theme -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #000; /* Black background */
        color: #fff; /* White text */
        margin: 0;
        padding: 0;
    } 
    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #444;
        border-radius: 10px;
        background-color: #111; /* Slightly lighter    black */
        box-shadow: 0px 0px 10px #222;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .btn-home, .btn-Category {
        display: inline-block;
        padding: 10px 20px;
        background-color: #ff0000; /* Bright red for buttons */
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    .btn-home:hover, .btn-Category:hover {
        background-color: #cc0000; /* Darker red on hover */
    }
    .upload-form {
        margin-bottom: 30px;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
        color: #ff0000; /* Red for labels */
    }
    input[type="text"], input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #555;
        border-radius: 5px;
        background-color: #222; /* Darker input background */
        color: #fff; /* White text in inputs */
    }
    button[type="submit"] {
        background-color: #ff0000; /* Bright red for submit button */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    button[type="submit"]:hover {
        background-color: #cc0000; /* Darker red on hover */
    }
    .message, .error {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }
    .message {
        color: #00ff00; /* Green for success messages */
    }
    .error {
        color: #ff0000; /* Red for error messages */
    }
    .uploaded-files {
        margin-top: 40px;
    }
    .uploaded-files img {
        width: 400px; /* Set initial image size */
        border: 1px solid #444;
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
        color: #ff0000; /* Red for sequence numbers */
    }
</style>

<div class="container">
    <!-- Home Button -->
    <div class="header">
        <a href="{{ url('/home') }}" class="btn-home">Home</a>
    </div>

    <!-- Category Button -->
    <div class="header">
        <a href="{{ route('coursera.showButtons') }}" class="btn-Category">Category</a>
    </div>

    <!-- Messages -->
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

    <!-- Upload Form -->
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

    <!-- Uploaded Files -->
    @if(isset($uploads) && count($uploads) > 0)
        <h3 style="color: #ff0000;">Uploaded Files</h3>
        <div class="uploaded-files">
            @foreach ($uploads as $index => $upload)
                <div class="uploaded-file-item">
                    <div class="sequence-number">#{{ $index + 1 }}
                        </div><img src="{{ url($upload->image_path) }}" alt="Uploaded Image">


                    <p>{{ $upload->description }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
