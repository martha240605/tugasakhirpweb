<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gradient-to-br from-emerald-900 via-green-800 to-black">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-green: #10b981;
            --secondary-green: #059669;
            --dark-green: #047857;
            --light-green: #34d399;
            --accent-green: #6ee7b7;
        }
        
        .glass-morphism {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        
        .glass-dark {
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .sidebar-glow {
            box-shadow: 0 0 50px rgba(var(--primary-green), 0.3), 
                        inset 0 0 50px rgba(0, 0, 0, 0.5);
        }
        
        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(var(--primary-green), 0.5);
            transform: translateY(-3px) scale(1.02);
        }
        
        .green-gradient {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 50%, var(--dark-green) 100%);
        }
        
        .green-gradient-reverse {
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--secondary-green) 50%, var(--primary-green) 100%);
        }
        
        .dark-gradient {
            background: linear-gradient(135deg, #1f2937 0%, #111827 50%, #000000 100%);
        }
        
        .ultra-dark-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #020617 50%, #000000 100%);
        }
        
        .neon-border {
            border: 2px solid transparent;
            background: linear-gradient(45deg, var(--primary-green), var(--light-green), var(--accent-green)) border-box;
            background-clip: padding-box, border-box;
        }
        
        .pulse-animation {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .glow-text {
            text-shadow: 0 0 20px rgba(var(--primary-green), 0.6);
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(var(--primary-green), 0.3);
        }
        
        .menu-item {
            position: relative;
            overflow: hidden;
        }
        
        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .menu-item:hover::before {
            left: 100%;
        }
        
        .badge {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
        }
        
        .icon-container {
            position: relative;
            overflow: hidden;
        }
        
        .icon-container::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s;
        }
        
        .group:hover .icon-container::after {
            width: 100%;
            height: 100%;
        }
        
        @keyframes pulse {
            0%, 100% { 
                opacity: 1;
                transform: scale(1);
            }
            50% { 
                opacity: 0.8;
                transform: scale(1.05);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .shimmer {
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-green), var(--light-green), var(--accent-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(var(--primary-green), 0.5), transparent);
            margin: 1rem 0;
        }
        
        .menu-section-title {
            font-size: 0.75rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
            padding-left: 1rem;
        }
        
        .scrollbar-custom {
            scrollbar-width: thin;
            scrollbar-color: var(--primary-green) rgba(255, 255, 255, 0.1);
        }
        
        .scrollbar-custom::-webkit-scrollbar {
            width: 6px;
        }
        
        .scrollbar-custom::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }
        
        .scrollbar-custom::-webkit-scrollbar-thumb {
            background: var(--primary-green);
            border-radius: 3px;
        }
        
        .scrollbar-custom::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-green);
        }
    </style>
