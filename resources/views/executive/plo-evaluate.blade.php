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
            <h1 class="text-3xl font-bold text-white font-sans">Best Regional Office Evaluator- PLO</h1>
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
                            <td><b>78</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td><b>B.1. Performance based on the General Appropriations Act (GAA)<hr></b></td>
                            <td><b>10</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        
                        <tr>
                            <td>
                            B.1.G. 60% of TVET programs with tie-ups to industry
                            <ul>The accomplishment rate based on set target is at 100% and above  = <i>10</i></ul>
                            <ul>The accomplishment rate based on set target is below 100% = <i>0</i></ul>
                            </td>
                            <td><i>10</i></td>
                            <td><i><ul>*Summary/Report on duly accomplished <br>TESDA TVET Partnership Monitoring System (TTPMS)
                            </i></ul></td>
                            <td>
                                <select name="b1g" id="b1g" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>10-</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b1g_remarks" id="b1g_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>

                            <td><b>B.2. Implementation of the TESDA Corporate Plan 2018-2022<hr></b></td>
                            <td><b>68</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td><b>B.2.D. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD - SD4s Act (GAA)<hr></b></td>
                            <td><b>68</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td><b>B.2.D.4. Institutional Awards <hr></b></td>
                            <td><b>45</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>

                        <tr>

                            <td><b>B.2.D.4.1. TESDA Idol (Wage-employed)<hr></b></td>
                            <td><b>15</b><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>
                            <td><br><hr></td>

                        </tr>


                        <tr>
                            <td>
                            B.2.D.4.1.1. Participation
                                <ul>The Region participated in TESDA Idol (Wage-employed) = <i>5</i></ul>
                                <ul>The Region did not participate in TESDA Idol (Wage-employed) = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td>
                                <select name="b2d411" id="b2d411" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>5</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d411_remarks" id="b2d411_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.4.1.2. Awards received
                                <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                                <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
                            </td>
                            <td><i>10</i></td>
                            <td><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td>
                                <select name="b2d412" id="b2d412" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>10</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d412_remarks" id="b2d412_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>
                        

                        <tr>
                            <td>
                            B.2.D.4.2. TESDA Idol (Self-employed)
                            </td>
                            <td><i>15</i></td>
                            <td><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td>
                                <select name="b2d42" id="b2d42" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>15</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d42_remarks" id="b2d42_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.4.2.1. Participation
                                <ul>The Region participated in TESDA Idol (self-employed) = <i>5</i></ul>
                                <ul>The Region did not participate in TESDA Idol (self-employed) = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td>
                                <select name="b2d421" id="b2d421" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>5</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d421_remarks" id="b2d421_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.4.2.2. Awards received
                                <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                                <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
                            </td>
                            <td><i>19</i></td>
                            <td><i><ul>*Final Result of the 2022 Search for Idols ng TESDA</i></ul></td>
                            <td>
                                <select name="b2d422" id="b2d422" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>10</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d422_remarks" id="b2d422_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.4.3. Kabalikat Awards
                            </td>
                            <td><i>15</i></td>
                            <td><i><ul>*National Kabalikat Awards Committee Resolution</i></ul></td>
                            <td>
                                <select name="b2d43" id="b2d43" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>15</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d43_remarks" id="b2d43_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.4.3.1. Participation
                                <ul>The Region participated in Kabalikat Awards = <i>5</i></ul>
                                <ul>The Region did not participate in Kabalikat Awards = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*National Kabalikat Awards Committee Resolution</i></ul></td>
                            <td>
                                <select name="b2d431" id="b2d431" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>5</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d431_remarks" id="b2d431_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td>
                            B.2.D.4.3.2. Awards received
                                <ul>The Region received award/recognition at the national level = <i>10</i></ul>
                                <ul>The Region did not receive award/recognition at the national level = <i>0</i></ul>
                            </td>
                            <td><i>10</i></td>
                            <td><i><ul>*National Kabalikat Awards Committee Resolution</i></ul></td>
                            <td>
                                <select name="b2d432" id="b2d432" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>10</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d432_remarks" id="b2d432_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>


                        <tr>
                            <td>
                            <b>
                            B.2.D.5. Partnerships forged and implemented<br>
                                <i>● to be measured in terms of resources and increase in program outputs</i><br>
                                <i>● CSR – partnership with private companies</i></b>
                                <ul><i>*For Large Regions: Partnerships with three (3) or more industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies;<br>
                                        For Medium Regions: Partnerships with two (2) or more industries / private companies and with continuing tie - ups for the last two (2) years with the same industries/companies;<br>
                                        For Small Regions: Partnership with more than one (1) industry / private company and with continuing tie-ups for the last two (2) years with the same industry/company" = 15</i></ul><br>
                                <ul><i>*For Large Regions: Partnerships with less than three (3) industries / private companies and with continuing tie-ups for the last two (2) years with the same industries/companies;<br>
                                        For Medium Regions: Partnerships with less than two (2) industries / private companies and with continuing tie - ups for the last two (2) years with the same industries/companies;<br>
                                        For Small Regions: Partnership with one (1) industry / private company and with continuing tie-ups for the last two (2) years with the same industry/company;" = 10</i></ul><br>
                                <ul><i>"For Large Regions: Partnerships with less than three (3) industries / private companies and with continuing tie-ups for less than two (2) years with the same industries/companies;<br>
                                        For Medium Regions: Partnerships with less than two (2) industries / private companies and with continuing tie-ups for less than two (2) years with the same industries/companies;<br>
                                        For Small Regions: Partnership with one (1) industry / private company and with continuing tie-ups for less than two (2) years with the same industries/companies; = 0"</i></ul><br>
                            </td>
                            <td><i>15</i></td>
                            <td><i><ul>*Copies of signed MOAs</i></ul></td>
                            <td>
                                <select name="b2d5" id="b2d5" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>15</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d5_remarks" id="b2d5_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            B.2.D.6. Number of new EBT programs implemented in private TVIs (DTS, Apprenticeship, Learnership, In-company training, SIL, PAFSE)
                                <ul>At least 30 new programs for Regions that belongs to the Large Category<br>
                                    At least 20 new programs for Regions that belong to the Medium Category<br>
                                    At least 10 new programs for Regions that belong to the Small Category" = <i>8</i></ul>
                                <ul>Below the minimum number of programs per category = <i>0</i></ul>
                            </td>
                            <td><i>8</i></td>
                            <td><i><ul>*Compendium of program registration, Registry of EBT programs; T2MIS</i></ul></td>
                            <td>
                                <select name="b2d6" id="b2d6" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>>
                                    <option>8</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="b2d6_remarks" id="b2d6_remarks" class="comments" placeholder="Comment"></textarea>
                            </td>
                        </tr>

                        <tr>

                                <td> D. Reporting Efficiency<hr></td>
                                <td><b><br>60</b><hr></td>
                                <td><br><br><hr></td>
                                <td><br><br><hr></td>
                                <td><br><br><hr></td>
                        </tr>  

                        <tr>
                            <td>
                            D.1. Timeliness, Consistency and Accuracy
                                <ul>Reports are accurate and submitted consistently and on time  = <i>60</i></ul>
                                <ul>Reports are accurate and submitted consistently but not on time = <i>30</i></ul>
                                <ul>Reports are not accurate and are not submitted on time = <i>0</i></ul>
                            </td>
                            <td><i>5</i></td>
                            <td><i><ul>*Rating of each Executive Office based on the timely, consistent and accurate reporting</i></ul></td>
                            <td>
                                <select name="d1" id="d1" style="font-size: 15px; padding: 10px; border-radius: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                                    <option>0</option>
                                    <option>30</option>
                                    <option>60</option>
                                </select>
                            </td>
                            <td>
                                <textarea name="d1_remarks" id="d1_remarks" class="comments" placeholder="Comment"></textarea>
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
