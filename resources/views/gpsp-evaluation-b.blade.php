<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOEA Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .d-flex {
            display: flex;
        }
        .content {
            font-family: "Times New Roman", Times, serif;
            flex-grow: 1;
            padding-left: 20px;
            margin-top: 100px; /* Adjust for the fixed header height */
            background-color: hsl(0, 0%, 97%);
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* padding: 20px; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: fixed;
        }
        .sidebar.hidden {
            transform: translateX(-100%);
        }
        .toggle-btn {
            position: absolute;
            top: 200px;
            left: 200px;
            width: 15px;
            height: 15px;
            z-index: 1000;
        }
        .logo-picture, .profile-picture {
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .logo-picture {
            width: 100px;
            height: 100px;
        }
        .logo-picture img, .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        /* .profile-picture {
            width: 200px;
            height: 100px;
        } */
        .user-name, .user-type {
            margin-bottom: 5px;
            text-align: center;
        }
        .tabs {
            width: 100%;
        }
        .tabs a {
            display: block;
            padding: 10px;
            text-align: center;
            color: black;
            text-decoration: none;
        }
        .tabs a:hover {
            background-color: #f0f0f0;
        }
        body {
            background-color: hsl(0, 0%, 97%);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: calc(100% - 250px); /* Adjust for the sidebar width */
            height: 100px; /* Adjust height as needed */
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
            margin-left: 250px; /* To accommodate sidebar */
            background-color: #0066ff;
        }
        .box-content {
            margin: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            font-family: "Times New Roman", Times, serif;
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            padding: 8px;
            text-align: left;
            border: none;
        }
        th {
            background-color: transparent;
            font-weight: bold;
        }
        
        ul {
            text-align: left;
            font-size: 12px;
            padding: 0px;
        }
        .textbox{
            border-radius: 5px;
            border: 0.5px solid #ccc;
            width: 75px;"

        }
        .comments{
            rows="2" 
            columns: 3; 
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <div class="d-flex">
        @include('components.sidebar', [
            'profile-picture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-60">

        </div>
        <div class="header">
            <h1 class="text-xl font-bold text-white">GALING PROBINSYA - Small Category - Submission List</h1>
        </div>
        <div class="content">
            <div class="box-content">

                <!-- THIS IS A -->
                <table>
                    <thead>
                        <tr>
                            <th>Requirement</th>
                            <th>Initial Score</th>
                            <th>Means of Verification</th>
                            <th>Evaluation</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>B. Implementation of TESD Programs</b><br>
                                <b>B.1. Performance based on the General Appropriations Act (GAA)</b>
                                <b>B.1.A. Number of Provincial TESD plans formulated/updated</b>
                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                            <ul>The accomplishment rate based on set target is below 100% = <i> 0</i></ul></td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br><i><ul>*Submission of the Regional and Provincial TESD plans with cover memo</ul></i></td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>B.1.B. 94% stakeholders who rated policies/plans as good or better</b>  
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                            <br>
                            <ul><i>*Report of the User’s Feedback Survey</i></ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>B.1.C. 100% of registered TVET programs audited<br>
                                Customer Net Satisfaction Rating with minimum of 95%</b>  
                                            <ul>The accomplishment rate based on set target is at 100% = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>20</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                            <ul><i>*Summary/Report on the duly accomplished TESDA-OP-CO-02-F06-RO Form Duly signed compliance audit reports Summary of audited programs Closure reports Monthly monitoring of OPCRs</i></ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>B.1.D. 90% of skilled workers issued with certification within 7 days of their application</b>

                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                            <ul><i>Tracking sheets (F41) - RO/PO c/o CO</i></ul>

                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5><b>B.1.E. 85% compliance of TVET programs to TESDA, industry, and industry standards and requirements</b><br></h5>

                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>Summary/Report on the duly accomplished TESDA-OP-CO-02-F06-RO Form</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5><b>B.1.F. 70% of TVET graduates that undergo assessment for certification</b><br></h5>

                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>List of mandatory assessment from T2MIS</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5><b>B.1.G. 60% of TVET programs with tie-ups to industry</b><br></h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>Summary/Report on duly accomplished TESDA TVET Partnership Monitoring System (TTPMS)</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.1.H. Number of graduates from TESD Scholarship Programs</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>35</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Report generated from the SPMOR</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.1.I. 69.39% of graduates from technical education and skills development scholarship programs that were employed</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Report generated from the SPMOR</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                    <b>B.2. Implementation of the TESDA Corporate Plan 2018-2022</b><br>
                                    <hr>  
                                    <b>B.2.A.  Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness - SD 1</b><br><br>
                                    <b>B.2.A.1. Advancement through Innovations and Researches</b>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Report generated from the SPMOR</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.A.2. Implementation of Recognized/aligned PQF level 4 or Level 5 programs </b>
                                </h5>
                                    <ul>All TAS in the Province have at least 1 recognized/aligned PQF level 4 or level 5 programs = <i>10</i></ul>
                                    <ul>Not all TAS in the Province have at least 1 recognized/aligned PQF level 4 or level 5 programs = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Certificate of Recognition for PQF Level 4 or Level 5; List of enrollees</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.A.3. Participation and Recognition from Skills Competition</b><br>
                                    <b>B.2.A.3.1. Participation</b>
                                </h5>
                                    <ul>The Province participated in ASC and/or World Skills Competition = <i>6</i></ul>
                                    <ul>The Province participated in PNSC = <i>6</i></ul>
                                    <ul>The Province did not participate in any of the competition = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*"Terminal Reports/After Activity reports / Official list of winners</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.A.3.2. Awards received at the national level</b><br>
                                </h5>
                                    <ul>The Province received award/recognition at the national level = <i>7</i></ul>
                                    <ul>The Province did not receive award/recognition = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received (plaque or medal)</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.A.3.3. Awards received at the international level</b><br>
                                </h5>
                                    <ul>The Province received award/recognition at the international level = <i>12</i></ul>
                                    <ul>The Province did not receive award/recognition = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received (plaque or medal)</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.B. Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction - SD 2</b><br>
                                    <hr><br> 
                                    <b>B.2.B.1.  TVET enrolment and graduates by delivery mode- community-based</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.B.2. Skills Training Programs for Special Clients</b>
                                </h5>
                                    <ul>At least 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women) = <i>10</i></ul>
                                    <ul>Less than 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women) = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.B.3. Number of Scholarship Programs enrolled</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>35</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.B.4. Advocacy program to promote the importance of TVET in communities and the roles of CTECs in LGUs</b>
                                </h5>
                                    <ul>At least 10% of the municipalities in the Province have been given orientation on Devolution of TVET = <i>10</i></ul>
                                    <ul>Less than 10% of the municipalities in the Province have been given orientation on Devolution of TVET = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.B.5. Communications/programs/advocacy on Gender and Development (GAD)</b>
                                </h5>
                                    <ul>All TTIs and the PO have conducted programs/activities related to GAD = <i>10</i></ul>
                                    <ul>Not all TTIs and the PO have conducted programs/activities related to GAD = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.C. Upscale Technical Education and Skills Development and Certification to Higher PQF Levels - SD3</b><br>
                                    <hr><br>
                                    <b>B.2.C.1. Number of Programs Registered</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above= <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*MIS 02-04</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.C.2. Process Cycle Time for CTPR Issuance (3 days)</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monthly Report on Program Registration</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.C.3. Number of skilled workers assessed for certification</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Summary/Report RWAC Report from T2MIS;  Signed Validated OPCR</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.C.4. Number of New Assessment Centers</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Registry of Accredited Assessment Centers from T2MIS; Signed Validated OPCR</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.C.5. Number of New Assessors </b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Registry of Accredited Assessors from T2MIS;  Signed Validated OPCR</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.C.7. Establishment of Assessment Centers for NC Level IV Qualification </b>
                                </h5>
                                    <ul>At least 1 Assessment Center for NC Level IV Qualification was established in the Province = <i>10</i></ul>
                                    <ul>No Assessment center for NC Level IV Qualification was established in the Province = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*"Monitoring Report (CO), Certificate of Accreditation for Level IV Assessment Centers (ROs)</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD - SD4</b><br><hr>
                                    <b>B.2.D.1. TVET enrolment and graduates by delivery mode- institution-based</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Report from T2MIS</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.2. TVET enrolment and graduates by delivery mode- enterprise-based</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Report from T2MIS</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.3. World Cafe of Opportunities</b><br>
                                    <b>B.2.D.3.1. Implementation of WCO</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>5</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*After Activity Report</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.3.2 Number of HOTS</b>
                                </h5>
                                    <ul>The accomplishment rate based on set target is at 100% and above = <i>5</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*After Activity Report</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.4. Institutional Awards</b>
                                    <b>B.2.D.4.1. TESDA Idol (Wage-employed)</b><br><hr>
                                    <b>B.2.D.4.1.1. Participation</b>
                                </h5>
                                    <ul>The Province participated in TESDA Idol (Wage-employed) = <i>5</i></ul>
                                    <ul>The Province did not participate in TESDA Idol (Wage-employed) = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on nominees endorsed</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.4.1.2. Awards received</b>
                                </h5>
                                    <ul>The Province received award/recognition at the national level = <i>10</i></ul>
                                    <ul>The Province did not receive award/recognition at the national level = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.4.2. TESDA Idol (Self-employed)</b><br>
                                    <b>B.2.D.4.2.1. Participation</b>
                                </h5>
                                    <ul>The Province participated in TESDA Idol (self-employed) = <i>5</i></ul>
                                    <ul>The Province did not participate in TESDA Idol (self-employed) = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on nominees endorsed</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.4.2.2. Awards received</b>
                                </h5>
                                    <ul>The Province received award/recognition at the national level = <i>10</i></ul>
                                    <ul>The Province did not receive award/recognition at the national level = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.4.3. Kabalikat Awards</b>
                                    <b>B.2.D.4.3.1. Participation</b>
                                </h5>
                                    <ul>The Province participated in Kabalikat Awards = <i>5</i></ul>
                                    <ul>The Province did not participate in Kabalikat Awards = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on nominees endorsed</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.4.3.2. Awards received</b>
                                </h5>
                                    <ul>The Province received award/recognition at the national level = <i>10</i></ul>
                                    <ul>The Province did not receive award/recognition at the national level = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on nominees endorsed</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.4.4. Tagsanay</b>
                                    <b>B.2.D.4.4.1. Participation</b>
                                </h5>
                                    <ul>The Province participated in in the National Level Tagsanay Awards = <i>5</i></ul>
                                    <ul>The Province did not participate in the National Level Tagsanay Awards = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Endorsement Memo, TESDA Order</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.4.4.2. Awards received</b>
                                </h5>
                                    <ul>The Province received award/recognition at the national level = <i>10</i></ul>
                                    <ul>The Province did not receive award/recognition at the national level = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.5. Partnerships forged and implemented <br>● To be measured in terms of resources and increase in program outputs<br>● CSR – partnership with private companies"</b>
                                </h5>
                                <br>
                                    <ul>
                                        For Small Province: Partnership with more than one (1) 
                                        industry / private company and with continuing tie-ups 
                                        for the last two (2) years with the same industry/company 
                                        = <i>15</i>
                                    </ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Copies of signed MOAs</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.5. Partnerships forged and implemented <br>● To be measured in terms of resources and increase in program outputs<br>● CSR – partnership with private companies"</b>
                                </h5>
                                <br>
                                    <ul>
                                    For Small Province: Partnership with one (1)
                                    industry / private company and with continuing
                                    tie-ups for the last two (2) years with the 
                                    same industry/company; 
                                    = <i>10</i>
                                    </ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Copies of signed MOAs</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.5. Partnerships forged and implemented <br>● To be measured in terms of resources and increase in program outputs<br>● CSR – partnership with private companies"</b>
                                </h5>
                                <br>
                                    <ul>
                                    For Small Province: Partnership with one
                                    (1) industry / private company and with 
                                    continuing tie-ups for less than two (2)
                                    years with the same industries/companies; 
                                    = <i>5</i>
                                    </ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Copies of signed MOAs</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.D.6. Number of new EBT programs implemented in private TVIs (DTS, Apprenticeship, Learnership, In-company training, SIL, PAFSE)</b>
                                </h5>
                                    <ul>
                                        At least 7 new programs for Provinces that belong to the Large Category<br>
                                        At least 5 new programs for Provinces that belong to the Medium Category<br>
                                        At least 3 new programs for Provinces that belong to the Small Category = <i>10</i><br>
                                    </ul>
                                    <ul>Below the minimum number of programs per category = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Compendium of program registration, Registry of EBT programs; T2MIS</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.E. Streamline and Intensify QMS in All Organizational Subsystems - SD 5</b><br><hr>
                                    <b>B.2.E.1. Accreditation Awards (STAR Program, APACC)</b><br>
                                    <b>B.2.E.1.1. Asia Pacific Accreditation and Certification Commission (APACC)</b><br>
                                    <b>B.2.E.1.1.a. Participation</b>
                                </h5>
                                    <ul>The province nominated TVI/s for APACC accreditation = <i>6</i></ul>
                                    <ul>The province did not nominate any TVI/s for APACC accreditation = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Self Study Report submitted to APACC with letter and evidence</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.E.1.1.b. Awards received</b>
                                </h5>
                                    <ul>The nominated TVI/s of the province received APACC accreditation = <i>10</i></ul>
                                    <ul>The nominated TVI/s of the province did not receive APACC accreditation = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Self Study Report submitted to APACC with letter and evidence</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                    <b>B.2.E.1.2. System for TVET Accreditation and Recognition (STAR) Program</b>
                                    <b>B.2.E.1.2.a. Participation</b>
                                </h5>
                                    <ul>The nominated TVI/s of the province received APACC accreditation = <i>10</i></ul>
                                    <ul>The nominated TVI/s of the province did not receive APACC accreditation = <i>0</i></ul>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Self Study Report submitted to APACC with letter and evidence</ul>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
