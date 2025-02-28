<!-- Blade File (CS.blade.php) -->

<!-- Styles for Redesigned Professional Design -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #000; /* Black background */
        color: #fff; /* White text */
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;   
        background-color: #111; /* Slightly lighter black for contrast */
        box-shadow: 0 0 10px rgba(255, 0, 0, 0.5); /* Red glow effect */
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
        background-color: #000; /* Black button */
        color: #fff; /* White text */
        border: 2px solid red; /* Red border */
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-home:hover, .btn-Category:hover {
        background-color: red;
        color: #000; /* Black text on hover */
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
        background-color: #222; /* Dark input background */
        color: #fff; /* White text */
    }

    button[type="submit"] {
        background-color: red; /* Red button */
        color: #fff; /* White text */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #fff; /* White background */
        color: red; /* Red text on hover */
    }

    .message, .error {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .message {
        color: green;
    }

    .error {
        color: red;
    }

    .uploaded-files {
        margin-top: 40px;
    }

    .uploaded-files img {
        width: 400px; /* Set initial image size */
        border: 2px solid red;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .uploaded-files img:hover {
        transform: scale(1.2); /* Zoom effect on hover */
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.8); /* Red glow */
    }

    .uploaded-files p {
        font-size: 1em;
        margin-top: 10px;
        color: #fff; /* White text */
    }

    .uploaded-file-item {
        margin-bottom: 30px;
        text-align: center;
    }

    .sequence-number {
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: 10px;
        color: red; /* Red sequence number */
    }
</style>

<div class="container">
    <!-- Home Button at the Top -->
    <div class="header">
        <a href="{{ url('/home') }}" class="btn-home">Home</a>
     </div>
    <div class="header">
        <a href="{{ route('coursera.showButtons') }}" class="btn-Category">Category</a>
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

    <!-- Upload Form -->
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="upload-form">
        @csrf

        <input type="hidden" name="category" value="CS"> <!-- Pass CS category -->

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
                    <img src="{{ url($upload->image_path) }}" alt="Uploaded Image">

                    <p>{{ $upload->description }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
