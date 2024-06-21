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

        .red-asterisk {
            color: red;
            font-size: 1.5em; /* Adjust font size as needed */
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
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office Evaluator- Planning Office</h1>
        </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                <form method="POST" action="{{ route('po_evaluation') }}">
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
                            <td class="align-top">B.1.<hr></td>
                            <td class="align-top">Performance based on the General Appropriations Act (GAA)<hr></td>
                            <td class="align-top">45<hr></td>
                            <td class="align-bottom"><hr></td>
                            <td class="align-bottom"><hr></td>
                            <td class="align-bottom"><hr></td>

                        </tr>

                        
                        <tr>
                            <td class="align-top">B.1.A.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Number of Regional and Provincial TESD plans formulated/updated</span>
                                        <span  id="tooltipText">
                                            <ul>*The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>*The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>15</i></td>
                            <td><i><ul>*Submission of the Regional and Provincial TESD plans with cover memo</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b1a" id="b1a" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b1a !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1a : '' }}">
                                 @error('b1a')
                                 <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                 @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b1a_remarks" id="b1a_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b1a !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1a_remarks : '' }}</textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="align-top">B.1.B.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>94% stakeholders who rated policies/plans as good or better</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>15</i></td>
                            <td class="align-top"><i><ul>*Report of the User’s Feedback Survey </i></ul></td>
                            <td class="align-top">
                                 <input type="number" name="b1b" id="b1b" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                 @if($previousEvaluation && $previousEvaluation->b1b !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1b : '' }}">
                                 @error('b1b')
                                 <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                 @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b1b_remarks" id="b1b_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b1b !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1b_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.1.I.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>76.30% of graduates from technical education and skills development scholarship programs that were employed</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above = <i>15</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>15</i></td>
                            <td class="align-top"><i><ul>*Summary/Report on Result on the Survey on Employability of TVET graduates under TWSP, PESFA and STEP (SETG)</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b1i" id="b1i" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b1i !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b1i : '' }}">
                                @error('b1i')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b1i_remarks" id="b1i_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b1i !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b1i_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.<hr></td>

                            <td><b class="vertical-align: bottom">Implementation of the TESDA Corporate Plan<hr></td>
                            <td class="align-top">43<hr></td>
                            <td class="align-bottom"><hr></td>
                            <td class="align-bottom"><hr></td>
                            <td class="align-bottom"><hr></td>

                        </tr>

                        <tr>
                            <td class="align-top">B.2.A.</td>

                            <td class="align-top">Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness - SD 1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                        <tr>
                            <td class="align-top">B.2.A.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Advancement through Innovations and Researches</span>
                                        <span  id="tooltipText">
                                            <ul>The Region has submitted policy or technology research/es  = <i>8</i></ul>
                                            <ul>The Region has not suibmitted policy or technology research/es = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>8</i></td>
                            <td class="align-top"><i><ul>*Researches submitted to the NITESD</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2a1" id="b2a1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2a1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2a1 : '' }}">
                                @error('b2a1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2a1_remarks" id="b2a1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2a1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2a1_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.B.</td>

                            <td>Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>   

                        <tr>
                            <td class="align-top">B.2.B.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>TVET enrolment and graduates by delivery mode- community-based</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above  = <i>10</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top"><i><ul>*Monitoring Reports</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2b1" id="b2b1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2b1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2b1 : '' }}">
                                @error('b2b1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <textarea name="b2b1_remarks" id="b2b1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2b1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2b1_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.B.5.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>Communications/programs/advocacy on Gender and Development (GAD)</span>
                                         <span  id="tooltipText">
                                            <ul>All TTIs, POs and the Region have conducted programs/activities related to GAD  = <i>10</i></ul>
                                            <ul>Not all TTIs, POs and the Region have conducted programs/activities related to GAD = <i>0</i></ul>
                                         </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top"><i><ul>*After activity report on GAD related programs conducted</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2b5" id="b2b5" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2b5 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2b5 : '' }}">
                                @error('b2b5')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2b5_remarks" id="b2b5_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2b5 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2b5_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.</td>

                                <td class="align-top">Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                        </tr>  

                       

                        <tr>
                            <td class="align-top">B.2.D.1.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>TVET enrolment and graduates by delivery mode- institution-based</span>
                                         <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above  = <i>5</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                         </span>
                                </div>
                            </td>
                            <td class="align-top"><i>5</i></td>
                            <td class="align-top"><i><ul>*Report from T2MIS</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2d1" id="b2d1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2d1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d1 : '' }}">
                                @error('b2d1')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d1_remarks" id="b2d1_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d1 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d1_remarks : '' }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top">B.2.D.2.</td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span>TVET enrolment and graduates by delivery mode- enterprise-based</span>
                                        <span  id="tooltipText">
                                            <ul>The accomplishment rate based on set target is at 100% and above  = <i>10</i></ul>
                                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            <td class="align-top"><i>10</i></td>
                            <td class="align-top"><i><ul>*Report from T2MIS</i></ul></td>
                            <td class="align-top">
                                <input type="number" name="b2d2" id="b2d2" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                @if($previousEvaluation && $previousEvaluation->b2d2 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2d2 : '' }}">
                                @error('b2d2')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2d2_remarks" id="b2d2_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2d2 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2d2_remarks : '' }}</textarea>
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
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
