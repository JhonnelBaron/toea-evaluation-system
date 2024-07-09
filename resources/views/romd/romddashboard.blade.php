<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOEA Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/toea-logo.png') }}" type="image/png">
    <style>
        .folder {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
            text-align: center;
        }

        .folder i {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* padding: 20px; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: fixed;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .toggle-btn {
            position: absolute;
            top: 200px;
            left: 200px;
            width: 15px;
            height: 15px;
            z-index: 1000;
        }


        .logo-picture img,
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-name,
        .user-type {
            margin-bottom: 5px;
            text-align: center;
        }
        body {
            height: 100vh;
            background: linear-gradient(to bottom, white, #0033ff);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


    </style>
</head>

<body>
    <div>
        @include('components.eo-sidebar', [
            // 'profile-picture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type',
        ])
        <div class="ml-72 p-4">
            <h1 class="font-bold text-2xl">BEST REGIONAL OFFICE</h1>

            <div class="card mt-4">
                <div class="container">
                    <div class="row">
                        <!-- 16 folders -->
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 4]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>NCR</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 5]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>CAR</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="{{ route('region.files', ['uploaderId' => 6]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                <div class="folder hover:text-blue-600">
                                    <i class="fas fa-folder "></i>
                                    <p>Region I</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="{{ route('region.files', ['uploaderId' => 7]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                <div class="folder hover:text-blue-600">
                                    <i class="fas fa-folder"></i>
                                    <p>Region II</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 8]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region III</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 9]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region IV-A</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 10]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region IV-B</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 11]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region V</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 12]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region VI</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 13]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region VII</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 14]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region VIII</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 15]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region IX</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 16]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region X</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 17]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region XI</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 18]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region XII</p>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="folder hover:text-blue-600">
                                <a href="{{ route('region.files', ['uploaderId' => 19]) }}"> <!-- Assuming 4 is the ID for Region I -->
                                    <i class="fas fa-folder"></i>
                                    <p>Region XIII</p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>

</html>
