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
        <div class="ml-72 p-3">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300" data-bs-toggle="modal" data-bs-target="#uploadModal">
                        Upload File
                    </button>
                </div>
            
            
            <div class="card mt-6">
                <div class="container">
                <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">File Name</th>
                                    <!-- <th scope="col">File Type</th> -->
                                    <th scope="col">Date Uploaded</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td class="file-name">{{ $file->file_name }}</td>
                                    <!-- <td>{{ $file->file_type }}</td> -->
                                    <td>{{ $file->created_at->format('F d, Y') }}</td>
                                    <td>
                                         <!-- Open PDF in iframe -->
                                     {{-- <a href="{{ route('file.download', $file->id) }}" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download</a> --}}
                                    <button class="btn btn-sm btn-info" onclick="openPdf('{{ asset($file->file_path) }}')"><i class="fas fa-eye"></i> Preview</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div class="row">
                    
                    </div>
                </div>
                <div></div>
            </div>


        </div>
        <div>

        </div>

    </div>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>

</html>

<!-- 
---------


<div class="ml-72 p-4">
    <div class="d-flex justify-content-between">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
            Upload File
        </button>
        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#uploadModal">
            Upload File
        </button>
    </div>
    
    <div class="card mt-4">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">File Name</th>
                        <th scope="col">File Type</th>
                        <th scope="col">Modified Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                    <tr>
                        <td class="file-name">{{ $file->file_name }}</td>
                        <td>{{ $file->file_type }}</td>
                        <td>{{ $file->created_at->format('F d, Y') }}</td>
                        <td>
                            <!-- Open PDF in iframe -->
                            {{-- <a href="{{ route('file.download', $file->id) }}" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download</a> --}}
                            <!-- <button class="btn btn-sm btn-info" onclick="openPdf('{{ asset($file->file_path) }}')">
                                <i class="fas fa-eye"></i> Preview
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
            
            </div>
        </div>
        <div></div>
    </div>
</div> -->
 -->
