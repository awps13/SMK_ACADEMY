<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMK Academy') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">

    <!-- HP sidebar -->
    <button id="toggleSidebar" class="lg:hidden p-4 text-green-700">
        <i class="fas fa-bars fa-lg"></i>
    </button>

    <!-- sidebar overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

    <div class="flex flex-col lg:flex-row min-h-screen">

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-green-700 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-50">

            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/LogoSA.png') }}" alt="Logo" class="w-10 h-10">
                    <h1 class="text-xl font-bold">SMK Academy</h1>
                </div>
            </div>

            <nav class="mt-6 space-y-2 px-4 text-sm">
                @auth
                    @if(Auth::user()->isStudent())
                        <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-home w-4"></i> Dashboard
                        </a>
                        <a href="{{ route('student.materi.index') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-book-open w-4"></i> Materi
                        </a>
                        <a href="{{ route('student.materi.saya') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-folder-open w-4"></i> Materi Saya
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-user w-4"></i> Profil
                        </a>
                    @elseif(Auth::user()->isTeacher())
                        <a href="{{ route('teacher.dashboard') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-home w-4"></i> Dashboard
                        </a>
                        <a href="{{ route('teacher.materi.index') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-book w-4"></i> Kelola Materi
                        </a>
                        <a href="{{ route('teacher.users.index') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-users w-4"></i> Kelola User
                        </a>
                        <a href="{{ route('teacher.diskusi.index') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-comments w-4"></i> Diskusi
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-green-600 transition-all">
                            <i class="fas fa-user w-4"></i> Profil
                        </a>
                    @endif
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="flex items-center gap-3 py-2 px-4 rounded-lg hover:bg-red-600 transition-all">
                        <i class="fas fa-sign-out-alt w-4"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endauth
            </nav>

        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:ml-64">
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-1 p-4 sm:p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const toggleSidebar = document.getElementById('toggleSidebar');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>
</body>
</html>
