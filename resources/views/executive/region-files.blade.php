<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files for {{ $uploader->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('img/TOEA Logo.png') }}" type="image/png">
    <style>
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
    </style>
    <script>
        function openPdf(pdfUrl) {
            var iframe = '<iframe src="' + pdfUrl + '" style="width:100%; height:80vh;" frameborder="0"></iframe>';
            document.getElementById('pdfPreviewModalBody').innerHTML = iframe;
            var pdfModal = new bootstrap.Modal(document.getElementById('pdfPreviewModal'), {});
            pdfModal.show();
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Files for {{ $uploader->name }}</h1>
        <div class="row file-list">
            <div class="col-lg-12">
                <table class="table table-striped">
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
                                <button class="btn btn-sm btn-info" onclick="openPdf('{{ asset($file->file_path) }}')"><i class="fas fa-eye"></i> Preview</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                <div class="modal-body" id="pdfPreviewModalBody">
                    <!-- PDF will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
