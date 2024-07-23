<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOEA Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: hsl(0, 0%, 97%) !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        content {
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hidden {
            display: none;
        }
        table {
            width: 100%;
            border-collapse: collapse; /* This removes the space between table cells */
        }

        /* Style for table header (th) */
        th {
            border: 1px solid #000; /* Black border with 1px thickness */
            padding: 1px;
            text-align: left;
            background-color: #ffffff; /* Light gray background for headers */
        }

        /* Style for table data (td) */
        td {
            border: 1px solid #000; /* Light gray border with 1px thickness */
            padding: 1px;
        }

        .legend {
            display: flex;
            justify-content: flex-start;
            margin-top: 20px;
            margin-bottom: 1px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-color {
            width: 15px;
            height: 15px;
            margin-right: 8px;
        }
    </style>
</head>
<body>
        @include('components.externalEvaluatorSB', [
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])

<div class="ml-4 p-2">
    <div class="flex justify-between items-center w-full p-2">
        <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST REGIONAL OFFICE</h1> 
        <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
    </div>
    
    <div class="flex items-center justify-center">
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-a" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria A</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-b" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria B</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-c" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria C</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-d" class="h-full w-full flex items-center justify-center">
                <span class="text-white font-bold text-xs">Criteria D</span>
            </a>
        </div>
        <div class="h-0.5 w-48 bg-gray-500"></div>
        <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
            <a href="/ev-bro-evaluation-e" class="h-full w-full flex items-center justify-center">
                <span class="text-gray-200 font-bold text-xs">Criteria E</span>
            </a>
        </div>
      </div>


    
      
      
    <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
        <div id="evaluated" class="tab-content">
            <table id="regionTable" class="mx-auto">
                <thead class="bg-blue-300 text-sm">
                    <tr>
                        <th class="border border-gray-300 p-2 w-52">Category</th>
                        <th class="border border-gray-300 p-2 w-32">Means of Verification</th>
                        <th class="border border-gray-300 p-2 w-24">View Attachment</th>
                        <th class="border border-gray-300 p-2 w-10">Secretariat Rating</th>
                        <th class="border border-gray-300 p-2 w-32">Remarks</th>
                        <th class="border border-gray-300 p-2 w-4">External Validator Rating</th>
                        <th class="border border-gray-300 p-2 w-32">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>E. Social Marketing and Advocacy</td>
                        <td></td>
                        <td><p class="small mb-1" style="font-size: 10px;">Means of Verification: Communication plan Write-ups (best practices/activity reports)<br>Radio programsSocial media posts and shares<br>Local Media engagements (blasted PRs, Interviews)<br> Summary of accomplishments (write-ups, radio/tv guestings, social media posts, shares; local media engagements)</p></td>
                        <td></td>
                        <td></td>
                        <td><select class="form-control mb-1 score-dropdown" name="rd1_final_score" type="text" placeholder="Input your initial score" required>
                                        <option value="">Select score</option>
                                        <option value="60">50 - A Communication Plan was prepared and fully implemented.</option>
                                        <option value="30">30 - No Communication Plan was prepared but activities were fully implemented.</option>
                                        <option value="0">0 - No Communication Plan was prepared and not all communications activities were implemented</option>
                                    </select></td>
                        <td><input class="form-control mb-1" name="rd1_remarks" type="text" placeholder="Remarks"></td>
                    </tr>
                        
                    <tr>
                        <td class="p-4"><b>Total Initial Score</b></td>
                        <td class="p-4"></td>
                        <td class="p-4"></td>
                        <td class="p-4"><b>Total Re-Evaluated Score</b></td>
                        <td class="p-4"><b>Final Score:</b></td>
                        <td class="p-4"><b>ROMD Evaluated Score</b>: <span id="totalScore">0</span></td>
                        <td class="p-4"></td>
                    </tr>

                </tbody>
                </table>

        </div>
    </div>
                
            


    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
