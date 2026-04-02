<?php

include_once 'config.php';
include_once 'function.php';

$current_date = getCurrentDate();

// Calculate statistics
$total_staff = getTotalStaff($dashboardConfig['cards']);
$avg_bar_width = getAverageBarWidth($dashboardConfig['cards']);

?>
<!DOCTYPE html>
<html lang="ms" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUNAS Scorecard Dashboard</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="main-container">
        <div class="dashboard-wrapper">
            
            <!-- Logo Container -->
            <div class="logo-container">
                <img src="img/logo.png" alt="Lunas Sdn.Bhd" class="logo-image">
            </div>
            
            <!-- Ambient Background Effects -->
            <div class="ambient-bg">
                <div class="ambient-glow glow-1"></div>
                <div class="ambient-glow glow-2"></div>
                <div class="ambient-glow glow-3"></div>
            </div>
            
            <!-- Main Content -->
            <div class="main-content">
                <!-- Header -->
                <header class="dashboard-header">
                    <div class="header-title-section">
                        <h1 class="dashboard-title"><?php echo $dashboardConfig['title']; ?></h1>
                        <p class="dashboard-subtitle"><?php echo $dashboardConfig['subtitle']; ?></p>
                    </div>
                    <div class="header-info-section">
                        <div class="info-badge">
                            <svg class="icon-small" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="date-text"><?php echo $current_date; ?></span>
                        </div>
                        <div class="info-badge live-badge">
                            <span class="live-dot"></span>
                            <span class="live-text">Live</span>
                        </div>
                    </div>
                </header>
                
                <!-- Stats Summary (Optional) -->
                <div class="stats-summary" style="display: none;">
                    <div class="stat-item">
                        <span class="stat-label">Total Personnel:</span>
                        <span class="stat-value"><?php echo number_format($total_staff); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Average Capacity:</span>
                        <span class="stat-value"><?php echo $avg_bar_width; ?>%</span>
                    </div>
                </div>
                
                <!-- Scorecard Grid -->
                <div class="card-grid">
                    <?php echo renderAllCards($dashboardConfig['cards']); ?>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="dashboard-footer">
            <p>Copyright © <?php echo $dashboardConfig['company']; ?> <?php echo $dashboardConfig['year']; ?>. Developed by LUNAS-ISD.</p>
        </footer>
    </div>
</body>
</html>