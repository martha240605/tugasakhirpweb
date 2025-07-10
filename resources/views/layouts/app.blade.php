<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gradient-to-br from-emerald-900 via-green-800 to-black">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-green: #10b981;
            --secondary-green: #059669;
            --dark-green: #047857;
            --light-green: #34d399;
            --accent-green: #6ee7b7;
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.1);
            --dark-glass: rgba(0, 0, 0, 0.4);
        }
        
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #064e3b 0%, #065f46 25%, #047857 50%, #059669 75%, #10b981 100%);
            background-attachment: fixed;
            min-height: 100vh;
        }
        
        .glass-morphism {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        
        .glass-dark {
            background: var(--dark-glass);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .green-gradient {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--secondary-green) 50%, var(--dark-green) 100%);
        }
        
        .green-gradient-reverse {
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--secondary-green) 50%, var(--primary-green) 100%);
        }
        
        .floating-orb {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(16, 185, 129, 0.2), rgba(16, 185, 129, 0.05));
            filter: blur(1px);
            animation: float 8s ease-in-out infinite;
        }
        
        .floating-orb:nth-child(1) { width: 200px; height: 200px; top: 10%; left: 10%; animation-delay: 0s; }
        .floating-orb:nth-child(2) { width: 150px; height: 150px; top: 60%; right: 15%; animation-delay: -2s; }
        .floating-orb:nth-child(3) { width: 100px; height: 100px; bottom: 20%; left: 20%; animation-delay: -4s; }
        .floating-orb:nth-child(4) { width: 80px; height: 80px; top: 30%; right: 30%; animation-delay: -6s; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-20px) rotate(90deg); }
            50% { transform: translateY(-10px) rotate(180deg); }
            75% { transform: translateY(-30px) rotate(270deg); }
        }
        
        .pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }
        
        @keyframes pulse-glow {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(16, 185, 129, 0.3);
                transform: scale(1);
            }
            50% { 
                box-shadow: 0 0 40px rgba(16, 185, 129, 0.6);
                transform: scale(1.02);
            }
        }
        
        .slide-in {
            animation: slideIn 0.8s ease-out;
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeIn 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-green), var(--light-green), var(--accent-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }
        
        .glow-text {
            text-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.2);
            transition: all 0.3s ease;
        }
        
        .modern-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.2);
            border-color: rgba(16, 185, 129, 0.3);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.5);
            background: linear-gradient(135deg, var(--secondary-green), var(--dark-green));
        }
        
        .scrollbar-custom {
            scrollbar-width: thin;
            scrollbar-color: var(--primary-green) rgba(255, 255, 255, 0.1);
        }
        
        .scrollbar-custom::-webkit-scrollbar {
            width: 8px;
        }
        
        .scrollbar-custom::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        
        .scrollbar-custom::-webkit-scrollbar-thumb {
            background: var(--primary-green);
            border-radius: 4px;
        }
        
        .scrollbar-custom::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-green);
        }
        
        .notification-badge {
            position: relative;
            overflow: hidden;
        }
        
        .notification-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .notification-badge:hover::before {
            left: 100%;
        }
        
        .modern-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            color: white;
            transition: all 0.3s ease;
        }
        
        .modern-input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            background: rgba(255, 255, 255, 0.08);
        }
        
        .modern-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--primary-green);
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.5), transparent);
            margin: 2rem 0;
        }
        
        .hero-pattern {
            background-image: radial-gradient(circle at 25% 25%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                              radial-gradient(circle at 75% 75%, rgba(52, 211, 153, 0.1) 0%, transparent 50%);
            background-size: 100px 100px;
            background-position: 0 0, 50px 50px;
        }
        
        .mobile-menu-overlay {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        @media (max-width: 768px) {
            .floating-orb { display: none; }
            .glass-morphism { backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); }
        }
        
        /* Dark mode improvements */
        @media (prefers-color-scheme: dark) {
            .modern-card {
                background: rgba(0, 0, 0, 0.6);
                border-color: rgba(255, 255, 255, 0.1);
            }
        }
        
        /* High contrast mode */
        @media (prefers-contrast: high) {
            .glass-morphism {
                background: rgba(255, 255, 255, 0.15);
                border: 2px solid rgba(255, 255, 255, 0.3);
            }
            
            .gradient-text {
                -webkit-text-fill-color: #10b981;
                color: #10b981;
            }
        }
        
        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="font-sans antialiased min-h-screen relative overflow-x-hidden">
    <!-- Floating Background Orbs -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="floating-orb"></div>
        <div class="floating-orb"></div>
        <div class="floating-orb"></div>
        <div class="floating-orb"></div>
    </div>
    
    <!-- Hero Pattern Background -->
    <div class="fixed inset-0 hero-pattern pointer-events-none z-0"></div>
    
    <!-- Main Container -->
    <div class="min-h-screen relative z-10">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="glass-morphism shadow-2xl border-b border-green-500/20 slide-in">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 green-gradient rounded-xl flex items-center justify-center pulse-glow">
                            <i class="fas fa-star text-white text-lg"></i>
                        </div>
                        <div class="text-white">
                            {{ $header }}
                        </div>
                    </div>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="py-8 px-4 sm:px-6 lg:px-8 fade-in">
            <div class="max-w-7xl mx-auto">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="modern-card bg-gradient-to-r from-green-500/80 to-green-600/80 text-white p-6 mb-6 hover-lift notification-badge">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Success!</h4>
                                <p class="text-sm opacity-90">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="modern-card bg-gradient-to-r from-red-500/80 to-red-600/80 text-white p-6 mb-6 hover-lift notification-badge">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Error!</h4>
                                <p class="text-sm opacity-90">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('warning'))
                    <div class="modern-card bg-gradient-to-r from-yellow-500/80 to-yellow-600/80 text-white p-6 mb-6 hover-lift notification-badge">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-exclamation-circle text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Warning!</h4>
                                <p class="text-sm opacity-90">{{ session('warning') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('info'))
                    <div class="modern-card bg-gradient-to-r from-blue-500/80 to-blue-600/80 text-white p-6 mb-6 hover-lift notification-badge">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-info-circle text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Info!</h4>
                                <p class="text-sm opacity-90">{{ session('info') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Main Content Slot -->
                <div class="modern-card p-8 min-h-[600px] hover-lift scrollbar-custom">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="glass-morphism border-t border-green-500/20 mt-16">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="w-8 h-8 green-gradient rounded-full flex items-center justify-center">
                            <i class="fas fa-bolt text-white text-sm"></i>
                        </div>
                        <div class="text-white">
                            <h3 class="font-bold gradient-text">{{ config('app.name', 'Sport Center') }}</h3>
                            <p class="text-sm text-gray-300">Professional Sports Management</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-6 text-gray-300">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-copyright text-green-400"></i>
                            <span class="text-sm">{{ date('Y') }} All rights reserved</span>
                        </div>
                        <div class="w-1 h-1 bg-green-400 rounded-full"></div>
                        <span class="text-sm text-green-400 font-medium">v2.0</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Loading Overlay (Optional) -->
    <div id="loading-overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div class="glass-morphism p-8 rounded-2xl flex items-center space-x-4">
            <div class="loading-spinner"></div>
            <span class="text-white font-medium">Loading...</span>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Add loading states and smooth transitions
        document.addEventListener('DOMContentLoaded', function() {
            // Add fade-in animation to elements
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Add smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Auto-hide flash messages
            setTimeout(() => {
                const flashMessages = document.querySelectorAll('[class*="from-green-500"], [class*="from-red-500"], [class*="from-yellow-500"], [class*="from-blue-500"]');
                flashMessages.forEach(msg => {
                    if (msg.closest('.modern-card')) {
                        msg.style.transition = 'opacity 0.5s ease';
                        msg.style.opacity = '0';
                        setTimeout(() => msg.remove(), 500);
                    }
                });
            }, 5000);
        });
        
        // Loading overlay functions
        function showLoading() {
            document.getElementById('loading-overlay').classList.remove('hidden');
        }
        
        function hideLoading() {
            document.getElementById('loading-overlay').classList.add('hidden');
        }
        
        // Add form loading states
        document.addEventListener('submit', function(e) {
            if (e.target.tagName === 'FORM') {
                showLoading();
            }
        });
        
        // Hide loading on page load
        window.addEventListener('load', function() {
            hideLoading();
        });
    </script>
</body>
</html>