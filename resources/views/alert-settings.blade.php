<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alert Settings - EGMS</title>

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

        .navbar-logo {
            width: 45px;   
            height: 45px;  
            object-fit: contain; 
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            border-radius: 12px 12px 0 0;
            padding: 1.5rem;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #d1d5db;
            padding: 0.75rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3B82F6 0%, #1E3A8A 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }
        
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        
        .recipient-row {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .recipient-row:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-1px);
        }
        
        .recipient-row.editing {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: #f0f9ff;
        }
        
        /* Button hover and click effects */
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }
        
        .btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
        }
        
        .recipient-row .form-control:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
        }
        
        .recipient-row .btn-group .btn {
            border-radius: 0;
        }
        
        .recipient-row .btn-group .btn:first-child {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }
        
        .recipient-row .btn-group .btn:last-child {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }
        
        .recipient-row .btn-group .btn:not(:first-child):not(:last-child) {
            border-radius: 0;
        }
        
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        
        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #3B82F6;
        }
        
        input:checked + .slider:before {
            transform: translateX(26px);
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

        /* Enhanced Live Badge Animations */
        @keyframes livePulse {
            0%, 100% { 
                opacity: 1; 
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }
            50% { 
                opacity: 0.8; 
                transform: scale(1.1);
                box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.1);
            }
        }

        @keyframes liveRipple {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        @keyframes liveGlow {
            0%, 100% {
                box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
            }
            50% {
                box-shadow: 0 6px 20px rgba(16, 185, 129, 0.6);
            }
        }

        @keyframes liveShimmer {
            0% {
                left: -100%;
            }
            50% {
                left: 100%;
            }
            100% {
                left: 100%;
            }
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

            <!-- Enhanced Orange Nav Item - Manage Devices -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="{{ route('devices.index') }}" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-network-wired" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 14px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Manage Devices</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Analytics -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="{{ route('analytics.index') }}" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-fw fa-chart-area" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 14px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Analytics</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Alert Settings (Active) -->
            <li class="nav-item active" style="margin: 6px 16px;">
                <a class="nav-link" href="{{ route('settings.alerts') }}" style="padding: 16px 20px; border-radius: 8px; background: rgba(255, 255, 255, 0.05); border: none; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: none;">
                    <i class="fas fa-fw fa-cog" style="font-size: 18px; margin-right: 14px; color: #f97316; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-weight: 600; font-size: 14px; color: white; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Alert Settings</span>
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

                <!-- Begin Page Content -->
                <div class="container-fluid" style="background: transparent;">
                    <!-- Page Header -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0" style="color: white !important;">Alert Settings</h1>
                    </div>

            <!-- Alert Settings Form -->
            <form id="alertSettingsForm">
                @csrf
                
                <!-- Recipient Management -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-users me-2 text-primary"></i>
                            SMS Alert Recipients
                        </h5>
                        <button type="button" class="btn btn-success btn-sm" id="addRecipientBtn">
                            <i class="fas fa-plus me-1"></i>Add Recipient
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="recipientsContainer">
                            @if(count($settings->recipients) > 0)
                                @foreach($settings->recipients as $index => $recipient)
                                    <div class="recipient-row" data-index="{{ $index }}">
                                        <div class="row">
                                             <div class="col-md-4">
                                                 <label class="form-label">Name</label>
                                                 <input type="text" class="form-control" name="recipients[{{ $index }}][name]" 
                                                        value="{{ $recipient['name'] ?? '' }}" readonly required placeholder="Enter recipient name">
                                             </div>
                                             <div class="col-md-3">
                                                 <label class="form-label">Phone</label>
                                                 <input type="text" class="form-control" name="recipients[{{ $index }}][phone]" 
                                                        value="{{ $recipient['phone'] ?? '' }}" readonly placeholder="Enter phone number">
                                             </div>
                                             <div class="col-md-3">
                                                 <label class="form-label">Role</label>
                                                 <div class="d-flex align-items-center bg-light border rounded px-3 py-2" style="height: 38px;">
                                                     <span class="badge me-2" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; padding: 6px 12px; border-radius: 20px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);">Admin</span>
                                                 </div>
                                                 <input type="hidden" name="recipients[{{ $index }}][role]" value="admin">
                                             </div>
                                             <div class="col-md-2 d-flex align-items-end">
                                                 <div class="btn-group" role="group">
                                                     <button type="button" class="btn btn-outline-primary btn-sm edit-recipient" title="Edit Recipient">
                                                         <i class="fas fa-edit"></i>
                                                     </button>
                                                     <button type="button" class="btn btn-outline-success btn-sm save-recipient d-none" title="Save Changes">
                                                         <i class="fas fa-check"></i>
                                                     </button>
                                                     <button type="button" class="btn btn-outline-danger btn-sm remove-recipient" title="Delete Recipient">
                                                         <i class="fas fa-trash"></i>
                                                     </button>
                                                 </div>
                                             </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <div id="noRecipients" class="text-center py-4 {{ count($settings->recipients) > 0 ? 'd-none' : '' }}">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No recipients configured. Click "Add Recipient" to get started.</p>
                        </div>
                    </div>
                </div>

               

                <!-- Recent Logs Section -->
                <div class="card mt-4" style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); overflow: hidden;">
                    <div class="card-header" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); border-bottom: 2px solid #e2e8f0; padding: 1.5rem;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #8b5cf6, #7c3aed); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                                    <i class="fas fa-history" style="color: white; font-size: 20px;"></i>
                                </div>
                                <div>
                                    <h5 style="color: #1e293b; font-weight: 700; margin: 0; font-family: 'Inter', sans-serif;">Recent Alert Logs</h5>
                                    <p style="color: #64748b; font-size: 0.875rem; margin: 0;">Real-time monitoring of system alerts and notifications</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center" style="gap: 12px;">
                                <div style="display: flex; align-items: center; background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 10px 18px; border-radius: 25px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.8px; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4); position: relative; overflow: hidden; animation: liveGlow 3s ease-in-out infinite;" id="logs-status">
                                    <div style="position: relative; display: flex; align-items: center; margin-right: 10px;">
                                        <div style="width: 10px; height: 10px; background: white; border-radius: 50%; animation: livePulse 1.5s ease-in-out infinite; position: relative;">
                                            <div style="position: absolute; top: -2px; left: -2px; width: 14px; height: 14px; background: rgba(255, 255, 255, 0.3); border-radius: 50%; animation: liveRipple 2s ease-out infinite;"></div>
                                        </div>
                                    </div>
                                    <span style="position: relative; z-index: 2;">Live</span>
                                    <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent); animation: liveShimmer 3s ease-in-out infinite;"></div>
                                </div>
                                <button class="btn" id="refresh-logs-btn" style="background: linear-gradient(135deg, #f1f5f9, #e2e8f0); border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 12px; color: #475569; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <div class="table-responsive">
                            <table class="table" style="margin: 0; border: none;">
                                <thead style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-bottom: 2px solid #e2e8f0;">
                                    <tr>
                                        <th style="border: none; padding: 1rem 1.5rem; font-weight: 700; color: #374151; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px;">Device ID</th>
                                        <th style="border: none; padding: 1rem 1.5rem; font-weight: 700; color: #374151; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px;">Barangay</th>
                                        <th style="border: none; padding: 1rem 1.5rem; font-weight: 700; color: #374151; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px;">Alert Type</th>
                                        <th style="border: none; padding: 1rem 1.5rem; font-weight: 700; color: #374151; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px;">Message</th>
                                        <th style="border: none; padding: 1rem 1.5rem; font-weight: 700; color: #374151; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.5px;">Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody id="alert-logs-tbody" style="background: white;">
                                    @php
                                        $recentLogs = \App\Models\AlertLog::latest()->take(10)->get();
                                    @endphp
                                    @forelse($recentLogs as $log)
                                        <tr style="border-bottom: 1px solid #f1f5f9; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='white'">
                                            <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle;">
                                                <span style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);">{{ $log->device_id }}</span>
                                            </td>
                                            <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle; font-weight: 600; color: #374151;">{{ $log->barangay }}</td>
                                            <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle;">
                                                <span style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white; padding: 6px 12px; border-radius: 20px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);">
                                                    {{ ucfirst(str_replace('_', ' ', $log->alert_type)) }}
                                                </span>
                                            </td>
                                            <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle; color: #64748b; font-size: 0.875rem; line-height: 1.5;">{{ Str::limit($log->message, 50) }}</td>
                                            <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle;">
                                                <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                                    <span style="color: #374151; font-weight: 600; font-size: 0.875rem;">{{ $log->created_at->format('M d, Y') }}</span>
                                                    <span style="color: #64748b; font-size: 0.75rem;">{{ $log->created_at->format('g:i:s A') }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" style="border: none; padding: 3rem 1.5rem; text-align: center;">
                                                <div style="display: flex; flex-direction: column; align-items: center; color: #64748b;">
                                                    <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #f1f5f9, #e2e8f0); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                                        <i class="fas fa-inbox" style="font-size: 24px; color: #94a3b8;"></i>
                                                    </div>
                                                    <h6 style="color: #374151; font-weight: 600; margin-bottom: 0.5rem;">No Alert Logs Found</h6>
                                                    <p style="color: #64748b; font-size: 0.875rem; margin: 0;">System is running smoothly with no recent alerts</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <div style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-top: 1px solid #e2e8f0; padding: 1rem 1.5rem; text-align: center;">
                            <div style="display: flex; align-items: center; justify-content: center; gap: 1rem; color: #64748b; font-size: 0.875rem;">
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-chart-line" style="color: #3b82f6;"></i>
                                    <span id="logs-count" style="font-weight: 600; color: #374151;">{{ $recentLogs->count() }}</span>
                                    <span>recent alerts</span>
                                </div>
                                <div style="width: 1px; height: 16px; background: #cbd5e1;"></div>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-clock" style="color: #10b981;"></i>
                                    <span>Last updated: </span>
                                    <span id="last-update" style="font-weight: 600; color: #374151;">{{ now()->format('g:i:s A') }}</span>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    
                </div>
                 <!-- Web Push Notifications Section 
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-mobile-alt me-2 text-info"></i>
                            Web Push Notifications
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-gray-800 mb-3">Real-time Power Outage Alerts</h6>
                                <p class="text-muted mb-4">
                                    Enable browser push notifications to receive instant alerts when power outages are detected 
                                    in your monitoring devices. These notifications will appear even when the dashboard is minimized.
                                </p>
                                
                                <div class="d-flex align-items-center mb-3">
                                    <span class="me-3">Push Status:</span>
                                    <span id="push-status" class="badge badge-warning">Checking...</span>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card border-left-info">
                                    <div class="card-body">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Notification Features
                                        </div>
                                        <ul class="list-unstyled text-sm">
                                            <li class="mb-2">
                                                <i class="fas fa-check text-success me-2"></i>
                                                Real-time outage Monitoring
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-check text-success me-2"></i>
                                                Works when tab is minimized
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-check text-success me-2"></i>
                                                Direct link to dashboard
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-check text-success me-2"></i>
                                                Desktop support
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div> -->
                    </form>
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

        <!-- Toast Container -->
        <div class="toast-container"></div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>

        <!-- Axios for AJAX requests -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        
        <!-- Web Push Notifications -->
        <script src="{{ asset('js/webpush.js') }}"></script>
    <script>
        let recipientIndex = {{ count($settings->recipients) }};

        // Add recipient functionality
        document.getElementById('addRecipientBtn').addEventListener('click', function() {
            const container = document.getElementById('recipientsContainer');
            const noRecipients = document.getElementById('noRecipients');
            
             const recipientHtml = `
                 <div class="recipient-row" data-index="${recipientIndex}">
                     <div class="row">
                         <div class="col-md-4">
                             <label class="form-label">Name</label>
                             <input type="text" class="form-control" name="recipients[${recipientIndex}][name]" readonly required placeholder="Enter recipient name">
                         </div>
                         <div class="col-md-3">
                             <label class="form-label">Phone</label>
                             <input type="text" class="form-control" name="recipients[${recipientIndex}][phone]" readonly placeholder="Enter phone number">
                         </div>
                         <div class="col-md-3">
                             <label class="form-label">Role</label>
                             <div class="d-flex align-items-center bg-light border rounded px-3 py-2" style="height: 38px;">
                                 <span class="badge bg-primary me-2">Admin</span>
                             </div>
                             <input type="hidden" name="recipients[${recipientIndex}][role]" value="admin">
                         </div>
                         <div class="col-md-2 d-flex align-items-end">
                             <div class="btn-group" role="group">
                                 <button type="button" class="btn btn-outline-primary btn-sm edit-recipient" title="Edit Recipient">
                                     <i class="fas fa-edit"></i>
                                 </button>
                                 <button type="button" class="btn btn-outline-success btn-sm save-recipient d-none" title="Save Changes">
                                     <i class="fas fa-check"></i>
                                 </button>
                                 <button type="button" class="btn btn-outline-danger btn-sm remove-recipient" title="Delete Recipient">
                                     <i class="fas fa-trash"></i>
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>
             `;
            
            container.insertAdjacentHTML('beforeend', recipientHtml);
            noRecipients.classList.add('d-none');
            recipientIndex++;
        });

        // Edit recipient functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.edit-recipient')) {
                const recipientRow = e.target.closest('.recipient-row');
                const nameInput = recipientRow.querySelector('input[name*="[name]"]');
                const phoneInput = recipientRow.querySelector('input[name*="[phone]"]');
                const editBtn = recipientRow.querySelector('.edit-recipient');
                const saveBtn = recipientRow.querySelector('.save-recipient');
                
                // Enable editing
                nameInput.removeAttribute('readonly');
                phoneInput.removeAttribute('readonly');
                
                // Add visual feedback for edit mode
                nameInput.classList.add('border-primary', 'bg-light');
                phoneInput.classList.add('border-primary', 'bg-light');
                recipientRow.classList.add('editing');
                
                // Show save button, hide edit button
                editBtn.classList.add('d-none');
                saveBtn.classList.remove('d-none');
                
                // Focus on name field
                nameInput.focus();
                nameInput.select();
            }
        });

        // Save recipient functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.save-recipient')) {
                const recipientRow = e.target.closest('.recipient-row');
                const nameInput = recipientRow.querySelector('input[name*="[name]"]');
                const phoneInput = recipientRow.querySelector('input[name*="[phone]"]');
                const editBtn = recipientRow.querySelector('.edit-recipient');
                const saveBtn = recipientRow.querySelector('.save-recipient');
                
                // Validate required fields
                if (!nameInput.value.trim()) {
                    showToast('error', 'Name is required');
                    nameInput.focus();
                    return;
                }
                
                if (!phoneInput.value.trim()) {
                    showToast('error', 'Phone number is required');
                    phoneInput.focus();
                    return;
                }
                
                // Show loading state
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                saveBtn.disabled = true;
                
                // Collect all recipients data
                const allRecipients = [];
                const recipientRows = document.querySelectorAll('.recipient-row');
                
                recipientRows.forEach(row => {
                    const name = row.querySelector('input[name*="[name]"]').value;
                    const phone = row.querySelector('input[name*="[phone]"]').value;
                    const role = row.querySelector('input[name*="[role]"]').value;
                    
                    if (name.trim() && phone.trim()) {
                        allRecipients.push({
                            name: name.trim(),
                            phone: phone.trim(),
                            role: role
                        });
                    }
                });
                
                // Send update to server
                fetch('/settings/alerts/save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        recipients: allRecipients,
                        alerts_enabled: true,
                        channels: ['sms']
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Disable editing
                        nameInput.setAttribute('readonly', 'readonly');
                        phoneInput.setAttribute('readonly', 'readonly');
                        
                        // Remove visual feedback
                        nameInput.classList.remove('border-primary', 'bg-light');
                        phoneInput.classList.remove('border-primary', 'bg-light');
                        recipientRow.classList.remove('editing');
                        
                        // Show edit button, hide save button
                        editBtn.classList.remove('d-none');
                        saveBtn.classList.add('d-none');
                        
                        // Show success message
                        showToast('success', 'Recipient updated successfully');
                    } else {
                        showToast('error', data.message || 'Failed to update recipient');
                    }
                })
                .catch(error => {
                    console.error('Error updating recipient:', error);
                    showToast('error', 'Failed to update recipient');
                })
                .finally(() => {
                    // Reset button state
                    saveBtn.innerHTML = '<i class="fas fa-check"></i>';
                    saveBtn.disabled = false;
                });
            }
        });

        // Remove recipient functionality with confirmation
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-recipient')) {
                const recipientRow = e.target.closest('.recipient-row');
                const nameInput = recipientRow.querySelector('input[name*="[name]"]');
                const recipientName = nameInput.value || 'this recipient';
                
                // Show confirmation dialog
                if (confirm(`Are you sure you want to delete ${recipientName}?`)) {
                    // Remove from DOM first
                    recipientRow.remove();
                    
                    // Show no recipients message if no recipients left
                    const container = document.getElementById('recipientsContainer');
                    const noRecipients = document.getElementById('noRecipients');
                    if (container.children.length === 0) {
                        noRecipients.classList.remove('d-none');
                    }
                    
                    // Save the updated recipients to database
                    saveRecipientsToDatabase();
                }
            }
        });

        // Function to save recipients to database
        function saveRecipientsToDatabase() {
            const form = document.getElementById('alertSettingsForm');
            const formData = new FormData(form);
            
            // Build data object manually
            const data = {
                alerts_enabled: formData.get('alerts_enabled') === 'on',
                channels: Array.from(formData.getAll('channels[]')),
                recipients: []
            };
            
            // Collect all recipients from the form
            const recipientRows = document.querySelectorAll('.recipient-row');
            recipientRows.forEach((row, index) => {
                const nameInput = row.querySelector('input[name*="[name]"]');
                const phoneInput = row.querySelector('input[name*="[phone]"]');
                const roleInput = row.querySelector('input[name*="[role]"]');
                
                if (nameInput && nameInput.value.trim()) {
                    data.recipients.push({
                        name: nameInput.value.trim(),
                        phone: phoneInput ? phoneInput.value.trim() : '',
                        role: roleInput ? roleInput.value : 'admin'
                    });
                }
            });
            
            // Send to backend
            fetch('{{ route("settings.alerts.save") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    showToast('success', 'Recipient deleted successfully');
                } else {
                    showToast('error', result.message || 'Failed to delete recipient');
                    // Reload page to restore state
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('error', 'Failed to delete recipient');
                // Reload page to restore state
                location.reload();
            });
        }


        // Toast notification function
        function showToast(type, message) {
            const toastContainer = document.querySelector('.toast-container');
            const toastId = 'toast-' + Date.now();
            
            const toastHtml = `
                <div id="${toastId}" class="toast align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0" role="alert">
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            `;
            
            toastContainer.insertAdjacentHTML('beforeend', toastHtml);
            
            const toastElement = document.getElementById(toastId);
            const toast = new bootstrap.Toast(toastElement, { delay: 5000 });
            toast.show();
            
            // Remove toast element after it's hidden
            toastElement.addEventListener('hidden.bs.toast', function() {
                toastElement.remove();
            });
        }

        // Real-time Alert Logs System
        class RealTimeAlertLogs {
            constructor() {
                this.refreshInterval = 5000; // 5 seconds
                this.isRefreshing = false;
                this.lastUpdateTime = null;
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.startAutoRefresh();
                console.log('Real-time Alert Logs initialized');
            }

            setupEventListeners() {
                // Manual refresh button
                const refreshBtn = document.getElementById('refresh-logs-btn');
                if (refreshBtn) {
                    refreshBtn.addEventListener('click', () => {
                        this.refreshLogs(true);
                    });
                }
            }

            startAutoRefresh() {
                // Initial load
                this.refreshLogs();
                
                // Set up interval
                setInterval(() => {
                    this.refreshLogs();
                }, this.refreshInterval);
            }

            async refreshLogs(showLoading = false) {
                if (this.isRefreshing) return;
                
                this.isRefreshing = true;
                
                if (showLoading) {
                    this.updateStatus('refreshing');
                }

                try {
                    const response = await fetch('/api/alert-logs', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });

                    if (!response.ok) {
                        throw new Error('Failed to fetch alert logs');
                    }

                    const data = await response.json();
                    this.updateLogsTable(data.logs);
                    this.updateLogsCount(data.count);
                    this.updateLastUpdateTime(data.last_updated);
                    this.updateStatus('live');
                    
                    // Check for new logs
                    this.checkForNewLogs(data.logs);

                } catch (error) {
                    console.error('Error refreshing alert logs:', error);
                    this.updateStatus('error');
                } finally {
                    this.isRefreshing = false;
                }
            }

            updateLogsTable(logs) {
                const tbody = document.getElementById('alert-logs-tbody');
                if (!tbody) return;

                if (logs.length === 0) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="5" style="border: none; padding: 3rem 1.5rem; text-align: center;">
                                <div style="display: flex; flex-direction: column; align-items: center; color: #64748b;">
                                    <div style="width: 64px; height: 64px; background: linear-gradient(135deg, #f1f5f9, #e2e8f0); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                                        <i class="fas fa-inbox" style="font-size: 24px; color: #94a3b8;"></i>
                                    </div>
                                    <h6 style="color: #374151; font-weight: 600; margin-bottom: 0.5rem;">No Alert Logs Found</h6>
                                    <p style="color: #64748b; font-size: 0.875rem; margin: 0;">System is running smoothly with no recent alerts</p>
                                </div>
                            </td>
                        </tr>
                    `;
                    return;
                }

                tbody.innerHTML = logs.map(log => `
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='white'">
                        <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle;">
                            <span style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; padding: 6px 12px; border-radius: 20px; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);">${log.device_id}</span>
                        </td>
                        <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle; font-weight: 600; color: #374151;">${log.barangay}</td>
                        <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle;">
                            <span style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white; padding: 6px 12px; border-radius: 20px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);">
                                ${log.alert_type.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase())}
                            </span>
                        </td>
                        <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle; color: #64748b; font-size: 0.875rem; line-height: 1.5;">${log.message.length > 50 ? log.message.substring(0, 50) + '...' : log.message}</td>
                        <td style="border: none; padding: 1rem 1.5rem; vertical-align: middle;">
                            <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                <span style="color: #374151; font-weight: 600; font-size: 0.875rem;">${new Date(log.created_at_raw).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</span>
                                <span style="color: #64748b; font-size: 0.75rem;">${new Date(log.created_at_raw).toLocaleTimeString('en-US', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' })}</span>
                            </div>
                        </td>
                    </tr>
                `).join('');
            }

            updateLogsCount(count) {
                const countElement = document.getElementById('logs-count');
                if (countElement) {
                    countElement.textContent = count;
                }
            }

            updateLastUpdateTime(time) {
                const timeElement = document.getElementById('last-update');
                if (timeElement) {
                    timeElement.textContent = time;
                }
            }

            updateStatus(status) {
                const statusElement = document.getElementById('logs-status');
                if (!statusElement) return;

                const statusMap = {
                    'live': { 
                        style: 'display: flex; align-items: center; background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 10px 18px; border-radius: 25px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.8px; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4); position: relative; overflow: hidden; animation: liveGlow 3s ease-in-out infinite;',
                        content: `
                            <div style="position: relative; display: flex; align-items: center; margin-right: 10px;">
                                <div style="width: 10px; height: 10px; background: white; border-radius: 50%; animation: livePulse 1.5s ease-in-out infinite; position: relative;">
                                    <div style="position: absolute; top: -2px; left: -2px; width: 14px; height: 14px; background: rgba(255, 255, 255, 0.3); border-radius: 50%; animation: liveRipple 2s ease-out infinite;"></div>
                                </div>
                            </div>
                            <span style="position: relative; z-index: 2;">Live</span>
                            <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent); animation: liveShimmer 3s ease-in-out infinite;"></div>
                        `
                    },
                    'refreshing': { 
                        style: 'display: flex; align-items: center; background: linear-gradient(135deg, #f59e0b, #d97706); color: white; padding: 10px 18px; border-radius: 25px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.8px; box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4); position: relative; overflow: hidden;',
                        content: `
                            <div style="position: relative; display: flex; align-items: center; margin-right: 10px;">
                                <i class="fas fa-spinner fa-spin" style="color: white; font-size: 12px;"></i>
                            </div>
                            <span style="position: relative; z-index: 2;">Updating...</span>
                        `
                    },
                    'error': { 
                        style: 'display: flex; align-items: center; background: linear-gradient(135deg, #ef4444, #dc2626); color: white; padding: 10px 18px; border-radius: 25px; font-weight: 700; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.8px; box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4); position: relative; overflow: hidden;',
                        content: `
                            <div style="position: relative; display: flex; align-items: center; margin-right: 10px;">
                                <i class="fas fa-exclamation-circle" style="color: white; font-size: 12px;"></i>
                            </div>
                            <span style="position: relative; z-index: 2;">Error</span>
                        `
                    }
                };

                const statusInfo = statusMap[status] || statusMap['error'];
                statusElement.setAttribute('style', statusInfo.style);
                statusElement.innerHTML = statusInfo.content;
            }

            checkForNewLogs(logs) {
                if (!this.lastUpdateTime || logs.length === 0) {
                    this.lastUpdateTime = logs.length > 0 ? logs[0].created_at_raw : null;
                    return;
                }

                // Check if there are new logs (logs with timestamp after last update)
                const newLogs = logs.filter(log => 
                    new Date(log.created_at_raw) > new Date(this.lastUpdateTime)
                );

                if (newLogs.length > 0) {
                    // Show notification for new alerts
                    newLogs.forEach(log => {
                        if (log.alert_type === 'power_outage') {
                            this.showNewAlertNotification(log);
                        }
                    });
                    
                    // Update last update time
                    this.lastUpdateTime = logs[0].created_at_raw;
                }
            }

            showNewAlertNotification(log) {
                // Show browser notification if permission is granted
                if (Notification.permission === 'granted') {
                    new Notification('New Power Outage Alert', {
                        body: `Device ${log.device_id} in ${log.barangay} - ${log.message}`,
                        icon: '/photos/icon.png',
                        tag: 'new-alert'
                    });
                }

                // Show toast notification
                showToast('warning', `New alert: ${log.device_id} in ${log.barangay}`);
            }
        }

        // Initialize real-time alert logs when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            window.realTimeAlertLogs = new RealTimeAlertLogs();
        });

        // Hamburger Toggle Functionality
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>

    <!-- Outage Notification Component -->
    @include('components.outage-notification')
</body>
</html>
