<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexLib | Advanced Library Management</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Ionicons for modern icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

    <!-- Background Shapes -->
    <div class="bg-gradient-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <!-- Header Navigation -->
    <header id="header">
        <div class="container nav-container">
            <div class="logo">
                <ion-icon name="library"></ion-icon> NexLib
            </div>
            <nav class="nav-links">
                <a href="#features">Features</a>
                <a href="#about">About</a>
                <a href="login.php" class="btn btn-outline" style="padding: 0.5rem 1rem;">Login</a>
                <a href="login.php" class="btn btn-primary" style="padding: 0.5rem 1rem;">Get Started</a>
            </nav>
        </div>
    </header>

    <!-- Main Hero -->
    <main class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">Next-Generation Platform</div>
                <h1>The Future of Library Management</h1>
                <p>Advanced system powered by PHP and Python AI Recommendations. Discover books, manage borrowings, and elevate the reading experience.</p>
                <div class="hero-btns">
                    <a href="login.php" class="btn btn-primary">
                        Start Exploring <ion-icon name="arrow-forward" style="margin-left: 8px;"></ion-icon>
                    </a>
                    <a href="#features" class="btn btn-outline">
                        View Features
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Simple scroll effect for header
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if(window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
