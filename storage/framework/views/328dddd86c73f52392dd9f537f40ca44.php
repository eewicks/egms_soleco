<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SOLECO | Add New Device</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('assets/admin/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('assets/admin/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
    
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
            max-width: 800px;
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

        .form-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: all 0.3s ease;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-card:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-control, .form-select {
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            background: #F9FAFB;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-text {
            font-size: 0.75rem;
            color: var(--secondary-color);
            margin-top: 0.25rem;
        }

        .btn-save {
            background: linear-gradient(135deg, var(--success-color), #059669);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .btn-cancel {
            background: linear-gradient(135deg, var(--secondary-color), #475569);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(100, 116, 139, 0.3);
        }

        .btn-cancel:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(100, 116, 139, 0.4);
            color: white;
        }

        .alert {
            border: none;
            border-radius: 8px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
        }

        .alert-danger {
            background: #FEF2F2;
            color: #DC2626;
            border-left: 4px solid #EF4444;
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
        }

        .navbar-logo {
            width: 45px;   
            height: 45px;  
            object-fit: contain; 
        }

        /* Hamburger Toggle Button */
        .hamburger-toggle {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #5a5c69;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.35rem;
            transition: all 0.3s ease;
        }

        .hamburger-toggle:hover {
            background-color: #f8f9fc;
            color: #3a3b45;
        }

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


        /* Button spacing fix */
        .d-flex.gap-4 > * + * {
            margin-left: 1.5rem !important;
        }

        /* Center footer text */
        .copyright {
            text-align: center !important;
        }

        /* Enhanced Sidebar Hover Effects */
        .sidebar .nav-link:hover {
            background: linear-gradient(135deg, rgba(184, 134, 11, 0.15) 0%, rgba(139, 105, 20, 0.08) 100%) !important;
            border: 1px solid rgba(184, 134, 11, 0.3) !important;
            transform: translateX(4px);
            box-shadow: 0 6px 20px rgba(184, 134, 11, 0.2) !important;
        }

        .sidebar .nav-link:hover i {
            color: rgba(255, 255, 255, 1) !important;
            transform: scale(1.1);
        }

        .sidebar .nav-link:hover span {
            color: #f97316 !important;
        }

        /* Active state enhancement */
        .sidebar .nav-item.active .nav-link {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15) !important;
        }

        /* Sidebar brand hover effect */
        .sidebar-brand:hover {
            background: linear-gradient(135deg, rgba(184, 134, 11, 0.2) 0%, rgba(139, 105, 20, 0.15) 100%) !important;
            transform: translateY(-1px);
        }

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

            <!-- Enhanced Sidebar Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-between" href="/dashboardtest" style="padding: 20px 24px; background: rgba(255, 255, 255, 0.05); border-bottom: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
                <div class="sidebar-brand-icon d-flex align-items-center">
                    <div style="width: 42px; height: 42px; background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 8px; box-shadow: 0 8px 25px rgba(249, 115, 22, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.1);">
                        <i class="fas fa-desktop" style="color: white; font-size: 20px;"></i>
                    </div>
                    <div style="color: white; font-weight: 800; font-size: 18px; font-family: 'Inter', sans-serif; letter-spacing: 0.5px;">EGMS</div>
                </div>
            </a>

            <!-- Enhanced Divider -->
            <hr class="sidebar-divider my-0" style="border-color: rgba(255, 255, 255, 0.1); margin: 0;">

            <!-- Enhanced Nav Item - Dashboard -->
            <li class="nav-item" style="margin: 8px 16px;">
                <a class="nav-link" href="<?php echo e(route('admin.dashboardtest')); ?>" style="padding: 16px 20px; border-radius: 12px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.85); font-weight: 500;">
                    <i class="fas fa-fw fa-tachometer-alt" style="font-size: 14px; margin-right: 12px; color: rgba(255, 255, 255, 0.8);"></i>
                    <span style="font-size: 15px;">Dashboard</span>
                </a>
            </li>

            <!-- Enhanced Divider -->
            <hr class="sidebar-divider" style="border-color: rgba(255, 255, 255, 0.1); margin: 16px 0;">

            <!-- Enhanced Nav Item - Manage Devices (Active) -->
            <li class="nav-item active" style="margin: 4px 16px;">
                <a class="nav-link" href="<?php echo e(route('devices.index')); ?>" style="padding: 16px 20px; border-radius: 12px; background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.05) 100%); border: 1px solid rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                    <i class="fas fa-network-wired" style="font-size: 14px; margin-right: 12px; color: rgba(255, 255, 255, 0.9);"></i>
                    <span style="font-weight: 600; font-size: 15px; color: white;">Manage Devices</span>
                </a>
            </li>

            <!-- Enhanced Nav Item - Analytics -->
            <li class="nav-item" style="margin: 4px 16px;">
                <a class="nav-link" href="<?php echo e(route('analytics.index')); ?>" style="padding: 14px 20px; border-radius: 12px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.85); font-weight: 500;">
                    <i class="fas fa-fw fa-chart-area" style="font-size: 14px; margin-right: 12px; color: rgba(255, 255, 255, 0.8);"></i>
                    <span style="font-size: 15px;">Analytics</span>
                </a>
            </li>

            <!-- Enhanced Nav Item - Alert Settings -->
            <li class="nav-item" style="margin: 4px 16px;">
                <a class="nav-link" href="<?php echo e(route('settings.alerts')); ?>" style="padding: 14px 20px; border-radius: 12px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.85); font-weight: 500;">
                    <i class="fas fa-fw fa-cog" style="font-size: 14px; margin-right: 12px; color: rgba(255, 255, 255, 0.8);"></i>
                    <span style="font-size: 15px;">Alert Settings</span>
                </a>
            </li>

            <!-- Enhanced Nav Item - Backup & Recovery -->
           

            <!-- Enhanced Divider -->
            <hr class="sidebar-divider d-none d-md-block" style="border-color: rgba(255, 255, 255, 0.1); margin: 24px 0;">

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
                                    src="<?php echo e(asset('assets/admin/img/admin.png')); ?>" style="border: 2px solid rgba(255, 255, 255, 0.2);">
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
                            <h1 class="h2 mb-2" style="color: white; font-weight: 700; font-family: 'Inter', sans-serif; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">Add New Device</h1>
                            <p class="text-muted mb-0" style="font-size: 1rem; color: rgba(255, 255, 255, 0.8);">Register a new household IoT device for power outage monitoring</p>
                        </div>
                    </div>

                    <?php if($errors->any()): ?>
                        <div class="alert" style="background: linear-gradient(135deg, #fef2f2, #fee2e2); border: 1px solid #fecaca; border-radius: 12px; padding: 1rem; margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
                                <i class="fas fa-exclamation-triangle" style="color: #dc2626; margin-right: 8px;"></i>
                                <strong style="color: #dc2626;">Please fix the following errors:</strong>
                            </div>
                            <ul style="margin: 0; padding-left: 1.5rem; color: #dc2626;">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($err); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Modern Form Card -->
                    <div class="card" style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); overflow: hidden; max-width: 800px; margin: 0 auto;">
                        <div class="card-header" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); border-bottom: 2px solid #e2e8f0; padding: 1.5rem;">
                            <div class="d-flex align-items-center">
                                <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-plus" style="color: white; font-size: 20px;"></i>
                                </div>
                                <div>
                                    <h5 style="color: #1e293b; font-weight: 700; margin: 0; font-family: 'Inter', sans-serif;">Device Information</h5>
                                    <p style="color: #64748b; font-size: 0.875rem; margin: 0;">Enter the details for your new IoT device</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body" style="padding: 2rem;">
                            <form action="<?php echo e(route('devices.store')); ?>" method="POST" id="createDeviceForm">
                                <?php echo csrf_field(); ?>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" style="color: #374151; font-weight: 600; margin-bottom: 0.5rem; display: flex; align-items: center;">
                                            <i class="fas fa-home me-2" style="color: #3b82f6;"></i>Household Name
                                        </label>
                                        <input type="text" name="household_name" class="form-control" value="<?php echo e(old('household_name')); ?>" required 
                                               style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease; max-width: 400px;"
                                               onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)'"
                                               onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'"
                                               placeholder="Enter household name">
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" style="color: #374151; font-weight: 600; margin-bottom: 0.5rem; display: flex; align-items: center;">
                                            <i class="fas fa-hashtag me-2" style="color: #3b82f6;"></i>Device ID
                                        </label>
                                        <input type="text" name="device_id" class="form-control" value="<?php echo e(old('device_id')); ?>" required 
                                               style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease; max-width: 200px;"
                                               onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)'"
                                               onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'"
                                               placeholder="Enter device ID">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" style="color: #374151; font-weight: 600; margin-bottom: 0.5rem; display: flex; align-items: center;">
                                            <i class="fas fa-map-marker-alt me-2" style="color: #3b82f6;"></i>Location (Barangay)
                                        </label>
                                        <input type="text" name="barangay" class="form-control" value="<?php echo e(old('barangay')); ?>" required
                                               style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease; max-width: 400px;"
                                               onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)'"
                                               onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'"
                                               placeholder="Enter barangay location">
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" style="color: #374151; font-weight: 600; margin-bottom: 0.5rem; display: flex; align-items: center;">
                                            <i class="fas fa-phone me-2" style="color: #3b82f6;"></i>Contact Number
                                        </label>
                                        <input type="text" name="contact_number" id="contact_number" class="form-control" value="<?php echo e(old('contact_number')); ?>" 
                                               style="border: 2px solid #e5e7eb; border-radius: 8px; padding: 12px 16px; font-size: 1rem; transition: all 0.3s ease; max-width: 400px;"
                                               onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 3px rgba(59, 130, 246, 0.1)'"
                                               onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'"
                                               placeholder="09XXXXXXXXX" maxlength="11" pattern="^(09|\+63)[0-9]{9}$">
                                        <small id="contact_error" style="color: #ef4444; font-size: 0.75rem; display: none;"></small>
                                    </div>
                                </div>

                                <div class="d-flex" style="gap: 12px; justify-content: end; margin-top: 2rem;">
                                    <a href="<?php echo e(route('devices.index')); ?>" style="background: linear-gradient(135deg, #64748b, #475569); color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 6px; transition: all 0.3s ease; font-size: 0.875rem;" 
                                       onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 3px 8px rgba(100, 116, 139, 0.4)'" 
                                       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                        <i class="fas fa-times"></i>
                                        Cancel
                                    </a>
                                    <button type="submit" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; padding: 8px 16px; border-radius: 6px; border: none; font-weight: 600; display: flex; align-items: center; gap: 6px; transition: all 0.3s ease; cursor: pointer; font-size: 0.875rem;" 
                                            onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 3px 8px rgba(59, 130, 246, 0.4)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                        <i class="fas fa-save"></i>
                                        Save Device
                                    </button>
                                </div>
                            </form>
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
                        <form method="POST" action="<?php echo e(route('admin.logout')); ?>" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo e(asset('assets/admin/vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo e(asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo e(asset('assets/admin/js/sb-admin-2.min.js')); ?>"></script>
        
        <script>
            // Add smooth animations and interactions
            document.addEventListener('DOMContentLoaded', function() {
                // Add loading animation for buttons
                const buttons = document.querySelectorAll('.btn-save, .btn-cancel');
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

                // Hamburger Toggle Functionality
                const sidebarToggle = document.getElementById('sidebarToggle');
                const sidebar = document.getElementById('accordionSidebar');
                const contentWrapper = document.getElementById('content');
                const sidebarOverlay = document.createElement('div');
                sidebarOverlay.className = 'sidebar-overlay';
                sidebarOverlay.id = 'sidebarOverlay';
                document.body.appendChild(sidebarOverlay);

                // Toggle sidebar function
                function toggleSidebar() {
                    sidebar.classList.toggle('collapsed');
                    contentWrapper.classList.toggle('sidebar-collapsed');
                    
                    // Update hamburger icon
                    const icon = sidebarToggle.querySelector('i');
                    if (sidebar.classList.contains('collapsed')) {
                        icon.className = 'fas fa-bars';
                    } else {
                        icon.className = 'fas fa-times';
                    }
                }

                // Mobile toggle function
                function toggleMobileSidebar() {
                    sidebar.classList.toggle('mobile-open');
                    sidebarOverlay.classList.toggle('show');
                    
                    // Update hamburger icon
                    const icon = sidebarToggle.querySelector('i');
                    if (sidebar.classList.contains('mobile-open')) {
                        icon.className = 'fas fa-times';
                    } else {
                        icon.className = 'fas fa-bars';
                    }
                }

                // Desktop toggle
                if (sidebarToggle) {
                    sidebarToggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        if (window.innerWidth <= 768) {
                            toggleMobileSidebar();
                        } else {
                            toggleSidebar();
                        }
                    });
                }

                // Close sidebar when clicking overlay (mobile)
                sidebarOverlay.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('mobile-open');
                        sidebarOverlay.classList.remove('show');
                        
                        const icon = sidebarToggle.querySelector('i');
                        icon.className = 'fas fa-bars';
                    }
                });

                // Handle window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('mobile-open');
                        sidebarOverlay.classList.remove('show');
                        
                        const icon = sidebarToggle.querySelector('i');
                        icon.className = 'fas fa-bars';
                    }
                });

                // Initialize sidebar state based on screen size
                if (window.innerWidth <= 768) {
                    sidebar.classList.add('collapsed');
                    contentWrapper.classList.add('sidebar-collapsed');
                }

                // Philippine Phone Number Validation
                const contactInput = document.getElementById('contact_number');
                const contactError = document.getElementById('contact_error');

                if (contactInput) {
                    contactInput.addEventListener('input', function(e) {
                        let value = e.target.value;
                        
                        // Remove non-numeric characters except +
                        value = value.replace(/[^0-9+]/g, '');
                        
                        // Handle +63 format - convert to 09 format for consistency
                        if (value.startsWith('+63')) {
                            value = '09' + value.slice(3);
                        }
                        
                        // Ensure it starts with 09
                        if (value.length > 0 && !value.startsWith('0') && !value.startsWith('+')) {
                            value = '09' + value;
                        }
                        
                        // Limit to 11 digits
                        if (value.startsWith('09')) {
                            value = value.slice(0, 11);
                        }
                        
                        e.target.value = value;
                        
                        // Validation
                        if (value.length === 0) {
                            contactError.style.display = 'none';
                            contactInput.style.borderColor = '#e5e7eb';
                        } else if (!/^09[0-9]{9}$/.test(value)) {
                            contactError.textContent = 'Must be 11 digits starting with 09 (e.g., 09123456789)';
                            contactError.style.display = 'block';
                            contactInput.style.borderColor = '#ef4444';
                        } else {
                            contactError.style.display = 'none';
                            contactInput.style.borderColor = '#10b981';
                        }
                    });

                    // Prevent form submission if invalid
                    const form = document.getElementById('createDeviceForm');
                    form.addEventListener('submit', function(e) {
                        const value = contactInput.value;
                        if (value.length > 0 && !/^09[0-9]{9}$/.test(value)) {
                            e.preventDefault();
                            contactError.textContent = 'Please enter a valid Philippine mobile number (09XXXXXXXXX)';
                            contactError.style.display = 'block';
                            contactInput.focus();
                        }
                    });
                }
            });
        </script>

        <!-- Outage Notification Component -->
        <?php echo $__env->make('components.outage-notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
    </html>
<?php /**PATH C:\laragon\www\E-Grid-Monitoring-System\resources\views/create.blade.php ENDPATH**/ ?>