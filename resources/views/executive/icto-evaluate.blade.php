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
                <h1 class="text-3xl font-bold text-white font-sans place-content-center ml-20 mr-20 text-center">Best Regional Office Evaluator - Information and Communication Technology Office</h1> 
            </div>
        </div>
        <h1 type="hidden">{{ $regionName }} {{ $regionId }}</h1>
        <div class="content">
            <div class="box-content">
                <form method="POST" action="{{ route('icto_evaluation') }}">
                    @csrf
                    <!-- Hidden input for region_id -->
                    <input type="hidden" name="region_id" value="{{ $regionId }}">

                <!-- THIS IS A -->
                <table>
                    <thead>
                        <tr>
                                
                            <th></th>
                            <th><h1>{{ $regionName }}</h1></th>
                        </tr>
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
                            <td class="align-top"><b>B.2.A.3</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                        <span><b>Digitization of TVET</b></span>
                                            <span  id="tooltipText">
                                                <ul>The RO has institutionalized digitalization/use of electronic/online service <br>
                                                    delivery channel in the implementation of programs and/or utilize new technologies <br>
                                                    to reduce manual effort and increase productivity = <i>6</i></ul>
                                                <ul>The RO has developed digitalization plan to enhance existing systems using/aided by <br>
                                                    new or emerging technologies to improve performance, efficiency, and capabilities  = <i> 3</i></ul>
                                                <ul>The RO has no digitalization plan or initiatives undertaken  = <i> 0</i></ul>
                                            </span>
                                </div>
                            </td>
                            {{-- <td style="vertical-align: top"><i>6</i></td>
                            <td class="align-top"><i><ul>*Documentation Report after implementation</ul></i><br><i><ul>*Submitted plans to ICTO</ul></i></td>
                            <td class="align-top">
                            <input type="number" name="b2a3" id="b2a3" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->b2a3 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->b2a3 : '' }}">
                            @error('b2a3')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                        @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2a3_remarks" id="b2a3_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2a3 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2a3_remarks : '' }}</textarea>
                            </td> --}}
                            <td style="vertical-align: top"><i>6</i></td>
                            <td class="align-top">
                                <i>
                                    <ul>*Documentation Report after implementation</ul>
                                    <ul>*Submitted plans to ICTO</ul>
                                </i>
                            </td>
                            <td class="align-top">
                                <select name="b2a3" id="b2a3" class="px-3 py-2 border rounded-md w-20 vertical-align: center" @if($previousEvaluation && $previousEvaluation->b2a3 !== null) disabled @endif>
                                    <option value="" @if($previousEvaluation && $previousEvaluation->b2a3 === '') selected @endif></option>
                                    <option value="0" @if($previousEvaluation && $previousEvaluation->b2a3 == '0') selected @endif>0</option>
                                    <option value="3" @if($previousEvaluation && $previousEvaluation->b2a3 == '3') selected @endif>3</option>
                                    <option value="6" @if($previousEvaluation && $previousEvaluation->b2a3 == '6') selected @endif>6</option>
                                </select>
                                @error('b2a3')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2a3_remarks" id="b2a3_remarks" class="comments" placeholder="Comment"
                                @if($previousEvaluation && $previousEvaluation->b2a3 !== null) readonly @endif>{{ $previousEvaluation ? $previousEvaluation->b2a3_remarks : '' }}</textarea>
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
                            {{-- <td style="vertical-align: top"><i>60</i></td>
                            <td class="align-top">
                                <ul><i>Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul>
                            </td>
                            <td class="align-top">
                            <input type="number" name="d1" id="d1" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                            @if($previousEvaluation && $previousEvaluation->d1 !== null) disabled @endif value="{{ $previousEvaluation ? $previousEvaluation->d1 : '' }}">
                            @error('d1')
                            <div class="alert alert-danger" style="max-width: 400px; font-size:x-small">{{ $message }}</div>
                            @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="d1_remarks" id="d1_remarks" class="comments" placeholder="Comment"></textarea>
                            </td> --}}
                            <td style="vertical-align: top"><i>60</i></td>
                            <td class="align-top">
                                <ul><i>Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul>
                            </td>
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
                        </tr>
                    </tbody>
                </table>
                <td class="align-top">
                    <div class="flex justify-end space-x-4">
                        <div class="mr-7"><b>TOTAL: <span class="text-lg">{{$previousEvaluation->overall_total_score ?? 0}}</span></b></div>
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
