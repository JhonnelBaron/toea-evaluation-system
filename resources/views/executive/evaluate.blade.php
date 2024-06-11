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
    <link rel="icon" href="{{ asset('img/TOEA Logo.png') }}" type="image/png">
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
        .evaluate-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
        }

        .evaluate-btn:hover {
            background-color: #0056b3;
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Region Name</th>
                                <th>Action</th>
                                <th>Percentage</th>
                                <th>Remarks</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{ url('/as-evaluation') }}">NCR</a></td>
                                <td><button class="evaluate-btn" onclick="location.href='{{ url('/as-evaluation') }}'">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 5]) }}">CAR</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 6]) }}">Region I</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 7]) }}">Region II</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 8]) }}">Region III</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 9]) }}">Region IV-A</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 10]) }}">Region IV-B</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 11]) }}">Region V</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 12]) }}">Region VI</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 13]) }}">Region VII</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 14]) }}">Region VIII</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 15]) }}">Region IX</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 16]) }}">Region X</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 17]) }}">Region XI</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 18]) }}">Region XII</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                            <tr>
                                <td><a href="{{ route('region.files', ['uploaderId' => 19]) }}">Region XIII</a></td>
                                <td><button class="evaluate-btn">Evaluate</button></td>
                            </tr>
                        </tbody>
                    </table>
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
