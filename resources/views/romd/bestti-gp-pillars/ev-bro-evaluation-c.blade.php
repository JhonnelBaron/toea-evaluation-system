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
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-a" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria A</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-b" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria B</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-c" class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria C</span>
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
                        

                    <tr>
                        <td class="pb-8">
                            C. Administrative and Support Services = <i>125</i><br>
                            C.1. Budget Utilization Rate (BUR)
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring logbook/registry</p>
                        </td>
                        <td class="pb-4 text-center">c1_final_score}}</td>
                        <td class="pb-4 text-center">c1_remarks}}</td>
                        <td class="pb-8"></td>
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
                            C.2. Implementation of Agency Action Plan and Status of Implementation (AAPSI) on the Prior Years Audit Recommendation = <i>125</i><br>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Agency Action Plan and Status of Implementation (AAPSI)</p>
                        </td>
                        <td class="pb-4 text-center">c2_final_score}}</td>
                        <td class="pb-4 text-center">c2_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-8">
                            C.3. Staff Development Program = <i>35</i><br>
                            C.3.1. Employees who have attended SDP have implemented their RE-Entry Plans as scheduled
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Regional/Provincial Work Force Development Plan (WFDP), Certificates of trainings attended, Copies of REAPs</p>
                        </td>
                        <td class="pb-4 text-center">c31_final_score}}</td>
                        <td class="pb-4 text-center">c31_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-4 text-center">c32_final_score}}</td>
                        <td class="pb-4 text-center">c32_remarks}}</td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c32" data-field="c32">
                                <option value="">Select score</option>
                                <option value="15" {{ (isset($previousData->c32) && $previousData->c32 == 15) ? 'selected' : '' }}>15 - 100% of Employees were provided with training opportunities</option>
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
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of plantilla positions per region, Certificates of training attended</p>
                        </td>
                        <td class="pb-4 text-center">c33_final_score}}</td>
                        <td class="pb-4 text-center">c33_remarks}}</td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="c33" data-field="c33">
                                <option value="">Select score</option>
                                <option value="6" {{ (isset($previousData->c33) && $previousData->c33 == 6) ? 'selected' : '' }}>6 - 80% of regional finance and budget officers/personnel attended finance related training programs</option>
                                <option value="3" {{ (isset($previousData->c33) && $previousData->c33 == 3) ? 'selected' : '' }}>3 - 40% to 79% of regional finance and budget officers/personnel attended finance related training programs</option>
                                <option value="0" {{ (isset($previousData->c33) && $previousData->c33 == 0) ? 'selected' : '' }}>0 - Less than 40% of regional finance and budget officers/personnel attended finance related training programs</option>
                                <option value="1" {{ (isset($previousData->c33) && $previousData->c33 == 1) ? 'selected' : '' }}>1 - Plus point for RO initiated Finance-related training programs</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="c33_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c33_remarks) ? $previousData->c33_remarks : '' }}">
                        </td>
                        
                    </tr>
    
                    <!-- Data Row for Model Employee Awards -->
                    <tr>
                        <td class="pb-8">
                            C.4. Model Employee Awards<br>
                            C.4.1. Model Employee for Category I Position<br>
                            C.4.1.1. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p>
                        </td>
                        <td class="pb-4 text-center">c411_final_score}}</td>
                        <td class="pb-4 text-center">c411_remarks}}</td>
                        <td class="pb-8"></td>
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
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS, Certificates of training attended</p>
                        </td>
                        <td class="pb-4 text-center">c412_final_score}}</td>
                        <td class="pb-4 text-center">c412_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-8">
                            C.4.2. Model Employee for Category II Position<br>
                            C.4.2.1. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS, Certificates of training attended</p>
                        </td>
                        <td class="pb-4 text-center">c421_final_score}}</td>
                        <td class="pb-4 text-center">c421_remarks}}</td>
                        <td class="pb-8"></td>
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
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS, Certificates of training attended</p>
                        </td>
                        <td class="pb-4 text-center">c422_final_score}}</td>
                        <td class="pb-4 text-center">c422_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-8">
                            C.4.3. Model Employee for Category III Position<br>
                            C.4.3.1. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS, Certificates of training attended</p>
                        </td>
                        <td class="pb-4 text-center">c431_final_score}}</td>
                        <td class="pb-4 text-center">c431_remarks}}</td>
                        <td class="pb-8"></td>
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
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS, Certificates of training attended</p>
                        </td>
                        <td class="pb-4 text-center">c432_final_score}}</td>
                        <td class="pb-4 text-center">c432_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="pb-4 text-center">c5_final_score}}</td>
                        <td class="pb-4 text-center">c5_remarks}}</td>
                        <td class="pb-8"></td>
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
                        <td class="p-4"><b>Total Initial Score</b></td>
                        <td class="p-4"></td>
                        <td class="p-4"></td>
                        <td class="p-4"><b>Total Re-Evaluated Score</b></td>
                        <td class="p-4"><b>Final Score:</b></td>
                        <td class="p-4"><b>ROMD Evaluated Score</b>: <span name="c1" data-field="c1">0</span></td>
                        <td class="p-4"></td>
                    </tr>

                
                </tbody>
                </table>

        </div>
    </div>
                
            


    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
