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
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office - NITESD</h1>
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

                            <td><b>B. Implementation of TESD Programs<hr></b></td>
                            <td><b>58</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td><b>B.2. Implementation of the TESDA Corporate Plan 2018-2022<hr></b></td>
                            <td><b><br>58</b><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>

                        </tr>

                        <tr>

                            <td>B.2.A.  Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness - SD 1<hr></td>
                            <td><br>18<hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>

                        </tr>
                        
                        <tr>
                            <td>
                            B.2.A.1. Advancement through Innovations and Researches
                                <ul>The Region has submitted policy or technology research/es  = <i>10</i></ul>
                                <ul>The Region has not suibmitted policy or technology research/es = <i>0</i></ul>
                            </td>
                            <td><i>10</i></td>
                            <td><i><ul>Researches submitted to the NITESD
                            </i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>1-</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.A.2. Implementation of Recognized/aligned PQF level 4 or Level 5 programs
                                <ul>All TAS in the region have at least 1 recognized/aligned PQF level 4 or level 5 programs = <i>8</i></ul>
                                <ul>Not all TAS in the region have least 1 recognized/aligned PQF level 4 or level 5 programs = <i>0</i></ul>
                            </td>
                            <td><i>15</i></td>
                            <td><i><ul>*Certificate of Recognition for PQF Level 4 or Level 5; List of enrollees<br>Note: no new entrants for UAQTEA in 2022 since no fund was allotted</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>8</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>

                            <td>B.2.D. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD - SD4<hr></td>
                            <td><b><br>25</b><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>

                        </tr>

                        <tr>
                            <td>
                            B.2.D.3. World Cafe of Opportunities<br>
                            B.2.D.3.1. Implementation of WCO
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>5</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*After Activity Report</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>5</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.3.2 Number of HOTS
                                <ul>The accomplishment rate based on set target is at 100% and above = <i>5</i></ul>
                                <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*After Activity Report</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>5</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <b>B.2.D.4. Institutional Awards</b></td>
                          <td><i>15</i></td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.4.4.1. Participation
                                <ul>The Region participated in in the National Level Tagsanay Awards = <i>5</i></ul>
                                <ul>The Region did not participate in the National Level Tagsanay Awards = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*Endorsement Memo, TESDA Order</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>5</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.4.4.2. Awards received
                                <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                                <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul></i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>10</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td>
                            <b>B.2.E. Streamline and Intensify QMS in All Organizational Subsystems - SD 5</b></td>
                          <td><i>15</i></td>
                        </tr>

                        <tr>
                            <td>
                            B.2.E.3.  Green Practices<br>
                                  <i>100% implementation of programs/activities/projects related to Green Practices indicated in the submitted Institutional Development Plan (IDP)</i>
                                <ul>All TTIs in the Region have implemented their plans and projects related to Green Practices = <i>15</i></ul>
                                <ul>Not all TTIs in the Region have implemented their plans and projects related to Green Practices = <i>0</i></ul>
                            </td>
                            <td><i>15</i></td>
                            <td><i><ul>Monitoring report, Research/ Project Proposals, Competency-based <br>Curriculum (CBC), Program Offerings related to Agriculture, Institutional practices</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            <b>D. Reporting Efficiency</b><br>
                            D.1. Timeliness, Consistency and Accuracy
                                <ul>Reports are accurate and submitted consistently and on time = <i>60</i></ul>
                                <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                <ul>Reports are not accurate and are not submitted on time</ul>
                            </td>
                            <td><i>60</i></td>
                            <td><i><ul>MRating of each Executive Office based on the timely, consistent and accurate reporting</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>15</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        


                    </script>    
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
