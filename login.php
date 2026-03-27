<?php
session_start();
require 'config.php';

$error = ''; $success = '';

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
}

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if($name && $email && $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if($stmt->execute([$name, $email, $hash])) {
                $success = "Account created! You can now log in.";
            }
        } catch(PDOException $e) {
            $error = "Email already exists.";
        }
    } else {
        $error = "All fields are required.";
    }
}

$is_login = !isset($_GET['signup']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $is_login ? 'Login' : 'Sign Up'; ?> | NexLib</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

    <div class="bg-gradient-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <div class="auth-wrapper">
        <div class="glass-panel auth-card">
            <div class="auth-header">
                <h2><?php echo $is_login ? 'Welcome Back' : 'Create Account'; ?></h2>
                <p><?php echo $is_login ? 'Enter your details to access your account.' : 'Join NexLib today and explore.'; ?></p>
            </div>

            <?php if($error): ?><div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div><?php endif; ?>
            <?php if($success): ?><div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div><?php endif; ?>

            <form method="POST" action="">
                <input type="hidden" name="action" value="<?php echo $is_login ? 'login' : 'register'; ?>">
                
                <?php if(!$is_login): ?>
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-input" placeholder="John Doe" required>
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" placeholder="name@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    <?php echo $is_login ? 'Sign In' : 'Sign Up'; ?>
                </button>
            </form>

            <div class="auth-footer">
                <?php if($is_login): ?>
                    Don't have an account? <a href="?signup=1">Sign up</a>
                <?php else: ?>
                    Already have an account? <a href="login.php">Log in</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>
