<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                         
                 <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                     <span class="sr-only">Open sidebar</span>
                     <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                     </svg>
                  </button>
                  
                  <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
                     <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                        <ul class="space-y-2 font-medium">
                             <li>
                                 <a href="/" class="flex items-center pl-2.5 mb-5">
                                     <span class="self-center text-xl font-semibold whitespace-nowrap">Student Management</span>
                                  </a>
                             </li>
                           <li>
                              <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                 <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                                 </svg>
                                 <span class="ml-3">Dashboard</span>
                              </a>
                           </li>
                          <x-dashboard.dropdown name="Student" url_create="{{ route('student.create') }}" url_info="{{ route('student.index') }}"/>
                          <x-dashboard.dropdown name="Teacher" url_create="{{ route('teacher.create') }}" url_info="{{ route('teacher.index') }}"/>
                          <x-dashboard.dropdown name="Major" url_create="{{ route('major.create') }}" url_info="{{ route('major.index') }}"/>
                          <x-dashboard.dropdown name="Room" url_create="#" url_info="#"/>
                          <x-dashboard.dropdown name="Invite Admin" url_create="#" url_info="#"/>
                         <li>
                             <x-buttons.logout/>
                         </li>
                        </ul>
                     </div>
                  </aside>
                  
                  <div class="p-4 sm:ml-64">
                     {{ $slot }}
                  </div>
        
            </main>
        </div>
    </body>
</html>
