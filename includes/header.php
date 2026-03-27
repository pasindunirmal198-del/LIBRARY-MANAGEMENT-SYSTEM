<?php 
$page = $page ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lumina - Modern Library Management System">
    <title>Lumina Library Management System</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container nav-container">
            <a href="index.php" class="logo">
                <div class="logo-icon"><i class='bx bx-book-reader'></i></div>
                Lumina<span>Lib</span>
            </a>
            <ul class="nav-links">
                <li><a href="index.php" class="<?= $page == 'home' ? 'active' : '' ?>">Home</a></li>
                <li><a href="books.php" class="<?= $page == 'books' ? 'active' : '' ?>">Explore Books</a></li>
                <li><a href="#" class="<?= $page == 'about' ? 'active' : '' ?>">About Us</a></li>
                <li><a href="#" class="<?= $page == 'contact' ? 'active' : '' ?>">Contact</a></li>
            </ul>
            <div class="nav-actions">
                <a href="login.php" class="btn btn-outline">Sign In</a>
                <a href="#" class="btn btn-primary shadow-btn">Get Started</a>
            </div>
            <div class="mobile-menu">
                <i class='bx bx-menu'></i>
            </div>
        </div>
    </nav>
