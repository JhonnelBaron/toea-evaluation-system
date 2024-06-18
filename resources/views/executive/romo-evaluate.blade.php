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
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office Evaluator - ROMO</h1>
        </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                <form method="POST" action="{{ route('romo_evaluation') }}">
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

                            <td><b>B. Implementation of TESD Programs<hr></b></td>
                            <td><b>87</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td><b>B.1. Performance based on the General Appropriations Act (GAA)<hr></b></td>
                            <td><b>35</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        
                        <tr>
                            <td>
                            B.1.H. Number of graduates from TESD Scholarship Programs
                            <ul>The accomplishment rate based on set target is at 100% and above  = <i>35</i></ul>
                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td><i>35</i></td>
                            <td><i><ul>*Report generated from the SPMOR</i></ul></td>
                            <td>
                                <input type="number" name="b1h" id="b1h" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b1h !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1h : '' }}">
                                @error('b1h')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <textarea name="b1h_remarks" id="b1h_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b1h !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1h_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>

                            <td><b>B.2. Implementation of the TESDA Corporate Plan 2018-2022<hr></b></td>
                            <td><b>52</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td><b>B.2.B. Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction - SD 2<hr></b></td>
                            <td><b>52</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>
                            <td>
                            B.2.B.2. Skills Training Programs for Special Clients
                            <ul>At least 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women) = <i>10</i></ul>
                            <ul>Less than 7 programs provided to special clients (IPs, Drug Dependents, PDLs and/or their families, KIA/WIA, PWDs, Women) = <i>0</i></ul>
                            </td>

                            <td><i>10</i></td>
                            <td><i><ul>*Monitoring Reports</i></ul></td>
                            <td>
                                <input type="number" name="b2b2" id="b2b2" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2b2 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2b2 : '' }}">
                                @error('b2b2')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <textarea name="b2b2_remarks" id="b2b2_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2b2 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2b2_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.B.3. Number of Scholarship Programs enrolled
                            <ul>The accomplishment rate based on set target is at 100% and above = <i>35</i></ul>
                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>

                            <td><i>35</i></td>
                            <td><i><ul>*Monitoring Reports</i></ul></td>
                            <td>
                                 <input type="number" name="b2b3" id="b2b3" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                 @if($previousEvaluation && $previousEvaluation->b2b3 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2b3 : '' }}">
                                 @error('b2b3')
                                 <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                 @enderror
                            </td>
                            <td>
                                <textarea name="b2b3_remarks" id="b2b3_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2b3 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2b3_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.B.4. Advocacy program to promote the importance of TVET in communities and the roles of CTECs in LGUs
                            <ul>At least 10% of the municipalities in each Province in the Region have been given orientation on Devolution of TVET = <i>7</i></ul>
                            <ul>Less than 10% of the municipalities in each Province in the Region have been given orientation on Devolution of TVET = <i>0</i></ul>
                            </td>

                            <td><i>7</i></td>
                            <td><i><ul>*After Activity Reports on meetings conducted</i></ul></td>
                            <td>
                                <input type="number" name="b2b4" id="b2b4" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2b4 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2b4 : '' }}">
                                @error('b2b4')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <textarea name="b2b4_remarks" id="b2b4_remarks" class="comments" placeholder="Comment"
                                 @if($previousEvaluation && $previousEvaluation->b2b4 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2b4_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            D.1. Timeliness, Consistency and Accuracy
                                <ul>Reports are accurate and submitted consistently and on time  = <i>60</i></ul>
                                <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                <ul>Reports are not accurate and are not submitted on time = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul></td>
                            <td>
                                <input type="number" name="d1" id="d1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->d1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->d1 : '' }}">
                                @error('d1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <textarea name="d1_remarks" id="d1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->d1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->d1_remarks : '' }}</textarea>
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
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
