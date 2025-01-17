<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #0984e3;
            color: #fff;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .btn-primary {
            background-color: #0984e3;
            border: none;
        }

        .btn-primary:hover {
            background-color: #74b9ff;
        }

        .btn-secondary {
            background-color: #636e72;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #b2bec3;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .form-label {
            font-weight: bold;
            color: #2d3436;
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Welcome Back</h2>
                        <p>Please login to your account</p>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" name="password" class="form-control" required>
                                @if ($errors->has('password'))
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">Login</button>

                            <!-- Register Link -->
                            <div class="text-center">
                                <p class="mb-0">Don't have an account? 
                                    <a href="{{ ('/register ') }}" class="btn btn-secondary w-100 py-2 mt-2">Register Yourself</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
