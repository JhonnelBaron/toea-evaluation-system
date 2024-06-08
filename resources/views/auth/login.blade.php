<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Login</title>


</head>

<body>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="bglogin bg-[url('/public/img/login-bg.png')] w-full min-h-screen bg-cover flex justify-center">
            <div class="p-4 ml-72 mt-32">
                <div class="card bg-white h-96 w-96 rounded-md shadow-md">
                    <div class="bg-gray-200 w-full h-20 p-4 flex justify-center items-center rounded-t-md">
                        <h3 class="text-blue-700 text-center font-bold text-sm">
                            EXECUTIVE OFFICE EVALUTATION PORTAL
                        </h3>


                    </div>

                    <div class="flex flex-col items-center justify-center p-4 space-y-4 text-sm mt-4">
                        <span class="text-gray-600">LOGIN YOUR ACCOUNT HERE</span>
                        <div class="w-64">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                                class="p-1 border-2 border-black rounded-md w-full" required>
                        </div>
                        <div class="w-64">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password"
                                class="p-1 border-2 border-black rounded-md w-full" required>
                        </div>
                        <button type="submit" class="bg-blue-700 hover:bg-blue-600 px-6 py-2 text-white rounded-md mt-4">Login</button>
                    </div>
                </div>

            </div>


        </div>

        </div>
    </form>

</body>

</html>
