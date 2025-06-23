<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e9eef3 0%, #f4f6f8 100%);
            color: #222;
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        .navbar {
            background: #fff;
            border-bottom: 2px solid #4a90e2;
            padding: 12px 28px;
            box-shadow: 0 2px 12px rgba(60,72,88,0.07);
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .navbar .navbar-brand {
            color: #4a90e2;
            font-weight: bold;
            font-size: 1.6em;
            letter-spacing: 1px;
        }
        .navbar .nav-link {
            color: #222;
            margin: 0 10px;
            font-size: 1em;
            font-weight: 500;
            border-radius: 18px;
            transition: background 0.2s, color 0.2s;
            padding: 7px 18px;
        }
        .navbar .nav-link:hover, .navbar .nav-link.active {
            background: #e9eef3;
            color: #4a90e2;
        }
        .navbar .btn-danger {
            padding: 7px 18px;
            font-size: 1em;
            margin-left: 18px;
            background-color: #f44336;
            border-color: #f44336;
            border-radius: 18px;
            font-weight: 500;
            transition: background 0.2s;
        }
        .navbar .btn-danger:hover {
            background: #c62828;
        }
        .main-content {
            max-width: 900px;
            margin: 60px auto 0 auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 32px rgba(60,72,88,0.10), 0 1.5px 4px rgba(60,72,88,0.07);
            padding: 38px 32px 32px 32px;
            display: flex;
            gap: 40px;
            align-items: center;
        }
        .profile-image {
            max-width: 220px;
            border-radius: 14px;
            box-shadow: 0 5px 15px rgba(60,72,88,0.10);
            margin-bottom: 10px;
        }
        .about-section {
            flex: 1;
        }
        .about-section h2 {
            font-size: 2rem;
            color: #4a90e2;
            font-weight: 700;
            margin-bottom: 14px;
            border-bottom: 2px solid #e9eef3;
            display: inline-block;
            padding-bottom: 4px;
        }
        .about-section p {
            font-size: 1.13rem;
            line-height: 1.8;
            color: #444;
        }
        @media (max-width: 900px) {
            .main-content {
                flex-direction: column;
                padding: 28px 12px 24px 12px;
                gap: 24px;
            }
            .profile-image {
                max-width: 80vw;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="#">Asim Irfan</a>
        <div class="d-flex align-items-center flex-wrap">
            <a class="nav-link<?php echo e(request()->routeIs('home') ? ' active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
            <a class="nav-link" href="<?php echo e(route('linkedin')); ?>">LinkedIn</a>
            <a class="nav-link" href="<?php echo e(route('github')); ?>">GitHub</a>
            <a class="nav-link" href="<?php echo e(route('researchgate')); ?>">ResearchGate</a>
            <a class="nav-link" href="<?php echo e(route('coursera.showButtons')); ?>">Certifications</a>
            <a class="nav-link" href="<?php echo e(route('statement-of-purpose')); ?>">Statement of Purpose</a>
            <a class="nav-link" href="<?php echo e(route('Calculation')); ?>">Calculation</a>
            <a class="nav-link" href="<?php echo e(route('resume')); ?>">Resume</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="ms-2 d-inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div>
            <img src="<?php echo e(asset('images/your-image.jpg')); ?>" alt="Asim Irfan" class="profile-image">
        </div>
        <div class="about-section">
            <h2>About Me</h2>
            <p>
                Welcome to my portfolio! I am a passionate web developer with expertise in Laravel, PHP, and modern web technologies.
                I enjoy building clean, efficient, and visually appealing applications. In addition to my technical skills,
                I have experience in research and leadership, having published research papers and led multiple teams to success.
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/home.blade.php ENDPATH**/ ?>