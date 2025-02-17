

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Statement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center">
            <h1>Personal Statement</h1>
            <a href="{{ url('/home') }}" class="btn btn-secondary">Home</a>
        </div>

       
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        
        @if(isset($categories))
        
        @endif

        <!-- Option to Create New Category -->
        <h3>Create New Category</h3>
        <form action="{{ route('personalStatement.createCategory') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="New Category Name" required>
                <button class="btn btn-success" type="submit">Create Category</button>
            </div>
        </form>

         
        <h3>Write Personal Statement</h3>
        <form method="POST" action="{{ route('personalStatement.update') }}">
            @csrf
            <div class="mb-3">
                <select name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <textarea name="content" class="form-control" rows="10">{{ old('content', $statement->content ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>