<!DOCTYPE html>
<html>
<head>
    <title>Statement of Purpose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for a clean look */
            color: #343a40; /* Dark text for contrast */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff; /* White card-style container */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff; /* Bootstrap primary color for header */
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-secondary {
            margin-bottom: 20px;
        }
        .form-control {
            resize: none; /* Disable textarea resizing for consistency */
        }
        .alert {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Statement of Purpose</h1>

        <!-- Home Button -->
        <a href="{{ url('/home') }}" class="btn btn-secondary">Home</a>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
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

        <!-- Statement of Purpose Form -->
        <form method="POST" action="{{ url('/statement-of-purpose') }}">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Your Statement of Purpose</label>
                <textarea name="content" id="content" class="form-control" rows="10" placeholder="Write your statement here...">{{ old('content', $statement->content ?? '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Save Statement</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
