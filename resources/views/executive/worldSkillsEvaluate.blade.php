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
                <button onclick="window.location.href='/evaluation-page'" class="flex items-center px-4 py-2 text-white text-sm font-medium rounded-md  focus:outline-none focus:ring-2  focus:ring-opacity-50">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </button>
                <h1 class="text-3xl font-bold text-white font-sans place-content-center ml-40 mr-20">Best Regional Office Evaluator - Certification Office</h1> 
            </div>
            
        </div>
        <h1 type="hidden"></h1>
        <div class="content">
            <div class="box-content">
                <form id="saveChangesForm" method="POST" action="{>
                    @csrf
                    <input type="hidden" name="region_id" value="">
                    <div class=" pb-4 pt-4 text-center text-3xl text-black font-sans flex items-center justify-center border-b-2 border-solid border-black">
                        <b></b>
                    </div>
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
                            <td class="align-bottom"><b></b><hr></td>
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
                                <td class="align-top">B.2.</td>
                                <td class="align-top">
                                    <b style="vertical-align: bottom">Implementation of the TESDA Corporate Plan<hr></b>
                                    <td class="align-bottom"><i><hr></i></td>
                                    <td class="align-bottom"><hr></td>
                                    <td class="align-bottom"><hr></td>
                                    <td class="align-bottom"><hr></td>
                            </tr>

                            <tr>
                                <td class="align-top">B.2.A.</td>
                                <td class="align-top">
                                    Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness<br>
                                 <td class="align-top"><i></i></td>
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
                                {{-- <td class="align-top">
                                    <input type="number" name="b2a41" id="b2a41" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                     value="{{ $previousEvaluation ? $previousEvaluation->b2a41 : '' }}">
                                    @error('b2a41')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small"></div>
                                @enderror
                                </td>
                                <td class="align-top"><textarea name="b2a41_remarks" id="b2a41_remarks" class="comments" placeholder="Comment"
                                    </textarea>
                                </td> --}}
                                <td class="align-top">
                                    <select name="b2a41" id="b2a41" class="px-3 py-2 border rounded-md w-20 vertical-align: center" >
                                        <option value="" option>
                                        <option value="0" >0</option>
                                        <option value="3" >3</option>
                                        <option value="6" >6</option>
                                    </select>
                                    @error('b2a41')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small"></div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="b2a41_remarks" id="b2a41_remarks" class="comments" placeholder="Comment">
                                    </textarea>
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
                                {{-- <td class="align-top">
                                    <input type="number" name="b2a42" id="b2a42" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                     value="{{ $previousEvaluation ? $previousEvaluation->b2a42 : '' }}">
                                    @error('b2a42')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small"></div>
                                @enderror
                                </td>
                                <td class="align-top"><textarea name="b2a42_remarks" id="b2a42_remarks" class="comments" placeholder="Comment"
                                </textarea>
                            </td> --}}
                            <td class="align-top">
                                <select name="b2a42" id="b2a42" class="px-3 py-2 border rounded-md w-20 vertical-align: center" >
                                    <option value="" option>
                                    <option value="0" >0</option>
                                    <option value="7" >7</option>
                                </select>
                                @error('b2a42')
                                <div class="alert alert-danger" style="max-width: 400px; font-size:x-small"></div>
                                @enderror
                            </td>
                            <td class="align-top">
                                <textarea name="b2a42_remarks" id="b2a42_remarks" class="comments" placeholder="Comment">
                                </textarea>
                            </td>
                            </tr>


                            <tr>
                                <td class="align-top">B.2.A.4.3.</td>
                                <td class="align-top">
                                    <div id="tooltip">
                                        <span>Awards received at the international level</span>
                                            <span  id="tooltipText">
                                                <ul>The Region received award/recognition at the international level = <i>10</i></ul>
                                                <ul>The Region did not receive award/recognition = <i>0</i></ul>
                                            </span>
                                    </div>
                                </td>
                                 <td class="align-top"><i>10</i></td>
                                <td class="align-top">
                                    <ul><i>*Awards received (plaque or medal)</i></ul>
                                </td>
                                {{-- <td class="align-top">
                                    <input type="number" name="b2a43" id="b2a43" class="px-3 py-2 border rounded-md w-20 vertical-align: center" #f9f9f9;"
                                     value="{{ $previousEvaluation ? $previousEvaluation->b2a43 : '' }}">
                                    @error('b2a43')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small"></div>
                                @enderror
                                </td>
                                <td class="align-top"><textarea name="b2a43_remarks" id="b2a43_remarks" class="comments" placeholder="Comment"
                                    </textarea>
                                </td> --}}
                                <td class="align-top">
                                    <select name="b2a43" id="b2a43" class="px-3 py-2 border rounded-md w-20 vertical-align: center" >
                                        <option value="" option>
                                        <option value="0" >0</option>
                                        <option value="10" >10</option>
                                    </select>
                                    @error('b2a43')
                                    <div class="alert alert-danger" style="max-width: 400px; font-size:x-small"></div>
                                    @enderror
                                </td>
                                <td class="align-top">
                                    <textarea name="b2a43_remarks" id="b2a43_remarks" class="comments" placeholder="Comment">
                                    </textarea>
                                </td>
                            </tr>

                    </tbody>
                </table>

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
                <td class="align-top">
                    <div class="flex justify-end space-x-4">
                        <div class="mr-7"><b>TOTAL: <span class="text-lg">{{$previousEvaluation->overall_total_score ?? 0}}</span></b></div>
                        <a href="{, ['region' => $regionId]) }}" class="text-xs btn btn-primary transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer">
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
</html>
