<!-- resources/views/calculation.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Calculation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
    <div class="container mt-5">
        <a href="{{ ('/home') }}" class="btn btn-secondary">Home</a>
        <h1>Calculator</h1>
        <form method="POST" action="{{ route('calculation') }}">
            @csrf
            <div class="mb-3">
                <label for="number1" class="form-label">Number 1</label>
                <input id="number1" type="text" name="number1" class="form-control" value="{{ old('number1', $number1 ?? '') }}" required>
                @if ($errors->has('number1'))
                    <div class="text-danger">{{ $errors->first('number1') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="number2" class="form-label">Number 2</label>
                <input id="number2" type="text" name="number2" class="form-control" value="{{ old('number2', $number2 ?? '') }}" required>
                @if ($errors->has('number2'))
                    <div class="text-danger">{{ $errors->first('number2') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="operation" class="form-label">Operation</label>
                <select id="operation" name="operation" class="form-select" required>
                    <option value="add" {{ (old('operation', $operation ?? '') == 'add') ? 'selected' : '' }}>Add</option>
                    <option value="subtract" {{ (old('operation', $operation ?? '') == 'subtract') ? 'selected' : '' }}>Subtract</option>
                    <option value="multiply" {{ (old('operation', $operation ?? '') == 'multiply') ? 'selected' : '' }}>Multiply</option>
                    <option value="divide" {{ (old('operation', $operation ?? '') == 'divide') ? 'selected' : '' }}>Divide</option>
                </select>
                @if ($errors->has('operation'))
                    <div class="text-danger">{{ $errors->first('operation') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        @isset($result)
            <div class="mt-4">
                <h2>Result: {{ $result }}</h2>
            </div>
        @endisset
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
