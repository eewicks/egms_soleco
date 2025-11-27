<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EGMS-Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-orange: #FFA500;
            --bright-orange: #FF8C00;
            --gold-accent: #FFD700;
            --dark-slate: #0F172A;
            --slate-600: #475569;
            --slate-300: #94A3B8;
            --slate-100: #F1F5F9;
            --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            --shadow-medium: 0 10px 15px -3px rgba(0, 0, 0, 0.4);
            --shadow-large: 0 20px 25px -5px rgba(0, 0, 0, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            background: var(--dark-slate);
        }

        .hero-section {
            background: url('<?php echo e(asset('photos/bg2.jpg')); ?>') no-repeat center center/cover;
            min-height: 100vh;
            position: relative;
            padding: 80px 20px;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8) 0%, rgba(30, 41, 59, 0.7) 100%);
            backdrop-filter: blur(2px);
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            animation: fadeInUp 0.8s ease-out;
            letter-spacing: 1px;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .btn-soleco {
            background: linear-gradient(135deg, var(--primary-orange), var(--bright-orange));
            border: none;
            border-radius: 12px;
            padding: 1rem 2.5rem;
            font-weight: 600;
            font-size: 1.1rem;
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-medium);
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        .btn-soleco:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(255, 165, 0, 0.4), 0 5px 15px rgba(255, 165, 0, 0.2);
            color: white;
            background: linear-gradient(135deg, var(--bright-orange), var(--primary-orange));
        }

        .btn-soleco:active {
            transform: translateY(-1px);
            background: linear-gradient(135deg, var(--primary-orange), var(--bright-orange));
        }

        .btn-soleco:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(255, 165, 0, 0.3), var(--shadow-medium);
        }

        .features-section {
            margin-top: 4rem;
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }

        .card {
            background: rgba(15, 23, 42, 0.8) !important;
            border: 1px solid rgba(71, 85, 105, 0.3) !important;
            border-radius: 16px;
            box-shadow: var(--shadow-medium);
            color: #fff;
            padding: 2rem 1.5rem;
            height: 100%;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-large);
            border-color: var(--primary-green);
        }

        .card h5 {
            font-weight: 600;
            color: #fff;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .card p {
            color: var(--slate-300);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .card i {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            display: block;
            transition: all 0.3s ease;
        }

        .card:hover i {
            transform: scale(1.1);
        }

        .card:hover .icon-monitoring {
            color: var(--bright-orange) !important;
            text-shadow: 0 0 15px rgba(255, 140, 0, 0.5);
        }

        .card:hover .icon-alerts {
            color: #FFA500 !important;
            text-shadow: 0 0 15px rgba(255, 165, 0, 0.5);
        }

        .card:hover .icon-analytics {
            color: var(--primary-orange) !important;
            text-shadow: 0 0 15px rgba(255, 165, 0, 0.5);
        }

        .icon-monitoring { 
            color: var(--primary-orange) !important; 
            text-shadow: 0 0 10px rgba(255, 165, 0, 0.3);
        }
        .icon-alerts { 
            color: var(--gold-accent) !important; 
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }
        .icon-analytics { 
            color: var(--bright-orange) !important; 
            text-shadow: 0 0 10px rgba(255, 140, 0, 0.3);
        }

        /* Override any default Bootstrap icon colors */
        .bi {
            color: inherit !important;
        }

        /* Ensure all icons in cards use orange theme */
        .card .bi {
            color: var(--primary-orange) !important;
        }

        .card .icon-alerts {
            color: var(--gold-accent) !important;
        }

        .card .icon-analytics {
            color: var(--bright-orange) !important;
        }

        .footer-overlay {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.95));
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(71, 85, 105, 0.3);
        }

        .footer-overlay p {
            color: var(--slate-300);
            margin: 0;
            font-weight: 500;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .card {
                padding: 1.5rem 1.25rem;
            }
            
            .btn-soleco {
                padding: 0.875rem 2rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .card {
                padding: 1.25rem 1rem;
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Hero Section with Features -->
<section class="hero-section text-center">
    <div class="container">
        <h1 class="hero-title fw-bold text-white poppins-font">ENERGY GRID MONITORING SYSTEM</h1>
        <p class="hero-subtitle fs-5 mt-3 text-light">
            A real-time web-based platform for monitoring household device status 
            and power outages in Sogod, Southern Leyte.
        </p>
        <br>
        <a href="<?php echo e(url('/admin-login')); ?>" class="btn-soleco">
            <i class="bi bi-speedometer2"></i> Access Monitoring Dashboard
        </a>

        <!-- System Features -->
        <div class="features-section">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <i class="bi bi-activity icon-monitoring"></i>
                        <h5>Real-Time Monitoring</h5>
                        <p>
                            Live updates on household device status with instant outage detection 
                            and comprehensive monitoring capabilities.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <i class="bi bi-bell-fill icon-alerts"></i>
                        <h5>Automated Alerts</h5>
                        <p>
                            Instant SMS notifications sent to substation personnel when outages 
                            are detected, ensuring rapid response times.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <i class="bi bi-bar-chart-fill icon-analytics"></i>
                        <h5>Data Analytics</h5>
                        <p>
                            Comprehensive outage records and analysis tools for better 
                            decision-making and system optimization.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-3 text-light footer-overlay">
    <p class="mb-0">
        &copy; <?php echo e(date('Y')); ?> Southern Leyte Electric Cooperative (SOLECO). 
        All Rights Reserved.
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\E-Grid-Monitoring-System\resources\views/welcome.blade.php ENDPATH**/ ?>