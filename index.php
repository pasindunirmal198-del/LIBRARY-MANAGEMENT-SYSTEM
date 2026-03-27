<?php 
$page = 'home';
include 'includes/header.php'; 
?>

<!-- Hero Section -->
<header class="hero">
    <div class="container hero-container">
        <div class="hero-content">
            <h1 class="animate-up">Discover a World of <span>Knowledge</span></h1>
            <p class="animate-up" style="animation-delay: 0.1s;">Experience a revolutionary library management system. Access thousands of books, journals, and digital resources securely and swiftly.</p>
            <div class="hero-buttons animate-up" style="animation-delay: 0.2s;">
                <a href="books.php" class="btn btn-primary btn-lg shadow-btn">Explore Catalog <i class='bx bx-right-arrow-alt'></i></a>
                <a href="#" class="btn btn-outline btn-lg">Watch Demo</a>
            </div>
            <div class="hero-stats animate-up" style="animation-delay: 0.3s;">
                <div class="stat"><span class="stat-number">50K+</span><span class="stat-text">Digital Books</span></div>
                <div class="stat"><span class="stat-number">12K+</span><span class="stat-text">Active Members</span></div>
                <div class="stat"><span class="stat-number">4.9/5</span><span class="stat-text">User Rating</span></div>
            </div>
        </div>
        <div class="hero-image animate-up" style="animation-delay: 0.4s;">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" alt="Modern Library">
            <div class="floating-card">
                 <div class="icon-wrap"><i class='bx bx-check-shield'></i></div>
                 <div>
                    <h4>Smart Search</h4>
                    <p>Find books in seconds</p>
                 </div>
            </div>
            <div class="floating-card secondary">
                 <div class="icon-wrap"><i class='bx bx-book-open'></i></div>
                 <div>
                    <h4>Read Anywhere</h4>
                    <p>Cross-device sync</p>
                 </div>
            </div>
        </div>
    </div>
</header>

<!-- Features Section -->
<section class="section" style="background-color: white;">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">Why Choose Us</span>
            <h2 class="section-title">A Library That Works For You</h2>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class='bx bx-search-alt'></i></div>
                <h3>Advanced Search</h3>
                <p>Filter by genre, author, publisher, or publication year. Find exactly what you are looking for with our smart search constraints.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class='bx bx-devices'></i></div>
                <h3>Digital Downloads</h3>
                <p>Read on the go. Download e-books directly to your device and read them anywhere, even offline, with absolute ease.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class='bx bx-history'></i></div>
                <h3>Reading History</h3>
                <p>Track your reading progress. Get personalized recommendations based on your checkout history and favorite genres.</p>
            </div>
        </div>
    </div>
</section>

<!-- Trending Books Section -->
<section class="section bg-accent">
    <div class="container">
        <div class="section-header" style="display: flex; justify-content: space-between; align-items: flex-end; text-align: left;">
            <div>
                <span class="section-subtitle">Trending Now</span>
                <h2 class="section-title">Popular Reads</h2>
            </div>
            <a href="books.php" class="btn btn-outline">View All Books <i class='bx bx-right-arrow-alt'></i></a>
        </div>
        <div class="books-grid">
            <!-- Book 1 -->
            <div class="book-card">
                <div class="book-img-wrap">
                    <span class="book-category">Science</span>
                    <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="The Cosmos">
                </div>
                <div class="book-info">
                    <h3 class="book-title">The Wonders of Cosmos</h3>
                    <div class="book-author"><i class='bx bx-user'></i> Dr. Alan Stern</div>
                    <div class="book-meta">
                        <span class="book-rating"><i class='bx bxs-star'></i><span>4.8</span></span>
                        <a href="#" class="btn btn-primary" style="padding: 6px 16px; font-size: 0.9rem;">Borrow</a>
                    </div>
                </div>
            </div>
            
            <!-- Book 2 -->
            <div class="book-card">
                <div class="book-img-wrap">
                    <span class="book-category">Fiction</span>
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Silent Wind">
                </div>
                <div class="book-info">
                    <h3 class="book-title">The Silent Wind</h3>
                    <div class="book-author"><i class='bx bx-user'></i> Sarah Jenkins</div>
                    <div class="book-meta">
                        <span class="book-rating"><i class='bx bxs-star'></i><span>4.5</span></span>
                        <a href="#" class="btn btn-primary" style="padding: 6px 16px; font-size: 0.9rem;">Borrow</a>
                    </div>
                </div>
            </div>

            <!-- Book 3 -->
            <div class="book-card">
                <div class="book-img-wrap">
                    <span class="book-category">Technology</span>
                    <img src="https://images.unsplash.com/photo-1580927752452-89d86da3fa0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Code Clean">
                </div>
                <div class="book-info">
                    <h3 class="book-title">Modern Web Architecture</h3>
                    <div class="book-author"><i class='bx bx-user'></i> David Rogers</div>
                    <div class="book-meta">
                        <span class="book-rating"><i class='bx bxs-star'></i><span>4.9</span></span>
                        <a href="#" class="btn btn-primary" style="padding: 6px 16px; font-size: 0.9rem;">Borrow</a>
                    </div>
                </div>
            </div>

            <!-- Book 4 -->
            <div class="book-card">
                <div class="book-img-wrap">
                    <span class="book-category">History</span>
                    <img src="https://images.unsplash.com/photo-1461301214746-1e109215d6d3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" alt="Ancient Rome">
                </div>
                <div class="book-info">
                    <h3 class="book-title">Empire: Ancient Rome</h3>
                    <div class="book-author"><i class='bx bx-user'></i> Marcus Tullius</div>
                    <div class="book-meta">
                        <span class="book-rating"><i class='bx bxs-star'></i><span>4.7</span></span>
                        <a href="#" class="btn btn-primary" style="padding: 6px 16px; font-size: 0.9rem;">Borrow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); color: white; text-align: center;">
    <div class="container" style="max-width: 800px;">
        <h2 style="color: white; font-size: 2.5rem; margin-bottom: 24px;">Ready to start your reading journey?</h2>
        <p style="color: rgba(255,255,255,0.8); font-size: 1.1rem; margin-bottom: 32px;">Join thousands of readers and get access to our complete digital library absolutely free for the first 30 days.</p>
        <a href="login.php" class="btn" style="background: white; color: var(--primary-color); font-size: 1.1rem; padding: 16px 40px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">Create Free Account</a>
    </div>
</section>

<style>
    /* Add a bit of animation for the homepage load */
    .animate-up {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.8s forwards;
    }
    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<?php include 'includes/footer.php'; ?>
