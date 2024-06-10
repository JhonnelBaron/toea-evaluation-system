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
            background-color: #0066ff;
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
        }
        th {
            background-color: transparent;
            font-weight: bold;
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
        @include('components.sidebar', [
            'profile-picture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-60">

        </div>
        <div class="header">
            <h1 class="text-xl font-bold text-white">GALING PROBINSYA - Small Category - Submission List</h1>
        </div>
        <div class="content">
            <div class="box-content">

                <!-- THIS IS A -->
                <table>
                    <thead>
                        <tr>
                            <th>Requirement</th>
                            <th>Initial Score</th>
                            <th>Means of Verification</th>
                            <th>Evaluation</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>C. Administrative and Support Services = </b><i>125</i><br>
                            C.1. Budget Utilization Rate (BUR)
                                <ul>100% of budget utilized = <i>25</i></ul>
                                <ul>90% - 99% of budget utilized = <i>10</i></ul>
                                <ul>89% and below of budget utilized = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*Monitoring logbook/ registry</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td><b>C.2. Implementation of Agency Action Plan and Status of Implementation (AAPSI) on the Prior Years Audit Recommendation = </b><i>125</i><br>
                                <ul>80% acted upon (either partially or fully implemented)</ul>

                                <ul>100% acted upon (either partially or fully implemented) = <i>25</i></ul>
                                <ul>90% - 99% acted upon (either partially or fully implemented) = <i>15</i></ul>
                                <ul>80% - 89%acted upon (either partially or fully implemented) = <i>5</i></ul>
                                <ul>79% and below acted upon (either partially or fully implemented) = <i>0</i> </ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*Agency Action Plan and Status of Implementation (AAPSI)</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.3. Staff Development Program = </b><i>35</i><br>
                                C.3.1. Employees who have attended SDP have implemented their RE-Entry Plans as scheduled
                                <ul>100% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled = <i>20</i></ul>
                                <ul>70%- 99% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled = <i>10</i></ul>
                                <ul>69% and below of Employees who attended SDP have implemented their Re-Entry Plans as scheduled = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*Regional/Provincial Work Force Development Plan (WFDP) Certificates of trainings attended Copies of REAPs</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.3.2. Training Opportunities to staff provided for CY 2022</b><br>
                                <ul>100% of Employees were provided with training opportunities = <i>15</i></ul>
                                <ul>74% and below of Employees were provided with training opportunities = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*"- List of plantilla positions per region province <br> -Certificates of training attended</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.4. Model Employee Awards = <i>32</i></b><br>
                                C.4.1. Model Employee for Category I Position = <i>10</i><br>
                                <b>C.4.1.1. Participation</b>
                                
                                <ul>The Province submitted nominees for Category I = <i>5</i></ul>
                                <ul>The Province did not submit nominees for Category I = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br> -Certificates of training attended</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.4.1.2. Awards received</b><br>
                                <ul>The Province has received recognition/award at national level = <i>5</i></ul>
                                <ul>The Province did not receive award/recognition at national level = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br> -Certificates of training attended</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.4.2. Model Employee for Category II Position =<i> 11</i></b>
                                <b>C.4.2.1. Participation</b><br>
                                <ul>The Province submitted nominees for Category II = <i>5</i></ul>
                                <ul>The Province did not submit nominees for Category II = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br> -Certificates of training attended</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.4.2.2.  Awards received =<i> 6</i></b>
                                <ul>The Province has received recognition/award at national level = <i>6</i></ul>
                                <ul>The Province did not receive award/recognition at national level = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br> -Certificates of training attended</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.4.3. Model Employee for Category III Position</b><br>
                                C.4.3.1. Participation =<i> 6</i>
                                <ul>The Province submitted nominees for Category III = <i>5</i></ul>
                                <ul>The Province did not submit nominees for Category III = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br> -Certificates of training attended</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                
                            C.4.3.2. Awards received =<i> 6</i>
                                <ul>The Province has received recognition/award at national level = <i>6</i></ul>
                                <ul>The Province did not receive award/recognition at national level = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br> -Certificates of training attended</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                
                            C.5. Application for PRIME-HR Level
                                <ul>The PO has applied and has been certified in higher PRIME HR Level = <i>8</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i><ul>*Confernment/Certificate Awarded</ul></i>
                            </td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <ul>The PO has applied for higher PRIME-HR Level = <i>4</i></ul>
                                <ul>The PO has not applied for higher PRIME-HR Level = <i>0</i></ul>
                            </td>
                            <td><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td><input type="file" name="fileUpload" id="fileUpload">
                                <br><i>
                                    <ul>*Letter to CSC and other communications with regard 
                                    to the requirements submitted by the region to 
                                    CSC (with CSC feedback/reply letter)</ul></i>

                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>


                        
                        

                    </tbody>
                </table>
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
