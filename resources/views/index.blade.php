<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SOLECO | Manage Devices</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('assets/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    
    <style>
        /* Fixed Sidebar Styles */
        #accordionSidebar.sidebar {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            height: 100vh !important;
            max-height: 100vh !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            z-index: 1000 !important;
        }

        #wrapper {
            display: flex !important;
        }

        #content-wrapper {
            margin-left: 224px !important;
            width: calc(100% - 224px) !important;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Ensure body and html don't cause scroll issues */
        body {
            overflow-x: hidden;
        }

        html {
            overflow-x: hidden;
        }

        /* Sidebar scrollbar styling */
        #accordionSidebar::-webkit-scrollbar {
            width: 6px;
        }

        #accordionSidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        #accordionSidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        #accordionSidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #accordionSidebar.sidebar {
                position: fixed !important;
                transform: translateX(-100%);
            }
            
            #accordionSidebar.sidebar.mobile-open {
                transform: translateX(0) !important;
            }
            
            #content-wrapper {
                margin-left: 0 !important;
                width: 100% !important;
            }
        }

        /* Collapsed sidebar adjustments */
        #accordionSidebar.collapsed ~ #content-wrapper {
            margin-left: 64px !important;
            width: calc(100% - 64px) !important;
        }

        @media (max-width: 768px) {
            #accordionSidebar.collapsed ~ #content-wrapper {
                margin-left: 0 !important;
                width: 100% !important;
            }
        }

        :root {
            --primary-color: #3B82F6;
            --secondary-color: #64748B;
            --success-color: #10B981;
            --danger-color: #EF4444;
            --warning-color: #F59E0B;
            --light-bg: #F8FAFC;
            --card-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --card-shadow-hover: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Enhanced table responsiveness */
        .table-responsive {
            border-radius: 0 0 16px 16px;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th,
        .table td {
            vertical-align: middle;
        }
        
        /* Ensure actions column is always visible */
        .table td:last-child {
            position: sticky;
            right: 0;
            background: white;
            z-index: 10;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.875rem;
            }
            
            .table th,
            .table td {
                padding: 0.75rem 0.5rem;
            }
            
            .table td:last-child {
                position: static;
                background: transparent;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .card {
            animation: fadeInUp 0.6s ease-out;
        }

        .table tbody tr {
            animation: slideInRight 0.4s ease-out;
            animation-fill-mode: both;
        }

        .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .table tbody tr:nth-child(5) { animation-delay: 0.5s; }

        .table tbody tr:hover {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(16, 185, 129, 0.05));
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }


        body {
            background-color: var(--light-bg);
            color: #334155;
        }

        .topbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #E2E8F0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .topbar-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-right: 2rem;
        }

        .topbar-logo-img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            background: #F8FAFC;
            border-radius: 8px;
            padding: 8px;
            border: 1px solid #E2E8F0;
        }

        .topbar-logo-text {
            color: #1E293B;
        }

        .logo-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            line-height: 1;
            color: #4F46E5;
        }

        .logo-subtitle {
            font-size: 0.75rem;
            font-weight: 500;
            margin: 0;
            color: #64748B;
        }

        .topbar-divider {
            width: 1px;
            height: 2rem;
            background: #E2E8F0;
            margin: 0 1rem;
        }

        .nav-link {
            color: #64748B !important;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link:hover {
            color: #4F46E5 !important;
        }

        .text-gray-600 {
            color: #64748B !important;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .img-profile {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            color: #64748B;
        }

        .dropdown-item:hover {
            background-color: #F8FAFC;
            color: #4F46E5;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .page-header {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--primary-color);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1E293B;
            margin: 0;
        }

        .page-subtitle {
            color: var(--secondary-color);
            margin: 0.5rem 0 0 0;
            font-size: 1rem;
        }

        .add-device-btn {
            background: linear-gradient(135deg, var(--primary-color), #1D4ED8);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
        }

        .add-device-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.4);
            color: white;
        }

        .devices-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: all 0.3s ease;
            margin: 0;
            padding: 0;
        }

        .devices-card:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .table {
            width: 100%;
            table-layout: fixed;
        }

        .table th:nth-child(1) { width: 30%; }
        .table th:nth-child(2) { width: 20%; }
        .table th:nth-child(3) { width: 30%; }
        .table th:nth-child(4) { width: 20%; }

        .table th:last-child,
        .table td:last-child {
            padding-right: 1rem;
        }

        .table-responsive {
            overflow-x: auto;
            margin: 0;
            padding: 0;
        }

        .table-responsive .table {
            margin-bottom: 0;
        }

        .table-header {
            background: linear-gradient(135deg, #F8FAFC, #E2E8F0);
            border-bottom: 2px solid #E2E8F0;
        }

        .table th {
            font-weight: 600;
            color: #475569;
            border: none;
            padding: 1rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .table td {
            padding: 1rem;
            border: none;
            border-bottom: 1px solid #F1F5F9;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: #F8FAFC;
            transform: translateY(-1px);
        }

        .device-name {
            font-weight: 600;
            color: #1E293B;
            font-size: 1rem;
        }

        .device-id {
            font-family: 'Monaco', 'Menlo', monospace;
            background: #F1F5F9;
            color: #475569;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .device-location {
            color: var(--secondary-color);
            font-size: 0.875rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            justify-content: flex-start;
            flex-wrap: nowrap;
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--warning-color), #D97706);
            border: none;
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .btn-edit:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(245, 158, 11, 0.3);
            color: white;
        }

        .btn-delete {
            background: linear-gradient(135deg, var(--danger-color), #DC2626);
            border: none;
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .btn-delete:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--secondary-color);
        }

        .empty-state i {
            font-size: 3rem;
            color: #CBD5E1;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #64748B;
        }

        .empty-state p {
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }


        .footer {
            background: white;
            border-top: 1px solid #E2E8F0;
            padding: 2rem 0;
            margin-top: 3rem;
            text-align: center;
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }
            
            .page-header {
                padding: 1.5rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.25rem;
            }
            
            .table-responsive {
                font-size: 0.875rem;
            }
        }

        .navbar-logo {
            width: 45px;   
            height: 45px;  
            object-fit: contain; 
        }

        /* Hamburger Toggle Button */

        /* Sidebar Overlay for Mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
        }

        /* Collapsed Sidebar */
        .sidebar.collapsed {
            width: 4rem !important;
        }

        .sidebar.collapsed .sidebar-brand-text,
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
        }

        .sidebar.collapsed .sidebar-brand {
            justify-content: center;
        }

        /* Content Wrapper Adjustments */
        .sidebar-collapsed {
            margin-left: 4rem !important;
        }

        @media (max-width: 768px) {
            .sidebar-collapsed {
                margin-left: 0 !important;
            }
        }

        /* Fix sidebar text visibility */
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .sidebar .nav-link:hover {
            color: rgba(255, 255, 255, 1) !important;
        }

        .sidebar .nav-link.active {
            color: rgba(255, 255, 255, 1) !important;
        }

        .sidebar .nav-link i {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .sidebar .nav-link:hover i {
            color: rgba(255, 255, 255, 1) !important;
        }

        .sidebar .nav-link.active i {
            color: rgba(255, 255, 255, 1) !important;
        }


        /* Center footer text */
        .copyright {
            text-align: center !important;
        }

        /* Enhanced Orange Sidebar Hover Effects */
        .sidebar .nav-link:hover {
            background: rgba(251, 146, 60, 0.1) !important;
            border: none !important;
            transform: translateX(3px);
            box-shadow: none !important;
        }

        .sidebar .nav-link:hover i {
            color: #f97316 !important;
            transform: scale(1.05);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        .sidebar .nav-link:hover span {
            color: #f97316 !important;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3) !important;
        }

        /* Active state enhancement */
        .sidebar .nav-item.active .nav-link {
            background: rgba(251, 146, 60, 0.08) !important;
            border: none !important;
            box-shadow: none !important;
        }

        .sidebar .nav-item.active .nav-link i {
            color: #f97316 !important;
        }

        /* Sidebar brand hover effect - removed */

        /* Smooth transitions for all sidebar elements */
        .sidebar * {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Enhanced backdrop blur effect */
        .sidebar {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* Subtle animation for sidebar brand icon */
        .sidebar-brand-icon div {
            animation: subtleFloat 3s ease-in-out infinite;
        }

        @keyframes subtleFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-2px); }
        }

        /* Enhanced divider styling */
        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        /* Improved spacing and typography */
        .sidebar .nav-link {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            letter-spacing: 0.3px;
        }

        /* Enhanced shadow for depth */
        .sidebar {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), 0 2px 8px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Enhanced Modern Dark Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f172a 100%); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">

            <!-- Enhanced Orange Dark Sidebar Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-between" href="/dashboardtest" style="padding: 24px 24px; background: rgba(255, 255, 255, 0.05); border-bottom: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); border-radius: 0 0 16px 16px; margin: 0 12px 16px 12px;">
                <div class="sidebar-brand-icon d-flex align-items-center">
                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-right: 12px; box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.1);">
                        <i class="fas fa-desktop" style="color: white; font-size: 22px; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);"></i>
                    </div>
                    <div style="color: white; font-weight: 800; font-size: 20px; font-family: 'Inter', sans-serif; letter-spacing: 0.5px; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">EGMS</div>
                </div>
            </a>

            <!-- Enhanced Dark Divider -->
            <hr class="sidebar-divider my-0" style="border-color: rgba(255, 255, 255, 0.08); margin: 0 20px; border-width: 1px;">

            <!-- Enhanced Orange Nav Item - Dashboard -->
            <li class="nav-item" style="margin: 8px 16px;">
                <a class="nav-link" href="{{ route('admin.dashboardtest') }}" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-fw fa-tachometer-alt" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 14px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Dashboard</span>
                </a>
            </li>

            <!-- Enhanced Dark Divider -->
            <hr class="sidebar-divider" style="border-color: rgba(255, 255, 255, 0.08); margin: 20px 20px; border-width: 1px;">

            <!-- Enhanced Orange Nav Item - Manage Devices (Active) -->
            <li class="nav-item active" style="margin: 6px 16px;">
                <a class="nav-link" href="{{ route('devices.index') }}" style="padding: 16px 20px; border-radius: 8px; background: rgba(255, 255, 255, 0.05); border: none; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: none;">
                    <i class="fas fa-network-wired" style="font-size: 18px; margin-right: 14px; color: #f97316; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-weight: 600; font-size: 14px; color: white; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Manage Devices</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Analytics -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="{{ route('analytics.index') }}" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-fw fa-chart-area" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 14px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Analytics</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Alert Settings -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="{{ route('settings.alerts') }}" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-fw fa-cog" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 14px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Alert Settings</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Backup & Recovery -->
           

            <!-- Enhanced Dark Divider -->
            <hr class="sidebar-divider d-none d-md-block" style="border-color: rgba(255, 255, 255, 0.08); margin: 24px 20px; border-width: 1px;">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%); min-height: 100vh;">

            <!-- Main Content -->
            <div id="content" style="background: transparent;">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); border-bottom: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">

                    <!-- Hamburger Toggle Button -->

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                <span class="mr-2 d-none d-lg-inline small" style="color: rgba(255, 255, 255, 0.9);">Administrator</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('assets/admin/img/admin.png')}}" style="border: 2px solid rgba(255, 255, 255, 0.2);">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); border: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" style="color: rgba(255, 255, 255, 0.9); background: transparent; transition: all 0.3s ease;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color: rgba(255, 255, 255, 0.7);"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Modern Page Content -->
                <div class="container-fluid" style="background: transparent; min-height: 100vh; padding: 2rem 1.5rem;">

                    <!-- Modern Page Header -->
                    <div class="d-flex align-items-center justify-content-between mb-5">
                        <div>
                            <h1 class="h2 mb-2" style="color: white; font-weight: 700; font-family: 'Inter', sans-serif; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">Device Management</h1>
                            <p class="text-muted mb-0" style="font-size: 1rem; color: rgba(255, 255, 255, 0.8);">Monitor and manage your energy grid devices</p>
                        </div>
                        <div class="d-flex align-items-center" style="gap: 20px;">
                            <div class="d-flex align-items-center" style="background: rgba(16, 185, 129, 0.1); padding: 8px 16px; border-radius: 20px; border: 1px solid rgba(16, 185, 129, 0.2);">
                                <div style="width: 8px; height: 8px; background: #10b981; border-radius: 50%; margin-right: 8px; animation: pulse 2s infinite;"></div>
                                <span style="color: #059669; font-weight: 600; font-size: 0.875rem;">{{ $devices->count() }} Devices</span>
                            </div>
                            <a href="{{ route('devices.create') }}" class="btn" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3); text-decoration: none; transition: all 0.3s ease;">
                                <i class="fas fa-plus me-2"></i>Add Device
                            </a>
                        </div>
                    </div>


                    <!-- Modern Devices Table -->
                    <div class="card" style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); overflow: hidden;">
                        <div class="card-header" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); border-bottom: 2px solid #e2e8f0; padding: 1.5rem;">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 style="color: #1e293b; font-weight: 700; margin: 0; font-family: 'Inter', sans-serif;">Device Registry</h5>
                                    <p style="color: #64748b; font-size: 0.875rem; margin: 0;">Manage household IoT devices that detect and report real-time power outages.</p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button class="btn btn-sm" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.2); padding: 8px 16px; border-radius: 8px; font-weight: 600;" onclick="location.reload()">
                                        <i class="fas fa-sync-alt me-1"></i>Refresh
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body p-0">
                            @if($devices->count() > 0)
                                <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                                    <table class="table table-hover mb-0" style="min-width: 800px;">
                                        <thead style="background: rgba(248, 250, 252, 0.8);">
                                            <tr>
                                                <th style="border: none; padding: 1rem 1.5rem; color: #64748b; font-weight: 600; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px; width: 25%;">
                                                    <i class="fas fa-home me-2"></i>Household Name
                                                </th>
                                                <th style="border: none; padding: 1rem 1.5rem; color: #64748b; font-weight: 600; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px; width: 12%;">
                                                    <i class="fas fa-hashtag me-2"></i>Device ID
                                                </th>
                                                <th style="border: none; padding: 1rem 1.5rem; color: #64748b; font-weight: 600; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px; width: 18%;">
                                                    <i class="fas fa-map-marker-alt me-2"></i>Location
                                                </th>
                                                <th style="border: none; padding: 1rem 1.5rem; color: #64748b; font-weight: 600; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px; width: 20%;">
                                                    <i class="fas fa-phone me-2"></i>Contact No.
                                                </th>
                                                <th style="border: none; padding: 1rem 1.5rem; color: #64748b; font-weight: 600; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px; width: 25%;">
                                                    <i class="fas fa-cog me-2"></i>Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($devices as $d)
                                                <tr style="border-bottom: 1px solid #f1f5f9; transition: all 0.3s ease;">
                                                    <td style="border: none; padding: 1.5rem;">
                                                        <div style="display: flex; align-items: center;">
                                                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                                                <i class="fas fa-home" style="color: white; font-size: 16px;"></i>
                                                            </div>
                                                            <div>
                                                                <div style="font-weight: 600; color: #1e293b; font-size: 1rem;">{{ $d->household_name ?? 'Unnamed Device' }}</div>
                                                                <div style="font-size: 0.75rem; color: #94a3b8;">Energy Grid Device</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border: none; padding: 1.5rem;">
                                                        <span style="background: linear-gradient(135deg, #f1f5f9, #e2e8f0); color: #475569; padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 0.875rem;">{{ $d->device_id }}</span>
                                                    </td>
                                                    <td style="border: none; padding: 1.5rem;">
                                                        <div style="display: flex; align-items: center; color: #64748b;">
                                                            <i class="fas fa-map-marker-alt me-2" style="color: #ef4444;"></i>
                                                            <span style="font-weight: 500;">{{ $d->barangay ?? 'No location set' }}</span>
                                                        </div>
                                                    </td>
                                                    <td style="border: none; padding: 1.5rem;">
                                                        <div style="display: flex; align-items: center; color: #64748b;">
                                                            <i class="fas fa-phone me-2" style="color: #10b981;"></i>
                                                            <span style="font-weight: 500;">{{ $d->contact_number ?? 'No contact set' }}</span>
                                                        </div>
                                                    </td>
                                                    <td style="border: none; padding: 1rem;">
                                                        <div style="display: flex; align-items: center; gap: 6px; flex-wrap: nowrap;">
                                                            <a href="{{ route('devices.edit', $d) }}" style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 0.8rem; transition: all 0.3s ease; display: flex; align-items: center; gap: 4px; white-space: nowrap;" onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 3px 8px rgba(245, 158, 11, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                                <i class="fas fa-edit" style="font-size: 0.75rem;"></i>
                                                                <span>Edit</span>
                                                            </a>
                                                            <form action="{{ route('devices.destroy', $d) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                                                                @csrf @method('DELETE')
                                                                <button type="submit" style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white; padding: 6px 12px; border-radius: 6px; border: none; font-weight: 600; font-size: 0.8rem; transition: all 0.3s ease; display: flex; align-items: center; gap: 4px; cursor: pointer; white-space: nowrap;" onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 3px 8px rgba(239, 68, 68, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                                                    <i class="fas fa-trash" style="font-size: 0.75rem;"></i>
                                                                    <span>Delete</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5" style="padding: 3rem 2rem;">
                                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #94a3b8, #64748b); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
                                        <i class="fas fa-network-wired" style="color: white; font-size: 32px;"></i>
                                    </div>
                                    <h3 style="color: #64748b; font-weight: 700; margin-bottom: 1rem;">No Devices Found</h3>
                                    <p style="color: #94a3b8; font-size: 1rem; margin-bottom: 2rem;">Get started by adding your first device to the monitoring system.</p>
                                    <a href="{{ route('devices.create') }}" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(59, 130, 246, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                        <i class="fas fa-plus"></i>
                                        Add Your First Device
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); border-top: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);">
                    <div class="container my-auto">
                        <div class="copyright my-auto">
                            <span style="color: rgba(255, 255, 255, 0.8); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Copyright &copy; SOLECO | Energy Grid Monitoring System 2025</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>
        
        <script>
            function confirmDelete() {
                return confirm('Are you sure you want to delete this device? This action cannot be undone.');
            }

            // Add smooth animations and interactions
            document.addEventListener('DOMContentLoaded', function() {
                // Add loading animation for buttons
                const buttons = document.querySelectorAll('.btn-edit, .btn-delete, .add-device-btn');
                buttons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        if (this.type !== 'submit') {
                            this.style.transform = 'scale(0.95)';
                            setTimeout(() => {
                                this.style.transform = '';
                            }, 150);
                        }
                    });
                });

                // Add hover effects to table rows
                const tableRows = document.querySelectorAll('tbody tr');
                tableRows.forEach(row => {
                    row.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-2px)';
                    });
                    row.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });

            });

            // Delete confirmation function
            function confirmDelete() {
                return confirm('Are you sure you want to delete this device? This action cannot be undone.');
            }
        </script>

        <!-- Outage Notification Component -->
        @include('components.outage-notification')
    </body>
    </html>
