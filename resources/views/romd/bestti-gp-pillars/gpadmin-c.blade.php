<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pillar C</title>
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
                <h1 class="text-gray-800 font-bold text-3xl ml-4">GALING PROBINSYA  - Region Name</h1>
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>
            
            <div class="flex items-center justify-center ml-6">
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="/gpadmin-a" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria A</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="/gpadmin-b" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria B</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="/gpadmin-c" class="h-full w-full flex items-center justify-center">
                        <span class="text-gray-200 font-bold text-xs">Criteria C</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="/gpadmin-d" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria D</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="/gpadmin-e" class="h-full w-full flex items-center justify-center">
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
                            <!-- GALING PROBINSYA CRITERIA C -->
                            <tr>
                                <td class="pb-4"><b>Administrative and Support Services</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.1. Budget Utilization Rate (BUR)</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring logbook/ registry</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc1_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="25">25 - 100% of budget utilized</option>
                                        <option value="10">10 - 90% - 99% of budget utilized</option>
                                        <option value="0">0 - 89% and below of budget utilized</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.2. Implementation of Agency Action Plan and Status of Implementation (AAPSI) on the Prior Years Audit Recommendation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Agency Action Plan and Status of Implementation (AAPSI)</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc2_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="25">25 - 100% acted upon (either partially or fully implemented)</option>
                                        <option value="15">15 - 90% - 99% acted upon (either partially or fully implemented)</option>
                                        <option value="5">5 - 80% - 89% acted upon (either partially or fully implemented)</option>
                                        <option value="0">0 - 79% and below acted upon (either partially or fully implemented)</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc2_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>C.3. Staff Development Program</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.3.1 Staff Development Program: Employees who have attended SDP have implemented their RE-Entry Plans as scheduled</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Provincial Work Force Development Plan (WFDP)<br> List of PO personnel in 2023<br> Certificates of trainings attended<br> Copies of REAPs</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc31_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="20">20 - 100% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                        <option value="10">10 - 70%- 99% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                        <option value="0">0 - 69% and below of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc31_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.3.2. Staff Development Program: Training Opportunities to staff provided for CY 2023</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of PO personnel in 2023<br> Certificates of training programs attended<br></p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc32_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="15">15 - 100% of Employees were provided with training opportunities</option>
                                        <option value="5">5 - 75%-99% of Employees were provided with training opportunities</option>
                                        <option value="0">0 - 74% and below of Employees were provided with training opportunities</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc32_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>C.4. Model Employee Awards</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>C.4.1. Model Employee for Category I Position</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.4.1.1. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc411_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="5">5 - The Province submitted nominees for Category I</option>
                                        <option value="0">0 - The Province did not submit nominees for Category I</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc411_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.4.1.2. Awards received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc412_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="5">5 - The Province has received recognition/award at national level</option>
                                        <option value="0">0 - The Province did not receive award/recognition at national level</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc412_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>C.4.2. Model Employee for Category II Position</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.4.2.1. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc421_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="5">5 - The Province submitted nominees for Category II</option>
                                        <option value="0">0 - The Province did not submit nominees for Category II</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc421_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.4.2.2. Awards Received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc422_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="6">6 - The Province has received recognition/award at national level</option>
                                        <option value="0">0 - The Province did not receive award/recognition at national level</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc422_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>C.4.3. Model Employee for Category III Position</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.4.3.1. Participation</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc431_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="5">5 - The Province submitted nominees for Category III</option>
                                        <option value="0">0 - The Province did not submit nominees for Category III</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc431_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.4.3.2. Awards Received</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of nominees and awardees from HRMD/AS</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc432_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="6">6 - The Province has received recognition/award at national level</option>
                                        <option value="0">0 - The Province did not receive award/recognition at national level</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc432_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4">C.5. Application for PRIME-HR Level</td>
                                <td class="pb-4"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Confernment/Certificate Awarded (if The PO has applied and has been certified in higher PRIME HR Level)<br> Letter to CSC and other communications with regard to the requirements submitted by the region to CSC (with CSC feedback/reply letter)</p></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4">
                                    <select class="form-control mb-1 score-dropdown" name="rc5_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="8">8 - The PO has applied and has been certified in higher PRIME HR Level</option>
                                        <option value="4">4 - The PO has applied for higher PRIME-HR Level</option>
                                        <option value="0">0 - The PO has not applied for higher PRIME-HR Level</option>
                                    </select>
                                </td>
                                <td class="pb-4"><input class="form-control mb-1" name="rc5_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-4"><b>Total Score</b></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"><b>Final Score</b></td>
                                <td class="pb-4"><span id="totalScore">0</span></td>
                                <td class="pb-4"></td>
                                <td class="pb-4"><button class="btn btn-primary" id="submitButton">Submit</button></td>
                            </tr>
                        </tbody>
                    </table>
                    
                        </div>
                    </div>
                </div>
            </div>
                    

                    
                <!-- Create group modal-->
                <!-- View PDF modal -->
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
    </script>
    
</body>
</html>