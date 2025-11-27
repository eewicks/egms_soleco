


<style>
    /* Notification Container */
    .outage-notification-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 12px;
        max-width: 420px;
        width: calc(100% - 40px);
    }

    /* Individual Notification */
    .outage-notification {
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        border: 1px solid rgba(239, 68, 68, 0.4);
        border-left: 4px solid #ef4444;
        border-radius: 12px;
        padding: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4), 0 0 20px rgba(239, 68, 68, 0.2);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .outage-notification::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at top left, rgba(239, 68, 68, 0.15), transparent 60%);
        pointer-events: none;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .outage-notification.dismissing {
        animation: slideOutRight 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100px);
        }
    }

    /* Notification Header */
    .outage-notification-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .outage-notification-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        animation: pulseIcon 2s ease-in-out infinite;
    }

    @keyframes pulseIcon {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .outage-notification-icon i {
        color: white;
        font-size: 18px;
    }

    .outage-notification-title {
        flex: 1;
    }

    .outage-notification-title h4 {
        color: #fecaca;
        font-size: 14px;
        font-weight: 700;
        margin: 0 0 2px 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .outage-notification-title span {
        color: rgba(255, 255, 255, 0.6);
        font-size: 11px;
    }

    /* Notification Body */
    .outage-notification-body {
        color: #f1f5f9;
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 14px;
        padding-left: 52px;
    }

    .outage-notification-body strong {
        color: #fca5a5;
    }

    /* Notification Footer */
    .outage-notification-footer {
        display: flex;
        justify-content: flex-end;
        padding-left: 52px;
    }

    .outage-notification-btn {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .outage-notification-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(239, 68, 68, 0.4);
    }

    .outage-notification-btn:active {
        transform: translateY(0);
    }

    /* Sound indicator */
    .notification-sound-indicator {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 8px;
        height: 8px;
        background: #ef4444;
        border-radius: 50%;
        animation: blink 1s ease-in-out infinite;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
    }

    /* Responsive */
    @media (max-width: 480px) {
        .outage-notification-container {
            top: 10px;
            right: 10px;
            left: 10px;
            width: auto;
            max-width: none;
        }

        .outage-notification {
            padding: 12px;
        }

        .outage-notification-body {
            padding-left: 0;
            margin-top: 10px;
        }

        .outage-notification-footer {
            padding-left: 0;
        }
    }
</style>

<!-- Notification Container -->
<div id="outageNotificationContainer" class="outage-notification-container"></div>

<!-- Notification Sound (optional) -->
<audio id="notificationSound" preload="auto">
    <source src="data:audio/wav;base64,UklGRnoGAABXQVZFZm10IBAAAAABAAEAQB8AAEAfAAABAAgAZGF0YQoGAACBhYqFbF1fdJivrJBhNjVgodDbq2EcBj+a2teleR0AL5HW7KZ7HAAoj9HwqXscACCM0fOsfRwAGIrO9K5+GwASiM31sH8bAA2GzPaxgBsACYXL97KAGwAGhMr3s4EbAAODyfi0gRsAAYLJ+LWBGwAAgsn4tYEbAAGCyfi1gRsAA4PJ+LSBGwAGhMr3s4EbAAqFy/eygBsAD4bM9rGAGwAUiM31sH8bABqKzvSufhsAIYzR86x9HAAojdHwqXscADCR1uymexwAOJrb4qN6HQBCpOHXnnkdAEyu5sydeBwAVrjr0pp3GwBfwu/InHYaAGfL8sGddRkAbdP1u551GABy2ve2n3QXAHXY+LKgcxYAd9j4sqBzFgB32PiyoHMWAHXY+LKgcxYActr3tp90FwBt0/W7nnUYAGfL8sGddRkAX8LvyJx2GgBWuOvSmncbAEyu5sydeBwAQqTh1555HQA4mtvio3odADCR1uymexwAKI3R8Kl7HAAhjNHzrH0cABqKzvSufhsAFIjN9bB/GwAPhs32sYAbAAqFy/eygBsABoTK97OBGwADg8n4tIEbAAGCyfi1gRsAAILJ+LWBGwABgsn4tYEbAAODyfi0gRsABoTK97OBGwAKhcv3soAbAA+GzPaxgBsAFIjN9bB/GwAais70rn4bACGM0fOsfRwAKI3R8Kl7HAAw" type="audio/wav">
</audio>

<script>
(function() {
    // Configuration
    const POLL_INTERVAL = 10000; // Check every 10 seconds
    const NOTIFICATION_SOUND = true; // Enable/disable sound
    
    let lastAlertId = localStorage.getItem('lastAlertId') || 0;
    let dismissedAlerts = JSON.parse(localStorage.getItem('dismissedAlerts') || '[]');
    let pollInterval = null;

    // Create notification element
    function createNotification(alert) {
        const notification = document.createElement('div');
        notification.className = 'outage-notification';
        notification.dataset.alertId = alert.id;
        
        notification.innerHTML = `
            <div class="notification-sound-indicator"></div>
            <div class="outage-notification-header">
                <div class="outage-notification-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="outage-notification-title">
                    <h4>⚡ Power Outage Alert</h4>
                    <span>${alert.time} ${alert.date}</span>
                </div>
            </div>
            <div class="outage-notification-body">
                Power Outage has occurred at <strong>${alert.barangay}</strong> on <strong>${alert.time} ${alert.date}</strong>
            </div>
            <div class="outage-notification-footer">
                <button class="outage-notification-btn" onclick="dismissOutageNotification(${alert.id}, this)">
                    <i class="fas fa-check mr-1"></i> OK
                </button>
            </div>
        `;
        
        return notification;
    }

    // Show notification
    function showNotification(alert) {
        const container = document.getElementById('outageNotificationContainer');
        if (!container) return;
        
        // Check if already dismissed
        if (dismissedAlerts.includes(alert.id)) return;
        
        // Check if already showing
        if (container.querySelector(`[data-alert-id="${alert.id}"]`)) return;
        
        const notification = createNotification(alert);
        container.appendChild(notification);
        
        // Play sound
        if (NOTIFICATION_SOUND) {
            playNotificationSound();
        }
    }

    // Play notification sound
    function playNotificationSound() {
        try {
            const audio = document.getElementById('notificationSound');
            if (audio) {
                audio.currentTime = 0;
                audio.play().catch(() => {});
            }
        } catch (e) {
            console.log('Could not play notification sound');
        }
    }

    // Dismiss notification
    window.dismissOutageNotification = function(alertId, button) {
        const notification = button.closest('.outage-notification');
        if (notification) {
            notification.classList.add('dismissing');
            
            // Add to dismissed list
            if (!dismissedAlerts.includes(alertId)) {
                dismissedAlerts.push(alertId);
                localStorage.setItem('dismissedAlerts', JSON.stringify(dismissedAlerts));
            }
            
            // Remove after animation
            setTimeout(() => {
                notification.remove();
            }, 300);
            
            // Notify server
            fetch('/api/outage-notifications/dismiss', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({ alert_id: alertId })
            }).catch(() => {});
        }
    };

    // Fetch new alerts
    async function checkForNewAlerts() {
        try {
            const response = await fetch('/api/outage-notifications', {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                }
            });
            
            if (!response.ok) return;
            
            const data = await response.json();
            
            if (data.success && data.alerts && data.alerts.length > 0) {
                data.alerts.forEach(alert => {
                    // Only show if newer than last seen and not dismissed
                    if (alert.id > lastAlertId && !dismissedAlerts.includes(alert.id)) {
                        showNotification(alert);
                    }
                });
                
                // Update last alert ID
                const maxId = Math.max(...data.alerts.map(a => a.id));
                if (maxId > lastAlertId) {
                    lastAlertId = maxId;
                    localStorage.setItem('lastAlertId', lastAlertId);
                }
            }
        } catch (error) {
            console.error('Error checking for outage alerts:', error);
        }
    }

    // Start polling
    function startPolling() {
        // Initial check
        checkForNewAlerts();
        
        // Set up interval
        pollInterval = setInterval(checkForNewAlerts, POLL_INTERVAL);
    }

    // Stop polling (for cleanup)
    function stopPolling() {
        if (pollInterval) {
            clearInterval(pollInterval);
            pollInterval = null;
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startPolling);
    } else {
        startPolling();
    }

    // Cleanup on page unload
    window.addEventListener('beforeunload', stopPolling);

    // Expose functions globally for testing
    window.outageNotifications = {
        check: checkForNewAlerts,
        reset: function() {
            localStorage.removeItem('lastAlertId');
            localStorage.removeItem('dismissedAlerts');
            lastAlertId = 0;
            dismissedAlerts = [];
            fetch('/api/outage-notifications/reset', { method: 'POST' }).catch(() => {});
        }
    };
})();
</script>

<?php /**PATH C:\laragon\www\E-Grid-Monitoring-System\resources\views/components/outage-notification.blade.php ENDPATH**/ ?>