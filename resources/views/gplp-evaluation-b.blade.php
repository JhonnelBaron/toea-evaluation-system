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
            background-color: #2854C7;
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

        #tooltip{
            position: relative;
            cursor: pointer;
            padding: 0px;
            font-size: 16px;
            font-weight: ;
        }
        #tooltipText{
            position: bottom;
            left: 0%;
            top: 0;
            transform: translateX(-50%)
            color: red;
            white-space: nowrap;
            padding: 10px 15px;
            border-radius: 7px;
            /* visibility: hidden; */
            opacity: 0;
            transition: opacity 0.5s ease;
            font-weight: light;
        }
        #tooltipText::before{
            content: "";
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translateX(-50%)
            border: 15px solid;
            border-color: red;
        }
        #tooltip:hover #tooltipText{
            top: 0;
            visibility: visible;
            opacity: 1;
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
                            <th></th>
                            <th>Requirement</th>
                            <th>Initial Score</th>
                            <th>Means of Verification</th>
                            <th>Evaluation</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="align-top"><b>B.</b></td>
                            <td class="align-top"><b>Implementation of TESD Programs</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.</b></td>
                            <td class="align-top"><b>Performance based on the General Appropriations Act (GAA)</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.A.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of Provincial TESD plans formulated/updated</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i> 0</i></ul></td>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br><i><ul>*Submission of the Regional and Provincial TESD plans with cover memo</ul></i></td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.B.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>94% stakeholders who rated policies/plans as good or better</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload">
                            <br>
                            <ul><i>*Report on the User’s Feedback Survey with summary and percentage signed by the RD</i></ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.C.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>100% of registered TVET programs audited<br>
                                        Customer Net Satisfaction Rating with minimum of 95%</b></span>
                                            <span  id="tooltipText">
                                                <ul>The accomplishment rate based on set target is at 100% = <i>15</i></ul>
                                                <ul>The accomplishment rate based on set target is below 100% = <i>20</i></ul>
                                            </span>
                            </td>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                            <ul><i>*Summary/Report on the duly accomplished TESDA-OP-CO-02-
                                F06-RO Form<br>
                                
                                Duly signed compliance audit reports<br>
                                Summary of audited programs<br>
                                Closure reports<br>
                                Validated OPCR</i></ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.D.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>90% of skilled workers issued with certification within 7 days of their application</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                            <ul><i>Tracking sheets (F41) - RO/PO c/o CO
                                (with Summary Report of the percentage of accomplishment signed by the RD)</i></ul>

                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top"><b>B.1.E.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>85% compliance of TVET programs to TESDA, industry, and industry standards and requirements</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>Summary/Report on the duly accomplished 
                                    TESDA-OP-CO-02-F06-RO Form<br>
                                    (Summary Report with percentage of accomplishment signed by the RD)
                                    </ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.F</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>70% of TVET graduates that undergo assessment for certification</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>
                                    List of mandatory assessment from T2MIS<br> 
                                    (with Summary Report of percentage of accomplishment signed by the RD)</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.G</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>60% of TVET programs with tie-ups to industry</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>Summary/Report on duly accomplished 
                                    TESDA TVET Partnership Monitoring System (TTPMS)</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.H</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of graduates from TESD Scholarship Programs</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>35</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Signed, validated OPCR - accomplishment to be evaluated by the ROMO</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.1.I</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>69.39% of graduates from technical education and skills development scholarship programs that were employed</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Summary/Report on Result on the 
                                    Survey on Employability of TVET graduates under TWSP, PESFA and STEP (SETG)</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2</b></td>
                            <td><b>Implementation of the TESDA Corporate Plan 2018-2022</b></td>
                        </tr>

                        <tr>
                            <td><b>B.2.A.</b></td>
                            <td><b>Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness</td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.A.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Advancement through Innovations and Researches</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on the endorsement/submission of policy/technology research/es signed by the RD
                                    Researches submitted to the NITESD</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.A.2</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Implementation of Recognized/aligned PQF level 4 or Level 5 programs </b></span>
                                        <span  id="tooltipText">
                                            <ul>All TAS in the Province have at least 1 recognized/aligned <br>PQF level 4 or level 5 programs = <i>10</i></ul>
                                            <ul>Not all TAS in the Province have at least 1 recognized/aligned <br>PQF level 4 or level 5 programs = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*TAS' Certificates of Recognition for PQF Level 4 or Level 5;</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        {{-- ADDED DIGITIZATION OF TVET --}}

                        <tr>
                            <td class="align-top"><b>B.2.A.3</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Digitalization of TVET </b></span>
                                        <span  id="tooltipText">
                                            <ul>The PO has institutionalized digitalization/use of electronic/online service delivery <br>channel in the implementation of programs and/or utilize new technologies to reduce <br>manual effort and increase productivity = <i>6</i></ul>
                                            <ul>The PO has developed digitalization plan to enhance existing systems using/aided by new <br>or emerging technologies to improve performance, efficiency, and capabilities = <i>3</i></ul>
                                            <ul>The PO has no digitalization plan or initiatives undertaken = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*"Terminal Reports/After Activity reports / Official list of winners</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.A.4</b></td>
                            <td><b>Participation and Recognition from Skills Competition</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.A.4.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Participation</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province participated in ASC and/or World Skills Competition = <i>6</i></ul>
                                            <ul>The Province participated in PNSC = <i>6</i></ul>
                                            <ul>The Province did not participate in any of the competition = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*"Terminal Reports/After Activity reports / Official list of winners</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.A.4.2</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Awards received at the national level</b><br></span>
                                        <span  id="tooltipText">
                                            <ul>The Province received award/recognition at the national level = <i>7</i></ul>
                                            <ul>The Province did not receive award/recognition = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received (plaque or medal)</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.A.4.3</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Awards received at the international level</b><br></span>
                                        <span  id="tooltipText">
                                            <ul>The Province received award/recognition at the international level = <i>12</i></ul>
                                            <ul>The Province did not receive award/recognition = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received (plaque or medal)</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.B<b></td>
                            <td><b>Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction</b><br></b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.B.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>TVET enrolment and graduates by delivery mode- community-based</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.B.2.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Skills Training Programs for Special Clients</b></span>
                                        <span  id="tooltipText">
                                            <ul>At least 7 programs provided to special clients <br>(IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women) = <i>10</i></ul>
                                            <ul>Less than 7 programs provided to special clients <br>(IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women) = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.B.3</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of Scholarship Programs enrolled</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>35</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.B.4</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Advocacy program to promote the importance of TVET in communities and the roles of CTECs in LGUs</b></span>
                                        <span  id="tooltipText">
                                            <ul>At least 10% of the municipalities in the Province have been <br>given orientation on Devolution of TVET = <i>10</i></ul>
                                            <ul>Less than 10% of the municipalities in the Province have been <br>given orientation on Devolution of TVET = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.B.5</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Communications/programs/advocacy on Gender and Development (GAD)</b></span>
                                        <span  id="tooltipText">
                                            <ul>All TTIs and the PO have conducted programs/activities related to GAD = <i>10</i></ul>
                                            <ul>Not all TTIs and the PO have conducted programs/activities related to GAD = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monitoring Reports</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.C.</b></td>
                            <td> <b>Upscale Technical Education and Skills Development and Certification to Higher PQF Levels</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.C.1.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b> Number of Programs Registered</b></span>
                                        <span  id="tooltipText">
                                                <ul>The accomplishment rate based on set target is at 100% and above= <i>15</i></ul>
                                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*MIS 02-04</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.C.2.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Process Cycle Time for CTPR Issuance (3 days)</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Monthly Report on Program Registration</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.C.3</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of skilled workers assessed for certification</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Summary/Report RWAC Report from T2MIS;  Signed Validated OPCR</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.C.4.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of New Assessment Centers</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Registry of Accredited Assessment Centers from T2MIS; Signed Validated OPCR</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.C.5</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of New Assessors </b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Registry of Accredited Assessors from T2MIS;  Signed Validated OPCR</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.C.7.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Establishment of Assessment Centers for NC Level IV Qualification </b></span>
                                        <span  id="tooltipText">
                                            <ul>At least 1 Assessment Center for NC Level IV Qualification was <br>established in the Province = <i>10</i></ul>
                                            <ul>No Assessment center for NC Level IV Qualification was established <br>in the Province = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*"Monitoring Report (CO), Certificate of Accreditation for Level IV Assessment Centers (ROs)</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.D.</b></td>
                            <td><b>Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>TVET enrolment and graduates by delivery mode- institution-based</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Report from T2MIS</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.2.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>TVET enrolment and graduates by delivery mode- enterprise-based</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Report from T2MIS</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.D.3</b></td>
                            <td><b>World Cafe of Opportunities</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.3.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Implementation of WCO</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>5</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*After Activity Report</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.3.2</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of HOTS</b></span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>5</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*After Activity Report</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.D.4</b></td>
                            <td><b>Institutional Awards</b></td>
                        </tr>

                        <tr>
                            <td><b>B.2.D.4.1.</b></td>
                            <td><b>TESDA Idol (Wage-employed)</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.4.1.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Participation</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province participated in TESDA Idol (Wage-employed) = <i>5</i></ul>
                                            <ul>The Province did not participate in TESDA Idol (Wage-employed) = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on nominees endorsed</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.4.1.2.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Awards received</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province received award/recognition at the national level = <i>10</i></ul>
                                            <ul>The Province did not receive award/recognition at the national level = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>B.2.D.4.2</b></td>
                            <td><b>TESDA Idol (Self-employed)</b></td>
                        </tr>
                        
                        <tr>
                            <td class="align-top"><b>B.2.D.4.2.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Participation</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province participated in TESDA Idol (self-employed) = <i>5</i></ul>
                                            <ul>The Province did not participate in TESDA Idol (self-employed) = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on nominees endorsed</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.4.2.2</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Awards received</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province received award/recognition at the national level = <i>10</i></ul>
                                            <ul>The Province did not receive award/recognition at the national level = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.D.4.3</b></td>
                            <td><b>Kabalikat Awards</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>Annex</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>B.2.D.4.3.1. Participation</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province participated in Kabalikat Awards = <i>5</i></ul>
                                            <ul>The Province did not participate in Kabalikat Awards = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on nominees endorsed</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.4.3.2</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Awards received</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province received award/recognition at the national level = <i>10</i></ul>
                                            <ul>The Province did not receive award/recognition at the national level = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Memorandum on nominees endorsed</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.D.4.4</b></td>
                            <td><b>Tagsanay</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.4.4.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Participation</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province participated in in the National Level Tagsanay Awards = <i>5</i></ul>
                                            <ul>The Province did not participate in the National Level Tagsanay Awards = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Endorsement Memo, TESDA Order</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.4.4.2</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Awards received</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province received award/recognition at the national level = <i>10</i></ul>
                                            <ul>The Province did not receive award/recognition at the national level = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.5.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Partnerships forged and implemented <br>● To be measured in terms of resources and increase in program outputs<br>● CSR – partnership with private companies</b></span>
                                <span  id="tooltipText">
                                    <ul>
                                        <li>For Large Province: Partnerships with three (3) or more industries <br>
                                            / private companies and with continuing tie-ups for the last two (2) <br>
                                            years with the same industries/companies</li>
                                        <li>For Medium Province: Partnerships with two (2) or more industries / <br>
                                            private companies and with continuing tie-ups for the last two (2) years <br>
                                            with the same industries/companies;</li>
                                        <li>For Small Province: Partnership with more than one (1) industry / private <br>
                                            company and with continuing tie-ups for the last two (2) years with the same <br>
                                            industry/company = <i>15</i></li>
                                            <br>
                                        <li>For Large Province: Partnerships with two (2) industries / private <br>
                                            companies and with continuing tie-ups for the last two (2) years with <br>
                                            the same industries/companies;</li>
                                        <li>For Medium Province: Partnerships with one (1) industry / private company <br>
                                            and with continuing tie-ups for the last two (2) years with the same <br>
                                            industries/companies;</li>
                                        <li>For Small Province: Partnership with one (1) industry / private company <br>
                                            and with continuing tie-ups for the last one (1) year with the same <br>
                                            industry/company = <i>10</i></li>
                                            <br>
                                        <li>For Large Province: Partnerships with two (2) industries / private <br>
                                            companies and with continuing tie-ups for one (1) year with the same <br>
                                            industries/companies; </li>
                                        <li>For Medium Province: Partnerships with one (1) industry / private company <br>
                                            and with continuing tie-ups for one (1) year with the same industries/companies;</li>
                                        <li>For Small Province: Partnership with one new (1) industry / private company = <i>5</i></li>
                                            <br>
                                        <li>For Large Province: Partnerships with less than two (2) industries / <br>
                                            private companies;</li> 
                                        <li>For Medium Province: No Partnerships;</li>
                                        <li>For Small Province: No Partnership = <i>0</i></li>
                                    </ul>
                            <td class="align-center"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-center"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Copies of signed MOAs</ul>
                            </td>
                            <td class="align-center"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-center"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.D.6.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of new EBT programs implemented in private TVIs (DTS, Apprenticeship, Learnership, In-company training, SIL, PAFSE)</b></span>
                                        <span  id="tooltipText">
                                            <ul>
                                                At least 7 new programs for Provinces that belong to the Large Category<br>
                                                At least 5 new programs for Provinces that belong to the Medium Category<br>
                                                At least 3 new programs for Provinces that belong to the Small Category = <i>10</i><br>
                                            </ul>
                                            <ul>Below the minimum number of programs per category = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Compendium of program registration, Registry of EBT programs; T2MIS</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.E</b></td>
                            <td><b>Streamline and Intensify QMS in All Organizational Subsystems</b></td>
                        </tr>
                        <tr>
                            <td><b>B.2.E.1</b></td>
                            <td><b>Accreditation Awards (STAR Program, APACC)</b></td>
                        </tr>
                        <tr>
                            <td><b>B.2.E.1.1.</b></td>
                            <td><b>Asia Pacific Accreditation and Certification Commission (APACC)</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.1.1.A</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Participation</b></span>
                                        <span  id="tooltipText">
                                            <ul>The province nominated TVI/s for APACC accreditation = <i>6</i></ul>
                                            <ul>The province did not nominate any TVI/s for APACC accreditation = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Self Study Report submitted to APACC with letter and evidence</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.1.1.B</b></td>
                            <td class="align-top">
                            <div id="tooltip">
                                    <span><b>Awards received</b></span>
                                        <span  id="tooltipText">
                                            <ul>The nominated TVI/s of the province received APACC accreditation = <i>10</i></ul>
                                            <ul>The nominated TVI/s of the province did not receive APACC accreditation = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Certificate of Accreditation</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>B.2.E.1.2</b></td>
                            <td><b>System for TVET Accreditation and Recognition (STAR) Program</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.1.2.A</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Participation</b></span>
                                        <span  id="tooltipText">
                                            <ul>The Province participated in STAR Program = <i>6</i></ul>
                                            <ul>The Province did not participate in STAR Program = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.1.2.b</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Awards received</b></span>
                                        <span  id="tooltipText">
                                                <ul>The province received at least one THREE STAR Level Award = <i>20</i></ul>
                                                <ul>The province received at least one TWO STAR Level Award = <i>10</i></ul>
                                                <ul>The province received at least one ONE STAR Level Award = <i>5</i></ul>
                                                <ul>The province did not receive a STAR Level Award = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received/ Letter of result signed by the Secretary</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><b>B.2.E.1.3</b></td>
                            <td><b>TESDA Seal of Integrity</b></td>
                        </tr>
                        
                        <tr>
                            <td class="align-top"><b>B.2.E.1.3.A </b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Participation</b></span>
                                        <span  id="tooltipText">
                                            <ul>All qualified TTIs of the region applied for the TESDA Seal of Integrity = <i>8</i></ul>
                                            <ul>Not all qualified TTIs of the region applied for TESDA Seal of Integrity = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.1.3.</b></td>
                            <td class="align-top">
                            <div id="tooltip">
                                    <span><b>BAwards received</b></span>
                                        <span  id="tooltipText">
                                            <ul>At least 80% of the TTIs of the province have been awarded with the <br>TESDA Seal of Integrity = <i>8</i></ul>
                                            <ul>Below 80% TTIs of the province have been awarded with <br>TESDA the Seal of Integrity = <i>0</i></ul>
                                        </span>
                                    </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Awards received</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.2.</b></td>
                            <td class="align-top">
                                <h5>
                                    <b>Quality Management System Implementation</b> = <i>22</i>
                                </h5>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*IQA reports (TESDA Action Catalogue)</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.2.1</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Number of Active IQA Lead Auditor/s</b></span>
                                        <span  id="tooltipText">
                                            <ul>The province has at least four (4) active IQA Lead Auditors/Auditors = <i>8</i></ul>
                                            <ul>The province has two (2) to three (3) active IQA Lead Auditors/ Auditors = <i>4</i></ul>
                                            <ul>The province has less than two (2) active IQA Lead Auditors/ Auditors = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Inventory of Lead Auditors/Auditors (TESDA QP 03-F09)</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.2.2</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Timely Submission of Reports/Documents (e.g. IQA reports, Action Catalog, NAP)</b></span>
                                        <span  id="tooltipText">
                                            <ul>The province submitted report/doc ahead of deadline = <i>8</i></ul>
                                            <ul>The province submitted report/docs on set deadline = <i>4</i></ul>
                                            <ul>The province submitted report/doc after set deadline = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*RRRO - Monitoring of submission IQA Reports reflected on the QP-03-F12 Action Catalog - QP-03-F11</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.2.3</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Percentage of Personnel Attendance to Central Office initiated QMS-related training programs</b></span>
                                        <span  id="tooltipText">
                                            <ul>>80% of provincial personnel attended QMS related training programs = <i>6</i></ul>
                                            <ul>40% to 80% of provincial personnel attended QMS related training programs = <i>3</i></ul>
                                            <ul> <40% of provincial personnel attended QMS related training programs = <i>0</i></ul>
                                            <ul>*Plus (1) Point for PO initiated QMS related training programs of personnel = <i>1</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Manning of the Regional Provincial Office versus the actual number of personnel that have attended training</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.2.E.3</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Green Practices 100% implementation of programs/activities/projects related to Green Practices indicated in the submitted Institutional Development Plan (IDP)</b></span>
                                        <span  id="tooltipText">
                                            <ul>>All TTIs in the Province have implemented their plans and projects related to <br>Green Practices = <i>15</i></ul>
                                            <ul>Not all TTIs in the Province have implemented their plans and projects related to <br>Green Practices = <i>0</i></ul>
                                        </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul>*Manning of the Regional Provincial Office versus the actual number of personnel that have attended training</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
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
