<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLECO | Admin Login</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'slate-950': '#0F172A',
                        'slate-900': '#1E293B',
                        'slate-800': '#334155',
                        'slate-700': '#475569',
                        'slate-600': '#64748B',
                        'slate-400': '#94A3B8',
                        'slate-200': '#E2E8F0',
                        'slate-100': '#F8FAFC',
                        'orange-500': '#FFA500',
                        'orange-600': '#FF8C00',
                        'orange-400': '#FFD700',
                    },
                    fontFamily: {
                        'inter': ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 20s ease-in-out infinite',
                        'slide-up': 'slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1)',
                        'fade-in-up': 'fadeInUp 1s ease-out both',
                        'pulse-icon': 'pulseIcon 2s ease-in-out infinite',
                        'rotate': 'rotate 3s linear infinite',
                        'spin': 'spin 1s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translate(0, 0) rotate(0deg)' },
                            '33%': { transform: 'translate(30px, -30px) rotate(120deg)' },
                            '66%': { transform: 'translate(-20px, 20px) rotate(240deg)' },
                        },
                        slideUp: {
                            from: { opacity: '0', transform: 'translateY(30px)' },
                            to: { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeInUp: {
                            from: { opacity: '0', transform: 'translateY(20px)' },
                            to: { opacity: '1', transform: 'translateY(0)' },
                        },
                        pulseIcon: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.05)' },
                        },
                        rotate: {
                            from: { transform: 'rotate(0deg)' },
                            to: { transform: 'rotate(360deg)' },
                        },
                    },
                },
            },
        }
    </script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Custom styles that need @apply or complex animations */
        html { height: 100%; overflow: hidden; }
        
        /* Animated background gradient */
        .bg-animated::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 20% 80%, rgba(255, 165, 0, 0.2) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255, 140, 0, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 40% 40%, rgba(255, 193, 7, 0.1) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            z-index: 0;
        }
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }
        
        /* Grid pattern overlay */
        .grid-pattern::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="%23475569" stroke-width="0.5" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.4;
        }
        
        /* Icon glow effect */
        .icon-glow::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px; right: -2px; bottom: -2px;
            background: linear-gradient(135deg, #FFA500, #FF8C00, #FFD700);
            border-radius: 50%;
            z-index: -1;
            animation: rotate 3s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Button shine effect */
        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-shine:hover::before {
            left: 100%;
        }
        
        /* Animation delays */
        .delay-300 { animation-delay: 0.3s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
        .delay-800 { animation-delay: 0.8s; }
        .delay-900 { animation-delay: 0.9s; }
        .delay-1000 { animation-delay: 1s; }
        .delay-1200 { animation-delay: 1.2s; }
    </style>
</head>
<body class="font-inter bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 h-screen flex flex-col justify-center items-center p-5 relative overflow-hidden bg-animated">
    
    <!-- Login Container -->
    <div class="bg-slate-950/95 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl overflow-hidden max-w-[900px] w-full flex flex-col md:flex-row min-h-[600px] md:min-h-[600px] relative z-10 animate-slide-up">
        
        <!-- Left Side - Illustration -->
        <div class="flex-1 bg-gradient-to-br from-slate-800/80 to-slate-950/60 backdrop-blur-lg flex flex-col justify-center items-center p-8 md:p-12 relative border-b md:border-b-0 md:border-r border-white/10 grid-pattern">
            <div class="relative z-10 text-center animate-fade-in-up delay-300">
                <!-- Admin Icon -->
                <div class="w-24 h-24 md:w-[120px] md:h-[120px] bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-8 shadow-[0_20px_40px_rgba(255,165,0,0.4)] relative animate-pulse-icon icon-glow">
                    <i class="fas fa-user-shield text-4xl md:text-5xl text-white drop-shadow-md"></i>
                </div>
                <h2 class="text-xl md:text-2xl font-extrabold text-slate-100 mb-3 tracking-tight">System Administrator</h2>
                <p class="text-slate-400 text-base md:text-lg font-normal leading-relaxed max-w-[280px]">Secure access to Energy Grid Monitoring System</p>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="flex-1 p-6 md:p-12 flex flex-col justify-center bg-slate-800/60 backdrop-blur-lg">
            <div class="text-center mb-8 md:mb-10 animate-fade-in-up delay-500">
                <h1 class="text-2xl md:text-3xl font-extrabold text-slate-100 mb-3 tracking-tight">Admin Login</h1>
                <p class="text-slate-400 text-base md:text-lg font-normal leading-relaxed">Enter your credentials to manage the system</p>
            </div>

            <?php if(session('error')): ?>
                <div class="bg-red-900/80 text-red-300 border border-red-500/30 rounded-2xl p-4 md:p-5 mb-6 text-sm md:text-base font-medium backdrop-blur-lg animate-fade-in-up delay-600">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
                <?php echo csrf_field(); ?>

                <!-- Email Field -->
                <div class="mb-5 md:mb-6 animate-fade-in-up delay-700 transition-transform duration-300">
                    <label for="email" class="block font-semibold text-slate-200 mb-2 md:mb-3 text-sm md:text-base tracking-wide">Email Address</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="w-full px-4 md:px-5 py-3 md:py-4 border-2 border-slate-700/60 rounded-2xl text-base transition-all duration-300 bg-slate-950/80 backdrop-blur-lg text-slate-100 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-slate-950 focus:shadow-[0_0_0_4px_rgba(255,165,0,0.2),0_4px_12px_rgba(255,165,0,0.3)] focus:-translate-y-0.5 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 bg-red-900/80 shadow-[0_0_0_4px_rgba(239,68,68,0.2)] <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           value="<?php echo e(old('email')); ?>" 
                           required 
                           autofocus
                           placeholder="Enter your email address">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-red-400 text-sm mt-2 font-medium"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Password Field -->
                <div class="mb-5 md:mb-6 animate-fade-in-up delay-800 transition-transform duration-300">
                    <label for="password" class="block font-semibold text-slate-200 mb-2 md:mb-3 text-sm md:text-base tracking-wide">Password</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="w-full px-4 md:px-5 py-3 md:py-4 border-2 border-slate-700/60 rounded-2xl text-base transition-all duration-300 bg-slate-950/80 backdrop-blur-lg text-slate-100 placeholder-slate-400 focus:outline-none focus:border-orange-500 focus:bg-slate-950 focus:shadow-[0_0_0_4px_rgba(255,165,0,0.2),0_4px_12px_rgba(255,165,0,0.3)] focus:-translate-y-0.5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 bg-red-900/80 shadow-[0_0_0_4px_rgba(239,68,68,0.2)] <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           required
                           placeholder="Enter your password">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-red-400 text-sm mt-2 font-medium"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full bg-gradient-to-br from-orange-500 to-orange-600 text-white border-none py-3 md:py-4 px-6 rounded-2xl text-base font-bold cursor-pointer transition-all duration-300 flex items-center justify-center gap-3 mt-5 md:mt-6 relative overflow-hidden animate-fade-in-up delay-1000 hover:-translate-y-1 hover:shadow-[0_15px_35px_rgba(255,165,0,0.4),0_5px_15px_rgba(255,165,0,0.2)] active:-translate-y-0.5 btn-shine">
                    <i class="fas fa-sign-in-alt text-lg"></i>
                    <span>Login</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-8 md:mt-12 text-center text-white/90 text-sm md:text-base font-medium drop-shadow-sm animate-fade-in-up delay-1200">
        © 2025 Southern Leyte Electric Cooperative (SOLECO). All Rights Reserved.
    </footer>

    <script>
        // Prevent scrolling
        document.addEventListener('wheel', function(e) {
            e.preventDefault();
        }, { passive: false });

        document.addEventListener('touchmove', function(e) {
            e.preventDefault();
        }, { passive: false });

        document.addEventListener('keydown', function(e) {
            if([32, 33, 34, 35, 36, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
                e.preventDefault();
            }
        });

        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const loginBtn = document.querySelector('button[type="submit"]');
            const inputs = document.querySelectorAll('input');

            // Add loading state to button on form submit
            if (form) {
                form.addEventListener('submit', function() {
                    loginBtn.classList.add('opacity-80', 'pointer-events-none');
                    loginBtn.innerHTML = '<i class="fas fa-spinner animate-spin"></i> <span>Signing in...</span>';
                });
            }

            // Enhanced input focus effects
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });

                // Real-time validation feedback
                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.classList.add('border-orange-500', 'bg-orange-500/10');
                        this.classList.remove('border-slate-700/60', 'bg-slate-950/80');
                    } else {
                        this.classList.remove('border-orange-500', 'bg-orange-500/10');
                        this.classList.add('border-slate-700/60', 'bg-slate-950/80');
                    }
                });
            });

            // Subtle parallax effect
            let mouseX = 0, mouseY = 0;
            document.addEventListener('mousemove', function(e) {
                mouseX = (e.clientX / window.innerWidth) * 100;
                mouseY = (e.clientY / window.innerHeight) * 100;
                
                const loginContainer = document.querySelector('.animate-slide-up');
                if (loginContainer) {
                    loginContainer.style.transform = `translate(${mouseX * 0.02}px, ${mouseY * 0.02}px)`;
                }
            });

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && e.target.tagName !== 'BUTTON') {
                    const inputList = Array.from(document.querySelectorAll('input'));
                    const currentIndex = inputList.indexOf(e.target);
                    if (currentIndex < inputList.length - 1) {
                        inputList[currentIndex + 1].focus();
                    } else {
                        loginBtn.click();
                    }
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\E-Grid-Monitoring-System\resources\views/admin-login.blade.php ENDPATH**/ ?>