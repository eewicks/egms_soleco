<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Backup & Recovery - EGMS</title>

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

        /* Center footer text */
        .copyright {
            text-align: center !important;
        }

        /* Backup & Recovery specific styles */
        .backup-card {
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border-radius: 0.35rem;
        }

        .backup-btn {
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 0.35rem;
            transition: all 0.3s ease;
        }

        .backup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-backup {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            color: white;
        }

        .btn-restore {
            background: linear-gradient(135deg, #fd7e14, #e83e8c);
            border: none;
            color: white;
        }

        .description-text {
            color: #6c757d;
            line-height: 1.6;
        }

        /* Activity Log Styles */
        .activity-log {
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
        }

        .log-entry {
            margin-bottom: 8px;
            padding: 4px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .log-entry:last-child {
            border-bottom: none;
        }

        .timestamp {
            color: #6c757d;
            font-weight: 600;
        }

        .log-entry.text-success .message {
            color: #28a745;
        }

        .log-entry.text-warning .message {
            color: #ffc107;
        }

        .log-entry.text-danger .message {
            color: #dc3545;
        }

        .log-entry.text-info .message {
            color: #17a2b8;
        }

        .log-entry.text-primary .message {
            color: #007bff;
        }

        /* Progress bar animations */
        .progress-bar {
            transition: width 0.3s ease;
        }

        /* Real-time status indicators */
        .status-indicator {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 8px;
            animation: pulse 2s infinite;
        }

        .status-indicator.ready {
            background-color: #28a745;
        }

        .status-indicator.processing {
            background-color: #ffc107;
        }

        .status-indicator.error {
            background-color: #dc3545;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
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
                <a class="nav-link" href="<?php echo e(route('admin.dashboardtest')); ?>" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-fw fa-tachometer-alt" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 16px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Dashboard</span>
                </a>
            </li>

            <!-- Enhanced Dark Divider -->
            <hr class="sidebar-divider" style="border-color: rgba(255, 255, 255, 0.08); margin: 20px 20px; border-width: 1px;">

            <!-- Enhanced Orange Nav Item - Manage Devices -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="<?php echo e(route('devices.index')); ?>" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-network-wired" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 16px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Manage Devices</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Analytics -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="<?php echo e(route('analytics.index')); ?>" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-fw fa-chart-area" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 16px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Analytics</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Alert Settings -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="<?php echo e(route('settings.alerts')); ?>" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-fw fa-cog" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 16px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Alert Settings</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Backup & Recovery (Active) -->
            <li class="nav-item active" style="margin: 6px 16px;">
                <a class="nav-link" href="<?php echo e(route('backup_recovery.index')); ?>" style="padding: 16px 20px; border-radius: 8px; background: rgba(255, 255, 255, 0.05); border: none; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: none;">
                    <i class="fas fa-fw fa-wrench" style="font-size: 18px; margin-right: 14px; color: #f97316; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-weight: 600; font-size: 14px; color: white; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Backup & Recovery</span>
                </a>
            </li>

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

                    <!-- Sidebar Toggle (Topbar) -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

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

                <!-- Begin Page Content -->
                <div class="container-fluid" style="background: transparent;">
                    <!-- Page Header -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0" style="color: white !important;">Backup & Recovery</h1>
                    </div>

                    <!-- Backup & Recovery Content -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4 backup-card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">System Backup & Recovery</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="text-gray-800 mb-3">Data Protection & Recovery</h4>
                                            <p class="description-text mb-4">
                                                The Backup & Recovery function protects data integrity by creating secure backups and allowing restoration in case of system failure or data loss.
                                            </p>
                                            
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="card border-left-primary shadow h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                        Create Backup
                                                                    </div>
                                                                    <div class="text-xs text-gray-600 mb-2">
                                                                        Generate a secure backup of all system data
                                                                    </div>
                                                                    <button class="btn btn-backup backup-btn" id="backupBtn">
                                                                        <i class="fas fa-download me-2"></i>Backup Now
                                                                    </button>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-database fa-2x text-gray-300"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 mb-3">
                                                    <div class="card border-left-warning shadow h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col mr-2">
                                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                                        Restore Data
                                                                    </div>
                                                                    <div class="text-xs text-gray-600 mb-2">
                                                                        Restore system from a previous backup
                                                                    </div>
                                                                    <button class="btn btn-restore backup-btn" id="restoreBtn">
                                                                        <i class="fas fa-upload me-2"></i>Restore Data
                                                                    </button>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <i class="fas fa-undo fa-2x text-gray-300"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="card border-left-info shadow h-100">
                                                <div class="card-body">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        System Status
                                                    </div>
                                                    <div class="mb-2">
                                                        <small class="text-muted">Last Backup:</small><br>
                                                        <span class="text-gray-800" id="lastBackupTime">Never</span>
                                                    </div>
                                                    <div class="mb-2">
                                                        <small class="text-muted">Backup Size:</small><br>
                                                        <span class="text-gray-800" id="backupSize">0 MB</span>
                                                    </div>
                                                    <div class="mb-2">
                                                        <small class="text-muted">Status:</small><br>
                                                        <span class="badge badge-success" id="systemStatus">Ready</span>
                                                    </div>
                                                    <div class="mb-2">
                                                        <small class="text-muted">Progress:</small><br>
                                                        <div class="progress" id="progressContainer" style="display: none;">
                                                            <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%"></div>
                                                        </div>
                                                        <span id="progressText" class="text-xs text-muted"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Real-time Activity Log -->
                    <div class="row mt-4">
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Real-time Activity Log</h6>
                                    <button class="btn btn-sm btn-outline-secondary" id="clearLogBtn">
                                        <i class="fas fa-trash"></i> Clear Log
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div id="activityLog" class="activity-log" style="height: 200px; overflow-y: auto; background-color: #f8f9fa; padding: 15px; border-radius: 5px;">
                                        <div class="log-entry text-success">
                                            <i class="fas fa-circle text-success" style="font-size: 8px;"></i>
                                            <span class="timestamp">[<span id="currentTime"></span>]</span>
                                            <span class="message">System initialized and ready for backup operations</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-primary" type="submit">Logout</button>
                        </form>
                    </div>
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
        // Real-time Backup & Recovery System
        class BackupRecoverySystem {
            constructor() {
                this.isProcessing = false;
                this.currentOperation = null;
                this.progress = 0;
                this.statusInterval = null;
                this.initializeSystem();
            }

            initializeSystem() {
                this.setupSidebar();
                this.setupEventListeners();
                this.startStatusUpdates();
                this.updateCurrentTime();
                this.addLogEntry('success', 'System initialized and ready for backup operations');
            }

            setupSidebar() {
                const sidebarToggle = document.getElementById('sidebarToggle');
                const sidebar = document.getElementById('accordionSidebar');
                const contentWrapper = document.getElementById('content-wrapper');
                const sidebarOverlay = document.createElement('div');
                sidebarOverlay.className = 'sidebar-overlay';
                sidebarOverlay.id = 'sidebarOverlay';
                document.body.appendChild(sidebarOverlay);

                const toggleSidebar = () => {
                    sidebar.classList.toggle('collapsed');
                    contentWrapper.classList.toggle('sidebar-collapsed');
                    
                    const icon = sidebarToggle.querySelector('i');
                    if (sidebar.classList.contains('collapsed')) {
                        icon.className = 'fas fa-bars';
                    } else {
                        icon.className = 'fas fa-times';
                    }
                };

                const toggleMobileSidebar = () => {
                    sidebar.classList.toggle('mobile-open');
                    sidebarOverlay.classList.toggle('show');
                };

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

                sidebarOverlay.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        toggleMobileSidebar();
                    }
                });

                window.addEventListener('resize', function() {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('mobile-open');
                        sidebarOverlay.classList.remove('show');
                    }
                });

                if (window.innerWidth <= 768) {
                    sidebar.classList.add('mobile-open');
                    contentWrapper.classList.add('sidebar-collapsed');
                }
            }

            setupEventListeners() {
                // Backup button
                document.getElementById('backupBtn').addEventListener('click', () => {
                    this.startBackup();
                });

                // Restore button
                document.getElementById('restoreBtn').addEventListener('click', () => {
                    this.startRestore();
                });

                // Clear log button
                document.getElementById('clearLogBtn').addEventListener('click', () => {
                    this.clearLog();
                });
            }

            startBackup() {
                if (this.isProcessing) {
                    this.addLogEntry('warning', 'Another operation is already in progress');
                    return;
                }

                this.isProcessing = true;
                this.currentOperation = 'backup';
                this.progress = 0;

                const btn = document.getElementById('backupBtn');
                const originalText = btn.innerHTML;
                
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Starting Backup...';
                btn.disabled = true;
                
                this.updateSystemStatus('processing', 'Backing up...');
                this.showProgress();
                this.addLogEntry('info', 'Backup process initiated');

                // Simulate real-time backup process
                this.simulateBackupProcess(btn, originalText);
            }

            startRestore() {
                if (this.isProcessing) {
                    this.addLogEntry('warning', 'Another operation is already in progress');
                    return;
                }

                if (!confirm('Are you sure you want to restore data? This action cannot be undone.')) {
                    return;
                }

                this.isProcessing = true;
                this.currentOperation = 'restore';
                this.progress = 0;

                const btn = document.getElementById('restoreBtn');
                const originalText = btn.innerHTML;
                
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Restoring...';
                btn.disabled = true;
                
                this.updateSystemStatus('processing', 'Restoring...');
                this.showProgress();
                this.addLogEntry('info', 'Restore process initiated');

                // Simulate real-time restore process
                this.simulateRestoreProcess(btn, originalText);
            }

            simulateBackupProcess(btn, originalText) {
                const steps = [
                    { progress: 10, message: 'Initializing backup process...', type: 'info' },
                    { progress: 25, message: 'Scanning system files...', type: 'info' },
                    { progress: 40, message: 'Compressing data...', type: 'info' },
                    { progress: 60, message: 'Creating backup archive...', type: 'info' },
                    { progress: 80, message: 'Validating backup integrity...', type: 'info' },
                    { progress: 95, message: 'Finalizing backup...', type: 'info' },
                    { progress: 100, message: 'Backup completed successfully!', type: 'success' }
                ];

                let currentStep = 0;
                const processStep = () => {
                    if (currentStep < steps.length) {
                        const step = steps[currentStep];
                        this.progress = step.progress;
                        this.updateProgress(step.progress);
                        this.addLogEntry(step.type, step.message);
                        
                        if (step.progress === 100) {
                            this.completeBackup(btn, originalText);
                        } else {
                            currentStep++;
                            setTimeout(processStep, 800 + Math.random() * 400); // Random delay for realism
                        }
                    }
                };

                processStep();
            }

            simulateRestoreProcess(btn, originalText) {
                const steps = [
                    { progress: 15, message: 'Initializing restore process...', type: 'info' },
                    { progress: 30, message: 'Locating backup files...', type: 'info' },
                    { progress: 50, message: 'Extracting backup data...', type: 'info' },
                    { progress: 70, message: 'Restoring system files...', type: 'info' },
                    { progress: 85, message: 'Updating database records...', type: 'info' },
                    { progress: 95, message: 'Verifying restore integrity...', type: 'info' },
                    { progress: 100, message: 'Data successfully restored!', type: 'success' }
                ];

                let currentStep = 0;
                const processStep = () => {
                    if (currentStep < steps.length) {
                        const step = steps[currentStep];
                        this.progress = step.progress;
                        this.updateProgress(step.progress);
                        this.addLogEntry(step.type, step.message);
                        
                        if (step.progress === 100) {
                            this.completeRestore(btn, originalText);
                        } else {
                            currentStep++;
                            setTimeout(processStep, 1000 + Math.random() * 500); // Random delay for realism
                        }
                    }
                };

                processStep();
            }

            completeBackup(btn, originalText) {
                this.isProcessing = false;
                this.currentOperation = null;
                
                btn.innerHTML = '<i class="fas fa-check me-2"></i>Backup Complete!';
                btn.classList.remove('btn-backup');
                btn.classList.add('btn-success');
                
                this.updateSystemStatus('ready', 'Ready');
                this.hideProgress();
                this.updateBackupInfo();
                this.addLogEntry('success', 'Backup process completed successfully');
                this.showToast('success', 'Backup completed successfully!');
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-backup');
                }, 3000);
            }

            completeRestore(btn, originalText) {
                this.isProcessing = false;
                this.currentOperation = null;
                
                btn.innerHTML = '<i class="fas fa-check me-2"></i>Restore Complete!';
                btn.classList.remove('btn-restore');
                btn.classList.add('btn-success');
                
                this.updateSystemStatus('ready', 'Ready');
                this.hideProgress();
                this.addLogEntry('success', 'Restore process completed successfully');
                this.showToast('success', 'Data successfully restored!');
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-restore');
                }, 3000);
            }

            updateSystemStatus(status, text) {
                const statusElement = document.getElementById('systemStatus');
                statusElement.textContent = text;
                statusElement.className = `badge badge-${status === 'ready' ? 'success' : status === 'processing' ? 'warning' : 'danger'}`;
            }

            showProgress() {
                const progressContainer = document.getElementById('progressContainer');
                const progressBar = document.getElementById('progressBar');
                progressContainer.style.display = 'block';
                progressBar.style.width = '0%';
            }

            updateProgress(percentage) {
                const progressBar = document.getElementById('progressBar');
                const progressText = document.getElementById('progressText');
                progressBar.style.width = percentage + '%';
                progressText.textContent = `${percentage}% - ${this.currentOperation} in progress...`;
            }

            hideProgress() {
                const progressContainer = document.getElementById('progressContainer');
                const progressText = document.getElementById('progressText');
                progressContainer.style.display = 'none';
                progressText.textContent = '';
            }

            updateBackupInfo() {
                const now = new Date();
                const timeString = now.toLocaleString();
                const size = (Math.random() * 500 + 100).toFixed(1); // Random size between 100-600 MB
                
                document.getElementById('lastBackupTime').textContent = timeString;
                document.getElementById('backupSize').textContent = size + ' MB';
            }

            addLogEntry(type, message) {
                const logContainer = document.getElementById('activityLog');
                const timestamp = new Date().toLocaleTimeString();
                
                const logEntry = document.createElement('div');
                logEntry.className = `log-entry text-${type}`;
                logEntry.innerHTML = `
                    <i class="fas fa-circle text-${type}" style="font-size: 8px;"></i>
                    <span class="timestamp">[${timestamp}]</span>
                    <span class="message">${message}</span>
                `;
                
                logContainer.appendChild(logEntry);
                logContainer.scrollTop = logContainer.scrollHeight;
            }

            clearLog() {
                if (confirm('Are you sure you want to clear this Logs?')) {
                    const logContainer = document.getElementById('activityLog');
                    logContainer.innerHTML = '';
                    this.addLogEntry('info', 'Activity log cleared');
                }
            }

            startStatusUpdates() {
                // Update current time every second
                setInterval(() => {
                    this.updateCurrentTime();
                }, 1000);

                // Simulate system status updates
                setInterval(() => {
                    if (!this.isProcessing) {
                        this.simulateSystemUpdates();
                    }
                }, 30000); // Every 30 seconds
            }

            updateCurrentTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString();
                const timeElements = document.querySelectorAll('#currentTime');
                timeElements.forEach(el => el.textContent = timeString);
            }

            simulateSystemUpdates() {
                // Simulate occasional system status updates
                const updates = [
                    'System health check completed',
                    'Database connection verified',
                    'Storage space checked',
                    'Security scan completed'
                ];
                
                const randomUpdate = updates[Math.floor(Math.random() * updates.length)];
                this.addLogEntry('info', randomUpdate);
            }

            showToast(type, message) {
                const toast = document.createElement('div');
                toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
                toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
                toast.innerHTML = `
                    ${message}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                `;
                
                document.body.appendChild(toast);
                
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 5000);
            }
        }

        // Initialize the system when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            window.backupSystem = new BackupRecoverySystem();
        });
    </script>

</body>

</html>
<?php /**PATH C:\laragon\www\E-Grid-Monitoring-System\resources\views/backup_recovery.blade.php ENDPATH**/ ?>