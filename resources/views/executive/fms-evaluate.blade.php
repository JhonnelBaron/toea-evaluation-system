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
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office - FMS</h1>
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
                            <td><b>50</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td><b>A.5. Compliance to Commission on Audit Rules and Regulations<hr></b></td>
                            <td><b><br>30</b><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>

                        </tr>
                        
                        <tr>
                            <td>
                                A.5.A. Unimplemented Audit Observation Memorandum by the Regional Office
                                <ul>0 unimplemented audit observation memorandum by the region = <i>15</i></ul>
                                <ul>2-5 unimplemented audit observation memorandum by the region = <i>5</i></ul>
                                <ul>6-10 unimplemented audit observation memorandum by the region = <i>0</i></ul>
                                <ul>**Plus (1) point for RO with no AOM received = <i>1</i></ul>
                            </td>
                            <td><i>15</i></td>
                            <td><i><ul>Annual Audit Report (AAR) and Agency Action Plan and Status of Implementation (AAPSI) CY 2022</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>5</option>
                                    <option>15</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                A.5.B. Notice of Suspension and Disallowance
                                <ul>There no suspensions and disallowances = <i>15</i></ul>
                                <ul>There are suspensions and disallowances = <i>0</i></ul>
                            </td>
                            <td><i>15</i></td>
                            <td><i><ul>Statement of Audit Suspensions, Disallowances and Charges (SASDC) issued by the COA (RO and PO and TTIs)</i></ul></td>
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

                            <td>A.7. Liquidation of Cash Advances (Foreign and Local Travel Expenses)<hr></td>
                            <td><b><br>20</b><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>
                            <td><br><br><hr></td>

                        </tr>

                        <tr>
                            <td>
                                A.7.A. Liquidation of Foreign Travel Expenses
                                <ul>All Foreign Travel Expenses liquidated within 60 days = <i>10</i></ul>
                                <ul>Partial number of Foreign Travel Expenses liquidated beyond 60 days = <i>0</i></ul>
                            </td>
                            <td><i>10</i></td>
                            <td><i><ul>*Proof of postings submitted/received copy from COA<br>Schedule of cash advances, Certification from the Accuntant, outstanding cash advances</i></ul></td>
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
                                A.7.B. Liquidation of Local Travel Expenses
                                <ul>All Local Travel Expenses liquidated within 30 days = <i>10</i></ul>
                                <ul>Partial number of Local Travel Expenses liquidated beyond 30 days = <i>0</i></ul>
                            </td>
                            <td><i>10</i></td>
                            <td><i><ul>*Proof of postings submitted/received copy from COA<br>Schedule of cash advances, Certification from the Accuntant, outstanding cash advances</i></ul></td>
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

                            <td><b>C. Administrative and Support Services<hr></b></td>
                            <td><b>56</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>
                            <td>
                                <b>C.1. Budget Utilization Rate (BUR)</b>
                                <ul>100% of budget utilized = <i>25</i></ul>
                                <ul>90% - 99% of budget utilized = <i>10</i></ul>
                                <ul>89% and below of budget utilized = <i>0</i></ul>
                            </td>
                            <td><i>25</i></td>
                            <td><i><ul>*Monitoring logbook/ registry</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>10</option>
                                    <option>25</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>C.2. Implementation of Agency Action Plan and Status of Implementation (AAPSI) on the Prior Years Audit Recommendation</b> <br><i>80% acted upon (either partially or fully implemented)</i>
                                <ul>100% acted upon (either partially or fully implemented) = <i>25</i></ul>
                                <ul>90% - 99% acted upon (either partially or fully implemented) = <i>15</i></ul>
                                <ul>80% - 89%acted upon (either partially or fully implemented) = <i>5</i></ul>
                                <ul>79% and below acted upon (either partially or fully implemented) = <i>0</i></ul>
                            </td>
                            <td><i>25</i></td>
                            <td><i><ul>*Agency Action Plan and Status of Implementation (AAPSI) CY 2021 and PYs</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>5</option>
                                    <option>15</option>
                                    <option>25</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                C.3.3. Percentage of Personnel Attendance to Finance related training programs
                                <ul>80% of regional finance and budget officers/personnel attended finance related training programs = <i>6</i></ul>
                                <ul>40% to 79% of regional finance and budget officers/personnel attended finance related training programs = <i>3</i></ul>
                                <ul>Less than 40% of regional finance and budget officers/personnel attended finance related training programs = <i>0</i></ul>
                                <ul>*Plus (1) Point for RO initiated Finance-related training programs for finance and budget officers/personnel  = <i>1</i></ul>
                            </td>
                            <td><i>6</i></td>
                            <td>
                                <ul><i>*- List of plantilla positions per region<br>
                                        <br>- Certificates of training attended
                                        <br>list of training programs, certified correct by HRMO, RO plus PO (For BRO only)</i></ul></td>
                            <td>
                                <select style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>1</option>
                                    <option>3</option>
                                    <option>6</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="comments" id="comments" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>
                        
                        <tr>

                            <td><b>D. Reporting Efficiency<hr></b></td>
                            <td><b>60</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>



                        <tr>
                            <td>
                                D.1. Timeliness, Consistency and Accuracy
                                <ul>Reports are accurate and submitted consistently and on time = <i>60</i></ul>
                                <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                <ul>Reports are not accurate and are not submitted on time = <i>0</i></ul>
                            </td>
                            <td><i>60</i></td>
                            <td>
                                <i>Rating of each Executive Office based on the timely, consistent and accurate reporting</i>
                            </td>
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
