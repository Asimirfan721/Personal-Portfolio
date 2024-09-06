<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coursera Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px; /* Centering container */
            margin-top: 100px; /* Adjust top margin for vertical centering */
        }
        .category-selection {
            border: 2px solid #007bff; /* Blue border for category selection */
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Light shadow */
        }
        .category-selection h1 {
            margin-bottom: 20px;
        }
        .btn {
            margin: 10px;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Home Button -->
        <a href="{{ url('/home') }}" class="btn btn-secondary mb-4">Home</a>

        <!-- Category Selection Section -->
        <div class="category-selection">
            <h1>Select a Category</h1>
            <a href="{{ route('form') }}" class="btn btn-primary">AI</a>
            <a href="{{ route('CS') }}" class="btn btn-primary">CS</a>
            <a href="{{ route('General') }}" class="btn btn-primary">General</a>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
