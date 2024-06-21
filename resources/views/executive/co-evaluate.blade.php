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
            width: calc(100% - 250px);
            height: 100px;
            color: black;
            display: flex;
            align-items: flex;
            justify-content: flex;
            z-index: 999;
            margin-left: 250px;
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
        <div class="ml-60"> <!-- This is the side bar --> </div>
        
        <div class="header">
            <div class="d-flex">
                <button onclick="history.back()" class="flex items-center px-4 py-2 text-white text-sm font-medium rounded-md  focus:outline-none focus:ring-2  focus:ring-opacity-50">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </button>
                <h1 class="text-3xl font-bold text-white font-sans place-content-center ml-40 mr-20">Best Regional Office Evaluator - Certification Office</h1> 
            </div>
            
        </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                <form method="POST" action="{{ route('co_evaluation') }}">
                    @csrf
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
                            <td class="align-top">B.</td>
                            <td class="align-top"><b>Implementation of TESD Programs<hr></b></td>
                            <td class="align-top"><b>189</b><hr></td>
                            <td class="align-bottom"><hr></td>
                            <td class="align-bottom"><hr></td>
                            <td class="align-bottom"><hr></td>

                        </tr>
                        
                        <tr>
                            <td class="align-top">B.1.</td>
                            <td class="align-top">
                                Performance based on the General Appropriations Act (GAA)
                            <td class="align-top"><i></i></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                        </tr>

                        <tr>
                            <td class="align-top">B.1.C.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>100% of registered TVET programs audited</span>
                                            <span  id="tooltipText">
                                                <ul>The accomplishment rate based on set target is at 100% = <i>15</i></ul>
                                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>15</i></td>
                                <td class="align-top">
                                    <ul><i>*Summary/Report on the duly accomplished TESDA-OP-CO-02- F06-RO Form<br> Duly signed compliance audit reports <br>Summary of audited programs Closure reports Monthly monitoring of OPCRs<br>c/o of procurement unit</i></ul>
                                </td>
                                <td class="align-top">
                                    <input type="number" name="b1c" id="b1c" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                    @if($previousEvaluation && $previousEvaluation->b1c !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1c : '' }}">
                                    @error('b1c')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td>
                                <td class="align-top">
                                <textarea name="b1c_remarks" id="b1c_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->b1c !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1c_remarks : '' }}
                                </textarea>
                                </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.1.D.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>90% of skilled workers issued with certification within 7 days of their application</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>15</i></td>
                            <td class="align-top">
                                <ul><i>*Tracking sheets (F41) - RO/PO c/o CO</i></ul>
                            </td>
                            <td class="align-top">
                                <input type="number" name="b1d" id="b1d" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b1d !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1d : '' }}">
                                @error('b1d')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                            <textarea name="b1d_remarks" id="b1d_remarks" class="comments" placeholder="Comment"
                            @if($previousEvaluation && $previousEvaluation->b1d !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1d_remarks : '' }}</textarea>    
                            </td>                       
                        </tr>


                            <tr>
                                <td class="align-top">B.1.E.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>85% compliance of TVET programs to TESDA, industry, and industry standards and requirements</span>
                                            <span  id="tooltipText">
                                                <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                 <td class="align-top"><i>15</i></td>
                                <td class="align-top">
                                    <ul><i>*Summary/Report on the duly accomplished <br>TESDA-OP-CO-02-F06-RO Form</i></ul>
                                </td>
                                <td class="align-top">
                                    <input type="number" name="b1e" id="b1e" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                    @if($previousEvaluation && $previousEvaluation->b1e !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1e : '' }}">
                                    @error('b1e')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror

                                </td>
                                <td class="align-top">
                                <textarea name="b1e_remarks" id="b1e_remarks" class="comments" placeholder="Comment">
                                @if($previousEvaluation && $previousEvaluation->b1e !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1e_remarks : '' }}
                                </textarea>
                                </td>
                            </tr>


                            <tr>
                                <td class="align-top">B.1.F.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>70% of TVET graduates that undergo assessment for certification</span>
                                            <span  id="tooltipText">
                                                <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                 <td class="align-top"><i>15</i></td>
                                <td class="align-top">
                                    <ul><i>*List of mandatory assessment from T2MIS</i></ul>
                                </td>
                                <td class="align-top">
                                    <input type="number" name="b1f" id="b1f" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                    @if($previousEvaluation && $previousEvaluation->b1f !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1f : '' }}">
                                    @error('b1f')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td>
                                <td class="align-top"><textarea name="b1f_remarks" id="b1f_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b1f !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1f_remarks : '' }}</textarea></td>
                            </tr>


                            <tr>
                                <td class="align-top">B.2.</td>
                                <td class="align-top">
                                    <b style="vertical-align: bottom">Implementation of the TESDA Corporate Plan 2018-2022<hr></b>
                                    <td class="align-bottom"><i><hr></i></td>
                                    <td class="align-bottom"><hr></td>
                                    <td class="align-bottom"><hr></td>
                                    <td class="align-bottom"><hr></td>
                            </tr>

                            <tr>
                                <td class="align-top">B.2.A.</td>
                                <td class="align-top">
                                    Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness - SD 1<br>
                                 <td class="align-top"><i></i></td>
                            </tr>

                            <tr>
                                <td class="align-top">B.2.A.3</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Digitalization of TVET</span>
                                            <span  id="tooltipText">
                                                <ul>The RO has institutionalized digitalization/use of electronic/online <br>service delivery channel in the implementation of programs and/or utilize <br>new technologies to reduce manual effort and increase productivity = <i>6</i></ul>
                                                <ul>The RO has developed digitalization plan to enhance existing systems <br>using/aided by new or emerging technologies to improve performance, <br>efficiency, and capabilities = <i>3</i></ul>
                                                <ul>The RO has no digitalization plan or initiatives undertaken = <i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                 <td class="align-top"><i>6</i></td>
                                <td class="align-top">
                                    <ul><i>*Documentation Report after implementation <br>Submitted plans to ICTO </i></ul>
                                </td>
                                <td class="align-top">
                                    <input type="number" name="b1f" id="b1f" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                    @if($previousEvaluation && $previousEvaluation->b1f !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1f : '' }}">
                                    @error('b1f')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td>
                                <td class="align-top"><textarea name="b1f_remarks" id="b1f_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b1f !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1f_remarks : '' }}</textarea></td>
                            </tr>

                            <tr>
                                <td class="align-top">B.2.A.4</td>
                                <td class="align-top">
                                    Participation and Recognition from Skills Competition<br>
                                 <td class="align-top"><i></i></td>
                            </tr>

                            <tr>
                                <td class="align-top">B.2.A.4.1</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Participation</span>
                                            <span  id="tooltipText">
                                                <ul>The Region participated in ASC and/or World Skills Competition = <i>6</i></ul>
                                                <ul>The Region participated in PNSC = <i>3</i></ul>
                                                <ul>The Region did not participate in any of the competition = <i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                 <td class="align-top"><i>6</i></td>
                                <td class="align-top">
                                    <ul><i>*Terminal Reports/After Activity reports <br>Official list of winners</i></ul>
                                </td>
                                <td class="align-top">
                                    <input type="number" name="b2a41" id="b2a41" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                    @if($previousEvaluation && $previousEvaluation->b2a41 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2a41 : '' }}">
                                    @error('b2a41')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td>
                                <td class="align-top"><textarea name="b2a41_remarks" id="b2a41_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->b2a41 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2a41_remarks : '' }}</textarea>
                                </td>
                            </tr>


                            <tr>
                                <td class="align-top">B.2.A.4.2</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Awards received at the national level</span>
                                            <span  id="tooltipText">
                                                <ul>The Region received award/recognition at the national level = <i>7</i></ul>
                                                <ul>The Region did not receive award/recognition = <i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                 <td class="align-top"><i>7</i></td>
                                <td class="align-top">
                                    <ul><i>*Awards received (plaque or medal)</i></ul>
                                </td>
                                <td class="align-top">
                                    <input type="number" name="b2a42" id="b2a42" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                    @if($previousEvaluation && $previousEvaluation->b2a42 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2a42 : '' }}">
                                    @error('b2a42')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td>
                                <td class="align-top"><textarea name="b2a42_remarks" id="b2a42_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2a42 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2a42_remarks : '' }}</textarea></td>
                            </tr>


                            <tr>
                                <td class="align-top">B.2.A.4.3.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Awards received at the international level</span>
                                            <span  id="tooltipText">
                                                <ul>The Region received award/recognition at the international level = <i>12</i></ul>
                                                <ul>The Region did not receive award/recognition = <i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                 <td class="align-top"><i>12</i></td>
                                <td class="align-top">
                                    <ul><i>*Awards received (plaque or medal)</i></ul>
                                </td>
                                <td class="align-top">
                                    <input type="number" name="b2a43" id="b2a43" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                    @if($previousEvaluation && $previousEvaluation->b2a43 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2a43 : '' }}">
                                    @error('b2a43')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td>
                                <td class="align-top"><textarea name="b2a43_remarks" id="b2a43_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->b2a43 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2a43_remarks : '' }}</textarea>
                                </td>
                            </tr>


                        <tr>
                            <td class="align-top">B.2.C.</td>
                            <td class="align-top"><b>
                                Upscale Technical Education and Skills Development and Certification to Higher PQF Levels - SD3
                                </td>
                            <td class="align-top"><i></i></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.C.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Number of Programs Registered</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>15</i></td>
                            <td class="align-top">
                                <ul><i>*MIS 02-04</i></ul>
                            </td>
                            <td class="align-top">
                                <input type="number" name="b2c1" id="b2c1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2c1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2c1 : '' }}">
                                @error('b2c1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top"><textarea name="b2c1_remarks" id="b2c1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2c1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2c1_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.C.2.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Process Cycle Time for CTPR Issuance (3 days)</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>15</i></td>
                            <td class="align-top">
                                <ul><i>*Monthly Report on Program Registration</i></ul>
                            </td>
                            <td class="align-top">
                                <input type="number" name="b2c2" id="b2c2" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2c2 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2c2 : '' }}">
                                @error('b2c2')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top"><textarea name="b2c2_remarks" id="b2c2_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2c2 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2c2_remarks : '' }}</textarea>
                            </td>
                        </tr>

                                                    
                        <tr>
                            <td class="align-top">B.2.C.3.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Number of skilled workers assessed for certification</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>15</i></td>
                            <td class="align-top">
                                <ul><i>*Summary/Report RWAC Report from T2MIS; Signed Validated OPCR</i></ul>
                            </td>
                            <td class="align-top">
                                <input type="number" name="b2c3" id="b2c3" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2c3 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2c3 : '' }}">
                                @error('b2c3')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                            <textarea name="b2c3_remarks" id="b2c3_remarks" class="comments" placeholder="Comment"
                            @if($previousEvaluation && $previousEvaluation->b2c3 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2c3_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.C.4.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Number of Assessment Centers</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>15</i></td>
                            <td class="align-top">
                                <ul><i>*Registry of Accredited Assessment Centers from T2MIS; Signed Validated OPCR</i></ul>
                            </td>
                            <td class="align-top">
                                <input type="number" name="b2c4" id="b2c4" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2c4 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2c4 : '' }}">
                                @error('b2c4')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                            <textarea name="b2c4_remarks" id="b2c4_remarks" class="comments" placeholder="Comment"
                            @if($previousEvaluation && $previousEvaluation->b2c4 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2c4_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.C.6</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Establishment of Assessment Centers for NC Level IV Qualification</span>
                                        <span  id="tooltipText">
                                            <ul>
                                                <li>For Large Regions: At least 3 Assessment Centers for NC Level IV Qualifications</li>
                                                <li>For Medium Regions: At least 2 Assessment Centers for NC Level IV Qualifications</li>
                                                <li>For Small Regions: At least 1 Assessment Centers for NC Level IV Qualifications = <i>10</i></li>
                                            </ul>
                                            <br>
                                            <ul>
                                                <li>For Large Regions: Less than 3 Assessment Centers for NC Level IV Qualifications</li>
                                                <li>For Medium Regions: Less than 2 Assessment Centers for NC Level IV Qualifications</li>
                                                <li>For Small Regions: No Assessment Centers for NC Level IV Qualifications = <i>0</i></li>
                                            </ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>8</i></td>
                             <td class="align-top">
                                <ul><i>*Monitoring Report (CO), Certificate of Accreditation for Level IV Assessment Centers (ROs)</i></ul>
                            </td>
                             <td class="align-top">
                                <input type="number" name="b2c6" id="b2c6" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2c6 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2c6 : '' }}">
                                @error('b2c6')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror

                            </td>
                             <td class="align-top">
                                <textarea name="b2c6_remarks" id="b2c6_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2c6 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2c6_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.E.</td>
                            <td class="align-top">
                                Streamline and Intensify QMS in All Organizational Subsystems - SD 5
                            </td>
                            <td class="align-top"><i></i></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.E.1.</td>
                            <td class="align-top">
                                Accreditation Awards (STAR Program, APACC)
                            </td>
                             <td class="align-top"><i></i></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                        </tr>
                    
                        <tr>
                            <td class="align-top">B.2.E.1.1.</td>
                            <td class="align-top">
                                <h5>
                                Asia Pacific Accreditation and Certification Commission (APACC)                               
                            </td>
                             <td class="align-top"><i></i></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            
                        </tr>

                        <tr>
                            <td class="align-top">B.2.E.1.1.a.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Participation</span>
                                        <span  id="tooltipText">                      
                                            <ul>
                                                <li>The region nominated TVI/s for APACC accreditation = <i>6</i></li>
                                                <li>The region did not nominate any TVI/s for APACC accreditation = <i>0</i></li>
                                            </ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>6</i></td>
                             <td class="align-top">
                                <ul><i>*Self Study Report submitted to APACC with letter and evidence</i></ul>
                            </td>
                            
                             <td class="align-top">
                                <input type="number" name="b2e11a" id="b2e11a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2e11a !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2e11a : '' }}">
                                @error('b2e11a')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            
                             <td class="align-top">
                                <textarea name="b2e11a_remarks" id="b2e11a_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e11a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e11a_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.E.1.1.b.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Awards received</span>
                                        <span  id="tooltipText">
                                            <ul>The nominated TVI/s of the region received APACC accreditation = <i>10</i></ul>
                                            <ul>The nominated TVI/s of the region did not receive APACC accreditation = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>10</i></td>
                            <td class="align-top">
                                <ul><i>*Certificate of Accreditation</ul>
                            </td>
                            <td class="align-top">
                                <input type="number" name="b2e11b" id="b2e11b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2e11b !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2e11b : '' }}">
                                @error('b2e11b')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top"><textarea name="b2e11b_remarks" id="b2e11b_remarks" class="comments" placeholder="Comment"
                            @if($previousEvaluation && $previousEvaluation->b2e11b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e11b_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.E.1.2.</td>
                            <td class="align-top">
                                <span>System for TVET Accreditation and Recognition (STAR) Program</span>                           
                            </td>
                             <td class="align-top"><i></i></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            
                        </tr>


                        <tr>
                            <td class="align-top">B.2.E.1.2.a.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Participation</span>
                                        <span  id="tooltipText">
                                            <ul>The Region participated in STAR Program = <i>6</i></ul>
                                            <ul>The Region did not participate in STAR Program = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>6</i></td>
                            <td class="align-top">
                                <ul><i>*Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</ul>
                            </td>
                            <td class="align-top">
                                <input type="number" name="b2e12a" id="b2e12a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2e12a !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2e12a : '' }}">
                                @error('b2e12a')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2e12a_remarks" id="b2e12a_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e12a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e12a_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">B.2.E.1.3.b.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Awards received</span>
                                        <span  id="tooltipText">
                                            <ul>At least 80% of the qualified TTIs of the region have<br> been awarded with the TESDA Seal of Integrity = <i>8</i></ul>
                                            <ul>At least 80% of the qualified TTIs of the region have<br> been awarded with the TESDA Seal of Integrity = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i>8</i></td>
                            <td class="align-top">
                                <ul><i>*Awards received</ul>
                            </td>
                            <td class="align-top">
                                <input type="number" name="b2e13b" id="b2e13b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2e13b !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2e13b : '' }}">
                                @error('b2e13b')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2e13b_remarks" id="b2e13b_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e13b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e13b_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        

                        <tr>
                            <td class="align-top">D.</td>
                             <td class="align-top">
                                <b>Reporting Efficiency<hr></b>                               
                            </td>
                             <td class="align-top"><i>60<hr></i></td>
                             <td class="align-top"><br><hr></td>
                             <td class="align-top"><br><hr></td>
                             <td class="align-top"><br><hr></td>
                            
                        </tr>


                        <tr>
                            <td class="align-top">D.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Timeliness, Consistency and Accuracy</span>
                                        <span  id="tooltipText">
                                            <ul>Reports are accurate and submitted consistently and on time = <i>60</i></ul>
                                            <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                            <ul>Reports are not accurate and are not submitted on time = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                             <td class="align-top"><i></i></td>
                            <td class="align-top">
                                <ul><i>*Rating of each Executive Office based on the timely, consistent and accurate reporting</ul>
                            </td>
                            
                            <td class="align-top">
                                <br>
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
                        <a href="{{ route('upload.file', ['region' => $regionId]) }}" class="text-xs btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer">
                            Upload Files
                            <input type="file" class="hidden" />
                          </a>
                        <button type="submit" class="text-xs btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 #uploadModal">
                          Save Changes
                        </button>
                      </div>
                      
                </td>
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
