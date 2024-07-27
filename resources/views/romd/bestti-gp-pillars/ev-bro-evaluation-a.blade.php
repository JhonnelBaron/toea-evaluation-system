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
        <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST REGIONAL OFFICE</h1> 
        <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
    </div>
    
    <div class="flex items-center justify-center">
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-a" class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria A</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-b" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria B</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-c" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria C</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-d" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria D</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-e" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria E</span>
            </a>
        </div>
    </div>


    
      
      
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
                    <!-- Section A -->
                    <tr>
                        <td class="pb-8" colspan="7"><b>A. Good Governance Measures</b></td>
                    </tr>
                    <!-- A.1 -->
                    <tr>
                        <td class="pb-8">A.1. Compliance for Corrupt Policy</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Certification of no pending case signed by the Regional Administrative Complaints Committee signed by the Chair (Regional Director)</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a1_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a1_remarks}}</td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a1" data-field="a1">
                                <option value="">Select score</option>
                                <option value="40" {{ (isset($previousData->a1) && $previousData->a1 == 40) ? 'selected' : '' }}>40 - The Province has no personnel with pending administrative case</option>
                                <option value="0" {{ (isset($previousData->a1) && $previousData->a1 == 0) ? 'selected' : '' }}>0 - The Province has at least one pending administrative case</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a1_remarks) ? $previousData->a1_remarks : '' }}"></td>
                    </tr>
                    <!-- A.2 -->
                    <tr>
                        <td class="pb-8">A.2. Compliance for the TESDA Code of Conduct and Ethical Standards Valid Complaint</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Certification of no complaints/findings signed by the Regional Administrative Complaints Committee signed by the Chair (Regional Director)</p>
                        </td>
                        <td class="pb-4 text-center" >{{$data->a2_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a2_remarks}}</td>
                        <td class="pb-8"></td>
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
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>- Certification of No Complaints Received - signed by the RD <br>- Summary Report of Complaints Received, signed by the RD TESDA OP AS 03 F04 Monitoring of Complaints Received</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a3_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a3_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-8">A.4. Customer Satisfaction Results Customer Net Satisfaction Rating with minimum of 95%</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>- Customer Feedback Form Results (TESDA OP AS 03 F02) <br>- Monthly (January to December) Summary Report with Percentage signed by the PD</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a4_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a4_remarks}}</td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a4" data-field="a4">
                                <option value="">Select score</option>
                                <option value="30" {{ (isset($previousData->a4) && $previousData->a4 == 30) ? 'selected' : '' }}>30 - Customer Net Satisfaction Rating is at 99% and above</option>
                                <option value="20" {{ (isset($previousData->a4) && $previousData->a4 == 20) ? 'selected' : '' }}>20 - Customer Net Satisfaction Rating is at 98%</option>
                                <option value="10" {{ (isset($previousData->a4) && $previousData->a4 == 10) ? 'selected' : '' }}>10 - Customer Net Satisfaction Rating is at 97%</option>
                                <option value="5" {{ (isset($previousData->a4) && $previousData->a4 == 5) ? 'selected' : '' }}>5 - Customer Net Satisfaction Rating is at 96%</option>
                                <option value="3" {{ (isset($previousData->a4) && $previousData->a4 == 3) ? 'selected' : '' }}>3 - Customer Net Satisfaction Rating is at 95%</option>
                                <option value="0" {{ (isset($previousData->a4) && $previousData->a4 == 0) ? 'selected' : '' }}>0 - No Customer Feedback Forms or Summary Reports</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a4_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a4_remarks) ? $previousData->a4_remarks : '' }}"></td>
                    </tr>
                    <!-- A.5.A -->
                    <tr>
                        <td class="pb-8">A.5.A. Compliance to Commission on Audit Rules and Regulations: Unimplemented Audit Observation Memorandum by the Provincial Office</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Certification/Memorandum with NO AOM received or number of unimplemented audit observation issued by COA <br>Annual Audit Report (AAR) and Agency Action Plan and Status of Implementation (AAPSI)</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a5a_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a5a_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-8">A.5.B. Compliance to Commission on Audit Rules and Regulations: Notice of Suspension and Disallowance</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Certification of no suspension nor disallowances signed by the FA <br>Statement of Audit Suspensions, Disallowances and Charges (SASDC) with summary as of December issued by the COA (RO and PO and TTIs)</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a5b_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a5b_remarks}}</td>
                        <td class="pb-8"></td>
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
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Certification of Compliance signed/issued by PhilGEPS; Notice of Award/ Notice to Proceed <br>Government Procurement Policy Board (GPPB) report who are compliant</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a6_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a6_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-8">A.7.A. Liquidation of Cash Advances (Foreign and Local Travel Expenses): Liquidation of Foreign Travel Expenses</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Monitoring report signed by the Financial Accountant and PD <br>Proof of postings submitted/received copy from COA <br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a7a_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a7a_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-8">A.7.B. Liquidation of Cash Advances (Foreign and Local Travel Expenses): Liquidation of Local Travel Expenses</td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>Monitoring report signed by the Financial Accountant and PD <br>Proof of postings submitted/received copy from COA <br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a7b_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a7b_remarks}}</td>
                        <td class="pb-8"></td>
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
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: <br>- PO's FY 2023 Agency Procurement Compliance Performance Indicator (APCPI) reports submitted within set deadlines (copy of email to GPPB) <br>- Acknowledgment email from GPBB</p>
                        </td>
                        <td class="pb-4 text-center">{{$data->a8_final_score}}</td>
                        <td class="pb-4 text-center">{{$data->a8_remarks}}</td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="a8" data-field="a8">
                                <option value="">Select score</option>
                                <option value="10" {{ (isset($previousData->a8) && $previousData->a8 == 10) ? 'selected' : '' }}>10 - The Provincial Office is compliant to APCPI</option>
                                <option value="0" {{ (isset($previousData->a8) && $previousData->a8 == 0) ? 'selected' : '' }}>0 - No Compliance to APCPI</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="a8_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->a8_remarks) ? $previousData->a8_remarks : '' }}"></td>
                    </tr>
                    <!-- Totals -->
                    <tr>
                        <td class="p-4"><b>Total Initial Score</b></td>
                        <td class="p-4"></td>
                        <td class="p-4"></td>
                        <td class="p-4"><b>Total Re-Evaluated Score</b></td>
                        <td class="p-4"><b>Final Score:</b></td>
                        <td class="p-4"><b>ROMD Evaluated Score</b>: <span id="totalScore">0</span></td>
                        <td class="p-4"></td>
                    </tr>

                    

                </tbody>
            </table>
            


    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>





