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
        @include('components.externalEvaluatorSB', [
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-4 p-2">
            <div class="flex justify-between items-center w-full p-2">
                <div class="flex items-center space-x-2">
                    <button id="backButton" class="text-gray-600 font-bold rounded flex items-center space-x-1">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <a class="text-xl" href="/external/ti"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <a class="text-xl" href="/external/ti">Back</a>
                    </button>
                    <h1 class="text-gray-800 font-bold text-3xl">BEST TRAINING INSTITUTION-PTC - {{$nominee}}</h1> 
                </div>
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
              <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                  <a href="{{ route('external.ti-ptc-c', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                      <span class="text-gray-200 font-bold text-xs">Criteria C</span>
                  </a>
              </div>
              <div class="h-0.5 w-48 bg-gray-500"></div>
              <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                  <a href="{{ route('external.ti-ptc-d', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                      <span class="text-white font-bold text-xs">Criteria D</span>
                  </a>
              </div>
              <div class="h-0.5 w-48 bg-gray-500"></div>
              <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer hover:bg-blue-300 transition duration-300 ease-in-out">
                  <a href="{{ route('external.ti-ptc-e', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                      <span class="text-white font-bold text-xs">Criteria E</span>
                  </a>
              </div>
          </div>
              
          <form id="saveChangesForm" method="POST" action="{{ route('storePtcC') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user_id }}">
              
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
                        <!-- BEST TI CRITERIA C -->
                        {{-- ['RTC-STC', 'TAS', 'PTC'] --}}
                        <tr>
                            <td class="pb-8"><b>Administrative and Support Services</b></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.1. Budget Utilization Rate (BUR)</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: Monitoring logbook/ registry)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc1_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc1_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c1" data-field="c1">
                                    <option value="">Select score</option>
                                    <option value="25" {{ (isset($previousData->c1) && $previousData->c1 == 25) ? 'selected' : '' }}>25 - 100% of budget utilized</option>
                                    <option value="10" {{ (isset($previousData->c1) && $previousData->c1 == 10) ? 'selected' : '' }}>10 - 90% - 99% of budget utilized</option>
                                    <option value="5" {{ (isset($previousData->c1) && $previousData->c1 == 5) ? 'selected' : '' }}>5 - 89% and below of budget utilized</option>
                                    <option value="0" {{ (isset($previousData->c1) && $previousData->c1 == 0) ? 'selected' : '' }}>0 - 79% and below of budget utilized</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c1_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c1_remarks) ? $previousData->c1_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.2. Implementation of Agency Action Plan and Status of Implementation (AAPSI) on the Prior Years Audit Recommendation 80% acted upon (either partially or fully implemented)</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: Agency Action Plan and Status of Implementation (AAPSI))</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc2_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc2_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c2" data-field="c2">
                                    <option value="">Select score</option>
                                    <option value="25" {{ (isset($previousData->c2) && $previousData->c2 == 25) ? 'selected' : '' }}>25 - 100% acted upon (either partially or fully implemented)</option>
                                    <option value="15" {{ (isset($previousData->c2) && $previousData->c2 == 15) ? 'selected' : '' }}>15 - 90% - 99% acted upon (either partially or fully implemented)</option>
                                    <option value="5" {{ (isset($previousData->c2) && $previousData->c2 == 5) ? 'selected' : '' }}>5 - 80% - 89% acted upon (either partially or fully implemented)</option>
                                    <option value="0" {{ (isset($previousData->c2) && $previousData->c2 == 0) ? 'selected' : '' }}>0 - 79% and below acted upon (either partially or fully implemented)</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c2_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c2_remarks) ? $previousData->c2_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8"><b>C.3. Staff Development Program</b></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.3.1 Staff Development Program: Employees who have attended SDP have implemented their RE-Entry Plans as scheduled</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: List of Personnel in 2023, Certificates of trainings attended, REAPs)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc31_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc31_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c31" data-field="c31">
                                    <option value="">Select score</option>
                                    <option value="20" {{ (isset($previousData->c31) && $previousData->c31 == 20) ? 'selected' : '' }}>20 - 100% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                    <option value="10" {{ (isset($previousData->c31) && $previousData->c31 == 10) ? 'selected' : '' }}>10 - 75%- 99% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                    <option value="0" {{ (isset($previousData->c31) && $previousData->c31 == 0) ? 'selected' : '' }}>0 - Below 75% of Employees who attended SDP have implemented their Re-Entry Plans as scheduled</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c31_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c31_remarks) ? $previousData->c31_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.3.2. Staff Development Program: Training Opportunities to staff provided for CY 2023</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: List of plantilla positions of the TTI, Certificates of training attended)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc32_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc32_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c32" data-field="c32">
                                    <option value="">Select score</option>
                                    <option value="15" {{ (isset($previousData->c32) && $previousData->c32 ==15) ? 'selected' : '' }}>15 - 100% of Employees were provided with training opportunities</option>
                                    <option value="8" {{ (isset($previousData->c32) && $previousData->c32 == 8) ? 'selected' : '' }}>8 - 75%-99% of Employees were provided with training opportunities</option>
                                    <option value="0" {{ (isset($previousData->c32) && $previousData->c32 == 0) ? 'selected' : '' }}>0 - 74% and below of Employees were provided with training opportunities</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c32_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c32_remarks) ? $previousData->c32_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8"><b>C.4. Model Employee Awards</b></td>
                        </tr>
                        <tr>
                            <td class="pb-8"><b>C.4.1. Model Employee for Category I Position</b></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.4.1.1. Participation</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc411_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc411_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c411" data-field="c411">
                                    <option value="">Select score</option>
                                    <option value="4" {{ (isset($previousData->c411) && $previousData->c411 == 4) ? 'selected' : '' }}>4 - The TTI submitted nominees for Category I</option>
                                    <option value="0" {{ (isset($previousData->c411) && $previousData->c411 == 0) ? 'selected' : '' }}>0 - The TTI did not submit nominees for Category I</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c411_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c411_remarks) ? $previousData->c411_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.4.1.2. Awards received</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc412_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc412_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c412" data-field="c412">
                                    <option value="">Select score</option>
                                    <option value="4" {{ (isset($previousData->c412) && $previousData->c412 == 4) ? 'selected' : '' }}>4 - The TTI has received recognition/award at national level</option>
                                    <option value="0" {{ (isset($previousData->c412) && $previousData->c412 == 0) ? 'selected' : '' }}>0 - The TTI did not receive award/recognition at national level</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c412_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c412_remarks) ? $previousData->c412_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8"><b>C.4.2. Model Employee for Category II Position</b></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.4.2.1. Participation</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc421_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc421_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c421" data-field="c421">
                                    <option value="">Select score</option>
                                    <option value="4" {{ (isset($previousData->c421) && $previousData->c421 == 4) ? 'selected' : '' }}>4 - The TTI submitted nominees for Category II</option>
                                    <option value="0" {{ (isset($previousData->c421) && $previousData->c421 == 0) ? 'selected' : '' }}>0 - The TTI did not submit nominees for Category II</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c421_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c421_remarks) ? $previousData->c421_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.4.2.2. Awards Received</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc422_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc422_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c422" data-field="c422">
                                    <option value="">Select score</option>
                                    <option value="4" {{ (isset($previousData->c422) && $previousData->c422 == 4) ? 'selected' : '' }}>4 - The TTI has received recognition/award at national level</option>
                                    <option value="0" {{ (isset($previousData->c422) && $previousData->c422 == 0) ? 'selected' : '' }}>0 - The TTI did not receive award/recognition at national level</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c422_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c422_remarks) ? $previousData->c422_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8"><b>C.4.3. Model Employee for Category III Position</b></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.4.3.1. Participation</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc431_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc431_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c431" data-field="c431">
                                    <option value="">Select score</option>
                                    <option value="4" {{ (isset($previousData->c431) && $previousData->c431 == 4) ? 'selected' : '' }}>4 - The TTI submitted nominees for Category III</option>
                                    <option value="0" {{ (isset($previousData->c431) && $previousData->c431 == 0) ? 'selected' : '' }}>0 - The TTI did not submit nominees for Category III</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c431_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c431_remarks) ? $previousData->c431_remarks : '' }}"></td>
                        </tr>
                        <tr>
                            <td class="pb-8">C.4.3.2. Awards Received</td>
                            <td class="pb-8"><span class="small" style="font-size: 12px;">(Means of Verification: List of nominees and awardees from HRMD/AS)</span></td>
                            <td class="pb-8">@if ($user_id == 198)
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
                                @endif</td>
                            <td class="pb-4 text-center">{{$data->rc432_final_score}}</td>
                            <td class="pb-4 text-center">{{$data->rc432_remarks}}</td>
                            <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="c432" data-field="c432">
                                    <option value="">Select score</option>
                                    <option value="5" {{ (isset($previousData->c432) && $previousData->c432 == 5) ? 'selected' : '' }}>5 - The TTI has received recognition/award at national level</option>
                                    <option value="0" {{ (isset($previousData->c432) && $previousData->c432 == 0) ? 'selected' : '' }}>0 - The TTI did not receive award/recognition at national level</option>
                                </select></td>
                            <td class="pb-8"><input class="form-control mb-1" name="c432_remarks" type="text" placeholder="Remarks" value="{{ isset($previousData->c432_remarks) ? $previousData->c432_remarks : '' }}"></td>
                        </tr>
                
                        <tr>
                            <td style="padding: 15px;"><b>Total Initial Score</b></td>
                            <td style="padding: 15px;"></td>
                            <td style="padding: 15px;"></td>
                            <td style="padding: 15px;" class="text-center">{{$data->total_rfinal_score}}</td>
                            <td style="padding: 15px;"><b>Final Score: </b></td>
                            <td style="padding: 15px;"> <span name="a1" data-field="a1">0</span></td>
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