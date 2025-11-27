<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EGMS Dashboard')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'slate-950': '#0F172A',
                        'slate-900': '#1E293B',
                        'slate-850': '#1a1a2e',
                        'slate-825': '#16213e',
                        'slate-800': '#334155',
                        'slate-700': '#475569',
                        'slate-600': '#64748B',
                        'slate-400': '#94A3B8',
                        'slate-200': '#E2E8F0',
                        'slate-100': '#F8FAFC',
                        'orange-500': '#f97316',
                        'orange-600': '#ea580c',
                    },
                    fontFamily: {
                        'inter': ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                        'nunito': ['Nunito', 'sans-serif'],
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'pulse-slow': 'pulse 2s infinite',
                        'spin-slow': 'spin 1s linear infinite',
                        'float': 'subtleFloat 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            from: { opacity: '0', transform: 'translateY(20px)' },
                            to: { opacity: '1', transform: 'translateY(0)' },
                        },
                        subtleFloat: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-2px)' },
                        },
                    },
                    boxShadow: {
                        'card': '0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.1)',
                        'card-hover': '0 18px 32px rgba(2, 6, 23, 0.55)',
                        'sidebar': '0 8px 32px rgba(0, 0, 0, 0.3), 0 2px 8px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.1)',
                    },
                },
            },
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.05); }
        ::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.2); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.3); }
        
        /* Sidebar fixed position */
        .sidebar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 1000;
        }
        
        /* Content margin for fixed sidebar */
        .content-with-sidebar {
            margin-left: 224px;
            width: calc(100% - 224px);
        }
        
        /* Mobile sidebar */
        @media (max-width: 768px) {
            .sidebar-fixed {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar-fixed.mobile-open {
                transform: translateX(0);
            }
            .content-with-sidebar {
                margin-left: 0;
                width: 100%;
            }
        }
        
        /* Pulse animation for status indicators */
        @keyframes statusPulse {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }
        
        .status-pulse { animation: statusPulse 2s infinite; }
        
        /* Sidebar nav hover effects */
        .nav-link-hover:hover {
            background: rgba(251, 146, 60, 0.1) !important;
            transform: translateX(3px);
        }
        .nav-link-hover:hover i { color: #f97316 !important; }
        .nav-link-hover:hover span { color: #f97316 !important; }
    </style>
    
    @yield('styles')
</head>
<body class="font-nunito bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 min-h-screen overflow-x-hidden">

    <div class="flex">
        <!-- Sidebar -->
        <nav class="sidebar-fixed w-56 bg-gradient-to-b from-slate-850 via-slate-825 to-slate-950 shadow-sidebar backdrop-blur-xl" id="sidebar">
            
            <!-- Brand -->
            <a href="{{ route('admin.dashboardtest') }}" class="flex items-center justify-between p-6 bg-white/5 border-b border-white/10 backdrop-blur-lg rounded-b-2xl mx-3 mb-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mr-3 shadow-lg animate-float">
                        <i class="fas fa-desktop text-white text-xl"></i>
                    </div>
                    <span class="text-white font-extrabold text-xl tracking-wide">EGMS</span>
                </div>
            </a>

            <!-- Divider -->
            <hr class="border-white/10 mx-5 my-0">

            <!-- Navigation -->
            <ul class="space-y-1 px-4 mt-4">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboardtest') }}" class="nav-link-hover flex items-center px-5 py-4 rounded-lg transition-all duration-300 @if(request()->routeIs('admin.dashboardtest') || request()->routeIs('dashboardtest')) bg-white/5 @endif">
                        <i class="fas fa-tachometer-alt text-lg mr-4 @if(request()->routeIs('admin.dashboardtest') || request()->routeIs('dashboardtest')) text-orange-500 @else text-white/70 @endif"></i>
                        <span class="text-sm font-semibold @if(request()->routeIs('admin.dashboardtest') || request()->routeIs('dashboardtest')) text-white @else text-white/90 @endif">Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="border-white/10 my-4">

                <!-- Manage Devices -->
                <li>
                    <a href="{{ route('devices.index') }}" class="nav-link-hover flex items-center px-5 py-4 rounded-lg transition-all duration-300 @if(request()->routeIs('devices.*')) bg-white/5 @endif">
                        <i class="fas fa-network-wired text-lg mr-4 @if(request()->routeIs('devices.*')) text-orange-500 @else text-white/70 @endif"></i>
                        <span class="text-sm font-medium @if(request()->routeIs('devices.*')) text-white @else text-white/90 @endif">Manage Devices</span>
                    </a>
                </li>

                <!-- Analytics -->
                <li>
                    <a href="{{ route('analytics.index') }}" class="nav-link-hover flex items-center px-5 py-4 rounded-lg transition-all duration-300 @if(request()->routeIs('analytics.*')) bg-white/5 @endif">
                        <i class="fas fa-chart-area text-lg mr-4 @if(request()->routeIs('analytics.*')) text-orange-500 @else text-white/70 @endif"></i>
                        <span class="text-sm font-medium @if(request()->routeIs('analytics.*')) text-white @else text-white/90 @endif">Analytics</span>
                    </a>
                </li>

                <!-- Alert Settings -->
                <li>
                    <a href="{{ route('settings.alerts') }}" class="nav-link-hover flex items-center px-5 py-4 rounded-lg transition-all duration-300 @if(request()->routeIs('settings.*')) bg-white/5 @endif">
                        <i class="fas fa-cog text-lg mr-4 @if(request()->routeIs('settings.*')) text-orange-500 @else text-white/70 @endif"></i>
                        <span class="text-sm font-medium @if(request()->routeIs('settings.*')) text-white @else text-white/90 @endif">Alert Settings</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="border-white/10 my-4">
            </ul>
        </nav>

        <!-- Content Wrapper -->
        <div class="content-with-sidebar flex flex-col min-h-screen w-full">
            
            <!-- Topbar -->
            <nav class="bg-gradient-to-r from-slate-900 to-slate-800 border-b border-white/10 backdrop-blur-xl sticky top-0 z-50 shadow-lg">
                <div class="flex items-center justify-between px-4 py-3">
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-white p-2" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <!-- Spacer -->
                    <div class="flex-1"></div>
                    
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button onclick="toggleUserDropdown()" class="flex items-center text-white/90 hover:text-white transition-colors">
                            <span class="mr-3 text-sm hidden lg:inline">Administrator</span>
                            <img class="w-10 h-10 rounded-full border-2 border-white/20" src="{{ asset('assets/admin/img/admin.png') }}" alt="Admin">
                            <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-gradient-to-br from-slate-900 to-slate-800 border border-white/10 rounded-xl shadow-xl backdrop-blur-xl overflow-hidden">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-3 text-white/90 hover:bg-white/10 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3 text-white/70"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="flex-1 p-4 md:p-6">
                @yield('content')
            </main>

            <!-- Footer (optional) -->
            @hasSection('footer')
                <footer class="bg-gradient-to-r from-slate-900 to-slate-800 border-t border-white/10 py-4 px-6">
                    @yield('footer')
                </footer>
            @endif
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-gradient-to-br from-slate-900 to-slate-800 border border-white/10 rounded-2xl p-6 max-w-md w-full mx-4 shadow-2xl">
            <h5 class="text-xl font-bold text-white mb-4">Ready to Leave?</h5>
            <p class="text-white/70 mb-6">Select "Logout" below if you are ready to end your current session.</p>
            <div class="flex justify-end gap-3">
                <button onclick="closeLogoutModal()" class="px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-colors">Cancel</button>
                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg hover:shadow-lg transition-all">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="hidden fixed inset-0 bg-black/50 z-40 md:hidden" onclick="toggleSidebar()"></div>

    <!-- Outage Notification Component -->
    @include('components.outage-notification')

    <script>
        // Toggle user dropdown
        function toggleUserDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('userDropdown');
            const button = e.target.closest('button');
            if (!button || !button.onclick || button.onclick.toString().indexOf('toggleUserDropdown') === -1) {
                if (!e.target.closest('#userDropdown')) {
                    dropdown.classList.add('hidden');
                }
            }
        });

        // Toggle mobile sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('mobile-open');
            overlay.classList.toggle('hidden');
        }

        // Logout modal functions
        function openLogoutModal() {
            document.getElementById('logoutModal').classList.remove('hidden');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.add('hidden');
        }
    </script>

    @yield('scripts')
</body>
</html>

