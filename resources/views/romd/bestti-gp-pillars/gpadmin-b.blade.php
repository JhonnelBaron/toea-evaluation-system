<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pillar B</title>
    <link rel="icon" href="{{ asset('img/toea-logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
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
<body>
    <div>
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
                    <h1 class="text-gray-800 font-bold text-3xl">GALING PROBINSYA - {{$province}}</h1>
                </div>
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>
            
            <div class="flex items-center justify-center ml-6">
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.gp-a', ['id' => $user_id]) }}"" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria A</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.gp-b', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-gray-200 font-bold text-xs">Criteria B</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.gp-c', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria C</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.gp-d', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria D</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.gp-e', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria E</span>
                    </a>
                </div>
            </div>
            
              
              
            <form id="saveChangesForm" method="POST" action="{{ route('storeGpB') }}">
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
                            <!-- GALING PROBINSYA CRITERIA B -->
                            <tr>
                                <td class="pb-4"><b>B.1. Performance based on the General Appropriations Act (GAA)</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.A. Number of Provincial TESD plans formulated/updated</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Submission of the Regional and Provincial TESD plans with cover memo</p></td>
                                <td style="text-align: center;">
                                    @if($data->b1a_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1a_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1a_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1a" data-field="b1a" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15"  {{ (isset($previousData->b1a) && $previousData->b1a == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0"  {{ (isset($previousData->b1a) && $previousData->b1a == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1a_remarks) ? $previousData->b1a_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.B. 94% stakeholders who rated policies/plans as good or better</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Report on the User’s Feedback Survey with summary and percentage signed by the RD</p></td>
                                <td style="text-align: center;">
                                    @if($data->b1b_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1b_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1b_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1b" data-field="b1b" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b1b) && $previousData->b1b == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b1b) && $previousData->b1b == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1b_remarks) ? $previousData->b1b_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.C. 100% of registered TVET programs audited</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on the duly accomplished TESDA-OP-CO-02-F06-RO Form <br>
                                    Duly signed compliance audit reports<br>
                                    Summary of audited programs<br>
                                    Closure reports<br>
                                    Validated OPCR</p></td>
                                <td style="text-align: center;">
                                    @if($data->b1c_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1c_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1c_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1c_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1c" data-field="b1c" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b1c) && $previousData->b1c == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b1c) && $previousData->b1c == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1c_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1c_remarks) ? $previousData->b1c_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.D. 90% of skilled workers issued with certification within 7 days of their application</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Tracking sheets (F41) - RO/PO c/o CO
                                    (with Summary Report of the percentage of accomplishment signed by the RD)</p></td>
                                <td style="text-align: center;">
                                    @if($data->b1d_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1d_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1d_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1d_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1d" data-field="b1d" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b1d) && $previousData->b1d == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b1d) && $previousData->b1d == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1d_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1d_remarks) ? $previousData->b1d_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.E. 85% compliance of TVET programs to TESDA, industry, and industry standards and requirements</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on the duly accomplished 
                                    TESDA-OP-CO-02-F06-RO Form
                                    (Summary Report with percentage of accomplishment signed by the RD)
                                </p></td>
                                <td style="text-align: center;">
                                    @if($data->b1e_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1e_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1e_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1e_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1e" data-field="b1e" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b1e) && $previousData->b1e == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b1e) && $previousData->b1e == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1e_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1e_remarks) ? $previousData->b1e_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.F. 70% of TVET graduates that undergo assessment for certification</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of mandatory assessment from T2MIS 
                                    (with Summary Report of percentage of accomplishment signed by the RD)
                                </p></td>
                                <td style="text-align: center;">
                                    @if($data->b1f_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1f_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1f_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1f_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1f" data-field="b1f" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15"  {{ (isset($previousData->b1f) && $previousData->b1f == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0"  {{ (isset($previousData->b1f) && $previousData->b1f == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1f_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1f_remarks) ? $previousData->b1f_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.G. 60% of TVET programs with tie-ups to industry</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on duly accomplished 
                                    TESDA TVET Partnership Monitoring System (TTPMS) 
                                </p></td>
                                <td style="text-align: center;">
                                    @if($data->b1g_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1g_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1g_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1g_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1g" data-field="b1g" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b1g) && $previousData->b1g == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b1g) && $previousData->b1g == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1g_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1g_remarks) ? $previousData->b1g_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.H. Number of graduates from TESD Scholarship Programs</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Signed, validated OPCR - accomplishment to be evaluated by the ROMO</p></td>
                                <td style="text-align: center;">
                                    @if($data->b1h_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1h_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1h_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1h_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1h" data-field="b1h" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="35" {{ (isset($previousData->b1h) && $previousData->b1h == 35) ? 'selected' : '' }}>35 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b1h) && $previousData->b1h == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1h_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1h_remarks) ? $previousData->b1h_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.1.I. 76.30% of graduates from technical education and skills development scholarship programs that were employed</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on Result on the Survey on Employability of TVET graduates under TWSP, PESFA and STEP (SETG)
                                </p></td>
                                <td style="text-align: center;">
                                    @if($data->b1i_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1i_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb1i_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1i_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b1i" data-field="b1i" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b1i) && $previousData->b1i == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b1i) && $previousData->b1i == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b1i_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1i_remarks) ? $previousData->b1i_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2. Implementation of the TESDA Corporate Plan</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.A. Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.A.1. Advancement through Innovations and Researches</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on the endorsement/submission of policy/technology research/es signed by the RD Researches submitted to the NITESD</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2a1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2a1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2a1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2a1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2a1" data-field="b2a1" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="8" {{ (isset($previousData->b2a1) && $previousData->b2a1 == 8) ? 'selected' : '' }}>8 - The Province has submitted policy or technology research/es</option>
                                        <option value="0" {{ (isset($previousData->b2a1) && $previousData->b2a1 == 0) ? 'selected' : '' }}>0 - The Province has not suibmitted policy or technology research/es</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2a1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a1_remarks) ? $previousData->b2a1_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.A.2. Implementation of Recognized/aligned PQF level 4 or Level 5 programs</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: TAS' Certificates of Recognition for PQF Level 4 or Level 5; </p></td>
                                <td style="text-align: center;">
                                    @if($data->b2a2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2a2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>    
                                <td class="pb-4 text-center">{{$data->rb2a2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2a2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2a2" data-field="b2a2" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="8"  {{ (isset($previousData->b2a2) && $previousData->b2a2 == 8) ? 'selected' : '' }}>8 - All TAS in the Province have at least 1 recognized/aligned PQF level 4 or level 5 programs</option>
                                        <option value="0"  {{ (isset($previousData->b2a2) && $previousData->b2a2 == 0) ? 'selected' : '' }}>0 - Not all TAS in the Province have at least 1 recognized/aligned PQF level 4 or level 5 programs</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2a2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a2_remarks) ? $previousData->b2a2_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.A.3. Digitalization of TVET</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Terminal Reports/After Activity reports, List of Participants</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2a3_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2a3_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2a3_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2a3_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2a3" data-field="b2a3" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="6"  {{ (isset($previousData->b2a3) && $previousData->b2a3 == 6) ? 'selected' : '' }}>6 - The PO has institutionalized digitalization/use of electronic/online service delivery channel in the implementation of programs and/or utilize new technologies to reduce manual effort and increase productivity</option>
                                        <option value="3"  {{ (isset($previousData->b2a3) && $previousData->b2a3 == 3) ? 'selected' : '' }}>3 - The PO has developed digitalization plan to enhance existing systems using/aided by new or emerging technologies to improve performance, efficiency, and capabilities</option>
                                        <option value="0"  {{ (isset($previousData->b2a3) && $previousData->b2a3 == 0) ? 'selected' : '' }}>0 - The PO has no digitalization plan or initiatives undertaken</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2a3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a3_remarks) ? $previousData->b2a3_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.A.4. Participation and Recognition from Skills Competition</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.A.4.1. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Terminal Reports/After Activity reports, List of Participants</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2a4_1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2a4_1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2a4_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2a4_1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2a41" data-field="b2a41" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="6" {{ (isset($previousData->b2a41) && $previousData->b2a41 == 6) ? 'selected' : '' }}>6 - The Province participated in ASC and/or World Skills Competition</option>
                                        <option value="3" {{ (isset($previousData->b2a41) && $previousData->b2a41 == 3) ? 'selected' : '' }}>3 - The Province participated in PNSC</option>
                                        <option value="0" {{ (isset($previousData->b2a41) && $previousData->b2a41 == 0) ? 'selected' : '' }}>0 - The Province did not participate in any of the competition</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2a41_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a41_remarks) ? $previousData->b2a41_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.A.4.2. Awards received at the national level</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2a4_2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2a4_2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2a4_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2a4_2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2a42" data-field="b2a42" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="7" {{ (isset($previousData->b2a42) && $previousData->b2a42 == 7) ? 'selected' : '' }}>7 - The Province received award/recognition at the national level</option>
                                        <option value="0" {{ (isset($previousData->b2a42) && $previousData->b2a42 == 0) ? 'selected' : '' }}>0 - The Province did not receive award/recognition</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2a42_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a42_remarks) ? $previousData->b2a42_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.A.4.3. Awards received at the international level</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2a4_3_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2a4_3_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2a4_3_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2a4_3_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2a43" data-field="b2a43" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2a43) && $previousData->b2a43 == 10) ? 'selected' : '' }}>10 - The Province received award/recognition at the international level</option>
                                        <option value="0" {{ (isset($previousData->b2a43) && $previousData->b2a43 == 0) ? 'selected' : '' }}>0 - The Province did not receive award/recognition</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2a43_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a43_remarks) ? $previousData->b2a43_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.B. Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.B.1. TVET enrolment and graduates by delivery mode- community-based</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2b1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2b1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2b1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2b1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2b1" data-field="b2b1" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2b1) && $previousData->b2b1 == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2b1) && $previousData->b2b1 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2b1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b1_remarks) ? $previousData->b2b1_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.B.2. Skills Training Programs for Special Clients</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2b2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2b2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2b2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2b2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2b2" data-field="b2b2" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2b2) && $previousData->b2b2 == 10) ? 'selected' : '' }}>10 - At least 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women)</option>
                                        <option value="0" {{ (isset($previousData->b2b2) && $previousData->b2b2 == 0) ? 'selected' : '' }}>0 - Less than 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women)</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2b2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b2_remarks) ? $previousData->b2b2_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.B.3. Number of Scholarship Programs enrolled</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2b3_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2b3_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2b3_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2b3_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2b3" data-field="b2b3" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="35" {{ (isset($previousData->b2b3) && $previousData->b2b3 == 35) ? 'selected' : '' }}>35 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2b3) && $previousData->b2b3 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2b3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b3_remarks) ? $previousData->b2b3_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.B.4. Advocacy program to promote the importance of TVET in communities and the roles of CTECs in LGUs</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary of LGUs provided with orientation on TVET Devolution (include dates)
                                    Attachment: After Activity Reports on meetings conducted</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2b4_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2b4_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2b4_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2b4_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2b4" data-field="b2b4" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2b4) && $previousData->b2b4 == 10) ? 'selected' : '' }}>10 - At least 10% of the municipalities in the Province have been given orientation on Devolution of TVET</option>
                                        <option value="0" {{ (isset($previousData->b2b4) && $previousData->b2b4 == 0) ? 'selected' : '' }}>0 - Less than 10% of the municipalities in the Province have been given orientation on Devolution of TVET</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2b4_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b4_remarks) ? $previousData->b2b4_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.B.5. Communications/programs/advocacy on Gender and Development (GAD)</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: After activity reports on GAD related programs conducted</p> </td>
                                <td style="text-align: center;">
                                    @if($data->b2b5_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2b5_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2b5_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2b5_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2b5" data-field="b2b5" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2b5) && $previousData->b2b5 == 10) ? 'selected' : '' }}>10 - The PO have conducted programs/activities related to GAD</option>
                                        <option value="0" {{ (isset($previousData->b2b5) && $previousData->b2b5 == 0) ? 'selected' : '' }}>0 - The PO have not conducted programs/activities related to GAD</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2b5_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b5_remarks) ? $previousData->b2b5_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.C. Upscale Technical Education and Skills Development and Certification to Higher PQF Levels</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.C.1. Number of Programs Registered</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: MIS 02-04<br>
                                    List of New Programs<br>
                                    Signed Validated OPCR</p> </td>
                                <td style="text-align: center;">
                                    @if($data->b2c1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2c1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2c1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2c1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2c1" data-field="b2c1" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b2c1) && $previousData->b2c1 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2c1) && $previousData->b2c1 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2c1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c1_remarks) ? $previousData->b2c1_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.C.2. Process Cycle Time for CTPR Issuance (3 days)</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: F08
                                    Monthly Report on Program Registration</p>   </td>
                                <td style="text-align: center;">
                                    @if($data->b2c2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2c2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2c2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2c2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown"name="b2c2" data-field="b2c2" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b2c2) && $previousData->b2c2 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2c2) && $previousData->b2c2 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2c2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c2_remarks) ? $previousData->b2c2_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.C.3. Number of skilled workers assessed for certification</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report RWAC Report from T2MIS;  
                                    Signed Validated OPCR</p> </td>
                                <td style="text-align: center;">
                                    @if($data->b2c3_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2c3_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2c3_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2c3_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2c3" data-field="b2c3" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b2c3) && $previousData->b2c3 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2c3) && $previousData->b2c3 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2c3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c3_remarks) ? $previousData->b2c3_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.C.4. Number of New Assessment Centers</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Registry of Accredited Assessment Centers from T2MIS; Signed Validated OPCR</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2c4_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2c4_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2c4_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2c4_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2c4" data-field="b2c4" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15"  {{ (isset($previousData->b2c4) && $previousData->b2c4 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2c4) && $previousData->b2c4 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2c4_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c4_remarks) ? $previousData->b2c4_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.C.5. Number of New Assessors</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Registry of Accredited Assessors from T2MIS;  Signed Validated OPCR</p> </td>
                                <td style="text-align: center;">
                                    @if($data->b2c5_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2c5_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2c5_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2c5_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2c5" data-field="b2c5" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15"  {{ (isset($previousData->b2c5) && $previousData->b2c5 == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0"  {{ (isset($previousData->b2c5) && $previousData->b2c5 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2c5_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c5_remarks) ? $previousData->b2c5_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.C.6. Establishment of Assessment Centers for NC Level IV Qualification</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Registry of Accredited Assessment Centers (NC IV) from T2MIS</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2c7_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2c7_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2c7_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2c7_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2c6" data-field="b2c6" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2c6) && $previousData->b2c6 == 10) ? 'selected' : '' }}>10 - At least 1 Assessment Center for NC Level IV Qualification was established in the Province</option>
                                        <option value="0" {{ (isset($previousData->b2c6) && $previousData->b2c6 == 0) ? 'selected' : '' }}>0 - No Assessment center for NC Level IV Qualification was established in the Province</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2c6_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c6_remarks) ? $previousData->b2c6_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.D. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.1. TVET enrolment and graduates by delivery mode- institution-based</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from T2MIS
                                    Summary of Target and Accomplishment
                                    Signed Validated OPCR</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d1" data-field="b2d1" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2d1) && $previousData->b2d1 == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2d1) && $previousData->b2d1 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d1_remarks) ? $previousData->b2d1_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.2. TVET enrolment and graduates by delivery mode- enterprise-based</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from T2MIS
                                    Summary of Target and Accomplishment
                                    Signed Validated OPCR</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d2" data-field="b2d2" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2d2) && $previousData->b2d2 == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2d2) && $previousData->b2d2 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d2_remarks) ? $previousData->b2d2_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.D.3. World Cafe of Opportunities</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.3.1. Implementation of WCO</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from T2MIS
                                    Summary of Target and Accomplishment
                                    Signed Validated OPCR</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d3_1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d3_1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d3_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d3_1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d31" data-field="b2d31" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="5" {{ (isset($previousData->b2d31) && $previousData->b2d31 == 5) ? 'selected' : '' }}>5 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2d31) && $previousData->b2d31 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d31_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d31_remarks) ? $previousData->b2d31_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.3.2 Number of HOTS</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Report<br>
                                    Number of HOTS<br>
                                    List of HOTS and their TVET qualifications</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d3_2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d3_2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d3_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d3_2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d32" data-field="b2d32" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="5" {{ (isset($previousData->b2d32) && $previousData->b2d32 == 5) ? 'selected' : '' }}>5 - The accomplishment rate based on set target is at 100% and above</option>
                                        <option value="0" {{ (isset($previousData->b2d32) && $previousData->b2d32 == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 100%</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d32_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d32_remarks) ? $previousData->b2d32_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.D.4. Institutional Awards</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.D.4.1. TESDA Idol (Wage-employed)</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.4.1.1. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed </p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d4_1_1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d4_1_1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d4_1_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d4_1_1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d411" data-field="b2d411" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="5"  {{ (isset($previousData->b2d411) && $previousData->b2d411 == 5) ? 'selected' : '' }}>5 - The Province participated in TESDA Idol (Wage-employed)</option>
                                        <option value="0"  {{ (isset($previousData->b2d411) && $previousData->b2d411 == 0) ? 'selected' : '' }}>0 - The Province did not participate in TESDA Idol (Wage-employed)</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d411_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d411_remarks) ? $previousData->b2d411_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.4.1.2. Awards received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d4_1_2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d4_1_2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d4_1_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d4_1_2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d412" data-field="b2d412" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2d412) && $previousData->b2d412 == 10) ? 'selected' : '' }}>10 - The Province received award/recognition at the national level</option>
                                        <option value="0" {{ (isset($previousData->b2d412) && $previousData->b2d412 == 0) ? 'selected' : '' }}>0 - The Province did not receive award/recognition at the national level</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d412_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d412_remarks) ? $previousData->b2d412_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.D.4.2. TESDA Idol (Self-employed)</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.4.2.1. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d4_2_1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d4_2_1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d4_2_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d4_2_1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d421" data-field="b2d421" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="5" {{ (isset($previousData->b2d421) && $previousData->b2d421 == 5) ? 'selected' : '' }}>5 - The Province participated in TESDA Idol (self-employed)</option>
                                        <option value="0"{{ (isset($previousData->b2d421) && $previousData->b2d421 == 0) ? 'selected' : '' }}>0 - The Province did not participate in TESDA Idol (self-employed)</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d421_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d421_remarks) ? $previousData->b2d421_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.4.2.2. Awards received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d4_2_2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d4_2_2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d4_2_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d4_2_2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d422" data-field="b2d422" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10"  {{ (isset($previousData->b2d422) && $previousData->b2d422 == 10) ? 'selected' : '' }}>10 - The Province received award/recognition at the national level</option>
                                        <option value="0" {{ (isset($previousData->b2d422) && $previousData->b2d422 == 0) ? 'selected' : '' }}>0 - The Province did not receive award/recognition at the national level</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d422_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d422_remarks) ? $previousData->b2d422_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.D.4.3. Kabalikat Awards</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.4.3.1. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d4_3_1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d4_3_1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d4_3_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d4_3_1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d431" data-field="b2d431" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="5"  {{ (isset($previousData->b2d431) && $previousData->b2d431 == 5) ? 'selected' : '' }}>5 - The Province participated in Kabalikat Awards</option>
                                        <option value="0"  {{ (isset($previousData->b2d431) && $previousData->b2d431 == 0) ? 'selected' : '' }}>0 - The Province did not participate in Kabalikat Awards</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d431_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d431_remarks) ? $previousData->b2d431_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.4.3.2. Awards received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d4_3_2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d4_3_2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d4_3_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d4_3_2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d432" data-field="b2d432" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2d432) && $previousData->b2d432 == 10) ? 'selected' : '' }}>10 - The Province received award/recognition at the national level</option>
                                        <option value="0" {{ (isset($previousData->b2d432) && $previousData->b2d432 == 0) ? 'selected' : '' }}>0 - The Province did not receive award/recognition at the national level</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d432_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d432_remarks) ? $previousData->b2d432_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.D.4.4. Tagsanay</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.4.4.1. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Endorsement Memo, TESDA Order</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d4_4_1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d4_4_1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d4_4_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d4_4_1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d441" data-field="b2d441" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="5" {{ (isset($previousData->b2d441) && $previousData->b2d441 == 5) ? 'selected' : '' }}>5 - The Province participated in in the National Level Tagsanay Awards</option>
                                        <option value="0" {{ (isset($previousData->b2d441) && $previousData->b2d441 == 0) ? 'selected' : '' }}>0 - The Province did not participate in the National Level Tagsanay Awards</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d441_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d441_remarks) ? $previousData->b2d441_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.4.4.2. Awards received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d4_4_2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d4_4_2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d4_4_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d4_4_2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d442" data-field="b2d442" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2d442) && $previousData->b2d442 == 10) ? 'selected' : '' }}>10 - The Province received award/recognition at the national level</option>
                                        <option value="0" {{ (isset($previousData->b2d442) && $previousData->b2d442 == 0) ? 'selected' : '' }}>0 - The Province did not receive award/recognition at the national level</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d442_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d442_remarks) ? $previousData->b2d442_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.5. Partnerships forged and implemented (to be measured in terms of resources and increase in program outputs, CSR – partnership with private companies)</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Copies of signed MOAs/MOUs<br>
                                    Summary of signed MOAs/MOUs (please include dates)</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d5_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d5_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d5_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d5_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d5" data-field="b2d5" placeholder="Input your initial score">
                                        <option value="">Select score for Large Province</option>
                                        <option value="15" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 15) ? 'selected' : '' }}>15 - Partnerships with three (3) or more industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                        <option value="10" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 10) ? 'selected' : '' }}>10 - Partnerships with two (2) industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                        <option value="5" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 5) ? 'selected' : '' }}>5 - Partnerships with two (2) industries / private companies and with continuing tie-ups for one (1) year with the same industries/companies</option>
                                        <option value="0" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 0) ? 'selected' : '' }}>0 - Partnerships with less than two (2) industries / private companies</option>
                                        <option value="">Select score for Medium Province</option>
                                        <option value="15" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 15) ? 'selected' : '' }}>15 - Partnerships with two (2) or more industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                        <option value="10" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 10) ? 'selected' : '' }}>10 - Partnerships with one (1) industry / private company and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                        <option value="5" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 5) ? 'selected' : '' }}>5 - Partnerships with one (1) industry / private company and with continuing tie-ups for one (1) year with the same industries/companies</option>
                                        <option value="0" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 0) ? 'selected' : '' }}>0 - No Partnerships</option>
                                        <option value="">Select score for Small Province</option>
                                        <option value="15" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 15) ? 'selected' : '' }}>15 - Partnership with more than one (1) industry / private company and with continuing tie-ups for the last two (2) years with the same industry/company</option>
                                        <option value="10" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 10) ? 'selected' : '' }}>10 - For Small Province:</b> Partnership with one (1) industry / private company and with continuing tie-ups for the last one (1) year with the same industry/company</option>
                                        <option value="5" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 5) ? 'selected' : '' }}>5 - Partnership with one new (1) industry / private company</option>
                                        <option value="0" {{ (isset($previousData->b2d5) && $previousData->b2d5 == 0) ? 'selected' : '' }}>0 - No Partnership</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d5_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d5_remarks) ? $previousData->b2d5_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.D.6. Number of new EBT programs implemented in private TVIs (DTS, Apprenticeship, Learnership, In-company training, PAFSE)</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Copies of EBT Registration</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2d6_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d6_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2d6_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d6_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2d6" data-field="b2d6" placeholder="Input your initial score">
                                        <option value="">Select score for Large Province</option>
                                        <option value="10" {{ (isset($previousData->b2d6) && $previousData->b2d6 == 10) ? 'selected' : '' }}>10 - At least 30 new programs for Provinces that belongs to the Large Category</option>
                                        <option value="0" {{ (isset($previousData->b2d6) && $previousData->b2d6 == 0) ? 'selected' : '' }}>0 - Below the minimum number of programs per category</option>
                                        <option value="">Select score for Medium Province</option>
                                        <option value="10" {{ (isset($previousData->b2d6) && $previousData->b2d6 == 10) ? 'selected' : '' }}>10 - At least 20 new programs for Provinces that belongs to the Medium Category</option>
                                        <option value="0" {{ (isset($previousData->b2d6) && $previousData->b2d6 == 0) ? 'selected' : '' }}>0 - Below the minimum number of programs per category</option>
                                        <option value="">Select score for Small Province</option>
                                        <option value="10" {{ (isset($previousData->b2d6) && $previousData->b2d6 == 10) ? 'selected' : '' }}>10 - At least 10 new programs for Provinces that belongs to the Small Category</option>
                                        <option value="0" {{ (isset($previousData->b2d6) && $previousData->b2d6 == 0) ? 'selected' : '' }}>0 - Below the minimum number of programs per category</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2d6_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d6_remarks) ? $previousData->b2d6_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.E. Streamline and Intensify QMS in All Organizational Subsystems</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.E.1.1. Asia Pacific Accreditation and Certification Commission (APACC)</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.1.1.a. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Self Study Report submitted to APACC with letter and evidence</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e1_1a_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e1_1a_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e1_1a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e1_1a_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e11a" data-field="b2e11a" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="6" {{ (isset($previousData->b2e11a) && $previousData->b2e11a == 6) ? 'selected' : '' }}>6 - The province nominated TVI/s for APACC accreditation</option>
                                        <option value="0" {{ (isset($previousData->b2e11a) && $previousData->b2e11a == 0) ? 'selected' : '' }}>0 - The province did not nominate any TVI/s for APACC accreditation</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e11a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e11a_remarks) ? $previousData->b2e11a_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.1.1.b. Awards received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Certificate of Accreditation</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e1_1b_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e1_1b_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e1_1b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e1_1b_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e11b" data-field="b2e11b" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->b2e11b) && $previousData->b2e11b == 10) ? 'selected' : '' }}>10 - The nominated TVI/s of the province received APACC accreditation</option>
                                        <option value="0" {{ (isset($previousData->b2e11b) && $previousData->b2e11b == 0) ? 'selected' : '' }}>0 - The nominated TVI/s of the province did not receive APACC Accreditation</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e11b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e11b_remarks) ? $previousData->b2e11b_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.E.1.2. System for TVET Accreditation and Recognition (STAR) Program</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.1.2.a. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e1_2a_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e1_2a_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e1_2a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e1_2a_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e12a" data-field="b2e12a" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="6" {{ (isset($previousData->b2e12a) && $previousData->b2e12a == 6) ? 'selected' : '' }}>6 - The Province participated in STAR Program</option>
                                        <option value="0" {{ (isset($previousData->b2e12a) && $previousData->b2e12a == 0) ? 'selected' : '' }}>0 - The Province did not participate in STAR Program</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e12a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e12a_remarks) ? $previousData->b2e12a_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.1.2.b. Awards received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received/ Letter of result signed by the Secretary</p>
                                    <div class="row gx-3"></td>
                                <td style="text-align: center;">
                                    @if($data->b2e1_2b_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e1_2b_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e1_2b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e1_2b_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e12b" data-field="b2e12b" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="20" {{ (isset($previousData->b2e12b) && $previousData->b2e12b == 20) ? 'selected' : '' }}>20 - The province received at least one THREE STAR Level Award</option>
                                        <option value="10" {{ (isset($previousData->b2e12b) && $previousData->b2e12b == 10) ? 'selected' : '' }}>10 - The province received at least one TWO STAR Level Award</option>
                                        <option value="5" {{ (isset($previousData->b2e12b) && $previousData->b2e12b == 5) ? 'selected' : '' }}>5 - The province received at least one ONE STAR Level Award</option>
                                        <option value="0" {{ (isset($previousData->b2e12b) && $previousData->b2e12b == 0) ? 'selected' : '' }}>0 - The province did not receive a STAR Level Award</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e12b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e12b_remarks) ? $previousData->b2e12b_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.E.1.3. TESDA Seal of Integrity</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.1.3.a. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e1_3a_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e1_3a_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e1_3a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e1_3a_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e13a" data-field="b2e13a" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="8" {{ (isset($previousData->b2e13a) && $previousData->b2e13a == 8) ? 'selected' : '' }}>8 - All qualified TTIs of the province applied for the TESDA Seal of Integrity</option>
                                        <option value="0" {{ (isset($previousData->b2e13a) && $previousData->b2e13a == 0) ? 'selected' : '' }}>0 - Not all qualified TTIs of the province applied for TESDA Seal of Integrity</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e13a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e13a_remarks) ? $previousData->b2e13a_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.1.3.b. Awards received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e1_3b_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e1_3b_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e1_3b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e1_3b_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e13b" data-field="b2e13b" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="8" {{ (isset($previousData->b2e13b) && $previousData->b2e13b == 8) ? 'selected' : '' }}>8 - At least 80% of the qualified TTIs of the province have been awarded with the TESDA Seal of Integrity</option>
                                        <option value="0" {{ (isset($previousData->b2e13b) && $previousData->b2e13b == 0) ? 'selected' : '' }}>0 - Below 80% of the qualified TTIs of the province have been awarded with TESDA the Seal of Integrity</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e13b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e13b_remarks) ? $previousData->b2e13b_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>B.2.E.2. Quality Management System Implementation</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.2.1. Number of Active IQA Lead Auditor/s</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Inventory of Lead Auditors/Auditors (TESDA QP 03-F09)</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e2_1_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e2_1_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e2_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e2_1_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e21" data-field="b2e21" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="8" {{ (isset($previousData->b2e21) && $previousData->b2e21 == 8) ? 'selected' : '' }}>8 - The province has at least four (4) active IQA Lead Auditors/Auditors</option>
                                        <option value="4" {{ (isset($previousData->b2e21) && $previousData->b2e21 == 4) ? 'selected' : '' }}>4 - The province has two (2) to three (3) active IQA Lead Auditors/ Auditors</option>
                                        <option value="0" {{ (isset($previousData->b2e21) && $previousData->b2e21 == 0) ? 'selected' : '' }}>0 - The province has less than two (2) active IQA Lead Auditors/ Auditors</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e21_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e21_remarks) ? $previousData->b2e21_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.2.2. ISO 9001:2015 Certification (Acquisition/Re-certification of Central and Regional/Provincial Offices)</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: RRRO - Monitoring of submission. IQA Reports reflected on the QP-03-F12 Action Catalog - QP-03-F11</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e2_2_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e2_2_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e2_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e2_2_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e22" data-field="b2e22" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="8" {{ (isset($previousData->b2e22) && $previousData->b2e22 == 8) ? 'selected' : '' }}>8 - The province submitted report/doc ahead of deadline</option>
                                        <option value="4" {{ (isset($previousData->b2e22) && $previousData->b2e22 == 4) ? 'selected' : '' }}>4 - The province submitted report/docs on set deadline</option>
                                        <option value="0" {{ (isset($previousData->b2e22) && $previousData->b2e22 == 0) ? 'selected' : '' }}>0 - The province submitted report/doc after set deadline</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e22_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e22_remarks) ? $previousData->b2e22_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.2.3. Compliance to Quality Standards (QA assessment and audit reports with no major non-conformances)</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Manning of the Provincial Office versus the actual number of personnel that have attended training</p><p class="small mb-1" style="font-size: 12px;">*Plus (1) Point for ROPO initiated QMS related training programs of personnel</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e2_3_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e2_3_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e2_3_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e2_3_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e23" data-field="b2e23" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="6"  {{ (isset($previousData->b2e23) && $previousData->b2e23 == 6) ? 'selected' : '' }}>6 - >80% of provincial personnel attended QMS related training programsd</option>
                                        <option value="3"  {{ (isset($previousData->b2e23) && $previousData->b2e23 == 3) ? 'selected' : '' }}>3 - 40% to 80% of provincial personnel attended QMS related training programs</option>
                                        <option value="0"  {{ (isset($previousData->b2e23) && $previousData->b2e23 == 0) ? 'selected' : '' }}>0 - <40% of provincial personnel attended QMS related training programs</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e23_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e23_remarks) ? $previousData->b2e23_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">B.2.E.3. Green Practices (100% implementation of programs/activities/projects related to Green Practices indicated in the submitted Institutional Development Plan (IDP))</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Monitoring report, Research/ Project Proposals, Competency-based Curriculum (CBC), Program Offerings related to Agriculture, Institutional practices</p></td>
                                <td style="text-align: center;">
                                    @if($data->b2e3_file_verification)
                                        <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e3_file_verification }}', event)">Preview</button>
                                    @else
                                        No file submitted
                                    @endif
                                </td>
                                <td class="pb-4 text-center">{{$data->rb2e3_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e3_remarks}}</td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="b2e3" data-field="b2e3" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->b2e3) && $previousData->b2e3 == 15) ? 'selected' : '' }}>15 - All TTIs in the Province have implemented their plans and projects related to Green Practices</option>
                                        <option value="0" {{ (isset($previousData->b2e3) && $previousData->b2e3 == 0) ? 'selected' : '' }}>0 - Not all TTIs in the Province have implemented their plans and projects related to Green Practices</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="b2e3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e3_remarks) ? $previousData->b2e3_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td align="center"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"><b>Total Score</b></td>
                                <td class="pb-4 text-center">{{$data->total_rfinal_score}}</td>
                                <td class="pb-4"><b>Final Score</b></td>
                                <td class="pb-4"><span id="totalScore">{{$previousData->overall_total_score ?? 0}}</span></td>
                                <td class="pb-4"><button class="btn btn-primary" id="submitButton">Save</button></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            </form>
        </div>
    </div>
                    

                    
                <!-- Create group modal-->
                <!-- View PDF modal -->
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
            window.location.href = "/external/gp"; // Adjust the URL as needed
        });
    </script>
    
</body>
</html>