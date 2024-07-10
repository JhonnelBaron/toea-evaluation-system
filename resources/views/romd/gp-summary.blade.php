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
            font-family: "Times New Roman", Times, serif;
            flex-grow: 1;
            margin: 20px;
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
            padding: 8px;
            text-align: left;
            background-color: #f2f2f2; /* Light gray background for headers */
        }

        /* Style for table data (td) */
        td {
            border: 1px solid #000; /* Light gray border with 1px thickness */
            padding: 8px;
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
            {{-- <div class="legend ml-7">
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
            </div> --}}

            <div class="mx-auto flex flex-wrap items-center justify-between">
                <div class="ml-8 flex items-center"> <!-- Adjust ml-8 if needed -->
                    <label for="categoryFilter" class="text-black mr-2">Category:</label>
                    <select id="categoryFilter" class="rounded-md px-2 py-1 bg-gray-300 text-gray-800">
                        <option value="all">All</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                <div class="ml-8 flex items-center">
                    <label for="filterBy" class="text-black mr-2">Filter</label>
                    <select id="filterBy" class="rounded-md px-2 py-1 bg-gray-300 text-gray-800">
                        <option value="normal">List</option>
                        <option value="rank">Rank</option>
                    </select>
                </div>
                <div class="flex-grow flex items-center justify-center" style="margin-right: 20.5rem;"> <!-- Adjust this value to move the tabs to the left -->
                {{-- <div class="flex items-center justify-center flex-grow ml-[-13rem]"> <!-- Adjust ml-[-1rem] to move tabs to the left --> --}}
                    <ul class="flex">
                        <li class="tab">
                            <a href="#" data-tab="submission" class="tab-link p-4 text-black">Submission</a>
                        </li>
                        <li class="tab">
                            <a href="#" data-tab="evaluated" class="tab-link p-4 text-black border-b-2 border-black"><b>Ranking</b></a>
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
                                <th class="px-6 py-3 bg-TiffanyBlue"></th>
                                <th class="px-6 py-2 bg-TiffanyBlue">Nominees</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Grouping</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Evaluated Score</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Final Score</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Progress</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Remarks</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Evaluator</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Hard Copy</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Action</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @php $rank = 1; @endphp
                            @foreach ($smallProvinces as $user)
                            <tr class="region-row small ">
                                <td>{{ $rank++ }}</td>
                                <td class="px-3 py-3">{{  $user->province_name }}</td>
                                <td class="px-3 py-3">{{  str_replace('_Province', '', $user->category) }}</td>
                                <td class="eval px-3 py-3">{{ $user->evaluated_score }}</td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"><input type="checkbox"></td>
                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                <td><button class="btn btn-primary btn-sm bg-green-600">Endorse</button></td>
                            </tr>
                            @endforeach
                            @foreach ($mediumProvinces as $user)
                            <tr class="region-row medium ">
                                <td>{{ $rank++ }}</td>
                                <td class="px-3 py-3">{{  $user->province_name }}</td>
                                <td class="px-3 py-3">{{  str_replace('_Province', '', $user->category) }}</td>
                                <td class="eval px-3 py-3">{{ $user->evaluated_score }}</td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"><input type="checkbox"></td>

                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                <td><button class="btn btn-primary btn-sm bg-green-600">Endorse</button></td>
                            </tr>
                            @endforeach
                            @foreach ($largeProvinces as $user)
                            <tr class="region-row large">
                                <td>{{ $rank++ }}</td>
                                <td class="px-3 py-3">{{  $user->province_name }}</td>
                                <td class="px-3 py-3">{{  str_replace('_Province', '', $user->category) }}</td>
                                <td class="eval px-3 py-3">{{ $user->evaluated_score }}</td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"></td>
                                <td class="px-3 py-3"><input type="checkbox"></td>
                                <td><button class="btn btn-primary btn-sm">View</button></td>
                                <td><button class="btn btn-primary btn-sm bg-green-600">Endorse</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

        
    </script>
</body>
</html>
