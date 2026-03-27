<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lumina Library</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <a href="index.php" class="logo">
                <div class="logo-icon"><i class='bx bx-book-reader'></i></div>
                Lumina<span>Lib</span>
            </a>
            <p>Welcome back! Please enter your details.</p>
        </div>
        
        <form action="index.php" method="POST">
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <div style="position: relative;">
                    <i class='bx bx-envelope' style="position: absolute; left: 16px; top: 16px; color: var(--text-muted); font-size: 1.2rem;"></i>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required style="padding-left: 45px;">
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Password</label>
                <div style="position: relative;">
                    <i class='bx bx-lock-alt' style="position: absolute; left: 16px; top: 16px; color: var(--text-muted); font-size: 1.2rem;"></i>
                    <input type="password" class="form-control" name="password" placeholder="••••••••" required style="padding-left: 45px;">
                </div>
            </div>
            
            <div class="auth-options">
                <label>
                    <input type="checkbox" name="remember" style="accent-color: var(--primary-color);"> Remember me
                </label>
                <a href="#">Forgot password?</a>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block shadow-btn">Sign In</button>
            <button type="button" class="btn btn-outline btn-block" style="margin-top: 16px; background: white; border-color: var(--border-color); color: var(--text-main);">
                <img src="https://img.icons8.com/color/24/000000/google-logo.png" style="width: 20px; margin-right: 8px;">
                Sign in with Google
            </button>
        </form>
        
        <div class="auth-footer">
            Don't have an account? <a href="#">Sign up for free</a>
        </div>
    </div>
</div>

</body>
</html>
