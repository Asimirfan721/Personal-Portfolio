<!-- resources/views/personal-statement.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Personal Statement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Home Button -->
        <div class="d-flex justify-content-between align-items-center">
            <h1>Personal Statement</h1>
            <a href="{{ ('/home') }}" class="btn btn-secondary">Home</a>
            
        </div>
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <!-- Form -->
        <form method="POST" action="{{ url('/personal-statement') }}">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" rows="10">{{ old('content', $statement->content ?? '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
