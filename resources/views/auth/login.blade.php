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

        <div class="bglogin bg-[url('/public/img/login-bg-final.png')] w-full min-h-screen bg-cover flex justify-start">
            <div class="p-4 ml-14 mt-32">
                <div class="card bg-white h-96 w-96 rounded-md shadow-md">
                    <div class="bg-[url('/public/img/tesd-eo-logo.png')] bg-gray-200 w-full bg-cover bg-center border-2 h-20 p-4 flex justify-center items-center rounded-t-md" style="padding-top: 50px">
                    </div>

                    <div class="flex flex-col items-center justify-center p-4 space-y-4 text-sm mt-4">
                        <span class="text-gray-600">LOGIN YOUR ACCOUNT HERE</span>
                        <div class="w-64">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email"
                                class="p-1 border-2 border-black rounded-md w-full" required>
                            @error('email')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-64">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password"
                                class="p-1 border-2 border-black rounded-md w-full" required>
                            @error('password')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-700 hover:bg-blue-600 px-6 py-2 text-white rounded-md mt-4">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
