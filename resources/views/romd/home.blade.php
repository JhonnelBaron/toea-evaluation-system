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
                    <div class="content bg-white shadow-md h-30 flex flex-col items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <b>OVERALL ACCOMPLISHMENT SUMMARY</b>
                        <div class="container mx-auto">
                            <div id="chart"></div>
                        </div>
                    </div>
                
                    <div class="content bg-white shadow-md h-24 bg-white shadow-md flex flex-col items-center justify-center rounded dark:bg-gray-800">
                        <p class="text-4xl text-blue-900 font-bold">
                            LIST OF OFFICES
                        </p>
                    </div>
                    
                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['adminService'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Administrative Service</span>
                        </p>
                    </div>

                    <!-- Repeat for other cards -->
                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['legalDivision'] }}% </span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Legal Division</span>
                        </p>
                    </div>

                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['certificationOffice'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Certification Office</span>
                        </p>
                    </div>

                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['fms'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Financial and Management Service</span>
                        </p>
                    </div>

                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['nitesd'] }}%</span>
                        </p>
                        <p class="text-center"> 
                            <span class="text-sm dark:text-gray-500 text-center">National Institute for Technical Education and Skills Development</span>
                        </p>
                    </div>

                    <!-- Repeat for other cards -->
                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['piad'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Public Information and Assistance Division</span>
                        </p>
                    </div>
                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['planningOffice'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Planning Office</span>
                        </p>
                    </div>
                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['plo'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Partnership and Linkages Office</span>
                        </p>
                    </div>
                    <!-- Repeat for other cards -->
                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
                        <p>
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['romo'] }}%</span>
                        </p>
                        <p>
                            <span class="text-sm dark:text-gray-500 text-center">Regional Operations Management Office</span>
                        </p>
                    </div>
                    <div class="clickableDiv content bg-transition cursor-pointer p-4 rounded-md h-24 shadow-md items-center justify-center flex flex-col">
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
        

        {{-- <script>
            const clickableDiv = document.getElementById('clickableDiv');

            clickableDiv.addEventListener('click', function() {
                // Toggle background color between original and new color
                if (clickableDiv.classList.contains('bg-blue-100')) {
                    clickableDiv.classList.remove('bg-blue-100');
                    // Add your original background class here
                } else {
                    // Add your new background color class here
                    clickableDiv.classList.add('bg-blue-100');
                }
            });
        </script> --}}


</body>
</html>