</head>
<body class="font-sans antialiased h-full flex flex-col" style="font-family: 'Inter', sans-serif;">

    {{-- Main Container --}}
    <div class="min-h-screen bg-gradient-to-br from-emerald-900 via-green-800 to-black flex flex-col relative overflow-hidden">
        
        {{-- Enhanced Background Decorative Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-20 w-32 h-32 bg-gradient-to-r from-green-500/10 to-emerald-500/10 rounded-full blur-xl float-animation"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-gradient-to-r from-emerald-500/10 to-green-500/10 rounded-full blur-xl float-animation" style="animation-delay: -2s;"></div>
            <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-gradient-to-r from-green-400/10 to-emerald-400/10 rounded-full blur-xl float-animation" style="animation-delay: -4s;"></div>
            <div class="absolute top-1/4 right-1/4 w-16 h-16 bg-gradient-to-r from-green-300/10 to-emerald-300/10 rounded-full blur-xl float-animation" style="animation-delay: -1s;"></div>
        </div>

        {{-- Enhanced Header dengan Glass Morphism Effect --}}
        <header class="glass-morphism shadow-2xl flex-shrink-0 border-b border-green-500/20 relative z-10">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 green-gradient rounded-2xl flex items-center justify-center pulse-animation shadow-lg border border-green-400/30">
                            <i class="fas fa-bolt text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="font-bold text-3xl text-white leading-tight tracking-wide glow-text">
                                @yield('header_title', 'SPORT CENTER')
                            </h2>
                            <p class="text-green-300 text-sm font-medium">Professional Sports Management</p>
                        </div>
                    </div>
                    
                    {{-- Enhanced User Info di Header --}}
                    <div class="hidden sm:flex sm:items-center sm:ms-6 relative z-50">
                        <div class="glass-morphism rounded-full p-1 border border-green-400/30">
                            <span class="inline-flex items-center px-6 py-3 text-sm leading-4 font-semibold rounded-full text-white green-gradient focus:outline-none transition-all duration-300 relative z-50">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-r from-white/20 to-white/10 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-xs"></i>
                                    </div>
                                    <span class="font-medium">{{ Auth::user()->name }}</span>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Main Content Area --}}
        <div class="flex flex-1 overflow-hidden relative z-10">

            {{-- Ultra Modern Sporty Sidebar --}}
            <aside class="w-80 ultra-dark-gradient text-white flex-shrink-0 overflow-y-auto scrollbar-custom sidebar-glow flex flex-col border-r border-green-500/20">
                <div class="p-8 border-b border-green-500/20 flex-shrink-0">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 green-gradient rounded-2xl flex items-center justify-center shadow-lg border border-green-400/30">
                            <i class="fas fa-running text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold tracking-wider gradient-text">ADMIN</h1>
                            <p class="text-sm text-gray-300">Sport Management System</p>
                        </div>
                    </div>
                </div>
                
                <nav class="mt-8 px-6 flex-1 overflow-y-auto scrollbar-custom">
                    {{-- Main Menu Section --}}
                    <div class="menu-section-title">Main Menu</div>
                    <div class="space-y-3 mb-8">
                        <a href="{{ route('admin.dashboard') }}" class="menu-item group flex items-center px-6 py-4 text-gray-300 hover:bg-gradient-to-r hover:from-green-600/80 hover:to-green-700/80 hover:text-white rounded-2xl transition-all duration-300 hover-glow card-hover border border-transparent hover:border-green-500/30">
                            <div class="icon-container w-12 h-12 green-gradient rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-tachometer-alt text-white text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <span class="font-semibold text-base">Dashboard</span>
                                <p class="text-xs text-gray-400 group-hover:text-gray-200">Overview & Analytics</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.lapangan.index') }}" class="menu-item group flex items-center px-6 py-4 text-gray-300 hover:bg-gradient-to-r hover:from-green-600/80 hover:to-green-700/80 hover:text-white rounded-2xl transition-all duration-300 hover-glow card-hover border border-transparent hover:border-green-500/30">
                            <div class="icon-container w-12 h-12 green-gradient rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-futbol text-white text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <span class="font-semibold text-base">Lapangan</span>
                                <p class="text-xs text-gray-400 group-hover:text-gray-200">Manage Sports Fields</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.booking.index') }}" class="menu-item group flex items-center px-6 py-4 text-gray-300 hover:bg-gradient-to-r hover:from-green-600/80 hover:to-green-700/80 hover:text-white rounded-2xl transition-all duration-300 hover-glow card-hover border border-transparent hover:border-green-500/30">
                            <div class="icon-container w-12 h-12 green-gradient rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-calendar-check text-white text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <span class="font-semibold text-base">Booking</span>
                                <p class="text-xs text-gray-400 group-hover:text-gray-200">Reservations</p>
                            </div>
                            <div class="badge">New</div>
                        </a>
                        
                        <a href="{{ route('admin.users.index') }}" class="menu-item group flex items-center px-6 py-4 text-gray-300 hover:bg-gradient-to-r hover:from-green-600/80 hover:to-green-700/80 hover:text-white rounded-2xl transition-all duration-300 hover-glow card-hover border border-transparent hover:border-green-500/30">
                            <div class="icon-container w-12 h-12 green-gradient rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-users text-white text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <span class="font-semibold text-base">Pengguna</span>
                                <p class="text-xs text-gray-400 group-hover:text-gray-200">User Management</p>
                            </div>
                        </a>
                    </div>
                    
                    <div class="section-divider"></div>
                    
                    {{-- Financial Section --}}
                    <div class="menu-section-title">Financial</div>
                    <div class="space-y-3 mb-8">
                        <a href="{{ route('admin.transaksi.index') }}" class="menu-item group flex items-center px-6 py-4 text-gray-300 hover:bg-gradient-to-r hover:from-green-600/80 hover:to-green-700/80 hover:text-white rounded-2xl transition-all duration-300 hover-glow card-hover border border-transparent hover:border-green-500/30">
                            <div class="icon-container w-12 h-12 green-gradient rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-credit-card text-white text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <span class="font-semibold text-base">Transaksi</span>
                                <p class="text-xs text-gray-400 group-hover:text-gray-200">Payment Management</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.laporan.index') }}" class="menu-item group flex items-center px-6 py-4 text-gray-300 hover:bg-gradient-to-r hover:from-green-600/80 hover:to-green-700/80 hover:text-white rounded-2xl transition-all duration-300 hover-glow card-hover border border-transparent hover:border-green-500/30">
                            <div class="icon-container w-12 h-12 green-gradient rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-chart-line text-white text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <span class="font-semibold text-base">Laporan</span>
                                <p class="text-xs text-gray-400 group-hover:text-gray-200">Reports & Analytics</p>
                            </div>
                        </a>
                        
                    </div>
                </nav>

                {{-- Enhanced Logout Button --}}
                <div class="p-6 border-t border-green-500/20 flex-shrink-0">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-6 py-4 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 hover:-translate-y-1 border border-red-500/30">
                            <i class="fas fa-sign-out-alt mr-3 text-lg"></i>
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </aside>

            {{-- Main Content Area --}}
            <main class="flex-1 p-8 overflow-y-auto scrollbar-custom">
                {{-- Enhanced Flash Messages --}}
                @if(session('success'))
                    <div class="green-gradient text-white px-8 py-5 rounded-2xl relative mb-8 shadow-xl hover-glow border border-green-400/30" role="alert">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Success!</h4>
                                <span class="text-sm opacity-90">{{ session('success') }}</span>
                            </div>
                        </div>
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-5 rounded-2xl relative mb-8 shadow-xl hover-glow border border-red-400/30" role="alert">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Error!</h4>
                                <span class="text-sm opacity-90">{{ session('error') }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Enhanced Content dengan Glass Effect --}}
                <div class="glass-morphism rounded-3xl p-8 min-h-[600px] shadow-2xl card-hover flex flex-col border border-green-500/20">
                    @yield('content')

                    {{-- Enhanced Footer di dalam Content --}}
                    <footer class="ultra-dark-gradient text-gray-300 text-center py-8 text-sm flex-shrink-0 border-t border-green-500/20 mt-auto rounded-b-2xl">
                        <div class="flex items-center justify-center space-x-6">
                            <div class="flex items-center space-x-2">
                                <div class="w-6 h-6 green-gradient rounded-full flex items-center justify-center">
                                    <i class="fas fa-copyright text-white text-xs"></i>
                                </div>
                                <span class="font-medium">{{ date('Y') }} {{ config('app.name', 'Sport Center') }}</span>
                            </div>
                            <div class="w-1 h-1 bg-green-400 rounded-full"></div>
                            <span class="text-green-400 font-medium">Built with passion for sports</span>
                            <div class="w-1 h-1 bg-green-400 rounded-full"></div>
                            <span class="text-gray-400">v2.0</span>
                        </div>
                    </footer>
                </div>
            </main>
        </div>
    </div>

</body>
</html>