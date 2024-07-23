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
        <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST TRAINING INSTITUTION - REGION NAME - PTC</h1> 
        <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
    </div>
    
    <div class="flex items-center justify-center">
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/besttiadmin-ptc-a" class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria A</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/besttiadmin-ptc-b" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria B</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/besttiadmin-ptc-c" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria C</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/besttiadmin-ptc-d" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria D</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/besttiadmin-ptc-e" class="h-full w-full flex items-center justify-center">
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
                            <ul>All TAS in the Region have at least 1 recognized/aligned PQF level 4 or level 5 programs = <i>10</i></ul>
                            <ul>Not all TAS in the Region have at least 1 recognized/aligned PQF level 4 or level 5 programs = <i>0</i></ul>
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
                            <ul>The Region participated in ASC and/or World Skills Competition = <i>6</i></ul>
                            <ul>The Region participated in PNSC = <i>6</i></ul>
                            <ul>The Region did not participate in any of the competition = <i>0</i></ul>
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
                            <ul>The Region received award/recognition at the national level = <i>7</i></ul>
                            <ul>The Region did not receive award/recognition = <i>0</i></ul>
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
                            <ul>The Region received award/recognition at the international level = <i>12</i></ul>
                            <ul>The Region did not receive award/recognition = <i>0</i></ul>
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
                            <ul>At least 10% of the municipalities in the Region have been given orientation on Devolution of TVET = <i>10</i></ul>
                            <ul>Less than 10% of the municipalities in the Region have been given orientation on Devolution of TVET = <i>0</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*After Activity Reports on meetings conducted</ul>
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
                            <b>B.2.C.6. Establishment of Assessment Centers for NC Level IV Qualification </b><br>
                        </h5>
                            <ul>For Large Regions: At least 3 Assessment Centers for NC Level IV Qualifications<br>
                                For Medium Regions: At least 2 Assessment Centers for NC Level IV Qualifications<br>
                                For Small Regions: At least 1 Assessment Centers for NC Level IV Qualifications = <i>10</i></ul>
                            <ul>No Assessment center for NC Level IV Qualification was established in the Region = <i>0</i></ul>
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
                            <ul>NC holders hired on the spot during the conduct of WCO</ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*After Activity Report Number of HOTS List of HOTS and their TVET qualifications</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h5>
                            <b>B.2.D.4. Institutional Awards</b> = <i>60</i>
                            <b>B.2.D.4.1. TESDA Idol (Wage-employed)</b> = <i>15</i><br><hr>
                            <b>B.2.D.4.1.1. Participation</b><i>5</i>
                        </h5>
                            <ul>The Region participated in TESDA Idol (Wage-employed) = <i>5</i></ul>
                            <ul>The Region did not participate in TESDA Idol (Wage-employed) = <i>0</i></ul>
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
                            <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                            <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
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
                            <ul>The Region participated in TESDA Idol (self-employed) = <i>5</i></ul>
                            <ul>The Region did not participate in TESDA Idol (self-employed) = <i>0</i></ul>
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
                            <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                            <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
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
                            <ul>The Region participated in Kabalikat Awards = <i>5</i></ul>
                            <ul>The Region did not participate in Kabalikat Awards = <i>0</i></ul>
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
                            <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                            <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
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
                            <ul>The Region participated in in the National Level Tagsanay Awards = <i>5</i></ul>
                            <ul>The Region did not participate in the National Level Tagsanay Awards = <i>0</i></ul>
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
                            <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                            <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
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
                            For Large Region: Partnerships with three (3) or more industries 
                            / private companies and with continuing tie-ups for the last two 
                            (2) years with the same industries/companies; = <i>15</i> <br>
                
                            For Medium Region: Partnerships with two (2) or more industries 
                            / private companies and with continuing tie-ups for the last two 
                            (2) years with the same industries/companies; <br>
                
                            For Small Region: Partnership with more than one (1) industry 
                            / private company and with continuing tie-ups for the last two 
                            (2) years with the same industry/company
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
                        <br>
                            <ul>
                            For Large Region: Partnerships with two (2) industries 
                            / private companies and with continuing tie-ups for the 
                            last two (2) years with the same industries/companies; <br>
                
                            For Medium Region: Partnerships with one (1) industry / 
                            private company and with continuing tie-ups for the last 
                            two (2) years with the same industries/companies;<br>
                
                            For Small Region: Partnership with one (1) industry / 
                            private company and with continuing tie-ups for the last 
                            one (1) year with the same industry/company = <i>10</i><br>
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
                        <br>
                            <ul>
                            For Large Region: Partnerships with two (2) industries / 
                            private companies and with continuing tie-ups for one (1) 
                            year with the same industries/companies;<br>
                
                            For Medium Region: Partnerships with one (1) industry / 
                            private company and with continuing tie-ups for one (1) 
                            year with the same industries/companies;<br>
                
                            For Small Region: Partnership with one new (1) industry / private company = <i>5</i> <br>
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
                        <br>
                            <ul>
                            For Large Region: Partnerships with less than two (2) industries / private companies; <br>
                            For Medium Region: No Partnerships;<br>
                            For Small Region: No Partnership" = <i>0</i> <br>
                            </ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td>
                
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
                            At least 30 new programs for Regions that belongs to the Large Category <br>
                            At least 20 new programs for Regions that belong to the Medium Category <br>
                            At least 10 new programs for Regions that belong to the Small Category<br> = <i>10</i><br>
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
                            <b>B.2.E. Streamline and Intensify QMS in All Organizational Subsystems</b><br><hr>
                            B.2.E.1. Accreditation Awards (STAR Program, APACC)<br>
                            B.2.E.1.1. Asia Pacific Accreditation and Certification Commission (APACC)</b><br>
                            B.2.E.1.1.a. Participation
                        </h5>
                            <ul>The Region nominated TVI/s for APACC accreditation = <i>6</i></ul>
                            <ul>The Region did not nominate any TVI/s for APACC accreditation = <i>0</i></ul>
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
                            <ul>The nominated TVI/s of the Region received APACC accreditation = <i>10</i></ul>
                            <ul>The nominated TVI/s of the Region did not receive APACC accreditation = <i>0</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*Certificate of Accreditation</ul>
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
                            <ul>The Region participated in STAR Program = <i>6</i></ul>
                            <ul>The Region did not participate in STAR Program = <i>0</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h5>
                            <b>B.2.E.1.2.b. Awards received</b>
                        </h5>
                            <ul>The Region received at least one THREE STAR Level Award = <i>20</i></ul>
                            <ul>The Region received at least one TWO STAR Level Award = <i>10</i></ul>
                            <ul>The Region received at least one ONE STAR Level Award = <i>5</i></ul>
                            <ul>The Region did not receive a STAR Level Award = <i>0</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*Awards received/ Letter of result signed by the Secretary</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                





















                <tr>
                    <td>
                        <h5>
                            <b>B.2.E.1.3. TESDA Seal of Integrity</b>
                            <b>B.2.E.1.3.a. Participation</b>
                        </h5>
                            <ul>All qualified TTIs of the region applied for the TESDA Seal of Integrity = <i>8</i></ul>
                            <ul>Not all qualified TTIs of the region applied for TESDA Seal of Integrity = <i>0</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h5>
                            <b>B.2.E.1.3.b. Awards received</b>
                        </h5>
                            <ul>At least 80% of the TTIs of the Region have been awarded with the TESDA Seal of Integrity = <i>8</i></ul>
                            <ul>Below 80% TTIs of the Region have been awarded with TESDA the Seal of Integrity = <i>0</i></ul>
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
                            <b>B.2.E.2. Quality Management System Implementation</b> = <i>22</i>
                        </h5>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*IQA reports (TESDA Action Catalogue)</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h5>
                            <b>B.2.E.2.1. Number of Active IQA Lead Auditor/s</b>
                        </h5>
                            <ul>The Region has at least four (4) active IQA Lead Auditors/Auditors = <i>8</i></ul>
                            <ul>The Region has two (2) to three (3) active IQA Lead Auditors/ Auditors = <i>4</i></ul>
                            <ul>The Region has less than two (2) active IQA Lead Auditors/ Auditors = <i>0</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*Inventory of Lead Auditors/Auditors (TESDA QP 03-F09)</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h5>
                            <b>B.2.E.2.2. Timely Submission of Reports/Documents (e.g. IQA reports, Action Catalog, NAP)</b>
                        </h5>
                            <ul>The Region submitted report/doc ahead of deadline = <i>8</i></ul>
                            <ul>The Region submitted report/docs on set deadline = <i>4</i></ul>
                            <ul>The Region submitted report/doc after set deadline = <i>0</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*RRRO - Monitoring of submission IQA Reports reflected on the QP-03-F12 Action Catalog - QP-03-F11</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h5>
                            <b>B.2.E.2.3.  Percentage of Personnel Attendance to Central Office initiated QMS-related training programs</b>
                        </h5>
                            <ul>>80% of provincial personnel attended QMS related training programs = <i>6</i></ul>
                            <ul>40% to 80% of provincial personnel attended QMS related training programs = <i>3</i></ul>
                            <ul> <40% of provincial personnel attended QMS related training programs = <i>0</i></ul>
                            <ul>*Plus (1) Point for PO initiated QMS related training programs of personnel = <i>1</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*Manning of the Regional Provincial Office versus the actual number of personnel that have attended training</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <h5>
                            <b>B.2.E.3.  Green Practices </b>
                            <i>100% implementation of programs/activities/projects related to Green Practices indicated in the submitted Institutional Development Plan (IDP)</i>
                        </h5>
                            <ul>>All TTIs in the Region have implemented their plans and projects related to Green Practices = <i>15</i></ul>
                            <ul>Not all TTIs in the Region have implemented their plans and projects related to Green Practices = <i>0</i></ul>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*Monitoring report, Research/ Project Proposals, Competency-based Curriculum (CBC), Program Offerings related to Agriculture, Institutional practices</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
                </tr>
                
                
                <tr>
                    <td>
                        <h5>
                            <b>B.2.E.4. Digitization<br>
                            
                        </h5>
                    <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                    <td><input type="file" name="fileUpload" id="fileUpload"><br>
                        <ul>*Report on the digitization initiative or 
                        digital transformation of external services</ul>
                    </td>
                    <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                    <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                    </td>
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
