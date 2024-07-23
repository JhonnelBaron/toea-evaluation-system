<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ROMD Admin</title>
    <link rel="icon" href="{{ asset('img/toea-logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
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
<body>

    <div>
        @include('components.navbar', [
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-4 p-2">
          <div class="flex justify-between items-center w-full p-2">
            <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST TRAINING INSTITUTION-PTC - {{$nominee}}</h1>
            <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
        </div>
        
        <div class="flex items-center justify-center">
          <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
              <a href="{{ route('external.ti-ptc-a', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                  <span class="text-white font-bold text-xs">Criteria A</span>
              </a>
          </div>
          <div class="h-0.5 w-48 bg-gray-500"></div>
          <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
              <a href="{{ route('external.ti-ptc-b', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                  <span class="text-white font-bold text-xs">Criteria B</span>
              </a>
          </div>
          <div class="h-0.5 w-48 bg-gray-500"></div>
          <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
              <a href="{{ route('external.ti-ptc-c', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                  <span class="text-white font-bold text-xs">Criteria C</span>
              </a>
          </div>
          <div class="h-0.5 w-48 bg-gray-500"></div>
          <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
              <a href="{{ route('external.ti-ptc-d', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                  <span class="text-white font-bold text-xs">Criteria D</span>
              </a>
          </div>
          <div class="h-0.5 w-48 bg-gray-500"></div>
          <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
              <a href="{{ route('external.ti-ptc-e', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
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
                        <!-- GALING PROBINSYA / BEST TI CRITERIA E -->
                        {{-- 'RTC-STC', 'TAS', 'PTC' --}}
                
                        <tr>
                            <td><b>Social Marketing and Advocacy</b></td>
                        </tr>
                        <tr>
                            <td>E.1. Communication Program (OPCR)</td>
                            <td><p class="small mb-1" style="font-size: 12px;">Means of Verification: Communication plan <br>
                                Write-ups (best practices/activity reports) <br>
                                Radio/TV program<br>
                                Social media posts and shares<br>
                                Local Media engagements (blasted PRs, Interviews)<br>
                                Summary of accomplishments (write-ups, radio/tv guestings, social media posts, shares; local media engagements)</p>
                            </td>
                            <td></td>
                            <td class="pb-4 text-center">{{$data->re1_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->re1_remarks}}</td>
                            <td><select class="form-control mb-1 score-dropdown" name="re1_final_score" required>
                                <option value="">Select score</option>
                                <option value="50">50 - A Communication Plan was prepared and fully implemented</option>
                                <option value="30">30 - No Communication Plan was prepared but activities were fully implemented</option>
                                <option value="0">0 - No Communication Plan was prepared and not all communications activities were implemented</option>
                            </select></td>
                            <td><input class="form-control mb-1" name="re1_remarks" type="text" placeholder="Remarks"></td>
                        </tr>
                
                        <tr>
                            <td style="padding: 15px;"><b>Total Initial Score</b></td>
                            <td style="padding: 15px;"></td>
                            <td style="padding: 15px;"></td>
                            <td style="padding: 15px;" class="text-center">{{$data->total_rfinal_score}}</td>
                            <td style="padding: 15px;"><b>Final Score: </b></td>
                            <td style="padding: 15px;"> <span id="totalScore">0</span></td>
                            <td style="padding: 15px;"></td>
                        </tr>
                    </tbody>
                </table>
                

                    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function highlightStep(step) {
        // Remove previous active classes
        const steps = document.querySelectorAll('.flex > div');
        steps.forEach(s => s.classList.remove('bg-blue-200'));
    
        // Add active class to the clicked step
        const clickedStep = document.querySelector(`[onclick="highlightStep('${step}')"]`);
        clickedStep.classList.add('bg-blue-200');
        }
    </script>
    
</body>
</html>