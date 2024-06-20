<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOEA Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/TOEA Logo.png') }}" type="image/png">
    <style>
        .folder {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
            text-align: center;
        }

        .folder i {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* padding: 20px; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: fixed;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .toggle-btn {
            position: absolute;
            top: 200px;
            left: 200px;
            width: 15px;
            height: 15px;
            z-index: 1000;
        }


        .logo-picture img,
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-name,
        .user-type {
            margin-bottom: 5px;
            text-align: center;
        }
        body {
            height: 100%;
            background: linear-gradient(to bottom, white, #0033ff);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .evaluate-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
        }

        .evaluate-btn:hover {
            background-color: #0056b3;
        }
        .remarks-input {
            width: 120px; /* Set the desired width for the input fields */
            transition: width 0.3s ease; /* Add a transition effect */
        }

        .remarks-textarea {
            display: none;
            width: 120px;
            height: 120px;
        }


        .legend {
            display: flex;
            justify-content: flex-start;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-color {
            width: 35px;
            height: 3px;
            margin-right: 8px;
        }

        .small-region {
            background-color: #FFC700;
        }

        .medium-region {
            background-color: #B1AFFF;
        }

        .large-region {
            background-color: #FF0000;
        }

    </style>
</head>

<body>
    <div>
        @include('components.eo-sidebar', [
            // 'profile-picture' => asset('img/tesda-logo.png'),
            'userName' => 'User Name',
            'userType' => 'User Type',
        ])
        <div class="ml-72 p-4">
            <h1 class="font-bold text-2xl">BEST REGIONAL OFFICE</h1>

            <div class="legend">
                <div class="legend-item">
                    <div class="legend-color small-region"></div>
                    <span>Small Region</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color medium-region"></div>
                    <span>Medium Region</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color large-region"></div>
                    <span>Large Region</span>
                </div>
            </div>

            <div class="card mt-4">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Region Name</th>
                                <th></th>
                                <th>Action</th>
                                <th></th>
                                <th>Percentage</th>
                                <th></th>
                                <th>Evaluated</th>
                                <th></th>
                                <th>Score</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Remarks</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($smallRegions as $region)
                            <tr class="category-small">
                                <td class="!border-b-2" style="border-color: #FFC700;">{{ $region->region_name }}</td>
                                <td></td>
                                <td>
                                    <button class="evaluate-btn"
                                        onclick="location.href='{{ route('evaluation', ['id' => $region->id]) }}'">
                                        Evaluate
                                    </button>
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty())
                                    {{ $region->evaluations->first()->progress_percentage ?? 0 }}%
                                    @else
                                    0%
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty() && $region->evaluations->first()->overall_total_filled !== null && $region->evaluations->first()->total_fields !== null)
                                    {{ $region->evaluations->first()->overall_total_filled }} / {{ $region->evaluations->first()->total_fields }}
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty())
                                    {{ $region->evaluations->first()->overall_total_score }}
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                                <td></td>
                                <td>
                                    <button class="evaluate-btn"
                                        onclick="location.href='{{ route('evaluation', ['id' => $region->id]) }}'">
                                        Evaluate
                                    </button>
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty())
                                    {{ $region->evaluations->first()->progress_percentage ?? 0 }}%
                                    @else
                                    0%
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty() && $region->evaluations->first()->overall_total_filled !== null && $region->evaluations->first()->total_fields !== null)
                                    {{ $region->evaluations->first()->overall_total_filled }} / {{ $region->evaluations->first()->total_fields }}
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty())
                                    {{ $region->evaluations->first()->overall_total_score }}
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
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

                            @foreach ($largeRegions as $region)
                            <tr class="category-large">
                                <td class="!border-b-2" style="border-color: #FF0000">{{ $region->region_name }}</td>
                                <td></td>
                                <td>
                                    <button class="evaluate-btn"
                                        onclick="location.href='{{ route('evaluation', ['id' => $region->id]) }}'">
                                        Evaluate
                                    </button>
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty())
                                    {{ $region->evaluations->first()->progress_percentage ?? 0 }}%
                                    @else
                                    0%
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty() && $region->evaluations->first()->overall_total_filled !== null && $region->evaluations->first()->total_fields !== null)
                                    {{ $region->evaluations->first()->overall_total_filled }} / {{ $region->evaluations->first()->total_fields }}
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if ($region->evaluations->isNotEmpty())
                                    {{ $region->evaluations->first()->overall_total_score }}
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </div>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('hidden');
        });
    </script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script>
          document.addEventListener('input', function(event) {
              if (event.target && event.target.matches('.remarks-input')) {
                  let regionId = event.target.dataset.regionId;
                  let finalRemarks = event.target.value;
  
                  axios.post('{{ route('save.remarks') }}', {
                      region_id: regionId,
                      final_remarks: finalRemarks,
                  })
                  .then(function(response) {
                      console.log(response.data);
                  })
                  .catch(function(error) {
                      console.error('Error saving remarks:', error);
                  });
              }
          });
      </script>
      <script>
        document.addEventListener('focusin', function(event) {
            if (event.target && event.target.matches('.remarks-input')) {
                let inputField = event.target;
                let regionId = inputField.dataset.regionId;
                let textarea = inputField.nextElementSibling;

                textarea.value = inputField.value;
                textarea.style.display = 'block';
                inputField.style.display = 'none';
                textarea.focus();
            }
        });

        document.addEventListener('focusout', function(event) {
            if (event.target && event.target.matches('.remarks-textarea')) {
                let textarea = event.target;
                let regionId = textarea.dataset.regionId;
                let inputField = textarea.previousElementSibling;

                inputField.value = textarea.value;
                textarea.style.display = 'none';
                inputField.style.display = 'block';

                axios.post('{{ route('save.remarks') }}', {
                    region_id: regionId,
                    final_remarks: textarea.value,
                })
                .then(function(response) {
                    console.log(response.data);
                })
                .catch(function(error) {
                    console.error('Error saving remarks:', error);
                });
            }
        });
    </script>
</body>

</html>
