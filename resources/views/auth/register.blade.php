{{-- filepath: resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e9eef3 0%, #74b9ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .register-card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(60,72,88,0.12), 0 1.5px 4px rgba(60,72,88,0.07);
            background: #fff;
            max-width: 430px;
            margin: 0 auto;
            padding: 0;
            overflow: hidden;
        }
        .register-header {
            background: #0984e3;
            color: #fff;
            text-align: center;
            padding: 32px 24px 18px 24px;
        }
        .register-header h2 {
            font-weight: 700;
            margin-bottom: 6px;
            font-size: 2em;
            letter-spacing: 1px;
        }
        .register-header p {
            font-size: 1.08em;
            margin-bottom: 0;
            opacity: 0.92;
        }
        .register-body {
            padding: 32px 28px 24px 28px;
        }
        .form-label {
            font-weight: 500;
            color: #0984e3;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #cfd8dc;
            background: #f4f6f8;
            color: #222;
            font-size: 1em;
        }
        .form-control:focus {
            border-color: #0984e3;
            box-shadow: 0 0 0 0.2rem rgba(9,132,227,0.10);
        }
        .btn-primary {
            background: #0984e3;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.08em;
            padding: 10px 0;
            transition: background 0.2s;
        }
        .btn-primary:hover {
            background: #0072e3;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .login-button {
            display: block;
            text-align: center;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            padding: 10px;
            text-decoration: none;
            margin-top: 10px;
        }

        .login-button:hover {
            background-color: #218838;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="register-header">
            <h2>Register</h2>
            <p>Create an account to get started</p>
        </div>
        <div class="register-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required class="form-control">
                    @if ($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-control">
                    @if ($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" required class="form-control">
                    @if ($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <a href="{{ route('login') }}" class="login-button">Login</a>
        </div>
    </div>
</body>
</html>
