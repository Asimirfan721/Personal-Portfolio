<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
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
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required>
                <?php if($errors->has('name')): ?>
                    <div class="error"><?php echo e($errors->first('name')); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
                <?php if($errors->has('email')): ?>
                    <div class="error"><?php echo e($errors->first('email')); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                <?php if($errors->has('password')): ?>
                    <div class="error"><?php echo e($errors->first('password')); ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <a href="<?php echo e(route('login')); ?>" class="login-button">Login</a>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/auth/register.blade.php ENDPATH**/ ?>