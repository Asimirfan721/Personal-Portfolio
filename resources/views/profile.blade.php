<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 600px;
        }
        h1 {
            margin-bottom: 30px;
            color: #343a40;
            font-weight: bold;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info label {
            font-weight: bold;
        }
        .profile-info p {
            margin: 0;
        }
        .profile-image {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-image img {
            max-width: 150px;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-group {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .btn-group .btn {
            margin: 5px;
        }
        .message {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>

        <!-- Success and Error Messages -->
        @if(session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Ensure $user is not null -->
        @if($user)
            <div class="profile-image">
                <!-- Display the user's profile image if it exists -->
                @if($user->profile_image)
                    <img src="{{ asset('uploads/' . $user->profile_image) }}" alt="Profile Image">
                @else
                    <img src="{{ asset('default-profile.png') }}" alt="Default Profile Image">
                @endif
            </div>

            <div class="profile-info">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <p id="name">{{ $user->name }}</p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p id="email">{{ $user->email }}</p>
                </div>
            </div>

            <!-- File Upload Form -->
            <form method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Upload Profile Image</label>
                    <input type="file" name="file" id="file" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-success">Upload</button>
            </form>

            <div class="btn-group mt-4">
                
                <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
            </div>
        @else
            <p>User profile not found.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
