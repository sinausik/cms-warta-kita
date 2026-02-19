<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'WartaWarga - Portal Berita Citizen Journalist')</title>
    <link rel="icon" href="{{ asset('img/favicon_io/favicon.ico') }}" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    @stack('seo')
</head>
<body class="bg-gray-50 font-[Inter] antialiased text-gray-900">

    <nav class="sticky top-0 z-50 border-b border-gray-200 bg-white/80 backdrop-blur-md">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="/" class="text-2xl font-extrabold tracking-tighter text-blue-600">
                Warta<span class="text-gray-900">Kita.</span>
            </a>
            <div class="flex items-center gap-6">
                <a href="/admin/login" class="text-sm font-semibold text-gray-600 hover:text-blue-600">Tulis Berita</a>
                <a href="/admin/register" class="rounded-full bg-blue-600 px-5 py-2 text-sm font-bold text-white transition hover:bg-blue-700">
                    Gabung Jadi Penulis
                </a>
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-200 bg-white py-12 mt-20">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-gray-500 text-sm">© 2026 WartaKita. Citizen Journalism by RCH Techno</p>
        </div>
    </footer>

</body>
</html>