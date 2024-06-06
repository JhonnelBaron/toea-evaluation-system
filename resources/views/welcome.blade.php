<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .d-flex {
            display: flex;
        }
        .content {
            flex-grow: 1;
            padding-left: 20px;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .sidebar.hidden {
            transform: translateX(-100%);
        }
        .toggle-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 15px;
            height: 15px;
            z-index: 1000;
        }
        .profile-picture {
            width: 200px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image covers the whole area */
        }
        .user-name, .user-type {
            margin-bottom: 5px;
            text-align: center;
        }
        .tabs {
            margin-top: center;
            width: 100%;
        }
        .tabs a {
            display: block;
            padding: 10px;
            text-align: center;
            color: black;
            text-decoration: none;
        }
        .tabs a:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <button class="btn btn-primary toggle-btn" id="toggleSidebar">Toggle Sidebar</button>
    <div class="d-flex">
        @include('components.sidebar', [
            'profilePicture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="content">
            <!-- Main content goes here -->
            <h1>Welcome to the main content area</h1>
        </div>
    </div>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
