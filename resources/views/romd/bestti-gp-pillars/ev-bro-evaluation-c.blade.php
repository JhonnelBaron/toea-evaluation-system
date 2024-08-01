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
    
    <div class="flex items-center justify-center">
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
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-c', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria C</span>
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


    
      
    <form id="saveChangesForm" method="POST" action="{{ route('storeBroC') }}">
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
                        <td class="font-bold">C. Administrative and Support Services</td>
                    </tr>
                    <tr>
                        <td class="pb-8">
                            C.1. Budget Utilization Rate (BUR)
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring logbook/registry</p>
                        </td>
                        
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [115];
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
                        <td class="pb-4 text-center">{{$fms->c1}}</td>
                        <td class="pb-4 text-center">{{$fms->c1_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c1" data-field="c1">
                                <option value="">Select score</option>
                                <option value="25" {{ (isset($previousData->c1) && $previousData->c1 == 25) ? 'selected' : '' }}>25 - 100% of budget utilized</option>
                                <option value="10" {{ (isset($previousData->c1) && $previousData->c1 == 10) ? 'selected' : '' }}>10 - 90% - 99% of budget utilized</option>
                                <option value="0" {{ (isset($previousData->c1) && $previousData->c1 == 0) ? 'selected' : '' }}>0 - 89% and below of budget utilized</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c1_remarks) ? $previousData->c1_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Implementation of Agency Action Plan -->
                    <tr>
                        <td class="pb-8">
                            C.2. Implementation of Agency Action Plan and Status of Implementation (AAPSI) on the Prior Years Audit Recommendation<br>
                            <i>80% acted upon (either partially or fully implemented)</i>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Agency Action Plan and Status of Implementation (AAPSI)</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        if ($user_id == 4) {
                                $specificIds = [159];
                            } elseif ($user_id == 2) {
                                $specificIds = [243];
                            } elseif ($user_id == 11) {
                                $specificIds = [146];
                            } elseif ($user_id == 13) {
                                $specificIds = [171];
                            } elseif ($user_id == 15) {
                                $specificIds = [132];
                            } elseif ($user_id == 3) {
                                $specificIds = [183];
                            } elseif ($user_id == 1) {
                                $specificIds = [157];
                            } elseif ($user_id == 6) {
                                $specificIds = [142, 143, 181];
                            } elseif ($user_id == 10) {
                                $specificIds = [131];
                            } elseif ($user_id == 5) {
                                $specificIds = [195];
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
                        <td class="pb-4 text-center">{{$fms->c2}}</td>
                        <td class="pb-4 text-center">{{$fms->c2_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c2" data-field="c2">
                                <option value="">Select score</option>
                                <option value="25" {{ (isset($previousData->c2) && $previousData->c2 == 25) ? 'selected' : '' }}>25 - 100% acted upon (either partially or fully implemented)</option>
                                <option value="15" {{ (isset($previousData->c2) && $previousData->c2 == 15) ? 'selected' : '' }}>15 - 90% - 99% acted upon (either partially or fully implemented)</option>
                                <option value="5" {{ (isset($previousData->c2) && $previousData->c2 == 5) ? 'selected' : '' }}>5 - 80% - 89% acted upon (either partially or fully implemented)</option>
                                <option value="0" {{ (isset($previousData->c2) && $previousData->c2 == 0) ? 'selected' : '' }}>0 - 79% and below acted upon (either partially or fully implemented)</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c2_remarks) ? $previousData->c2_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Staff Development Program -->

                    <tr>
                        <td>C.3. Staff Development Program</td>
                    </tr>
                    <tr>
                        <td class="pb-8">
                            C.3.1. Employees who have attended SDP have implemented their RE-Entry Plans as scheduled
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: "Regional Work Force Development Plan (WFDP) Certificates of trainings attended</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c31}}</td>
                        <td class="pb-4 text-center">{{$as->c31_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c31" data-field="c31">
                                <option value="">Select score</option>
                                <option value="20" {{ (isset($previousData->c31) && $previousData->c31 == 20) ? 'selected' : '' }}>20 - 100% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                <option value="10" {{ (isset($previousData->c31) && $previousData->c31 == 10) ? 'selected' : '' }}>10 - 70%-99% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                <option value="0" {{ (isset($previousData->c31) && $previousData->c31 == 0) ? 'selected' : '' }}>0 - 69% and below of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c31_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c31_remarks) ? $previousData->c31_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Training Opportunities -->
                    <tr>
                        <td class="pb-8">
                            C.3.2. Training Opportunities to staff provided for CY 2023
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of plantilla positions per region, Certificates of training attended</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c32}}</td>
                        <td class="pb-4 text-center">{{$as->c32_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c32" data-field="c32">
                                <option value="">Select score</option>
                                <option value="15" {{ (isset($previousData->c32) && $previousData->c32 == 15) ? 'selected' : '' }}>15 - 100% of Employees were provided with training opportunities</option>
                                <option value="5" {{ (isset($previousData->c32) && $previousData->c32 == 5) ? 'selected' : '' }}>5 - 75%-99% of Employees were provided with training opportunities</option>
                                <option value="0" {{ (isset($previousData->c32) && $previousData->c32 == 0) ? 'selected' : '' }}>0 - 74% and below of Employees were provided with training opportunities</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c32_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c32_remarks) ? $previousData->c32_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Percentage of Personnel Attendance to Finance Related Training Programs -->
                    <tr>
                        <td class="pb-8">
                            C.3.3. Percentage of Personnel Attendance to Finance related training programs
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification:<br>
                                - List of plantilla positions per region<br>
                                - Certificates of training attended<br>
                                list of training programs, certified correct by HRMO, RO plus PO (For BRO only)</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        if ($user_id == 4) {
                                $specificIds = [97, 98];
                            } elseif ($user_id == 2) {
                                $specificIds = [104, 105];
                            } elseif ($user_id == 11) {
                                $specificIds = [163, 164];
                            } elseif ($user_id == 13) {
                                $specificIds = [165, 166, 167];
                            } elseif ($user_id == 15) {
                                $specificIds = [173, 174, 175];
                            } elseif ($user_id == 3) {
                                $specificIds = [187];
                            } elseif ($user_id == 1) {
                                $specificIds = [109, 110, 192];
                            } elseif ($user_id == 6) {
                                $specificIds = [191];
                            } elseif ($user_id == 10) {
                                $specificIds = [193];
                            } elseif ($user_id == 5) {
                                $specificIds = [180];
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
                        <td class="pb-4 text-center">{{$fms->c33}}</td>
                        <td class="pb-4 text-center">{{$fms->c33_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c33" data-field="c33">
                                <option value="">Select score</option>
                                <option value="6" {{ (isset($previousData->c33) && $previousData->c33 == 6) ? 'selected' : '' }}>6 - 80% of regional finance and budget officers/personnel attended finance related training programs</option>
                                <option value="3" {{ (isset($previousData->c33) && $previousData->c33 == 3) ? 'selected' : '' }}>3 - 40% to 79% of regional finance and budget officers/personnel attended finance related training programs</option>
                                <option value="0" {{ (isset($previousData->c33) && $previousData->c33 == 0) ? 'selected' : '' }}>0 - Less than 40% of regional finance and budget officers/personnel attended finance related training programs</option>
                                <option value="1" {{ (isset($previousData->c33) && $previousData->c33 == 1) ? 'selected' : '' }}>1 - Plus (1) Point for RO initiated Finance-related training programs for finance and budget officers/personnel </option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c33_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c33_remarks) ? $previousData->c33_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Model Employee Awards -->
                    <tr>
                        <td class="font-bold">C.4. Model Employee Awards<br></td>
                    </tr>
                    <tr>
                        <td class="font-bold">C.4.1. Model Employee for Category I Position<br></td>
                    </tr>
                    <tr>
                        <td class="pb-8">
                            C.4.1.1. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c411}}</td>
                        <td class="pb-4 text-center">{{$as->c411_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c411" data-field="c411">
                                <option value="">Select score</option>
                                <option value="4" {{ (isset($previousData->c411) && $previousData->c411 == 4) ? 'selected' : '' }}>4 - The Region submitted nominees for Category I</option>
                                <option value="0" {{ (isset($previousData->c411) && $previousData->c411 == 0) ? 'selected' : '' }}>0 - The Region did not submit nominees for Category I</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c411_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c411_remarks) ? $previousData->c411_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Awards Received Category I -->
                    <tr>
                        <td class="pb-8">
                            C.4.1.2. Awards received
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c412}}</td>
                        <td class="pb-4 text-center">{{$as->c412_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c412" data-field="c412">
                                <option value="">Select score</option>
                                <option value="4" {{ (isset($previousData->c412) && $previousData->c412 == 4) ? 'selected' : '' }}>4 - The Region has received recognition/award at national level</option>
                                <option value="0" {{ (isset($previousData->c412) && $previousData->c412 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition at national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c412_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c412_remarks) ? $previousData->c412_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Model Employee for Category II -->
                    <tr>
                        <td class="font-bold">C.4.2. Model Employee for Category II Position</td>
                    </tr>
                    <tr>
                        <td class="pb-8">
                            C.4.2.1. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c421}}</td>
                        <td class="pb-4 text-center">{{$as->c421_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c421" data-field="c421">
                                <option value="">Select score</option>
                                <option value="4" {{ (isset($previousData->c421) && $previousData->c421 == 4) ? 'selected' : '' }}>4 - The Region submitted nominees for Category II</option>
                                <option value="0" {{ (isset($previousData->c421) && $previousData->c421 == 0) ? 'selected' : '' }}>0 - The Region did not submit nominees for Category II</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c421_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c421_remarks) ? $previousData->c421_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Awards Received Category II -->
                    <tr>
                        <td class="pb-8">
                            C.4.2.2. Awards received
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c422}}</td>
                        <td class="pb-4 text-center">{{$as->c422_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c422" data-field="c422">
                                <option value="">Select score</option>
                                <option value="5" {{ (isset($previousData->c422) && $previousData->c422 == 5) ? 'selected' : '' }}>5 - The Region has received recognition/award at national level</option>
                                <option value="0" {{ (isset($previousData->c422) && $previousData->c422 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition at national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c422_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c422_remarks) ? $previousData->c422_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Model Employee for Category III -->
                    <tr>
                        <td class="font-bold">C.4.3. Model Employee for Category III Position</td>
                    </tr>
                    <tr>
                        <td class="pb-8">
                            C.4.3.1. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c431}}</td>
                        <td class="pb-4 text-center">{{$as->c431_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c431" data-field="c431">
                                <option value="">Select score</option>
                                <option value="4" {{ (isset($previousData->c431) && $previousData->c431 == 4) ? 'selected' : '' }}>4 - The Region submitted nominees for Category III</option>
                                <option value="0" {{ (isset($previousData->c431) && $previousData->c431 == 0) ? 'selected' : '' }}>0 - The Region did not submit nominees for Category III</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c431_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c431_remarks) ? $previousData->c431_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Awards Received Category III -->
                    <tr>
                        <td class="pb-8">
                            C.4.3.2. Awards received
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c432}}</td>
                        <td class="pb-4 text-center">{{$as->c432_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c432" data-field="c432">
                                <option value="">Select score</option>
                                <option value="5" {{ (isset($previousData->c432) && $previousData->c432 == 5) ? 'selected' : '' }}>5 - The Region has received recognition/award at national level</option>
                                <option value="0" {{ (isset($previousData->c432) && $previousData->c432 == 0) ? 'selected' : '' }}>0 - The Region did not receive award/recognition at national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c432_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c432_remarks) ? $previousData->c432_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for PRIME-HR Level -->
                    <tr>
                        <td class="pb-8">
                            C.5. Application for PRIME-HR Level<br>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Conferment/Certificate Awarded <br></p>
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter to CSC and other communications with regard to the requirements submitted by the region to CSC (with CSC feedback/reply letter)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-center">{{$as->c5}}</td>
                        <td class="pb-4 text-center">{{$as->c5_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c5" data-field="c5">
                                <option value="">Select score</option>
                                <option value="8" {{ (isset($previousData->c5) && $previousData->c5 == 8) ? 'selected' : '' }}>8 - The RO or PO/s in the region have applied and have been certified in higher PRIME HR Level</option>
                                <option value="4" {{ (isset($previousData->c5) && $previousData->c5 == 4) ? 'selected' : '' }}>4 - The RO or PO/s have applied for higher PRIME-HR Level</option>
                                <option value="0" {{ (isset($previousData->c5) && $previousData->c5 == 0) ? 'selected' : '' }}>0 - The RO or PO/s have not applied for higher PRIME-HR Level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c5_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c5_remarks) ? $previousData->c5_remarks : '' }}">
                        </td>
                        
                    </tr>
                    
                    <tr>
                        <td class="pb-4"></td>
                        <td class="pb-4"></td>
                        <td class="pb-4"><b>Total Score</b></td>
                        <td class="pb-4 text-center">{{$nominee->criteria_c}}</td>
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
