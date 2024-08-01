<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOEA Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: hsl(0, 0%, 97%) !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        content {
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }
        table {
            width: 100%;
            border-collapse: collapse; /* This removes the space between table cells */
        }

        /* Style for table header (th) */
        th {
            border: 1px solid #000; /* Black border with 1px thickness */
            padding: 1px;
            text-align: left;
            background-color: #ffffff; /* Light gray background for headers */
        }

        /* Style for table data (td) */
        td {
            border: 1px solid #000; /* Light gray border with 1px thickness */
            padding: 1px;
        }

        .legend {
            display: flex;
            justify-content: flex-start;
            margin-top: 20px;
            margin-bottom: 1px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-color {
            width: 15px;
            height: 15px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
        @include('components.externalEvaluatorSB', [
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])

<div class="ml-4 p-2">
    <div class="flex justify-between items-center w-full p-2">
        <div class="flex items-center space-x-2">
            <button id="backButton" class="text-gray-600 font-bold rounded flex items-center space-x-1">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="text-xl">Back</span>
            </button>
            <h1 class="text-gray-800 font-bold text-3xl">BEST REGIONAL OFFICE - {{$nominee->province}}</h1>
        </div>
        <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
    </div>
    
    <div class="flex items-center justify-center ml-6">
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-a', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria A</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-b', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria B</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-c', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria C</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-d', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria D</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-e', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria E</span>
            </a>
        </div>
    </div>

    
      
    <form id="saveChangesForm" method="POST" action="{{ route('storeBroD') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user_id }}">
    <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
        <div id="evaluated" class="tab-content">
            <table id="regionTable" class="mx-auto">
                <thead class="bg-blue-300 text-sm">
                    <tr>
                        <th class="border border-gray-300 p-2 w-52">Category</th>
                        <th class="border border-gray-300 p-2 w-32">Means of Verification</th>
                        <th class="border border-gray-300 p-2 w-24">View Attachment</th>
                        <th class="border border-gray-300 p-2 w-10">Secretariat Rating</th>
                        <th class="border border-gray-300 p-2 w-32">Remarks</th>
                        <th class="border border-gray-300 p-2 w-4">External Validator Rating</th>
                        <th class="border border-gray-300 p-2 w-32">Remarks</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td class="font-bold">D. Reporting Efficiency</td>
                    </tr>
                    <tr>
                        <td class="pb-8 pt-5">
                            D.1. Timeliness, Consistency and Accuracy
                        </td>
                        <td class="pb-8 pt-5">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Rating of each Executive Office based on the timely, consistent, and accurate reporting</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificFilesInfo= [    232 => 'Summary', 200 => 'FMS', 215 => 'ICTO'
                                        ];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', array_keys($specificFilesInfo))->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificFilesInfo as $id => $name)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">{{ $name }} File</button>
                                @else
                                    No file available for ID {{ $name }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$nominee->criteria_d}}</td>
                        <td class="pb-4 text-center"></td>
                        <td class="pb-8 pt-5">
                            <select class="form-control mb-1 score-dropdown" name="d1" data-field="d1">
                                <option value="">Select score</option>
                                <option value="60" {{ (isset($previousData->d1) && $previousData->d1 == 60) ? 'selected' : '' }}>60 - Reports are accurate and submitted consistently and on time</option>
                                <option value="30" {{ (isset($previousData->d1) && $previousData->d1 == 30) ? 'selected' : '' }}>30 - Reports are accurate and submitted consistently but not on time</option>
                                <option value="0" {{ (isset($previousData->d1) && $previousData->d1 == 0) ? 'selected' : '' }}>0 - Reports are not accurate and are not submitted on time</option>
                            </select>
                        </td>
                        <td class="pb-8 pt-5">
                            <input class="form-control mb-1" name="d1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->d1_remarks) ? $previousData->d1_remarks : '' }}">
                        </td>
                        
                    </tr>
                        
                    <tr>
                        <td class="pb-4"></td>
                        <td class="pb-4"></td>
                        <td class="pb-4"><b>Total Score</b></td>
                        <td class="pb-4 text-center">{{$nominee->criteria_d}}</td>
                        <td class="pb-4"><b>Final Score</b></td>
                        <td class="pb-4"><span id="totalScore">{{$previousData->overall_total_score ?? 0}}</span></td>
                        <td class="pb-4"><button class="btn btn-primary" id="submitButton">Save</button></td>
                    </tr>
                    
                
                </tbody>
                </table>

            </div>
        </div>
    </form>
                
    <main>
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">View PDF</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe id="pdfViewer" src="" frameborder="0" width="100%" height="600px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- View Details modal -->
        <div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewDetailsModalLabel">View Submission</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Submission details will be loaded here via JavaScript -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- BACK BUTTON MODAL --}}
        <div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300 ease-in-out opacity-0 pointer-events-none">
            <div class="bg-white p-5 rounded shadow-md transition-transform duration-300 ease-in-out transform scale-95">
                <h2 class="text-xl font-bold mb-4">Warning</h2>
                <p class="mb-4">Have you graded anything yet? Your work might not be saved. Do you still want to continue?</p>
                <div class="flex justify-end space-x-2">
                    <button id="cancelButton" class="bg-gray-500 text-white px-4 py-2 rounded">No</button>
                    <button id="confirmButton" class="bg-blue-500 text-white px-4 py-2 rounded">Yes</button>
                </div>
            </div>
        </div>

    </main>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script>
        function highlightStep(step) {
        // Remove previous active classes
        const steps = document.querySelectorAll('.flex > div');
        steps.forEach(s => s.classList.remove('bg-blue-200'));
    
        // Add active class to the clicked step
        const clickedStep = document.querySelector(`[onclick="highlightStep('${step}')"]`);
        clickedStep.classList.add('bg-blue-200');
        }
        function openPdf(pdfUrl, event) {
            event.preventDefault();
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.src = pdfUrl;
            const viewModal = new bootstrap.Modal(document.getElementById('viewModal'));
            viewModal.show();
        }

    </script>
    
    <script>
        document.getElementById('backButton').addEventListener('click', function (event) {
            event.preventDefault();
            const modal = document.getElementById('confirmationModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
        });

        document.getElementById('cancelButton').addEventListener('click', function () {
            const modal = document.getElementById('confirmationModal');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('pointer-events-none');
                modal.classList.remove('opacity-100');
            }, 50); // Duration of the transition
        });

        document.getElementById('confirmButton').addEventListener('click', function () {
            window.location.href = "/external/bro"; // Adjust the URL as needed
        });
    </script>
</body>
</html>
