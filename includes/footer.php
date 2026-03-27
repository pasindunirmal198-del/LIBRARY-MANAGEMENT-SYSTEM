    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-col">
                <a href="index.php" class="logo footer-logo">
                    <div class="logo-icon"><i class='bx bx-book-reader'></i></div>
                    Lumina<span>Lib</span>
                </a>
                <p class="footer-text">Empowering minds through seamless access to knowledge. Your modern, digital-first library management solution.</p>
                <div class="social-links">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="books.php">Explore Catalog</a></li>
                    <li><a href="#">Membership</a></li>
                    <li><a href="#">Events</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Newsletter</h3>
                <p>Subscribe to get latest book updates.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit" class="btn btn-primary"><i class='bx bx-send'></i></button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Lumina Library Management System. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript Navigation Toggle for Mobile -->
    <script>
        const mobileMenu = document.querySelector('.mobile-menu');
        const navLinks = document.querySelector('.nav-links');
        
        if(mobileMenu) {
            mobileMenu.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        }
        
        // Sticky Navbar
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('.navbar');
            if(window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
