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
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office - FMS</h1>
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
                            <th>Requirement</th>
                            <th>Point Value</th>
                            <th>Means of Verification</th>
                            <th>Evaluation</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>

                            <td><b>A. Good Governance Measures<hr></b></td>
                            <td><b>50</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td>A.5. Compliance to Commission on Audit Rules and Regulations</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            

                        </tr>
                        
                        <tr>
                            <td>
                                <h5>A.5.A. Unimplemented Audit Observation Memorandum by the Regional Office</h5>
                                <ul>
                                    <li>0 unimplemented audit observation memorandum by the region = <span class="text-red-600">*</span><i>15</i></li>
                                    <li>2-5 unimplemented audit observation memorandum by the region = <span class="text-red-600">*</span><i>5</i></li>
                                    <li>6-10 unimplemented audit observation memorandum by the region = <span class="text-red-600">*</span><i>0</i></li>
                                    <li>**Plus (1) point for RO with no AOM received = <span class="text-red-600">*</span><i>1</i></li>
                                </ul>
                            </td>
                            <td><i>15</i></td>
                            <td>
                                <ul><i>Annual Audit Report (AAR) and Agency Action Plan and Status of Implementation (AAPSI) CY 2022</i></ul>
                            </td>
                            <td>
                            <input type="number" name="a5a" id="a5a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a5a !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a5a : '' }}">
                            @error('a5a')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td>
                                <textarea name="a5a_remarks" id="a5a_remarks" class="comments" placeholder="Comment" 
                                @if($previousEvaluation && $previousEvaluation->a5a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a5a_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <h5>A.5.B. Notice of Suspension and Disallowance</h5>
                                <ul>
                                    <li>There are no suspensions and disallowances = <span class="text-red-600">*</span><i>15</i></li>
                                    <li>There are suspensions and disallowances = <span class="text-red-600">*</span><i>0</i></li>
                                </ul>
                            </td>
                            <td><i>15</i></td>
                            <td>
                                <ul><i>Statement of Audit Suspensions, Disallowances and Charges (SASDC) issued by the COA (RO and PO and TTIs)</i></ul>
                            </td>
                            <td>
                            <input type="number" name="a5b" id="a5b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a5b !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a5b : '' }}">
                            @error('a5b')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                             @enderror
                            </td>
                            <td>
                                <textarea name="a5b_remarks" id="a5b_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a5b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a5b_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>

                            <td><b>A.7. Liquidation of Cash Advances (Foreign and Local Travel Expenses)</b></td>

                        </tr>

                        <tr>
                        <tr>
                            <td>
                                <h5>A.7.A. Liquidation of Foreign Travel Expenses</h5>
                                <ul>
                                    <li>All Foreign Travel Expenses liquidated within 60 days = <span class="text-red-600">*</span><i>10</i></li>
                                    <li>Partial number of Foreign Travel Expenses liquidated beyond 60 days = <span class="text-red-600">*</span><i>0</i></li>
                                </ul>
                            </td>
                            <td><i>10</i></td>
                            <td>
                                <ul><i>*Proof of postings submitted/received copy from COA<br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances</i></ul>
                            </td>
                            <td>
                            <input type="number" name="a7a" id="a7a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a7a !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a7a : '' }}">
                            @error('a7a')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                             @enderror
                            </td>
                            <td>
                                <textarea name="a7a_remarks" id="a7a_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a7a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a7a_remarks : '' }}</textarea>
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <h5>A.7.B. Liquidation of Local Travel Expenses</h5>
                                <ul>
                                    <li>All Local Travel Expenses liquidated within 30 days = <span class="text-red-600">*</span><i>10</i></li>
                                    <li>Partial number of Local Travel Expenses liquidated beyond 30 days = <span class="text-red-600">*</span><i>0</i></li>
                                </ul>
                            </td>
                            <td><i>10</i></td>
                            <td>
                                <ul><i>*Proof of postings submitted/received copy from COA<br>Schedule of cash advances, Certification from the Accountant, outstanding cash advances</i></ul>
                            </td>
                            <td>
                            <input type="number" name="a7b" id="a7b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a7b !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a7b : '' }}">
                            @error('a7b')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td>
                                <textarea name="a7b_remarks" id="a7b_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a7b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a7b_remarks : '' }}</textarea>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <b>D.1. Timeliness, Consistency and Accuracy <hr></b>
                                <ul>Reports are accurate and submitted consistently and on time = <span class="text-red-600">*</span><i>60</i></ul>
                                <ul>Reports are accurate and submitted consistently but not on time = <span class="text-red-600">*</span><i>30</i></ul>
                                <ul>Reports are not accurate and are not submitted on time = <span class="text-red-600">*</span><i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>60<hr></i></td>
                            <td>
                                <hr><ul><i>Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul>
                            </td>
                            <td>
                            <input type="number" name="d1" id="d1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->d1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->d1 : '' }}">
                            @error('d1')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td>
                                <textarea name="d1_remarks" id="d1_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>
                    </script>    
                    </tbody>
                </table>
                <td>
                    <button type="submit" class="text-xs btn btn-primary btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 #uploadModal">Save Changes</button>
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
