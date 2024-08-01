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
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="{{ route('external.bro-a', ['id' => $user_id]) }}"  class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria A</span>
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


    
      
    <form id="saveChangesForm" method="POST" action="{{ route('storeBroA') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user_id }}">
    <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
        <div id="evaluated" class="tab-content">
            <table id="regionTable" class="mx-auto">
                <thead class="bg-blue-300 text-sm">
                    <tr>
                        <th class="border border-gray-300 p-2 w-18">Category</th>
                        <th class="border border-gray-300 p-2 w-14">Means of Verification</th>
                        <th class="border border-gray-300 p-2 w-10">View Attachment</th>
                        <th class="border border-gray-300 p-2 w-10">Secretariat Rating</th>
                        <th class="border border-gray-300 p-2 w-10">Remarks</th>
                        <th class="border border-gray-300 p-2 w-20">External Validator Rating</th>
                        <th class="border border-gray-300 p-2 w-18">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Section A -->
                    <tr>
                        <td class="pb-8" colspan="7"><b>A. Good Governance Measures</b></td>
                    </tr>
                    <!-- A.1 -->
                    <tr>
                        <td class="pb-8">A.1. Compliance for Corrupt Policy</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from the TESDA Administrative Complaints Committee (ACC)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-sm w-3">{{$ld->a1}}</td>
                        <td class="pb-4 text-sm w-3">{{$ld->a1_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a1" data-field="a1">
                                <option value="">Select score</option>
                                <option value="40" {{ (isset($previousData->a1) && $previousData->a1 == 40) ? 'selected' : '' }}>40 - The Region has no personnel with pending administrative case</option>
                                <option value="0" {{ (isset($previousData->a1) && $previousData->a1 == 0) ? 'selected' : '' }}>0 - The Region has at least one pending administrative case </option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a1_remarks) ? $previousData->a1_remarks : '' }}"></td>
                    </tr>
                    <!-- A.2 -->
                    <tr>
                        <td class="pb-8 text-sm">A.2. Compliance to the TESDA Code of Conduct and Ethical Standards<br>
                            Valid Complaints against any Official or Employee on the following specific rules of conduct:<br>
                                • Fidelity to Duty<br>
                                • Conflict of Interest<br>
                                • Solicitation and Acceptance of Gifts<br>
                                • Outside Employment<br>
                                • Cronyism<br>
                                • Confidentiality<br>
                                • Post-employment<br>
                                • Procurement of Goods, Consulting Services, and Infrastructure Projects<br>
                                • Encouraging Reporting of Malpractices, Corruption, and other Protected Disclosures Valid<br>
                                • Complaints from Presidential Action Center (888), CSC-Contact Center ng Bayan, Adverse <br>National ISP Findings<br>
                                     *Valid complaints are complaints that are officially filed, received, and verified by the<br> Administrative and Complaints Committee (ACC)/Investigation Committee"</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from the TESDA Administrative Complaints Committee</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-sm w-3">{{$ld->a2}}</td>
                        <td class="pb-4 text-sm w-3">{{$ld->a2_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a2" data-field="a2">
                                <option value="">Select score</option>
                                <option value="30" {{ (isset($previousData->a2) && $previousData->a2 == 30) ? 'selected' : '' }}>30 - There are no valid complaints, findings against any Official and Employee.</option>
                                <option value="20" {{ (isset($previousData->a2) && $previousData->a2 == 20) ? 'selected' : '' }}>20 - There are 1-3 complaint/s, findings against any Official and Employee.</option>
                                <option value="10" {{ (isset($previousData->a2) && $previousData->a2 == 10) ? 'selected' : '' }}>10 - There are 4-6 complaints, findings against any Official and Employee.</option>
                                <option value="5" {{ (isset($previousData->a2) && $previousData->a2 == 5) ? 'selected' : '' }}>5 - There are 7-9 complaints, findings against any Official and Employee.</option>
                                <option value="0" {{ (isset($previousData->a2) && $previousData->a2 == 0) ? 'selected' : '' }}>0 - There are 10 or more complaints, findings against any Official and Employee.</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a2_remarks) ? $previousData->a2_remarks : '' }}"></td>
                    </tr>
                    <!-- A.3 -->
                    <tr>
                        <td class="pb-8">A.3. Resolutions of complaints emanating from the Contact Center</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification:TESDA OP AS 03 F04<br>
                                Monitoring of Complaints Received<br>
                                Record of CCU-PIAD</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-sm w-3">{{$piad->a3}}</td>
                        <td class="pb-4 text-sm w-3">{{$piad->a3_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a3" data-field="a3">
                                <option value="">Select score</option>
                                <option value="10" {{ (isset($previousData->a3) && $previousData->a3 == 10) ? 'selected' : '' }}>10 - No complaints received</option>
                                <option value="10" {{ (isset($previousData->a3) && $previousData->a3 == 10) ? 'selected' : '' }}>10 - 95% of all complaints emanating from the Contact Center have been resolved and closed within the year</option>
                                <option value="0" {{ (isset($previousData->a3) && $previousData->a3 == 0) ? 'selected' : '' }}>0 - Less than 95% of all complaints against the POs and TTIs emanating from the Contact Center have been resolved and closed within the year</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a3_remarks) ? $previousData->a3_remarks : '' }}"></td>
                    </tr>
                    <!-- A.4 -->
                    <tr>
                        <td class="pb-8">A.4. Customer Satisfaction Results<br> Customer Net Satisfaction Rating with minimum of 95%</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>- Customer Feedback Form Results (TESDA OP AS 03 F02)</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        $specificIds = [219];
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
                        <td class="pb-4 text-sm w-3">{{$piad->a4}}</td>
                        <td class="pb-4 text-sm w-3">{{$piad->a4_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a4" data-field="a4">
                                <option value="">Select score</option>
                                <option value="30" {{ (isset($previousData->a4) && $previousData->a4 == 30) ? 'selected' : '' }}>30 - Customer Net Satisfaction Rating is at 99% and above</option>
                                <option value="20" {{ (isset($previousData->a4) && $previousData->a4 == 20) ? 'selected' : '' }}>20 - Customer Net Satisfaction Rating is at 98%</option>
                                <option value="10" {{ (isset($previousData->a4) && $previousData->a4 == 10) ? 'selected' : '' }}>10 - Customer Net Satisfaction Rating is at 97%</option>
                                <option value="5" {{ (isset($previousData->a4) && $previousData->a4 == 5) ? 'selected' : '' }}>5 - Customer Net Satisfaction Rating is at 96%</option>
                                <option value="3" {{ (isset($previousData->a4) && $previousData->a4 == 3) ? 'selected' : '' }}>3 - Customer Net Satisfaction Rating is at 95%</option>
                                <option value="0" {{ (isset($previousData->a4) && $previousData->a4 == 0) ? 'selected' : '' }}>0 - Customer Net Satisfaction Rating is below 95%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a4_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a4_remarks) ? $previousData->a4_remarks : '' }}"></td>
                    </tr>
                    <!-- A.5.A -->
                    <tr>
                        <td class="font-bold">A.5. Compliance to Commission on Audit Rules and Regulations</td>
                    </tr>
                    <tr>
                        <td class="pb-8">A.5.A. Unimplemented Audit Observation Memorandum by the Regional Office</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Annual Audit Report (AAR) and Agency Action Plan and Status of Implementation (AAPSI)</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        if ($user_id == 4) {
                                $specificIds = [158];
                            } elseif ($user_id == 2) {
                                $specificIds = [242];
                            } elseif ($user_id == 11) {
                                $specificIds = [145];
                            } elseif ($user_id == 13) {
                                $specificIds = [170];
                            } elseif ($user_id == 15) {
                                $specificIds = [99];
                            } elseif ($user_id == 6) {
                                $specificIds = [182];
                            } elseif ($user_id == 10) {
                                $specificIds = [114];
                            } elseif ($user_id == 5) {
                                $specificIds = [196];
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
                        <td class="pb-4 text-sm w-3">{{$fms->a5a}}</td>
                        <td class="pb-4 text-sm w-3">{{$fms->a5a_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a5a" data-field="a5a">
                                <option value="">Select score</option>
                                <option value="15" {{ (isset($previousData->a5a) && $previousData->a5a == 15) ? 'selected' : '' }}>15 - 0 unimplemented audit observation memorandum by the province</option>
                                <option value="5" {{ (isset($previousData->a5a) && $previousData->a5a == 5) ? 'selected' : '' }}>5 - 2-5 unimplemented audit observation memorandum by the province</option>
                                <option value="0" {{ (isset($previousData->a5a) && $previousData->a5a == 0) ? 'selected' : '' }}>0 - 6-10 unimplemented audit observation memorandum by the province</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a5a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a5a_remarks) ? $previousData->a5a_remarks : '' }}"></td>
                    </tr>
                    <!-- A.5.B -->
                    <tr>
                        <td class="pb-8">A.5.B. Notice of Suspension and Disallowance</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Statement of Audit Suspensions, Disallowances and Charges (SASDC) issued by the COA (RO and PO and TTIs)</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        if ($user_id == 4) {
                                $specificIds = [96];
                            } elseif ($user_id == 2) {
                                $specificIds = [103];
                            } elseif ($user_id == 11) {
                                $specificIds = [106];
                            } elseif ($user_id == 13) {
                                $specificIds = [172];
                            } elseif ($user_id == 15) {
                                $specificIds = [100];
                            } elseif ($user_id == 3) {
                                $specificIds = [186];
                            } elseif ($user_id == 1) {
                                $specificIds = [107];
                            } elseif ($user_id == 6) {
                                $specificIds = [139, 140];
                            } elseif ($user_id == 10) {
                                $specificIds = [112];
                            } elseif ($user_id == 5) {
                                $specificIds = [149, 176, 177, 178];
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
                        <td class="pb-4 text-sm w-3">{{$fms->a5b}}</td>
                        <td class="pb-4 text-sm w-3">{{$fms->a5b_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a5b" data-field="a5b">
                                <option value="">Select score</option>
                                <option value="15" {{ (isset($previousData->a5b) && $previousData->a5b == 15) ? 'selected' : '' }}>15 - There are no suspensions and disallowances</option>
                                <option value="0" {{ (isset($previousData->a5b) && $previousData->a5b == 0) ? 'selected' : '' }}>0 - There are suspensions and disallowances</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a5b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a5b_remarks) ? $previousData->a5b_remarks : '' }}"></td>
                    </tr>
                    <!-- A.6 -->
                    <tr>
                        <td class="pb-8">A.6. Compliance to PhilGEPS requirements</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification:Government Procurement Policy Board (GPPB) report who are compliant</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-sm w-3">{{$as->a6}}</td>
                        <td class="pb-4 text-sm w-3">{{$as->a6_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a6" data-field="a6">
                                <option value="">Select score</option>
                                <option value="30" {{ (isset($previousData->a6) && $previousData->a6 == 30) ? 'selected' : '' }}>30 - 100% compliance from Publication to Notice and Award and Notice to Proceed</option>
                                <option value="0" {{ (isset($previousData->a6) && $previousData->a6 == 0) ? 'selected' : '' }}>0 - Non-compliance from Publication to Notice and Award and Notice to Proceed</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a6_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a6_remarks) ? $previousData->a6_remarks : '' }}"></td>
                    </tr>
                    <!-- A.7.A -->
                    <tr>
                        <td class="font-bold">
                            A.7. Liquidation of Cash Advances (Foreign and Local Travel Expenses)
                        </td>
                    </tr>
                    <tr>
                        <td class="pb-8">A.7.A. Liquidation of Foreign Travel Expenses</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Proof of postings submitted/received copy from COA Schedule of cash advances, Certification from the Accuntant, outstanding cash advances</p>
                        </td>
                        @php
                        // Define the specific ID you're looking for
                        if ($user_id == 4) {
                                $specificIds = [95];
                            } elseif ($user_id == 2) {
                                $specificIds = [102];
                            } elseif ($user_id == 11) {
                                $specificIds = [144];
                            } elseif ($user_id == 13) {
                                $specificIds = [168];
                            } elseif ($user_id == 15) {
                                $specificIds = [101];
                            } elseif ($user_id == 3) {
                                $specificIds = [184, 185];
                            } elseif ($user_id == 1) {
                                $specificIds = [108];
                            } elseif ($user_id == 6) {
                                $specificIds = [141];
                            } elseif ($user_id == 10) {
                                $specificIds = [113];
                            } elseif ($user_id == 5) {
                                $specificIds = [179];
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
                        <td class="pb-4 text-sm w-3">{{$fms->a7a}}</td>
                        <td class="pb-4 text-sm w-3">{{$fms->a7a_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a7a" data-field="a7a">
                                <option value="">Select score</option>
                                <option value="10" {{ (isset($previousData->a7a) && $previousData->a7a == 10) ? 'selected' : '' }}>10 - All Foreign Travel Expenses liquidated within 60 days</option>
                                <option value="0" {{ (isset($previousData->a7a) && $previousData->a7a == 0) ? 'selected' : '' }}>0 - Partial number of Foreign Travel Expenses liquidated beyond 60 days</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a7a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a7a_remarks) ? $previousData->a7a_remarks : '' }}"></td>
                    </tr>
                    <!-- A.7.B -->
                    <tr>
                        <td class="pb-8">A.7.B. Liquidation of Local Travel Expenses</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: "Proof of postings submitted/received copy from COA Schedule of cash advances, Certification from the Accuntant, outstanding cash advances</p>
                        </td>
                        @php
                            // Define the specific ID based on the $user_id
                            if ($user_id == 4) {
                                $specificIds = [95];
                            } elseif ($user_id == 2) {
                                $specificIds = [102];
                            } elseif ($user_id == 11) {
                                $specificIds = [162];
                            } elseif ($user_id == 13) {
                                $specificIds = [169];
                            } elseif ($user_id == 15) {
                                $specificIds = [101];
                            } elseif ($user_id == 3) {
                                $specificIds = [184, 185];
                            } elseif ($user_id == 1) {
                                $specificIds = [108];
                            } elseif ($user_id == 6) {
                                $specificIds = [141];
                            } elseif ($user_id == 10) {
                                $specificIds = [113];
                            } elseif ($user_id == 5) {
                                $specificIds = [179];
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
                        <td class="pb-4 text-sm w-3">{{$fms->a7b}}</td>
                        <td class="pb-4 text-sm w-3">{{$fms->a7b_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a7b" data-field="a7b">
                                <option value="">Select score</option>
                                <option value="10" {{ (isset($previousData->a7b) && $previousData->a7b == 10) ? 'selected' : '' }}>10 - All Local Travel Expenses liquidated within 30 days</option>
                                <option value="0" {{ (isset($previousData->a7b) && $previousData->a7b == 0) ? 'selected' : '' }}>0 - Partial number of Local Travel Expenses liquidated beyond 30 days</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a7b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a7b_remarks) ? $previousData->a7b_remarks : '' }}"></td>
                    </tr>
                    <!-- A.8 -->
                    <tr>
                        <td class="pb-8">A.8. Compliance to Agency Procurement Compliance Performance Indicator (APCPI)</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: "Agency Procurement Compliance Performance Indicator (APCPI) submitted within set deadlines by oversight agency/ies c/o of procurement unit</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-4 text-sm w-3">{{$as->a8}}</td>
                        <td class="pb-4 text-sm w-3">{{$as->a8_remarks}}</td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a8" data-field="a8">
                                <option value="">Select score</option>
                                <option value="10" {{ (isset($previousData->a8) && $previousData->a8 == 10) ? 'selected' : '' }}>10 - The regional office is compliant to APCPI</option>
                                <option value="0" {{ (isset($previousData->a8) && $previousData->a8 == 0) ? 'selected' : '' }}>0 - The regional office is not compliant to APCPI</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a8_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a8_remarks) ? $previousData->a8_remarks : '' }}"></td>
                    </tr>
                    <!-- Totals -->
                    <tr>
                        <td class="pb-4"></td>
                        <td class="pb-4"></td>
                        <td class="pb-4"><b>Total Score</b></td>
                        <td class="pb-4 text-sm w-3">{{$nominee->criteria_a}}</td>
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





