<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coursera Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Choose a Category</h1>
        <div class="mt-4">
        <a href="{{ route('course.upload', ['category' => 'ai']) }}" class="btn btn-primary">AI</a>
        <a href="{{ route('course.upload', ['category' => 'cybersecurity']) }}" class="btn btn-secondary">Cybersecurity</a>
        <a href="{{ route('course.upload', ['category' => 'certifications']) }}" class="btn btn-success">Certifications</a>
        </div>
    </div>
</body>
</html>
