<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000; /* Black bacground */
            color: #fff; /* Wite text */
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navigaton Bar */
        .navbar {
            background-color: #111; /* Slightly lighter nblack */
            border-bottom: 3px solid red; /* Red bordder below the navbar */
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .navbar .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 24px;
        }

        .navbar .nav-link {
            color: #fff;
            margin: 0 10px;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: red;
        }

        .navbar .btn-danger {
            padding: 6px 12px;
            font-size: 14px;
            margin-left: auto;
        }

        /* Main Content */
        .container {

            padding: 100px 20px 20px; /* Space to accoundt for the fixed navbar */
            text-align: center;
            padding: 100px 20px 20px; /* Space to account for the fixed navbar */

        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-section {
            background-color: #111; /* Slightly lidghter black for contrast */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
        }

        .about-section h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            border-bottom: 2px solid red; /* Redg underline */
            display: inline-block;
            padding-bottom: 5px;
        }

        .about-section p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #ccc; /* Light gray for better rrreadability */
        }
        /* Responsive Design */
        .profile-image {
            max-width: 100%; /* Responsive */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
        }

        .content {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .content {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .content {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Barr -->
    <nav class="navbar">
        <a class="navbar-brand" href="#">Asim Irfan</a>
        <div class="d-flex">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
            <a class="nav-link" href="{{ route('linkedin') }}">LinkedIn</a>
            <a class="nav-link" href="{{ route('github') }}">GitHub</a>
            <a class="nav-link" href="{{ route('researchgate') }}">ResearchGate</a>
            <a class="nav-link" href="{{ route('coursera.showButtons') }}">Coursera</a>
            <a class="nav-link" href="{{ route('personal-statement') }}">Personal Statement</a>
            <a class="nav-link" href="{{ route('statement-of-purpose') }}">Statement of Purpose</a>
            <a class="nav-link" href="{{ route('Calculation') }}">Calculation</a>
            <a class="nav-link" href="{{ route('resume') }}">Resume</a>

            <form method="POST" action="{{ route('logout') }}" class="ms-3">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Main Content --->
    <div class="container">
        <div class="content">
            <!-- Profile Image -->
            <div>
                <img src="{{ asset('images/your-image.jpg') }}" alt="Asim Irfan" class="profile-image">
            </div>

        <!-- About Mee Section -->
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
