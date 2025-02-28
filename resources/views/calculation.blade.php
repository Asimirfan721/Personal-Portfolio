<!-- resources/views/calculation.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6; /* Light   background */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            font-weight: bold;
            text-align: center;
        }

        .btn-secondary {
            background-color: #333;
            color: white;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            padding: 10px 20px;
        }

        .btn-secondary:hover {
            background-color: #444;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .form-select {
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .text-danger {
            font-size: 0.9em;
            color: #e74c3c;
        }

        .result {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            margin-top: 30px;
            border-radius: 10px;
            text-align: center;
        }

        .result h2 {
            margin: 0;
        }
    </style> 
</head>
<body>

    <div class="container">
        <a href="{{ ('/home') }}" class="btn-secondary">Home</a>
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
            <button type="submit" class="btn-primary">Calculate</button>
        </form>

        @isset($result)
            <div class="result">
                <h2>Result: {{ $result }}</h2>
            </div>
        @endisset
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
