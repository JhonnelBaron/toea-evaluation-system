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
        }
        .box-content {
            margin: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: "Times New Roman", Times, serif;
            flex-grow: 1;
            padding-left: 20px;
            margin-top: 100px; /* Adjust for the fixed header height */
            background-color: hsl(0, 0%, 97%);
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
            <h1>BEST TRAINING INSTITURION: STC</h1>
        </div>
        <div class="content">
            <div class="box-content">
                <table>
                    <thead>
                        <tr>
                            <th>Region</th>
                            <th>Operation Unit</th>
                            <th>Province</th>
                            <th>Date Submitted</th>
                            <th>Hard Copy</th>
                            <th>Action</th>
                            <th>Percentage</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CAR</td>
                            <td>PO</td>
                            <td>Nueva Ecija</td>
                            <td>06/07/2024</td>
                            <td><input type="checkbox"></td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td>Remarks Sample</td>
                        </tr>
                        <tr>
                            <td>CAR</td>
                            <td>PO</td>
                            <td>Nueva Ecija</td>
                            <td>06/07/2024</td>
                            <td><input type="checkbox"></td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td>Remarks Sample</td>
                        </tr>
                        <tr>
                            <td>CAR</td>
                            <td>PO</td>
                            <td>Nueva Ecija</td>
                            <td>06/07/2024</td>
                            <td><input type="checkbox"></td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td>Remarks Sample</td>
                        </tr>
                        <tr>
                            <td>CAR</td>
                            <td>PO</td>
                            <td>Nueva Ecija</td>
                            <td>06/07/2024</td>
                            <td><input type="checkbox"></td>
                            <td><button class="btn btn-primary btn-sm">Evaluate</button></td>
                            <td>Remarks Sample</td>
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