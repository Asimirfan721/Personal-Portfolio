<!-- filepath: resources/views/AI.Blade.php -->
<!-- Redesigned AI.blade.php with register page color scheme -->

<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: linear-gradient(120deg, #e9eef3 0%, #74b9ff 100%);
        color: #222;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 900px;
        margin: 40px auto;
        padding: 32px 28px 28px 28px;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 4px 32px rgba(60,72,88,0.12), 0 1.5px 4px rgba(60,72,88,0.07);
    }
    .header {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-bottom: 18px;
    }
    .btn-home, .btn-Category, .btn-add-category {
        display: inline-block;
        padding: 10px 22px;
        background: #0984e3;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 500;
        font-size: 1em;
        border: none;
        transition: background 0.2s;
        box-shadow: 0 1px 4px rgba(60,72,88,0.07);
    }
    .btn-home:hover, .btn-Category:hover, .btn-add-category:hover {
        background: #74b9ff;
        color: #222;
    }
    .btn-add-category {
        background: #6abf69;
        margin-left: auto;
    }
    .btn-add-category:hover {
        background: #4e9e4e;
        color: #fff;
    }
    .section-title {
        font-size: 1.6em;
        font-weight: 600;
        margin-bottom: 18px;
        color: #0984e3;
        letter-spacing: 0.5px;
    }
    .upload-form {
        background: #f4f6f8;
        border: 1px solid #cfd8dc;
        border-radius: 12px;
        padding: 24px 20px 18px 20px;
        margin-bottom: 36px;
        box-shadow: 0 1px 4px rgba(60,72,88,0.04);
    }
    label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
        color: #0984e3;
    }
    input[type="text"], input[type="file"], select {
        width: 100%;
        padding: 10px;
        margin-bottom: 14px;
        border: 1px solid #cfd8dc;
        border-radius: 8px;
        background: #e9eef3;
        color: #222;
        font-size: 1em;
    }
    button[type="submit"] {
        background: #0984e3;
        color: #fff;
        padding: 10px 28px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 1em;
        transition: background 0.2s;
        margin-top: 6px;
    }
    button[type="submit"]:hover {
        background: #74b9ff;
        color: #222;
    }
    .message, .error {
        font-size: 1.1em;
        font-weight: 500;
        margin-bottom: 18px;
        text-align: center;
        border-radius: 8px;
        padding: 10px 0;
    }
    .message {
        color: #2e7d32;
        background: #e8f5e9;
        border: 1px solid #b2dfdb;
    }
    .error {
        color: #b71c1c;
        background: #ffebee;
        border: 1px solid #ffcdd2;
    }
    .uploaded-files {
        margin-top: 18px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 28px;
    }
    .uploaded-file-item {
        background: #f4f6f8;
        border: 1px solid #cfd8dc;
        border-radius: 12px;
        padding: 18px 12px 12px 12px;
        text-align: center;
        box-shadow: 0 1px 4px rgba(60,72,88,0.04);
        transition: box-shadow 0.2s;
    }
    .uploaded-file-item:hover {
        box-shadow: 0 4px 16px rgba(60,72,88,0.10);
    }
    .sequence-number {
        font-weight: bold;
        font-size: 1.1em;
        margin-bottom: 10px;
        color: #0984e3;
    }
    .uploaded-files img {
        width: 100%;
        max-width: 220px;
        border: 2px solid #74b9ff;
        border-radius: 10px;
        margin-bottom: 10px;
        transition: transform 0.3s;
        background: #fff;
    }
    .uploaded-files img:hover {
        transform: scale(1.08);
    }
    .uploaded-files p {
        font-size: 1em;
        margin-top: 8px;
        color: #333;
        word-break: break-word;
    }
    .uploaded-files a {
        color: #0984e3;
        text-decoration: underline;
        font-size: 1em;
    }
</style>

<div class="container">
    <div class="header">
        <a href="{{ url('/home') }}" class="btn-home">Home</a>
        <a href="{{ route('coursera.showButtons') }}" class="btn-Category">Categories</a>
        <a href="{{ url('/categories') }}" class="btn-add-category">Add Category</a>
    </div>

    <div class="section-title">Upload a File</div>

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
        <div>
            <label for="category_id">Select Category:</label>
            <select name="category_id" required>
                <option value="">-- Choose Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
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

    @if(isset($uploads) && count($uploads) > 0)
        <div class="section-title" style="margin-top: 30px; color: #0984e3;">Uploaded Files</div>
        <div class="uploaded-files">
            @php
                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            @endphp
            @foreach ($uploads as $index => $upload)
                <div class="uploaded-file-item">
                    <div class="sequence-number">#{{ $index + 1 }}</div>
                    @if(in_array(strtolower(pathinfo($upload->image_path, PATHINFO_EXTENSION)), $imageExtensions))
                        <img src="{{ asset('storage/' . $upload->image_path) }}" alt="Uploaded Image">
                    @else
                        <a href="{{ asset('storage/' . $upload->image_path) }}" target="_blank">View File</a>
                    @endif
                    <p>{{ $upload->description }}</p>
                    @if ($upload->category)
                        <p style="color:#0984e3; font-size:0.98em; margin-top:2px;">
                            Category: {{ $upload->category->name }}
                        </p>
                    @else
                        <p style="color:gray; font-size:0.95em; margin-top:2px;">
                            Category: Not Assigned
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>