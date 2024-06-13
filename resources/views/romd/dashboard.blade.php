<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>ROMD</title>

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
    </style>
</head>
<body class="bg-blue-700">
    <div>
        @include('components.sidebar', [
            'userName' => 'User Name',
            'userType' => 'User Type'
        ])
        <div class="ml-72 p-4">
            <div class="flex justify-between items-center w-full p-2">
                <h1 class="text-white font-bold text-3xl">BEST Institutions - RTC/STC</h1>
                <img class="w-20 h-20" src="{{ asset('img/tesda-logo-white.png') }}">
            </div>

            <div class="mx-auto mb-4">
                <ul class="flex flex-wrap justify-center items-center">
                    <li class="tab">
                        <a href="#" data-tab="submission" class="tab-link p-4 text-white">Submission</a>
                    </li>
                    <li class="tab">
                        <a href="#" data-tab="evaluated" class="tab-link p-4 text-white">Evaluated</a>
                    </li>
                    <li class="tab">
                        <a href="#" data-tab="rankings" class="tab-link p-4 text-white">Rankings</a>
                    </li>
                </ul>
            </div>

            <div class="content bg-white shadow-md min-h-96 p-4 mt-4">
                <div id="submission" class="tab-content">
                    <table class="mx-auto">
                        <thead class="bg-blue-300 text-sm">
                            <tr> 
                                <th class="px-6 py-3">Region</th>
                                <th class="px-6 py-3">Type</th>
                                <th class="px-6 py-3">Institution</th>
                                <th class="px-6 py-3">Date Submitted</th>
                                <th class="px-6 py-3">Hard Copy</th>
                                <th class="px-6 py-3">Action</th>
                                <th class="px-6 py-3">Percentage</th>
                                <th class="px-6 py-3">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-3">
                                    Region 1

                                </td>
                            </tr>
                        </tbody>
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
            const tabContents = document.querySelectorAll('.tab-content');

            tabLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Remove the hidden class from all tab contents
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Add the hidden class to all tab links
                    tabLinks.forEach(link => {
                        link.classList.remove('border-b-2', 'font-bold', 'border-white');
                    });

                    // Show the clicked tab content
                    const targetId = this.getAttribute('data-tab');
                    document.getElementById(targetId).classList.remove('hidden');

                    // Highlight the clicked tab
                    this.classList.add('border-b-2', 'font-bold', 'border-white');
                });
            });

            // Trigger the first tab to be active by default
            if (tabLinks.length > 0) {
                tabLinks[0].click();
            }
        });
    </script>
</body>
</html>
