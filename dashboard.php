<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$role = $_SESSION['role'];

// Handle Book Borrowing
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'borrow') {
    $book_id = $_POST['book_id'];
    
    // Check if available
    $stmt = $pdo->prepare("SELECT available FROM books WHERE id = ?");
    $stmt->execute([$book_id]);
    $book = $stmt->fetch();
    
    if ($book && $book['available']) {
        $pdo->beginTransaction();
        try {
            $pdo->exec("UPDATE books SET available = 0 WHERE id = $book_id");
            $stmt = $pdo->prepare("INSERT INTO borrowings (user_id, book_id) VALUES (?, ?)");
            $stmt->execute([$user_id, $book_id]);
            $pdo->commit();
            $msg = "<div class='alert alert-success'>Book borrowed successfully!</div>";
        } catch (Exception $e) {
            $pdo->rollBack();
            $msg = "<div class='alert alert-error'>Failed to borrow book.</div>";
        }
    } else {
        $msg = "<div class='alert alert-error'>Book is currently unavailable.</div>";
    }
}

// Fetch all books
$searchTerm = $_GET['search'] ?? '';
if ($searchTerm) {
    $stmt = $pdo->prepare("SELECT * FROM books WHERE title LIKE ? OR author LIKE ?");
    $stmt->execute(["%$searchTerm%", "%$searchTerm%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM books");
}
$books = $stmt->fetchAll();

// Fetch Python AI Recommendations
$recommendations = [];
$python_path = "python"; // Assuming Python is in environment variables PATH
$script_path = escapeshellarg(__DIR__ . DIRECTORY_SEPARATOR . 'python' . DIRECTORY_SEPARATOR . 'recommend.py');
$arg = escapeshellarg($user_id);
$command = "$python_path $script_path $arg 2>&1";
$output = shell_exec($command);

if ($output) {
    $data = json_decode(trim($output), true);
    if(isset($data['status']) && $data['status'] === 'success') {
        $rec_ids = implode(',', array_map('intval', $data['recommended_book_ids']));
        if (!empty($rec_ids)) {
            $rec_stmt = $pdo->query("SELECT * FROM books WHERE id IN ($rec_ids)");
            $recommendations = $rec_stmt->fetchAll();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | NexLib</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            max-width: 500px;
        }
        .search-bar input {
            flex: 1;
        }
    </style>
</head>
<body>

    <div class="bg-gradient-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <!-- Header Navigation -->
    <header class="scrolled">
        <div class="container nav-container">
            <div class="logo">
                <ion-icon name="library"></ion-icon> NexLib
            </div>
            <nav class="nav-links">
                <span style="color: var(--text-muted);">Welcome, <?php echo htmlspecialchars($user_name); ?></span>
                <a href="logout.php" class="btn btn-outline" style="padding: 0.4rem 1rem;">Logout</a>
            </nav>
        </div>
    </header>

    <div class="container dashboard-wrapper">
        <div class="dashboard-header">
            <div>
                <h1 style="font-size: 2.5rem; margin-bottom: 0.5rem;">Library Catalog</h1>
                <p style="color: var(--text-muted);">Discover and borrow from our extensive collection.</p>
            </div>
        </div>

        <?php echo $msg; ?>

        <form method="GET" class="search-bar">
            <input type="text" name="search" class="form-input" placeholder="Search books by title or author..." value="<?php echo htmlspecialchars($searchTerm); ?>">
            <button type="submit" class="btn btn-primary">
                <ion-icon name="search"></ion-icon>
            </button>
        </form>

        <?php if(!empty($recommendations)): ?>
        <div class="glass-panel" style="padding: 2rem; margin-bottom: 3rem; background: rgba(59, 130, 246, 0.05); border: 1px solid rgba(59, 130, 246, 0.2);">
            <h2 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <ion-icon name="sparkles" style="color: var(--primary-color);"></ion-icon> AI Recommendations For You
            </h2>
            <div class="book-grid" style="grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));">
                <?php foreach($recommendations as $rb): ?>
                <div class="book-card glass-panel" style="background: var(--surface-color);">
                    <img src="<?php echo htmlspecialchars($rb['cover_image']); ?>" alt="Cover" class="book-img" style="height: 200px;">
                    <div class="book-info" style="padding: 1rem;">
                        <span class="book-tag"><?php echo htmlspecialchars($rb['category']); ?></span>
                        <h3 class="book-title" style="font-size: 1.1rem;"><?php echo htmlspecialchars($rb['title']); ?></h3>
                        <p class="book-author" style="font-size: 0.8rem;"><?php echo htmlspecialchars($rb['author']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <h2 style="margin-bottom: 1.5rem;">All Books</h2>
        <div class="book-grid">
            <?php if(count($books) > 0): ?>
                <?php foreach($books as $book): ?>
                <div class="book-card glass-panel">
                    <img src="<?php echo htmlspecialchars($book['cover_image']); ?>" alt="Cover" class="book-img">
                    <div class="book-info">
                        <span class="book-tag"><?php echo htmlspecialchars($book['category']); ?></span>
                        <h3 class="book-title"><?php echo htmlspecialchars($book['title']); ?></h3>
                        <p class="book-author"><?php echo htmlspecialchars($book['author']); ?></p>
                        
                        <div style="margin-top: 1rem;">
                            <?php if($book['available']): ?>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="borrow">
                                <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 0.9rem;">Borrow Book</button>
                            </form>
                            <?php else: ?>
                            <button class="btn btn-outline" style="width: 100%; opacity: 0.5; font-size: 0.9rem;" disabled>Not Available</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color: var(--text-muted); grid-column: 1 / -1; text-align: center; padding: 3rem;">No books found matching your criteria.</p>
            <?php endif; ?>
        </div>

    </div>

</body>
</html>
