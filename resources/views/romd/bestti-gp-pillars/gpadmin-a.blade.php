<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pillar A</title>
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
                <h1 class="text-gray-800 font-bold text-3xl ml-4">GALING PROBINSYA - Region Name</h1> 
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>
            
            <div class="flex items-center ml-6">
                <div class="relative h-8 w-8 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer">
                  <a href="/gpadmin-a" class="block h-full w-full flex items-center justify-center">
                    <span class="text-gray-200 font-bold text-xs">A</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/gpadmin-b" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">B</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/gpadmin-c" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">C</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/gpadmin-d" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">D</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/gpadmin-e" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">E</span>
                  </a>
                </div>
              </div>
              
              
              

            <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
                <div id="evaluated" class="tab-content">
                    <table id="regionTable" class="mx-auto">
                        <thead class="bg-blue-300 text-sm">
                            <tr>
                                <th>Category</th>
                                <th>View Attachment</th>
                                <th>Means of Verification</th>
                                <th>Final Score</th>
                                <th>Remarks</th>
                                <th>ROMD Evaluated Score</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td><b>A. Good Governance Measures</b></td>
                                </tr>

                                <tr>
                                    <td>A.1. Compliance for Corrupt Policy</td>
                                    <td></td>
                                    <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Certification of no pending case signed by the Regional Administrative Complaints Committee signed by the Chair (Regional Director)</p></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra1_final_score" type="text" placeholder="Input your initial score" required >
                                            <option value="">Select score</option>
                                            <option value="40">40 - The Province has no personnel with pending administrative case</option>
                                            <option value="0">0 - The Province has at least one pending administrative case</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra1_remarks" type="text" placeholder="Remarks"></td>
                                </tr>

                                <tr>
                                    <td>A.2. Compliance for the TESDA Code of Conduct and Ethical Standards Valid Complaint</td>
                                    <td></td>
                                    <td><p class="small mb-1" style="font-size: 10px;">Certification of no complaints/findings signed by the Regional Administrative Complaints Committee signed by the Chair (Regional Director)</p></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra2_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="30">30 - There are no valid complaints, findings against any Official and Employee.</option>
                                                        <option value="20">20 - There are 1-3 complaint/s, findings against any Official and Employee.</option>
                                                        <option value="10">10 - There are 4-6 complaints, findings against any Official and Employee.</option>
                                                        <option value="5">5 - There are 7-9 complaints, findings against any Official and Employee.</option>
                                                        <option value="0">0 - No Communication Plan was prepared and not all communications activities were implemented</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra2_remarks" type="text" placeholder="Remarks"></td>
                                </tr>

                                <tr>
                                    <td>A.3. Resolutions of complaints emanating from the Contact Center</td>
                                    <td></td>
                                    <td>
                                        <p class="small mb-1" style="font-size: 10px;">Means of Verification: <br>- Certification of No Complaints Received - signed by the RD 
                                                        <br>- Summary Report of Complaints Received, signed by the RD TESDA OP AS 03 F04
                                                        Monitoring of Complaints Received
                                                        </p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra3_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="10">10 - No complaints received</option>
                                                        <option value="10">10 - 95% of all complaints emanating from the Contact Center have been resolved and closed within the year</option>
                                                        <option value="0">0 - Less than 95% of all complaints against the POs and TTIs emanating from the Contact Center have been resolved and closed within the year</option>
                                        </select>
                                    </td>
                                     <td><input class="form-control mb-1" name="ra3_remarks" type="text" placeholder="Remarks"></td>
                                </tr>
                                <tr>
                                    <td>A.4. Customer Satisfaction Results Customer Net Satisfaction Rating with minimum of 95%</td>
                                    <td></td>
                                    <td>
                                        <p class="small mb-1" style="font-size: 10px;">Means of Verification: <br>- Customer Feedback Form Results (TESDA OP AS 03 F02)
                                                                <br>- Monthly (January to December) Summary Report with Percentage signed by the PD
                                        </p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra4_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="30">30 - Customer Net Satisfaction Rating is at 99% and above</option>
                                                        <option value="20">20 - Customer Net Satisfaction Rating is at 98%</option>
                                                        <option value="10">10 - Customer Net Satisfaction Rating is at 97%</option>
                                                        <option value="5">5 - Customer Net Satisfaction Rating is at 96%</option>
                                                        <option value="3">3 - Customer Net Satisfaction Rating is at 95%</option>
                                                        <option value="0">0 - No Communication Plan was prepared and not all communications activities were implemented</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra4_remarks" type="text" placeholder="Remarks"></td>
                                </tr>
                                <tr>
                                    <td>A.5.A. Compliance to Commission on Audit Rules and Regulations: Unimplemented Audit Observation Memorandum by the Provincial Office</td>
                                    <td></td>
                                    <td>
                                        <p class="small mb-1" style="font-size: 10px;">Means of Verification: <br>Certification/Memorandum with NO AOM received or number of unimplemented audit observation issued by COA
                                                        <br>Annual Audit Report (AAR) and Agency Action Plan and Status of Implementation (AAPSI)
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra5a_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="15">15 - 0 unimplemented audit observation memorandum by the province</option>
                                                        <option value="5">5 - 2-5 unimplemented audit observation memorandum by the province</option>
                                                        <option value="0">0 - 6-10 unimplemented audit observation memorandum by the province</option>
                                                    </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra5a_remarks" type="text" placeholder="Remarks"></td>
                                </tr>
                                <tr>
                                    <td>A.5.B. Compliance to Commission on Audit Rules and Regulations: Notice of Suspension and Disallowance</td>
                                    <td></td>
                                    <td>
                                        <p class="small mb-1" style="font-size: 10px;">Means of Verification: <br>Certification of no suspension nor disallowances signed by the FA
                                                        <br>Statement of Audit Suspensions, Disallowances and Charges (SASDC) with summary as of December issued by the COA (RO and PO and TTIs)
                                                        </p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra5b_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="15">15 - There no suspensions and disallowances</option>
                                                        <option value="0">0 - There are suspensions and disallowances</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra5b_remarks" type="text" placeholder="Remarks"></td>
                                </tr>
                                <tr>
                                    <td>A.6. Compliance to PhilGEPS requirements</td>
                                    <td></td>
                                    <td>
                                        <p class="small mb-1" style="font-size: 10px;">Means of Verification: <br>Certification of Compliance signed/issued by PhilGEPS; Notice of Award/ Notice to Proceed
                                                        <br>Government Procurement Policy Board (GPPB) report who are compliant
                                                        </p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra6_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="30">30 - 100% compliance from Publication to Notice and Award and notice to proceed</option>
                                                        <option value="0">0 - Non-compliance from Publication to Notice and Award and notice to proceed</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra6_remarks" type="text" placeholder="Remarks"></td>
                                </tr>
                                <tr>
                                    <td>A.7.A. Liquidation of Cash Advances (Foreign and Local Travel Expenses): Liquidation of Foreign Travel Expenses</td>
                                    <td></td>
                                    <td>
                                        <p class="small mb-1" style="font-size: 10px;">Means of Verification: <br>Monitoring report signed by the Financial Accountant and PD
                                                        <br>Proof of postings submitted/received copy from COA
                                                        <br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances
                                                        </p> 
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra7a_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="10">10 - All Foreign Travel Expenses liquidated within 60 days</option>
                                                        <option value="0">0 - Partial number of Foreign Travel Expenses liquidated beyond 60 days</option>
                                                    </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra7a_remarks" type="text" placeholder="Remarks"></td>
                                </tr>
                                <tr>
                                    <td>A.7.B. Liquidation of Cash Advances (Foreign and Local Travel Expenses): Liquidation of Local Travel Expenses</td>
                                    <td></td>
                                    <td>
                                        <p class="small mb-1" style="font-size: 10px;">Means of Verification: <br>Monitoring report signed by the Financial Accountant and PD
                                                        <br>Proof of postings submitted/received copy from COA
                                                        <br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances 
                                                        </p>   
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="10">10 - All Local Travel Expenses liquidated within 30 days</option>
                                                        <option value="0">0 - Partial number of Local Travel Expenses liquidated beyond 30 days</option>
                                                    </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                                </tr>
                                <tr>
                                    <td>A.8. Compliance to Agency Procurement Compliance Performance Indicator (APCPI)</td>
                                    <td></td>
                                    <td>
                                        <p class="small mb-1" style="font-size: 10px;">Means of Verification: <br>- PO's FY 2023 Agency Procurement Compliance Performance Indicator (APCPI) reports submitted within set deadlines (copy of email to GPPB)
                                                        <br>- Acknowledgment email from GPBB
                                                        </p>   
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <select class="form-control mb-1 score-dropdown" name="ra8_final_score" type="text" placeholder="Input your initial score" required>
                                                        <option value="">Select score</option>
                                                        <option value="10">10 - The Provincial Office is compliant to APCPI</option>
                                                        <option value="0">0 - No Communication Plan was prepared but activities were fully implemented</option>
                                                    </select>
                                    </td>
                                    <td><input class="form-control mb-1" name="ra8_remarks" type="text" placeholder="Remarks"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Score</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>Final Score:</b> <span id="totalScore">0</span></td>
                                    <td><button class="btn btn-primary" id="submitButton">Submit</button></td>
                                </tr>
                        </tbody>

                       
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