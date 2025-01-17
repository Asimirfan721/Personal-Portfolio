<!DOCTYPE html>
<html>
<head>
    <title>Statement of Purpose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212; /* Black background for contrast */
            color: #ffffff; /* White text for readability */
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1e1e1e; /* Dark gray for the form container */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Subtle shadow */
            border: 1px solid #ff0000; /* Red border for emphasis */
        }
        h1 {
            color: #ff0000; /* Red header for a bold look */
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-secondary {
            background-color: #ff0000; /* Red for the home button */
            border: none;
            color: #ffffff;
        }
        .btn-secondary:hover {
            background-color: #cc0000; /* Darker red for hover effect */
        }
        .form-label {
            color: #ffffff; /* Ensure labels are readable */
        }
        .form-control {
            background-color: #2c2c2c; /* Dark input fields */
            border: 1px solid #ff0000; /* Red border for input fields */
            color: #ffffff; /* White text inside inputs */
        }
        .form-control::placeholder {
            color: #cccccc; /* Lighter gray for placeholders */
        }
        .form-control:focus {
            background-color: #2c2c2c;
            border-color: #ff0000;
            color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25); /* Subtle red glow */
        }
        .btn-primary {
            background-color: #ff0000; /* Red save button */
            border: none;
        }
        .btn-primary:hover {
            background-color: #cc0000; /* Darker red hover effect */
        }
        .alert-success {
            background-color: #1e4620; /* Dark green for success */
            border-color: #28a745;
            color: #ffffff;
        }
        .alert-danger {
            background-color: #4a1e1e; /* Dark red for error alerts */
            border-color: #ff0000;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Statement of Purpose</h1>

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
