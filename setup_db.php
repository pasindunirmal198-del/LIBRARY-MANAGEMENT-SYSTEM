<?php
require 'config.php';

// Create Users Table
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    role TEXT DEFAULT 'user'
)");

// Create Books Table
$pdo->exec("CREATE TABLE IF NOT EXISTS books (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    author TEXT NOT NULL,
    category TEXT NOT NULL,
    description TEXT,
    cover_image TEXT,
    available BOOLEAN DEFAULT 1
)");

// Create Borrowings Table
$pdo->exec("CREATE TABLE IF NOT EXISTS borrowings (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    book_id INTEGER,
    borrow_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    return_date DATETIME,
    status TEXT DEFAULT 'borrowed',
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(book_id) REFERENCES books(id)
)");

// Insert Dummy Data
$password = password_hash('password123', PASSWORD_DEFAULT);

$pdo->exec("INSERT OR IGNORE INTO users (id, name, email, password, role) VALUES 
    (1, 'Admin User', 'admin@library.com', '$password', 'admin'),
    (2, 'Pasindu', 'pasindu@example.com', '$password', 'user')
");

$books = [
    [1, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 'A classic novel.', 'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?auto=format&fit=crop&q=80&w=600', 1],
    [2, '1984', 'George Orwell', 'Dystopian', 'A dystopian social science fiction.', 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=600', 1],
    [3, 'To Kill a Mockingbird', 'Harper Lee', 'Fiction', 'A novel about racial injustice.', 'https://images.unsplash.com/photo-1474366521946-c3d4b507abf2?auto=format&fit=crop&q=80&w=600', 1],
    [4, 'Artificial Intelligence', 'Stuart Russell', 'Technology', 'A modern approach to AI.', 'https://images.unsplash.com/photo-1620712943543-bcc4688e7485?auto=format&fit=crop&q=80&w=600', 1],
    [5, 'Grokking Algorithms', 'Aditya Bhargava', 'Programming', 'An illustrated guide for programmers.', 'https://images.unsplash.com/photo-1516116216624-53e697fedbea?auto=format&fit=crop&q=80&w=600', 1]
];

foreach ($books as $b) {
    try {
        $stmt = $pdo->prepare("INSERT INTO books (id, title, author, category, description, cover_image, available) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute($b);
    } catch(PDOException $e) {
        // Ignore unique constraint or re-insertion errors
    }
}

echo "Database initialized successfully!";
?>
