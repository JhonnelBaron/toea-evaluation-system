<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pillar A</title>
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
                <h1 class="text-gray-800 font-bold text-3xl ml-4">BEST TRAINING INSTITUTION - REGION NAME</h1> 
                <img class="w-20 h-20" src="{{ asset('img/tsda.png') }}">
            </div>
            
            <div class="flex items-center ml-6">
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/besttiadmin-a" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">A</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/besttiadmin-b" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">B</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-blue-400 rounded-full cursor-pointer">
                  <a href="/besttiadmin-c" class="block h-full w-full flex items-center justify-center">
                    <span class="text-gray-200 font-bold text-xs">C</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/besttiadmin-d" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">D</span>
                  </a>
                </div>
                <div class="h-0.5 w-24 bg-gray-500"></div>
                <div class="relative h-8 w-8 flex items-center justify-center bg-gray-500 rounded-full cursor-pointer">
                  <a href="/besttiadmin-e" class="block h-full w-full flex items-center justify-center">
                    <span class="text-white font-bold text-xs">E</span>
                  </a>
                </div>
              </div>
              
              
            <div class="content bg-white shadow-md min-h-96 p-4 mt-4 overflow-x-auto">
                <div id="evaluated" class="tab-content">
                    <table id="regionTable" class="mx-auto">
                        <thead class="bg-blue-300 text-sm">
                            <tr>
                                <th>Category</th>
                                <th>View Attachment</th>
                                <th>Means of Verification</th>
                                <th>Final Score</th>
                                <th>Remarks</th>
                                <th>ROMD Evaluated Score</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>

                            
                        </tbody>
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