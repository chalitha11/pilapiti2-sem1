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
        
             <!--New Arrivals-->
             <section class="new-arrivals">
                <h2>New Arrivals</h2>
                <div class="carousel">
                    <div class="arrow left-arrow">&#10094;</div> <!-- Left arrow -->
                    
                    <div class="carousel-items">
                        <!-- Book Card 1 -->
                        <div class="book-card">
                            <img src="sherlock.jpg" alt="Sherlock Holmes Book">
                            <div class="book-info">
                                <p class="book-title">Sherlock Holmes</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
            
                        <!-- Book Card 2 -->
                        <div class="book-card">
                            <img src="GOT.webp" alt="Game of Thrones Book">
                            <div class="book-info">
                                <p class="book-title">Game of Thrones</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £30</p>
                                    <button class="cart-button"onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
            
                        <!-- Book Card 3 -->
                        <div class="book-card">
                            <img src="M.jpg" alt="Matilda Book">
                            <div class="book-info">
                                <p class="book-title">Matilda</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £20</p>
                                    <button class="cart-button"onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Book Card 4 -->
                        <div class="book-card">
                            <img src="Dwk.jpg" alt="DWK Book">
                            <div class="book-info">
                                <p class="book-title">Diary of the Wimpy Kid</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £25</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                            <!-- Book Card 5 -->
                            <div class="book-card">
                                <img src="Mer.jpg" alt="Merlin Book">
                                <div class="book-info">
                                    <p class="book-title">Merlin</p>
                                    <div class="book-details">
                                        <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                        <button class="cart-button" onclick="showLoginPopup()">
                                            <img src="grocery-store.png" alt="Cart Icon">
                                        </button>
                                    </div>
                                </div>
                            </div>

                              <!-- Book Card 6 -->
                         <div class="book-card">
                            <img src="BL.jpeg" alt="BL Book">
                            <div class="book-info">
                                <p class="book-title">Business Law</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>


                              <!-- Book Card 7 -->
                              <div class="book-card">
                                <img src="KA.jpg" alt="KA Book">
                                <div class="book-info">
                                    <p class="book-title">King Arthur</p>
                                    <div class="book-details">
                                        <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £55</p>
                                        <button class="cart-button" onclick="showLoginPopup()">
                                            <img src="grocery-store.png" alt="Cart Icon">
                                        </button>
                                    </div>
                                </div>
                            </div>

                             <!-- Book Card 8-->
                        <div class="book-card">
                            <img src="Na.jpg" alt="NA Book">
                            <div class="book-info">
                                <p class="book-title">Naruto</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £55</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                            
                    
                        
            
                    <div class="arrow right-arrow">&#10095;</div> <!-- Right arrow -->
                </div>
            </section>

             <!--Best Selling-->
             <section class="best-selling">
                <h2>Best Selling Books</h2>
                <div class="carousel">
                    <div class="arrow left-arrow">&#10094;</div> <!-- Left arrow -->
                    
                    <div class="carousel-items">
                        <!-- Book Card 1 -->
                        <div class="book-card">
                            <img src="sherlock.jpg" alt="Sherlock Holmes Book">
                            <div class="book-info">
                                <p class="book-title">Sherlock Holmes</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
            
                        <!-- Book Card 2 -->
                        <div class="book-card">
                            <img src="GOT.webp" alt="Game of Thrones Book">
                            <div class="book-info">
                                <p class="book-title">Game of Thrones</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £30</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
            
                        <!-- Book Card 3 -->
                        <div class="book-card">
                            <img src="M.jpg" alt="Matilda Book">
                            <div class="book-info">
                                <p class="book-title">Matilda</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £20</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                         <!-- Book Card 4 -->
                         <div class="book-card">
                            <img src="Dwk.jpg" alt="DWK Book">
                            <div class="book-info">
                                <p class="book-title">Diary of the Wimpy Kid</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £25</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Book Card 5 -->
                        <div class="book-card">
                            <img src="Mer.jpg" alt="Merlin Book">
                            <div class="book-info">
                                <p class="book-title">Merlin</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                          <!-- Book Card 6 -->
                          <div class="book-card">
                            <img src="BL.jpeg" alt="BL Book">
                            <div class="book-info">
                                <p class="book-title">Business Law</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                         <!-- Book Card 7 -->
                         <div class="book-card">
                            <img src="KA.jpg" alt="KA Book">
                            <div class="book-info">
                                <p class="book-title">King Arthur</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £55</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                         <!-- Book Card 8-->
                         <div class="book-card">
                            <img src="Na.jpg" alt="NA Book">
                            <div class="book-info">
                                <p class="book-title">Naruto</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £55</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
            
                    <div class="arrow right-arrow">&#10095;</div> <!-- Right arrow -->
                </div>
            </section>
            


             

