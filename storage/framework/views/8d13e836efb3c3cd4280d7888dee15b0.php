<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Analytics - Household Performance</title>

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
            --primary-color: #3b82f6;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-bg: #f8fafc;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --card-hover-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            --border-radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #1e293b;
            line-height: 1.6;
            min-height: 100vh;
        }
        
        .page-header {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 30px 30px;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            opacity: 0.9;
            font-size: 1.1rem;
        }
        
        .analytics-card {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            border-radius: var(--border-radius);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: var(--transition);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .analytics-card:hover {
            box-shadow: var(--card-hover-shadow);
            transform: translateY(-2px);
        }
        
        .card-header {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            font-weight: 600;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .card-body {
            padding: 2rem;
        }
        
        /* Weekly analytics styles */
        .household-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0.75rem; }
        .household-card { background: radial-gradient(circle at top, rgba(255,255,255,0.08), rgba(15,23,42,0.95)); border-radius: 12px; box-shadow: 0 8px 22px rgba(2, 6, 23, 0.45); border: 1px solid rgba(148, 163, 184, 0.18); padding: .85rem .95rem; color: #f1f5f9; display: flex; flex-direction: column; gap: .5rem; transition: transform .2s ease, box-shadow .2s ease; min-height: 185px; }
        .household-card:hover { transform: translateY(-3px); box-shadow: 0 15px 32px rgba(2, 6, 23, 0.6); }
        .household-card h6 { margin: 0; font-weight: 600; font-size: .95rem; letter-spacing: -.01em; }
        .household-card small { color: rgba(241,245,249,.65); }
        .kpi-row { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .4rem; margin-bottom: .25rem; }
        .kpi { background: rgba(15,23,42,0.65); border: 1px solid rgba(96, 165, 250, 0.25); border-radius: 9px; padding: .35rem .4rem; text-align: center; }
        .kpi .value { font-weight: 700; font-size: .9rem; color: #fff; }
        .kpi .label { font-size: .62rem; color: rgba(226,232,240,.7); text-transform: uppercase; letter-spacing: .3px; }
        .sparkline { display: grid; grid-auto-flow: column; grid-auto-columns: 1fr; align-items: end; gap: 4px; height: 40px; padding-top: 4px; }
        .sparkline .bar { background: linear-gradient(180deg, #60a5fa, #3b82f6); border-radius: 2px; }
        .spark-labels { display: grid; grid-auto-flow: column; grid-auto-columns: 1fr; gap: 4px; margin-top: 4px; }
        .spark-labels span { color: rgba(225, 229, 238, .55); font-size: .55rem; text-align: center; letter-spacing: .4px; }
        .badge-top { display: inline-block; background: rgba(239,68,68,.15); color: #fecaca; border: 1px solid rgba(239,68,68,.25); padding: 2px 8px; border-radius: 999px; font-size: .7rem; font-weight: 600; }
        .outage-list { list-style: none; margin: .35rem 0 0 0; padding: 0; display: grid; gap: 5px; }
        .outage-item { display: flex; align-items: center; gap: 10px; background: rgba(15,23,42,0.65); border: 1px solid rgba(148,163,184,0.2); border-radius: 9px; padding: 5px 9px; }
        .outage-dot { width: 7px; height: 7px; border-radius: 50%; background: #ef4444; box-shadow: 0 0 0 4px rgba(239,68,68,.12); }
        .outage-meta { font-size: .7rem; color: rgba(255,255,255,.85); font-weight: 600; }
        .outage-time { font-size: .68rem; color: rgba(148,163,184,.8); margin-left: auto; }
        .weekly-meta { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: .6rem; margin-bottom: .85rem; }
        .meta-item { background: rgba(15,23,42,0.75); border: 1px solid rgba(59,130,246,0.25); border-radius: 12px; padding: .55rem .75rem; display: flex; flex-direction: column; gap: .2rem; box-shadow: inset 0 1px 0 rgba(255,255,255,0.04); position: relative; overflow: hidden; }
        .meta-item::after { content: ''; position: absolute; inset: 0; background: radial-gradient(circle at top left, rgba(59,130,246,0.25), transparent 55%); opacity: 0.8; pointer-events: none; }
        .meta-item[data-theme="success"]::after { background: radial-gradient(circle at top left, rgba(34,197,94,0.25), transparent 55%); }
        .meta-item[data-theme="warning"]::after { background: radial-gradient(circle at top left, rgba(234,179,8,0.35), transparent 55%); }
        .meta-item[data-theme="danger"]::after { background: radial-gradient(circle at top left, rgba(248,113,113,0.35), transparent 55%); }
        .meta-item[data-theme="info"]::after { background: radial-gradient(circle at top left, rgba(14,165,233,0.35), transparent 55%); }
        .meta-label { font-size: .7rem; text-transform: uppercase; letter-spacing: .4px; color: rgba(255,255,255,.7); }
        .meta-value { font-size: 1.1rem; font-weight: 700; color: #fff; }
        .meta-sub { font-size: .7rem; color: rgba(255,255,255,.65); }
        
        /* Weekly Outage View Styles */
        .weekly-outage-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-top: 1.5rem;
        }

        .week-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.98) 100%);
            border-radius: 16px;
            border: 1px solid rgba(148, 163, 184, 0.2);
            padding: 1.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2), inset 0 1px 0 rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
        }

        .week-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.5), rgba(147, 51, 234, 0.5));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .week-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            border-color: rgba(148, 163, 184, 0.3);
        }

        .week-card:hover::before {
            opacity: 1;
        }

        .week-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.08);
            position: relative;
        }

        .week-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.8), transparent);
        }

        .week-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #fff;
            margin: 0 0 0.5rem 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 0.3px;
        }

        .week-date-range {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .week-date-range::before {
            content: '📅';
            font-size: 0.9rem;
        }

        .week-outage-count {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.25), rgba(220, 38, 38, 0.3));
            color: #fecaca;
            border: 1.5px solid rgba(239, 68, 68, 0.4);
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-left: 0.75rem;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .week-outage-count::before {
            content: '⚡';
            font-size: 0.9rem;
        }

        .days-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.75rem;
        }

        .day-cell {
            aspect-ratio: 1;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 0.5rem;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
            border: 2px solid rgba(148, 163, 184, 0.25);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            cursor: pointer;
            overflow: hidden;
        }

        .day-cell::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(59, 130, 246, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .day-cell:hover {
            transform: translateY(-2px) scale(1.05);
            border-color: rgba(148, 163, 184, 0.4);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .day-cell:hover::before {
            opacity: 1;
        }

        .day-cell.has-outage {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.4), rgba(220, 38, 38, 0.5));
            border-color: rgba(239, 68, 68, 0.7);
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            animation: pulseOutage 2s ease-in-out infinite;
        }

        @keyframes pulseOutage {
            0%, 100% {
                box-shadow: 0 0 20px rgba(239, 68, 68, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            }
            50% {
                box-shadow: 0 0 28px rgba(239, 68, 68, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.15);
            }
        }

        .day-cell.has-outage::after {
            content: '';
            position: absolute;
            top: 6px;
            right: 6px;
            width: 10px;
            height: 10px;
            background: #ef4444;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(239, 68, 68, 1), 0 0 20px rgba(239, 68, 68, 0.6);
            animation: blinkOutage 1.5s ease-in-out infinite;
        }

        @keyframes blinkOutage {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.7;
                transform: scale(1.1);
            }
        }

        .day-cell.has-outage:hover {
            transform: translateY(-3px) scale(1.08);
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.6), inset 0 1px 0 rgba(255, 255, 255, 0.2);
        }

        .day-number {
            font-size: 0.9rem;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 0.3rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            letter-spacing: 0.5px;
        }

        .day-cell.has-outage .day-number {
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .day-name {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.65);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .day-cell.has-outage .day-name {
            color: rgba(255, 255, 255, 0.95);
            font-weight: 700;
        }

        .day-outage-count {
            font-size: 0.65rem;
            color: #fff;
            margin-top: 0.4rem;
            font-weight: 800;
            background: rgba(0, 0, 0, 0.3);
            padding: 0.2rem 0.4rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        .no-outages-message {
            text-align: center;
            padding: 3rem 2rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        .no-outages-message i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Week Selector Dropdown */
        #weekSelector {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23fff' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
        }

        #weekSelector:focus {
            outline: none;
            border-color: rgba(239, 68, 68, 0.6);
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
        }

        /* Day Number Cells - Smaller */
        .day-num-cell {
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.35rem;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
            border: 2px solid rgba(148, 163, 184, 0.25);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            min-height: 60px;
        }

        .day-num-cell:hover {
            transform: translateY(-2px);
            border-color: rgba(148, 163, 184, 0.5);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .day-num-cell.has-outage {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.4), rgba(220, 38, 38, 0.5));
            border-color: rgba(239, 68, 68, 0.7);
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.3);
        }

        .day-num-cell .day-num {
            font-size: 1rem;
            font-weight: 800;
            color: #fff;
        }

        .day-num-cell .day-label {
            font-size: 0.55rem;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 0.15rem;
        }

        .day-num-cell.has-outage .day-label {
            color: rgba(255, 255, 255, 0.9);
        }

        /* Outage indicator on day cell */
        .day-num-cell .outage-indicator {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            box-shadow: 0 0 6px rgba(239, 68, 68, 0.8);
            animation: pulse-dot 1.5s ease-in-out infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        /* Day popup/dropdown */
        .day-popup {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            margin-top: 8px;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            border: 1px solid rgba(148, 163, 184, 0.3);
            border-radius: 10px;
            padding: 0.75rem;
            min-width: 180px;
            max-width: 220px;
            z-index: 100;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
            display: none;
        }

        .day-num-cell.active .day-popup {
            display: block;
        }

        .day-popup::before {
            content: '';
            position: absolute;
            top: -6px;
            left: 50%;
            transform: translateX(-50%);
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid rgba(148, 163, 184, 0.3);
        }

        .day-popup-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 0.5rem;
            padding-bottom: 0.4rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .day-popup-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.35rem 0;
            font-size: 0.7rem;
        }

        .day-popup-item .brgy-name {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        .day-popup-item .brgy-status {
            padding: 0.15rem 0.4rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.6rem;
        }

        .day-popup-item .brgy-status.yes {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .day-popup-item .brgy-status.no {
            background: rgba(16, 185, 129, 0.2);
            color: #6ee7b7;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .day-popup-empty {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.7rem;
            text-align: center;
            padding: 0.5rem 0;
            font-style: italic;
        }

        /* Barangay List Styles */
        .barangay-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.7), rgba(30, 41, 59, 0.5));
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            transition: all 0.2s ease;
        }

        .barangay-item:hover {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.85), rgba(30, 41, 59, 0.65));
            transform: translateX(3px);
        }

        .barangay-item .barangay-name {
            flex: 1;
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .barangay-item .outage-percentage {
            background: rgba(239, 68, 68, 0.2);
            color: #fecaca;
            padding: 0.3rem 0.65rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.8rem;
            border: 1px solid rgba(239, 68, 68, 0.3);
            min-width: 55px;
            text-align: center;
        }

        .no-outages-note {
            text-align: center;
            padding: 1.5rem;
            color: rgba(255, 255, 255, 0.6);
            font-style: italic;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 10px;
        }

        .no-outages-note i {
            color: #10b981;
            margin-right: 0.5rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .weekly-outage-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .days-grid {
                gap: 0.5rem;
            }

            .day-cell {
                padding: 0.5rem 0.35rem;
            }

            .day-number {
                font-size: 0.8rem;
            }

            .day-name {
                font-size: 0.65rem;
            }

            .week-card {
                padding: 1.25rem;
            }

            .week-header {
                flex-direction: column;
                gap: 1rem;
            }

            .card-header .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 1rem;
            }

            .card-header .d-flex > div:last-child {
                flex-wrap: wrap;
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .days-grid {
                gap: 0.4rem;
            }

            .day-cell {
                padding: 0.4rem 0.25rem;
            }

            .day-number {
                font-size: 0.75rem;
            }

            .day-name {
                font-size: 0.6rem;
            }

            .day-outage-count {
                font-size: 0.55rem;
                padding: 0.15rem 0.3rem;
            }
        }
        
        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            color: var(--secondary-color);
            flex-direction: column;
        }
        
        .loading-spinner i {
            animation: spin 1s linear infinite;
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .error-message {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            text-align: center;
            border: 1px solid #fca5a5;
        }
        
        .error-message i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--danger-color);
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: .5rem;
            margin-bottom: .75rem;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
            border-radius: 14px;
            padding: .65rem .75rem;
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.45), inset 0 1px 0 rgba(255, 255, 255, 0.08);
            transition: var(--transition);
            border: 1px solid rgba(148, 163, 184, 0.25);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top left, rgba(255,255,255,0.12), transparent 55%);
            opacity: .85;
            pointer-events: none;
            transition: opacity .3s ease;
        }

        .stat-card.primary::after {
            background: radial-gradient(circle at top left, rgba(59,130,246,0.3), transparent 60%);
        }

        .stat-card.success::after {
            background: radial-gradient(circle at top left, rgba(16,185,129,0.3), transparent 60%);
        }

        .stat-card.warning::after {
            background: radial-gradient(circle at top left, rgba(245,158,11,0.35), transparent 60%);
        }

        .stat-card.danger::after {
            background: radial-gradient(circle at top left, rgba(248,113,113,0.35), transparent 60%);
        }
        
        .stat-card:hover {
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.65);
            transform: translateY(-3px);
        }

        .stat-card:hover::after {
            opacity: 1;
        }
        
        .stat-card.primary {
            border-color: rgba(59,130,246,0.45);
        }
        
        .stat-card.success {
            border-color: rgba(16,185,129,0.45);
        }
        
        .stat-card.warning {
            border-color: rgba(245,158,11,0.45);
        }
        
        .stat-card.danger {
            border-color: rgba(248,113,113,0.45);
        }
        
        .stat-icon {
            width: 28px;
            height: 28px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .85rem;
            margin-bottom: 0.4rem;
        }
        
        .stat-card.primary .stat-icon {
            background: linear-gradient(135deg, var(--primary-color), #1d4ed8);
            color: white;
        }
        
        .stat-card.success .stat-icon {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
        }
        
        .stat-card.warning .stat-icon {
            background: linear-gradient(135deg, var(--warning-color), #d97706);
            color: white;
        }
        
        .stat-card.danger .stat-icon {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            color: white;
        }
        
        .stat-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 0.1rem;
        }
        
        .stat-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.7rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Layout compactness & no scroll */
        #content-wrapper { overflow: hidden; }
        .container-fluid { padding: 0.75rem 0.75rem !important; }
        .topbar { margin-bottom: .5rem !important; }
        
        .refresh-btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: linear-gradient(135deg, var(--primary-color), #1d4ed8);
            border: none;
            border-radius: 999px;
            padding: 0.6rem 1.4rem;
            color: white;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 6px 18px rgba(59, 130, 246, 0.35);
        }
        
        .refresh-btn .spinner-border {
            width: 1rem;
            height: 1rem;
            border-width: .15rem;
        }
        
        .refresh-btn:hover:not(.is-refreshing) {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.45);
        }
        
        .refresh-btn.is-refreshing {
            opacity: .7;
            cursor: wait;
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .household-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem 0;
                margin-bottom: 1.5rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .chart-container {
                height: 300px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .container-fluid {
                padding: 1rem;
            }
            
            .chart-container {
                height: 250px;
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
                    <span style="font-size: 14px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Dashboard</span>
                </a>
            </li>

            <!-- Enhanced Dark Divider -->
            <hr class="sidebar-divider" style="border-color: rgba(255, 255, 255, 0.08); margin: 20px 20px; border-width: 1px;">

            <!-- Enhanced Orange Nav Item - Manage Devices -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="<?php echo e(route('devices.index')); ?>" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
                    <i class="fas fa-network-wired" style="font-size: 18px; margin-right: 14px; color: rgba(255, 255, 255, 0.7); text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-size: 14px; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Manage Devices</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Analytics (Active) -->
            <li class="nav-item active" style="margin: 6px 16px;">
                <a class="nav-link" href="<?php echo e(route('analytics.index')); ?>" style="padding: 16px 20px; border-radius: 8px; background: rgba(255, 255, 255, 0.05); border: none; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: none;">
                    <i class="fas fa-fw fa-chart-area" style="font-size: 18px; margin-right: 14px; color: #f97316; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);"></i>
                    <span style="font-weight: 600; font-size: 14px; color: white; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);">Analytics</span>
                </a>
            </li>

            <!-- Enhanced Orange Nav Item - Alert Settings -->
            <li class="nav-item" style="margin: 6px 16px;">
                <a class="nav-link" href="<?php echo e(route('settings.alerts')); ?>" style="padding: 16px 20px; border-radius: 8px; background: transparent; border: none; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: rgba(255, 255, 255, 0.9); font-weight: 500;">
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
                        <h1 class="h3 mb-0" style="color: white; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">Analytics Dashboard</h1>
                        <div>
                            <button class="refresh-btn" onclick="window.location.reload()" data-refresh-btn>
                                <span class="btn-text">Refresh Data</span>
                            </button>
                        </div>
                    </div>
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card primary fade-in">
                <div class="stat-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="stat-value" id="totalOutages">—</div>
                <div class="stat-label">Total Outages</div>
            </div>
            
            <div class="stat-card success fade-in">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-value" id="thisMonthOutages">—</div>
                <div class="stat-label">This Month</div>
            </div>
            
            <div class="stat-card warning fade-in">
                <div class="stat-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="stat-value" id="todayOutages">—</div>
                <div class="stat-label">Today's Outages</div>
            </div>
            
            <div class="stat-card danger fade-in">
                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-value" id="lastMonthOutages">—</div>
                <div class="stat-label">Last Month</div>
            </div>
        </div>

        <!-- Weekly Outage View - Redesigned -->
        <div class="analytics-card slide-up" style="margin-top: 2rem;">
            <div class="card-header" style="background: linear-gradient(135deg, rgba(239, 68, 68, 0.15) 0%, rgba(220, 38, 38, 0.1) 100%); border-bottom: 2px solid rgba(239, 68, 68, 0.2); padding: 1.25rem 1.5rem;">
                <div class="d-flex align-items-center justify-content-between flex-wrap" style="gap: 1rem;">
                <div>
                        <h5 class="mb-1" style="color: #fff; font-weight: 700;">
                            <i class="fas fa-calendar-week me-2" style="color: #ef4444;"></i>
                            Weekly Outage Analytics
                        </h5>
                        <small style="color: rgba(255, 255, 255, 0.7);">Barangay outage percentages per week</small>
                </div>
                    <div>
                        <select id="weekSelector" class="form-select" style="background: rgba(30, 41, 59, 0.9); color: #fff; border: 1px solid rgba(239, 68, 68, 0.4); border-radius: 8px; padding: 0.5rem 2rem 0.5rem 1rem; font-weight: 600; cursor: pointer; min-width: 130px;">
                            <option value="0">Week 1</option>
                            <option value="1">Week 2</option>
                            <option value="2">Week 3</option>
                            <option value="3" selected>Week 4</option>
                        </select>
            </div>
                    </div>
                    </div>
            <div class="card-body" style="padding: 1.5rem;">
                <!-- Date Range Display -->
                <div id="weekDateRange" style="text-align: center; margin-bottom: 1.25rem;">
                    <span style="background: rgba(59, 130, 246, 0.2); color: #93c5fd; padding: 0.5rem 1.25rem; border-radius: 20px; font-weight: 600; font-size: 0.95rem; border: 1px solid rgba(59, 130, 246, 0.3);">
                        <i class="fas fa-calendar-alt me-2"></i>
                        <span id="weekRangeText">Loading...</span>
                    </span>
        </div>

                <!-- Day Numbers (1-7) -->
                <div id="dayNumbersGrid" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 0.5rem; margin-bottom: 1.5rem;">
                    <!-- Days will be rendered here -->
                </div>

                <!-- Barangay List with Percentages -->
                <div id="barangayOutageList" style="margin-top: 1rem;">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
                            <span class="sr-only">Loading...</span>
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
        let latestWeeklyPayload = null;
        let analyticsAutoRefresh = null;
        let refreshLock = false;

        // Fetch outage statistics
        async function fetchOutageStats() {
            try {
                const response = await fetch('<?php echo e(route("analytics.outage-stats")); ?>', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json'
                    }
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}`);
                }
                
                const data = await response.json();
                
                if (data.success) {
                    return data.stats;
                } else {
                    throw new Error(data.message || 'Failed to fetch statistics');
                }
            } catch (error) {
                console.error('Error fetching outage stats:', error);
                throw error;
            }
        }
        
        // Update top statistics cards (reuse existing endpoint semantics)
        function updateStats(stats) {
            const normalized = (value) => {
                const num = Number(value);
                return Number.isFinite(num) ? num : 0;
            };

            document.getElementById('totalOutages').textContent = normalized(stats.totalOutages);
            document.getElementById('thisMonthOutages').textContent = normalized(stats.thisMonth);
            document.getElementById('todayOutages').textContent = normalized(stats.today);
            document.getElementById('lastMonthOutages').textContent = normalized(stats.lastMonth);
        }
        function formatDayShort(dateStr) {
            if (!dateStr) return '—';
            const d = new Date(dateStr);
            if (isNaN(d.getTime())) return '—';
            return d.toLocaleDateString(undefined, { weekday: 'short' });
        }

        function formatTimeRange(start, end) {
            if (!start) {
                return '—';
            }
            const s = new Date(start);
            const fmt = (dt) => dt.toLocaleTimeString(undefined, { hour: '2-digit', minute: '2-digit' });

            if (!end) {
                return `${fmt(s)} – active`;
            }

            const e = new Date(end);
            if (isNaN(e.getTime())) {
                return `${fmt(s)} – pending`;
            }
            const mins = Math.max(1, Math.round((e - s) / 60000));
            return `${fmt(s)} – ${fmt(e)} (${mins}m)`;
        }

        function renderHouseholdAnalytics(payload) {
            const grid = document.getElementById('householdGrid');
            const households = payload?.households || [];
            const weekLabels = (payload?.meta?.weeks || []).map((week, index) => week.label || `W${index + 1}`);

            if (!households.length) {
                grid.innerHTML = '<div class="error-message" style="grid-column:1/-1"><i class="fas fa-info-circle"></i><h6>No outage analytics available</h6><p>Waiting for live device data…</p></div>';
                updateWeeklyMeta(payload?.meta || {});
                updateTopOutageBadge(null);
                return;
            }

            grid.innerHTML = households.map((household) => {
                const counts = household.weekly_counts || [0,0,0,0];
                const maxCount = Math.max(1, ...counts);
                const bars = counts.map((count) => {
                    const height = Math.max(6, Math.round((count / maxCount) * 44));
                    const peakValue = Math.max(...counts);
                    const isPeak = count === peakValue && peakValue > 0;
                    const color = isPeak ? 'linear-gradient(180deg,#f97316,#ea580c)' : 'linear-gradient(180deg,#60a5fa,#3b82f6)';
                    return `<div class="bar" title="${count} outages" style="height:${height}px;background:${color};"></div>`;
                }).join('');

                const labels = (counts.length === weekLabels.length ? weekLabels : ['W1','W2','W3','W4'])
                    .map(label => `<span>${label}</span>`).join('');

                const timeline = household.timeline || [];
                const timelineList = timeline.slice(0,3).map(entry => `
                    <li class="outage-item">
                        <span class="outage-dot" style="background:${entry.status === 'closed' ? '#ef4444' : '#f59e0b'};box-shadow:0 0 0 3px rgba(239,68,68,.15);"></span>
                        <span class="outage-meta">${formatDayShort(entry.start)}</span>
                        <span class="outage-time">${formatTimeRange(entry.start, entry.end)}</span>
                    </li>
                `).join('');

                const fallbackList = '<li class="outage-item"><span class="outage-dot" style="background:#10b981;box-shadow:0 0 0 3px rgba(16,185,129,.15);"></span><span class="outage-meta">No recent outages</span></li>';

                return `
                    <div class="household-card">
                        <div>
                            <h6>${household.label || 'Unnamed Household'}</h6>
                            <small style="color:rgba(255,255,255,.7);">${household.location || 'Unknown location'}</small>
                        </div>
                        <div class="kpi-row">
                            <div class="kpi"><div class="value">${household.outages_total || 0}</div><div class="label">Total</div></div>
                            <div class="kpi"><div class="value">${counts[counts.length - 1] || 0}</div><div class="label">This Week</div></div>
                        </div>
                        <div class="sparkline">${bars}</div>
                        <div class="spark-labels">${labels}</div>
                        <ul class="outage-list">${timelineList || fallbackList}</ul>
                    </div>`;
            }).join('');

            updateWeeklyMeta(payload.meta);
            updateTopOutageBadge(payload.meta?.top_household);
        }

        function updateTopOutageBadge(topHousehold) {
            const badge = document.getElementById('topOutageBadge');
            if (topHousehold && topHousehold.label) {
                badge.textContent = `${topHousehold.label} • Most outages (${topHousehold.count || 0})`;
                badge.style.display = 'inline-block';
            } else {
                badge.style.display = 'none';
            }
        }

        function updateWeeklyMeta(meta = {}) {
            document.getElementById('weeklyOutageTotal').textContent = meta.total_outages_this_week ?? 0;
            const host = document.getElementById('mostAffectedHousehold');
            const hostCount = document.getElementById('mostAffectedCount');
            if (meta.top_household) {
                host.textContent = meta.top_household.label;
                hostCount.textContent = `${meta.top_household.count} outage(s)`;
            } else {
                host.textContent = '—';
                hostCount.textContent = 'Awaiting data';
            }
            document.getElementById('analyticsUpdated').textContent = meta.updated_at
                ? new Date(meta.updated_at).toLocaleTimeString(undefined, { hour: '2-digit', minute: '2-digit' })
                : '—';
        }

        async function fetchWeeklyOutageAnalytics() {
            const response = await fetch('<?php echo e(route("analytics.weekly-devices")); ?>', {
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/json' }
            });

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            const payload = await response.json();
            if (!payload.success) {
                throw new Error(payload.message || 'Failed to load weekly analytics');
            }

            return payload;
        }

        // Load all data
        async function loadData() {
            try {
                const statsData = await fetchOutageStats();
                updateStats(statsData);

                const weeklyPayload = await fetchWeeklyOutageAnalytics();
                latestWeeklyPayload = weeklyPayload;
                renderHouseholdAnalytics(weeklyPayload);
            } catch (error) {
                console.error('Error loading data:', error);
                const grid = document.getElementById('householdGrid');
                if (grid) {
                    grid.innerHTML = '<div class="error-message" style="grid-column:1/-1"><i class="fas fa-exclamation-triangle"></i><h6>Failed to Load Data</h6><p>Please try again.</p></div>';
                }
            }
        }

        function updateSelectedDateSummary(){
            // legacy no-op
        }

        
        function setRefreshState(isRefreshing) {
            const btn = document.querySelector('[data-refresh-btn]');
            if (!btn) return;
            btn.classList.toggle('is-refreshing', isRefreshing);
            btn.disabled = isRefreshing;
            const spinner = btn.querySelector('.spinner-border');
            const text = btn.querySelector('.btn-text');
            if (spinner) spinner.classList.toggle('d-none', !isRefreshing);
            if (text) text.textContent = isRefreshing ? 'Refreshing…' : 'Refresh Data';
        }

        // Refresh data
        async function refreshData() {
            if (refreshLock) return;
            refreshLock = true;
            setRefreshState(true);
            try {
                await Promise.all([
                    loadData(true),
                    loadWeeklyOutageView()
                ]);
            } finally {
                refreshLock = false;
                setRefreshState(false);
            }
        }
        
        // Auto-refresh every 5 minutes
        function startAutoRefresh() {
            if (analyticsAutoRefresh) {
                clearInterval(analyticsAutoRefresh);
            }
            analyticsAutoRefresh = setInterval(loadData, 60000); // 1 minute
        }
        
        // Store weekly outage data globally
        let weeklyOutageData = null;

        // Fetch and display weekly outage view with barangay percentages
        async function loadWeeklyOutageView() {
            try {
                const response = await fetch('<?php echo e(route("analytics.weekly-outage-view-barangay")); ?>');
                const data = await response.json();
                
                if (!data.success) {
                    throw new Error(data.message || 'Failed to load weekly outage data');
                }

                weeklyOutageData = data.weeks;
                
                // Render the selected week (default: Week 4 = index 3)
                const selector = document.getElementById('weekSelector');
                renderSelectedWeek(parseInt(selector.value));
            } catch (error) {
                console.error('Error loading weekly outage view:', error);
                document.getElementById('weekRangeText').textContent = 'Error loading data';
                document.getElementById('dayNumbersGrid').innerHTML = '';
                document.getElementById('barangayOutageList').innerHTML = `
                    <div class="error-message" style="text-align: center; padding: 1.5rem;">
                        <i class="fas fa-exclamation-triangle" style="color: #ef4444; font-size: 1.5rem;"></i>
                        <p style="color: rgba(255,255,255,0.7); margin-top: 0.5rem;">Failed to load data. Please refresh.</p>
                    </div>
                `;
            }
        }

        // Render the selected week's data
        function renderSelectedWeek(weekIndex) {
            if (!weeklyOutageData || !weeklyOutageData[weekIndex]) {
                    return;
                }

            const week = weeklyOutageData[weekIndex];
            
            // Update date range display
            document.getElementById('weekRangeText').textContent = `${week.start_formatted} – ${week.end_formatted}`;

            // Render day numbers (1-7) with popup
            const daysGrid = document.getElementById('dayNumbersGrid');
            const allBarangays = week.barangays || [];
            
            daysGrid.innerHTML = week.days.map((day, index) => {
                const hasOutage = day.has_outage;
                const outageClass = hasOutage ? 'has-outage' : '';
                const affectedBarangays = day.affected_barangays || [];
                
                // Build popup content showing all barangays with their status
                let popupContent = '';
                if (allBarangays.length > 0) {
                    const affectedNames = affectedBarangays.map(b => b.name);
                    popupContent = allBarangays.map(brgy => {
                        const hadOutage = affectedNames.includes(brgy.name);
                        const statusClass = hadOutage ? 'yes' : 'no';
                        const statusText = hadOutage ? 'Yes' : 'No';
                        return `
                            <div class="day-popup-item">
                                <span class="brgy-name">${brgy.name}</span>
                                <span class="brgy-status ${statusClass}">${statusText}</span>
                            </div>
                        `;
                    }).join('');
                } else {
                    popupContent = '<div class="day-popup-empty">No barangays registered.</div>';
                }

                const outageIndicator = hasOutage ? '<span class="outage-indicator"></span>' : '';
                    
                    return `
                    <div class="day-num-cell ${outageClass}" data-day-index="${index}" onclick="toggleDayPopup(this)">
                        ${outageIndicator}
                        <span class="day-num">${day.day_number}</span>
                        <span class="day-label">${day.day_name}</span>
                        <div class="day-popup">
                            <div class="day-popup-title">${day.day_name}, ${day.date}</div>
                            ${hasOutage ? popupContent : '<div class="day-popup-empty">No outages recorded for this day.</div>'}
                            </div>
                        </div>
                    `;
                }).join('');

            // Render barangay list with percentages from database
            const barangayList = document.getElementById('barangayOutageList');
            const barangays = week.barangays || [];

            if (barangays.length === 0) {
                barangayList.innerHTML = `
                    <div class="no-outages-note">
                        <i class="fas fa-check-circle"></i>
                        No barangays registered.
                        </div>
                    `;
                return;
            }

            // Barangays are already sorted by percentage from API
            barangayList.innerHTML = barangays.map((brgy) => `
                <div class="barangay-item">
                    <span class="barangay-name">${brgy.name}</span>
                    <span class="outage-percentage">${brgy.percentage.toFixed(1)}%</span>
                </div>
            `).join('');
        }

        // Toggle day popup
        function toggleDayPopup(element) {
            // Close all other popups
            document.querySelectorAll('.day-num-cell.active').forEach(cell => {
                if (cell !== element) {
                    cell.classList.remove('active');
                }
            });
            // Toggle current popup
            element.classList.toggle('active');
        }

        // Close popup when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.day-num-cell')) {
                document.querySelectorAll('.day-num-cell.active').forEach(cell => {
                    cell.classList.remove('active');
                });
            }
        });

        // Week selector change handler
        document.addEventListener('DOMContentLoaded', function() {
            const weekSelector = document.getElementById('weekSelector');
            if (weekSelector) {
                weekSelector.addEventListener('change', function() {
                    renderSelectedWeek(parseInt(this.value));
                });
            }
        });

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadData();
            loadWeeklyOutageView();
            startAutoRefresh();
            
            // Refresh weekly outage view every 5 minutes
            setInterval(loadWeeklyOutageView, 300000);
        });

        window.addEventListener('beforeunload', function() {
            if (analyticsAutoRefresh) {
                clearInterval(analyticsAutoRefresh);
            }
        });

    </script>

    <!-- Outage Notification Component -->
    <?php echo $__env->make('components.outage-notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\E-Grid-Monitoring-System\resources\views/analytics.blade.php ENDPATH**/ ?>