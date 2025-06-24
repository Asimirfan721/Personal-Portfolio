<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Bootstrap CSS -->
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

        .login-card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(60,72,88,0.12), 0 1.5px 4px rgba(60,72,88,0.07);
            background: #fff;
            max-width: 410px;
            margin: 0 auto;
            padding: 0;
            overflow: hidden;
        }

        .login-header {
            background: #0984e3;
            color: #fff;
            text-align: center;
            padding: 32px 24px 18px 24px;
        }

        .login-header h2 {
            font-weight: 700;
            margin-bottom: 6px;
            font-size: 2em;
            letter-spacing: 1px;
        }

        .login-header p {
            font-size: 1.08em;
            margin-bottom: 0;
            opacity: 0.92;
        }

        .login-body {
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
            background: #74b9ff;
            color: #222;
        }

        .btn-secondary {
            background: #636e72;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 1.08em;
            padding: 10px 0;
            margin-top: 8px;
            transition: background 0.2s;
        }

        .btn-secondary:hover {
            background: #b2bec3;
            color: #222;
        }

        .text-danger {
            font-size: 0.95em;
        }

        .register-link {
            text-align: center;
            margin-top: 18px;
        }

        .register-link a {
            color: #0984e3;
            text-decoration: underline;
            font-weight: 500;
            transition: color 0.2s;
        }

        .register-link a:hover {
            color: #636e72;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Sign in to your account</p>
        </div>
        <div class="login-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required autofocus>
                    <?php if($errors->has('email')): ?>
                        <div class="text-danger"><?php echo e($errors->first('email')); ?></div>
                    <?php endif; ?>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password" class="form-control" required>
                    <?php if($errors->has('password')): ?>
                        <div class="text-danger"><?php echo e($errors->first('password')); ?></div>
                    <?php endif; ?>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
            </form>
            <div class="register-link">
                <span>Don't have an account?</span>
                <a href="<?php echo e(route('register')); ?>">Register Yourself</a>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/auth/login.blade.php ENDPATH**/ ?>