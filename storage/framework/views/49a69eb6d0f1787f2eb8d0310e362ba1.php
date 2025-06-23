<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coursera Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #e9eef3;
            color: #222;
            min-height: 100vh;
        }
        .container {
            max-width: 480px;
            margin: 60px auto;
            padding: 32px 28px 28px 28px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(60,72,88,0.10), 0 1.5px 4px rgba(60,72,88,0.07);
        }
        .header {
            text-align: center;
            margin-bottom: 32px;
        }
        .header h1 {
            font-size: 2em;
            font-weight: 700;
            color: #3a3a3a;
            letter-spacing: 1px;
        }
        .btn-home {
            display: block;
            margin: 0 auto 24px auto;
            padding: 10px 28px;
            background: #4a90e2;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            border: none;
            border-radius: 24px;
            font-size: 1.1em;
            box-shadow: 0 1px 4px rgba(60,72,88,0.07);
            transition: background 0.2s, transform 0.2s;
        }
        .btn-home:hover {
            background: #357ab8;
            color: #fff;
            transform: scale(1.04);
        }
        .category-card {
            background: #f8fafc;
            border-radius: 12px;
            padding: 28px 18px 18px 18px;
            box-shadow: 0 1px 4px rgba(60,72,88,0.04);
            text-align: center;
        }
        .category-card h2 {
            color: #4a90e2;
            font-weight: 600;
            margin-bottom: 18px;
            font-size: 1.2em;
        }
        .btn-category {
            display: block;
            width: 100%;
            margin: 12px 0;
            padding: 14px 0;
            font-size: 1.1em;
            font-weight: 500;
            color: #fff;
            background: #6abf69;
            border: none;
            border-radius: 8px;
            transition: background 0.2s, transform 0.2s;
            box-shadow: 0 1px 4px rgba(60,72,88,0.07);
            text-decoration: none;
        }
        .btn-category:hover {
            background: #4e9e4e;
            color: #fff;
            transform: scale(1.03);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Certifications</h1>
        </div>

        <!-- Home Button -->
        <a href="<?php echo e(url('/home')); ?>" class="btn-home">🏠 Home</a>

        <!-- Category Selection Section -->
        <div class="category-card">
            <h2>Select a Category</h2>
            <a href="<?php echo e(route('form')); ?>" class="btn-category">Coursera</a>
            <a href="<?php echo e(route('CS')); ?>" class="btn-category">Recommendations</a>
            <a href="<?php echo e(route('General')); ?>" class="btn-category">General</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/buttons.blade.php ENDPATH**/ ?>