<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Todo List App</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            /* Ganti dengan URL gambar latar belakang atau warna solid yang Anda inginkan */
            background: url('https://r4.wallpaperflare.com/wallpaper/885/751/661/rain-artwork-women-earring-wallpaper-9b06dcbde3413ff955041b099dec4cf0.jpg') center/cover no-repeat; /* Ganti dengan URL gambar Anda */
            /* Atau, gunakan warna solid, contoh: background-color: #3490dc; */
        }

        .welcome-message {
            text-align: center;
            color: #ffffff; /* Warna teks untuk kontras dengan latar belakang */
        }

        .welcome-message h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #B6C4B6;
            /* Animasi bergerak menggunakan keyframes */
            animation: moveUpDown 2s infinite alternate;
        }

        .welcome-message p {
            margin-top: 1rem;
            font-size: 1.25rem;
            color: #B6C4B6;
            /* Animasi bergerak menggunakan keyframes */
            animation: moveLeftRight 2s infinite alternate;
        }

        /* Definisi keyframes untuk animasi */
        @keyframes moveUpDown {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(10px); /* Ubah sesuai dengan gerakan yang diinginkan */
            }
        }

        @keyframes moveLeftRight {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(10px); /* Ubah sesuai dengan gerakan yang diinginkan */
            }
        }
    </style>    
</head>
<body>
        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

    <div class="welcome-message">
        <h1>Welcome to Todo List App</h1>
        <p>Organize your tasks and get things done!</p>
    </div>
</body>
</html>
