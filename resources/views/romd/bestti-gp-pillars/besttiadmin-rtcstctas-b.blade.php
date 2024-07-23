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
                <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST TRAINING INSTITUTION-RTC/STC - {{$nominee}}</h1> 
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>
            
            <div class="flex items-center justify-center ml-6">
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.ti-a', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria A</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.ti-b', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-gray-200 font-bold text-xs">Criteria B</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.ti-c', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria C</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.ti-d', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria D</span>
                    </a>
                </div>
                <div class="h-0.5 w-48 bg-gray-500"></div>
                <div class="relative h-8 px-4 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer transition hover:bg-blue-300">
                    <a href="{{ route('external.ti-e', ['id' => $user_id]) }}" class="h-full w-full flex items-center justify-center">
                        <span class="text-white font-bold text-xs">Criteria E</span>
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
                                <td class="pb-8"><b class="text-sm">B.1. Provide Quality Technical Education and Skills Development and Certification for Global Competitiveness</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8" class="text-sm">B.1.A Implementation of recognized/aligned PQF level 4 or Level 5 programs</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Certificates of Recognition for PQF Level 4 or Level 5 with list of enrollees) </p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb1a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1a_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb1a_final_score" type="text" placeholder="Input your initial score" required>
                                    <option value="">Select score</option>
                                    <option value="18">18 - The TTI has implemented at least 2 recognized/aligned with PQF level 4 or level 5 programs</option>
                                    <option value="9">9 - The TTI has implemented 1 recognized/aligned with PQF level 4 or level 5 program</option>
                                    <option value="0">0 - The TTI has not implemented any recognized/aligned with PQF level nor level 5 program</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb1a_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8" class="text-sm">B.1.B. Development of CS and CBC on Diploma program, integrating STEM/21st Century Skills</td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb1b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1b_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb1b_final_score" type="text" placeholder="Input your initial score" required>
                                    <option value="">Select score</option>
                                    <option value="7">7 - The TTI has developed at least 1 CS or CBC on Diploma Program with integrated STEM/21st Century Skills</option>
                                    <option value="0">0 - No Communication Plan was prepared and not all communications activities were implemented</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb1b_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b class="text-sm">B.1.C. Participation and Awards from Skills Competition</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8" class="text-sm">B.1.C.1. Participation</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Terminal Reports/After Activity reports</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb1c1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1c1_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb1c1_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="6">6 - The TTI participated in all competitions (PNSC, and ASC or World Skills Competition)</option>
                                    <option value="3">3 - The TTI participated in PNSC</option>
                                    <option value="0">0 - The TTI did not participate in any of the competition</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb1c1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.1.C.2. Awards received at the national level</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb1c2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1c2_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb1c2_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI received award/recognition at the national level</option>
                                    <option value="0">0 - The TTI did not receive award/recognition</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb1c2_remarks" type="text" placeholder="Remarks"></td>           
                            </tr>
                            <tr>
                                <td class="pb-8">B.1.C.3 Awards received at the international level</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received (plaque or medal)</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb1c3_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1c3_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb1c3_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI received award/recognition at the international level</option>
                                    <option value="0">0 - The TTI did not receive award/recognition</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb1c3_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.1.D Advancement through Innovations and Researches</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.1.D.1. Development of policy or technology research proposals</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Copy of memo/email submitting its Technology Research/es</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb1d1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb1d1_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb1d1_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI has submitted a technology research</option>
                                    <option value="0">0 - The TTI has not submitted a technology research</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb1d1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.2. Intensify Implementation of Quality Technical Education and Skills Development and Certification For Social Equity and Poverty Reduction</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.A. UAQTEA Scholarship Program</td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2a_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2a_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="15">15 - TTI fully implemented UAQTEA Program (Qualification Maps)</option>
                                    <option value="0">0 - TTI did not fully implement UAQTEA Program (Qualification Maps)</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2a_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.B. Skills Training for Drug Dependents</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2b_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2b_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="6">6 - The TTI has at least 5 programs conducted</option>
                                    <option value="0">0 - The TTI has less than 5 programs conducted</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2b_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.C. Skills Training for Inmates and their Families</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2c_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2c_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2c_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="6">6 - The TTI has at least 2 programs conducted</option>
                                    <option value="0">0 - The TTI has less than 2 programs conducted</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2c_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.D. Special Skills Programs for IPs</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2d_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2d_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2d_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="6">6 - The TTI has at least 2 programs conducted</option>
                                    <option value="0">0 - The TTI has less than 2 programs conducted</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2d_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.E. Expanded Training Program for Women and PWDs</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2e_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2e_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2e_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="6">6 - The TTI has at least 2 programs conducted</option>
                                    <option value="0">0 - The TTI has less than 2 programs conducted</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2e_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.F. Re-skilling/Upskilling of OFWs</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2f_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2f_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2f_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI has at least two (2) programs conducted</option>
                                    <option value="0">0 - The TTI has less than two (2) programs conducted</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2f_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.G. Others</td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2g_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2g_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2g_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="30">30 - The accomplishment rate based on set target is at 100% and above</option>
                                    <option value="20">20 - The accomplishment rate based on set target is 75% - 99.99%</option>
                                    <option value="0">0 - The accomplishment rate based on set target is 50% - 74.99%</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2g_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.H. Graduates of TTI - Enterprise-based</td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2h_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2h_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2h_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="30">30 - The accomplishment rate based on set target is at 100% and above</option>
                                    <option value="20">20 - The accomplishment rate based on set target is 75% - 99.99%</option>
                                    <option value="0">0 - The accomplishment rate based on set target is 50% - 74.99%</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2h_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.I. Graduates of TTI - Community-based/MTP</td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2i_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2i_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2i_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="30">30 - The accomplishment rate based on set target is at 100% and above</option>
                                    <option value="20">20 - The accomplishment rate based on set target is 75% - 99.99%</option>
                                    <option value="0">0 - The accomplishment rate based on set target is 50% - 74.99%</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2i_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.2.J. Communications/programs/advocacy on Gender and Development</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: After activity report on GAD related programs</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb2j_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb2j_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb2j_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="7">7 - The TTI has conducted programs/activities related to GAD</option>
                                    <option value="0">0 - The TTI has not conducted programs/activities related to GAD</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb2j_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.3. Upscale Technical Education and Skills Development and Certification to Higher PQF Levels</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.3.A. TVET Trainers Development Programs - TM Level II</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: TM II Certification</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb3a_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb3a_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb3a_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI had at least one (1) certified trainer in TM Level II (any CoCs)</option>
                                    <option value="0">0 - The TTI does not have certified Trainer in TM Level II (any CoCs)</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb3a_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.3.B. TVET Trainers Development Programs - Industry Immersion</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: IWER Certification</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb3b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb3b_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb3b_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI had sent at least 2 trainers for industry immersion</option>
                                    <option value="0">0 - The TTI had not sent trainers for industry immersion</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb3b_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.3.C. Percentage of TTI Trainers are Accredited National Competency Assessors</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: List of Trainers<br>NTTCs</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb3c_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb3c_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb3c_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="15">15 - 70% of the TTI trainers are accredited National Competency Assessors</option>
                                    <option value="10">10 - 50-69.99% of the TTI trainers are accredited National Competency Assessors</option>
                                    <option value="0">0 - 49.99% and below of the TTI trainers are accredited National Competency Assessors</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb3c_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.3.D. Percentage of TTI's registered programs (WTR) with Accredited Assessment Center</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Copies of CTPRs <br>List of Registered Programs <br>List of Accredited ACs <br></p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb3d_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb3d_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb3d_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="15">15 - 50% of the TTI's registered programs with Accredited Assessment Center</option>
                                    <option value="10">10 - 30-49.99% of the TTI's registered programs with Accredited Assessment Center</option>
                                    <option value="0">0 - 29.99% and below of the TTI's registered programs with Accredited Assessment Center</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb3d_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.3.E. Percentage of TTI Graduates in WTR Programs assessed</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: RWAC</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb3e_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb3e_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb3e_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="25">25 - 100% of the TTI graduates assessed</option>
                                    <option value="15">15 - 75% - 99.99% of the TTI graduates assessed</option>
                                    <option value="10">10 - 50% - 74.99% of the TTI graduates assessed</option>
                                    <option value="5">5 - 25% - 49.99% of the TTI graduates assessed</option>
                                    <option value="0">0 - 24.99% and below of the TTI graduates assessed</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb3e_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.3.F. Percentage of graduates in programs with training regulations assessed, certified</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: RWAC</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb3f_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb3f_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb3f_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="15">15 - 85% and above of the TTI graduates assessed, certified</option>
                                    <option value="10">10 - 75% - 84.99% of the TTI graduates assessed, certified</option>
                                    <option value="0">0 - 50% - 74.99% of the TTI graduates assessed, certified</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb3f_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.4. Expand and Intensify Partnerships and Linkages with Industries and Other Stakeholders in the Area of TESD</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.4.A Career Guidance Program</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.A.1. Implementation Profiling</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring/Summary of profiled learners</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4a1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4a1_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4a1_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="15">15 - 100% of TTI enrollees profiled</option>
                                    <option value="10">10 - 75% - 99.99% of TTI enrollees profiled</option>
                                    <option value="5">5 - 50% - 74.99% of TTI enrollees profiled</option>
                                    <option value="0">0 - 49.99% and below of TTI enrollees profiled</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4a1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.A.2. Referred Graduates for Possible Employment</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of recommendation for all TTI graduates</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4a2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4a2_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4a2_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="15">15 - 100% of TTI graduates referred</option>
                                    <option value="10">10 - 75% - 99.99% of TTI graduates referred</option>
                                    <option value="5">5 - 50% - 74.99% of TTI graduates referred</option>
                                    <option value="0">0 - 49.99% and below of TTI graduates referred</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4a2_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.B. Participation in WCOs</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: After Activity Report</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4b_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4b_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4b_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI participated in the Provincial or Regional WCOs</option>
                                    <option value="0">0 - The TTI did not participate in the Provincial nor Regional WCOs</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4b_remarks" type="text" placeholder="Remarks"></td>    
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.C. Preparation of Institutional Development Plan (IDP)</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Signed IDP</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4c_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4c_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4c_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="15">15 - The TTI prepared and submitted its IDP to CO through the RO/PO</option>
                                    <option value="0">0 - The TTI has not submitted its IDP</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4c_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.D. Implementation of Institutional Development Plan (IDP)</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: FY 2023 Analysis of IDP Programs implemented and IDP Report</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4d_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4d_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4d_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="15">15 - 100% of the target activities has been implemented</option>
                                    <option value="7">7 - 85% to 99% of the activities has been implemented</option>
                                    <option value="0">0 - Below 85% of the Plan has been implemented</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4d_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.4.E. TTI Advisory Council Engagements</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.E.1. Submission of TAC Annual Accomplishment Report</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Submitted TAC Annual Accomplishment Report</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4e1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4e1_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4e1_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI has submitted their TAC Annual accomplishment report</option>
                                    <option value="0">0 - The TTI has not submitted their TAC Annual accomplishment report</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4e1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.E.2. TTI Advisory Council meetings conducted</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Minutes of the meeting</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4e2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4e2_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4e2_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="5">5 - The TTI Advisory Council conducted quarterly meetings</option>
                                    <option value="0">0 - The TTI Advisory Council has not completed the quarterly meetings for the year 2023</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4e2_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.E.3. TTI Advisory Council resolutions approved</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Approved resolutions submitted to NITESD (part of the TAC Annual Accomplishment Report)</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4e3_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4e3_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4e3_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="5">5 - The TTI Advisory Council has submitted at least four approved resolutions</option>
                                    <option value="0">0 - The TTI Advisory Council has submitted less than four approved resolutions</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4e3_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.4.F. Partnerships forged and implemented (The max. score conferred to the applicant must not exceed 30 points)</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Copies of signed MOAs</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb4f_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb4f_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb4f_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="25">25 - The Dual Training System (DTS) or Dual Training Program (DTP) is implemented</option>
                                    <option value="18">18 - Curriculum of TTI program offering reviewed and updated to current technology and industry practices standards</option>
                                    <option value="10">10 - TTI trainers undergone industry immersion with partner companies/enterprises</option>
                                    <option value="0">0 - The Dual Training System (DTS) or Dual Training Program (DTP) is not implemented</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb4f_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.5. Streamline and Intensify QMS in All Organizational Subsystems</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.5.A Institutional Awards - Tagsanay Awards</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.A.1. Participation</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Endorsement Memo, TESDA Order</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5a1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5a1_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5a1_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="20">20 - The TTI participated in the National Level Tagsanay Awards</option>
                                    <option value="0">0 - The TTI did not participate in in the National Tagsanay Awards</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5a1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.A.2. Awards received</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5a2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5a2_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5a2_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="40">40 - The TTI received major award (top 3) at the national level</option>
                                    <option value="20">20 - The TTI received minor (top 8)/special award/recognition at the national level</option>
                                    <option value="0">0 - The TTI did not receive award/recognition at the national level</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5a2_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.5.B. Accreditation Awards (STAR Program, APACC)</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.5.B.1. Asia Pacific Accreditation and Certification Commission (APACC)</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.B.1.1. Participation</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Self Study Report submitted to APACC with letter and evidence</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5b1_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5b1_1_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5b1_1_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI applied for APACC accreditation</option>
                                    <option value="0">0 - TThe TTI did not apply for APACC accreditation</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5b1_1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.B.1.2. Awards received</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Certificate of Accreditation</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5b1_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5b1_2_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5b1_2_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="20">20 - The TTI received APACC-Gold accreditation</option>
                                    <option value="10">10 - The TTI received APACC-Silver accreditation</option>
                                    <option value="5">5 - The TTI received APACC-Bronze accreditation</option>
                                    <option value="0">0 - The TTI did not receive APACC accreditation</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5b1_2_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.5.B.2. System for TVET Accreditation and Recognition (STAR) Program</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.B.2.1 Participation</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5b2_1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5b2_1_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5b2_1_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="10">10 - The TTI participated in STAR Program</option>
                                    <option value="0">0 - The TTI did not participate in STAR Program</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5b2_1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.B.2.2 Awards received</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received/ Letter of result signed by the Secretary</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5b2_2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5b2_2_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5b2_2_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="20">20 - The TTI received at least one THREE STAR Level Award</option>
                                    <option value="10">10 - The TTI received at least one TWO STAR Level Award</option>
                                    <option value="5">5 - The TTI received at least one ONE STAR Level Award</option>
                                    <option value="0">0 - The TTI did not receive a STAR Level Award</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5b2_2_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8"><b>B.5.C. TESDA Seal of Integrity</b></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                                <td class="pb-8"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.C.1. Participation</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Letter of Intent, Certificate of Eligibility (attended the CBP), Accomplished form (Evaluation Instrument), Memo to Certification Office </p> </td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5c1_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5c1_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5c1_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="8">8 - The TTI applied for the TESDA Seal of Integrity</option>
                                    <option value="0">0 - The TTI did not apply for TESDA Seal of Integrity</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5c1_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.C.2. Awards received</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Awards received</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5c2_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5c2_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5c2_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="12">12 - The TTI was awarded with the TESDA Seal of Integrity</option>
                                    <option value="0">0 - The TTI was not awarded with TESDA the Seal of Integrity</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5c2_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.D. Development of Procedures Manual</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Procedures manual developed</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5d_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5d_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5d_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="18">18 - The TTI has developed its Procedures Manual and has been approved by the NQM</option>
                                    <option value="0">0 - The TTI has no approved Procedures Manual</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5d_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8">B.5.E. Green Practices (100% implementation of plans and projects related to Green Practices)</td>
                                <td class="pb-8"><p class="small mb-1" style="font-size: 12px;">Means of Verification: Monitoring Reports, Articles, Research/ Project Proposals, Competency-based Curriculum (CBC), Program Offerings related to Agriculture, Institutional practices</p></td>
                                <td class="pb-8"></td>
                                <td class="pb-4 text-center">{{$data->rb5e_final_score}}</td>
                                <td class="pb-4 text-center">{{$data->rb5e_remarks}}</td>
                                <td class="pb-8"><select class="form-control mb-1 score-dropdown" name="rb5e_final_score" required>
                                    <option value="">Select score</option>
                                    <option value="20">20 - 100% implementation of plans and projects related to Green Practices</option>
                                    <option value="0">0 - Less 100% implementation of plans and projects related to Green Practices</option>
                                </select></td>
                                <td class="pb-8"><input class="form-control mb-1" name="rb5e_remarks" type="text" placeholder="Remarks"></td>
                            </tr>
                            <tr>
                                <td class="pb-8" style="padding: 15px;"><b>Total Initial Score</b></td>
                                <td class="pb-8" style="padding: 15px;"></td>
                                <td class="pb-8" style="padding: 15px;"></td>
                                <td class="pb-4 text-center">{{$data->total_rfinal_score}}</td>
                                <td class="pb-8" style="padding: 15px;"><b>Final Score: </b></td>
                                <td class="pb-8" style="padding: 15px;"><span id="totalScore">0</span></td>
                                <td class="pb-8" style="padding: 15px;"></td>
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