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
            
            <div class="flex items-center justify-center ml-6">
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
              <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                  <a href="{{ route('external.ti-ptc-d', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                      <span class="text-gray-200 font-bold text-xs">Criteria D</span>
                  </a>
              </div>
              <div class="h-0.5 w-48 bg-gray-500"></div>
              <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                  <a href="{{ route('external.ti-ptc-e', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                      <span class="text-white font-bold text-xs">Criteria E</span>
                  </a>
              </div>
          </div>
          
          <form id="saveChangesForm" method="POST" action="{{ route('storePtcD') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
            <div class="content bg-white shadow-md min-h-50 p-4 mt-4 overflow-x-auto">
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
                
                        <!-- BEST TI CRITERIA D -->
                        <tr>
                            <td><b>Reporting Efficiency</b></td>
                        </tr>
                        <tr>
                            <td>D.1. Reporting Efficiency</td>
                            <td></td>
                            <td>
                                @if ($user_id == 198)
                                    <a href="https://tesda-toea.com/users/Best_TI/PTC/TESDA-NavotaAs Training Institute (TNTI)/Criteria_A/Certification of no complaints.pdf" 
                                       target="_blank"
                                       class="text-blue-500 text-sm hover:underline">
                                        https://tesda-toea.com/users/Best_TI/PTC/TESDA-NavotaAs Training Institute (TNTI)/Criteria_A/Certification of no complaints.pdf
                                    </a>
                                @elseif ($user_id == 109)
                                    <a href="https://tesda-toea.com/users/Best_TI/PTC/TESDA-NavotaAs Training Institute (TNTI)/Criteria_A/Certification of no complaints 2.pdf" 
                                       target="_blank"
                                       class="text-blue-500 text-sm hover:underline">
                                        https://tesda-toea.com/users/Best_TI/PTC/TESDA-NavotaAs Training Institute (TNTI)/Criteria_A/Certification of no complaints 2.pdf
                                    </a>
                                @elseif ($user_id == 98)
                                    <a href="https://tesda-toea.com/users/Best_TI/PTC/TESDA-NavotaAs Training Institute (TNTI)/Criteria_A/CUSAT JAN-DEC 2023.pdf" 
                                       target="_blank"
                                       class="text-blue-500 text-sm hover:underline">
                                        https://tesda-toea.com/users/Best_TI/PTC/TESDA-NavotaAs Training Institute (TNTI)/Criteria_A/CUSAT JAN-DEC 2023.pdf
                                    </a>
                                @else
                                    <span>No File available</span>
                                @endif
                            </td>
                            <td class="pb-4 text-center">{{$data->rd1_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rd1_remarks}}</td>
                            <td><select class="form-control mb-1 score-dropdown" name="d1" data-field="d1">
                                <option value="">Select score</option>
                                <option value="50" {{ (isset($previousData->d1) && $previousData->d1 == 50) ? 'selected' : '' }}>50 - Reports are accurate and submitted consistently and on time</option>
                                <option value="25" {{ (isset($previousData->d1) && $previousData->d1 == 25) ? 'selected' : '' }}>25 - Reports are accurate and submitted consistently but not on time</option>
                                <option value="0" {{ (isset($previousData->d1) && $previousData->d1 == 0) ? 'selected' : '' }}>0 - Reports are not accurate and are not submitted on time</option>
                            </select></td>
                            <td><input class="form-control mb-1" name="d1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->d1_remarks) ? $previousData->d1_remarks : '' }}"></td>
                        </tr>
                
                        <tr>
                            <td style="padding: 15px;"><b>Total Initial Score</b></td>
                            <td style="padding: 15px;"></td>
                            <td style="padding: 15px;"></td>
                            <td style="padding: 15px;" class="text-center">{{$data->total_rfinal_score}}</td>
                            <td style="padding: 15px;"><b>Final Score: </b></td>
                            <td style="padding: 15px;"> <span id="totalScore">0</span></td>
                            <td class="pb-4"><button class="btn btn-primary" id="submitButton">Submit</button></td>
                        </tr>
                    </tbody>
                </table>
                </div>

                    </div>
                </form>
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