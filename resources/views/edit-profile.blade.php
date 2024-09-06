<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            text-align: center;
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
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>

        <div class="profile-image">
            <!-- Display the current profile image -->
            @if($user->profile_image)
                <img src="{{ asset('uploads/' . $user->profile_image) }}" alt="Profile Image">
            @else
                <img src="{{ asset('default-profile.png') }}" alt="Default Profile Image">
            @endif
        </div>

        
        <form method="POST" action="{{ route('profile/update') }}" enctype="multipart/form-data" class="edit">
            @csrf
            @method('PUT') <!-- Using PUT for updating resources -->
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            
            <div class="form-group">
                <label for="profile_image">Upload New Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>

        <div class="btn-group mt-4">
            <a href="{{ route('profile') }}" class="btn btn-secondary">Back to Profile</a>
            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
