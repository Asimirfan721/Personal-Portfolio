<!DOCTYPE html>
<html>
<head>
    <title>Personal Statement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border: 1px solid #ff0000;
        }
        h1 {
            color: #ff0000;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-secondary, .btn-primary {
            background-color: #ff0000;
            border: none;
            color: #ffffff;
        }
        .btn-secondary:hover, .btn-primary:hover {
            background-color: #cc0000;
        }
        .form-label {
            color: #ffffff;
        }
        .form-control {
            background-color: #2c2c2c;
            border: 1px solid #ff0000;
            color: #ffffff;
        }
        .form-control::placeholder {
            color: #cccccc;
        }
        .form-control:focus {
            background-color: #2c2c2c;
            border-color: #ff0000;
            color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25);
        }  
        .alert-success {
            background-color: #1e4620;
            border-color: #28a745;
            color: #ffffff;
        }
        .alert-danger {
            background-color: #4a1e1e;
            border-color: #ff0000;
            color: #ffffff;
        }
        .sop-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        .sop-button {
            padding: 10px 15px;
            background: #ff0000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <a href="{{ url('/home') }}" class="btn btn-secondary mb-3">Home</a>
        <h1>Personal Statement</h1>
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="sop-buttons">
            @foreach ($statements as $sop)
                <a href="{{ route('personal-statement.edit', $sop->id) }}" class="sop-button">{{ $sop->title }}</a>
            @endforeach
        </div>

        <a href="{{ route('personal-statement.create') }}" class="btn btn-primary w-100 mt-3">Create New SOP</a>

        @if(isset($sop))
            <form method="POST" action="{{ route('personal-statement.update', $sop->id) }}" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $sop->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Your Statement of Purpose</label>
                    <textarea name="content" class="form-control" rows="10" placeholder="Write your statement here...">{{ $sop->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update SOP</button>
            </form>

            <form method="POST" action="{{ route('personal-statement.destroy', $sop->id) }}" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">Delete SOP</button>
            </form>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>