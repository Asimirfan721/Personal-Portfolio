<!-- resources/views/statement-of-purpose.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Statement of Purpose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Statement of Purpose</h1>
        <a href="{{ ('/home') }}" class="btn btn-secondary">Home</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ url('/statement-of-purpose') }}">
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
