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

        /* .folder:hover {
            transform: scale(1.1);
            color: blue;
        }

        .folder a {
            text-decoration: none;
            color: inherit;
        }

        .folder a:hover i {
            color: blue;
        }

        .folder a:hover p {
            color: blue;
        } */
           /* Apply hover effect only to clickable folders */
        a .folder:hover {
            transform: scale(1.1);
            color: blue;
        }

        a .folder:hover i {
            color: blue;
        }

        a .folder:hover p {
            color: blue;
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
                        @php
                            use Illuminate\Support\Facades\Auth;
                            $offices = [
                            'AS' => 'Administrative Service',
                            'LD' => 'Legal Division',
                            'CO' => 'Certification Office',
                            'FMS' => 'Financial and Management Service',
                            'NITESD' => 'National Institute for Technical Education and Skills Development',
                            'PIAD' => 'Public Information and Assistance Division',
                            'PO' => 'Planning Office',
                            'PLO' => 'Partnership and Linkages Office',
                            'ROMO' => 'Regional Operations Management Office'
                        ];
                            $currentUserName = Auth::user()->executive_office; // Replace this with the actual current user's name
                        @endphp
    
                        @foreach ($offices as $abbr => $fullName)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                @if ($currentUserName === $abbr)
                                    <a href="{{ route('upload.file') }}">
                                        <div class="folder" style="display: flex; flex-direction: column; align-items: center; margin: 20px; text-align: center; transition: transform 0.3s ease, color 0.3s ease;">
                                            <i class="fas fa-folder"></i>
                                            <p>{{ $fullName }}</p>
                                            <p>({{ $abbr }})</p>
                                        </div>
                                    </a>
                                @else
                                    <div class="folder" style="display: flex; flex-direction: column; align-items: center; margin: 20px; text-align: center; color: gray; pointer-events: none; opacity: 0.6;">
                                        <i class="fas fa-folder"></i>
                                        <p>{{ $fullName }}</p>
                                        <p>({{ $abbr }})</p> 
                                    </div>
                                @endif
                            </div>
                        @endforeach
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
