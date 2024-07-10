<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard Title</title>
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

    </style>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <!-- Include your customized navbar -->
    @include('components.navbar', [
        'userName' => 'User Name',
        'userType' => 'User Type'
    ])

    <!-- Main content area -->
    <div class="p-4 sm:ml-0">

        <!-- Your Flowbite layout here -->
        {{-- <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
        </div> --}}

        <div class="p-4 border-2 border-blue-300 border-dashed rounded-lg dark:border-gray-700">
            <!-- Grid for the dashboard cards -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <!-- Example card -->
                <div class="col-span-1">
                    <div class="content bg-white shadow-md h-24 bg-white shadow-md flex flex-col items-center justify-center rounded dark:bg-gray-800">
                        <p class="text-4xl text-blue-900 font-bold">
                            LIST OF OFFICES
                        </p>
                    </div>
                    <div class="content bg-white shadow-md h-24 bg-white shadow-md flex flex-col items-center justify-center rounded dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['adminService'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right">
                            Administrative Service
                        </p>
                    </div>
                    <!-- Repeat for other cards -->
                    <div class="content bg-white shadow-md h-24 flex flex-col items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['legalDivision'] }}% </span>
                        </p>
                             <p class="text-sm dark:text-gray-500 text-right">
                            Legal Division
                        </p>
                    </div>
                    <div class="content bg-white shadow-md h-24 flex flex-col items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['certificationOffice'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right"> Certification Office
                        </p>
                    </div>
                    <div class="content bg-white shadow-md h-24 flex flex-col items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['fms'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right">Financial and Management Service
                        </p>
                    </div>
                    <div class="content bg-white shadow-md h-24 bg-white shadow-md flex flex-col items-center justify-center rounded dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['nitesd'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right"> National Institute for Technical Education and Skills Development
                        </p>
                    </div>
                    <!-- Repeat for other cards -->
                    <div class="content bg-white shadow-md h-24 flex flex-col items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['piad'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right"> Public Information and Assistance Division 
                        </p>
                    </div>
                    <div class="content bg-white shadow-md h-24 flex flex-col items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['planningOffice'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right"> Planning Office
                        </p>
                    </div>
                    <div class="content bg-white shadow-md h-24 bg-white shadow-md flex flex-col items-center justify-center rounded dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['plo'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right">Partnership and Linkages Office
                        </p>
                    </div>
                    <!-- Repeat for other cards -->
                    <div class="content bg-white shadow-md h-24 flex flex-col items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['romo'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right">Regional Operations Management Office
                        </p>
                    </div>
                    <div class="content bg-white shadow-md h-24 flex flex-col items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl dark:text-gray-500">
                            <span class="highlight">{{ $totalProgressPerExecutiveOffice['icto'] }}%</span>
                        </p>
                        <p class="text-sm dark:text-gray-500 text-right">Information and Communication Office
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
                            <p class="text-2xl dark:text-gray-500">
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
                            <p class="text-2xl dark:text-gray-500">
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
                            <p class="text-2xl dark:text-gray-500">
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
</body>
</html>
