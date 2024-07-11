<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROMD Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
    <style>
        /* Customize body background */
        body {
            background-color: hsl(0, 0%, 97%) !important;
        }

        .content {
            margin: 10px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .region {
            margin: 5px;
            padding: 5px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .highlight {
            font-size: 2.5rem; /* Larger font size */
            font-weight: bold; /* Bold text */
            color: #1E3A8A; /* Green color */
        }

        .bg-transition {
            background-color: white;
            transition: background-color 0.3s ease;
        }
        .bg-transition:hover {
            background-color: #BFDBFE;
        }
        .bg-transition.clicked {
            background-color: #90cdf4;
        }

        /* Add this to your custom CSS file if needed */
        .transition-transform {
        transition: transform 0.3s ease-in-out;
        }


    </style>
</head>

<body>

    <!-- Include your customized navbar -->
    @include('components.navbar', [
        'userName' => 'User Name',
        'userType' => 'User Type'
    ])

    <!-- Main content area -->
    <div class="p-4 sm:ml-0">

        {{-- <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
        </div> --}}

        <div class="p-4 border-2 border-dashed rounded-lg dark:border-gray-700">
            <!-- Grid for the dashboard cards -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <!-- Example card -->
                <div class="col-span-1">
                    {{-- ANALYSIS CHART --}}
                    <div class="content bg-white shadow-md h-30 flex flex-col items-center justify-center rounded dark:bg-gray-800">
                        <b>OVERALL ACCOMPLISHMENT SUMMARY</b>
                        <div class="container mx-auto">
                            <div id="chart"></div>
                        </div>
                    </div>
                
                    <div class="content bg-white shadow-md h-24 flex flex-col items-center justify-center rounded dark:bg-gray-800">
                        <p class="text-4xl text-blue-900 font-bold">
                            LIST OF OFFICES
                        </p>
                    </div>
                    
                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="Administrative Service" data-office-id="asEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['adminService'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Administrative Service</span>
                        </p>
                    </div>

                    <!-- Repeat for other cards -->
                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="Legal Division" data-office-id="ldEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['legalDivision'] }}% </span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Legal Division</span>
                        </p>
                    </div>

                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="Certification Office" data-office-id="coEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['certificationOffice'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Certification Office</span>
                        </p>
                    </div>

                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="fms" data-office-id="fmsEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['fms'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Financial and Management Service</span>
                        </p>
                    </div>

                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="nitesd" data-office-id="nitesdEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['nitesd'] }}%</span>
                        </p>
                        <p class="text-center"> 
                            <span class="text-sm dark:text-gray-500 text-center">National Institute for Technical Education and Skills Development</span>
                        </p>
                    </div>

                    <!-- Repeat for other cards -->
                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="piad" data-office-id="piadEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['piad'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Public Information and Assistance Division</span>
                        </p>
                    </div>
                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="planningOffice" data-office-id="poEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['planningOffice'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Planning Office</span>
                        </p>
                    </div>
                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="plo" data-office-id="ploEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['plo'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Partnership and Linkages Office</span>
                        </p>
                    </div>
                    <!-- Repeat for other cards -->
                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="romo" data-office-id="romoEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['romo'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Regional Operations Management Office</span>
                        </p>
                    </div>
                    <div class="office-box content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col" data-office="icto" data-office-id="ictoEval">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['icto'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Information and Communication Office</span>
                        </p>
                    </div>
                </div>

                
                <div class="col-span-2 grid grid-cols-3 gap-1">
                
                    <div class="col-span-3">
                        <div class="content bg-blue-100 shadow-md h-24 flex flex-col items-center justify-center text-4xl font-bold text-blue-900">
                            <h1>SMALL CATEGORY</h1>
                        </div>
                    </div>

                    <!-- Small Regions -->
                    @foreach ($totalProgressPerRegion['Small'] as $regionName => $progress)
                        @php
                            $displayName = $regionName === 'Region XIII' ? 'CARAGA' : str_replace('Region ', '', $regionName);
                            $regionId = \App\Models\Region::where('region_name', $regionName)->value('id');
                            $totalScore = isset($totalScorePerRegion[$regionId]) ? (
                            $totalScorePerRegion[$regionId]['adminService'] +
                            $totalScorePerRegion[$regionId]['legalDivision'] +
                            $totalScorePerRegion[$regionId]['certificationOffice'] +
                            $totalScorePerRegion[$regionId]['fms'] +
                            $totalScorePerRegion[$regionId]['nitesd'] +
                            $totalScorePerRegion[$regionId]['piad'] +
                            $totalScorePerRegion[$regionId]['planningOffice'] +
                            $totalScorePerRegion[$regionId]['plo'] +
                            $totalScorePerRegion[$regionId]['romo'] +
                            $totalScorePerRegion[$regionId]['icto']
                        ) : 0; // Default to 0 if the region ID is not found
                        @endphp
                        <div class="region bg-white shadow-md h-48 flex flex-col items-center justify-center rounded dark:bg-gray-800">
                            <p>
                                <span class="highlight">{{ $progress }}%</span>
                            </p>
                            <p class="text-lg dark:text-gray-500">
                                Score: <b>{{ $totalScore }}</b>
                           </p>
                            <p class="text-md dark:text-gray-500 text-align font-bold">
                                <br>
                                <span>{{ $displayName }}</span>
                            </p>
                        </div>

                    @endforeach
                    <div class="col-span-3">
                        <div class="content bg-blue-100 shadow-md h-24 flex flex-col items-center justify-center text-4xl font-bold text-blue-900">
                            <h1>MEDIUM CATEGORY</h1>
                        </div>
                    </div>

 
                    <!-- Medium Regions -->
                    @foreach ($totalProgressPerRegion['Medium'] as $regionName => $progress)
                        @php
                            $displayName = str_replace('Region ', '', $regionName);
                            $regionId = \App\Models\Region::where('region_name', $regionName)->value('id');
                            $totalScore = isset($totalScorePerRegion[$regionId]) ? (
                            $totalScorePerRegion[$regionId]['adminService'] +
                            $totalScorePerRegion[$regionId]['legalDivision'] +
                            $totalScorePerRegion[$regionId]['certificationOffice'] +
                            $totalScorePerRegion[$regionId]['fms'] +
                            $totalScorePerRegion[$regionId]['nitesd'] +
                            $totalScorePerRegion[$regionId]['piad'] +
                            $totalScorePerRegion[$regionId]['planningOffice'] +
                            $totalScorePerRegion[$regionId]['plo'] +
                            $totalScorePerRegion[$regionId]['romo'] +
                            $totalScorePerRegion[$regionId]['icto']
                        ) : 0; // Default to 0 if the region ID is not found
                        @endphp
                        <div class="region bg-white shadow-md h-48 flex flex-col items-center justify-center rounded dark:bg-gray-800">
                            <p>
                                <span class="highlight">{{ $progress }}%</span>
                            </p>
                            <p class="text-lg dark:text-gray-500">
                                Score: <b>{{ $totalScore }}</b>
                           </p>
                            <p class="text-md dark:text-gray-500 font-bold">
                                <br>
                                {{ $displayName }}
                            </p>
                        </div>
                    @endforeach
                
                    <!-- Large Regions -->
                        
                    <div class="col-span-3">
                        <div class="content bg-blue-100 shadow-md h-24 flex flex-col items-center justify-center text-4xl font-bold text-blue-900">
                            <h1>LARGE CATEGORY</h1>
                        </div>
                    </div>
                        
                    
                    @foreach ($totalProgressPerRegion['Large'] as $regionName => $progress)
                        @php
                            $displayName = str_replace('Region ', '', $regionName);
                            $regionId = \App\Models\Region::where('region_name', $regionName)->value('id');
                            $totalScore = isset($totalScorePerRegion[$regionId]) ? (
                            $totalScorePerRegion[$regionId]['adminService'] +
                            $totalScorePerRegion[$regionId]['legalDivision'] +
                            $totalScorePerRegion[$regionId]['certificationOffice'] +
                            $totalScorePerRegion[$regionId]['fms'] +
                            $totalScorePerRegion[$regionId]['nitesd'] +
                            $totalScorePerRegion[$regionId]['piad'] +
                            $totalScorePerRegion[$regionId]['planningOffice'] +
                            $totalScorePerRegion[$regionId]['plo'] +
                            $totalScorePerRegion[$regionId]['romo'] +
                            $totalScorePerRegion[$regionId]['icto']
                        ) : 0; // Default to 0 if the region ID is not found
                        @endphp
                        <div class="region bg-white shadow-md h-48 flex flex-col items-center justify-center rounded dark:bg-gray-800">
                            <p>
                                <span class="highlight">{{ $progress }}%</span>
                            </p>
                            <p class="text-lg dark:text-gray-500">
                                 Score: <b>{{ $totalScore }}</b>
                            </p>
                            <p class="text-md dark:text-gray-500 font-bold">
                                <br>
                                {{ $displayName }}
                            </p>
                        </div>
                    @endforeach
                    </div>

                    <div id="office-details-container" class="text-gray-700 fixed top-10 right-14 w-3/5 h-5/6 bg-white shadow-lg overflow-y-auto z-50 hidden font-poppins transition-transform transform translate-y-full ease-in-out duration-300">
                        <div class="p-4">
                          <span class="fixed top-2 right-5">
                            <button id="close-details" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-large rounded-lg text-sm px-8 py-2 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                              Close
                            </button>
                          </span>
                          <h2 class="text-xl font-bold"></h2>
                          <hr>
                          <div id="office-details-content">
                            <table class="table-auto w-full">
                              <thead>
                                <tr>
                                  <th>Region Name</th>
                                  <th>Percentage</th>
                                  <th>Evaluated</th>
                                  <th>Score</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody id="details-table-body">
                                        
                                        {{-- @foreach ($smallRegions as $region)
                                        <tr class="category-small">
                                            <td class="!border-b-2" style="border-color: #FFC700;">{{ $region->region_name }}</td>
                                            <td>
                                                @if ($region->evaluations->isNotEmpty())
                                                {{ $region->evaluations->first()->progress_percentage ?? 0 }}%
                                                @else
                                                0%
                                                @endif
                                            </td>
                                            <td>
                                                @if ($region->evaluations->isNotEmpty() && $region->evaluations->first()->overall_total_filled !== null && $region->evaluations->first()->total_fields !== null)
                                                {{ $region->evaluations->first()->overall_total_filled }} / {{ $region->evaluations->first()->total_fields }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($region->evaluations->isNotEmpty())
                                                {{ $region->evaluations->first()->overall_total_score }}
                                                @endif
                                            </td>
                                            <td>
                                                <input type="text" data-region-id="{{ $region->id }}"
                                                    class="form-control remarks-input" placeholder=""
                                                    value="{{ $region->evaluations->first()->final_remarks ?? '' }}">
                                                <textarea class="form-control remarks-textarea" data-region-id="{{ $region->id }}">
                                                    {{ $region->evaluations->first()->final_remarks ?? '' }}
                                                </textarea>
                                            </td>
                                        </tr>
                                        @endforeach
                                
                                        @foreach ($mediumRegions as $region)
                                        <tr>
                                            <td class="!border-b-2" style="border-color: #B1AFFF;">{{ $region->region_name }}</td>
                                            <td>
                                                @if ($region->evaluations->isNotEmpty())
                                                {{ $region->evaluations->first()->progress_percentage ?? 0 }}%
                                                @else
                                                0%
                                                @endif
                                            </td>
                                            <td>
                                                @if ($region->evaluations->isNotEmpty() && $region->evaluations->first()->overall_total_filled !== null && $region->evaluations->first()->total_fields !== null)
                                                {{ $region->evaluations->first()->overall_total_filled }} / {{ $region->evaluations->first()->total_fields }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($region->evaluations->isNotEmpty())
                                                {{ $region->evaluations->first()->overall_total_score }}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                
                                        @foreach ($largeRegions as $region)
                                        <tr class="category-large">
                                            <td class="!border-b-2" style="border-color: #FF0000">{{ $region->region_name }}</td>
                                            <td>
                                                @if ($region->evaluations->isNotEmpty())
                                                {{ $region->evaluations->first()->progress_percentage ?? 0 }}%
                                                @else
                                                0%
                                                @endif
                                            </td>
                                            <td>
                                                @if ($region->evaluations->isNotEmpty() && $region->evaluations->first()->overall_total_filled !== null && $region->evaluations->first()->total_fields !== null)
                                                {{ $region->evaluations->first()->overall_total_filled }} / {{ $region->evaluations->first()->total_fields }}
                                                @endif
                                            </td>

                                            <td>
                                                @if ($region->evaluations->isNotEmpty())
                                                {{ $region->evaluations->first()->overall_total_score }}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                    
                            </div>
                        </div>
                    </div>
                    
            </div>

        </div>
    </div>

    <div>
        <div class="flex items-center justify-center">
            © 2024 ROMD. All rights reserved.
        </div>
    </div>    

    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var options = {
                chart: {
                type: 'pie',
                },
                // series: [44, 55, 13, 43, 22, 10, 20, 56, 76, 55, 5],
                // labels: ['Administrative Service', 'Certification Office', 'FMS', 'ICTO', 'LEGAL', 'NITESD', 'PIAD', 'PLO', 'PO', 'ROMO', 'Not Rated'],
                series: [44, 55,],
                labels: ['Rated', 'Not Rated'],

            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>

        <script>
            const clickableDivs = document.querySelectorAll('.clickableDiv');
        
            clickableDivs.forEach(function(div) {
                div.addEventListener('click', function() {
                    toggleBackgroundColor(div);
                });
            });
        
            function toggleBackgroundColor(div) {
                if (div.classList.contains('bg-blue-100')) {
                    div.classList.remove('bg-blue-100');
                    // Add your original background class here
                } else {
                    div.classList.add('bg-blue-100');
                    // Add your new background color class here
                }
            }
        </script>

        {{-- // document.addEventListener('DOMContentLoaded', function() {
            //     const detailsContainer = document.getElementById('office-details-container');
            //     const closeDetailsButton = document.getElementById('close-details');

            //     document.querySelectorAll('.office-box').forEach(box => {
            //         box.addEventListener('click', function() {
            //             const officeName = box.dataset.office;

            //         // Update the h2 with the clicked office name
            //         const officeDetailsTitle = detailsContainer.querySelector('h2');
            //         officeDetailsTitle.textContent = `${officeName}`;
            //             detailsContainer.classList.remove('hidden');
            //         });
            //     });

            //     closeDetailsButton.addEventListener('click', function() {
            //         detailsContainer.classList.add('hidden');
            //     });
            // }); --}}

        <script>
            
            document.addEventListener('DOMContentLoaded', function() {
    const detailsContainer = document.getElementById('office-details-container');
    const officeDetailsContent = document.getElementById('office-details-content');
    const closeDetailsButton = document.getElementById('close-details');

    // Add event listener to each office box
    document.querySelectorAll('.office-box').forEach(box => {
        box.addEventListener('click', function() {
            const officeId = box.dataset.officeId; // Fetch office ID from data attribute

            // Fetch data from server using Fetch API or Axios
            fetch(`/evaluation/${officeId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Update office details in the container
                    let tableHTML = '';

                    // Assuming data is an array of evaluations
                    data.forEach(evaluation => {
                        tableHTML += `
                            <tr>
                                <td>${evaluation.region.region_name}</td>
                                <td>${evaluation.progress_percentage}%</td>
                                <td>${evaluation.overall_total_filled} / ${evaluation.total_fields}</td>
                                <td>${evaluation.overall_total_score}</td>
                                <td>${evaluation.final_remarks}</td>
                            </tr>
                        `;
                    });

                    // Render the table inside officeDetailsContent
                    officeDetailsContent.innerHTML = `
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Region Name</th>
                                    <th class="px-4 py-2">Percentage</th>
                                    <th class="px-4 py-2">Evaluated</th>
                                    <th class="px-4 py-2">Score</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${tableHTML}
                            </tbody>
                        </table>
                    `;
                })
                .catch(error => console.error('Error fetching office details:', error));

            // Update the h2 with the clicked office name
            const officeName = box.dataset.office;
            const officeDetailsTitle = detailsContainer.querySelector('h2');
            officeDetailsTitle.textContent = officeName;

            // Show details container with transition
            detailsContainer.classList.remove('hidden');
            setTimeout(() => {
                detailsContainer.classList.remove('translate-y-full');
            }, 10); // Slight delay to allow the class to apply
            });
        });

            // Add event listener to close button
            closeDetailsButton.addEventListener('click', function() {
                detailsContainer.classList.add('translate-y-full');
                detailsContainer.addEventListener('transitionend', () => {
                    detailsContainer.classList.add('hidden');
                }, { once: true });
            });
        });

        </script>

</body>
</html>
