<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
    <!-- Header Section-->
    <header>
                <div class="main-header">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.jpeg" alt="Logo"></a> <!-- Link to Home page -->
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Search here...">
                </div>
                <ul class="header-buttons">
                    <li><a href="about.php" class="about-btn">About Us</a></li>
                    <li><a href="#" id="user-btn "class="user-btn">Profile</a></li>
                    <li><a href="#" class="cart-btn" onclick="showLoginPopup()">
                        <img src="images/grocery-store.png" alt="Cart">
                    </a></li>
                </ul>

                </div>
                <nav class="categories">
                    <ul>
                        <li><a href="bestsellers.php">Best Sellers</a></li>
                        <li><a href="newarrivals.php">New Arrivals</a></li>
                        <li><a href="Business.php">Business & Finance</a></li>
                        <li><a href="Comics.php">Comics</a></li>
                        <li><a href="childrens.php">Children's Books</a></li>
                        <li><a href="fiction.php">Fiction & Classic</a></li>
                    </ul>
                </nav>
                 
         </header>
