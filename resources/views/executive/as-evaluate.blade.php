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
        <div class="content">
            <div class="box-content">

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
                            <td><b>40</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                        </tr>
                        
                        <tr>
                            <td>
                                <h5>A.6. Compliance to PhilGEPS requirements<br></h5>

                                    <ul>100% compliance from Publication to Notice and Award and notice to proceed = <i>30</i></ul>
                                    <ul>Non-compliance from Publication to Notice and Award and notice to proceed = <i>0</i></ul>
                            <td style="vertical-align: top"><i>30</i></td>

                            <td>
                                <ul><i>Government Procurement Policy Board (GPPB) report who are compliant</ul>
                            </td>
                            <td>
                            <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                <option>0</option>
                                <option>30</option>
                            </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>
                                    A.8. Compliance to Agency Procurement Compliance Performance Indicator (APCPI)
                                </h5>
                                    <ul>The Provincial Office is compliant to APCPI = <i>10</i></ul>
                                    <ul>The Provincial Office is not compliant to APCPI = <i>0</i></ul>
                                    <td style="vertical-align: top"><i>10</i></td>
                            <td>
                                <ul><i>*Agency Procurement Compliance Performance Indicator (APCPI) submitted within set deadlines by oversight agency/ies <br>c/o of procurement unit</ul>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>10</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> <b>C. Administrative and Support Services <hr></b><i></i>
                                
                    
                            </td>
                            <td style="vertical-align: top"><b>69</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                        </tr>

                        <tr>
                            <td>
                                C.3. Staff Development Program<hr><i></i>
                            </td>
                            <td style="vertical-align: top"><i>35</i></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>
                                C.3.1. Employees who have attended SDP have implemented their RE-Entry Plans as scheduled<hr><i></i><br>
                                <ul>100% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled = <i>20</i></ul>
                                <ul>70%- 99% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled = <i>10</i></ul>
                                <ul>69% and below of Employees who attended SDP have implemented their Re-Entry Plans as scheduled = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>20</i></td>
                            <td>
                                <br><i><ul>*Regional Work Force Development Plan (WFDP) <br>Certificates of trainings attended</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>10</option>
                                    <option>20</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>
                        

                        <tr>
                            <td>
                                C.3.2. Training Opportunities to staff provided for CY 2022<hr><br>
                                <ul>100% of Employees were provided with training opportunities = <i>15</i></ul>
                                <ul>74% and below of Employees were provided with training opportunities = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>15</i></td>
                            <td>
                                <br><i><ul>*"- List of plantilla positions per region Region <br> -Certificates of training attended</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.4. Model Employee Awards<hr></b><i></i>
                            </td>
                            <td style="vertical-align: top"><b>26</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.1. Model Employee for Category I Position<hr><i></i><br>
                            </td>
                            <td style="vertical-align: top;"><i>8</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>8</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.1.1. Participation<hr><i></i><br>
                                <ul>The Region submitted nominees for Category I = <i>4</i></ul>
                                <ul>The Region did not submit nominees for Category I = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>4</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>8</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.1.1. Participation<hr><i></i><br>
                                <ul>The Region submitted nominees for Category I = <i>4</i></ul>
                                <ul>The Region did not submit nominees for Category I = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>4</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>4</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.1.2. Awards received<hr><br>
                                <ul>The Region has received recognition/award at national level = <i>4</i></ul>
                                <ul>The Region did not receive award/recognition at national level = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>4</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>4</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.1.2. Awards received<hr><br>
                                <ul>The Region has received recognition/award at national level = <i>4</i></ul>
                                <ul>The Region did not receive award/recognition at national level = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>4</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>4</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.2. Model Employee for Category II Position<hr><br>
                            </td>
                            <td style="vertical-align: top"><b>9</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.2.1. Participation<br><hr>
                                <ul>The Region submitted nominees for Category II = <i>4</i></ul>
                                <ul>The Region did not submit nominees for Category II = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>4</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br></ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>4</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.2.2.  Awards received<hr>
                                <ul>The Region has received recognition/award at national level = <i>5</i></ul>
                                <ul>The Region did not receive award/recognition at national level = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>5</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br></ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>5</option>
                                </select>
                            </td>                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.4.3. Model Employee for Category III Position</b><br><hr>
                            </td>
                            <td style="vertical-align: top"><b>9</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>
                                C.4.3.1. Participation<hr>
                                <ul>The Region submitted nominees for Category III = <i>4</i></ul>
                                <ul>The Region did not submit nominees for Category III = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>4</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br> -Certificates of training attended</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>4</option>
                                </select>
                            </td>  
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                                
                            C.4.3.2. Awards received<hr>
                                <ul>The Region has received recognition/award at national level = <i>5</i></ul>
                                <ul>The Region did not receive award/recognition at national level = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><i>5</i></td>
                            <td>
                                <br><i><ul>*List of nominees and awardees from HRMD/AS<br> -Certificates of training attended</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>5</option>
                                </select>
                            </td>                            
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td>
                            <b>C.5. Application for PRIME-HR Level</b><hr>
                                <ul>The RO or PO/s in the region have applied and have been certified in higher PRIME HR Level = <i>8</i></ul>
                                <ul>The RO or PO/s have applied for higher PRIME-HR Level = <i>4</i></ul>
                                <ul>The RO or PO/s have not applied for higher PRIME-HR Level = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><b>8</b></td>
                            <td>
                                <br><i><ul>*Confernment/Certificate Awarded <br>Letter to CSC and other communications with regard to the requirements submitted by the region to CSC (with CSC feedback/reply letter)</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>4</option>
                                    <option>8</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
                        </tr>

                        <tr>
                            <td><b>D. Reporting Efficiency</b><br><hr>
                            D.1. Timeliness, Consistency and Accuracy
                                <ul>Reports are accurate and submitted consistently and on time = <i>60</i></ul>
                                <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                <ul>Reports are not accurate and are not submitted on time = <i>0</i></ul>
                            </td>
                            <td style="vertical-align: top"><b>60</b></td>
                            <td>
                                <br><i><ul>*Rating of each Executive Office based on the timely, consistent and accurate reporting</ul></i>
                            </td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>30</option>
                                    <option>60</option>
                                </select>
                            </td>
                            <td><textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea></td></td>
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
