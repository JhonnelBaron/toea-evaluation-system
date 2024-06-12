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
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office Evaluator - PIAD</h1>
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
                            A.3. Resolutions of complaints emanating from the Contact Center
                                <ul>No complaints received  = <i>10</i></ul>
                                <ul>95% of all complaints emanating from the Contact Center have been resolved and closed within the year = <i>10</i></ul>
                                <ul>Less than 95% of all complaints against the ROs, POs and TTIs emanating from the Contact Center have been resolve and closed within the year = <i>0</i></ul>
                            </td>
                            <td><i>10</i></td>
                            <td><i><ul>*TESDA OP AS 03 F04 Monitoring of Complaints Received Certification of No Complaints Received - signed by the RD
                            </i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>10-</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            A.4. Customer Satisfaction Results<br> Customer Net Satisfaction Rating with minimum of 95%
                                <ul>Customer Net Satisfaction Rating is at 99% and above = <i></i></ul>
                                <ul>Customer Net Satisfaction Rating is at 98% = <i></i></ul>
                                <ul>Customer Net Satisfaction Rating is at 97% = <i></i></ul>
                                <ul>Customer Net Satisfaction Rating is at 96% = <i></i></ul>
                                <ul>Customer Net Satisfaction Rating is at 95% = <i></i></ul>
                                <ul>Customer Net Satisfaction Rating is below 95% = <i></i></ul>
                            </td>
                            <td><i>30</i></td>
                            <td><i><ul>*Customer Feedback Form Results <br>TESDA OP AS 03 F02</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>3</option>
                                    <option>5</option>
                                    <option>10</option>
                                    <option>20</option>
                                    <option>30</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>

                            <td>D. Reporting Efficiency<hr></td>
                            <td><b><br>60</b><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>

                        </tr>

                        <tr>
                            <td>
                            D.1. Timeliness, Consistency and Accuracy
                                <ul>Reports are accurate and submitted consistently and on time = <i>60</i></ul>
                                <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                <ul>Reports are not accurate and are not submitted on time = <i></i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>30</option>
                                    <option>60</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>

                            <td>E. Social Marketing and Advocacy<hr></td>
                            <td><b><br>50</b><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>

                        </tr>

                        <tr>
                            <td>
                            E.1. Communication Program (OPCR)
                                <ul>A Communication Plan was prepared and fully implemented. = <i>50</i></ul>
                                <ul>No Communication Plan was prepared but activities were fully implemented. = <i>30</i></ul>
                                <ul>No Communication Plan was prepared and not all communications activities were implemented = <i></i></ul>
                            </td>
                            <td><i>50</i></td>
                            <td><i><ul>*Communication plan/OPCR</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>30</option>
                                    <option>50</option>
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
