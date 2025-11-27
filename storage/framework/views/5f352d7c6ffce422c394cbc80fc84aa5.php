<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Dashboard - EGMS</title>

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
                        'inter': ['Inter', 'sans-serif'],
                        'nunito': ['Nunito', 'sans-serif'],
                    },
                },
            },
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255, 255, 255, 0.05); }
        ::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.2); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.3); }
        
        /* Sidebar fixed */
        .sidebar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 1000;
        }
        
        .content-with-sidebar {
            margin-left: 224px;
            width: calc(100% - 224px);
        }
        
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
        
        /* Pulse animation */
        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
        }
        .status-pulse { animation: pulse 2s infinite; }
        
        /* Card animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.6s ease-out; }
        
        /* Float animation */
        @keyframes subtleFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-2px); }
        }
        .animate-float { animation: subtleFloat 3s ease-in-out infinite; }
        
        /* Nav hover effects */
        .nav-link-hover:hover {
            background: rgba(251, 146, 60, 0.1) !important;
            transform: translateX(3px);
        }
        .nav-link-hover:hover i { color: #f97316 !important; }
        .nav-link-hover:hover span { color: #f97316 !important; }
    </style>
</head>

<body class="font-nunito bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 min-h-screen overflow-x-hidden">

    <div class="flex">
        <!-- Sidebar -->
        <nav class="sidebar-fixed w-56 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-slate-950 shadow-[0_8px_32px_rgba(0,0,0,0.3),inset_0_1px_0_rgba(255,255,255,0.1)] backdrop-blur-xl" id="sidebar">
            
            <!-- Brand -->
            <a href="<?php echo e(route('admin.dashboardtest')); ?>" class="flex items-center justify-between p-6 bg-white/5 border-b border-white/10 backdrop-blur-lg rounded-b-2xl mx-3 mb-4 no-underline">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mr-3 shadow-[0_8px_25px_rgba(249,115,22,0.4)] animate-float">
                        <i class="fas fa-desktop text-white text-xl"></i>
                    </div>
                    <span class="text-white font-extrabold text-xl tracking-wide">EGMS</span>
                </div>
            </a>

            <!-- Divider -->
            <hr class="border-white/10 mx-5 my-0">

            <!-- Navigation -->
            <ul class="space-y-1 px-4 mt-2 list-none">
                <!-- Dashboard (Active) -->
                <li class="my-2">
                    <a href="#" class="nav-link-hover flex items-center px-5 py-4 rounded-lg transition-all duration-300 bg-white/5 no-underline">
                        <i class="fas fa-tachometer-alt text-lg mr-4 text-orange-500"></i>
                        <span class="text-sm font-semibold text-white">Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="border-white/10 my-5">

                <!-- Manage Devices -->
                <li class="my-1.5">
                    <a href="<?php echo e(route('devices.index')); ?>" class="nav-link-hover flex items-center px-5 py-4 rounded-lg transition-all duration-300 no-underline">
                        <i class="fas fa-network-wired text-lg mr-4 text-white/70"></i>
                        <span class="text-sm font-medium text-white/90">Manage Devices</span>
                    </a>
                </li>

                <!-- Analytics -->
                <li class="my-1.5">
                    <a href="<?php echo e(route('analytics.index')); ?>" class="nav-link-hover flex items-center px-5 py-4 rounded-lg transition-all duration-300 no-underline">
                        <i class="fas fa-chart-area text-lg mr-4 text-white/70"></i>
                        <span class="text-sm font-medium text-white/90">Analytics</span>
                    </a>
                </li>

                <!-- Alert Settings -->
                <li class="my-1.5">
                    <a href="<?php echo e(route('settings.alerts')); ?>" class="nav-link-hover flex items-center px-5 py-4 rounded-lg transition-all duration-300 no-underline">
                        <i class="fas fa-cog text-lg mr-4 text-white/70"></i>
                        <span class="text-sm font-medium text-white/90">Alert Settings</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="border-white/10 my-6">
            </ul>
        </nav>

        <!-- Content Wrapper -->
        <div class="content-with-sidebar flex flex-col min-h-screen">
            
            <!-- Topbar -->
            <nav class="bg-gradient-to-r from-slate-900 to-slate-800 border-b border-white/10 backdrop-blur-xl sticky top-0 z-50 shadow-lg">
                <div class="flex items-center justify-between px-4 py-3">
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-white p-2" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <div class="flex-1"></div>
                    
                    <!-- User Dropdown -->
                    <div class="relative">
                        <button onclick="toggleUserDropdown()" class="flex items-center text-white/90 hover:text-white transition-colors">
                            <span class="mr-3 text-sm hidden lg:inline">Administrator</span>
                            <img class="w-10 h-10 rounded-full border-2 border-white/20" src="<?php echo e(asset('assets/admin/img/admin.png')); ?>" alt="Admin">
                        </button>
                        
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-gradient-to-br from-slate-900 to-slate-800 border border-white/10 rounded-xl shadow-xl backdrop-blur-xl overflow-hidden">
                            <button onclick="openLogoutModal()" class="w-full flex items-center px-4 py-3 text-white/90 hover:bg-white/10 transition-colors">
                                <i class="fas fa-sign-out-alt mr-3 text-white/70"></i>
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="flex-1 p-4 lg:p-6">
                
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-4">
                    
                    <!-- Monthly Outages Card -->
                    <div class="animate-fade-in-up bg-gradient-to-br from-slate-900 to-slate-800 border border-white/10 rounded-xl shadow-[0_8px_32px_rgba(0,0,0,0.3)] backdrop-blur-xl relative overflow-hidden min-h-[96px] hover:translate-y-[-4px] hover:shadow-[0_8px_30px_rgba(0,0,0,0.12)] transition-all duration-300">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-blue-700"></div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-chart-line text-white text-sm"></i>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-white" id="monthlyOutages">
                                        <i class="fas fa-spinner fa-spin hidden"></i>
                                        <span class="count-value">--</span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-white/90 font-semibold text-sm mb-2">Monthly Outages</h6>
                            <p class="text-white/70 text-xs flex items-center">
                                <i class="fas fa-chart-line mr-2"></i>
                                Monthly outage statistics
                            </p>
                        </div>
                    </div>

                    <!-- Online Devices Card -->
                    <div class="animate-fade-in-up bg-gradient-to-br from-slate-900 to-slate-800 border border-white/10 rounded-xl shadow-[0_8px_32px_rgba(0,0,0,0.3)] backdrop-blur-xl relative overflow-hidden min-h-[96px] hover:translate-y-[-4px] hover:shadow-[0_8px_30px_rgba(0,0,0,0.12)] transition-all duration-300" style="animation-delay: 0.1s">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-emerald-600"></div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-wifi text-white text-sm"></i>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-white" id="onlineDevices">
                                        <i class="fas fa-spinner fa-spin hidden"></i>
                                        <span class="count-value">--</span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-slate-500 font-semibold text-sm mb-2">Online Devices</h6>
                            <p class="text-white/70 text-xs flex items-center">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 status-pulse"></span>
                                Currently reporting
                            </p>
                        </div>
                    </div>

                    <!-- Offline Devices Card -->
                    <div class="animate-fade-in-up bg-gradient-to-br from-slate-900 to-slate-800 border border-white/10 rounded-xl shadow-[0_8px_32px_rgba(0,0,0,0.3)] backdrop-blur-xl relative overflow-hidden min-h-[96px] hover:translate-y-[-4px] hover:shadow-[0_8px_30px_rgba(0,0,0,0.12)] transition-all duration-300" style="animation-delay: 0.2s">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 to-red-600"></div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-white" id="offlineDevices">
                                        <i class="fas fa-spinner fa-spin hidden"></i>
                                        <span class="count-value">--</span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-slate-500 font-semibold text-sm mb-2">Offline Devices</h6>
                            <p class="text-white/70 text-xs flex items-center">
                                <span class="w-2 h-2 bg-red-500 rounded-full mr-2 status-pulse"></span>
                                Needs attention
                            </p>
                        </div>
                    </div>

                    <!-- Today's Outages Card -->
                    <div class="animate-fade-in-up bg-gradient-to-br from-slate-900 to-slate-800 border border-white/10 rounded-xl shadow-[0_8px_32px_rgba(0,0,0,0.3)] backdrop-blur-xl relative overflow-hidden min-h-[96px] hover:translate-y-[-4px] hover:shadow-[0_8px_30px_rgba(0,0,0,0.12)] transition-all duration-300" style="animation-delay: 0.3s">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 to-amber-600"></div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-clock text-white text-sm"></i>
                                </div>
                                <div class="text-right">
                                    <div class="text-xl font-bold text-white" id="todayOutages">
                                        <i class="fas fa-spinner fa-spin hidden"></i>
                                        <span class="count-value">--</span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-slate-500 font-semibold text-sm mb-2">Today's Outages</h6>
                            <p class="text-white/70 text-xs flex items-center">
                                <i class="fas fa-clock mr-2"></i>
                                Off events (24h)
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Device Status Section -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 border border-white/10 rounded-2xl shadow-[0_8px_32px_rgba(0,0,0,0.3)] backdrop-blur-xl p-4 lg:p-5">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 pb-3 border-b border-white/10">
                        <div class="mb-3 sm:mb-0">
                            <h3 class="text-white font-bold text-lg">Device Status</h3>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-xl text-xs font-semibold border border-blue-500/30" id="deviceCount">0 devices</span>
                            <button onclick="loadDevices()" class="bg-gradient-to-br from-slate-600 to-slate-700 text-white px-4 py-2 rounded-lg font-semibold text-sm hover:shadow-lg transition-all">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Loading State -->
                    <div id="deviceLoadingState" class="text-center py-10">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-spinner fa-spin text-white text-xl"></i>
                        </div>
                        <p class="text-slate-500 font-semibold">Loading device status...</p>
                    </div>

                    <!-- Error State -->
                    <div id="deviceErrorState" class="hidden text-center py-10">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                        </div>
                        <p class="text-red-400 font-semibold mb-4">Unable to load device data</p>
                        <button onclick="loadDevices()" class="bg-gradient-to-br from-blue-500 to-blue-700 text-white px-4 py-2 rounded-lg font-semibold text-sm hover:shadow-lg transition-all">
                            <i class="fas fa-redo mr-2"></i>Retry
                        </button>
                    </div>

                    <!-- Device Cards Container -->
                    <div id="deviceCardsContainer" class="hidden grid grid-cols-1 lg:grid-cols-2 gap-3 max-w-5xl mx-auto">
                        <!-- Device cards will be inserted here -->
                    </div>

                    <!-- Empty State -->
                    <div id="deviceEmptyState" class="hidden text-center py-10">
                        <div class="w-12 h-12 bg-gradient-to-br from-slate-400 to-slate-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-network-wired text-white text-xl"></i>
                        </div>
                        <p class="text-slate-500 font-semibold mb-4">No devices found</p>
                        <a href="<?php echo e(route('devices.index')); ?>" class="inline-block bg-gradient-to-br from-blue-500 to-blue-700 text-white px-4 py-2 rounded-lg font-semibold text-sm hover:shadow-lg transition-all no-underline">
                            <i class="fas fa-plus mr-2"></i>Add Device
                        </a>
                    </div>

                    <!-- Footer -->
                    <div class="mt-4 pt-3 border-t border-white/10">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                            <small class="text-white/70">
                                <i class="fas fa-clock mr-1"></i>
                                Last updated: <span id="lastUpdate" class="text-white/90">Never</span>
                            </small>
                            <small class="text-white/70">
                                <i class="fas fa-sync-alt mr-1"></i>
                                Auto-refresh: <span class="text-emerald-400">ON</span>
                            </small>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="hidden fixed inset-0 bg-black/50 z-40 md:hidden" onclick="toggleSidebar()"></div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-start justify-center pt-20">
        <div class="bg-white rounded-lg shadow-2xl max-w-lg w-full mx-4">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h5 class="text-lg font-medium text-gray-800">Ready to Leave?</h5>
                <button onclick="closeLogoutModal()" class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
            </div>
            <div class="px-6 py-4">
                <p class="text-gray-600">Select "Logout" below if you are ready to end your current session.</p>
            </div>
            <div class="flex justify-end gap-2 px-6 py-3 border-t border-gray-200">
                <button onclick="closeLogoutModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors text-sm font-medium">Cancel</button>
                <form method="POST" action="<?php echo e(route('admin.logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors text-sm font-medium">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle user dropdown
        function toggleUserDropdown() {
            document.getElementById('userDropdown').classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('button') && !e.target.closest('#userDropdown')) {
                document.getElementById('userDropdown').classList.add('hidden');
            }
        });

        // Toggle mobile sidebar
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('mobile-open');
            document.getElementById('sidebarOverlay').classList.toggle('hidden');
        }

        // Logout modal
        function openLogoutModal() {
            document.getElementById('logoutModal').classList.remove('hidden');
            document.getElementById('userDropdown').classList.add('hidden');
        }
        
        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.add('hidden');
        }

        // Device Status Functions
        async function fetchJSON(url) {
            const r = await fetch(url, { 
                headers: { 
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                }
            });
            if (!r.ok) throw new Error('HTTP ' + r.status);
            return r.json();
        }

        function getStatusBadge(device) {
            const status = device.display_status || device.status;
            const isOnline = status === 'Active' || status === 'ON' || status === 'Online';
            
            if (isOnline) {
                return `<div class="flex items-center gap-2 bg-emerald-500/20 text-emerald-400 px-3 py-1 rounded-full text-xs font-semibold border border-emerald-500/30">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full status-pulse"></span>
                    ONLINE
                </div>`;
            } else {
                return `<div class="flex items-center gap-2 bg-red-500/20 text-red-400 px-3 py-1 rounded-full text-xs font-semibold border border-red-500/30">
                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                    OFFLINE
                </div>`;
            }
        }

        function formatLastSeen(device) {
            if (device.last_seen_human) return device.last_seen_human;
            if (device.last_seen) return new Date(device.last_seen).toLocaleString();
            return 'Never';
        }

        async function loadDevices() {
            const loadingState = document.getElementById('deviceLoadingState');
            const errorState = document.getElementById('deviceErrorState');
            const cardsContainer = document.getElementById('deviceCardsContainer');
            const emptyState = document.getElementById('deviceEmptyState');
            const deviceCount = document.getElementById('deviceCount');
            const lastUpdate = document.getElementById('lastUpdate');
            
            try {
                loadingState.style.display = 'block';
                errorState.style.display = 'none';
                cardsContainer.style.display = 'none';
                emptyState.style.display = 'none';

                const data = await fetchJSON('<?php echo e(route("api.devices")); ?>');
                
                if (!data.success) throw new Error(data.message || 'Failed to fetch devices');

                const devices = data.devices || [];
                deviceCount.textContent = `${devices.length} device${devices.length !== 1 ? 's' : ''}`;
                
                if (devices.length === 0) {
                    loadingState.style.display = 'none';
                    emptyState.style.display = 'block';
                } else {
                    const deviceCards = devices.map(device => `
                        <div class="bg-slate-800/70 border border-slate-600/35 rounded-xl p-4 transition-all duration-300 hover:shadow-[0_18px_32px_rgba(2,6,23,0.55)] hover:border-blue-500/45 hover:-translate-y-0.5 flex flex-wrap items-center gap-4">
                            <div class="flex-1 min-w-[140px]">
                                <div class="font-semibold text-slate-200 text-sm">${device.household_name || 'Unknown Device'}</div>
                                <div class="text-xs text-slate-400">ID: ${device.device_id || 'N/A'}</div>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-slate-400 flex-1 min-w-[200px]">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>${device.barangay || 'Unknown Location'}</span>
                                <span class="text-slate-500">•</span>
                                <i class="fas fa-clock"></i>
                                <span>${formatLastSeen(device)}</span>
                            </div>
                            <div class="ml-auto">
                                ${getStatusBadge(device)}
                            </div>
                        </div>
                    `).join('');

                    cardsContainer.innerHTML = deviceCards;
                    loadingState.style.display = 'none';
                    cardsContainer.style.display = 'grid';
                }

                lastUpdate.textContent = new Date().toLocaleTimeString();
                
            } catch (error) {
                console.error('Device loading error:', error);
                loadingState.style.display = 'none';
                errorState.style.display = 'block';
            }
        }

        // Dashboard Stats
        async function loadDashboardStats() {
            try {
                const response = await fetch('/dashboard/stats', {
                    headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
                });
                if (!response.ok) throw new Error(`HTTP ${response.status}`);
                const data = await response.json();
                
                if (data.success) {
                    const stats = data.stats;
                    animateValue('monthlyOutages', stats.monthlyOutages);
                    animateValue('onlineDevices', stats.onlineDevices);
                    animateValue('offlineDevices', stats.offlineDevices);
                    animateValue('todayOutages', stats.todayOutages);
                }
            } catch (error) {
                console.error('Error loading dashboard stats:', error);
            }
        }

        function animateValue(cardId, newValue) {
            const card = document.getElementById(cardId);
            if (card) {
                const countValue = card.querySelector('.count-value');
                if (countValue) {
                    countValue.style.transition = 'all 0.3s ease-in-out';
                    countValue.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        countValue.textContent = newValue;
                        countValue.style.transform = 'scale(1)';
                    }, 150);
                }
            }
        }

        // Auto-refresh
        let refreshInterval;
        let statsInterval;

        function startAutoRefresh() {
            loadDevices();
            loadDashboardStats();
            refreshInterval = setInterval(loadDevices, 60000);
            statsInterval = setInterval(loadDashboardStats, 10000);
        }

        document.addEventListener('DOMContentLoaded', startAutoRefresh);

        window.addEventListener('beforeunload', function() {
            if (refreshInterval) clearInterval(refreshInterval);
            if (statsInterval) clearInterval(statsInterval);
        });
    </script>

    <!-- Outage Notification Component -->
    <?php echo $__env->make('components.outage-notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\laragon\www\E-Grid-Monitoring-System\resources\views/dashboardtest.blade.php ENDPATH**/ ?>