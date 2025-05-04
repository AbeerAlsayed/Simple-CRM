<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Dashboard</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS integration -->
</head>
<body class="bg-gray-50">

<div class="flex flex-col h-screen">

    <!-- Navbar -->
    <div class="bg-blue-600 text-white p-4 flex justify-between items-center shadow-md">
        <div class="flex items-center space-x-4">
            <!-- يمكنك إضافة شعار هنا إذا رغبت -->
            <h2 class="text-xl font-semibold">CRM Dashboard</h2>
        </div>
        <div class="flex items-center space-x-6">
            <!-- إشعارات -->
            <a href="#" class="hover:bg-blue-500 p-2 rounded-full transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path d="M19 19H5V6a2 2 0 012-2h10a2 2 0 012 2v13z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 13V6m0 0h-1a4 4 0 00-4 4v3"></path>
                </svg>
            </a>

            <!-- تسجيل الخروج -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:bg-blue-500 p-2 rounded-full transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M17 16l4-4m0 0l-4-4m4 4H7M21 12h-6"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <div class="flex flex-1">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen shadow-lg">
            <div class="py-6 px-6">
                <h2 class="text-xl font-semibold">CRM Dashboard</h2>
                <nav class="mt-6">
                    <ul>
                        <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 text-gray-300 hover:bg-blue-500 rounded-lg transition duration-300">Users</a></li>
                        <li><a href="{{ route('clients.index') }}" class="block py-2 px-4 text-gray-300 hover:bg-blue-500 rounded-lg transition duration-300">Clients</a></li>
                        <li><a href="{{ route('projects.index') }}" class="block py-2 px-4 text-gray-300 hover:bg-blue-500 rounded-lg transition duration-300">Projects</a></li>
                        <li><a href="{{ route('tasks.index') }}" class="block py-2 px-4 text-gray-300 hover:bg-blue-500 rounded-lg transition duration-300">Tasks</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-white shadow-md rounded-lg">
            @yield('content')
        </div>
    </div>

</div>
</body>
</html>
