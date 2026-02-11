<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        primarySoft: '#eff6ff'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-primarySoft min-h-screen flex flex-col">

<!-- Navbar -->
<nav class="bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold text-white tracking-wide">
            Sistem Pengaduan
        </h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-white text-blue-600 font-semibold px-4 py-2 rounded-lg hover:bg-blue-50 transition">
                Logout
            </button>
        </form>

    </div>
</nav>

<!-- Content -->
<main class="flex-1 max-w-6xl mx-auto w-full px-6 py-8">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white text-center py-4 text-sm text-gray-500 shadow-inner">
    © {{ date('Y') }} Sistem Pengaduan Siswa
</footer>

</body>
</html>
