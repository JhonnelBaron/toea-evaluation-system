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

         .score-dropdown option {
            white-space: pre-wrap; /* Ensure the text wraps within the options */
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
    
    <div class="flex items-center justify-center">
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-a', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria A</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-b', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria B</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-c', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria C</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-d', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria D</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-e', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria E</span>
            </a>
        </div>
    </div>


    
      
    <form id="saveChangesForm" method="POST" action="{{ route('storeBroB') }}">
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
                        <th class="border border-gray-300 p-2 w-32">External Validator Rating</th>
                        <th class="border border-gray-300 p-2 w-32">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td class="font-bold">B. Implementation of TESD Programs</td>
                    </tr>
                    <tr>
                        <td class="font-bold"> B.1. Performance based on the General Appropriations Act (GAA)</td>
                    </tr>

                    <tr>
                        <td class="pb-8">
                            <span>B.1.A. Number of Regional and Provincial TESD plans formulated/updated</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Submission of the Regional and Provincial TESD plans with cover memo</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [226];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$po->b1a}}</td>
                        <td class="pb-4 text-center">{{$po->b1a_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1a" data-field="b1a">
                                <option value="">Select Score</option>
                                <option value="15"  {{ (isset($previousData->b1a) && $previousData->b1a == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b1a) && $previousData->b1a == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1a_remarks) ? $previousData->b1a_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <span>B.1.B. 94% stakeholders who rated policies/plans as good or better</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report of the User’s Feedback Survey</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [227];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$po->b1b}}</td>
                        <td class="pb-4 text-center">{{$po->b1b_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1b" data-field="b1b">
                                <option value="">Select Score</option>
                                <option value="15"  {{ (isset($previousData->b1b) && $previousData->b1b == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b1b) && $previousData->b1b == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1b_remarks) ? $previousData->b1b_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <span>B.1.C. 100% of registered TVET programs audited</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on the duly accomplished TESDA-OP-CO-02-F06-RO <br> Form Duly signed compliance audit reports Summary of audited programs Closure reports Monthly monitoring of OPCRs</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        if ($user_id == 4) {
                                $specificIds = [85];
                            } elseif ($user_id == 2) {
                                $specificIds = [74];
                            } elseif ($user_id == 11) {
                                $specificIds = [88];
                            } elseif ($user_id == 15) {
                                $specificIds = [90];
                            } elseif ($user_id == 9) {
                                $specificIds = [86];
                            } elseif ($user_id == 3) {
                                $specificIds = [75];
                            } elseif ($user_id == 1) {
                                $specificIds = [84];
                            } elseif ($user_id == 6) {
                                $specificIds = [81];
                            } elseif ($user_id == 10) {
                                $specificIds = [87];
                            } elseif ($user_id == 5) {
                                $specificIds = [78];
                            } else {
                                $specificIds = [];
                            }
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$co->b1c}}</td>
                        <td class="pb-4 text-center">{{$co->b1c_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1c" data-field="b1c">
                                <option value="">Select Score</option>
                                <option value="15"  {{ (isset($previousData->b1c) && $previousData->b1c == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100%</option>
                                <option value="0"  {{ (isset($previousData->b1c) && $previousData->b1c == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1c_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1c_remarks) ? $previousData->b1c_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <span>B.1.D. 90% of skilled workers issued with certification within 7 days of their application</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Tracking sheets (F41) - RO/PO c/o CO</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b1d}}</td>
                        <td class="pb-4 text-center">{{$co->b1d_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1d" data-field="b1d">
                                <option value="">Select Score</option>
                                <option value="15"  {{ (isset($previousData->b1d) && $previousData->b1d == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b1d) && $previousData->b1d == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1d_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1d_remarks) ? $previousData->b1d_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.1.E. 85% compliance of TVET programs to TESDA, industry, and industry standards and requirements<br></h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on the duly accomplished TESDA-OP-CO-02-F06-RO Form</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        if ($user_id == 4) {
                                $specificIds = [85];
                            } elseif ($user_id == 2) {
                                $specificIds = [74];
                            } elseif ($user_id == 11) {
                                $specificIds = [88];
                            } elseif ($user_id == 15) {
                                $specificIds = [90];
                            } elseif ($user_id == 9) {
                                $specificIds = [86];
                            } elseif ($user_id == 3) {
                                $specificIds = [75];
                            } elseif ($user_id == 1) {
                                $specificIds = [84];
                            } elseif ($user_id == 6) {
                                $specificIds = [81];
                            } elseif ($user_id == 10) {
                                $specificIds = [87];
                            } elseif ($user_id == 5) {
                                $specificIds = [78];
                            } else {
                                $specificIds = [];
                            }
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$co->b1e}}</td>
                        <td class="pb-4 text-center">{{$co->b1e_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1e" data-field="b1e">
                                <option value="">Select Score</option>
                                <option value="15"  {{ (isset($previousData->b1e) && $previousData->b1e == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b1e) && $previousData->b1e == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1e_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1e_remarks) ? $previousData->b1e_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="pb-8">
                            <h5>B.1.F. 70% of TVET graduates that undergo assessment for certification<br></h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of mandatory assessment from T2MIS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b1f}}</td>
                        <td class="pb-4 text-center">{{$co->b1f_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1f" data-field="b1f">
                                <option value="">Select Score</option>
                                <option value="15"  {{ (isset($previousData->b1f) && $previousData->b1f == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b1f) && $previousData->b1f == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1f_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1f_remarks) ? $previousData->b1f_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="pb-8">
                            <h5>B.1.G. 60% of TVET programs with tie-ups to industry</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on duly accomplished TESDA TVET Partnership Monitoring System (TTPMS)</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [2];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$plo->b1g}}</td>
                        <td class="pb-4 text-center">{{$plo->b1g_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1g" data-field="b1g">
                                <option value="">Select Score</option>
                                <option value="10"  {{ (isset($previousData->b1g) && $previousData->b1g == 15) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b1g) && $previousData->b1g == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1g_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1g_remarks) ? $previousData->b1g_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="pb-8">
                            <h5>B.1.H. Number of graduates from TESD Scholarship Programs</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report generated from the SPMOR</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [150];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$romo->b1h}}</td>
                        <td class="pb-4 text-center">{{$romo->b1h_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1h" data-field="b1h">
                                <option value="">Select Score</option>
                                <option value="35"  {{ (isset($previousData->b1h) && $previousData->b1h == 35) ? 'selected' : '' }}>35 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b1h) && $previousData->b1h == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1h_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1h_remarks) ? $previousData->b1h_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="pb-8">
                            <h5>B.1.I. 76.30% of graduates from technical education and skills development scholarship programs that were employed</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on Result on the Survey on Employability of TVET graduates under TWSP, PESFA and STEP (SETG)</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [228];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$po->b1i}}</td>
                        <td class="pb-4 text-center">{{$po->b1i_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b1i" data-field="b1i">
                                <option value="">Select Score</option>
                                <option value="15"  {{ (isset($previousData->b1i) && $previousData->b1i == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b1i) && $previousData->b1i == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b1i_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1i_remarks) ? $previousData->b1i_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2. Implementation of the TESDA Corporate Plan</td>
                    </tr>
                    <tr>
                        <td class="font-bold">B.2.A.  Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2.A.1. Advancement through Innovations and Researches
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Researches submitted to the NITESD</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$nitesd->b2a1}}</td>
                        <td class="pb-4 text-center">{{$nitesd->b2a1_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2a1" data-field="b2a1">
                                <option value="">Select Score</option>
                                <option value="8"  {{ (isset($previousData->b2a1) && $previousData->b2a1 == 8) ? 'selected' : '' }}>8 - The Region has submitted policy or technology research/es </option>
                                <option value="0"  {{ (isset($previousData->b2a1) && $previousData->b2a1 == 0) ? 'selected' : '' }}>0 - The Region has not suibmitted policy or technology research/es</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2a1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a1_remarks) ? $previousData->b2a1_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2.A.2. Implementation of Recognized/aligned PQF level 4 or Level 5 programs
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: TAS' Certificates of Recognition for PQF Level 4 or Level 5;</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [151];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$nitesd->b2a2}}</td>
                        <td class="pb-4 text-center">{{$nitesd->b2a2_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2a2" data-field="b2a2">
                                <option value="">Select Score</option>
                                <option value="8"  {{ (isset($previousData->b2a2) && $previousData->b2a2 == 8) ? 'selected' : '' }}>8 - All TAS in the Region have at least 1 recognized/aligned PQF level 4 or level 5 programs</option>
                                <option value="0"  {{ (isset($previousData->b2a2) && $previousData->b2a2 == 0) ? 'selected' : '' }}>0 - Not all TAS in the Region have at least 1 recognized/aligned PQF level 4 or level 5 programs</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2a2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a2_remarks) ? $previousData->b2a2_remarks : '' }}"></td>
                    </tr>
                    

                    <tr>
                        <td class="pb-8">
                            B.2.A.3. Digitalization of TVET
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Documentation Report after implementation<br>Submitted plans to ICTO</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [240, 241];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$icto->b2a3}}</td>
                        <td class="pb-4 text-center">{{$icto->b2a3_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2a3" data-field="b2a3">
                                <option value="">Select Score</option>
                                <option value="6" {{ (isset($previousData->b2a3) && $previousData->b2a3 == 6) ? 'selected' : '' }}>6 - The RO has institutionalized digitalization/use of electronic/online service delivery channel in the implementation of programs and/or utilize new technologies to reduce manual effort and increase productivity</option>
                                <option value="3" {{ (isset($previousData->b2a3) && $previousData->b2a3 == 3) ? 'selected' : '' }}>3 - The RO has developed digitalization plan to enhance existing systems using/aided by new or emerging technologies to improve performance, efficiency, and capabilities</option>
                                <option value="0" {{ (isset($previousData->b2a3) && $previousData->b2a3 == 0) ? 'selected' : '' }}>0 - The RO has no digitalization plan or initiatives undertaken</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2a3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a3_remarks) ? $previousData->b2a3_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.A.4 Participation and Recognition from Skills Competition</td>
                    </tr>

                    <tr>
                        <td class="pb-8">
                            B.2.A.4.1 Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Terminal Reports/After Activity reports Official list of winners</p>
                        </td>
                        @php
                            // Define the specific ID you're looking for
                            $specificIds = [133, 134, 135, 136];
                            // Find the file with the specific ID
                            $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                        @endphp
                        <!-- Added one more <td class="pb-8"> element -->
                            <td class="pb-8" style="text-align: center;">
                                @foreach ($specificIds as $id)
                                    @php
                                        $specificFile = $specificFiles->get($id);
                                    @endphp
                                    @if ($specificFile)
                                        <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                    @else
                                        No file available for ID {{ $id }}
                                    @endif
                                @endforeach
                            </td>
                        <td class="pb-4 text-center">{{$ws->b2a41}}</td>
                        <td class="pb-4 text-center">{{$ws->b2a41_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2a41" data-field="b2a41">
                                <option value="">Select Score</option>
                                <option value="6"  {{ (isset($previousData->b2a41) && $previousData->b2a41 == 6) ? 'selected' : '' }}>6 - The Region participated in ASC and/or World Skills Competition</option>
                                <option value="6"  {{ (isset($previousData->b2a41) && $previousData->b2a41 == 6) ? 'selected' : '' }}>6 - The Region participated in PNSC</option>
                                <option value="0"  {{ (isset($previousData->b2a41) && $previousData->b2a41 == 0) ? 'selected' : '' }}>0 - The Region did not participate in any of the competition</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2a41_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a41_remarks) ? $previousData->b2a41_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2.A.4.2 Awards received at the national level
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                            @php
                            // Define the specific ID you're looking for
                            $specificIds = [133, 134, 135, 136];
                            // Find the file with the specific ID
                            $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                        @endphp
                        <!-- Added one more <td class="pb-8"> element -->
                            <td class="pb-8" style="text-align: center;">
                                @foreach ($specificIds as $id)
                                    @php
                                        $specificFile = $specificFiles->get($id);
                                    @endphp
                                    @if ($specificFile)
                                        <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                    @else
                                        No file available for ID {{ $id }}
                                    @endif
                                @endforeach
                            </td>
                        <td class="pb-4 text-center">{{$ws->b2a42}}</td>
                        <td class="pb-4 text-center">{{$ws->b2a42_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2a42" data-field="b2a42">
                                <option value="">Select Score</option>
                                <option value="7"  {{ (isset($previousData->b2a42) && $previousData->b2a42 == 7) ? 'selected' : '' }}>7 - The Region received award/recognition at the national level</option>
                                <option value="0"  {{ (isset($previousData->b2a42) && $previousData->b2a42 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2a42_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a42_remarks) ? $previousData->b2a42_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2.A.4.3 Awards received at the international level
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                            @php
                            // Define the specific ID you're looking for
                            $specificIds = [133, 134, 135];
                            // Find the file with the specific ID
                            $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                        @endphp
                        <!-- Added one more <td class="pb-8"> element -->
                            <td class="pb-8" style="text-align: center;">
                                @foreach ($specificIds as $id)
                                    @php
                                        $specificFile = $specificFiles->get($id);
                                    @endphp
                                    @if ($specificFile)
                                        <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                    @else
                                        No file available for ID {{ $id }}
                                    @endif
                                @endforeach
                            </td>
                        <td class="pb-4 text-center">{{$ws->b2a43}}</td>
                        <td class="pb-4 text-center">{{$ws->b2a43_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2a43" data-field="b2a43">
                                <option value="">Select Score</option>
                                <option value="10"  {{ (isset($previousData->b2a43) && $previousData->b2a43 == 10) ? 'selected' : '' }}>10 - The Region received award/recognition at the international level</option>
                                <option value="0"  {{ (isset($previousData->b2a43) && $previousData->b2a43 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2a43_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a43_remarks) ? $previousData->b2a43_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.B. Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.1. TVET enrolment and graduates by delivery mode- community-based</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [229];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$po->b2b1}}</td>
                        <td class="pb-4 text-center">{{$po->b2b1_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2b1" data-field="b2b1">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2b1) && $previousData->b2b1 == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2b1) && $previousData->b2b1 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2b1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b1_remarks) ? $previousData->b2b1_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.2. Skills Training Programs for Special Clients</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [92];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$romo->b2b2}}</td>
                        <td class="pb-4 text-center">{{$romo->b2b2_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2b2" data-field="b2b2">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2b2) && $previousData->b2b2 == 10) ? 'selected' : '' }}>10 - At least 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women)</option>
                                <option value="0"  {{ (isset($previousData->b2b2) && $previousData->b2b2 == 0) ? 'selected' : '' }}>0 - Less than 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women)  </option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2b2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b2_remarks) ? $previousData->b2b2_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.3. Number of Scholarship Programs enrolled</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [150];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$romo->b2b3}}</td>
                        <td class="pb-4 text-center">{{$romo->b2b3_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2b3" data-field="b2b3">
                                <option value="">Select score</option>
                                <option value="35"  {{ (isset($previousData->b2b3) && $previousData->b2b3 == 35) ? 'selected' : '' }}>35 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2b3) && $previousData->b2b3 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2b3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b3_remarks) ? $previousData->b2b3_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.4. Advocacy program to promote the importance of TVET in communities and the roles of CTECs in LGUs</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Reports on meetings conducted</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [111];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$romo->b2b4}}</td>
                        <td class="pb-4 text-center">{{$romo->b2b4_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2b4" data-field="b2b4">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2b4) && $previousData->b2b4 == 10) ? 'selected' : '' }}>10 - At least 10% of the municipalities in each Province in the Region have been given orientation on Devolution of TVET</option>
                                <option value="0"  {{ (isset($previousData->b2b4) && $previousData->b2b4 == 0) ? 'selected' : '' }}>0 - Less than 10% of the municipalities in each Province in the Region have been given orientation on Devolution of TVET</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2b4_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b4_remarks) ? $previousData->b2b4_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.5. Communications/programs/advocacy on Gender and Development (GAD)</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: After activity report on GAD related programs conducted</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$po->b2b5}}</td>
                        <td class="pb-4 text-center" style="white-space: normal; word-break: break-all; max-width: 300px;">https://docs.google.com/spreadsheets/d/13cQOpX8oVXBdsi5hAL5WlP2_D5RAVK71s7a2P5CnY6I/edit?fbclid=IwY2xjawEXzHRleHRuA2FlbQIxMAABHTiZ_E41aeJPwWWCL7XRVb0X8ltVgwkRi7Ae-wZTQfOY31EDMV3XRfw4NQ_aem_Zq2WqLlhJaCsxSbBxznfRA&gid=0#gid=0</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2b5" data-field="b2b5">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2b5) && $previousData->b2b5 == 10) ? 'selected' : '' }}>10 - All TTIs and the PO have conducted programs/activities related to GAD</option>
                                <option value="0"  {{ (isset($previousData->b2b5) && $previousData->b2b5 == 0) ? 'selected' : '' }}>0 - Not all TTIs and the PO have conducted programs/activities related to GAD</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2b5_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b5_remarks) ? $previousData->b2b5_remarks : '' }}">
                        </td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.C. Upscale Technical Education and Skills Development and Certification to Higher PQF Levels</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.1. Number of Programs Registered</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: MIS 02-04</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [235];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$co->b2c1}}</td>
                        <td class="pb-4 text-center">{{$co->b2c1_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2c1" data-field="b2c1">
                                <option value="">Select score</option>
                                <option value="15"  {{ (isset($previousData->b2c1) && $previousData->b2c1 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2c1) && $previousData->b2c1 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2c1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c1_remarks) ? $previousData->b2c1_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.2. Process Cycle Time for CTPR Issuance (3 days)</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monthly Report on Program Registration</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [234, 234];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$co->b2c2}}</td>
                        <td class="pb-4 text-center">{{$co->b2c2_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2c2" data-field="b2c2">
                                <option value="">Select score</option>
                                <option value="15"  {{ (isset($previousData->b2c2) && $previousData->b2c2 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2c2) && $previousData->b2c2 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2c2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c2_remarks) ? $previousData->b2c2_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.3. Number of skilled workers assessed for certification</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report RWAC Report from T2MIS; Signed Validated OPCR</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b2c3}}</td>
                        <td class="pb-4 text-center">{{$co->b2c3_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2c3" data-field="b2c3">
                                <option value="">Select score</option>
                                <option value="15"  {{ (isset($previousData->b2c3) && $previousData->b2c3 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2c3) && $previousData->b2c3 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2c3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c3_remarks) ? $previousData->b2c3_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.4. Number of New Assessment Centers</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Registry of Accredited Assessment Centers from T2MIS; Signed Validated OPCR</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [155];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$co->b2c4}}</td>
                        <td class="pb-4 text-center">{{$co->b2c4_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2c4" data-field="b2c4">
                                <option value="">Select score</option>
                                <option value="15"  {{ (isset($previousData->b2c4) && $previousData->b2c4 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2c4) && $previousData->b2c4 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2c4_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c4_remarks) ? $previousData->b2c4_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.5. Number of New Assessors</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Registry of Accredited Assessors from T2MIS; Signed Validated OPCR</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b2c5}}</td>
                        <td class="pb-4 text-center">{{$co->b2c5_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2c5" data-field="b2c5">
                                <option value="">Select score</option>
                                <option value="15"  {{ (isset($previousData->b2c5) && $previousData->b2c5 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2c5) && $previousData->b2c5 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2c5_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c5_remarks) ? $previousData->b2c5_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.6. Establishment of Assessment Centers for NC Level IV Qualification</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Report (CO), Certificate of Accreditation for Level IV Assessment Centers (ROs)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b2c6}}</td>
                        <td class="pb-4 text-center">{{$co->b2c6_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2c6" data-field="b2c6">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2c6) && $previousData->b2c6 == 10) ? 'selected' : '' }}>
                                    10 - For Large Regions: At least 3 Assessment Centers for NC Level IV Qualifications
                                </option>
                                <option value="10"  {{ (isset($previousData->b2c6) && $previousData->b2c6 == 10) ? 'selected' : '' }}>
                                    10 - For Medium Regions: At least 2 Assessment Centers for NC Level IV Qualifications
                                </option>
                                <option value="10"  {{ (isset($previousData->b2c6) && $previousData->b2c6 == 10) ? 'selected' : '' }}>
                                    10 - For Small Regions: At least 1 Assessment Centers for NC Level IV Qualifications
                                </option>
                                <option value="0"  {{ (isset($previousData->b2c6) && $previousData->b2c6 == 0) ? 'selected' : '' }}>
                                    0 - For Large Regions: Less than 3 Assessment Centers for NC Level IV Qualifications
                                </option>
                                <option value="0"  {{ (isset($previousData->b2c6) && $previousData->b2c6 == 0) ? 'selected' : '' }}>
                                    0 - For Medium Regions: Less than 2 Assessment Centers for NC Level IV Qualifications
                                </option>
                                <option value="0"  {{ (isset($previousData->b2c6) && $previousData->b2c6 == 0) ? 'selected' : '' }}>
                                    0 - For Small Regions: No Assessment Centers for NC Level IV Qualifications
                                </option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2c6_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c6_remarks) ? $previousData->b2c6_remarks : '' }}">
                        </td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.D. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.1. TVET enrolment and graduates by delivery mode - institution-based</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from T2MIS</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [230];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$po->b2d1}}</td>
                        <td class="pb-4 text-center">{{$po->b2d1_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d1" data-field="b2d1">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2d1) && $previousData->b2d1 == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2d1) && $previousData->b2d1 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d1_remarks) ? $previousData->b2d1_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.2. TVET enrolment and graduates by delivery mode - enterprise-based</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from T2MIS</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [231];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$po->b2d2}}</td>
                        <td class="pb-4 text-center">{{$po->b2d2_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d2" data-field="b2d2">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2d2) && $previousData->b2d2 == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2d2) && $previousData->b2d2 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d2_remarks) ? $previousData->b2d2_remarks : '' }}">
                        </td>
                    </tr>

                    <tr>
                        <td class="font-bold">
                            <h5>B.2.D.3. World Cafe of Opportunities</h5>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                         
                            <h5>B.2.D.3.1. Implementation of WCO</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Report</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [238];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$nitesd->b2d31}}</td>
                        <td class="pb-4 text-center">{{$nitesd->b2d31_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d31" data-field="b2d31">
                                <option value="">Select score</option>
                                <option value="5"  {{ (isset($previousData->b2d31) && $previousData->b2d31 == 5) ? 'selected' : '' }}>5 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2d31) && $previousData->b2d31 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d31_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d31_remarks) ? $previousData->b2d31_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.3.2 Number of HOTS</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Report, Number of HOTS List of HOTS and their TVET qualifications</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [238];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$nitesd->b2d32}}</td>
                        <td class="pb-4 text-center">{{$nitesd->b2d32_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d32" data-field="b2d32">
                                <option value="">Select score</option>
                                <option value="5"  {{ (isset($previousData->b2d32) && $previousData->b2d32 == 5) ? 'selected' : '' }}>5 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0"  {{ (isset($previousData->b2d32) && $previousData->b2d32 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d32_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d32_remarks) ? $previousData->b2d32_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="font-bold">B.2.D.4. Institutional Awards</td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.D.4.1. TESDA Idol (Wage-employed)</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.1.1. Participation</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [46];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$plo->b2d411}}</td>
                        <td class="pb-4 text-center">{{$plo->b2d411_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d411" data-field="b2d411">
                                <option value="">Select score</option>
                                <option value="5"  {{ (isset($previousData->b2d411) && $previousData->b2d411 == 5) ? 'selected' : '' }}>5 - The Region participated in TESDA Idol (Wage-employed)</option>
                                <option value="0"  {{ (isset($previousData->b2d411) && $previousData->b2d411 == 0) ? 'selected' : '' }}>0 - The Region did not participate in TESDA Idol (Wage-employed)</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d411_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d411_remarks) ? $previousData->b2d411_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.1.2. Awards received</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [46];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$plo->b2d412}}</td>
                        <td class="pb-4 text-center">{{$plo->b2d412_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d412" data-field="b2d412">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2d412) && $previousData->b2d412 == 10) ? 'selected' : '' }}>10 - The Region received award/recognition at the national level</option>
                                <option value="0"  {{ (isset($previousData->b2d412) && $previousData->b2d412 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition at the national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d412_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d412_remarks) ? $previousData->b2d412_remarks : '' }}">
                        </td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.D.4.2. TESDA Idol (Self-employed)</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.2.1. Participation</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [46];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$plo->b2d421}}</td>
                        <td class="pb-4 text-center">{{$plo->b2d421_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d421" data-field="b2d421">
                                <option value="">Select score</option>
                                <option value="5"  {{ (isset($previousData->b2d421) && $previousData->b2d421 == 5) ? 'selected' : '' }}>5 - The Region participated in TESDA Idol (self-employed)</option>
                                <option value="0"  {{ (isset($previousData->b2d421) && $previousData->b2d421 == 0) ? 'selected' : '' }}>0 - The Region did not participate in TESDA Idol (self-employed)</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d421_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d421_remarks) ? $previousData->b2d421_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.2.2. Awards received</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [46];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$plo->b2d422}}</td>
                        <td class="pb-4 text-center">{{$plo->b2d422_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d422" data-field="b2d422">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2d422) && $previousData->b2d422 == 10) ? 'selected' : '' }}>10 - The Region received award/recognition at the national level</option>
                                <option value="0"  {{ (isset($previousData->b2d422) && $previousData->b2d422 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition at the national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d422_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d422_remarks) ? $previousData->b2d422_remarks : '' }}">
                        </td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.D.4.3. Kabalikat Awards</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.3.1. Participation</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [46];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$plo->b2d431}}</td>
                        <td class="pb-4 text-center">{{$plo->b2d431_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d431" data-field="b2d431" type="text">
                                <option value="">Select score</option>
                                <option value="5"  {{ (isset($previousData->b2d431) && $previousData->b2d431 == 5) ? 'selected' : '' }}>5 - The Region participated in Kabalikat Awards</option>
                                <option value="0"  {{ (isset($previousData->b2d431) && $previousData->b2d431 == 0) ? 'selected' : '' }}>0 - The Region did not participate in Kabalikat Awards</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d431_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d431_remarks) ? $previousData->b2d431_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.3.2. Awards received</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [46];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$plo->b2d432}}</td>
                        <td class="pb-4 text-center">{{$plo->b2d432_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d432" data-field="b2d432" type="text">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2d432) && $previousData->b2d432 == 10) ? 'selected' : '' }}>10 - The Region received award/recognition at the national level</option>
                                <option value="0"  {{ (isset($previousData->b2d432) && $previousData->b2d432 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition at the national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d432_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d432_remarks) ? $previousData->b2d432_remarks : '' }}">
                        </td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.D.4.4. Tagsanay</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.4.1. Participation</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Endorsement Memo, TESDA Order</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [224, 225];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$nitesd->b2d441}}</td>
                        <td class="pb-4 text-center">{{$nitesd->b2d441_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d441" data-field="b2d441" type="text">
                                <option value="">Select score</option>
                                <option value="5"  {{ (isset($previousData->b2d441) && $previousData->b2d441 == 5) ? 'selected' : '' }}>5 - The Region participated in the National Level Tagsanay Awards</option>
                                <option value="0"  {{ (isset($previousData->b2d441) && $previousData->b2d441 == 0) ? 'selected' : '' }}>0 - The Region did not participate in the National Level Tagsanay Awards</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d441_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d441_remarks) ? $previousData->b2d441_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.4.2. Awards received</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [223];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$nitesd->b2d442}}</td>
                        <td class="pb-4 text-center">{{$nitesd->b2d442_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d442" data-field="b2d442" type="text">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2d442) && $previousData->b2d442 == 10) ? 'selected' : '' }}>10 - The Region received award/recognition at the national level</option>
                                <option value="0"  {{ (isset($previousData->b2d442) && $previousData->b2d442 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition at the national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d442_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d442_remarks) ? $previousData->b2d442_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.5. Partnerships forged and implemented</h5>
                            <p><i>To be measured in terms of resources and increase in program outputs</i></p>
                            <p><i>CSR – partnership with private companies</i></p>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Copies of signed MOAs</p>
                        </td>
                        @php
                        // Define the specific ID based on the $user_id
                        if ($user_id == 13) {
                            $specificIds = [20];
                        } elseif ($user_id == 15) {
                            $specificIds = [41, 42];
                        } elseif ($user_id == 1) {
                            $specificIds = [28, 72, 73];
                        } elseif ($user_id == 10) {
                            $specificIds = [76, 77, 79];
                        } else {
                            $specificIds = [];
                        }
                    // Find the file with the specific ID
                    $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                @endphp
                <!-- Added one more <td class="pb-8"> element -->
                    <td class="pb-8" style="text-align: center;">
                        @foreach ($specificIds as $id)
                            @php
                                $specificFile = $specificFiles->get($id);
                            @endphp
                            @if ($specificFile)
                                <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                            @else
                                No file available for ID {{ $id }}
                            @endif
                        @endforeach
                    </td>
                        <td class="pb-4 text-center">{{$plo->b2d5}}</td>
                        <td class="pb-4 text-center">{{$plo->b2d5_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d5" data-field="b2d5" type="text">
                                <option value="">Select score</option>
                                <option value="15"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 15) ? 'selected' : '' }}>
                                    15 - For Large Region: Partnerships with three (3) or more industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies;</option>
                                <option value="15"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 15) ? 'selected' : '' }}>
                                    15- For Medium Region: Partnerships with two (2) or more industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies;</option>
                                <option value="15"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 15) ? 'selected' : '' }}>
                                    15 - For Small Region: Partnership with more than one (1) industry / private company and with continuing tie-ups for the last two (2) years with the same industry/company</option>
                                    
                                <option value="10"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 10) ? 'selected' : '' }}>
                                    10 - For Large Region: Partnerships with two (2) industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies;</option>
                                <option value="10"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 10) ? 'selected' : '' }}>
                                    10 - For Medium Region: Partnerships with one (1) industry / private company and with continuing tie-ups for the last two (2) years with the same industries/companies;</option>
                                <option value="10"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 10) ? 'selected' : '' }}>
                                    10 - For Small Region: Partnership with one (1) industry / private company and with continuing tie-ups for the last one (1) year with the same industry/company</option>

                                <option value="5"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 5) ? 'selected' : '' }}>
                                    5 - For Large Region: Partnerships with two (2) industries / private companies and with continuing tie-ups for one (1) year with the same industries/companies;</option>
                                <option value="5"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 5) ? 'selected' : '' }}>
                                    5 - For Medium Region: Partnerships with one (1) industry / private company and with continuing tie-ups for one (1) year with the same industries/companies;</option>
                                <option value="5"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 5) ? 'selected' : '' }}>
                                    5 - For Small Region: Partnership with one new (1) industry / private company</option>

                                <option value="0"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 0) ? 'selected' : '' }}>
                                    0 - For Large Region: Partnerships with less than two (2) industries / private companies;</option>
                                <option value="0"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 0) ? 'selected' : '' }}>
                                    0 - For Medium Region: No Partnerships;</option>
                                <option value="0"  {{ (isset($previousData->b2d5) && $previousData->b2d5 == 0) ? 'selected' : '' }}>
                                    0 - For Small Region: No Partnership</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d5_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d5_remarks) ? $previousData->b2d5_remarks : '' }}">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.6. Number of new EBT programs implemented in private TVIs</h5>
                            <p>(DTS, Apprenticeship, Learnership, In-company training, SIL, PAFSE)</p>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Compendium of program registration, Registry of EBT programs; T2MIS</p>
                        </td>
                        @php
                        // Define the specific ID based on the $user_id
                        if ($user_id == 13) {
                            $specificIds = [35, 36, 37, 38, 39, 40];
                        } elseif ($user_id == 6) {
                            $specificIds = [60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71];
                        } elseif ($user_id == 10) {
                            $specificIds = [80];
                        } else {
                            $specificIds = [];
                        }
                    // Find the file with the specific ID
                    $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                @endphp
                <!-- Added one more <td class="pb-8"> element -->
                    <td class="pb-8" style="text-align: center;">
                        @foreach ($specificIds as $id)
                            @php
                                $specificFile = $specificFiles->get($id);
                            @endphp
                            @if ($specificFile)
                                <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                            @else
                                No file available for ID {{ $id }}
                            @endif
                        @endforeach
                    </td>
                        <td class="pb-4 text-center">{{$plo->b2d6}}</td>
                        <td class="pb-4 text-center">{{$plo->b2d6_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2d6" data-field="b2d6" type="text">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2d6) && $previousData->b2d6 == 10) ? 'selected' : '' }}>
                                    10 - At least 30 new programs for Regions that belongs to the Large Category</option>
                                <option value="10"  {{ (isset($previousData->b2d6) && $previousData->b2d6 == 10) ? 'selected' : '' }}>
                                    10 - At least 20 new programs for Regions that belong to the Medium Category</option>
                                <option value="10"  {{ (isset($previousData->b2d6) && $previousData->b2d6 == 10) ? 'selected' : '' }}>
                                    10 - At least 10 new programs for Regions that belong to the Small Category</option>
                                <option value="0"  {{ (isset($previousData->b2d6) && $previousData->b2d6 == 0) ? 'selected' : '' }}>0 - Below the minimum number of programs per category</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="b2d6_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d6_remarks) ? $previousData->b2d6_remarks : '' }}">
                        </td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.E. Streamline and Intensify QMS in All Organizational Subsystems </td>
                    </tr>
                    <tr>
                        <td class="font-bold">B.2.E.1. Accreditation Awards (STAR Program, APACC)</td>
                    </tr>
                    <tr>
                        <td class="font-bold">B.2.E.1.1. Asia Pacific Accreditation and Certification Commission (APACC)</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.1.a. Participation
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Self Study Report submitted to APACC with letter and evidence</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b2e11a}}</td>
                        <td class="pb-4 text-center">{{$co->b2e11a_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e11a" data-field="b2e11a">
                                <option value="">Select score</option>
                                <option value="6"  {{ (isset($previousData->b2e11a) && $previousData->b2e11a == 6) ? 'selected' : '' }}>6 - The Region nominated TVI/s for APACC accreditation</option>
                                <option value="0"  {{ (isset($previousData->b2e11a) && $previousData->b2e11a == 0) ? 'selected' : '' }}>0 - The Region did not nominate any TVI/s for APACC accreditation</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e11a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e11a_remarks) ? $previousData->b2e11a_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.1.b. Awards received
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Certificate of Accreditation</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b2e11b}}</td>
                        <td class="pb-4 text-center">{{$co->b2e11b_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e11b" data-field="b2e11b">
                                <option value="">Select score</option>
                                <option value="10"  {{ (isset($previousData->b2e11b) && $previousData->b2e11b == 10) ? 'selected' : '' }}>10 - The nominated TVI/s of the Region received APACC accreditation</option>
                                <option value="0"  {{ (isset($previousData->b2e11b) && $previousData->b2e11b == 0) ? 'selected' : '' }}>0 - The nominated TVI/s of the Region did not receive APACC accreditation</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e11b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e11b_remarks) ? $previousData->b2e11b_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.E.1.2. System for TVET Accreditation and Recognition (STAR) Program</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                                B.2.E.1.2.a. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b2e12a}}</td>
                        <td class="pb-4 text-center">{{$co->b2e12a_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e12a" data-field="b2e12a">
                                <option value="">Select score</option>
                                <option value="6"  {{ (isset($previousData->b2e12a) && $previousData->b2e12a == 6) ? 'selected' : '' }}>6 - The Region participated in STAR Program</option>
                                <option value="0"  {{ (isset($previousData->b2e12a) && $previousData->b2e12a == 0) ? 'selected' : '' }}>0 - The Region did not participate in STAR Program</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e12a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e12a_remarks) ? $previousData->b2e12a_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.2.b. Awards received
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received/ Letter of result signed by the Secretary</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b2e12b}}</td>
                        <td class="pb-4 text-center">{{$co->b2e12b_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e12b" data-field="b2e12b">
                                <option value="">Select score</option>
                                <option value="20"  {{ (isset($previousData->b2e12b) && $previousData->b2e12b == 20) ? 'selected' : '' }}>20 - The Region received at least one THREE STAR Level Award</option>
                                <option value="10"  {{ (isset($previousData->b2e12b) && $previousData->b2e12b == 10) ? 'selected' : '' }}>10 - The Region received at least one TWO STAR Level Award</option>
                                <option value="5"  {{ (isset($previousData->b2e12b) && $previousData->b2e12b == 5) ? 'selected' : '' }}>5 - The Region received at least one ONE STAR Level Award</option>
                                <option value="0"  {{ (isset($previousData->b2e12b) && $previousData->b2e12b == 0) ? 'selected' : '' }}>0 - The Region did not receive a STAR Level Award</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e12b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e12b_remarks) ? $previousData->b2e12b_remarks : '' }}"></td>
                    </tr>

                    <tr>
                        <td class="font-bold">B.2.E.1.3. TESDA Seal of Integrity</td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                                B.2.E.1.3.a. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [216, 217, 218];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$co->b2e13a}}</td>
                        <td class="pb-4 text-center">{{$co->b2e13a_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e13a" data-field="b2e13a">
                                <option value="">Select score</option>
                                <option value="8"  {{ (isset($previousData->b2e13a) && $previousData->b2e13a == 8) ? 'selected' : '' }}>8 - All qualified TTIs of the region applied for the TESDA Seal of Integrity</option>
                                <option value="0"  {{ (isset($previousData->b2e13a) && $previousData->b2e13a == 0) ? 'selected' : '' }}>0 - Not all qualified TTIs of the region applied for TESDA Seal of Integrity</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e13a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e13a_remarks) ? $previousData->b2e13a_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.3.b. Awards received
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$co->b2e13b}}</td>
                        <td class="pb-4 text-center">{{$co->b2e13b_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e13b" data-field="b2e13b">
                                <option value="">Select score</option>
                                <option value="8" {{ (isset($previousData->b2e13b) && $previousData->b2e13b == 8) ? 'selected' : '' }}>8 - At least 80% of the TTIs of the Region have been awarded with the TESDA Seal of Integrity</option>
                                <option value="0" {{ (isset($previousData->b2e13b) && $previousData->b2e13b == 0) ? 'selected' : '' }}>0 - Below 80% TTIs of the Region have been awarded with TESDA Seal of Integrity</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e13b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e13b_remarks) ? $previousData->b2e13b_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                                B.2.E.2. Quality Management System Implementation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: IQA reports (TESDA Action Catalogue)</p>
                        </td>
                        <td class="pb-4 text-center">
                        <td class="pb-4 text-center">
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.2.1. Number of Active IQA Lead Auditor/s
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Inventory of Lead Auditors/Auditors (TESDA QP 03-F09)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$po->b2e21}}</td>
                        <td class="pb-4 text-center">{{$po->b2e21_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e21" data-field="b2e21">
                                <option value="">Select score</option>
                                <option value="8" {{ (isset($previousData->b2e21) && $previousData->b2e21 == 8) ? 'selected' : '' }}>8 - The Region has at least four (4) active IQA Lead Auditors/Auditors</option>
                                <option value="4" {{ (isset($previousData->b2e21) && $previousData->b2e21 == 4) ? 'selected' : '' }}>4 - The Region has two (2) to three (3) active IQA Lead Auditors/ Auditors</option>
                                <option value="0" {{ (isset($previousData->b2e21) && $previousData->b2e21 == 0) ? 'selected' : '' }}>0 - The Region has less than two (2) active IQA Lead Auditors/ Auditors</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e21_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e21_remarks) ? $previousData->b2e21_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.2.2. Timely Submission of Reports/Documents (e.g. IQA reports, Action Catalog, NAP)
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: RRRO - Monitoring of submission IQA Reports reflected on the QP-03-F12 Action Catalog - QP-03-F11</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$po->b2e22}}</td>
                        <td class="pb-4 text-center">{{$po->b2e22_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e22" data-field="b2e22">
                                <option value="">Select score</option>
                                <option value="8" {{ (isset($previousData->b2e22) && $previousData->b2e22 == 8) ? 'selected' : '' }}>8 - The Region submitted report/doc ahead of deadline</option>
                                <option value="4" {{ (isset($previousData->b2e22) && $previousData->b2e22 == 4) ? 'selected' : '' }}>4 - The Region submitted report/docs on set deadline</option>
                                <option value="0" {{ (isset($previousData->b2e22) && $previousData->b2e22 == 0) ? 'selected' : '' }}>0 - The Region submitted report/doc after set deadline</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e22_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e22_remarks) ? $previousData->b2e22_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.2.3. Percentage of Personnel Attendance to Central Office initiated QMS-related training programs
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Manning of the Regional Provincial Office versus the actual number of personnel that have attended training</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$po->b2e23}}</td>
                        <td class="pb-4 text-center">{{$po->b2e23_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e23" data-field="b2e23">
                                <option value="">Select score</option>
                                <option value="6" {{ (isset($previousData->b2e23) && $previousData->b2e23 == 6) ? 'selected' : '' }}>6 - >80% of provincial personnel attended QMS related training programs</option>
                                <option value="3" {{ (isset($previousData->b2e23) && $previousData->b2e23 == 3) ? 'selected' : '' }}>3 - 40% to 80% of provincial personnel attended QMS related training programs</option>
                                <option value="0" {{ (isset($previousData->b2e23) && $previousData->b2e23 == 0) ? 'selected' : '' }}>0 - < 40% of provincial personnel attended QMS related training programs </option>
                                <option value="1" {{ (isset($previousData->b2e23) && $previousData->b2e23 == 1) ? 'selected' : '' }}>1 - Plus (1) Point for PO initiated QMS related training programs of personnel</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e23_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e23_remarks) ? $previousData->b2e23_remarks : '' }}"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.3. Green Practices<br>
                                <i>100% implementation of programs/activities/projects related to Green Practices indicated in the submitted Institutional Development Plan (IDP)</i>
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring report, Research/ Project Proposals, Competency-based Curriculum (CBC), Program Offerings related to Agriculture, Institutional practices</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [152, 153, 156];
                        // Find the file with the specific ID
                        $specificFiles = $files->whereIn('id', $specificIds)->keyBy('id');
                    @endphp
                    <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8" style="text-align: center;">
                            @foreach ($specificIds as $id)
                                @php
                                    $specificFile = $specificFiles->get($id);
                                @endphp
                                @if ($specificFile)
                                    <button class="btn btn-sm btn-primary mb-2" onclick="openPdf('{{ asset($specificFile->file_path) }}', event)">Preview</button>
                                @else
                                    No file available for ID {{ $id }}
                                @endif
                            @endforeach
                        </td>
                        <td class="pb-4 text-center">{{$nitesd->b2e3}}</td>
                        <td class="pb-4 text-center">{{$nitesd->b2e3_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown"  name="b2e3" data-field="b2e3">
                                <option value="">Select score</option>
                                <option value="15" {{ (isset($previousData->b2e3) && $previousData->b2e3 == 15) ? 'selected' : '' }}>15 - All TTIs in the Region have implemented their plans and projects related to Green Practices</option>
                                <option value="0" {{ (isset($previousData->b2e3) && $previousData->b2e3 == 0) ? 'selected' : '' }}>0 - Not all TTIs in the Region have implemented their plans and projects related to Green Practices</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="b2e3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e3_remarks) ? $previousData->b2e3_remarks : '' }}"></td>
                    </tr>
                    
                   

                    <tr>
                        <td class="pb-4"></td>
                        <td class="pb-4"></td>
                        <td class="pb-4"><b>Total Score</b></td>
                        <td class="pb-4 text-center">{{$nominee->criteria_b}}</td>
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





