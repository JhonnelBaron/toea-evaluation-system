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
        .popover {
            position: fixed;
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1;
        }

        .hoverable:hover .popover {
            display: block;
        }



    </style>
</head>
<body>
    <div>
        @include('components.externalEvaluatorSB', [
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-4 p-2">
            <div class="flex justify-between items-center w-full p-2">
                <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST REGIONAL OFFICE</h1>
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>

            <div class="mx-auto flex flex-wrap items-center justify-between">
                {{-- <div class="ml-8 flex items-center">
                    <label for="filterBy" class="text-black mr-2">Rank</label>
                    <select id="filterBy" class="rounded-md px-2 py-1 bg-gray-300 text-gray-800">
                        <option value="self-rating" @if($filterBy === 'self-rating') selected @endif>Self Rating</option>
                        <option value="ro" @if($filterBy === 'ro') selected @endif>RO Score</option>
                        <option value="romo" @if($filterBy === 'romo') selected @endif>ROMO Score</option>
                    </select>
                </div> --}}
                <div class="ml-8 flex items-center"> <!-- Adjust ml-8 if needed -->
                    <label for="categoryFilter" class="text-black mr-2">Category:</label>
                    <select id="categoryFilter" class="rounded-md px-2 py-1 bg-gray-300 text-gray-800">
                        <option value="all">All</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                {{--<div class="ml-8 flex items-center">
                    <label for="filterBy" class="text-black mr-2">Filter</label>
                    <select id="filterBy" class="rounded-md px-2 py-1 bg-gray-300 text-gray-800">
                        <option value="normal">List</option>
                        <option value="rank">Rank</option>
                    </select>
                </div> --}}
                <div class="flex-grow flex items-center justify-center" style="margin-right: 8.5rem;">
                    <ul class="flex">
                        <li class="tab">
                            <a href="#" data-tab="submission" class="tab-link p-4 text-black border-b-2 border-black"><b>BRO</b></a>
                        </li>
                        <li class="tab">
                            <a href="/external/gp" data-tab="evaluated" class="tab-link p-4 text-black">Galing Probinsya</a>
                        </li>
                        <li class="tab">
                            <a href="/external/ti" data-tab="endorsed" class="tab-link p-4 text-black">Best TI</a>
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
                                <th class="px-6 py-2 bg-TiffanyBlue">Region</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Category</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Secretariat Rating</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">External Validator Rating</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Progress</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Action</th>
                                <th class="px-6 py-3 bg-TiffanyBlue">Remarks</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            {{-- @php $rank = 1; @endphp --}}
                            @foreach ($small as $user)
                            <tr class="region-row small" data-category="small">
                                <td class="rank"></td>
                                <td class="px-3 py-3">{{  $user->province }}</td>
                                <td class="px-3 py-3">{{   str_replace('_Province', '',$user->grouping) }}</td>
                                <td class="px-5 py-1">
                                    <div class="hoverable relative flex items-center justify-center max-w-xs">
                                    {{  $user->romo_final_score }}
                                        <div class="popover bg-white border border-gray-300 shadow-lg rounded-lg hidden">
                                            <div class="popover-content p-4">
                                                <p>Criteria A: <span class="ml-2 float-right"> {{ $user->criteria_a ?? 0 }} </span></p>
                                                <p>Criteria B: <span class="ml-2 float-right"> {{ $user->criteria_b ?? 0 }} </span></p>
                                                <p>Criteria C: <span class="ml-2 float-right"> {{ $user->criteria_c ?? 0 }} </span></p>
                                                <p>Criteria D: <span class="ml-2 float-right"> {{ $user->criteria_d ?? 0 }} </span></p>
                                                <p>Criteria E: <span class="ml-2 float-right"> {{ $user->criteria_e ?? 0 }} </span></p>
                                            </div>
                                        </div>
                                    </div>
                                </td>            
                                <td class="px-5 py-1">
                                    <div class="hoverable relative flex items-center justify-center max-w-xs">
                                    ongoing
                                    <div class="popover bg-white border border-gray-300 shadow-lg rounded-lg hidden">
                                        <div class="popover-content p-4">
                                            <p>Criteria A: <span class="ml-2 float-right"> {{ $user->criteria_a ?? 0 }} </span></p>
                                            <p>Criteria B: <span class="ml-2 float-right"> {{ $user->criteria_b ?? 0 }} </span></p>
                                            <p>Criteria C: <span class="ml-2 float-right"> {{ $user->criteria_c ?? 0 }} </span></p>
                                            <p>Criteria D: <span class="ml-2 float-right"> {{ $user->criteria_d ?? 0 }} </span></p>
                                            <p>Criteria E: <span class="ml-2 float-right"> {{ $user->criteria_e ?? 0 }} </span></p>
                                        </div>
                                    </div>
                                    </div>
                                </td>        
                                <td class="px-3 py-3">not completed</td>  
                                <td class="px-3 py-3"><button class="btn btn-primary btn-sm"  onclick="location.href='{{ route('external.bro-a', ['id' => $user->user_id]) }}'">Evaluate</button></td>  
                                <td class="px-3 py-3">
                                {{-- <input type="text" 
                                class="form-control remarks-input" placeholder=""> --}}
                            <textarea class="form-control remarks-textarea" >
                                
                            </textarea> 
                                </td>             

                            </tr>
                            @endforeach
                            @foreach ($medium as $user)
                            <tr class="region-row medium" data-category="medium">
                                <td class="rank"></td>
                                <td class="px-3 py-3">{{  $user->province }}</td>
                                <td class="px-3 py-3">{{  str_replace('_Province', '', $user->grouping) }}</td>
                                <td class="px-5 py-1">
                                    <div class="hoverable relative flex items-center justify-center max-w-xs">
                                    {{ $user->romo_final_score }}
                                    <div class="popover bg-white border border-gray-300 shadow-lg rounded-lg hidden">
                                        <div class="popover-content p-4">
                                            <p>Criteria A: <span class="ml-2 float-right"> {{ $user->criteria_a ?? 0 }} </span></p>
                                            <p>Criteria B: <span class="ml-2 float-right"> {{ $user->criteria_b ?? 0 }} </span></p>
                                            <p>Criteria C: <span class="ml-2 float-right"> {{ $user->criteria_c ?? 0 }} </span></p>
                                            <p>Criteria D: <span class="ml-2 float-right"> {{ $user->criteria_d ?? 0 }} </span></p>
                                            <p>Criteria E: <span class="ml-2 float-right"> {{ $user->criteria_e ?? 0 }} </span></p>
                                        </div>
                                    </div>
                                    </div>
                                </td>     
                                                            <td class="px-5 py-1">
                                    <div class="hoverable relative flex items-center justify-center max-w-xs">
                                    ongoing
                                    <div class="popover bg-white border border-gray-300 shadow-lg rounded-lg hidden">
                                        <div class="popover-content p-4">
                                            <p>Criteria A: <span class="ml-2 float-right"> {{ $user->criteria_a ?? 0 }} </span></p>
                                            <p>Criteria B: <span class="ml-2 float-right"> {{ $user->criteria_b ?? 0 }} </span></p>
                                            <p>Criteria C: <span class="ml-2 float-right"> {{ $user->criteria_c ?? 0 }} </span></p>
                                            <p>Criteria D: <span class="ml-2 float-right"> {{ $user->criteria_d ?? 0 }} </span></p>
                                            <p>Criteria E: <span class="ml-2 float-right"> {{ $user->criteria_e ?? 0 }} </span></p>
                                        </div>
                                    </div>
                                    </div>
                                </td>        
                                <td class="px-3 py-3">not completed</td>  
                                <td class="px-3 py-3"><button class="btn btn-primary btn-sm"  onclick="location.href='{{ route('external.bro-a', ['id' => $user->user_id]) }}'">Evaluate</button></td>  
                                <td class="px-3 py-3">
                                {{-- <input type="text" 
                                class="form-control remarks-input" placeholder=""> --}}
                            <textarea class="form-control remarks-textarea" >
                                
                            </textarea> 
                                </td>             
           
                            </tr>
                            @endforeach
                            @foreach ($large as $user)
                            <tr class="region-row large" data-category="large">
                                <td class="rank"></td>
                                <td class="px-3 py-3">{{  $user->province }}</td>
                                <td class="px-3 py-3">{{  str_replace('_Province', '', $user->grouping) }}</td>
                                <td class="px-5 py-1">
                                    <div class="hoverable relative flex items-center justify-center max-w-xs">
                                    {{ $user->romo_final_score }}
                                    <div class="popover bg-white border border-gray-300 shadow-lg rounded-lg hidden">
                                        <div class="popover-content p-4">
                                            <p>Criteria A: <span class="ml-2 float-right"> {{ $user->criteria_a ?? 0 }} </span></p>
                                            <p>Criteria B: <span class="ml-2 float-right"> {{ $user->criteria_b ?? 0 }} </span></p>
                                            <p>Criteria C: <span class="ml-2 float-right"> {{ $user->criteria_c ?? 0 }} </span></p>
                                            <p>Criteria D: <span class="ml-2 float-right"> {{ $user->criteria_d ?? 0 }} </span></p>
                                            <p>Criteria E: <span class="ml-2 float-right"> {{ $user->criteria_e ?? 0 }} </span></p>
                                        </div>
                                    </div>
                                    </div>
                                </td>            
                                                            <td class="px-5 py-1">
                                    <div class="hoverable relative flex items-center justify-center max-w-xs">
                                    ongoing
                                    <div class="popover bg-white border border-gray-300 shadow-lg rounded-lg hidden">
                                        <div class="popover-content p-4">
                                            <p>Criteria A: <span class="ml-2 float-right"> {{ $user->criteria_a ?? 0 }} </span></p>
                                            <p>Criteria B: <span class="ml-2 float-right"> {{ $user->criteria_b ?? 0 }} </span></p>
                                            <p>Criteria C: <span class="ml-2 float-right"> {{ $user->criteria_c ?? 0 }} </span></p>
                                            <p>Criteria D: <span class="ml-2 float-right"> {{ $user->criteria_d ?? 0 }} </span></p>
                                            <p>Criteria E: <span class="ml-2 float-right"> {{ $user->criteria_e ?? 0 }} </span></p>
                                        </div>
                                    </div>
                                    </div>
                                </td>        
                                <td class="px-3 py-3">not completed</td>  
                                <td class="px-3 py-3"><button class="btn btn-primary btn-sm"  onclick="location.href='{{ route('external.bro-a', ['id' => $user->user_id]) }}'">Evaluate</button></td>  
                                <td class="px-3 py-3">
                                {{-- <input type="text" 
                                class="form-control remarks-input" placeholder=""> --}}
                            <textarea class="form-control remarks-textarea" >
                                
                            </textarea> 
                                </td>             
   
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
                            <form id="saveChangesForm" method="POST" action="{{ route('gp.endorse-nominee', ['id' => 'user_id']) }}">
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
            let rank = 1; // Start ranking from 1 for each filter change

            if (selectedCategory === 'all') {
                rows.forEach((row, index) => {
                    row.style.display = ''; // Show all rows
                    const rankCell = row.querySelector('.rank');
                    if (rankCell) {
                        rankCell.textContent = rank++; // Update the rank
                    } else {
                        console.warn(`Rank cell not found in row ${index}`);
                    }
                });
            } else {
                rows.forEach((row, index) => {
                    const rowCategory = row.classList.contains(selectedCategory);

                    if (rowCategory) {
                        row.style.display = ''; // Show the row
                        const rankCell = row.querySelector('.rank');
                        if (rankCell) {
                            rankCell.textContent = rank++; // Update the rank
                        } else {
                            console.warn(`Rank cell not found in row ${index}`);
                        }
                    } else {
                        row.style.display = 'none'; // Hide the row
                    }
                });
            }
        });

    // Trigger the change event to initialize the rank for the "all" category on page load
    categoryFilter.dispatchEvent(new Event('change'));


                // Filter by Rank
                    const filterBySelect = document.getElementById('filterBy');

            filterBySelect.addEventListener('change', function () {
                const selectedRank = filterBySelect.value.toLowerCase();
                const currentUrl = window.location.href;
                let baseUrl = currentUrl.split('?')[0]; // Get base URL without query params
                let queryParams = new URLSearchParams(window.location.search);

                // Update or add 'filterBy' parameter
                queryParams.set('filterBy', selectedRank);

                // Check if 'evaluator' parameter is already set
                if (queryParams.has('evaluator')) {
                    // Keep the current 'evaluator' parameter
                    baseUrl = `${baseUrl}?${queryParams.toString()}`;
                } else {
                    // No 'evaluator' parameter set, keep only 'filterBy'
                    baseUrl = `${baseUrl}?${queryParams.toString()}`;
                }

                // Redirect to the constructed URL
                window.location.href = baseUrl;
            });

            // Filter by Evaluator
            const evaluatorFilterSelect = document.getElementById('evaluatorFilter');

            evaluatorFilterSelect.addEventListener('change', function () {
                const selectedEvaluator = evaluatorFilterSelect.value;
                const currentUrl = window.location.href;
                let baseUrl = currentUrl.split('?')[0]; // Get base URL without query params
                let queryParams = new URLSearchParams(window.location.search);

                // Update or add 'evaluator' parameter
                if (selectedEvaluator === 'all') {
                    queryParams.delete('evaluator'); // Remove 'evaluator' parameter if 'All' is selected
                } else {
                    queryParams.set('evaluator', selectedEvaluator); // Set 'evaluator' parameter to selected value
                }

                // Check if 'filterBy' parameter is already set
                if (queryParams.has('filterBy')) {
                    // Keep the current 'filterBy' parameter
                    baseUrl = `${baseUrl}?${queryParams.toString()}`;
                } else {
                    // No 'filterBy' parameter set, keep only 'evaluator'
                    baseUrl = `${baseUrl}?${queryParams.toString()}`;
                }

                // Redirect to the constructed URL
                window.location.href = baseUrl;
            });

                    document.querySelectorAll('.hoverable').forEach(item => {
                    item.addEventListener('mouseenter', event => {
                        const popover = item.querySelector('.popover');
                        popover.style.display = 'block';
                        popover.style.top = `${event.clientY - popover.offsetHeight}px`; // Adjusting to show above the cursor
                        popover.style.left = `${event.clientX}px`;
                    });

                    item.addEventListener('mouseleave', () => {
                        const popover = item.querySelector('.popover');
                        popover.style.display = 'none';
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
                    const actionUrl = `/gp/endorse-nominee/${userId}`;
                    form.setAttribute('action', actionUrl);
                }
            }

            function submitSaveChangesForm() {
                document.getElementById('saveChangesForm').submit();
            }
        
    </script>
</body>
</html>
