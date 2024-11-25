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
                <h1 class="page-title">Business & Finance</h1>
                <section class="book-list">
                    <div class="book">
                        <img src="BL.jpeg" alt="BL book">
                        <div class="book-info">
                            <h2>Business Law</h2>
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
            

            <?php include 'footer.php'; ?>            

      


<script src="js/function.js"></script>

</body>
</html>
</html>

