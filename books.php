<?php 
$page = 'books';
include 'includes/header.php'; 

// Mock Data for Books to demonstrate functionality without DB
$books = [
    [
        "title" => "The Art of Programming",
        "author" => "Donald E. Knuth",
        "category" => "Technology",
        "rating" => 4.9,
        "image" => "https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "title" => "Business Strategies 101",
        "author" => "Michael Porter",
        "category" => "Business",
        "rating" => 4.6,
        "image" => "https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "title" => "Creative Photography",
        "author" => "Ansel Adams",
        "category" => "Art",
        "rating" => 4.8,
        "image" => "https://images.unsplash.com/photo-1516961642265-531546e84af2?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "title" => "The Mindful Brain",
        "author" => "Daniel J. Siegel",
        "category" => "Psychology",
        "rating" => 4.7,
        "image" => "https://images.unsplash.com/photo-1559599557-01004a441e8e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "title" => "World History Basics",
        "author" => "H.G. Wells",
        "category" => "History",
        "rating" => 4.5,
        "image" => "https://images.unsplash.com/photo-1461301214746-1e109215d6d3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "title" => "Space Exploration",
        "author" => "Carl Sagan",
        "category" => "Science",
        "rating" => 4.9,
        "image" => "https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "title" => "Modern Culinary Arts",
        "author" => "Gordon Ramsay",
        "category" => "Cooking",
        "rating" => 4.8,
        "image" => "https://images.unsplash.com/photo-1556910103-1c02745aae4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "title" => "Financial Freedom",
        "author" => "Robert Kiyosaki",
        "category" => "Finance",
        "rating" => 4.6,
        "image" => "https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
    ]
];
?>

<!-- Page Header with Search -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title">Library Catalog</h1>
        <p class="page-description">Search through our extensive collection of books, articles, and digital journals.</p>
        
        <form class="search-box" action="" method="GET">
            <input type="text" name="q" class="search-input" placeholder="Search by book title, author, or ISBN...">
            <select name="category" class="search-select">
                <option value="">All Categories</option>
                <option value="tech">Technology</option>
                <option value="business">Business</option>
                <option value="science">Science</option>
                <option value="art">Art & Design</option>
            </select>
            <button type="submit" class="btn btn-primary" style="margin: 4px; padding: 10px 24px; border-radius: 30px;">
                <i class='bx bx-search'></i> Search
            </button>
        </form>
    </div>
</div>

<!-- Books Main Section -->
<section class="section">
    <div class="container">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 20px;">
            <p style="color: var(--text-muted); font-weight: 500;">Showing <strong><?php echo count($books); ?></strong> books found</p>
            <div style="display: flex; gap: 16px; align-items: center;">
                <span style="font-size: 0.9rem; font-weight: 600;">Sort By:</span>
                <select style="padding: 8px 16px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); outline: none; font-family: inherit;">
                    <option>Most Popular</option>
                    <option>Newest Arrivals</option>
                    <option>A - Z</option>
                    <option>Z - A</option>
                </select>
            </div>
        </div>

        <div class="books-grid">
            <?php foreach($books as $book): ?>
            <div class="book-card">
                <div class="book-img-wrap">
                    <span class="book-category"><?php echo $book['category']; ?></span>
                    <img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>">
                </div>
                <div class="book-info">
                    <h3 class="book-title"><?php echo $book['title']; ?></h3>
                    <div class="book-author"><i class='bx bx-user'></i> <?php echo $book['author']; ?></div>
                    <div class="book-meta">
                        <span class="book-rating"><i class='bx bxs-star'></i><span><?php echo $book['rating']; ?></span></span>
                        <a href="#" class="btn btn-primary" style="padding: 6px 16px; font-size: 0.9rem;">View Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <div style="margin-top: 60px; display: flex; justify-content: center; gap: 8px;">
            <a href="#" class="btn btn-outline" style="min-width: 40px; padding: 10px;"><i class='bx bx-chevron-left'></i></a>
            <a href="#" class="btn btn-primary" style="min-width: 40px; padding: 10px;">1</a>
            <a href="#" class="btn btn-outline" style="min-width: 40px; padding: 10px;">2</a>
            <a href="#" class="btn btn-outline" style="min-width: 40px; padding: 10px;">3</a>
            <span style="display: flex; align-items: center; color: var(--text-muted);">...</span>
            <a href="#" class="btn btn-outline" style="min-width: 40px; padding: 10px;">8</a>
            <a href="#" class="btn btn-outline" style="min-width: 40px; padding: 10px;"><i class='bx bx-chevron-right'></i></a>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
