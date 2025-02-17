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
        .btn-secondary {
            background-color: #ff0000;
            border: none;
            color: #ffffff;
        }
        .btn-secondary:hover {
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
        .btn-primary {
            background-color: #ff0000;
            border: none;
        }
        .btn-primary:hover {
            background-color: #cc0000;
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
        .create-button {
            background: green;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Personal Statement</h1>

        <!-- Home Button -->
        <a href="{{ url('/home') }}" class="btn btn-secondary mb-3">Home</a>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Personal Statement Categories -->
        <div class="sop-buttons">
            @foreach ($categories as $category)
            <a href="{{ route('personalStatement.edit', $category->id) }}" class="sop-button">{{ $category->name }}</a>
            @endforeach
        </div>

        <!-- Create New Category Button -->
        <form action="{{ route('personalStatement.createCategory') }}" method="POST" class="mt-3">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="New Category Name" required>
                <button class="btn btn-success" type="submit">Create Category</button>
            </div>
        </form>

        <!-- Personal Statement Form (Only show when editing or creating) -->
        @if(isset($statement))
            <form method="POST" action="{{ route('personalStatement.update', $statement->id) }}" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($statement->category_id == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Your Personal Statement</label>
                    <textarea name="content" class="form-control" rows="10" placeholder="Write your statement here...">{{ $statement->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Personal Statement</button>
            </form>

            <!-- Delete Button -->
            <form method="POST" action="{{ route('personalStatement.destroy', $statement->id) }}" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">Delete Personal Statement</button>
            </form>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
