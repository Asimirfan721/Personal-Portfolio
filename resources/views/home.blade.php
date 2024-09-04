<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 80%;
            max-width: 1200px;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            margin-bottom: 30px;
            color: #343a40;
            font-weight: bold;
            font-size: 36px;
            text-align: center;
        }
        .btn-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        .btn-group .btn {
            margin: 10px 0;
            padding: 10px 20px;
            font-size: 16px;
            width: 200px;
        }
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }
        
    </style>
</head>
<body>
    <div class="logout-button">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
            <a href="{{ route('profile') }}" class="btn btn-warning">Profile</a>
        </form>
    </div>
    <div class="container">
        <h1>Welcome Asim</h1>
        <div class="btn-group">
            <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
            <a href="{{ route('linkedin') }}" class="btn btn-secondary">LinkedIn</a>
            <a href="{{ route('github') }}" class="btn btn-dark">GitHub</a>
            <a href="{{ route('researchgate') }}" class="btn btn-info">ResearchGate</a>
            <a href="{{ route('coursera.showButtons') }}" class="btn btn-primary">Coursera</a>
            <a href="{{ route('personal-statement') }}" class="btn btn-warning">Personal Statement</a>
            <a href="{{ route('statement-of-purpose') }}" class="btn btn-warning">Statement of Purpose</a>
            <a href="{{ route('Calculation') }}" class="btn btn-warning">Calculation</a>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
