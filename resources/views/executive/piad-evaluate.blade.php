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
            margin: 20px 20px 20px 10px; /* Adjusted left margin to 10px */
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
            <h1 class="text-3xl font-bold text-white font-sans text-center">Best Regional Office Evaluator - Public Information and 
                Assistance Division</h1>
        </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                    <form method="POST" action="{{ route('piad_evaluation') }}">
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
                            <td class="align-top"><b>40</b><hr></td>
                            <td class="align-top"><br><hr></td>
                            <td class="align-top"><br><hr></td>
                            <td class="align-top"><br><hr></td>

                        </tr>

                        
                        <tr>
                            <td class="align-top">A.3. </td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Resolutions of complaints emanating from the Contact Center</span>
                                    <span  id="tooltipText">
                                        <ul>No complaints received  = <i>10</i></ul>
                                        <ul>95% of all complaints emanating from the Contact Center have been resolved and closed within the year = <i>10</i></ul>
                                        <ul>Less than 95% of all complaints against the ROs, POs and TTIs emanating from the<br> Contact Center have been resolve and closed within the year = <i>0</i></ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top"><i><ul>*TESDA OP AS 03 F04 Monitoring of Complaints Received Certification of No Complaints Received - signed by the RD
                            </i></ul></td>
                            <td class="align-top">
                                <input type="number" name="a3" id="a3" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->a3 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a3 : '' }}">
                                @error('a3')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a3_remarks" id="a3_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a3 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a3_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">A.4. </td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Customer Satisfaction Results<br> Customer Net Satisfaction Rating with minimum of 95%</span>
                                        <span  id="tooltipText">
                                            <ul>Customer Net Satisfaction Rating is at 99% and above = <i>30</i></ul>
                                            <ul>Customer Net Satisfaction Rating is at 98% = <i>20</i></ul>
                                            <ul>Customer Net Satisfaction Rating is at 97% = <i>10</i></ul>
                                            <ul>Customer Net Satisfaction Rating is at 96% = <i>5</i></ul>
                                            <ul>Customer Net Satisfaction Rating is at 95% = <i>3</i></ul>
                                            <ul>Customer Net Satisfaction Rating is below 95% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>30</i></td>
                            <td class="align-top"><i><ul>*Customer Feedback Form Results <br>TESDA OP AS 03 F02</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="a4" id="a4" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->a4 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a4 : '' }}">
                                @error('a4')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="a4_remarks" id="a4_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a4 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a4_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>

                            <td class="align-top">D.</td>
                            <td class="align-top">Reporting Efficiency<hr></td>
                            <td class="align-top"><b>60</b><hr></td>
                            <td class="align-bottom"><hr></td>
                            <td class="align-bottom"><hr></td>
                            <td class="align-bottom"><hr></td>

                        </tr>

                        <tr>
                            <td class="align-top">D.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Timeliness, Consistency and Accuracy</span>
                                        <span  id="tooltipText">
                                            <ul>Reports are accurate and submitted consistently and on time = <i>60</i></ul>
                                            <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                            <ul>Reports are not accurate and are not submitted on time = <i></i></ul>
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
                            </td>
                            <td class="align-top">
                                <textarea name="d1_remarks" id="d1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->d1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->d1_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">E.</td>
                            <td class="align-top">Social Marketing and Advocacy<hr></td>
                            <td class="align-top"><b>50</b><hr></td>
                            <td class="align-top"><br><hr></td>
                            <td class="align-top"><br><hr></td>
                            <td class="align-top"><br><hr></td>

                        </tr>

                        <tr>
                            <td class="align-top">E.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Communication Program (OPCR)</span>
                                    <span  id="tooltipText">
                                        <ul>A Communication Plan was prepared and fully implemented. = <i>50</i></ul>
                                        <ul>No Communication Plan was prepared but activities were fully implemented. = <i>30</i></ul>
                                        <ul>No Communication Plan was prepared and not all communications activities were implemented = <i>0</i></ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><i>50</i></td>
                            <td class="align-top"><i><ul>*Communication plan/OPCR</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="e1" id="e1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->e1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->e1 : '' }}">
                                @error('e1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="e1_remarks" id="e1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->e1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->e1_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        


                    </script>    
                    </tbody>
                </table>
                <td class="align-top">
                    <div class="flex justify-end space-x-4">
                        <label class="text-xs btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer">
                          Upload Files
                          <input type="file" class="hidden" />
                        </label>
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
