<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>TOEA Admin</title>
    <link rel="icon" href="{{ asset('img/toea-logo.png') }}" type="image/png">
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: fixed;
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

        body {
            background-color: hsl(0, 0%, 97%) !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .content {
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
            background-color: #f2f2f2; /* Light gray background for headers */
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
    <div>
        @include('components.navbar', [
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-4 p-2">
            <div class="flex justify-between items-center w-full p-2">
                <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST REGIONAL OFFICE</h1>
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>
            <div class="legend ml-7">
                <div class="legend-item">
                    <div class="legend-color small-region bg-red-300"></div>
                    <span>Small</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color medium-region bg-purple-200"></div>
                    <span>Medium</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color large-region bg-Mint"></div>
                    <span>Large</span>
                </div>
            </div>

            <div class="mx-auto flex flex-wrap">
                <div class="ml-8 flex items-center"> <!-- Adjust ml-8 if needed -->
                    <label for="categoryFilter" class="text-black mr-2">Category:</label>
                    <select id="categoryFilter" class="rounded-md px-2 py-1 bg-gray-300 text-gray-800">
                        <option value="all">All</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
            
                <div class="flex-grow flex items-center justify-center" style="margin-right: 12rem;"> <!-- Adjust this value to move the tabs to the left -->
                    <ul class="flex">
                        <li class="tab">
                            <a href="{{ route('romd.progress') }}" data-tab="submission" class="tab-link p-4 text-black">Progress</a>
                        </li>
                        <li class="tab">
                            <a href="{{ route('romd.ranking') }}" data-tab="evaluated" class="tab-link p-4 text-black border-b-2 border-black"><b>Ranking</b></a>
                        </li>
                        <li class="tab">
                            <a href="#" data-tab="endorsed" class="tab-link p-4 text-black">Endorsed</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
                <div id="evaluated" class="tab-content">
                    <table id="regionTable" class="mx-auto">
                        <thead class="bg-blue-300 text-sm">
                            <tr>
                                {{-- <th class="bg-TiffanyBlue">No.</th> --}}
                                <th class="px-6 py-3 bg-TiffanyBlue">Rank</th>
                                <th class="px-2 py-2 bg-TiffanyBlue">Region</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Grouping</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Total Score</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Progress</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Endorsed</th>
                                {{-- <th class="px-6 py-3 bg-TiffanyBlue">Remarks</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                             <!-- Small Regions -->
                             {{-- @php $smallCount = 1; @endphp --}}
                             {{-- @foreach ($smallRegions as $index => $region) --}}
                              @foreach ($sortedSmallRegions as $index => $region)
                             <tr class="region-row small bg-red-200">
                                 {{-- <td class="px-2 py-2">{{ $smallCount++}}</td> --}}
                                 <td class="px-6 py-3">{{ $smallRank++ }}</td>
                                 <td class="px-6 py-3">{{  $region->region_name === 'Region XIII' ? 'CARAGA' : str_replace('Region ', '',$region->region_name) }}</td>
                                 <td class="px-6 py-3">Small</td>
                                 <td class="px-6 py-3">
                                    @php
                                    $totalScore = $totalScorePerRegion[$region->id]['adminService'] + 
                                                  $totalScorePerRegion[$region->id]['legalDivision'] + 
                                                  $totalScorePerRegion[$region->id]['certificationOffice'] + 
                                                  $totalScorePerRegion[$region->id]['fms'] + 
                                                  $totalScorePerRegion[$region->id]['nitesd'] + 
                                                  $totalScorePerRegion[$region->id]['piad'] + 
                                                  $totalScorePerRegion[$region->id]['planningOffice'] + 
                                                  $totalScorePerRegion[$region->id]['plo'] + 
                                                  $totalScorePerRegion[$region->id]['romo'] + 
                                                  $totalScorePerRegion[$region->id]['icto'] +
                                                  $totalScorePerRegion[$region->id]['ws'];
                                    
                                    if ($region->region_name === 'CAR') {
                                        $totalScore = ($totalScore - 450) + 60;
                                    } elseif ($region->region_name === 'Region II') {
                                        $totalScore = ($totalScore - 450) + 60;
                                    } elseif ($region->region_name === 'Region IV-B') {
                                        $totalScore = ($totalScore - 360) + 30;
                                    } elseif ($region->region_name === 'Region VIII') {
                                        $totalScore = ($totalScore - 450) + 60;
                                    } elseif ($region->region_name === 'Region IX') {
                                        $totalScore = ($totalScore - 420) + 30;
                                    } elseif ($region->region_name === 'Region XIII') {
                                        $totalScore = ($totalScore - 450) + 60;
                                    }
                                @endphp
                                {{ $totalScore }}
                                    {{-- {{ $totalScorePerRegion[$region->id]['adminService'] + 
                                    $totalScorePerRegion[$region->id]['legalDivision'] + 
                                    $totalScorePerRegion[$region->id]['certificationOffice'] + 
                                    $totalScorePerRegion[$region->id]['fms'] + 
                                    $totalScorePerRegion[$region->id]['nitesd'] + 
                                    $totalScorePerRegion[$region->id]['piad'] + 
                                    $totalScorePerRegion[$region->id]['planningOffice'] + 
                                    $totalScorePerRegion[$region->id]['plo'] + 
                                    $totalScorePerRegion[$region->id]['romo'] + 
                                    $totalScorePerRegion[$region->id]['icto'] +
                                    $totalScorePerRegion[$region->id]['ws'] }} --}}
                                 </td>
                                 <td class="px-6 py-3">
                                    @php
                                    $totalProgressSmall = collect([
                                        'adminService' => $adminService,
                                        'legalDivision' => $legalDivision,
                                        'certificationOffice' => $certificationOffice,
                                        'fms' => $fms,
                                        'nitesd' => $nitesd,
                                        'piad' => $piad,
                                        'planningOffice' => $planningOffice,
                                        'plo' => $plo,
                                        'romo' => $romo,
                                        'icto' => $icto,
                                        'ws' => $ws
                                    ])->sum(function($office) use ($region) {
                                        return $office->firstWhere('region_id', $region->id)->progress_percentage ?? 0;
                                    });
                                    $averageProgressSmall = $totalProgressSmall / 11; // Number of offices
                                @endphp
                                {{ round($averageProgressSmall, 2) }}%
                                </td>
                                <td class="px-6 py-3">
                                    {{-- <button class="bg-green-500 hover:bg-green-600 text-white py-1 px-4 rounded-md">Endorse</button> --}}
                                    @if(in_array($region->id, $checkEndorsed))
                                    <button type="button" class="btn btn-secondary btn-sm" disabled>Endorsed</button>
                                @else
                                     <button type="button" class="btn btn-primary btn-sm bg-green-600" onclick="toggleModal('saveChangesModal', {{$region->id}}, '{{ $region->region_name }}')">Endorse</button>
                                     @endif
                                 </td>
                                {{-- <td class="px-6 py-3">
                                    <input type="text" class="rounded-md px-2 py-1 bg-gray-100 text-gray-800 w-full" value="{{ $region->remarks ?? '' }}">
                                 </td> --}}
                             </tr>
                         @endforeach
                         <!-- Separator -->
                            {{-- <tr class="bg-TiffanyBlue">
                                <td class="px-1 py-1" colspan="6"></td>
                            </tr> --}}
                         <!-- Medium Regions -->
                         {{-- @php $mediumCount = 1; @endphp --}}
                         {{-- @foreach ($mediumRegions as $index => $region) --}}
                         @foreach ($sortedMediumRegions as $index => $region)
                             <tr class="region-row medium bg-purple-200">
                                 {{-- <td class="px-2 py-2">{{ $mediumCount++ }}</td> --}}
                                 <td class="px-6 py-3">{{ $mediumRank++ }}</td>
                                 <td class="px-6 py-3">{{ str_replace('Region ', '',$region->region_name) }}</td>
                                 <td class="px-6 py-3">Medium</td>
                                 <td class="px-6 py-3">
                                    @php
                                    $totalScore = $totalScorePerRegion[$region->id]['adminService'] + 
                                                  $totalScorePerRegion[$region->id]['legalDivision'] + 
                                                  $totalScorePerRegion[$region->id]['certificationOffice'] + 
                                                  $totalScorePerRegion[$region->id]['fms'] + 
                                                  $totalScorePerRegion[$region->id]['nitesd'] + 
                                                  $totalScorePerRegion[$region->id]['piad'] + 
                                                  $totalScorePerRegion[$region->id]['planningOffice'] + 
                                                  $totalScorePerRegion[$region->id]['plo'] + 
                                                  $totalScorePerRegion[$region->id]['romo'] + 
                                                  $totalScorePerRegion[$region->id]['icto'] +
                                                  $totalScorePerRegion[$region->id]['ws'];
                                    
                                    if ($region->region_name === 'Region I') {
                                        $totalScore = ($totalScore - 420) + 30;
                                    } elseif ($region->region_name === 'Region V') {
                                        $totalScore = ($totalScore - 360) + 30;
                                    } elseif ($region->region_name === 'Region VI') {
                                        $totalScore = ($totalScore - 390) + 30;
                                    } elseif ($region->region_name === 'Region X') {
                                        $totalScore = ($totalScore - 330) + 30;
                                    } elseif ($region->region_name === 'Region XI') {
                                        $totalScore = ($totalScore - 420) + 30;
                                    } elseif ($region->region_name === 'Region XII') {
                                        $totalScore = ($totalScore - 420) + 30;
                                    }
                                @endphp
                                {{ $totalScore }}
                                    {{-- {{ $totalScorePerRegion[$region->id]['adminService'] + 
                                    $totalScorePerRegion[$region->id]['legalDivision'] + 
                                    $totalScorePerRegion[$region->id]['certificationOffice'] + 
                                    $totalScorePerRegion[$region->id]['fms'] + 
                                    $totalScorePerRegion[$region->id]['nitesd'] + 
                                    $totalScorePerRegion[$region->id]['piad'] + 
                                    $totalScorePerRegion[$region->id]['planningOffice'] + 
                                    $totalScorePerRegion[$region->id]['plo'] + 
                                    $totalScorePerRegion[$region->id]['romo'] + 
                                    $totalScorePerRegion[$region->id]['icto'] +
                                    $totalScorePerRegion[$region->id]['ws'] }} --}}
                                 </td>
                                 <td class="px-6 py-3">
                                    @php
                                    $totalProgressMeidum = collect([
                                        'adminService' => $adminService,
                                        'legalDivision' => $legalDivision,
                                        'certificationOffice' => $certificationOffice,
                                        'fms' => $fms,
                                        'nitesd' => $nitesd,
                                        'piad' => $piad,
                                        'planningOffice' => $planningOffice,
                                        'plo' => $plo,
                                        'romo' => $romo,
                                        'icto' => $icto,
                                        'ws' => $ws
                                    ])->sum(function($office) use ($region) {
                                        return $office->firstWhere('region_id', $region->id)->progress_percentage ?? 0;
                                    });
                                    $averageProgressMeidum = $totalProgressMeidum / 11; // Number of offices
                                @endphp
                                {{ round($averageProgressMeidum, 2) }}%
                                 </td>
                                 <td class="px-6 py-3">
                                    @if(in_array($region->id, $checkEndorsed))
                                    <button type="button" class="btn btn-secondary btn-sm" disabled>Endorsed</button>
                                @else
                                    {{-- <button class="bg-green-500 hover:bg-green-600 text-white py-1 px-4 rounded-md">Endorse</button> --}}
                                    <button type="button" class="btn btn-primary btn-sm bg-green-600" onclick="toggleModal('saveChangesModal', {{$region->id}}, '{{ $region->region_name }}')">Endorse</button>
                                    @endif
                                 </td>
                                {{-- <td class="px-6 py-3">
                                    <input type="text" class="rounded-md px-2 py-1 bg-gray-100 text-gray-800 w-full" value="{{ $region->remarks ?? '' }}">
                                 </td> --}}
                             </tr>
                         @endforeach
                         <!-- Separator -->
                         {{-- <tr class="bg-TiffanyBlue">
                            <td class="px-1 py-1" colspan="6"></td>
                        </tr> --}}
                         <!-- Large Regions -->
                         {{-- @php $largeCount = 1; @endphp --}}
                         {{-- @foreach ($largeRegions as $index => $region) --}}
                         @foreach ($sortedLargeRegions as $index => $region)
                             <tr class="region-row large bg-Mint">
                                 {{-- <td class="px-2 py-2">{{ $largeCount++ }}</td> --}}
                                 <td class="px-6 py-3">{{ $largeRank++ }}</td>
                                 <td class="px-6 py-3">{{ str_replace('Region ', '',$region->region_name) }}</td>
                                 <td class="px-6 py-3">Large</td>
                                 <td class="px-6 py-3">
                                    {{-- {{ $totalScorePerRegion[$region->id]['adminService'] + 
                                    $totalScorePerRegion[$region->id]['legalDivision'] + 
                                    $totalScorePerRegion[$region->id]['certificationOffice'] + 
                                    $totalScorePerRegion[$region->id]['fms'] + 
                                    $totalScorePerRegion[$region->id]['nitesd'] + 
                                    $totalScorePerRegion[$region->id]['piad'] + 
                                    $totalScorePerRegion[$region->id]['planningOffice'] + 
                                    $totalScorePerRegion[$region->id]['plo'] + 
                                    $totalScorePerRegion[$region->id]['romo'] + 
                                    $totalScorePerRegion[$region->id]['icto'] +
                                    $totalScorePerRegion[$region->id]['ws'] }} --}}
                                    @php
                                    $totalScore = $totalScorePerRegion[$region->id]['adminService'] + 
                                                  $totalScorePerRegion[$region->id]['legalDivision'] + 
                                                  $totalScorePerRegion[$region->id]['certificationOffice'] + 
                                                  $totalScorePerRegion[$region->id]['fms'] + 
                                                  $totalScorePerRegion[$region->id]['nitesd'] + 
                                                  $totalScorePerRegion[$region->id]['piad'] + 
                                                  $totalScorePerRegion[$region->id]['planningOffice'] + 
                                                  $totalScorePerRegion[$region->id]['plo'] + 
                                                  $totalScorePerRegion[$region->id]['romo'] + 
                                                  $totalScorePerRegion[$region->id]['icto'] +
                                                  $totalScorePerRegion[$region->id]['ws'];
                                    
                                    if ($region->region_name === 'NCR') {
                                        $totalScore = ($totalScore - 450) + 60;
                                    } elseif ($region->region_name === 'Region III') {
                                        $totalScore = ($totalScore - 390) + 30;
                                    } elseif ($region->region_name === 'Region IV-A') {
                                        $totalScore = ($totalScore - 420) + 30;
                                    } elseif ($region->region_name === 'Region VII') {
                                        $totalScore = ($totalScore - 450) + 60;
                                    } 
                                @endphp
                                {{ $totalScore }}
                                    
                                 </td>
                                 <td class="px-6 py-3">
                                    @php
                                    $totalProgressLarge = collect([
                                        'adminService' => $adminService,
                                        'legalDivision' => $legalDivision,
                                        'certificationOffice' => $certificationOffice,
                                        'fms' => $fms,
                                        'nitesd' => $nitesd,
                                        'piad' => $piad,
                                        'planningOffice' => $planningOffice,
                                        'plo' => $plo,
                                        'romo' => $romo,
                                        'icto' => $icto,
                                        'ws' => $ws
                                    ])->sum(function($office) use ($region) {
                                        return $office->firstWhere('region_id', $region->id)->progress_percentage ?? 0;
                                    });
                                    $averageProgressLarge = $totalProgressLarge / 11; // Number of offices
                                @endphp
                                {{ round($averageProgressLarge, 2) }}%
                                 </td>
                                 <td class="px-6 py-3">
                                    @if(in_array($region->id, $checkEndorsed))
                                    <button type="button" class="btn btn-secondary btn-sm" disabled>Endorsed</button>
                                @else
                                    <button type="button" class="btn btn-primary btn-sm bg-green-600" onclick="toggleModal('saveChangesModal', {{$region->id}}, '{{ $region->region_name }}')">Endorse</button>
                                    @endif
                                    {{-- <button class="bg-green-500 hover:bg-green-600 text-white py-1 px-4 rounded-md">Endorse</button> --}}
                                 </td>
                                {{-- <td class="px-6 py-3">
                                    <input type="text" class="rounded-md px-2 py-1 bg-gray-100 text-gray-800 w-full" value="{{ $region->remarks ?? '' }}">
                                 </td> --}}
                             </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>

                @if(session('success'))
                <div id="successMessage" class="fixed z-50 bottom-0 right-0 bg-customGreen text-white p-4 text-center rounded-md">
                    {{ session('success') }}
                </div>
                <script>
                        setTimeout(function() {
                            var successMessage = document.getElementById('successMessage');
                            successMessage.style.transition = 'opacity 1s ease';
                            successMessage.style.opacity = '0';

                            // Remove the success message from the DOM after fade out
                            setTimeout(function() {
                                successMessage.remove();
                            }, 1000); // Wait for 1 second for fade out before removing
                        }, 3000); // Show the message for 3 seconds
                    </script>
                @endif
                <div id="saveChangesModal" class="fixed inset-0 hidden items-center justify-center bg-gray-600 bg-opacity-50">
                    <div class="bg-white rounded-lg shadow-lg w-1/3">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center p-4 border-b">
                            <h3 class="text-xl">Endorse Nominee</h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4">
                            Are you sure you want to endorse <u class="text-blue-500"><span id="modalProvinceName" class="text-blue-500"></span></u> to external validator?
                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-end p-4 border-t">
                            <button class="px-4 py-2 bg-gray-500 text-white rounded mr-2" onclick="toggleModal('saveChangesModal')">No</button>
                            <form id="saveChangesForm" method="POST" action="{{ route('bro.endorse-nominee', ['id' => 'region_id']) }}">
                                @csrf
                                <input type="hidden" name="user_id" value="">
                                <button class="px-4 py-2 bg-blue-500 text-white rounded" type="submit">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
 document.addEventListener('DOMContentLoaded', function () {
            const categoryFilter = document.getElementById('categoryFilter');
            const rows = document.querySelectorAll('.region-row');

            categoryFilter.addEventListener('change', function () {
                const selectedCategory = categoryFilter.value.toLowerCase();

                rows.forEach(row => {
                    const rowCategory = row.classList.contains(selectedCategory);

                    if (selectedCategory === 'all' || rowCategory) {
                        row.style.display = ''; // Show the row
                    } else {
                        row.style.display = 'none'; // Hide the row
                    }
                });
                
            });
        });

        function toggleModal(modalId, userId, provinceName) {
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
                // Set the user ID in the hidden input field
                const userIdInput = modal.querySelector('input[name="user_id"]');
                if (userIdInput) {
                    userIdInput.value = userId;
                }
                // Update the province name in the modal
                const provinceNameSpan = modal.querySelector('#modalProvinceName');
                if (provinceNameSpan) {
                    provinceNameSpan.textContent = provinceName;
                }

                const form = modal.querySelector('form');
                if (form) {
                    // Construct the new URL with the userId
                    const actionUrl = `/bro/endorse-nominee/${userId}`;
                    form.setAttribute('action', actionUrl);
                }
            }

            function submitSaveChangesForm() {
                document.getElementById('saveChangesForm').submit();
            }
        

        
    </script>
</body>
</html>
