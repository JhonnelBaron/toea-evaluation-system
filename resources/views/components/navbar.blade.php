 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
    @vite('resources/css/app.css')
    <title>Document</title>
    <nav class="bg-white border-gray-200 dark:bg-gray-900 border-b border-gray-300">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto pr-4 pl-4 font-family: sans-serif;">
      <a class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src='/img/toea-logo.png' class="h-10" alt="Flowbite Logo" />
          <span class="self-center text-xs max-w-xs font-semibold whitespace-nowrap dark:text-gray-600"><b>Tesda Organizational<br>Excellence Award</b></span>
      </a>
      <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
          <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="/img/user.png" alt="user photo">
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 transition-opacity duration-500 group-hover:opacity-100 group-hover:visible" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-black">{{ Auth::user()->name }}</span>
              <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email}}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-white-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white-200 dark:hover:text-black">Settings</a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="block w-full px-4 py-2 text-sm text-white-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white-200 dark:hover:text-black text-left">Sign out</button>
                </form>
              </li>
            </ul>
          </div>
          <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="flex flex-col font-medium p-2 md:p-0 mt-2 mb-2 md:space-x-10 rtl:space-x-reverse md:flex-row md:bg-white relative">
          <li>
              <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
          </li>
          <li>
            <a href="{{ route('romd.progress') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">BRO</a>
          </li>
          <div class="relative group ">
              <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">
                Galing Proinsya
              </a>
              <ul class="absolute hidden bg-white border border-gray-200 -mt-1 py-1 w-48 rounded-md shadow-lg z-10 transition-opacity duration-500 group-hover:opacity-100">
                <!-- Dropdown items -->
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Summary</a></li>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Evaluate</a></li>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Category</a></li>
                <!-- Add more items as needed -->
              </ul>
            </div>
            <div class="relative group">
              <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">
                Best TI's
              </a>
              <ul class="absolute hidden bg-white border border-gray-200 -mt-1 py-1 w-48 rounded-md shadow-lg z-10">
                <!-- Dropdown items -->
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Summary</a></li>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Evaluate</a></li>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Category</a></li>
                <!-- Add more items as needed -->
              </ul>
            </div>
          <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">Evaluate</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
</head>

<style>
  /* Ensure dropdown is visible on hover */
  .group:hover .absolute {
    display: block;
  }
</style>


<body>
 
</body>


<script>
 document.getElementById('user-menu-button').addEventListener('click', function (event) {
    event.preventDefault();
    var dropdown = document.getElementById('user-dropdown');
    if (dropdown.classList.contains('hidden')) {
        dropdown.classList.remove('hidden');
        setTimeout(() => {
            dropdown.classList.remove('opacity-0', 'scale-95');
        }, 10);
    } else {
        dropdown.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            dropdown.classList.add('hidden');
        }, 200);
    }
    });

    window.addEventListener('click', function (e) {
        var dropdown = document.getElementById('user-dropdown');
        var button = document.getElementById('user-menu-button');
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdown.classList.add('hidden');
            }, 200);
        }
    });

  </script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@1.4.1/dist/flowbite.min.js"></script>
</html>
