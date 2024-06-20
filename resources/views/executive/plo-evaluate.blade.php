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
        @include('components.eo-sidebar', [
            'profile-picture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-60">

        </div>
        <div class="header">
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office Evaluator- Partnership and Linkages Office</h1>
        </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                <form method="POST" action="{{ route('plo_evaluation') }}">
                    @csrf
                    <!-- Hidden input for region_id -->
                    <input type="hidden" name="region_id" value="{{ $regionId }}">

                <!-- THIS IS A -->
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Requirement</th>
                            <th>Point Value</th>
                            <th>Means of Verification</th>
                            <th>Evaluation</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td class="align-top">B.<hr></td>
                            <td class="align-top"><b>Implementation of TESD Programs</b><hr></td>
                            <td class="align-top"><b>108</b><hr></td>
                            <td class="align-top"><br><hr></td>
                            <td class="align-top"><br><hr></td>
                            <td class="align-top"><br><hr></td>

                        </tr>

                        <tr>
                            <td class="align-top">B.1. </td>

                            <td class="align-top">Performance based on the General Appropriations Act (GAA)</td>
                            <td class="align-top"><b></b></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>

                        </tr>

                        
                        <tr>
                            <td class="align-top">B.1.G. </td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>% of TVET programs with tie-ups to industry</span>
                                    <span  id="tooltipText">
                                    <ul>The accomplishment rate based on set target is at 100% and above  = <i>10</i></ul>
                                    <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top"><i><ul>*Summary/Report on duly accomplished <br>TESDA TVET Partnership Monitoring System (TTPMS)
                            </i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b1g" id="b1g" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b1g !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1g : '' }}">
                                @error('b1g')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b1g_remarks" id="b1g_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b1g !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1g_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2. </td>

                            <td class="align-top">Implementation of the TESDA Corporate Plan 2018-2022</td>
                            <td class="align-top"></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>

                        </tr>

                        <tr>
                            <td class="align-top">B.2.D. </td>

                            <td class="align-top">Expand and Intensify Partnerships and Linkages with <br>Industries and Other Stakeholders in the Area of <br> TESD - SD4s Act (GAA)</td>
                            <td class="align-top"></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>

                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.4. </td>

                            <td class="align-top">Institutional Awards</td>
                            <td class="align-top"></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>

                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.4.1. </td>

                            <td class="align-top">TESDA Idol (Wage-employed)</td>
                            <td class="align-top"></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>
                            <td class="align-top"><br></td>

                        </tr>


                        <tr>
                            <td class="align-top">B.2.D.4.1.1. </td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Participation</span>
                                    <span  id="tooltipText">
                                        <ul>The Region participated in TESDA Idol (Wage-employed) = <i>5</i></ul>
                                        <ul>The Region did not participate in TESDA Idol (Wage-employed) = <i>0</i></ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>5</i></td>
                            <td class="align-top"><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2d411" id="b2d411" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2d411 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d411 : '' }}">
                                @error('b2d411')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d411_remarks" id="b2d411_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d411 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d411_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.4.1.2.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Awards received</span>
                                        <span  id="tooltipText">
                                            <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                                            <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top"><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2d412" id="b2d412" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2d412 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d412 : '' }}">
                                @error('b2d412')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d412_remarks" id="b2d412_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d412 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d412_remarks : '' }}</textarea>
                            </td>
                        </tr>
                        

                        <tr>
                            <td class="align-top">B.2.D.4.2.</td>
                            <td class="align-top">
                                    <span>TESDA Idol (Self-employed)</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.4.2.1.</td>
                            <td class="align-top">
                                    <div id="tooltip">
                                        <span>Participation</span>
                                            <span  id="tooltipText">
                                                <ul>The Region participated in TESDA Idol (self-employed) = <i>5</i></ul>
                                                <ul>The Region did not participate in TESDA Idol (self-employed) = <i>0</i></ul>
                                            </span>
                                    </div>
                            </td>
                            <td class="align-top"><i>5</i></td>
                            <td class="align-top"><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2d421" id="b2d421" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2d421 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d421 : '' }}">
                                @error('b2d421')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d421_remarks" id="b2d421_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d421 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d421_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.4.2.2.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Awards received</span>
                                        <span  id="tooltipText">
                                            <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                                            <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top"><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2d422" id="b2d422" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2d422 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d422 : '' }}">
                                @error('b2d422')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d422_remarks" id="b2d422_remarks" class="comments" placeholder="Comment">
                                    @if($previousEvaluation && $previousEvaluation->b2d422 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d422_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.4.3.</td>
                            <td class="align-top">
                                Kabalikat Awards
                            </td>
                            
                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.4.3.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Participation</span>
                                        <span  id="tooltipText">
                                            <ul>The Region participated in Kabalikat Awards = <i>5</i></ul>
                                            <ul>The Region did not participate in Kabalikat Awards = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>5</i></td>
                            <td class="align-top"><i><ul>*National Kabalikat Awards Committee Resolution</i></ul></td>
                            <td class="align-top">
                                 <input type="number" name="b2d431" id="b2d431" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                 @if($previousEvaluation && $previousEvaluation->b2d431 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d431 : '' }}">
                                 @error('b2d431')
                                 <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                 @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d431_remarks" id="b2d431_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d431 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d431_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.D.4.3.2.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Awards received</span>
                                        <span  id="tooltipText">
                                            <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                                            <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top"><i><ul>*National Kabalikat Awards Committee Resolution</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2d432" id="b2d432" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2d432 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d432 : '' }}">
                                @error('b2d432')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d432_remarks" id="b2d432_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d432 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d432_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.D.5.</td>
                            <td class="align-top">
                                <div id="tooltip">
                            
                                    <span><b>Partnerships forged and implemented</b><br>
                                    <i>● to be measured in terms of resources and increase in program outputs</i><br>
                                    <i>● CSR – partnership with private companies</i></b></span>

                                    <span  id="tooltipText">
                                        <ul><i>*For Large Regions: Partnerships with three (3) or more industries / private companies and with <br>continuing tie-ups for the last two (2) years with the same industries/companies;<br>
                                                For Medium Regions: Partnerships with two (2) or more industries / private companies and with <br>continuing tie - ups for the last two (2) years with the same industries/companies;<br>
                                                For Small Regions: Partnership with more than one (1) industry / private company and with <br>continuing tie-ups for the last two (2) years with the same industry/company" = 15</i></ul><br>
                                        <ul><i>*For Large Regions: Partnerships with less than three (3) industries / private companies and with <br>continuing tie-ups for the last two (2) years with the same industries/companies;<br>
                                                For Medium Regions: Partnerships with less than two (2) industries / private companies and with <br>continuing tie - ups for the last two (2) years with the same industries/companies;<br>
                                                For Small Regions: Partnership with one (1) industry / private company and with <br>continuing tie-ups for the last two (2) years with the same industry/company;" = 10</i></ul><br>
                                        <ul><i>"For Large Regions: Partnerships with less than three (3) industries / private companies and with <br>continuing tie-ups for less than two (2) years with the same industries/companies;<br>
                                                For Medium Regions: Partnerships with less than two (2) industries / private companies and with <br>continuing tie-ups for less than two (2) years with the same industries/companies;<br>
                                                For Small Regions: Partnership with one (1) industry / private company and with continuing <br>tie-ups for less than two (2) years with the same industries/companies; = 0"</i></ul><br>
                                    </span>
                                </div>
                            </td>
                            <td class="align-center"><i>15</i></td>
                            <td class="align-center"><i><ul>*Copies of signed MOAs</i></ul></td>
                            <td class="align-center">
                                <input type="number" name="b2d5" id="b2d5" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2d5 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d5 : '' }}">
                                @error('b2d5')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-center">
                                <textarea name="b2d5_remarks" id="b2d5_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d5 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d5_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.6.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Number of new EBT programs implemented in private TVIs (DTS, Apprenticeship, Learnership, In-company training, SIL, PAFSE)</span>
                                        <span  id="tooltipText">
                                            <ul>At least 30 new programs for Regions that belongs to the Large Category<br>
                                                At least 20 new programs for Regions that belong to the Medium Category<br>
                                                At least 10 new programs for Regions that belong to the Small Category" = <i>8</i></ul>
                                            <ul>Below the minimum number of programs per category = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>8</i></td>
                            <td class="align-top"><i><ul>*Compendium of program registration, Registry of EBT programs; T2MIS</i></ul></td>
                            <td class="align-top">
                                 <input type="number" name="b2d6" id="b2d6" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                 @if($previousEvaluation && $previousEvaluation->b2d6 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d6 : '' }}">
                                 @error('b2d6')
                                 <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                 @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d6_remarks" id="b2d6_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d6 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d6_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-bottom"> D.</td>

                                <td class="align-bottom">Reporting Efficiency<hr></td>
                                <td class="align-top"><b><br>60</b><hr></td>
                                <td class="align-top"><br><br><hr></td>
                                <td class="align-top"><br><br><hr></td>
                                <td class="align-top"><br><br><hr></td>
                        </tr>  

                        <tr>
                            <td class="align-top">D.1. </td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Timeliness, Consistency and Accuracy</span>
                                    <span  id="tooltipText">
                                        <ul>Reports are accurate and submitted consistently and on time  = <i>60</i></ul>
                                        <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                        <ul>Reports are not accurate and are not submitted on time = <i>0</i></ul>
                                </span>
                                </div>
                            </td>
                            <td class="align-top"><i>60</i></td>
                            <td class="align-top"><i><ul>*Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="d1" id="d1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->d1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->d1 : '' }}">
                                @error('d1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="d1_remarks" id="d1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->d1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->d1_remarks : '' }}</textarea>
                            </td>
                        </tr>
                    </script>    
                    </tbody>
                </table>
                <td class="align-top">
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('upload.file') }}" class="text-xs btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer">
                            Upload Files
                            <input type="file" class="hidden" />
                          </a>
                        <button type="submit" class="text-xs btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 #uploadModal">
                          Save Changes
                        </button>
                      </div>
                      
                </td>
            </form>
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
