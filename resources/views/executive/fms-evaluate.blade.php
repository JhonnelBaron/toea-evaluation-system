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
            align-items: flex;
            justify-content: flex;
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
        <div class="ml-60"> <!-- This is the side bar --> </div>
        
        <div class="header">
            <div class="d-flex">
                <button onclick="history.back()" class="flex items-center px-4 py-2 text-white text-sm font-medium rounded-md  focus:outline-none focus:ring-2  focus:ring-opacity-50">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </button>
                <h1 class="text-3xl font-bold text-white font-sans place-content-center ml-20 mr-20 text-center">Best Regional Office Evaluator - Financial and Management Service</h1> 
            </div>
        </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                <form method="POST" action="{{ route('fms_evaluation') }}">
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
                            <td class="align-top">A.</td>
                            <td class="align-top"><b>Good Governance Measures<hr></b></td>
                            <td class="align-top"><b>50</b><hr></td>
                            <td class="align-top"><br><hr></td>
                            <td class="align-top"><br><hr></td>
                            <td class="align-top"><br><hr></td>

                        </tr>

                        <tr>
                            <td class="align-top">A.5.</td>
                            <td class="align-top">Compliance to Commission on Audit Rules and Regulations</td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            <td class="align-top"></td>
                            

                        </tr>
                        
                        <tr>
                            <td class="align-top">A.5.A.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Unimplemented Audit Observation Memorandum by the Regional Office</span>
                                    <span  id="tooltipText">
                                        <ul>
                                            <li>0 unimplemented audit observation memorandum by the region = <span class="text-red-600">*</span><i>15</i></li>
                                            <li>2-5 unimplemented audit observation memorandum by the region = <span class="text-red-600">*</span><i>5</i></li>
                                            <li>6-10 unimplemented audit observation memorandum by the region = <span class="text-red-600">*</span><i>0</i></li>
                                            <li>**Plus (1) point for RO with no AOM received = <span class="text-red-600">*</span><i>1</i></li>
                                        </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>15</i></td>
                            <td class="align-top">
                                <ul><i>Annual Audit Report (AAR) and Agency Action Plan and Status of Implementation (AAPSI) CY 2022</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="a5a" id="a5a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a5a !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a5a : '' }}">
                            @error('a5a')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a5a_remarks" id="a5a_remarks" class="comments" placeholder="Comment" 
                                @if($previousEvaluation && $previousEvaluation->a5a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a5a_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="a5a" id="a5a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->a5a !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->a5a === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->a5a == '0') selected @endif>0</option>
                                    <option value="5" @if($previousEvaluation && $previousEvaluation->a5a == '5') selected @endif>5</option>
                                    <option value="15" @if($previousEvaluation && $previousEvaluation->a5a == '15') selected @endif>15</option>
                                </select>
                                @error('a5a')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a5a_remarks" id="a5a_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a5a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a5a_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td class="align-top">A.5.B.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Notice of Suspension and Disallowance</span>
                                        <span  id="tooltipText">
                                            <ul>
                                                <li>There are no suspensions and disallowances = <span class="text-red-600">*</span><i>15</i></li>
                                                <li>There are suspensions and disallowances = <span class="text-red-600">*</span><i>0</i></li>
                                            </ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>15</i></td>
                            <td class="align-top">
                                <ul><i>Statement of Audit Suspensions, Disallowances and Charges (SASDC) issued by the COA (RO and PO and TTIs)</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="a5b" id="a5b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a5b !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a5b : '' }}">
                            @error('a5b')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                             @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a5b_remarks" id="a5b_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a5b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a5b_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="a5b" id="a5b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->a5b !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->a5b === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->a5b == '0') selected @endif>0</option>
                                    <option value="15" @if($previousEvaluation && $previousEvaluation->a5b == '15') selected @endif>15</option>
                                </select>
                                @error('a5b')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a5b_remarks" id="a5b_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a5b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a5b_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">A.7.</td>

                            <td class="align-top"><b>Liquidation of Cash Advances (Foreign and Local Travel Expenses)</b></td>

                        </tr>

                        <tr>
                        <tr>
                            <td class="align-top">A.7.A.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Liquidation of Foreign Travel Expenses</span>
                                    <span  id="tooltipText">
                                        <ul>
                                            <li>All Foreign Travel Expenses liquidated within 60 days = <span class="text-red-600">*</span><i>10</i></li>
                                            <li>Partial number of Foreign Travel Expenses liquidated beyond 60 days = <span class="text-red-600">*</span><i>0</i></li>
                                        </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top">
                                <ul><i>*Proof of postings submitted/received copy from COA<br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="a7a" id="a7a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a7a !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a7a : '' }}">
                            @error('a7a')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                             @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a7a_remarks" id="a7a_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a7a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a7a_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="a7a" id="a7a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->a7a !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->a7a === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->a7a == '0') selected @endif>0</option>
                                    <option value="10" @if($previousEvaluation && $previousEvaluation->a7a == '10') selected @endif>10</option>
                                </select>
                                @error('a7a')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a7a_remarks" id="a7a_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a7a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a7a_remarks : '' }}</textarea>
                            </td>
                        </tr>



                        <tr>
                            <td class="align-top">A.7.B.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Liquidation of Local Travel Expenses</span>
                                    <span  id="tooltipText">
                                            <ul>
                                                <li>All Local Travel Expenses liquidated within 30 days = <span class="text-red-600">*</span><i>10</i></li>
                                                <li>Partial number of Local Travel Expenses liquidated beyond 30 days = <span class="text-red-600">*</span><i>0</i></li>
                                            </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top">
                                <ul><i>*Proof of postings submitted/received copy from COA<br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="a7b" id="a7b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a7b !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a7b : '' }}">
                            @error('a7b')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a7b_remarks" id="a7b_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a7b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a7b_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="a7b" id="a7b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->a7b !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->a7b === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->a7b == '0') selected @endif>0</option>
                                    <option value="10" @if($previousEvaluation && $previousEvaluation->a7b == '10') selected @endif>10</option>
                                </select>
                                @error('a7b')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a7b_remarks" id="a7b_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a7b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a7b_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>B.</b><hr></td>

                                <td class="align-top"><b>Implementation of TESD Programs</b><hr></td>
                                <td class="align-top"><b>20</b><hr></td>
                                <td class="align-bottom"><hr></td>
                                <td class="align-bottom"><hr></td>
                                <td class="align-bottom"><hr></td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.E</td>

                                <td class="align-top">Streamline and Intensify QMS in All Organizational Subsystems</td>
                                <td class="align-top"></td>
                                <td class="align-bottom"></td>
                                <td class="align-bottom"></td>
                                <td class="align-bottom"></td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.E.2</td>

                                <td class="align-top">Quality Management System Implementation</td>
                                <td class="align-top"></td>
                                <td class="align-bottom"></td>
                                <td class="align-bottom"></td>
                                <td class="align-bottom"></td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.E.2.1</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>B.2.E.2.1. Number of Active IQA Lead Auditor/s</span>
                                    <span  id="tooltipText">
                                            <ul>
                                                <li>The region has more than four (4) active IQA Lead Auditors/Auditors = <span class="text-red-600">*</span><i>8</i></li>
                                                <li>The region has two (2) to three (3) active IQA Lead Auditors/ Auditors = <span class="text-red-600">*</span><i>4</i></li>
                                                <li>The region has less than two (2) active IQA Lead Auditors/ Auditors = <span class="text-red-600">*</span><i>0</i></li>
                                            </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>8</i></td>
                            <td class="align-top">
                                <ul><i>*Inventory of Lead Auditors/Auditors (TESDA QP 03-F09)</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="b2e21" id="b2e21" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->b2e21 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2e21 : '' }}">
                            @error('b2e21')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2e21_remarks" id="b2e21_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e21 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e21_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="b2e21" id="b2e21" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->b2e21 !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->b2e21 === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->b2e21 == '0') selected @endif>0</option>
                                    <option value="4" @if($previousEvaluation && $previousEvaluation->b2e21 == '4') selected @endif>4</option>
                                    <option value="8" @if($previousEvaluation && $previousEvaluation->b2e21 == '8') selected @endif>8</option>
                                </select>
                                @error('b2e21')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2e21_remarks" id="b2e21_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e21 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e21_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.E.2.2.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Timely Submission of Reports/Documents (e.g. IQA reports, Action Catalog, NAP)</span>
                                    <span  id="tooltipText">
                                            <ul>
                                                <li>The region submitted report/doc ahead of deadline = <span class="text-red-600">*</span><i>6</i></li>
                                                <li>The region submitted report/docs on set deadline = <span class="text-red-600">*</span><i>2</i></li>
                                                <li>The region submitted report/doc after set deadline = <span class="text-red-600">*</span><i>0</i></li>
                                            </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>6</i></td>
                            <td class="align-top">
                                <ul><i>*RRRO - Monitoring of submission<br>
                                    IQA Reports reflected on the QP-03-F12<br>
                                    Action Catalog - QP-03-F11</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="b2e22" id="b2e22" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->b2e22 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2e22 : '' }}">
                            @error('b2e22')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2e22_remarks" id="b2e22_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e22 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e22_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="b2e22" id="b2e22" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->b2e22 !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->b2e22 === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->b2e22 == '0') selected @endif>0</option>
                                    <option value="2" @if($previousEvaluation && $previousEvaluation->b2e22 == '2') selected @endif>2</option>
                                    <option value="6" @if($previousEvaluation && $previousEvaluation->b2e22 == '6') selected @endif>6</option>
                                </select>
                                @error('b2e22')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2e22_remarks" id="b2e22_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e22 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e22_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.E.2.3</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Percentage of Personnel Attendance to Central Office initiated QMS-related training programs</span>
                                    <span  id="tooltipText">
                                            <ul>
                                                <li>>80% of regional personnel attended QMS related training programs = <span class="text-red-600">*</span><i>6</i></li>
                                                <li>40% to 80% of regional personnel attended QMS related training programs = <span class="text-red-600">*</span><i>3</i></li>
                                                <li><40% of regional personnel attended QMS related training programs = <span class="text-red-600">*</span><i>0</i></li>
                                                <li>*Plus (1) Point for ROPO initiated QMS related training programs of personnel = <span class="text-red-600">*</span><i>1</i></li>
                                            </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>6</i></td>
                            <td class="align-top">
                                <ul><i>*RRRO - Monitoring of submission<br>
                                    IQA Reports reflected on the QP-03-F12<br>
                                    Action Catalog - QP-03-F11</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="b2e23" id="b2e23" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->b2e23 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2e23 : '' }}">
                            @error('b2e23')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2e23_remarks" id="b2e23_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e23 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e23_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="b2e23" id="b2e23" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->b2e23 !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->b2e23 === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->b2e23 == '0') selected @endif>0</option>
                                    <option value="3" @if($previousEvaluation && $previousEvaluation->b2e23 == '3') selected @endif>3</option>
                                    <option value="6" @if($previousEvaluation && $previousEvaluation->b2e23 == '6') selected @endif>6</option>
                                </select>
                                <p>plus 1</p>
                                @error('b2e23')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2e23_remarks" id="b2e23_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2e23 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2e23_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>C.</b><hr></td>

                                <td class="align-top"><b>Administrative and Support Services</b><hr></td>
                                <td class="align-top"><b>75</b><hr></td>
                                <td class="align-bottom"><hr></td>
                                <td class="align-bottom"><hr></td>
                                <td class="align-bottom"><hr></td>
                        </tr>

                        <tr>
                            <td class="align-top">C.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Budget Utilization Rate (BUR)</span>
                                    <span  id="tooltipText">
                                            <ul>
                                                <li>100% of budget utilized = <span class="text-red-600">*</span><i>25</i></li>
                                                <li> 90% - 99% of budget utilized = <span class="text-red-600">*</span><i>10</i></li>
                                                <li>89% and below of budget utilized = <span class="text-red-600">*</span><i>0</i></li>
                                            </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>25</i></td>
                            <td class="align-top">
                                <ul><i>*Monitoring logbook/ registry</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="c1" id="c1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->c1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c1 : '' }}">
                            @error('c1')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="c1_remarks" id="c1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->c1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c1_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="c1" id="c1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c1 !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->c1 === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->c1 == '0') selected @endif>0</option>
                                    <option value="10" @if($previousEvaluation && $previousEvaluation->c1 == '10') selected @endif>10</option>
                                    <option value="25" @if($previousEvaluation && $previousEvaluation->c1 == '25') selected @endif>25</option>
                                </select>
                                @error('c1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="c1_remarks" id="c1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->c1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c1_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">C.2</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Implementation of Agency Action Plan and Status of Implementation (AAPSI) on the Prior Years Audit Recommendation<br>
                                    <i>80% acted upon (either partially or fully implemented)<i></span>
                                    <span  id="tooltipText">
                                            <ul>
                                                <li>100% acted upon (either partially or fully implemented) = <span class="text-red-600">*</span><i>25</i></li>
                                                <li>90% - 99% acted upon (either partially or fully implemented) = <span class="text-red-600">*</span><i>15</i></li>
                                                <li>80% - 89%acted upon (either partially or fully implemented) = <span class="text-red-600">*</span><i>5</i></li>
                                                <li>79% and below acted upon (either partially or fully implemented) = <span class="text-red-600">*</span><i>0</i></li>
                                            </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>25</i></td>
                            <td class="align-top">
                                <ul><i>*Agency Action Plan and Status of Implementation (AAPSI) CY 2021 and PYs</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="c2" id="c2" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->c2 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c2 : '' }}">
                            @error('c2')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="c2_remarks" id="c2_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->c2 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c2_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="c2" id="c2" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c2 !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->c2 === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->c2 == '0') selected @endif>0</option>
                                    <option value="5" @if($previousEvaluation && $previousEvaluation->c2 == '5') selected @endif>5</option>
                                    <option value="15" @if($previousEvaluation && $previousEvaluation->c2 == '15') selected @endif>15</option>
                                    <option value="25" @if($previousEvaluation && $previousEvaluation->c2 == '25') selected @endif>25</option>
                                </select>
                                @error('c2')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="c2_remarks" id="c2_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->c2 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c2_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">C.3.3.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                <span>Percentage of Personnel Attendance to Finance related training programs</span>
                                    <span  id="tooltipText">
                                            <ul>
                                                <li>80% of regional finance and budget officers/personnel attended finance related training programs = <span class="text-red-600">*</span><i>25</i></li>
                                                <li>40% to 79% of regional finance and budget officers/personnel attended finance related training programs = <span class="text-red-600">*</span><i>15</i></li>
                                                <li>Less than 40% of regional finance and budget officers/personnel attended finance related training programs = <span class="text-red-600">*</span><i>5</i></li>
                                                <li>*Plus (1) Point for RO initiated Finance-related training programs for finance and budget officers/personnel  = <span class="text-red-600">*</span><i>0</i></li>
                                            </ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>25</i></td>
                            <td class="align-top">
                                <ul><i>*List of plantilla positions per region<br>
                                    - Certificates of training attended<br>
                                    
                                    list of training programs, certified correct by HRMO, RO plus PO (For BRO only)"</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="c33" id="c33" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->c33 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->c33 : '' }}">
                            @error('c33')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="c33_remarks" id="c33_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->c33 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c33_remarks : '' }}</textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="c33" id="c33" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->c33 !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->c33 === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->c33 == '0') selected @endif>0</option>
                                    <option value="5" @if($previousEvaluation && $previousEvaluation->c33 == '5') selected @endif>5</option>
                                    <option value="15" @if($previousEvaluation && $previousEvaluation->c33 == '15') selected @endif>15</option>
                                    <option value="25" @if($previousEvaluation && $previousEvaluation->c33 == '25') selected @endif>25</option>
                                </select>
                                <p>plus 1</p>
                                @error('c33')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="c33_remarks" id="c33_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->c33 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->c33_remarks : '' }}</textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="align-top"><b>D.</b><hr></td>

                                <td class="align-top"><b>Reporting Efficiency</b><hr></td>
                                <td class="align-top"><b>60</b><hr></td>
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
                            <td style="vertical-align: top"><i>60</i></td>
                            <td class="align-top">
                                <ul><i>Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul>
                            </td>
                            {{-- <td class="align-top">
                            <input type="number" name="d1" id="d1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->d1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->d1 : '' }}">
                            @error('d1')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="d1_remarks" id="d1_remarks" class="comments" placeholder="Comment"></textarea>
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
            </form>
            </div>
        </div>
    </div>
    {{-- <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script> --}}
</body>
</html>
