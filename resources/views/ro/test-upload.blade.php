
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JS after jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script><!DOCTYPE html>
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
            <script>
                function openPdf(pdfUrl) {
                    console.log(pdfUrl);
                    var iframe = '<iframe src="' + pdfUrl + '" style="width:100%; height:80vh;" frameborder="0"></iframe>';
                    $('#pdfPreviewModal .modal-body').html(iframe);
                    $('#pdfPreviewModal').modal('show');
                }
            </script>
</head>

<body>
    <div>
        @include('components.eo-sidebar', [
            // 'profile-picture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type',
        ])
        <div class="ml-72 p-3">
                <div class="d-flex">
                    <button onclick="history.back()" class="flex items-center px-4 py-2 text-black text-sm font-medium rounded-md  focus:outline-none focus:ring-2  focus:ring-opacity-50">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </button>
                    <button type="button" class="mr-72 btn btn-primary btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300" data-bs-toggle="modal" data-bs-target="#uploadModal">
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
       <!-- Upload Modal -->
       <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('upload.file', ['region' => $region]) }}) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Select File:</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <!-- Modal for PDF Preview -->
      <div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfPreviewModalLabel">PDF Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- PDF will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>

</html>