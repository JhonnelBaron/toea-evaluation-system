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
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-b" class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria B</span>
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

                    <tr>
                        <td class="pb-8">
                            <b>B. Implementation of TESD Programs</b><br>
                            B.1. Performance based on the General Appropriations Act (GAA)<br>
                            <span>B.1.A. Number of Provincial TESD plans formulated/updated</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Submission of the Regional and Provincial TESD plans with cover memo</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra1_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra1_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <span>B.1.B. 94% stakeholders who rated policies/plans as good or better</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report of the User’s Feedback Survey</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra2_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra2_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <span>B.1.C. 100% of registered TVET programs audited<br>Customer Net Satisfaction Rating with minimum of 95%</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on the duly accomplished TESDA-OP-CO-02-F06-RO Form Duly signed compliance audit reports Summary of audited programs Closure reports Monthly monitoring of OPCRs</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra3_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100%</option>
                                <option value="20">20 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra3_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <span>B.1.D. 90% of skilled workers issued with certification within 7 days of their application</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Tracking sheets (F41) - RO/PO c/o CO</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra4_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra4_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.1.E. 85% compliance of TVET programs to TESDA, industry, and industry standards and requirements<br></h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on the duly accomplished TESDA-OP-CO-02-F06-RO Form</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra5_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra5_remarks" type="text" placeholder="Remarks"></td>
                    </tr>

                    <tr>
                        <td class="pb-8">
                            B. Implementation of TESD Programs<br>
                            B.1. Performance based on the General Appropriations Act (GAA)<br>
                            B.1.A. Number of Provincial TESD plans formulated/updated
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Submission of the Regional and Provincial TESD plans with cover memo</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra1_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra1_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.1.B. 94% stakeholders who rated policies/plans as good or better
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report of the User’s Feedback Survey</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra2_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra2_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.1.C. 100% of registered TVET programs audited<br>Customer Net Satisfaction Rating with minimum of 95%
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report on the duly accomplished TESDA-OP-CO-02-F06-RO Form Duly signed compliance audit reports Summary of audited programs Closure reports Monthly monitoring of OPCRs</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra3_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100%</option>
                                <option value="20">20 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra3_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.1.D. 90% of skilled workers issued with certification within 7 days of their application
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Tracking sheets (F41) - RO/PO c/o CO</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra4_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra4_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2. Implementation of the TESDA Corporate Plan 2018-2022<br>
                            <hr>  
                            B.2.A. Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness - SD 1<br><br>
                            B.2.A.1. Advancement through Innovations and Researches
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report generated from the SPMOR</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra5_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra5_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2.A.2. Implementation of Recognized/aligned PQF level 4 or Level 5 programs
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Certificate of Recognition for PQF Level 4 or Level 5; List of enrollees</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra6_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="10">10 - All TAS in the Region have at least 1 recognized/aligned PQF level 4 or level 5 programs</option>
                                <option value="0">0 - Not all TAS in the Region have at least 1 recognized/aligned PQF level 4 or level 5 programs</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra6_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2.A.3. Participation and Recognition from Skills Competition<br>
                            B.2.A.3.1. Participation
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Terminal Reports/After Activity reports / Official list of winners</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="6">6 - The Region participated in ASC and/or World Skills Competition</option>
                                <option value="6">6 - The Region participated in PNSC</option>
                                <option value="0">0 - The Region did not participate in any of the competition</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2.A.3.2. Awards received at the national level
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra8_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="7">7 - The Region received award/recognition at the national level</option>
                                <option value="0">0 - The Region did not receive award/recognition</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra8_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            B.2.A.3.3. Awards received at the international level
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p>
                        </td>
                        <!-- Added one more <td class="pb-8"> element -->
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra9_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select Score</option>
                                <option value="12">12 - The Region received award/recognition at the international level</option>
                                <option value="0">0 - The Region did not receive award/recognition</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra9_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B. Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction - SD 2</h5>
                            <hr>
                            <h5>B.2.B.1. TVET enrolment and graduates by delivery mode- community-based</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.2. Skills Training Programs for Special Clients</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - At least 7 programs provided to special clients</option>
                                <option value="0">0 - Less than 7 programs provided to special clients</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.3. Number of Scholarship Programs enrolled</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="35">35 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.4. Advocacy program to promote the importance of TVET in communities and the roles of CTECs in LGUs</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Reports on meetings conducted</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - At least 10% of the municipalities in the Region have been given orientation on Devolution of TVET</option>
                                <option value="0">0 - Less than 10% of the municipalities in the Region have been given orientation on Devolution of TVET</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.B.5. Communications/programs/advocacy on Gender and Development (GAD)</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - All TTIs and the PO have conducted programs/activities related to GAD</option>
                                <option value="0">0 - Not all TTIs and the PO have conducted programs/activities related to GAD</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C. Upscale Technical Education and Skills Development and Certification to Higher PQF Levels - SD3</h5>
                            <hr>
                            <h5>B.2.C.1. Number of Programs Registered</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: MIS 02-04</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.2. Process Cycle Time for CTPR Issuance (3 days)</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monthly Report on Program Registration</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.3. Number of skilled workers assessed for certification</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Summary/Report RWAC Report from T2MIS; Signed Validated OPCR</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.4. Number of New Assessment Centers</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Registry of Accredited Assessment Centers from T2MIS; Signed Validated OPCR</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.5. Number of New Assessors</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Registry of Accredited Assessors from T2MIS; Signed Validated OPCR</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.C.6. Establishment of Assessment Centers for NC Level IV Qualification</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Report (CO), Certificate of Accreditation for Level IV Assessment Centers (ROs)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - At least 3 Assessment Centers for NC Level IV Qualifications (Large Regions)</option>
                                <option value="0">0 - Less than 3 Assessment Centers for NC Level IV Qualifications</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD - SD4</h5>
                            <hr>
                            <h5>B.2.D.1. TVET enrolment and graduates by delivery mode - institution-based</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from T2MIS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.2. TVET enrolment and graduates by delivery mode - enterprise-based</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report from T2MIS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.3. World Cafe of Opportunities</h5>
                            <br>
                            <h5>B.2.D.3.1. Implementation of WCO</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Report</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="5">5 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.3.2 Number of HOTS</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Report, Number of HOTS List of HOTS and their TVET qualifications</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="5">5 - The accomplishment rate based on set target is at 100% and above</option>
                                <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4. Institutional Awards</h5>
                            <span>60</span>
                            <h5>B.2.D.4.1. TESDA Idol (Wage-employed)</h5>
                            <span>15</span>
                            <h5>B.2.D.4.1.1. Participation</h5>
                            <span>5</span>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="5">5 - The Region participated in TESDA Idol (Wage-employed)</option>
                                <option value="0">0 - The Region did not participate in TESDA Idol (Wage-employed)</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.1.2. Awards received</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - The Region received award/recognition at the national level</option>
                                <option value="0">0 - The Region did not receive award/recognition at the national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.2. TESDA Idol (Self-employed)</h5>
                            <br>
                            <h5>B.2.D.4.2.1. Participation</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="5">5 - The Region participated in TESDA Idol (self-employed)</option>
                                <option value="0">0 - The Region did not participate in TESDA Idol (self-employed)</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.2.2. Awards received</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - The Region received award/recognition at the national level</option>
                                <option value="0">0 - The Region did not receive award/recognition at the national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.3. Kabalikat Awards</h5>
                            <h5>B.2.D.4.3.1. Participation</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Memorandum on nominees endorsed</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="5">5 - The Region participated in Kabalikat Awards</option>
                                <option value="0">0 - The Region did not participate in Kabalikat Awards</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.3.2. Awards received</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - The Region received award/recognition at the national level</option>
                                <option value="0">0 - The Region did not receive award/recognition at the national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.4. Tagsanay</h5>
                            <h5>B.2.D.4.4.1. Participation</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Endorsement Memo, TESDA Order</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="5">5 - The Region participated in the National Level Tagsanay Awards</option>
                                <option value="0">0 - The Region did not participate in the National Level Tagsanay Awards</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.4.4.2. Awards received</h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - The Region received award/recognition at the national level</option>
                                <option value="0">0 - The Region did not receive award/recognition at the national level</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.5. Partnerships forged and implemented</h5>
                            <p>To be measured in terms of resources and increase in program outputs</p>
                            <p>CSR – partnership with private companies</p>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Copies of signed MOAs</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="15">15 - For Large Region: Partnerships with three (3) or more industries/private companies and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                <option value="0">0 - For Small Region: Partnership with more than one (1) industry/private company and with continuing tie-ups for the last two (2) years with the same industry/company</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>B.2.D.6. Number of new EBT programs implemented in private TVIs</h5>
                            <p>(DTS, Apprenticeship, Learnership, In-company training, SIL, PAFSE)</p>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Compendium of program registration, Registry of EBT programs; T2MIS</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" type="text" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - At least 30 new programs for Large Category</option>
                                <option value="0">0 - Below the minimum number of programs per category</option>
                            </select>
                        </td>
                        <td class="pb-8">
                            <input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks">
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E. Streamline and Intensify QMS in All Organizational Subsystems<br><hr>
                                B.2.E.1. Accreditation Awards (STAR Program, APACC)<br>
                                B.2.E.1.1. Asia Pacific Accreditation and Certification Commission (APACC)<br>
                                B.2.E.1.1.a. Participation
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Self Study Report submitted to APACC with letter and evidence</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="6">6 - The Region nominated TVI/s for APACC accreditation</option>
                                <option value="0">0 - The Region did not nominate any TVI/s for APACC accreditation</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.1.b. Awards received
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Certificate of Accreditation</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="10">10 - The nominated TVI/s of the Region received APACC accreditation</option>
                                <option value="0">0 - The nominated TVI/s of the Region did not receive APACC accreditation</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.2. System for TVET Accreditation and Recognition (STAR) Program<br>
                                B.2.E.1.2.a. Participation
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="6">6 - The Region participated in STAR Program</option>
                                <option value="0">0 - The Region did not participate in STAR Program</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.2.b. Awards received
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received/ Letter of result signed by the Secretary</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="20">20 - The Region received at least one THREE STAR Level Award</option>
                                <option value="10">10 - The Region received at least one TWO STAR Level Award</option>
                                <option value="5">5 - The Region received at least one ONE STAR Level Award</option>
                                <option value="0">0 - The Region did not receive a STAR Level Award</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.3. TESDA Seal of Integrity<br>
                                B.2.E.1.3.a. Participation
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="8">8 - All qualified TTIs of the region applied for the TESDA Seal of Integrity</option>
                                <option value="0">0 - Not all qualified TTIs of the region applied for TESDA Seal of Integrity</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.1.3.b. Awards received
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" placeholder="Input your initial score" required>
                                <option value="">Select score</option>
                                <option value="8">8 - At least 80% of the TTIs of the Region have been awarded with the TESDA Seal of Integrity</option>
                                <option value="0">0 - Below 80% TTIs of the Region have been awarded with TESDA Seal of Integrity</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.2. Quality Management System Implementation = 22
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: IQA reports (TESDA Action Catalogue)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" required>
                                <option value="">Select score</option>
                                <option value="22">22 - Quality Management System Implementation</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.2.1. Number of Active IQA Lead Auditor/s
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Inventory of Lead Auditors/Auditors (TESDA QP 03-F09)</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" required>
                                <option value="">Select score</option>
                                <option value="8">8 - The Region has at least four (4) active IQA Lead Auditors/Auditors</option>
                                <option value="4">4 - The Region has two (2) to three (3) active IQA Lead Auditors/ Auditors</option>
                                <option value="0">0 - The Region has less than two (2) active IQA Lead Auditors/ Auditors</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.2.2. Timely Submission of Reports/Documents (e.g. IQA reports, Action Catalog, NAP)
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: RRRO - Monitoring of submission IQA Reports reflected on the QP-03-F12 Action Catalog - QP-03-F11</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" required>
                                <option value="">Select score</option>
                                <option value="8">8 - The Region submitted report/doc ahead of deadline</option>
                                <option value="4">4 - The Region submitted report/docs on set deadline</option>
                                <option value="0">0 - The Region submitted report/doc after set deadline</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.2.3. Percentage of Personnel Attendance to Central Office initiated QMS-related training programs
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Manning of the Regional Provincial Office versus the actual number of personnel that have attended training</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" required>
                                <option value="">Select score</option>
                                <option value="6">6 - >80% of provincial personnel attended QMS related training programs</option>
                                <option value="3">3 - 40% to 80% of provincial personnel attended QMS related training programs</option>
                                <option value="0">0 - <40% of provincial personnel attended QMS related training programs</option>
                                <option value="1">1 - Plus (1) Point for PO initiated QMS related training programs of personnel</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.3. Green Practices<br>
                                100% implementation of programs/activities/projects related to Green Practices indicated in the submitted Institutional Development Plan (IDP)
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring report, Research/ Project Proposals, Competency-based Curriculum (CBC), Program Offerings related to Agriculture, Institutional practices</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" required>
                                <option value="">Select score</option>
                                <option value="15">15 - All TTIs in the Region have implemented their plans and projects related to Green Practices</option>
                                <option value="0">0 - Not all TTIs in the Region have implemented their plans and projects related to Green Practices</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                    
                    <tr>
                        <td class="pb-8">
                            <h5>
                                B.2.E.4. Digitization
                            </h5>
                        </td>
                        <td class="pb-8">
                            <p class="small mb-1" style="font-size: 12px;">Means of Verification: Report on the digitization initiative or digital transformation of external services</p>
                        </td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8"></td>
                        <td class="pb-8">
                            <select class="form-control mb-1 score-dropdown" name="ra7b_final_score" required>
                                <option value="">Select score</option>
                                <option value="0">0 - Not provided</option>
                            </select>
                        </td>
                        <td class="pb-8"><input class="form-control mb-1" name="ra7b_remarks" type="text" placeholder="Remarks"></td>
                    </tr>

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





