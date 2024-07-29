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
        table.custom-table {
        width: 100%;
        border-collapse: collapse; /* This removes the space between table cells */
        }

        /* Style for table header (th) */
        th.custom-th {
            border-bottom: 2px solid #000; 
            text-align: center;
        }
        td.custom-td {
            text-align: center;

        }
            tfoot td.custom-td  {
            border-top: 2px solid #000; 
            text-align: center; 
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

            <div class="mx-auto mb-4">
                <ul class="flex flex-wrap justify-center items-center">
                    <li class="tab">
                        <a href="#" data-tab="submission" class="tab-link p-4 text-gray-800">Progress</a>
                    </li>
                    <li class="tab">
                        <a href="{{ route('romd.ranking') }}" data-tab="evaluated" class="tab-link p-4 text-gray-800">Ranking</a>
                    </li>
                    <li class="tab">
                        <a href="#" data-tab="endorsed" class="tab-link p-4 text-gray-800">Endorsed</a>
                    </li>
                </ul>
            </div>
{{-- 
            <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto"> --}}
                <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
                <div id="submission" class="tab-content">
                    <table class="custom-table mx-auto">
                        <thead class="bg-blue-300 text-sm">
                            <tr>
                                <th class="custom-th py-3 px-0 bg-TiffanyBlue">Executive Office</th>
                                @foreach ($smallRegions as $region)
                                    <th class="custom-th py-3 px-0 bg-red-200">{{  $region->region_name === 'Region XIII' ? 'CARAGA' : str_replace('Region ', '',$region->region_name) }}</th>
                                @endforeach
                                @foreach ($mediumRegions as $region)
                                <th class="custom-th py-3 px-0 bg-purple-200">{{ str_replace('Region ', '',$region->region_name) }}</th>
                                @endforeach
                                @foreach ($largeRegions as $region)
                                <th class="custom-th py-3 px-0 bg-Mint">{{ str_replace('Region ', '',$region->region_name) }}</th>
                                @endforeach
                                <th class="custom-th py-3 px-0 bg-customYellow">Total Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([
                                'adminService' => 'AS',
                                'legalDivision' => 'LD',
                                'certificationOffice' => 'CO',
                                'fms' => 'FMS',
                                'nitesd' => 'NITESD',
                                'piad' => 'PIAD',
                                'planningOffice' => 'PO',
                                'plo' => 'PLO',
                                'romo' => 'ROMO',
                                'icto' => 'ICTO',
                                'ws' => 'WS'
                            ] as $officeVariable => $officeName)
                              <tr>
                                <td class="custom-td py-3 bg-TiffanyBlue">{{ $officeName }}</td>
                                {{-- @foreach ($regions as $region)
                                    <td class=" py-3">
                                        @php
                                            $eval = ${$officeVariable}->firstWhere('region_id', $region->id);
                                        @endphp
                                        {{ $eval ? $eval->progress_percentage . '%' : 'N/A' }}
                                    </td>
                                @endforeach --}}
                                @foreach ($smallRegions as $smallRegion)
                                <td class="custom-td py-3 bg-red-200">
                                    @php
                                        $eval = ${$officeVariable}->firstWhere('region_id', $smallRegion->id);
                                    @endphp
                                    {{ $eval ? $eval->progress_percentage . '%' : '0%' }}
                                </td>
                            @endforeach
                            @foreach ($mediumRegions as $mediumRegion)
                                <td class="custom-td py-3 bg-purple-200">
                                    @php
                                        $eval = ${$officeVariable}->firstWhere('region_id', $mediumRegion->id);
                                    @endphp
                                    {{ $eval ? $eval->progress_percentage . '%' : '0%' }}
                                </td>
                            @endforeach
                            @foreach ($largeRegions as $largeRegion)
                                <td class="custom-td py-3 bg-Mint">
                                    @php
                                        $eval = ${$officeVariable}->firstWhere('region_id', $largeRegion->id);
                                    @endphp
                                    {{ $eval ? $eval->progress_percentage . '%' : '0%' }}
                                </td>
                            @endforeach

                                <td class="custom-td py-3 bg-customYellow">
                                    @php
                                    $totalProgress = ${$officeVariable}->sum('progress_percentage');
                                    $averageProgress = 100 / (count($smallRegions) + count($mediumRegions) + count($largeRegions));
                                    $executiveOfficeProgress = $totalProgress * $averageProgress / 100;
                                @endphp
                                {{ round($executiveOfficeProgress, 2) }}%
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="custom-td py-3 bg-TiffanyBlue"><b>Total</b></td>
                                @foreach ($smallRegions as $smallRegion)
                                    <td class="custom-td py-3 bg-red-200">
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
                                            ])->sum(function($office) use ($smallRegion) {
                                                return $office->firstWhere('region_id', $smallRegion->id)->progress_percentage ?? 0;
                                            });
                                            $averageProgressSmall = $totalProgressSmall / 11; // Number of offices
                                        @endphp
                                        {{ round($averageProgressSmall, 2) }}%
                                    </td>
                                @endforeach
                                @foreach ($mediumRegions as $mediumRegion)
                                    <td class="custom-td py-3 bg-purple-200">
                                        @php
                                            $totalProgressMedium = collect([
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
                                            ])->sum(function($office) use ($mediumRegion) {
                                                return $office->firstWhere('region_id', $mediumRegion->id)->progress_percentage ?? 0;
                                            });
                                            $averageProgressMedium = $totalProgressMedium / 11; // Number of offices
                                        @endphp
                                        {{ round($averageProgressMedium, 2) }}%
                                    </td>
                                @endforeach
                                @foreach ($largeRegions as $largeRegion)
                                    <td class="custom-td py-3 bg-Mint">
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
                                            ])->sum(function($office) use ($largeRegion) {
                                                return $office->firstWhere('region_id', $largeRegion->id)->progress_percentage ?? 0;
                                            });
                                            $averageProgressLarge = $totalProgressLarge / 11; // Number of offices
                                        @endphp
                                        {{ round($averageProgressLarge, 2) }}%
                                    </td>
                                @endforeach
                                <td class="custom-td py-3 bg-customYellow">
                                    @php
                                        $overallTotalProgress = ($totalProgressSmall + $totalProgressMedium + $totalProgressLarge);
                                        $overallProgress = $overallTotalProgress / (count($smallRegions) + count($mediumRegions) + count($largeRegions));
                                    @endphp
                                    {{ round($overallProgress, 2) }}%
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div id="evaluated" class="tab-content hidden">
                    <!-- Evaluated content goes here -->
                </div>

                <div id="rankings" class="tab-content hidden">
                    <!-- Rankings content goes here -->
                </div>
            </div>
            
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-link');

        tabLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                const href = this.getAttribute('href');

                if (!href || href === '#') {
                    event.preventDefault();
                }

                tabLinks.forEach(link => {
                    link.classList.remove('border-b-2', 'font-bold', 'border-gray-800');
                });

                this.classList.add('border-b-2', 'font-bold', 'border-gray-800');
            });
        });

        // Trigger the first tab to be active by default
        if (tabLinks.length > 0) {
            const firstLink = tabLinks[0];
            const href = firstLink.getAttribute('href');

            if (!href || href === '#') {
                firstLink.click();
            } else {
                window.location.href = href;
            }
        }
    });
    </script>
</body>
</html>
