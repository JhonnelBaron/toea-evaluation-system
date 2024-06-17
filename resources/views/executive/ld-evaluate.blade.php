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
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office - Executive Evaluation</h1>
        </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                <form method="POST" action="{{ route('ld_evaluation') }}">
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
                            <td><b>70</b></td>
                        </tr>
                        
                        <tr>
                            <td>
                                <b>A.1. - Compliance to Zero Measures</b><br>
                                A.1 - Compliance to Zero Corruption Policy
                            <ul>The Region has no personnel with pending administrative case = <i>40</i></ul>
                            <ul>The Region has at least one pending administrative case  = <i> 0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>40</i></td>
                            <td><i><ul>*Certification of no pending case</ul></i></td>
                            <td>
                            <input type="number" name="a1" id="a1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a1 : '' }}">
                            @error('a1')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                        @enderror
                            </td>
                            <td>
                                <textarea name="a1_remarks" id="a1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a1_remarks : '' }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            
                            <td><h5><b>A.2. Compliance to the TESDA Code of Conduct and Ethical Standards</b></h5><hr>
                                <ul>Valid Complaints against any Official or Employee on the following specific rules of conduct: <br></ul>
                                <ul>
                                    <li style="text-indent: 20px">• Fidelity to Duty</li>
                                    <li style="text-indent: 20px">• Conflict of Interest</li>
                                    <li style="text-indent: 20px">• Solicitation and Acceptance of Gifts</li>
                                    <li style="text-indent: 20px">• Outside Employment</li>
                                    <li style="text-indent: 20px">• Cronyism</li>
                                    <li style="text-indent: 20px">• Confidentiality</li>
                                    <li style="text-indent: 20px">• Post-employment</li>
                                    <li style="text-indent: 20px">• Procurement of Goods, Consulting Services, and Infrastructure Projects</li>
                                    <li style="text-indent: 20px">• Encouraging Reporting of Malpractices, Corruption, and other Protected Disclosures Valid</li>
                                    <li style="text-indent: 20px">• Complaints from Presidential Action Center (888) and CSC-Contact Center ng Bayan Adverse National ISP Findings</li>
                                        </ul>
                                        <ul>There are no valid complaints, findings against any Official and Employee =<i>30</i></ul>
                                        <ul>There are 1-3 complaint/s, findings against any Official and Employee = <i>20</i></ul>
                                        <ul>There are 4-6 complaints, findings against any Official and Employee = <i>10</i></ul>
                                        <ul>There are 7-9 complaints, findings against any Official and Employee = <i>5</i></ul>
                                        <ul>There are 10 or more complaints, findings against any Official and Employee = <i>0</i></ul>
                            </td>
                            
                            <td style="vertical-align: top"><b>30</b></td>
                            <td><i><ul>*Certification from the RACC</ul></i></td>
                            <td>
                            <input type="number" name="a2" id="a2" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->a2 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->a2 : '' }}">
                            @error('a2')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                        @enderror
                            </td>
                            <td>
                                <textarea name="a2_remarks" id="a2_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->a2 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->a2_remarks : '' }}</textarea>
                            </td>
                        </tr>
                        </tr>
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
