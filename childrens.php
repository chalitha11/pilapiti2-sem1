<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}


?>
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
                <h1 class="page-title">Children's Books</h1>
                <section class="book-list">
                    <div class="book">
                        <img src="images/Dwk.jpg" alt="Dwk book">
                        <div class="book-info">
                            <h2>Diary of the Wimpy Kid</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn" ><img src="images/grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="images/KA.jpg" alt="KA">
                        <div class="book-info">
                            <h2>King Arthur</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn"><img src="images/grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="images/Mer.jpg" alt="M book">
                        <div class="book-info">
                            <h2>Merlin</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn"><img src="images/grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
            
                    <div class="book">
                        <img src="images/Na.jpg" alt="NA Book">
                        <div class="book-info">
                            <h2>Naruto</h2>
                            <p>ISBN – 13 no:</p>
                            <p>Quantity of stock</p>
                            <p>Price</p>
                            <button class="cart-btn"><img src="images/grocery-store.png" alt="Add to Cart"></button>
                        </div>
                    </div>
                </section>
            </main>
            
            <?php include 'index_footer.php'; ?> 
      

         
<script src="js/function.js"></script>

</body>
</html>
</html>

