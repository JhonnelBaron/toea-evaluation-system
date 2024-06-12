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
            font-family: Arial, sans-serif;
        }
        th {
            background-color: transparent;
            font-weight: bold;
            font-family: Arial, sans-serif;
            font-size: 18px;
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
        @include('components.eo-sidebar', [
            'profile-picture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-60">

        </div>
        <div class="header">
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office Evaluator - CO</h1>
        </div>
        <div class="content">
            <div class="box-content">

                <!-- THIS IS A -->
                <table>
                    <thead>
                        <tr>
                            <th>Requirement</th>
                            <th>Point Value</th>
                            <th>Means of Verification</th>
                            <th>Evaluation</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>

                            <td><b>B. Implementation of TESD Programs<hr></b></td>
                            <td><b>217</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>
                        
                        <tr>
                            <td>
                                <b>B.1. Performance based on the General Appropriations Act (GAA)<hr></b><br>
                            <td style="vertical-align: top"><i><br>60<hr></i></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.1.C. 100% of registered TVET programs audited
                                </h5>
                                <ul>The accomplishment rate based on set target is at 100% = <i>15</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                <td style="vertical-align: top"><i><br>15</i></td>
                            <td>
                                <ul><i>*Summary/Report on the duly accomplished TESDA-OP-CO-02- F06-RO Form<br> Duly signed compliance audit reports <br>Summary of audited programs Closure reports Monthly monitoring of OPCRs<br>c/o of procurement unit</ul>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.1.D. 90% of skilled workers issued with certification within 7 days of their application
                                </h5>
                                <ul>The accomplishment rate based on set target is at 100% and above</ul>
                                <ul>The accomplishment rate based on set target is below 100%</ul>
                                <td style="vertical-align: top"><i>15</i></td>
                            <td>
                                <ul><i>*Tracking sheets (F41) - RO/PO c/o CO</ul>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.1.E. 85% compliance of TVET programs to TESDA, industry, and industry standards and requirements
                                </h5>
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            <td style="vertical-align: top"><i>15</i></td>
                            <td>
                                <ul><i>*Summary/Report on the duly accomplished <br>TESDA-OP-CO-02-F06-RO Form</ul>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.1.F. 70% of TVET graduates that undergo assessment for certification                               
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>15</i></td>
                            <td>
                                <ul><i>*List of mandatory assessment from T2MIS</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>B.2. Implementation of the TESDA Corporate Plan 2018-2022<hr></b><br>
                                
                            <td style="vertical-align: top"><i><b><br>157<hr></b></i></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><hr></td>
                        </tr>

                        <tr>
                            <td>
                                B.2.A.  Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness - SD 1<br>
                                
                            <td style="vertical-align: top"><i>25</i></td>
                        </tr>

                        <tr>
                            <td>
                                B.2.A.3. Participation and Recognition from Skills Competition<br>
                                
                            <td style="vertical-align: top"><i>25</i></td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.A.3.1. Participation
                                <ul>The Region participated in ASC and/or World Skills Competition = <i>6</i></ul>
                                <ul>The Region participated in PNSC = <i>3</i></ul>
                                <ul>The Region did not participate in any of the competition = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>6</i></td>
                            <td>
                                <ul><i>*Terminal Reports/After Activity reports <br>Official list of winners</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>3</option>
                                    <option>6</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.A.3.2. Awards received at the national level                               
                                <ul>The Region received award/recognition at the national level = <i>7</i></ul>
                                <ul>The Region did not receive award/recognition = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>7</i></td>
                            <td>
                                <ul><i>*Awards received (plaque or medal)</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>7</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.A.3.3. Awards received at the international level                                
                                <ul>The Region received award/recognition at the international level = <i>12</i></ul>
                                <ul>The Region did not receive award/recognition = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>12</i></td>
                            <td>
                                <ul><i>*Awards received (plaque or medal)</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>12</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td><b>
                            B.2.C. Upscale Technical Education and Skills Development and Certification to Higher PQF Levels - SD3
                            <hr></b></td>
                            <td style="vertical-align: top"><i><br><br>78<hr></i></td>
                            <td><br><br><br><hr></td>
                            <td><br><br><br><hr></td>
                            <td><br><br><br><hr></td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.C.1. Number of Programs Registered                        
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>10</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>10</i></td>
                            <td>
                                <ul><i>*MIS 02-04</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>10</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.C.2. Process Cycle Time for CTPR Issuance (3 days)                       
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>15</i></td>
                            <td>
                                <ul><i>*Monthly Report on Program Registration</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h5>
                                B.2.C.3. Number of skilled workers assessed for certification                                
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>15</i></td>
                            <td>
                                <ul><i>*Summary/Report RWAC Report from T2MIS;  Signed Validated OPCR</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.C.4. Number of Assessment Centers                                
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>15</i></td>
                            <td>
                                <ul><i>*Registry of Accredited Assessment Centers from T2MIS; Signed Validated OPCR</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.C.7. Establishment of Assessment Centers for NC Level IV Qualification                              
                                <ul>
                                    For Large Regions: At least 3 Assessment Centers for NC Level IV Qualifications<br>
                                    For Medium Regions: At least 2 Assessment Centers for NC Level IV Qualifications<br>
                                    For Small Regions: At least 1 Assessment Centers for NC Level IV Qualifications = <i>8</i>
                                </ul>
                                <br>
                                <ul>
                                    For Large Regions: Less than 3 Assessment Centers for NC Level IV Qualifications<br>
                                    For Medium Regions: Less than 2 Assessment Centers for NC Level IV Qualifications<br>
                                    For Small Regions: No Assessment Centers for NC Level IV Qualifications = <i>0</i>
                                </ul>
                            </td>
                            <td style="vertical-align: top"><i>8</i></td>
                            <td style="vertical-align: top">
                                <ul ><i>*Monitoring Report (CO), Certificate of Accreditation for Level IV Assessment Centers (ROs)</ul>
                            </td>
                            
                            <td style="vertical-align: top">
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>8</option>
                                </select>
                            </td>
                            
                            <td style="vertical-align: top"><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                <b>B.2.E. Streamline and Intensify QMS in All Organizational Subsystems - SD 5</b>
                            </td>
                            <td style="vertical-align: top"><i>54</i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <h5>
                                B.2.E.1. Accreditation Awards (STAR Program, APACC)
                            </td>
                            <td style="vertical-align: top"><i>54</i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    
                        <tr>
                            <td>
                                <h5>
                                B.2.E.1.1. Asia Pacific Accreditation and Certification Commission (APACC)                               
                            </td>
                            <td style="vertical-align: top"><i>15</i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.E.1.1.a. Participation                            
                                <ul>The region nominated TVI/s for APACC accreditation = <i>5</i></ul>
                                <ul>The region did not nominate any TVI/s for APACC accreditation = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>5</i></td>
                            <td>
                                <ul><i>*Self Study Report submitted to APACC with letter and evidence</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>5</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.E.1.1.b. Awards received                            
                                <ul>The nominated TVI/s of the region received APACC accreditation = <i>10</i></ul>
                                <ul>The nominated TVI/s of the region did not receive APACC accreditation = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>5</i></td>
                            <td>
                                <ul><i>*Certificate of Accreditation</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>10</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.E.1.2. System for TVET Accreditation and Recognition (STAR) Program                              
                            </td>
                            <td style="vertical-align: top"><i>25</i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                        </tr>


                        <tr>
                            <td>
                                <h5>
                                B.2.E.1.2.a. Participation                            
                                <ul>The Region participated in STAR Program = <i>7</i></ul>
                                <ul>The Region did not participate in STAR Program = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>5</i></td>
                            <td>
                                <ul><i>*Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>7</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <h5>
                                B.2.E.1.3.b. Awards received                            
                                <ul>At least 80% of the qualified TTIs of the region have been awarded with the TESDA Seal of Integrity = <i>7</i></ul>
                                <ul>At least 80% of the qualified TTIs of the region have been awarded with the TESDA Seal of Integrity = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>5</i></td>
                            <td>
                                <ul><i>*Awards received</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>7</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>
                        

                        <tr>
                            <td style="vertical-align: top">
                                <h5>
                                <b>D. Reporting Efficiency<hr></b>                               
                            </td>
                            <td style="vertical-align: top"><i>60<hr></i></td>
                            <td style="vertical-align: top"><br><hr></td>
                            <td style="vertical-align: top"><br><hr></td>
                            <td style="vertical-align: top"><br><hr></td>
                            
                        </tr>


                        <tr>
                            <td>
                                <h5>
                                D.1. Timeliness, Consistency and Accuracy                            
                                <ul>Reports are accurate and submitted consistently and on time = <i>60</i></ul>
                                <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                <ul>Reports are not accurate and are not submitted on time = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i></i></td>
                            <td>
                                <ul><i>*Rating of each Executive Office based on the timely, consistent and accurate reporting</ul>
                            </td>
                            
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>30</option>
                                    <option>60</option>
                                </select>
                            </td>
                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>
                        
                    




                    </script>    
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
