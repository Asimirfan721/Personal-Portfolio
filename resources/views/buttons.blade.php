<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coursera Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000; /* Black   background */
            color: #fff; /* White text */
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff; /* White content area */
            color: #000; /* Black text inside container */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Stronger shadow */
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 28px;
            font-weight: bold;
            color: #e60000; /* Red heading */
        }
        .btn-home {
            display: inline-block;
            margin-bottom: 20px;
            padding: 12px 24px;
            background-color: #000; /* Black button */
            color: #e60000; /* Red text */
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #e60000; /* Red border */
            border-radius: 50px; /* Rounded button */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn-home:hover {
            background-color: #e60000; /* Red on hover */
            color: #fff; /* White text */
            transform: scale(1.05);
        }
        .category-card {
            text-align: center;
            padding: 20px;
            border: 2px solid #000; /* Black border */
            border-radius: 10px;
            background-color: #f9f9f9; /* Light background inside container */
        }
        .category-card h2 {
            color: #e60000; /* Red subheading */
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn {
            display: block;
            margin: 10px auto;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            color: #fff; /* White text */
            background-color: #000; /* Black button */
            border: 2px solid #e60000; /* Red border */
            border-radius: 10px; 
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background-color: #e60000; /* Red on hover */
            color: #fff; /* White text */
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Certifications</h1>
        </div>

        <!-- Home Button -->
        <a href="{{ url('/home') }}" class="btn-home">🏠 Home</a>

        <!-- Category Selection Sect ion -->
        <div class="category-card">
            <h2>Select a Category</h2>
            <a href="{{ route('form') }}" class="btn">Coursera</a>
            <a href="{{ route('CS') }}" class="btn">Recommendations</a>
            <a href="{{ route('General') }}" class="btn">General</a>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>