<!DOCTYPE html>
    <html lang="en">
        <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookstore</title>
        <link rel="stylesheet" href="css/style.css">

        </head>
        <body>
            <?php include 'index_header.php'; ?>  

             <main>
                <h1 class="page-title">New Arrivals</h1>
                <section class="book-list">
                    <div class="book">
                        <img src="images/M.jpg" alt="Matilda">
                        <div class="book-info">
                            <h2>Matilda</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" onclick="showLoginPopup()"><img src="images/grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="images/KA.jpg" alt="KA">
                        <div class="book-info">
                            <h2>King Arthur</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" onclick="showLoginPopup()"><img src="images/grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="images/Mer.jpg" alt="M book">
                        <div class="book-info">
                            <h2>Merlin</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" onclick="showLoginPopup()"><img src="images/grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="images/Na.jpg" alt="NA Book">
                        <div class="book-info">
                            <h2>Naruto</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" onclick="showLoginPopup()"><img src="images/grocery-store.png" alt="Add to Cart"></button>
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
            
            

      

            <?php include 'index_footer.php'; ?> 
  
<script src="js/function.js"></script>

</body>
</html>
</html>

