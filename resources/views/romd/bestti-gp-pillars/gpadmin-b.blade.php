<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pillar B</title>
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
            
            <div class="flex items-center ml-6">
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/gpadmin-a" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">A</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer">
                  <a href="/gpadmin-b" class="block h-full w-full flex items-center justify-center">
                    <span class="text-gray-200 font-bold text-xs">B</span>
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
                                                    <!-- GALING PROBINSYA CRITERIA B -->
                                                        <tr>
                                                            <td><b>B.1. Performance based on the General Appropriations Act (GAA)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.A. Number of Provincial TESD plans formulated/updated</td>
                                                            <td align="center"></td>
                                                            <td> <p class="small mb-1" style="font-size: 10px;">Means of Verification: Submission of the Regional and Provincial TESD plans with cover memo</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb1a_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb1a_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.B. 94% stakeholders who rated policies/plans as good or better</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Report on the User’s Feedback Survey with summary and percentage signed by the RD</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb1b_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select>
                                                            </td>
                                                            <td><input class="form-control mb-1" name="rb1b_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.C. 100% of registered TVET programs audited</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Summary/Report on the duly accomplished TESDA-OP-CO-02-
                                                                            F06-RO Form <br>
                                                                            Duly signed compliance audit reports<br>
                                                                            Summary of audited programs<br>
                                                                            Closure reports<br>
                                                                            Validated OPCR</p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb1c_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb1c_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.D. 90% of skilled workers issued with certification within 7 days of their application</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Tracking sheets (F41) - RO/PO c/o CO
                                                                            (with Summary Report of the percentage of accomplishment signed by the RD)</p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb1d_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select>
                                                            </td>
                                                            <td><input class="form-control mb-1" name="rb1d_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.E. 85% compliance of TVET programs to TESDA, industry, and industry standards and requirements</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Summary/Report on the duly accomplished 
                                                                            TESDA-OP-CO-02-F06-RO Form
                                                                            (Summary Report with percentage of accomplishment signed by the RD)
                                                                            </p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb1e_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - NThe accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb1e_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.F. 70% of TVET graduates that undergo assessment for certification</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: List of mandatory assessment from T2MIS 
                                                                            (with Summary Report of percentage of accomplishment signed by the RD)
    
                                                                            </p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb1f_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb1f_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.G. 60% of TVET programs with tie-ups to industry</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Summary/Report on duly accomplished 
                                                                            TESDA TVET Partnership Monitoring System (TTPMS) 
                                                                            </p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb1g_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb1g_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.H. Number of graduates from TESD Scholarship Programs</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Signed, validated OPCR - accomplishment to be evaluated by the ROMO</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <select class="form-control mb-1 score-dropdown" name="rb1h_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="35">35 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select>
                                                            </td>
                                                            <td><input class="form-control mb-1" name="rb1h_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.1.I. 76.30% of graduates from technical education and skills development scholarship programs that were employed</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Summary/Report on Result on the Survey on Employability of TVET graduates under TWSP, PESFA and STEP (SETG)
                                                                    </p></td>
                                                                    <td></td>
                                                                    <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb1i_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                            </select></td>
                                                            <td><input class="form-control mb-1" name="rb1i_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2. Implementation of the TESDA Corporate Plan</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.A. Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.A.1. Advancement through Innovations and Researches</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Memorandum on the endorsement/submission of policy/technology research/es signed by the RD Researches submitted to the NITESD</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2a1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="8">8 - The Province has submitted policy or technology research/es</option>
                                                                            <option value="0">0 - The Province has not suibmitted policy or technology research/es</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2a1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.A.2. Implementation of Recognized/aligned PQF level 4 or Level 5 programs</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: TAS' Certificates of Recognition for PQF Level 4 or Level 5; </p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2a2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="8">8 - All TAS in the Province have at least 1 recognized/aligned PQF level 4 or level 5 programs</option>
                                                                            <option value="0">0 - Not all TAS in the Province have at least 1 recognized/aligned PQF level 4 or level 5 programs</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2a2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.A.3. Digitalization of TVET</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Terminal Reports/After Activity reports, List of Participants</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2a3_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="6">6 - The PO has institutionalized digitalization/use of electronic/online service delivery channel in the implementation of programs and/or utilize new technologies to reduce manual effort and increase productivity</option>
                                                                            <option value="3">3 - The PO has developed digitalization plan to enhance existing systems using/aided by new or emerging technologies to improve performance, efficiency, and capabilities</option>
                                                                            <option value="0">0 - The PO has no digitalization plan or initiatives undertaken</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2a3_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.A.4. Participation and Recognition from Skills Competition</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.A.4.1. Participation</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Terminal Reports/After Activity reports, List of Participants</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2a4_1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="6">6 - The Province participated in ASC and/or World Skills Competition</option>
                                                                            <option value="3">3 - The Province participated in PNSC</option>
                                                                            <option value="0">0 - The Province did not participate in any of the competition</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2a4_1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.A.4.2. Awards received at the national level</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Awards received (plaque or medal)</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2a4_2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="7">7 - The Province received award/recognition at the national level</option>
                                                                            <option value="0">0 - The Province did not receive award/recognition</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2a4_2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.A.4.3. Awards received at the international level</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Awards received (plaque or medal)</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2a4_3_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The Province received award/recognition at the international level</option>
                                                                            <option value="0">0 - The Province did not receive award/recognition</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2a4_3_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.B. Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.B.1. TVET enrolment and graduates by delivery mode- community-based</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Monitoring Reports</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2b1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2b1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.B.2. Skills Training Programs for Special Clients</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Monitoring Reports</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2b2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - At least 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women)</option>
                                                                            <option value="0">0 - Less than 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women)</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2b2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.B.3. Number of Scholarship Programs enrolled</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Monitoring Reports</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2b3_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="35">35 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2b3_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.B.4. Advocacy program to promote the importance of TVET in communities and the roles of CTECs in LGUs</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Summary of LGUs provided with orientation on TVET Devolution (include dates)
                                                                            Attachment: After Activity Reports on meetings conducted</p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2b4_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - At least 10% of the municipalities in the Province have been given orientation on Devolution of TVET</option>
                                                                            <option value="0">0 - Less than 10% of the municipalities in the Province have been given orientation on Devolution of TVET</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2b4_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.B.5. Communications/programs/advocacy on Gender and Development (GAD)</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: After activity reports on GAD related programs conducted</p> </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2b5_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The PO have conducted programs/activities related to GAD</option>
                                                                            <option value="0">0 - The PO have not conducted programs/activities related to GAD</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2b5_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.C. Upscale Technical Education and Skills Development and Certification to Higher PQF Levels</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.C.1. Number of Programs Registered</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: MIS 02-04<br>
                                                                            List of New Programs<br>
                                                                            Signed Validated OPCR</p> </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2c1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2c1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.C.2. Process Cycle Time for CTPR Issuance (3 days)</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: F08
                                                                            Monthly Report on Program Registration</p>   </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2c2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2c2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.C.3. Number of skilled workers assessed for certification</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Summary/Report RWAC Report from T2MIS;  
                                                                            Signed Validated OPCR</p> </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2c3_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2c3_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.C.4. Number of New Assessment Centers</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Registry of Accredited Assessment Centers from T2MIS; Signed Validated OPCR</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2c4_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2c4_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.C.5. Number of New Assessors</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Registry of Accredited Assessors from T2MIS;  Signed Validated OPCR</p> </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2c5_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2c5_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.C.6. Establishment of Assessment Centers for NC Level IV Qualification</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Registry of Accredited Assessment Centers (NC IV) from T2MIS</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2c7_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - At least 1 Assessment Center for NC Level IV Qualification was established in the Province</option>
                                                                            <option value="0">0 - No Assessment center for NC Level IV Qualification was established in the Province</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2c7_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.D. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.1. TVET enrolment and graduates by delivery mode- institution-based</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Report from T2MIS
                                                                            Summary of Target and Accomplishment
                                                                            Signed Validated OPCR</p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.2. TVET enrolment and graduates by delivery mode- enterprise-based</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Report from T2MIS
                                                                            Summary of Target and Accomplishment
                                                                            Signed Validated OPCR</p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.D.3. World Cafe of Opportunities</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.3.1. Implementation of WCO</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Report from T2MIS
                                                                            Summary of Target and Accomplishment
                                                                            Signed Validated OPCR</p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d3_1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="5">5 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d3_1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.3.2 Number of HOTS</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: After Activity Report<br>
                                                                            Number of HOTS<br>
                                                                            List of HOTS and their TVET qualifications</p></td>
                                                                            <td></td>
                                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d3_2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="5">5 - The accomplishment rate based on set target is at 100% and above</option>
                                                                            <option value="0">0 - The accomplishment rate based on set target is below 100%</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d3_2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.D.4. Institutional Awards</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.D.4.1. TESDA Idol (Wage-employed)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.4.1.1. Participation</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Memorandum on nominees endorsed </p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d4_1_1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="5">5 - The Province participated in TESDA Idol (Wage-employed)</option>
                                                                            <option value="0">0 - The Province did not participate in TESDA Idol (Wage-employed)</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d4_1_1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.4.1.2. Awards received</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Awards received</p>  </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d4_1_2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The Province received award/recognition at the national level</option>
                                                                            <option value="0">0 - The Province did not receive award/recognition at the national level</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d4_1_2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.D.4.2. TESDA Idol (Self-employed)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.4.2.1. Participation</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Memorandum on nominees endorsed</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d4_2_1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="5">5 - The Province participated in TESDA Idol (self-employed)</option>
                                                                            <option value="0">0 - The Province did not participate in TESDA Idol (self-employed)</option>
                                                            </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d4_2_1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.4.2.2. Awards received</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Awards received</p>  </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d4_2_2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The Province received award/recognition at the national level</option>
                                                                            <option value="0">0 - The Province did not receive award/recognition at the national level</option>
                                                                        </select></td>
                                                            
                                                            <td><input class="form-control mb-1" name="rb2d4_2_2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.D.4.3. Kabalikat Awards</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.4.3.1. Participation</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Memorandum on nominees endorsed</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d4_3_1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="5">5 - The Province participated in Kabalikat Awards</option>
                                                                            <option value="0">0 - The Province did not participate in Kabalikat Awards</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d4_3_1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.4.3.2. Awards received</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Awards received</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d4_3_2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The Province received award/recognition at the national level</option>
                                                                            <option value="0">0 - The Province did not receive award/recognition at the national level</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d4_3_2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.D.4.4. Tagsanay</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.4.4.1. Participation</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Endorsement Memo, TESDA Order</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d4_4_1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="5">5 - The Province participated in in the National Level Tagsanay Awards</option>
                                                                            <option value="0">0 - The Province did not participate in the National Level Tagsanay Awards</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d4_4_1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.4.4.2. Awards received</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Awards received</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d4_4_2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The Province received award/recognition at the national level</option>
                                                                            <option value="0">0 - The Province did not receive award/recognition at the national level</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d4_4_2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.5. Partnerships forged and implemented (to be measured in terms of resources and increase in program outputs, CSR – partnership with private companies)</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Copies of signed MOAs/MOUs<br>
                                                                    Summary of signed MOAs/MOUs (please include dates)</p>  </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <select class="form-control mb-1 score-dropdown" name="rb2d5_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score for Large Province</option>
                                                                            <option value="15">15 - Partnerships with three (3) or more industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                                                            <option value="10">10 - Partnerships with two (2) industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                                                            <option value="5">5 - Partnerships with two (2) industries / private companies and with continuing tie-ups for one (1) year with the same industries/companies</option>
                                                                            <option value="0">0 - Partnerships with less than two (2) industries / private companies</option>
    
                                                                            
                                                                            <option value="">Select score for Medium Province</option>
                                                                            <option value="15">15 - Partnerships with two (2) or more industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                                                            <option value="10">10 - Partnerships with one (1) industry / private company and with continuing tie-ups for the last two (2) years with the same industries/companies</option>
                                                                            <option value="5">5 - Partnerships with one (1) industry / private company and with continuing tie-ups for one (1) year with the same industries/companies</option>
                                                                            <option value="0">0 - No Partnerships</option>
                                                                            
                                                                            <option value="">Select score for Small Province</option>
                                                                            <option value="15">15 - Partnership with more than one (1) industry / private company and with continuing tie-ups for the last two (2) years with the same industry/company</option>
                                                                            <option value="10">10 - For Small Province:</b> Partnership with one (1) industry / private company and with continuing tie-ups for the last one (1) year with the same industry/company</option>
                                                                            <option value="5">5 - Partnership with one new (1) industry / private company</option>
                                                                            <option value="0">0 - No Partnership</option>
                                                                        </select>
                                                            </td>
                                                            <td><input class="form-control mb-1" name="rb2d5_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.D.6. Number of new EBT programs implemented in private TVIs (DTS, Apprenticeship, Learnership, In-company training, PAFSE)</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Copies of EBT Registration</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2d6_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score for Large Province</option>
                                                                            <option value="10">10 - At least 30 new programs for Provinces that belongs to the Large Category</option>
                                                                            <option value="0">0 - Below the minimum number of programs per category</option>
    
                                                                            
                                                                            <option value="">Select score for Medium Province</option>
                                                                            <option value="10">10 - At least 20 new programs for Provinces that belongs to the Medium Category</option>
                                                                            <option value="0">0 - Below the minimum number of programs per category</option>
    
                                                                            
                                                                            <option value="">Select score for Small Province</option>
                                                                            <option value="10">10 - At least 10 new programs for Provinces that belongs to the Small Category</option>
                                                                            <option value="0">0 - Below the minimum number of programs per category</option>
    
    
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2d6_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.E. Streamline and Intensify QMS in All Organizational Subsystems</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.E.1.1. Asia Pacific Accreditation and Certification Commission (APACC)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.1.1.a. Participation</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Self Study Report submitted to APACC with letter and evidence</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e1_1a_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="6">6 - The province nominated TVI/s for APACC accreditation</option>
                                                                            <option value="0">0 - The province did not nominate any TVI/s for APACC accreditation</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e1_1a_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.1.1.b. Awards received</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Certificate of Accreditation</p>    </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e1_1b_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="10">10 - The nominated TVI/s of the province received APACC accreditation</option>
                                                                            <option value="0">0 - The nominated TVI/s of the province did not receive APACC Accreditation</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e1_1b_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.E.1.2. System for TVET Accreditation and Recognition (STAR) Program</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.1.2.a. Participation</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p>     </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e1_2a_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="6">6 - The Province participated in STAR Program</option>
                                                                            <option value="0">0 - The Province did not participate in STAR Program</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e1_2a_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.1.2.b. Awards received</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Awards received/ Letter of result signed by the Secretary</p>      
                                                                <div class="row gx-3"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e1_2b_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="20">20 - The province received at least one THREE STAR Level Award</option>
                                                                            <option value="10">10 - The province received at least one TWO STAR Level Award</option>
                                                                            <option value="5">5 - The province received at least one ONE STAR Level Award</option>
                                                                            <option value="0">0 - The province did not receive a STAR Level Award</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e1_2b_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.E.1.3. TESDA Seal of Integrity</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.1.3.a. Participation</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e1_3a_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="8">8 - All qualified TTIs of the province applied for the TESDA Seal of Integrity</option>
                                                                            <option value="0">0 - Not all qualified TTIs of the province applied for TESDA Seal of Integrity</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e1_3a_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.1.3.b. Awards received</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Awards received</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e1_3b_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="8">8 - At least 80% of the qualified TTIs of the province have been awarded with the TESDA Seal of Integrity</option>
                                                                            <option value="0">0 - Below 80% of the qualified TTIs of the province have been awarded with TESDA the Seal of Integrity</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e1_3b_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>B.2.E.2. Quality Management System Implementation</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.2.1. Number of Active IQA Lead Auditor/s</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Inventory of Lead Auditors/Auditors (TESDA QP 03-F09)</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e2_1_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="8">8 - The province has at least four (4) active IQA Lead Auditors/Auditors</option>
                                                                            <option value="4">4 - The province has two (2) to three (3) active IQA Lead Auditors/ Auditors</option>
                                                                            <option value="0">0 - The province has less than two (2) active IQA Lead Auditors/ Auditors</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e2_1_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.2.2. ISO 9001:2015 Certification (Acquisition/Re-certification of Central and Regional/Provincial Offices)</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: RRRO - Monitoring of submission. IQA Reports reflected on the QP-03-F12 Action Catalog - QP-03-F11</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e2_2_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="8">8 - The province submitted report/doc ahead of deadline</option>
                                                                            <option value="4">4 - The province submitted report/docs on set deadline</option>
                                                                            <option value="0">0 - The province submitted report/doc after set deadline</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e2_2_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.2.3. Compliance to Quality Standards (QA assessment and audit reports with no major non-conformances)</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Manning of the Provincial Office versus the actual number of personnel that have attended training</p><p class="small mb-1" style="font-size: 10px;">*Plus (1) Point for ROPO initiated QMS related training programs of personnel</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e2_3_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="6">6 - >80% of provincial personnel attended QMS related training programsd</option>
                                                                            <option value="3">3 - 40% to 80% of provincial personnel attended QMS related training programs</option>
                                                                            <option value="0">0 - <40% of provincial personnel attended QMS related training programs</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e2_3_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>B.2.E.3. Green Practices (100% implementation of programs/activities/projects related to Green Practices indicated in the submitted Institutional Development Plan (IDP))</td>
                                                            <td align="center"></td>
                                                            <td><p class="small mb-1" style="font-size: 10px;">Monitoring report, Research/ Project Proposals, Competency-based Curriculum (CBC), Program Offerings related to Agriculture, Institutional practices</p></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><select class="form-control mb-1 score-dropdown" name="rb2e3_final_score" type="text" placeholder="Input your initial score" required>
                                                                            <option value="">Select score</option>
                                                                            <option value="15">15 - All TTIs in the Province have implemented their plans and projects related to Green Practices</option>
                                                                            <option value="0">0 - Not all TTIs in the Province have implemented their plans and projects related to Green Practices</option>
                                                                        </select></td>
                                                            <td><input class="form-control mb-1" name="rb2e3_remarks" type="text" placeholder="Remarks"></td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td align="center"></td>
                                                            <td></td>
                                                            <td><b>Total Score</b></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><b>Final Score</b></td>
                                                            <td><span id="totalScore">0</span></td>
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