<!--Book of the day-->
<section class="book-of-the-day">
    <div class="book-of-the-day-container">
        <div class="left-panel">
            <p>Book<br>of<br>the<br>Day</p>
        </div>
        <div class="book-image">
            <img src="sherlock.jpg" alt="Sherlock Holmes Book">
        </div>
        <div class="right-panel">
            <p>Title</p>
            <p>Price</p>
            <button class="cart-button" onclick="showLoginPopup()">
                <img src="grocery-store.png" alt="Cart Icon">
            </button>
        </div>
    </div>
</section>


             <!--Special Offers Section-->
             <section class="special-offers">
                <h2>Special Offers</h2>
                <p>Up to 30% off</p>
             </section>

              <!--Hot deals-->
              <section class="hot-deals">
                <h2>Hot Deals of the Week</h2>
                <div class="carousel">
                    <div class="arrow left-arrow">&#10094;</div> <!-- Left arrow -->
                    
                    <div class="carousel-items">
                        <!-- Book Card 1 -->
                        <div class="book-card">
                            <img src="sherlock.jpg" alt="Sherlock Holmes Book">
                            <div class="book-info">
                                <p class="book-title">Sherlock Holmes</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
            
                        <!-- Book Card 2 -->
                        <div class="book-card">
                            <img src="GOT.webp" alt="Game of Thrones Book">
                            <div class="book-info">
                                <p class="book-title">Game of Thrones</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £30</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
            
                        <!-- Book Card 3 -->
                        <div class="book-card">
                            <img src="M.jpg" alt="Matilda Book">
                            <div class="book-info">
                                <p class="book-title">Matilda</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £20</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                         <!-- Book Card 4 -->
                         <div class="book-card">
                            <img src="Dwk.jpg" alt="DWK Book">
                            <div class="book-info">
                                <p class="book-title">Diary of the Wimpy Kid</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £25</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Book Card 5 -->
                        <div class="book-card">
                            <img src="Mer.jpg" alt="Merlin Book">
                            <div class="book-info">
                                <p class="book-title">Merlin</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                         <!-- Book Card 6 -->
                         <div class="book-card">
                            <img src="BL.jpeg" alt="BL Book">
                            <div class="book-info">
                                <p class="book-title">Business Law</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £35</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                         <!-- Book Card 7 -->
                         <div class="book-card">
                            <img src="KA.jpg" alt="KA Book">
                            <div class="book-info">
                                <p class="book-title">King Arthur</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £55</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Book Card 8-->
                        <div class="book-card">
                            <img src="Na.jpg" alt="NA Book">
                            <div class="book-info">
                                <p class="book-title">Naruto</p>
                                <div class="book-details">
                                    <p>ISBN - 13 no:<br>Quantity of stock:<br>Price: £55</p>
                                    <button class="cart-button" onclick="showLoginPopup()">
                                        <img src="grocery-store.png" alt="Cart Icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
            
                    <div class="arrow right-arrow">&#10095;</div> <!-- Right arrow -->
                </div>
            </section>

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
