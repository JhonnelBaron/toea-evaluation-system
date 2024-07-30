<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ROMD Admin</title>
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
                    <h1 class="text-gray-800 font-bold text-3xl">BEST TRAINING INSTITUTION-PTC - {{$nominee}}</h1>
                </div>
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>
            
            <div class="flex items-center justify-center">
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                    <a href="{{ route('external.ti-ptc-a', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria A</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                    <a href="{{ route('external.ti-ptc-b', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-gray-200 font-bold text-xs">Criteria B</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                    <a href="{{ route('external.ti-ptc-c', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria C</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                    <a href="{{ route('external.ti-ptc-d', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria D</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                    <a href="{{ route('external.ti-ptc-e', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria E</span>
                    </a>
                </div>
            </div>
              
            <form id="saveChangesForm" method="POST" action="{{ route('storePtcB') }}">
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
                                <th class="border border-gray-300 p-2 w-5">External Validator Rating</th>
                                <th class="border border-gray-300 p-2 w-32">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
        
                          
                                                    <!-- BEST TI PTC CRITERIA B -->
                                                    {{-- ph else if isBestTIB && in_array($submission['category'], ['PTC']--}}
        
                                                    <tr>
                                                        <td class="pb-8"><b>B.1. Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.1.A Implementation of recognized/aligned PQF level 4 or Level 5 programs</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Certificates of Recognition for PQF Level 4 or Level 5 with list of enrollees) </p></td>
                                                        <td class="pb-8">
                                                            @if($data->b1a_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1a_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb1a_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb1a_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b1a" data-field="b1a" placeholder="Input your initial score">
                                                                        <option value="">Select score</option>
                                                                        <option value="18" {{ (isset($previousData->b1a) && $previousData->b1a == 18) ? 'selected' : '' }}>18 - The TTI has implemented at least 2 recognized/aligned with PQF level 4 or level 5 programs</option>
                                                                        <option value="9" {{ (isset($previousData->b1a) && $previousData->b1a == 9) ? 'selected' : '' }}>9 - The TTI has implemented 1 recognized/aligned with PQF level 4 or level 5 program</option>
                                                                        <option value="0" {{ (isset($previousData->b1a) && $previousData->b1a == 0) ? 'selected' : '' }}>0 - The TTI has not implemented any recognized/aligned with PQF level nor level 5 program</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b1a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1a_remarks) ? $previousData->b1a_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.1.B. Development of CS and CBC on Diploma program, integrating STEM/21st Century Skills</td>
                                                        <td class="pb-8"></td>
                                                        <td class="pb-8">
                                                            @if($data->b1b_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1b_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb1b_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb1b_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b1b" data-field="b1b" placeholder="Input your initial score">
                                                                        <option value="">Select score</option>
                                                                        <option value="7" {{ (isset($previousData->b1b) && $previousData->b1b == 7) ? 'selected' : '' }}>7 - The TTI has developed at least 1 CS or CBC on Diploma Program with integrated STEM/21st Century Skills</option>
                                                                        <option value="0" {{ (isset($previousData->b1b) && $previousData->b1b == 0) ? 'selected' : '' }}>0 - No Communication Plan was prepared and not all communications activities were implemented</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b1b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1b_remarks) ? $previousData->b1b_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.1.C. Participation and Awards from Skills Competition</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.1.C.1. Participation</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Terminal Reports/After Activity reports</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b1c1_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1c1_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb1c1_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb1c1_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b1c1" data-field="b1c1">
                                                                        <option value="">Select score</option>
                                                                        <option value="6" {{ (isset($previousData->b1c1) && $previousData->b1c1 == 6) ? 'selected' : '' }}>6 - The TTI participated in all competitions (PNSC, and ASC or World Skills Competition)</option>
                                                                        <option value="3" {{ (isset($previousData->b1c1) && $previousData->b1c1 == 3) ? 'selected' : '' }}>3 - The TTI participated in PNSC</option>
                                                                        <option value="0" {{ (isset($previousData->b1c1) && $previousData->b1c1 == 0) ? 'selected' : '' }}>0 - The TTI did not participate in any of the competition</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b1c1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1c1_remarks) ? $previousData->b1c1_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.1.C.2. Awards received at the national level</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p> </td>
                                                        <td class="pb-8">
                                                            @if($data->b1c2_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1c2_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb1c2_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb1c2_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b1c2" data-field="b1c2">
                                                                        <option value="">Select score</option>
                                                                        <option value="10" {{ (isset($previousData->b1c2) && $previousData->b1c2 == 10) ? 'selected' : '' }}>10 - The TTI received award/recognition at the national level</option>
                                                                        <option value="0" {{ (isset($previousData->b1c2) && $previousData->b1c2 == 0) ? 'selected' : '' }}>0 - The TTI did not receive award/recognition</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b1c2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1c2_remarks) ? $previousData->b1c2_remarks : '' }}"></td>           
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.1.C.3 Awards received at the international level</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b1c3_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1c3_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb1c3_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb1c3_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b1c3" data-field="b1c3">
                                                                        <option value="">Select score</option>
                                                                        <option value="10" {{ (isset($previousData->b1c3) && $previousData->b1c3 == 10) ? 'selected' : '' }}>10 - The TTI received award/recognition at the international level</option>
                                                                        <option value="0" {{ (isset($previousData->b1c3) && $previousData->b1c3 == 0) ? 'selected' : '' }}>0 - The TTI did not receive award/recognition</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b1c3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1c3_remarks) ? $previousData->b1c3_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.1.D Advancement through Innovations and Researches</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.1.D.1. Development of policy or technology research proposals</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Copy of memo/email submitting its Technology Research/es</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b1d1_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b1d1_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb1d1_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb1d1_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b1d1" data-field="b1d1">
                                                                        <option value="">Select score</option>
                                                                        <option value="10" {{ (isset($previousData->b1d1) && $previousData->b1d1 == 10) ? 'selected' : '' }}>10 - The TTI has submitted a technology research</option>
                                                                        <option value="0" {{ (isset($previousData->b1d1) && $previousData->b1d1 == 0) ? 'selected' : '' }}>0 - The TTI has not submitted a technology research</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b1d1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b1d1_remarks) ? $previousData->b1d1_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.2. Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.A. UAQTEA Scholarship Program</td>
                                                        <td class="pb-8"></td>
                                                        <td class="pb-8">
                                                            @if($data->b2a_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2a_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2a_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2a_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2a" data-field="b2a">
                                                                        <option value="">Select score</option>
                                                                        <option value="15" {{ (isset($previousData->b2a) && $previousData->b2a == 15) ? 'selected' : '' }}>15 - TTI fully implemented UAQTEA Program (Qualification Maps)</option>
                                                                        <option value="0" {{ (isset($previousData->b2a) && $previousData->b2a == 0) ? 'selected' : '' }}>0 - TTI did not fully implement UAQTEA Program (Qualification Maps)</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2a_remarks) ? $previousData->b2a_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.B. Skills Training for Drug Dependents</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b2b_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2b_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2b_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2b_remarks}}</td>
                                                        <td class="pb-8"> <select class="form-control mb-1 score-dropdown" name="b2b" data-field="b2b">
                                                                        <option value="">Select score</option>
                                                                        <option value="6" {{ (isset($previousData->b2b) && $previousData->b2b == 6) ? 'selected' : '' }}>6 - The TTI has at least 5 programs conducted</option>
                                                                        <option value="0" {{ (isset($previousData->b2b) && $previousData->b2b == 0) ? 'selected' : '' }}>0 - The TTI has less than 5 programs conducted</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2b_remarks) ? $previousData->b2b_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.C. Skills Training for Inmates and their Families</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b2c_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2c_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2c_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2c_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2c" data-field="b2c">
                                                                        <option value="">Select score</option>
                                                                        <option value="6" {{ (isset($previousData->b2c) && $previousData->b2c == 6) ? 'selected' : '' }}>6 - The TTI has at least 2 programs conducted</option>
                                                                        <option value="0" {{ (isset($previousData->b2c) && $previousData->b2c == 0) ? 'selected' : '' }}>0 - The TTI has less than 2 programs conducted</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2c_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2c_remarks) ? $previousData->b2c_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.D. Special Skills Programs for IPs</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b2d_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2d_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2d_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2d_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2d" data-field="b2d">
                                                                        <option value="">Select score</option>
                                                                        <option value="6" {{ (isset($previousData->b2d) && $previousData->b2d == 6) ? 'selected' : '' }}>6 - The TTI has at least 2 programs conducted</option>
                                                                        <option value="0" {{ (isset($previousData->b2d) && $previousData->b2d == 0) ? 'selected' : '' }}>0 - The TTI has less than 2 programs conducted</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2d_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2d_remarks) ? $previousData->b2d_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.E. Expanded Training Program for Women and PWDs</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b2e_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2e_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2e_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2e_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2e" data-field="b2e">
                                                                        <option value="">Select score</option>
                                                                        <option value="6" {{ (isset($previousData->b2e) && $previousData->b2e == 6) ? 'selected' : '' }}>6 - The TTI has at least 2 programs conducted</option>
                                                                        <option value="0" {{ (isset($previousData->b2e) && $previousData->b2e == 0) ? 'selected' : '' }}>0 - The TTI has less than 2 programs conducted</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2e_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2e_remarks) ? $previousData->b2e_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.F. Re-skilling/Upskilling of OFWs</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b2f_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2f_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2f_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2f_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2f" data-field="b2f">
                                                                        <option value="">Select score</option>
                                                                        <option value="10" {{ (isset($previousData->b2f) && $previousData->b2f == 10) ? 'selected' : '' }}>10 - The TTI has at least two (2) programs conducted</option>
                                                                        <option value="0" {{ (isset($previousData->b2f) && $previousData->b2f == 0) ? 'selected' : '' }}>0 - The TTI has less than two (2) programs conducted</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2f_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2f_remarks) ? $previousData->b2f_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.G. Graduates of TTI - Institution-based</td>
                                                        <td class="pb-8"></td>
                                                        <td class="pb-8">
                                                            @if($data->b2g_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2g_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2g_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2g_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2g" data-field="b2g">
                                                                        <option value="">Select score</option>
                                                                        <option value="40" {{ (isset($previousData->b2g) && $previousData->b2g == 40) ? 'selected' : '' }}>40 - The accomplishment rate based on set target is at 100% and above</option>
                                                                        <option value="25" {{ (isset($previousData->b2g) && $previousData->b2g == 25) ? 'selected' : '' }}>25 - The accomplishment rate based on set target is 75% - 99.99%</option>
                                                                        <option value="10" {{ (isset($previousData->b2g) && $previousData->b2g == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is 50% - 74.99%</option>
                                                                        <option value="0" {{ (isset($previousData->b2g) && $previousData->b2g == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 50%</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2g_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2g_remarks) ? $previousData->b2g_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.H. Graduates of TTI - Enterprise-based</td>
                                                        <td class="pb-8"></td>
                                                        <td class="pb-8">
                                                            @if($data->b2h_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2h_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2h_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2h_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2h" data-field="b2h">
                                                                        <option value="">Select score</option>
                                                                        <option value="15" {{ (isset($previousData->b2h) && $previousData->b2h == 15) ? 'selected' : '' }}>15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                        <option value="10" {{ (isset($previousData->b2h) && $previousData->b2h == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is 75% - 99.99%</option>
                                                                        <option value="5" {{ (isset($previousData->b2h) && $previousData->b2h == 5) ? 'selected' : '' }}>5 - The accomplishment rate based on set target is 50% - 74.99%</option>
                                                                        <option value="0" {{ (isset($previousData->b2h) && $previousData->b2h == 0) ? 'selected' : '' }}> - The accomplishment rate based on set target is below 50%</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2h_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2h_remarks) ? $previousData->b2h_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.I. Graduates of TTI - Community-based/MTP</td>
                                                        <td class="pb-8"></td>
                                                        <td class="pb-8">
                                                            @if($data->b2i_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2i_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2i_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2i_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2i" data-field="b2i">
                                                                        <option value="">Select score</option>
                                                                        <option value="30" {{ (isset($previousData->b2i) && $previousData->b2i == 30) ? 'selected' : '' }}>30 - The accomplishment rate based on set target is at 100% and above</option>
                                                                        <option value="20" {{ (isset($previousData->b2i) && $previousData->b2i == 20) ? 'selected' : '' }}>20 - The accomplishment rate based on set target is 75% - 99.99%</option>
                                                                        <option value="10" {{ (isset($previousData->b2i) && $previousData->b2i == 10) ? 'selected' : '' }}>10 - The accomplishment rate based on set target is 50% - 74.99%</option>
                                                                        <option value="0" {{ (isset($previousData->b2i) && $previousData->b2i == 0) ? 'selected' : '' }}>0 - The accomplishment rate based on set target is below 50%</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2i_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2i_remarks) ? $previousData->b2i_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.2.J. Communications/programs/advocacy on Gender and Development</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: After activity report on GAD related programs</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b2j_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b2j_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb2j_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb2j_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b2j" data-field="b2j">
                                                                        <option value="">Select score</option>
                                                                        <option value="7" {{ (isset($previousData->b2j) && $previousData->b2j == 7) ? 'selected' : '' }}>7 - The TTI has conducted programs/activities related to GAD</option>
                                                                        <option value="0" {{ (isset($previousData->b2j) && $previousData->b2j == 0) ? 'selected' : '' }}>0 - The TTI has not conducted programs/activities related to GAD</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b2j_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b2j_remarks) ? $previousData->b2j_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.3. Upscale Technical Education and Skills Development and Certification to Higher PQF Levels</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.3.A. TVET Trainers Development Programs - TM Level II</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: TM II Certification</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b3a_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b3a_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb3a_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb3a_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b3a" data-field="b3a">
                                                                        <option value="">Select score</option>
                                                                        <option value="15" {{ (isset($previousData->b3a) && $previousData->b3a == 15) ? 'selected' : '' }}>15 - The TTI had at least one (1) certified trainer in TM Level II (any CoCs)</option>
                                                                        <option value="0" {{ (isset($previousData->b3a) && $previousData->b3a == 0) ? 'selected' : '' }}>0 - The TTI does not have certified Trainer in TM Level II (any CoCs)</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b3a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b3a_remarks) ? $previousData->b3a_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.3.B. TVET Trainers Development Programs - Industry Immersion</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: IWER Certification</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b3b_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b3b_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb3b_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb3b_remarks}}</td>
                                                        <td class="pb-8"> <select class="form-control mb-1 score-dropdown" name="b3b" data-field="b3b">
                                                                        <option value="">Select score</option>
                                                                        <option value="20" {{ (isset($previousData->b3b) && $previousData->b3b == 20) ? 'selected' : '' }}>20 - The TTI had sent at least 2 trainers for industry immersion</option>
                                                                        <option value="10" {{ (isset($previousData->b3b) && $previousData->b3b == 10) ? 'selected' : '' }}>10 - The TTI had sent at least 1 trainer for industry immersion</option>
                                                                        <option value="0" {{ (isset($previousData->b3b) && $previousData->b3b == 0) ? 'selected' : '' }}>0 - The TTI had not sent trainers for industry immersion</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b3b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b3b_remarks) ? $previousData->b3b_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.3.C. Percentage of TTI Trainers are Accredited National Competency Assessors</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of Trainers<br></td>
                                                        <td class="pb-8">
                                                            @if($data->b3c_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b3c_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb3c_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb3c_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b3c" data-field="b3c">
                                                                        <option value="">Select score</option>
                                                                        <option value="20" {{ (isset($previousData->b3c) && $previousData->b3c == 20) ? 'selected' : '' }}>20 - 70% of the TTI trainers are accredited National Competency Assessors</option>
                                                                        <option value="10" {{ (isset($previousData->b3c) && $previousData->b3c == 10) ? 'selected' : '' }}>10 - 50-69.99% of the TTI trainers are accredited National Competency Assessors</option>
                                                                        <option value="0" {{ (isset($previousData->b3c) && $previousData->b3c == 0) ? 'selected' : '' }}>0 - 49.99% and below of the TTI trainers are accredited National Competency Assessors</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b3c_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b3c_remarks) ? $previousData->b3c_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.3.D. Percentage of TTI's registered programs (WTR) with Accredited Assessment Center</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Copies of CTPRs <br>
                                                                        List of Registered Programs <br>
                                                                        List of Accredited ACs <br></td></p>  
                                                        <td class="pb-8">
                                                            @if($data->b3d_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b3d_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb3d_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb3d_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b3d" data-field="b3d">
                                                                        <option value="">Select score</option>
                                                                        <option value="20" {{ (isset($previousData->b3d) && $previousData->b3d == 20) ? 'selected' : '' }}>20 - 50% of the TTI's registered programs with Accredited Assessment Center</option>
                                                                        <option value="10" {{ (isset($previousData->b3d) && $previousData->b3d == 10) ? 'selected' : '' }}>10 - 30-49.99% of the TTI's registered programs with Accredited Assessment Center</option>
                                                                        <option value="0" {{ (isset($previousData->b3d) && $previousData->b3d == 0) ? 'selected' : '' }}>0 - 29.99% and below of the TTI's registered programs with Accredited Assessment Center</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b3d_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b3d_remarks) ? $previousData->b3d_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.3.E. Percentage of TTI Graduates in WTR Programs assessed</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: RWAC</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b3e_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b3e_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb3e_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb3e_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b3e" data-field="b3e">
                                                                        <option value="">Select score</option>
                                                                        <option value="30" {{ (isset($previousData->b3e) && $previousData->b3e == 30) ? 'selected' : '' }}>30 - 100% of the TTI graduates assessed</option>
                                                                        <option value="25" {{ (isset($previousData->b3e) && $previousData->b3e == 25) ? 'selected' : '' }}>25 - 75% - 99.99% of the TTI graduates assessed</option>
                                                                        <option value="20" {{ (isset($previousData->b3e) && $previousData->b3e == 20) ? 'selected' : '' }}>20 - 50% - 74.99% of the TTI graduates assessed</option>
                                                                        <option value="15" {{ (isset($previousData->b3e) && $previousData->b3e == 15) ? 'selected' : '' }}>15 - 25% - 49.99% of the TTI graduates assessed</option>
                                                                        <option value="0" {{ (isset($previousData->b3e) && $previousData->b3e == 0) ? 'selected' : '' }}>0 - 24.99% and below of the TTI graduates assessed</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b3e_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b3e_remarks) ? $previousData->b3e_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.3.F. Percentage of graduates in programs with training regulations assessed, certified</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: RWAC</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b3f_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b3f_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb3f_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb3f_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b3f" data-field="b3f">
                                                                        <option value="">Select score</option>
                                                                        <option value="15" {{ (isset($previousData->b3f) && $previousData->b3f == 15) ? 'selected' : '' }}>15 - 85% and above of the TTI graduates assessed, certified</option>
                                                                        <option value="10" {{ (isset($previousData->b3f) && $previousData->b3f == 10) ? 'selected' : '' }}>10 - 75% - 84.99% of the TTI graduates assessed, certified</option>
                                                                        <option value="0" {{ (isset($previousData->b3f) && $previousData->b3f == 0) ? 'selected' : '' }}>0 - 50% - 74.99% of the TTI graduates assessed, certified</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b3f_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b3f_remarks) ? $previousData->b3f_remarks : '' }}"></td>
                                                    </tr>
        
                                                    <tr>
                                                        <td class="pb-8"><b>B.4. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.4.A Career Guidance Program</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.4.A.1. Implementation Profiling</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring/Summary of profiled learners</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b4a1_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b4a1_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb4a1_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb4a1_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b4a1" data-field="b4a1">
                                                                        <option value="">Select score</option>
                                                                        <option value="15" {{ (isset($previousData->b4a1) && $previousData->b4a1 == 15) ? 'selected' : '' }}>15 - 100% of TTI enrollees profiled</option>
                                                                        <option value="10" {{ (isset($previousData->b4a1) && $previousData->b4a1 == 10) ? 'selected' : '' }}>10 - 75% - 99.99% of TTI enrollees profiled</option>
                                                                        <option value="5" {{ (isset($previousData->b4a1) && $previousData->b4a1 == 5) ? 'selected' : '' }}>5 - 50% - 74.99% of TTI enrollees profiled</option>
                                                                        <option value="0" {{ (isset($previousData->b4a1) && $previousData->b4a1 == 0) ? 'selected' : '' }}>0 - 49.99% and below of TTI enrollees profiled</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b4a1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b4a1_remarks) ? $previousData->b4a1_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.4.A.2. Referred Graduates for Possible Employment</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of recommendation for all TTI graduates</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b4a2_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b4a2_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb4a2_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb4a2_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b4a2" data-field="b4a2">
                                                                        <option value="">Select score</option>
                                                                        <option value="15" {{ (isset($previousData->b4a2) && $previousData->b4a2 == 15) ? 'selected' : '' }}>15 - 100% of TTI graduates referred</option>
                                                                        <option value="10" {{ (isset($previousData->b4a2) && $previousData->b4a2 == 10) ? 'selected' : '' }}>10 - 75% - 99.99% of TTI graduates referred</option>
                                                                        <option value="5" {{ (isset($previousData->b4a2) && $previousData->b4a2 == 5) ? 'selected' : '' }}>5 - 50% - 74.99% of TTI graduates referred</option>
                                                                        <option value="0" {{ (isset($previousData->b4a2) && $previousData->b4a2 == 0) ? 'selected' : '' }}>0 - 49.99% and below of TTI graduates referred</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b4a2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b4a2_remarks) ? $previousData->b4a2_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.4.B. Participation in WCOs</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Report</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b4b_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b4b_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb4b_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb4b_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b4b" data-field="b4b">
                                                                        <option value="">Select score</option>
                                                                        <option value="10" {{ (isset($previousData->b4b) && $previousData->b4b == 10) ? 'selected' : '' }}>10 - The TTI participated in the Provincial or Regional WCOs</option>
                                                                        <option value="0" {{ (isset($previousData->b4b) && $previousData->b4b == 0) ? 'selected' : '' }}>0 - The TTI did not participate in the Provincial nor Regional WCOs</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b4b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b4b_remarks) ? $previousData->b4b_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.4.C. Preparation of Institutional Development Plan (IDP)</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Signed IDP</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b4c_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b4c_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb4c_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb4c_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b4c" data-field="b4c">
                                                                        <option value="">Select score</option>
                                                                        <option value="15" {{ (isset($previousData->b4c) && $previousData->b4c == 15) ? 'selected' : '' }}>15 - The TTI prepared and submitted its IDP to CO through the RO/PO</option>
                                                                        <option value="0" {{ (isset($previousData->b4c) && $previousData->b4c == 0) ? 'selected' : '' }}>0 - The TTI has not submitted its IDP</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b4c_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b4c_remarks) ? $previousData->b4c_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.4.D. Implementation of Institutional Development Plan (IDP)</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: FY 2023 Analysis of IDP Programs implemented and IDP Report</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b4d_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b4d_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb4d_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb4d_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b4d" data-field="b4d">
                                                                        <option value="">Select score</option>
                                                                        <option value="15" {{ (isset($previousData->b4d) && $previousData->b4d == 15) ? 'selected' : '' }}>15 - 100% of the target activities has been implemented</option>
                                                                        <option value="7" {{ (isset($previousData->b4d) && $previousData->b4d == 7) ? 'selected' : '' }}>7 - 85% to 99% of the activities has been implemented</option>
                                                                        <option value="0" {{ (isset($previousData->b4d) && $previousData->b4d == 0) ? 'selected' : '' }}>0 - Below 85% of the Plan has been implemented</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b4d_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b4d_remarks) ? $previousData->b4d_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.4.E. Partnerships forged and implemented (The max. score conferred to the applicant must not exceed 30 points)</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Copies of signed MOAs</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b4e_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b4e_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb4e_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb4e_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b4e" data-field="b4e">
                                                                        <option value="">Select score</option>
                                                                        <option value="25" {{ (isset($previousData->b4e) && $previousData->b4e == 25) ? 'selected' : '' }}>25 - The Dual Training System (DTS) or Dual Training Program (DTP) is implemented</option>
                                                                        <option value="18" {{ (isset($previousData->b4e) && $previousData->b4e == 18) ? 'selected' : '' }}>18 - Curriculum of TTI program offering reviewed and updated to current technology and industry practices standards</option>
                                                                        <option value="10" {{ (isset($previousData->b4e) && $previousData->b4e == 10) ? 'selected' : '' }}>10 - TTI trainers undergone industry immersion with partner companies/enterprises</option>
                                                                        <option value="0" {{ (isset($previousData->b4e) && $previousData->b4e == 0) ? 'selected' : '' }}>0 - The Dual Training System (DTS) or Dual Training Program (DTP) is not implemented</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b4e_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b4e_remarks) ? $previousData->b4e_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.5. Streamline and Intensify QMS in All Organizational Subsystems</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.5.A Institutional Awards - Tagsanay Awards</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.A.1. Participation</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Endorsement Memo, TESDA Order</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5a1_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5a1_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5a1_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5a1_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5a1" data-field="b5a1">
                                                                        <option value="">Select score</option>
                                                                        <option value="20" {{ (isset($previousData->b5a1) && $previousData->b5a1 == 20) ? 'selected' : '' }}>20 - The TTI participated in the National Level Tagsanay Awards</option>
                                                                        <option value="0" {{ (isset($previousData->b5a1) && $previousData->b5a1 == 0) ? 'selected' : '' }}>0 - The TTI did not participate in in the National Tagsanay Awards</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5a1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5a1_remarks) ? $previousData->b5a1_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.A.2. Awards received</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5a2_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5a2_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5a2_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5a2_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5a2" data-field="b5a2">
                                                                        <option value="">Select score</option>
                                                                        <option value="40" {{ (isset($previousData->b5a2) && $previousData->b5a2 == 40) ? 'selected' : '' }}>40 - The TTI received major award (top 3) at the national level</option>
                                                                        <option value="20" {{ (isset($previousData->b5a2) && $previousData->b5a2 == 20) ? 'selected' : '' }}>20 - The TTI received minor (top 8)/special award/recognition at the national level</option>
                                                                        <option value="0" {{ (isset($previousData->b5a2) && $previousData->b5a2 == 0) ? 'selected' : '' }}>0 - The TTI did not receive award/recognition at the national level</option>
                                                        </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5a2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5a2_remarks) ? $previousData->b5a2_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.5.B. Accreditation Awards (STAR Program, APACC)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.5.B.1. Asia Pacific Accreditation and Certification Commission (APACC)</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.B.1.1. Participation</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Self Study Report submitted to APACC with letter and evidence</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5b1_1_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5b1_1_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5b1_1_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5b1_1_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5b11" data-field="b5b11">
                                                                        <option value="">Select score</option>
                                                                        <option value="5" {{ (isset($previousData->b5b11) && $previousData->b5b11 == 5) ? 'selected' : '' }}>5 - The TTI applied for APACC accreditation</option>
                                                                        <option value="0" {{ (isset($previousData->b5b11) && $previousData->b5b11 == 0) ? 'selected' : '' }}>0 - TThe TTI did not apply for APACC accreditation</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5b11_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5b11_remarks) ? $previousData->b5b11_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.B.1.2. Awards received</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Certificate of Accreditation</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5b1_2_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5b1_2_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5b1_2_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5b1_2_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5b12" data-field="b5b12">
                                                                        <option value="">Select score</option>
                                                                        <option value="20" {{ (isset($previousData->b5b12) && $previousData->b5b12 == 20) ? 'selected' : '' }}>20 - The TTI received APACC-Gold accreditation</option>
                                                                        <option value="10" {{ (isset($previousData->b5b12) && $previousData->b5b12 == 10) ? 'selected' : '' }}>10 - The TTI received APACC-Silver accreditation</option>
                                                                        <option value="5" {{ (isset($previousData->b5b12) && $previousData->b5b12 == 5) ? 'selected' : '' }}>5 - The TTI received APACC-B5b12ronze accreditation</option>
                                                                        <option value="0" {{ (isset($previousData->b5b12) && $previousData->b5b12 == 0) ? 'selected' : '' }}>0 - The TTI did not receive APACC accreditation</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5b12_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5b12_remarks) ? $previousData->b5b12_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.5.B.2. System for TVET Accreditation and Recognition (STAR) Program</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.B.2.1 Participation</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5b2_1_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5b2_1_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5b2_1_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5b2_1_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5b21" data-field="b5b21">
                                                                        <option value="">Select score</option>
                                                                        <option value="10" {{ (isset($previousData->b5b21) && $previousData->b5b21 == 10) ? 'selected' : '' }}>10 - TThe TTI participated in STAR Program</option>
                                                                        <option value="0" {{ (isset($previousData->b5b21) && $previousData->b5b21 == 0) ? 'selected' : '' }}>0 - The TTI did not participate in STAR Program</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5b21_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5b21_remarks) ? $previousData->b5b21_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.B.2.2 Awards received</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received/ Letter of result signed by the Secretary</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5b2_2_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5b2_2_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5b2_2_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5b2_2_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5b22" data-field="b5b22">
                                                                        <option value="">Select score</option>
                                                                        <option value="20" {{ (isset($previousData->b5b22) && $previousData->b5b22 == 20) ? 'selected' : '' }}>20 - The TTI received at least one THREE STAR Level Award</option>
                                                                        <option value="10" {{ (isset($previousData->b5b22) && $previousData->b5b22 == 10) ? 'selected' : '' }}>10 - The TTI received at least one TWO STAR Level Award</option>
                                                                        <option value="5" {{ (isset($previousData->b5b22) && $previousData->b5b22 == 5) ? 'selected' : '' }}>5 - The TTI received at least one ONE STAR Level Award</option>
                                                                        <option value="0" {{ (isset($previousData->b5b22) && $previousData->b5b22 == 0) ? 'selected' : '' }}>0 - The TTI did not receive a STAR Level Award</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5b22_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5b22_remarks) ? $previousData->b5b22_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8"><b>B.5.C. TESDA Seal of Integrity</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.C.1. Participation</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office </p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5c1_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5c1_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5c1_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5c1_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5c1" data-field="b5c1">
                                                                        <option value="">Select score</option>
                                                                        <option value="8" {{ (isset($previousData->b5c1) && $previousData->b5c1 == 8) ? 'selected' : '' }}>8 - The TTI applied for the TESDA Seal of Integrity</option>
                                                                        <option value="0" {{ (isset($previousData->b5c1) && $previousData->b5c1 == 0) ? 'selected' : '' }}>0 - The TTI did not apply for TESDA Seal of Integrity</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5c1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5c1_remarks) ? $previousData->b5c1_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.C.2. Awards received</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5c2_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5c2_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5c2_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5c2_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5c2" data-field="b5c2">
                                                                        <option value="">Select score</option>
                                                                        <option value="12" {{ (isset($previousData->b5c2) && $previousData->b5c2 == 12) ? 'selected' : '' }}>12 - The TTI was awarded with the TESDA Seal of Integrity</option>
                                                                        <option value="0" {{ (isset($previousData->b5c2) && $previousData->b5c2 == 0) ? 'selected' : '' }}>0 - The TTI was not awarded with TESDA the Seal of Integrity</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5c2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5c2_remarks) ? $previousData->b5c2_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.D. Development of Procedures Manual</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Procedures manual developed</p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5d_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5d_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5d_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5d_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5d" data-field="b5d">
                                                                        <option value="">Select score</option>
                                                                        <option value="18" {{ (isset($previousData->b5d) && $previousData->b5d == 18) ? 'selected' : '' }}>18 - The TTI has developed its Procedures Manual and has been approved by the NQM</option>
                                                                        <option value="0" {{ (isset($previousData->b5d) && $previousData->b5d == 0) ? 'selected' : '' }}>0 - The TTI has no approved Procedures Manual</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5d_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5d_remarks) ? $previousData->b5d_remarks : '' }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-8">B.5.E. Green Practices (100% implementation of plans and projects related to Green Practices)</td>
                                                        <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports, Articles, Research/ Project Proposals, Competency-based Curriculum (CBC), Program Offerings related to Agriculture, Institutional practices
                                                                        </p></td>
                                                        <td class="pb-8">
                                                            @if($data->b5e_file_verification)
                                                            <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->b5e_file_verification }}', event)">Preview</button>
                                                            @else
                                                                No file submitted
                                                            @endif
                                                        </td>
                                                        <td class="pb-4 text-center">{{$data->rb5e_final_score}}</td>
                                                        <td class="pb-4 text-center">{{$data->rb5e_remarks}}</td>
                                                        <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="b5e" data-field="b5e">
                                                                        <option value="">Select score</option>
                                                                        <option value="20" {{ (isset($previousData->b5e) && $previousData->b5e == 20) ? 'selected' : '' }}>20 - 100% implementation of plans and projects related to Green Practices</option>
                                                                        <option value="0" {{ (isset($previousData->b5e) && $previousData->b5e == 0) ? 'selected' : '' }}>0 - Less 100% implementation of plans and projects related to Green Practices</option>
                                                                    </select></td>
                                                        <td class="pb-8"><input class="form-control mb-1" name="b5e_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->b5e_remarks) ? $previousData->b5e_remarks : '' }}"></td>
                                                    </tr>													
                                                    
                                                    <tr>
                                
                                <td style="padding: 15px;"></td>
                                <td style="padding: 15px;"></td>
                                <td style="padding: 15px;"><b>Total Initial Score</b></td>
                                <td style="padding: 15px;" class="text-center">{{$data->total_rfinal_score}}</td>
                                <td style="padding: 15px;"><b>Final Score: </b></td>
                                <td style="padding: 15px;"> <span id="totalScore">{{$previousData->overall_total_score ?? 0}}</span></td>
                                <td class="pb-4"><button class="btn btn-primary" id="submitButton">Save</button></td>
                              </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        </div>
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
            window.location.href = "/external/ti"; // Adjust the URL as needed
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const scoreDropdowns = document.querySelectorAll('.score-dropdown');
        const totalScoreElement = document.getElementById('totalScore');

        const updateTotalScore = () => {
            let totalScore = 0;
            
            scoreDropdowns.forEach(dropdown => {
                const selectedScore = parseInt(dropdown.value) || 0;
                totalScore += selectedScore;
            });
            
            totalScoreElement.innerText = totalScore;
        };

        scoreDropdowns.forEach(dropdown => {
            dropdown.addEventListener('change', updateTotalScore);
        });

        // Initial calculation to set the initial value correctly
        updateTotalScore();
    });
</script>
</body>
</html>


