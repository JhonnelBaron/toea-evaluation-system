<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JS after jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Files</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/TOEA Logo.png') }}" type="image/png">

    @vite('resources/css/app.css')
    
    <!-- <style>
        .file-icon {
            width: 24px;
            height: 24px;
            display: inline-block;
            margin-right: 10px;
        }
        .file-name {
            font-weight: bold;
        }
        .file-list {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }

        
    </style> -->
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
    <div class="d-flex">
        @include('components.upload-sidebar', [
            // 'profile-picture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type'
        ]);
        <div class="content">
            <div class="ml-8">
                <div class="row">
                    <div class="text-left">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                            Upload File
                        </button>
                    </div>
                </div>
                <div class="row file-list">
                    <div class="col-lg-12">
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
                                    <button class="btn btn-sm btn-info" onclick="openPdf('{{ asset($file->file_path) }}')"><i class="fas fa-eye"></i> Preview</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
                    <form action="{{ route('upload.file') }}" method="post" enctype="multipart/form-data">
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

    
</body>
</html>
