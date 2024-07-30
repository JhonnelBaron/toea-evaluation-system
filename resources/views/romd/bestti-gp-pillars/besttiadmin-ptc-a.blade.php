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
                <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                    <a href="{{ route('external.ti-ptc-a', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-gray-200 font-bold text-xs">Criteria A</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                    <a href="{{ route('external.ti-ptc-b', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria B</span>
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
            
            <form id="saveChangesForm" method="POST" action="{{ route('storePtcA') }}">
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
                                <td class="pb-8"><b>A. Good Governance Measures</b></td>
                            </tr>
                            <tr>
                                <td class="pb-8">A.1. Compliance for Corrupt Policy</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Certification of no pending case signed by the Regional Administrative Complaints Committee signed by the Chair (Regional Director)</p></td>
                            <td style="text-align: center;">
                                {{-- @if($data->a1_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a1_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif --}}
                            </td>      
                                {{-- FINAL SECRETARIAT SCORE / THIS IS FETCH --}}
                                <td class="pb-4 text-center">{{$data->ra1_final_score}}</td> 
                                <td class="pb-4 text-center">Evidence c/o Legal</td>
                                {{-- UNTIL HERE   --}}
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a1" data-field="a1" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="40" {{ (isset($previousData->a1) && $previousData->a1 == 40) ? 'selected' : '' }}>40 - The Province has no personnel with pending administrative case</option>
                                        <option value="0" {{ (isset($previousData->a1) && $previousData->a1 == 0) ? 'selected' : '' }}>0 - The Province has at least one pending administrative case</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a1_remarks) ? $previousData->a1_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">A.2. Compliance for the TESDA Code of Conduct and Ethical Standards Valid Complaint</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Certification of no complaints/findings signed by the Regional Administrative Complaints Committee signed by the Chair (Regional Director)</p></td>
                            <td style="text-align: center;">
                                {{-- @if($data->a2_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a2_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif --}}
                            </td>      
                                 {{-- FINAL SECRETARIAT SCORE / THIS IS FETCH --}}
                                <td class="pb-4 text-center">{{$data->ra2_final_score}}</td>
                                <td class="pb-4 text-center">Evidence c/o Legal</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a2" data-field="a2" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="30" {{ (isset($previousData->a2) && $previousData->a2 == 30) ? 'selected' : '' }}>30 - There are no valid complaints, findings against any Official and Employee.</option>
                                        <option value="20" {{ (isset($previousData->a2) && $previousData->a2 == 20) ? 'selected' : '' }}>20 - There are 1-3 complaint/s, findings against any Official and Employee.</option>
                                        <option value="10" {{ (isset($previousData->a2) && $previousData->a2 == 10) ? 'selected' : '' }}>10 - There are 4-6 complaints, findings against any Official and Employee.</option>
                                        <option value="5" {{ (isset($previousData->a2) && $previousData->a2 == 5) ? 'selected' : '' }}>5 - There are 7-9 complaints, findings against any Official and Employee.</option>
                                        <option value="0" {{ (isset($previousData->a2) && $previousData->a2 == 0) ? 'selected' : '' }}>0 - No Communication Plan was prepared and not all communications activities were implemented</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a2_remarks) ? $previousData->a2_remarks : '' }}"></td>
                            </tr>
                            
                            <tr>
                                <td class="pb-8">A.3. Resolutions of complaints emanating from the Contact Center</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>- Certification of No Complaints Received - signed by the RD 
                                    <br>- Summary Report of Complaints Received, signed by the RD TESDA OP AS 03 F04
                                    Monitoring of Complaints Received
                                </p></td>
                            <td style="text-align: center;">
                                {{-- @if($data->a3_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a3_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif --}}
                            </td>      
                                <td class="pb-4 text-center">{{$data->ra3_final_score}}</td>
                                <td class="pb-4 text-center">Evidence c/o PIAD</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a3" data-field="a3" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->a3) && $previousData->a3 == 10) ? 'selected' : '' }}>10 - No complaints received</option>
                                        <option value="10" {{ (isset($previousData->a3) && $previousData->a3 == 10) ? 'selected' : '' }}>10 - 95% of all complaints emanating from the Contact Center have been resolved and closed within the year</option>
                                        <option value="0" {{ (isset($previousData->a3) && $previousData->a3 == 0) ? 'selected' : '' }}>0 - Less than 95% of all complaints against the POs and TTIs emanating from the Contact Center have been resolved and closed within the year</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a3_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a3_remarks) ? $previousData->a3_remarks : '' }}"></td>
                            </tr>

                            <tr>
                                <td class="pb-8">A.4. Customer Satisfaction Results Customer Net Satisfaction Rating with minimum of 95%</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>- Customer Feedback Form Results (TESDA OP AS 03 F02)
                                    <br>- Monthly (January to December) Summary Report with Percentage signed by the PD
                                </p></td>
                            <td style="text-align: center;">
                                @if($data->a4_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a4_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif
                            </td>      
                                <td class="pb-4 text-center">{{$data->ra4_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->ra4_remarks}}</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a4" data-field="a4" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="30" {{ (isset($previousData->a4) && $previousData->a4 == 30) ? 'selected' : '' }}>30 - Customer Net Satisfaction Rating is at 99% and above</option>
                                        <option value="20" {{ (isset($previousData->a4) && $previousData->a4 == 20) ? 'selected' : '' }}>20 - Customer Net Satisfaction Rating is at 98%</option>
                                        <option value="10" {{ (isset($previousData->a4) && $previousData->a4 == 10) ? 'selected' : '' }}>10 - Customer Net Satisfaction Rating is at 97%</option>
                                        <option value="5" {{ (isset($previousData->a4) && $previousData->a4 == 5) ? 'selected' : '' }}>5 - Customer Net Satisfaction Rating is at 96%</option>
                                        <option value="3" {{ (isset($previousData->a4) && $previousData->a4 == 3) ? 'selected' : '' }}>3 - Customer Net Satisfaction Rating is at 95%</option>
                                        <option value="0" {{ (isset($previousData->a4) && $previousData->a4 == 0) ? 'selected' : '' }}>0 - No Communication Plan was prepared and not all communications activities were implemented</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a4_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a4_remarks) ? $previousData->a4_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">A.5.A. Compliance to Commission on Audit Rules and Regulations: Unimplemented Audit Observation Memorandum by the Provincial Office</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Certification/Memorandum with NO AOM received or number of unimplemented audit observation issued by COA
                                    <br>Annual Audit Report (AAR) and Agency Action Plan and Status of Implementation (AAPSI)
                                </td>
                            <td style="text-align: center;">
                                @if($data->a5a_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a5a_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif
                            </td>      
                                <td class="pb-4 text-center">{{$data->ra5a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->ra5a_remarks}}</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a5a" data-field="a5a" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->a5a) && $previousData->a5a == 15) ? 'selected' : '' }}>15 - 0 unimplemented audit observation memorandum by the province</option>
                                        <option value="5" {{ (isset($previousData->a5a) && $previousData->a5a == 5) ? 'selected' : '' }}>5 - 2-5 unimplemented audit observation memorandum by the province</option>
                                        <option value="0" {{ (isset($previousData->a5a) && $previousData->a5a == 0) ? 'selected' : '' }}>0 - 6-10 unimplemented audit observation memorandum by the province</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a5a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a5a_remarks) ? $previousData->a5a_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">A.5.B. Compliance to Commission on Audit Rules and Regulations: Notice of Suspension and Disallowance</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Certification of no suspension nor disallowances signed by the FA
                                    <br>Statement of Audit Suspensions, Disallowances and Charges (SASDC) with summary as of December issued by the COA (RO and PO and TTIs)
                                </p></td>
                            <td style="text-align: center;">
                                @if($data->a5b_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a5b_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif
                            </td>      
                                <td class="pb-4 text-center">{{$data->ra5b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->ra5b_remarks}}</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a5b" data-field="a5b" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="15" {{ (isset($previousData->a5b) && $previousData->a5b == 15) ? 'selected' : '' }}>15 - There no suspensions and disallowances</option>
                                        <option value="0" {{ (isset($previousData->a5b) && $previousData->a5b == 0) ? 'selected' : '' }}>0 - There are suspensions and disallowances</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a5b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a5b_remarks) ? $previousData->a5b_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">A.6. Compliance to PhilGEPS requirements</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Certification of Compliance signed/issued by PhilGEPS; Notice of Award/ Notice to Proceed
                                    <br>Government Procurement Policy Board (GPPB) report who are compliant
                                </p></td>
                            <td style="text-align: center;">
                                @if($data->a6_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a6_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif
                            </td>      
                                <td class="pb-4 text-center">{{$data->ra6_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->ra6_remarks}}</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a6" data-field="a6" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="30" {{ (isset($previousData->a6) && $previousData->a6 == 30) ? 'selected' : '' }}>30 - 100% compliance from Publication to Notice and Award and notice to proceed</option>
                                        <option value="0" {{ (isset($previousData->a6) && $previousData->a6 == 0) ? 'selected' : '' }}>0 - Non-compliance from Publication to Notice and Award and notice to proceed</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a6_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a6_remarks) ? $previousData->a6_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">A.7.A. Liquidation of Cash Advances (Foreign and Local Travel Expenses): Liquidation of Foreign Travel Expenses</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Monitoring report signed by the Financial Accountant and PD
                                    <br>Proof of postings submitted/received copy from COA
                                    <br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances
                                </p></td>
                            <td style="text-align: center;">
                                @if($data->a7a_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a7a_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif
                            </td>      
                                <td class="pb-4 text-center">{{$data->ra7a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->ra7a_remarks}}</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a7a" data-field="a7a" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->a7a) && $previousData->a7a == 10) ? 'selected' : '' }}>10 - All Foreign Travel Expenses liquidated within 60 days</option>
                                        <option value="0" {{ (isset($previousData->a7a) && $previousData->a7a == 0) ? 'selected' : '' }}>0 - Partial number of Foreign Travel Expenses liquidated beyond 60 days</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a7a_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a7a_remarks) ? $previousData->a7a_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">A.7.B. Liquidation of Cash Advances (Foreign and Local Travel Expenses): Liquidation of Local Travel Expenses</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Monitoring report signed by the Financial Accountant and PD
                                    <br>Proof of postings submitted/received copy from COA
                                    <br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances 
                                </p></td>
                            <td style="text-align: center;">
                                @if($data->a7b_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a7b_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif
                            </td>      
                                <td class="pb-4 text-center">{{$data->ra7b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->ra7b_remarks}}</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a7b" data-field="a7b" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->a7b) && $previousData->a7b == 10) ? 'selected' : '' }}>10 - All Local Travel Expenses liquidated within 30 days</option>
                                        <option value="0" {{ (isset($previousData->a7b) && $previousData->a7b == 0) ? 'selected' : '' }}>0 - Partial number of Local Travel Expenses liquidated beyond 30 days</option>
                                    </select> 
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a7b_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a7b_remarks) ? $previousData->a7b_remarks : '' }}"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">A.8. Compliance to Agency Procurement Compliance Performance Indicator (APCPI)</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>- PO's FY 2023 Agency Procurement Compliance Performance Indicator (APCPI) reports submitted within set deadlines (copy of email to GPPB)
                                    <br>- Acknowledgment email from GPBB
                                </p></td>
                            <td style="text-align: center;">
                                @if($data->a8_file_verification)
                                    <button class="btn btn-sm btn-primary" onclick="openPdf('https://tesda-toea.com/{{ $data->a8_file_verification }}', event)">Preview</button>
                                @else
                                    No file submitted
                                @endif
                            </td>      
                                <td class="pb-4 text-center">{{$data->ra8_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->ra8_remarks}}</td>
                                <td class="pb-8">
                                    <select class="form-control mb-1 score-dropdown" name="a8" data-field="a8" placeholder="Input your initial score">
                                        <option value="">Select score</option>
                                        <option value="10" {{ (isset($previousData->a8) && $previousData->a8 == 10) ? 'selected' : '' }}>10 - The Provincial Office is compliant to APCPI</option>
                                        <option value="0" {{ (isset($previousData->a8) && $previousData->a8 == 0) ? 'selected' : '' }}>0 - No Communication Plan was prepared but activities were fully implemented</option>
                                    </select>
                                </td>
                                <td class="pb-8"><input class="form-control mb-1" name="a8_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a8_remarks) ? $previousData->a8_remarks : '' }}"></td>
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
    <main>
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
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