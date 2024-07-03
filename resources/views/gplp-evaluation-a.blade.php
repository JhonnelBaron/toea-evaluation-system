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
                            <th></th>
                            <th>Requirement</th>
                            <th>Initial Score</th>
                            <th>Means of Verification</th>
                            <th>Evaluation</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-top"><b>A.1</b></td>
                            
                            <td class="align-top">
                                <div id="tooltip">
                                  <span><b>Criteria for Galing Probinsya</b></span>
                                    <span  id="tooltipText">
                                        <ul>The Province has no personnel with pending administrative case = <i>40</i></ul>
                                        <ul>The Province has at least one pending administrative case = <i> 0</i></ul></td>
                                    </span>
                                <div id="tooltip">
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br><i><ul>*Certification of no pending case signed by the Regional <br>Administrative 
                                Complaints Committee signed by the Chair <br>(Regional Director)</ul></i></td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>
                        <tr>
                            <td class="align-top"><b>A.2</b></td>
                            
                            <td class="align-top"><span><h5><b>Compliance to the TESDA Code of Conduct and Ethical Standards</b></h5></span>
                                <div id="tooltip">
                                    <span  id="tooltipText">
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
                                        <li style="text-indent: 20px">• Encouraging Reporting of Malpractices, Corruption, and other Protected <br>Disclosures Valid</li>
                                        <li style="text-indent: 20px">• Complaints from Presidential Action Center (888) and CSC-Contact Center <br>ng Bayan Adverse National ISP Findings</li>
                                            </ul>
                                            <ul>There are no valid complaints, findings against any Official and Employee =<i>30</i></ul>
                                            <ul>There are 1-3 complaint/s, findings against any Official and Employee = <i>20</i></ul>
                                            <ul>There are 4-6 complaints, findings against any Official and Employee = <i>10</i></ul>
                                            <ul>There are 7-9 complaints, findings against any Official and Employee = <i>5</i></ul>
                                            <ul>There are 10 or more complaints, findings against any Official and Employee = <i>0</i></ul>
                                        </span>
                                </div>
                            </td>
                            
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br><i><ul>*Certification of no complaints/findings signed by the <br>Regional 
                                Administrative Complaints Committee signed by <br>the Chair (Regional Director)
                            </ul></i></td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>A.3</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Resolutions of complaints emanating from the Contact Center</b></span>
                                    <span  id="tooltipText">
                                        <ul>No complaints received = <i>10</i></ul>
                                        <ul>95% of all complaints emanating from the Contact Center have been resolved <br>and closed within the year = <i>10</i></ul>
                                        <ul>Less than 95% of all complaints against the POs and TTIs emanating from the <br>Contact Center have been <br>resolved and closed within the year = <i>0</i></ul>
                                    </span>
                                </div>
                            </td>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload">
                            <br>
                            <ul><i>*TESDA OP AS 03 F04 Monitoring of Complaints Received</i></ul>
                            <ul><i>*Certification of No Complaints Received - signed by the RD</i></ul>

                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>
                        <tr>
                            <td class="align-top"><b>A.4</b></td>
                            <td class="align-top">
                                    <div id="tooltip">
                                        <span><b>Customer Satisfaction Results</b><br></span>
                                            <span  id="tooltipText">
                                                Customer Net Satisfaction Rating with minimum of 95%
                                                <ul>Customer Net Satisfaction Rating is at 99% and above = <i>30</i></ul>
                                                <ul>Customer Net Satisfaction Rating is at 98% = <i>20</i></ul>
                                                <ul>Customer Net Satisfaction Rating is at 97% = <i>10</i></ul>
                                                <ul>Customer Net Satisfaction Rating is at 96% = <i>5</i></ul>
                                                <ul>Customer Net Satisfaction Rating is at 95% = <i>3</i></ul>
                                                <ul>Customer Net Satisfaction Rating is below 95% = <i>0</i></ul>
                                            </span>
                                    </div>
                            </td>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                            <ul><i>*Customer Feedback Form Results<br>
                                TESDA OP AS 03 F02<br> 
                                
                                Monthly (January to December) Summary Report with Percentage<br>
                                signed by the PD</i></ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>A.5.</b></td>
                            <td class="align-top"><b>Compliance to Commission on Audit Rules and Regulations</b></td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>A.5.A.</b></td>
                            <td class="align-top">
                                    <div id="tooltip">
                                        <span><b>Unimplemented Audit Observation Memorandum by the Provincial Office</b></span>
                                        <span  id="tooltipText">
                                            <ul>0 unimplemented audit observation memorandum by the province = <i>15</i></ul>
                                            <ul>2-5 unimplemented audit observation memorandum by the province = <i>5</i></ul>
                                            <ul>6-10 unimplemented audit observation memorandum by the province = <i>0</i></ul>
                                            <ul>**Plus (1) point for PO with no AOM received = <i>1</i></ul>
                                    </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                            <ul><i>*Certification/Memorandum with NO AOM received or 
                                number of<br> unimplemented audit observation
                                issued by COA <br>
                                Annual Audit Report (AAR) and Agency Action Plan and Status of <br>Implementation (AAPSI)"
                                </i></ul>

                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>A.5.B</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><h5><b>Notice of Suspension and Disallowance</b><br></h5></span>
                                    <span  id="tooltipText">
                                        <ul>There no suspensions and disallowances = <i>15</i></ul>
                                        <ul>There are suspensions and disallowances = <i>0</i></ul>\
                                    </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>Certification of no suspension nor disallowances signed by the FA<br>
                                    Statement of Audit Suspensions, Disallowances and Charges (SASDC) <br>
                                    with summary as of December
                                    issued by the COA (RO and PO and TTIs)
                                    </ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top"><b>A.6.</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Compliance to PhilGEPS requirements</b><br></span>
                                    <span  id="tooltipText">
                                            <ul>100% compliance from Publication to Notice and Award and notice to proceed = <i>30</i></ul>
                                            <ul>Non-compliance from Publication to Notice and Award and notice to proceed = <i>0</i></ul>
                                    </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>Certification of Compliance
                                    signed/issued by PhilGEPS; <br>Notice of Award/ Notice to Proceed
                                    
                                    Government Procurement<br> Policy Board (GPPB) report who are compliant</ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-top"><b>A.7. </b></td>
                            <td class="align-top"><b>Liquidation of Cash Advances (Foreign and Local Travel Expenses)</b></td>

                        </tr>

                        <tr>
                            <td class="align-top"><b>A.7.A</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Liquidation of Foreign Travel Expenses</b></span>
                                <!-- Need to upload multiple files here -->
                                        <span  id="tooltipText">
                                            <ul>All Foreign Travel Expenses liquidated within 60 days = <i>10</i></ul>
                                            <ul>Partial number of Foreign Travel Expenses liquidated beyond 60 days = <i>0</i></ul>
                                    </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>Monitoring report signed by the Financial Accountant and PD <br>
                                    Proof of postings submitted/received copy from COA<br>
                                    Schedule of cash advances, Certification from the Accountant, <br>outstanding cash advances
                                    </ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top"><b>A.7.B</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <b>Liquidation of Local Travel Expenses</b></span>
                                    <span  id="tooltipText">
                                        <ul>All Local Travel Expenses liquidated within 30 days = <i>10</i></ul>
                                        <ul>Partial number of Local Travel Expenses liquidated beyond 30 days = <i>0</i></ul>
                                    </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>Monitoring report signed by the Financial Accountant and PD <br>
                                    Proof of postings submitted/received copy from COA<br>
                                    Schedule of cash advances, Certification from the Accountant, <br>outstanding cash advances
                                    </ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top"><b>A.8</b></td>
                            <td class="align-top">
                                <div id="tooltip">
                                    <span><b>Compliance to Agency Procurement Compliance Performance Indicator (APCPI)</b></span>
                                    <span  id="tooltipText">
                                            <ul>The Provincial Office is compliant to APCPI = <i>10</i></ul>
                                            <ul>The Provincial Office is not compliant to APCPI = <i>0</i></ul>
                                    </span>
                                </div>
                            <td class="align-top"><input type="text" name="textbox" id="textbox" class="textbox" placeholder="Score"></td>
                            <td class="align-top"><input type="file" name="fileUpload" id="fileUpload"><br>
                                <ul><i>*PO's FY 2023 Agency Procurement Compliance Performance <br>Indicator (APCPI) reports submitted within set deadlines (copy of email to GPPB)<br>
                                    - Acknowledgment email from GPBB
                                    </ul>
                            </td>
                            <td class="align-top"><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td class="align-top"><textarea name="comments" id="comments" class="comments"></textarea></td>
                            </td>
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
