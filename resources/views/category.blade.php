<!-- resources/views/coursera/category.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($category) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ ucfirst($category) }}</h1>

        <!-- Your content specific to the category goes here -->
        <p>Content for {{ ucfirst($category) }} will be displayed here.</p>
    </div>
</body>
</html>
