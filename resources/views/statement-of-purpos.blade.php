<!DOCTYPE html>
<html>
<head>
    <title>Statement of Purpose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #121212; color: #ffffff; font-family: 'Arial', sans-serif; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; background-color: #1e1e1e; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border: 1px solid #ff0000; }
        h1 { color: #ff0000; text-align: center; margin-bottom: 20px; }
        .btn-primary, .btn-secondary { background-color: #ff0000; border: none; color: white; }
        .btn-primary:hover, .btn-secondary:hover { background-color: #cc0000; }
        .sop-buttons { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
        .sop-button { padding: 10px 15px; background: #ff0000; color: white; text-decoration: none; border-radius: 5px; font-size: 16px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Statement of Purpose</h1>
        
        <a href="{{ url('/home') }}" class="btn btn-secondary mb-3">Home</a>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="sop-buttons">
            @foreach ($statements as $sop)
                <a href="{{ route('statement-of-purpose.edit', $sop->id) }}" class="sop-button">{{ $sop->title }}</a>
            @endforeach
        </div>

        <a href="{{ route('statement-of-purpose.create') }}" class="btn btn-primary w-100 mt-3">Create New SOP</a>

        @if(isset($create))
            <form method="POST" action="{{ route('statement-of-purpose.store') }}" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Your Statement of Purpose</label>
                    <textarea name="content" class="form-control" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create SOP</button>
            </form>
        @endif

        @if(isset($edit))
            <form method="POST" action="{{ route('statement-of-purpose.update', $edit->id) }}" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $edit->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Your Statement of Purpose</label>
                    <textarea name="content" class="form-control" rows="10" required>{{ $edit->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update SOP</button>
            </form>

            <form method="POST" action="{{ route('statement-of-purpose.destroy', $edit->id) }}" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">Delete SOP</button>
            </form>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
