<!DOCTYPE html>
    <html lang="en">
        <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookstore</title>
        <link rel="stylesheet" href="css/style.css">

        </head>
        <body>
            <?php include 'header.php'; ?>  

             <main>
                <h1 class="page-title">Comics</h1>
                <section class="book-list">
                    <div class="book">
                        <img src="Dwk.jpg" alt="Dwk book">
                        <div class="book-info">
                            <h2>Diary of the Wimpy Kid</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" onclick="showLoginPopup()"><img src="grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="KA.jpg" alt="KA">
                        <div class="book-info">
                            <h2>King Arthur</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" onclick="showLoginPopup()"><img src="grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="Mer.jpg" alt="M book">
                        <div class="book-info">
                            <h2>Merlin</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" onclick="showLoginPopup()"><img src="grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="Na.jpg" alt="NA Book">
                        <div class="book-info">
                            <h2>Naruto</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" onclick="showLoginPopup()"><img src="grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
                </section>
            </main>
            <div id="loginPopup" class="popup-overlay">
                <div class="popup-content">
                    <h2>Please Log In</h2>
                    <p>If you have an account already, please log in or else please create an account.</p>
                    <div class="popup-buttons">
                        <button class="popup-cancel" onclick="closeLoginPopup()">Cancel</button>
                        <button class="popup-login" onclick="redirectToLogin()">Log In</button>
                    </div>
                </div>
            </div>
            
            

      

             <!-- Footer Section -->
<footer class="footer">
    <div class="footer-content">
        <!-- Logo and Address -->
        <div class="footer-section address">
            <img src="logo.jpeg" alt="Logo" class="footer-logo">
            <p><strong>Address</strong></p>
            <p>14, Moorfields, LE5 1ND</p>
            <p>Leicester</p>
        </div>

        <!-- Hotline and Email -->
        <div class="footer-section contact">
            <div class="contact-item">
                <img src="call-icon-symbol-phone-receiver-and-contact-vector-37642182.avif" alt="Phone Icon" class="icon">
                <p><strong>Hotline</strong></p>
                <p>07400371815</p>
                <p> , </p>
                <p>07508317851</p>
            </div>
            <div class="contact-item">
                <img src="email.png" alt="Email Icon" class="icon">
                <p><strong>Email</strong></p>
                <p>ebook@gmail.com</p>
                <p> / </p>
                <p>ebook@yahoo.com</p>
            </div>
        </div>

        <!-- Social Media -->
        <div class="footer-section social-media">
            <p><strong>Like.Follow.Share</strong></p>
            <div class="social-icons">
                <div class="social-icon">
                    <img src="facebook.png" alt="Facebook Icon">
                    <p>Facebook</p>
                </div>
                <div class="social-icon">
                    <img src="instagram.png" alt="Instagram Icon">
                    <p>Instagram</p>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
<script src="js/function.js"></script>

</body>
</html>
</html>

