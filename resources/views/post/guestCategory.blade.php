<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luvitus</title>
    <!-- Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    .flip-card {
      background-color: transparent;
      width: 300px;
      height: 300px;
      perspective: 1000px;
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
    }
    .flip-card-front {
        overflow: hidden;
    }
    .flip-card-back {
      transform: rotateY(180deg);
    }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ url('/') }}">
                                <div class="p-5 text-xl bg-slate-300 text-slate-500">
                                    Luvitus
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center">
                        <!-- Links for guests -->
                        <div class="space-x-4">
                            <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700">Dashboard</a>
                            <a href="{{ url('guest/category') }}" class="text-gray-500 hover:text-gray-700">Category</a>
                            <a href="{{ url('auth/google') }}" class="font-semibold text-gray-600">Log in</a>
                        </div>
                    </div>

                    <div class="-me-2 flex items-center sm:hidden">
                         <!-- Hamburger for mobile -->
                        <div class="flex items-center -me-2 sm:hidden text-black">
                            <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>

                        <div id="mobile-menu" class="z-10 w-full h-full bg-slate-300 font-bold absolute hidden sm:hidden" style="left: 0; top: 0;">
                            <div class="pt-2 pb-3 space-y-1">
                                <button id="mobile-menu-close" class="inline-flex items-center p-2 text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out text-5xl flex justify-end w-full">
                                    &times;
                                </button>
                                <a href="{{ url('/') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Home</a>
                                <a href="{{ url('guest/category') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out">Category</a>
                                <a href="{{ url('auth/google') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Log in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <section class="py-5 px-10 md:p-5 grid grid-cols-1 md:grid-cols-5 gap-5">
                            <a href="{{url('guest/category/Mechanic Keyboard')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Mechanic Keyboard</a>
                            <a href="{{url('guest/category/Wireless Keyboard')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Wireless Keyboard</a>
                            <a href="{{url('guest/category/Wired Keyboard')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Wired Keyboard</a>
                            <a href="{{url('guest/category/Wireless Mouse')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Wireless Mouse</a>
                            <a href="{{url('guest/category/Wired Mouse')}}" class="px-10 py-5 shadow-xl rounded-lg bg-slate-200 flex justify-center items-center font-bold">Wired Mouse</a>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
    document.getElementById('mobile-menu-close').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>