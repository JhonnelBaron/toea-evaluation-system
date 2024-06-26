<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOEA Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/toea-logo.png') }}" type="image/png">
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
            align-items: flex;
            justify-content: flex;
            z-index: 40;
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
        .textbox {
            border-radius: 5px;
            border: 0.5px solid #ccc;
            width: 75px;
        }
        .comments {
            rows: 2;
            columns: 3; 
            border-radius: 10px;
        }

        .red-asterisk {
            color: red;
            font-size: 1.2em; /* Adjust font size as needed */
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
               <button onclick="window.location.href='/evaluation-page'" class="flex items-center px-4 py-2 text-white text-sm font-medium rounded-md  focus:outline-none focus:ring-2  focus:ring-opacity-50">
                   <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                   </svg>
                   Back
               </button>
               <h1 class="text-3xl font-bold text-white font-sans place-content-center ml-40 mr-20">Best Regional Office Evaluator - Administrative Service</h1> 
           </div>
           
       </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                <form id="saveChangesForm" method="POST" action="{{ route('save_evaluation') }}">
                    @csrf

                    
                    <!-- Hidden input for region_id -->
                    <input type="hidden" name="region_id" value="{{ $regionId }}">
                    <div class=" pb-4 pt-4 text-center text-3xl text-black font-sans flex items-center justify-center border-b-2 border-solid border-black">
                        <b>{{ $regionName }}</b>
                    </div>
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
                                <td class="align-top">A.</td>
                                <td class="align-top"><b>Good Governance Measures<hr></b></td>
                                <td class="align-bottom"><b></b><hr></td>
                                <td class="align-top"><br><hr></td>
                                <td class="align-top"><br><hr></td>
                                <td class="align-top"><br><hr></td>
                            </tr>

                            <tr>
                                <td class="align-top">A.6.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Compliance to PhilGEPS requirements</span>
                                            <span  id="tooltipText">
                                                <ul>100% compliance from Publication to Notice and Award and notice to proceed = <i><b>30</b></i></ul>
                                                <ul>Non-compliance from Publication to Notice and Award and notice to proceed = <i><b>0</b></i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>30</i></td>
                                <td class="align-top">
                                    <ul><i>Government Procurement Policy Board (GPPB) report who are compliant</ul>
                                </td>
                                {{-- <td class="align-top">
                                    <br>
                                    <input type="number" name="a6" id="a6" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->a6 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a6 : '' }}">
                                    @error('a6')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="a6" id="a6" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->a6 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->a6 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->a6 == '0') selected @endif>0</option>
                                        <option value="30" @if($previousEvaluation && $previousEvaluation->a6 == '30') selected @endif>30</option>
                                    </select>
                                    @error('a6')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="a6_remarks" id="a6_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->a6 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a6_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">A.8.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                    <span>Compliance to Agency Procurement Compliance Performance Indicator (APCPI)</span>
                                        <span  id="tooltipText">
                                            <ul>The Provincial Office is compliant to APCPI = <i><b>10</b></i></ul>
                                            <ul>The Provincial Office is not compliant to APCPI = <i><b>0</b></i></ul>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>10</i></td>
                                <td class="align-top">
                                    <ul><i>*Agency Procurement Compliance Performance Indicator (APCPI) submitted within set deadlines by oversight agency/ies <br>c/o of procurement unit</ul>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="a8" id="a8" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->a8 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a8 : '' }}">
                                    @error('a8')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="a8" id="a8" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->a8 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->a8 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->a8 == '0') selected @endif>0</option>
                                        <option value="10" @if($previousEvaluation && $previousEvaluation->a8 == '10') selected @endif>10</option>
                                    </select>
                                    @error('a8')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="a8_remarks" id="a8_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->a8 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a8_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr class="border-b-2 border-black align top">
                                <td></td>
                                <td class="text-right"><b><i>Total Scores: </i></b></td>
                                <td><b>40</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>

                            <tr>
                                <td class="align-top">C.</td>
                                <td class="align-top"><b>Administrative and Support Services <hr></b></td>
                                <td class="align-bottom"><b></b><hr></td>
                                <td class="align-top"><br><hr></td>
                                <td class="align-top"><br><hr></td>
                                <td class="align-top"><br><hr></td>
                            </tr>

                            <tr>
                                <td class="align-top">C.3.</td>
                                <td class="align-top">Staff Development Program</td>
                                <td class="align-top"><i></i></td>
                                <td class="align-top"></td>
                                <td class="align-top"></td>
                                <td class="align-top"></td>
                            </tr>

                            <tr>
                                <td class="align-top">C.3.1.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                    <span>Employees who have attended SDP have implemented their RE-Entry Plans as scheduled</span>
                                        <span  id="tooltipText">
                                            <ul>100% of Employees who attended SDP have implemented their Re-Entry<br> Plans as scheduled = <i><b>20</b></i></ul>
                                            <ul>70%- 99% of Employees who attended SDP have implemented their Re-Entry<br> Plans as scheduled = <i><b>10</b></i></ul>
                                            <ul>69% and below of Employees who attended SDP have implemented their<br> Re-Entry Plans as scheduled = <i><b>0</b></i></ul>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>20</i></td>
                                <td class="align-top">
                                    <ul><i>*Regional Work Force Development Plan (WFDP) <br>Certificates of trainings attended</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c31" id="c31" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c31 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c31 : '' }}">
                                    @error('c31')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror

                                </td> --}}
                                <td class="align-top">
                                    <select name="c31" id="c31" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c31 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c31 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c31 == '0') selected @endif>0</option>
                                        <option value="10" @if($previousEvaluation && $previousEvaluation->c31 == '10') selected @endif>10</option>
                                        <option value="20" @if($previousEvaluation && $previousEvaluation->c31 == '20') selected @endif>20</option>
                                    </select>
                                    @error('c31')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c31_remarks" id="c31_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c31 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c31_remarks : '' }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-top">C.3.2.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Training Opportunities to staff provided for CY 2023</span>
                                            <span  id="tooltipText">
                                                <ul>100% of Employees were provided with training opportunities = <i><b>15</b></i></ul>
                                                <ul>75%-99% of Employees were provided with training opportunities = <i><b>5</b></i></ul>
                                                <ul>74% and below of Employees were provided with training opportunities = <i><b>0</b></i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>15</i></td>
                                <td class="align-top">
                                    <ul><i>*List of plantilla positions per region Region <br>Certificates of training attended</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c32" id="c32" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c32 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c32 : '' }}">
                                    @error('c32')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="c32" id="c32" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c32 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c32 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c32 == '0') selected @endif>0</option>
                                        <option value="5" @if($previousEvaluation && $previousEvaluation->c32 == '5') selected @endif>5</option>
                                        <option value="15" @if($previousEvaluation && $previousEvaluation->c32 == '15') selected @endif>15</option>
                                    </select>
                                    @error('c32')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c32_remarks" id="c32_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c32 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c32_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.</td>
                                <td class="align-top"><b>Model Employee Awards<hr></b></td>
                                <td style="vertical-align: bottom"><b><hr></b></td>
                                <td class="align-top"><br><hr></td>
                                <td class="align-top"><br><hr></td>
                                <td class="align-top"><br><hr></td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.1.</td>
                                <td class="align-top">Model Employee for Category I Position</td>
                                <td style="vertical-align: top;"><i></i></td>
                                <td class="align-top"></td>
                                <td class="align-top"></td>
                                <td class="align-top"></td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.1.1.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Participation - Category I</span>
                                            <span  id="tooltipText">
                                                <ul>The Region submitted nominees for Category I = <i><b>4</b></i></ul>
                                                <ul>The Region did not submit nominees for Category I = <i><b>0</b></i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>4</i></td>
                                <td class="align-top">
                                    <ul><i>*List of nominees and awardees from HRMD/AS</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c411" id="c411" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c411 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c411 : '' }}">
                                    @error('411')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="c411" id="c411" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c411 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c411 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c411 == '0') selected @endif>0</option>
                                        <option value="4" @if($previousEvaluation && $previousEvaluation->c411 == '4') selected @endif>4</option>
                                    </select>
                                    @error('c411')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c411_remarks" id="c411_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c411 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c411_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.1.2.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                    <span>Awards received - Category I</span>
                                        <span  id="tooltipText">
                                            <ul>The Region has received recognition/award at national level = <i><b>4</b></i></ul>
                                            <ul>The Region did not receive award/recognition at national level = <i><b>0</b></i></ul>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>4</i></td>
                                <td class="align-top">
                                    <ul><i>*List of nominees and awardees from HRMD/AS</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c412" id="c412" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c412 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c412 : '' }}">
                                    @error('c412')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="c412" id="c412" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c412 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c412 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c412 == '0') selected @endif>0</option>
                                        <option value="4" @if($previousEvaluation && $previousEvaluation->c412 == '4') selected @endif>4</option>
                                    </select>
                                    @error('c412')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c412_remarks" id="c412_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c412 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c412_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.2.</td>
                                <td class="align-top">Model Employee for Category II Position</td>
                                <td class="align-top"><b></b></td>
                                <td class="align-top"></td>
                                <td class="align-top"></td>
                                <td class="align-top"></td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.2.1.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Participation - Category II</span>
                                            <span  id="tooltipText">
                                                <ul>The Region submitted nominees for Category II = <i><b>4</b></i></ul>
                                                <ul>The Region did not submit nominees for Category II = <i><b>0</b></i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>4</i></td>
                                <td class="align-top">
                                    <ul><i>*List of nominees and awardees from HRMD/AS</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c421" id="c421" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c421 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c421 : '' }}">
                                    @error('c421')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="c421" id="c421" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c421 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c421 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c421 == '0') selected @endif>0</option>
                                        <option value="4" @if($previousEvaluation && $previousEvaluation->c421 == '4') selected @endif>4</option>
                                    </select>
                                    @error('c421')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c421_remarks" id="c421_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c421 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c421_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.2.2.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Awards received - Category II</span>
                                            <span  id="tooltipText">
                                                <ul>The Region has received recognition/award at national level = <i><b>5</b></i></ul>
                                                <ul>The Region did not receive award/recognition at national level = <i><b>0</b></i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>5</i></td>
                                <td class="align-top">
                                    <ul><i>*List of nominees and awardees from HRMD/AS</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c422" id="c422" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c422 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c422 : '' }}">
                                    @error('c422')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="c422" id="c422" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c422 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c422 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c422 == '0') selected @endif>0</option>
                                        <option value="5" @if($previousEvaluation && $previousEvaluation->c422 == '5') selected @endif>5</option>
                                    </select>
                                    @error('c422')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c422_remarks" id="c422_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c422 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c422_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.3.</td>
                                <td class="align-top"><b>Model Employee for Category III Position</b><hr></td>
                                <td style="vertical-align: bottom"><b><br><hr></b></td>
                                <td style="vertical-align: bottom"><br><hr></td>
                                <td style="vertical-align: bottom"><br><hr></td>
                                <td style="vertical-align: bottom"><br><hr></td>
                            </tr>
                            
                            <tr>
                                <td class="align-top">C.4.3.1.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Participation - Category III</span>
                                            <span  id="tooltipText">
                                                <ul>The Region submitted nominees for Category III = <i><b>4</b></i></ul>
                                                <ul>The Region did not submit nominees for Category III = <i><b>0</b></i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>4</i></td>
                                <td class="align-top">
                                    <ul><i>*List of nominees and awardees from HRMD/AS</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c431" id="c431" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c431 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c431 : '' }}">
                                    @error('c431')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="c431" id="c431" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c431 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c431 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c431 == '0') selected @endif>0</option>
                                        <option value="4" @if($previousEvaluation && $previousEvaluation->c431 == '4') selected @endif>4</option>
                                    </select>
                                    @error('c431')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c431_remarks" id="c431_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c431 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c431_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">C.4.3.2.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Awards received - Category III</span>
                                            <span  id="tooltipText">
                                                <ul>The Region has received recognition/award at national level = <i><b>5</b></i></ul>
                                                <ul>The Region did not receive award/recognition at national level = <i><b>0</b></i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>5</i></td>
                                <td class="align-top">
                                    <ul><i>*List of nominees and awardees from HRMD/AS</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c432" id="c432" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c432 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c432 : '' }}">
                                    @error('c432')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="c432" id="c432" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c432 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c432 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c432 == '0') selected @endif>0</option>
                                        <option value="5" @if($previousEvaluation && $previousEvaluation->c432 == '5') selected @endif>5</option>
                                    </select>
                                    @error('c432')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c432_remarks" id="c432_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c432 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c432_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <td class="align-top">C.5.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Application for PRIME-HR Level</span>
                                            <span  id="tooltipText">
                                                <ul>The RO or PO/s in the region have applied and have been <br>certified in higher PRIME HR Level = <i><b>8</b></i></ul>
                                                <ul>The RO or PO/s have applied for higher PRIME-HR Level = <i><b>4</b></i></ul>
                                                <ul>The RO or PO/s have not applied for higher PRIME-HR Level = <i><b>0</b></i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top">8</td>
                                <td class="align-top">
                                    <ul><i>Conferment/Certificate Awarded <br>Letter to CSC and other communications with regard to the requirements submitted by the region to CSC (with CSC feedback/reply letter)</ul></i>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="c5" id="c5" class="px-3 py-2 border rounded-md w-20" @if($previousEvaluation && $previousEvaluation->c5 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c5 : '' }}">
                                    @error('c5')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="c5" id="c5" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c5 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->c5 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->c5 == '0') selected @endif>0</option>
                                        <option value="4" @if($previousEvaluation && $previousEvaluation->c5 == '4') selected @endif>4</option>
                                        <option value="8" @if($previousEvaluation && $previousEvaluation->c5 == '8') selected @endif>8</option>
                                    </select>
                                    @error('c5')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="c5_remarks" id="c5_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->c5 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c5_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr class="border-b-2 border-black align top">
                                <td></td>
                                <td class="text-right"><b><i>Total Scores: </i></b></td>
                                <td><b>69</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>

                            <tr>
                                <td class="align-top"><b>D.</b><hr></td>
    
                                    <td class="align-top"><b>Reporting Efficiency</b><hr></td>
                                    <td class="align-bottom"><b></b><hr></td>
                                    <td class="align-bottom"><hr></td>
                                    <td class="align-bottom"><hr></td>
                                    <td class="align-bottom"><hr></td>
                            </tr>
    
    
                            <tr>
                                <td class="align-top">D.1.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Timeliness, Consistency and Accuracy<span>
                                            <span  id="tooltipText">
                                                <ul>Reports are accurate and submitted consistently and on time = <span class="text-red-600">*</span><i>60</i></ul>
                                                <ul>Reports are accurate and submitted consistently but not on time = <span class="text-red-600">*</span><i>30</i></ul>
                                                <ul>Reports are not accurate and are not submitted on time = <span class="text-red-600">*</span><i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                <td class="align-top"><i>60</i></td>
                                <td class="align-top">
                                    <ul><i>Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul>
                                </td>
                                {{-- <td class="align-top">
                                <input type="number" name="d1" id="d1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->d1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->d1 : '' }}">
                                @error('d1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                                </td> --}}
                                <td class="align-top">
                                    <select name="d1" id="d1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->d1 !== null) disabled @endif>
                                        <option value="" @if($previousEvaluation && $previousEvaluation->d1 === '') selected @endif></option>
                                        <option value="0" @if($previousEvaluation && $previousEvaluation->d1 == '0') selected @endif>0</option>
                                        <option value="30" @if($previousEvaluation && $previousEvaluation->d1 == '30') selected @endif>30</option>
                                        <option value="60" @if($previousEvaluation && $previousEvaluation->d1 == '60') selected @endif>60</option>
                                    </select>
                                    @error('d1')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="d1_remarks" id="d1_remarks" class="comments" placeholder="Comment"
                                    @if($previousEvaluation && $previousEvaluation->d1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->d1_remarks : '' }}</textarea>
                                </td>
                            </tr>

                            <tr class="border-b-2 border-black align top">
                                <td></td>
                                <td class="text-right"><b><i>Total Scores: </i></b></td>
                                <td><b>60</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                @if(session('success'))
                    <div id="successMessage" class="fixed z-50 bottom-0 right-0 bg-customGreen text-white p-4 text-center rounded-md">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            var successMessage = document.getElementById('successMessage');
                            successMessage.style.transition = 'opacity 1s ease';
                            successMessage.style.opacity = '0';

                            // Remove the success message from the DOM after fade out
                            setTimeout(function() {
                                successMessage.remove();
                            }, 1000); // Wait for 1 second for fade out before removing
                        }, 3000); // Show the message for 3 seconds
                    </script>
                @endif

                    <div id="messageBox"></div>
                    <td class="align-top">
                        <div class="flex justify-end space-x-4">
                            <div class="mr-7"><b>TOTAL: <span class="text-lg">{{$previousEvaluation->overall_total_score ?? 0}}</span></b></div>
                            <a href="{{ route('upload.file', ['region' => $regionId]) }}" class="text-xs btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer">
                                Upload Files
                                <input type="file" class="hidden" />
                              </a>
                            <button type="button" class="text-xs btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 #uploadModal" onclick="toggleModal('saveChangesModal')">
                              Save Changes
                            </button>
                          </div>
                          
                    </td>
                </form>
            </div>
            <div id="saveChangesModal" class="fixed inset-0 hidden items-center justify-center bg-gray-600 bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg w-1/3">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-4 border-b">
                        <h3 class="text-xl">Confirm Save</h3>
                        <button class="text-gray-600" onclick="toggleModal('saveChangesModal')">
                            &times;
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4">
                        <span class="text-red-500">
                            Note: Once you save your progress, all of your submitted scores and remarks cannot be edited anymore.
                        </span>
                        <br><br>
                        Are you sure you want to save your changes?
                    </div>
                    <!-- Modal footer -->
                    <div class="flex justify-end p-4 border-t">
                        <button class="px-4 py-2 bg-gray-500 text-white rounded mr-2" onclick="toggleModal('saveChangesModal')">No</button>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded"  onclick="submitSaveChangesForm()">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });

    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
    function submitSaveChangesForm() {
    document.getElementById('saveChangesForm').submit();
    }

    </script>
</body>