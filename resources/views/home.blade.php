<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212; /* Darker background */
            color: #fff; /* White text for readability */
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #1a1a1a; /* Darker navbar */
            border-bottom: 3px solid #f44336; /* Red border for contrast */
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
            color: #f44336; /* Red hover effect */
        }

        .navbar .btn-danger {
            padding: 6px 12px;
            font-size: 14px;
            margin-left: auto;
            background-color: #f44336; /* Button color */
            border-color: #f44336;
        }

        /* Main Content */
        .container {
            padding: 120px 20px 20px; /* Adjusted padding to account for fixed navbar */
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-section {
            background-color: #1a1a1a; /* Slightly lighter dark background */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2); /* Subtle shadow for depth */
        }

        .about-section h2 {
            font-size: 2.2rem;
            margin-bottom: 10px;
            border-bottom: 2px solid #f44336; /* Red underline */
            display: inline-block;
            padding-bottom: 5px;
        }

        .about-section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #bbb; /* Lighter text for better readability */
        }

        /* Profile Image */
        .profile-image {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        .content {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-direction: column;
            align-items: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .content {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }

            .about-section p {
                font-size: 1rem; /* Slightly smaller text on mobile */
            }

            .profile-image {
                width: 80%; /* Profile image scaling for smaller screens */
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <a class="navbar-brand" href="#">Asim Irfan</a>
        <div class="d-flex">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
            <a class="nav-link" href="{{ route('linkedin') }}">LinkedIn</a>
            <a class="nav-link" href="{{ route('github') }}">GitHub</a>
            <a class="nav-link" href="{{ route('researchgate') }}">ResearchGate</a>
            <a class="nav-link" href="{{ route('coursera.showButtons') }}">Certifications</a>
            <a class="nav-link" href="{{ route('personalStatement.index') }}">Personal Statement</a>
            <a class="nav-link" href="{{ route('statement-of-purpose') }}">Statement of Purpose</a>
            <a class="nav-link" href="{{ route('Calculation') }}">Calculation</a>
            <a class="nav-link" href="{{ route('resume') }}">Resume</a>

            <form method="POST" action="{{ route('logout') }}" class="ms-3">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="content">
            <!-- Profile Image -->
            <div>
                <img src="{{ asset('images/your-image.jpg') }}" alt="Asim Irfan" class="profile-image">
            </div>

            <!-- About Me Section -->
            <div class="about-section">
                <h2>About Me</h2>
                <p>
                    Welcome to my portfolio! I am a passionate web developer with expertise in Laravel, PHP, and modern web technologies. 
                    I enjoy building clean, efficient, and visually appealing applications. In addition to my technical skills, 
                    I have experience in research and leadership, having published research papers and led multiple teams to success.
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
