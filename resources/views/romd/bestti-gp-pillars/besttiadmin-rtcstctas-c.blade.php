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
        @include('components.navbar', [
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-4 p-2">
            <div class="flex justify-between items-center w-full p-2">
                <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST TRAINING INSTITUTION - REGION NAME - RTC/STC, TAS</h1> 
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>
            
            <div class="flex items-center ml-6">
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/besttiadmin-rtcstctas-a" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">A</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/besttiadmin-rtcstctas-b" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">B</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer">
                  <a href="/besttiadmin-rtcstctas-c" class="block h-full w-full flex items-center justify-center">
                    <span class="text-gray-200 font-bold text-xs">C</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/besttiadmin-rtcstctas-d" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">D</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/besttiadmin-rtcstctas-e" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">E</span>
                  </a>
                </div>
              </div>
              
              
            <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
                <div id="evaluated" class="tab-content">
                    <table id="regionTable" class="mx-auto">
                        <thead class="bg-blue-300 text-sm">
                            <tr>
                                <th class="border border-gray-300 p-2 w-52">Category</th>
                              <th class="border border-gray-300 p-2 w-24">View Attachment</th>
                              <th class="border border-gray-300 p-2 w-32">Means of Verification</th>
                              <th class="border border-gray-300 p-2 w-10">Final Score</th>
                              <th class="border border-gray-300 p-2 w-32">Remarks</th>
                              <th class="border border-gray-300 p-2 w-32">ROMD Evaluated Score</th>
                              <th class="border border-gray-300 p-2 w-32">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>

                             <!-- BEST TI CRITERIA C -->
                           {{-- ['RTC-STC', 'TAS', 'PTC' --}}
                             <tr>
                                <td><b>Administrative and Support Services</b></td>
                            </tr>
                            <tr>
                                <td>C.1. Budget Utilization Rate (BUR)</td>
                                </td>
                              <td>
                                </td>
                               <td><span class="small" style="font-size: 10px;">(Means of Verification: Monitoring logbook/ registry)</span></td>
                                <td></td>
                                <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc1_final_score" required>
                                                <option value="">Select score</option>
                                                <option value="25">25 - 100% of budget utilized</option>
                                                <option value="10">10 - 90% - 99% of budget utilized</option>
                                                <option value="5">5 - 89% and below of budget utilized</option>
                                                <option value="0">0 - 79% and below of budget utilized</option>
                                </select></td>
                                <td><input class="form-control mb-1" name="rc1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td>C.2. Implementation of Agency Action Plan and Status of Implementation (AAPSI) on the Prior Years Audit Recommendation 80% acted upon (either partially or fully implemented)</td>
                                </td>
                              <td>
                                </td>
                               <td><span class="small" style="font-size: 10px;">(Means of Verification: Agency Action Plan and Status of Implementation (AAPSI))</span></td>
                               <td></td>
                                <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc2_final_score" required>
                                                <option value="">Select score</option>
                                                <option value="25">25 - 100% acted upon (either partially or fully implemented)</option>
                                                <option value="15">15 - 90% - 99% acted upon (either partially or fully implemented)</option>
                                                <option value="5">5 - 80% - 89% acted upon (either partially or fully implemented)</option>
                                                <option value="0">0 - 79% and below acted upon (either partially or fully implemented)</option>
                                            </select></td>
                                <td><input class="form-control mb-1" name="rc2_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td><b>C.3. Staff Development Program</b></td>
                            </tr>
                            <tr>
                                <td>C.3.1 Staff Development Program: Employees who have attended SDP have implemented their RE-Entry Plans as scheduled</td>
                                </td>
                              <td>
                                </td>
                               <td><span class="small" style="font-size: 10px;">(Means of Verification: List of Personnel in 2023, Certificates of trainings attended, REAPs)</span></td>
                               <td></td>
                                <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc31_final_score" required>
                                                <option value="">Select score</option>
                                                <option value="20">20 - 100% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                                <option value="10">10 - 75%- 99% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                                <option value="0">0 - Below 75% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                            </select></td>
                                <td><input class="form-control mb-1" name="rc31_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td>C.3.2. Staff Development Program: Training Opportunities to staff provided for CY 2023</td>
                                </td>
                              <td>
                                </td>
                               <td><span class="small" style="font-size: 10px;">(Means of Verification: List of plantilla positions of the TTI, Certificates of training attended)</span></td>
                               <td></td>
                                <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc32_final_score" required>
                                                <option value="">Select score</option>
                                                <option value="15">15 - 100% of Employees were provided with training opportunities</option>
                                                <option value="8">8 - 75%-99% of Employees were provided with training opportunities</option>
                                                <option value="0">0 - 74% and below of Employees were provided with training opportunities</option>
                                            </select></td>
                                <td><input class="form-control mb-1" name="rc32_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td><b>C.4. Model Employee Awards</b></td>
                            </tr>
                            <tr>
                                <td><b>C.4.1. Model Employee for Category I Position</b></td>
                            </tr>
                            <tr>
                                <td>C.4.1.1. Participation</td>
                                </td>
                              <td>
                                </td>
                               <td><span class="small" style="font-size: 10px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                               <td></td>
                                <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc411_final_score" required>
                                                <option value="">Select score</option>
                                                <option value="4">4 - The TTI submitted nominees for Category I</option>
                                                <option value="0">0 - The TTI did not submit nominees for Category I</option>
                                            </select></td>
                                <td><input class="form-control mb-1" name="rc411_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td>C.4.1.2. Awards received</td>
                                </td>
                              <td>
                                </td>
                               <td><span class="small" style="font-size: 10px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                               <td></td>
                                <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc412_final_score" required>
                                                <option value="">Select score</option>
                                                <option value="4">4 - The TTI has received recognition/award at national level</option>
                                                <option value="0">0 - The TTI did not receive award/recognition at national level</option>
                                            </select></td>
                                <td><input class="form-control mb-1" name="rc412_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td><b>C.4.2. Model Employee for Category II Position</b></td>
                            </tr>
                            <tr>
                                <td>C.4.2.1. Participation</td>
                                </td>
                              <td>
                                </td>
                               <td><span class="small" style="font-size: 10px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                               <td></td>
                                <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc421_final_score" required>
                                                        <option value="">Select score</option>
                                                        <option value="4">4 - The TTI submitted nominees for Category II</option>
                                                        <option value="0">0 - The TTI did not submit nominees for Category II</option>
                                                    </select></td>
                                <td><input class="form-control mb-1" name="rc421_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td>C.4.2.2. Awards Received</td>
                                </td>
                              <td>
                                </td>
                               <td><span class="small" style="font-size: 10px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                               <td></td>
                               <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc422_final_score" required>
                                                        <option value="">Select score</option>
                                                        <option value="4">4 - The TTI has received recognition/award at national level</option>
                                                        <option value="0">0 - The TTI did not receive award/recognition at national level</option>
                                                    </select></td>
                                <td><input class="form-control mb-1" name="rc422_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td><b>C.4.3. Model Employee for Category III Position</b></td>
                            </tr>
                            <tr>
                                <td>C.4.3.1. Participation</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                 <td><select class="form-control mb-1 score-dropdown" name="rc431_final_score" required>
                                                        <option value="">Select score</option>
                                                        <option value="4">4 - The TTI submitted nominees for Category III</option>
                                                        <option value="0">0 - The TTI did not submit nominees for Category III</option>
                                                    </select></td>
                                 <td><input class="form-control mb-1" name="rc431_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td>C.4.3.2. Awards Received</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                               <td><select class="form-control mb-1 score-dropdown" name="rc432_final_score" required>
                                                        <option value="">Select score</option>
                                                        <option value="5">5 - The TTI has received recognition/award at national level</option>
                                                        <option value="0">0 - The TTI did not receive award/recognition at national level</option>
                                                    </select></td>
                               <td><input class="form-control mb-1" name="rc432_remarks" type="text" placeholder="Remarks"></td>
                             </tr>
                             <tr>
                         
                                <td style="padding: 15px;"><b>Total Initial Score</b></td>
                                <td style="padding: 15px;"></td>
                                <td style="padding: 15px;"></td>
                                <td style="padding: 15px;"><b>Total Re-Evaluated Score</b></td>
                                <td style="padding: 15px;"><b>Final Score: </b></td>
                                <td style="padding: 15px;"><b>ROMD Evaluated Score</b> : <span id="totalScore">0</span></td>
                                <td style="padding: 15px;"></td>
                            </tr>
                        </tbody>
                    </div>

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
    </script>
    
</body>
</html>