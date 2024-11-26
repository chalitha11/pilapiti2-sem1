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
               
                <ul class="header-buttons">
    <!-- Search Icon Button -->
    <li>
        <a href="#" class="search-btn">
            <img src="images/Search.png" alt="Search" class="search-icon">
        </a>
    </li>
    <!-- About Us Button -->
    <li><a href="about.php" class="about-btn">About Us</a></li>
    <!-- Profile Button -->
    <li><a href="#" id="user-btn" class="user-btn"> <img src="images/user.png" alt="User" class="user-icon"><i class="fas fa-user"></i></a></li>
    <!-- Cart Button -->
    <li>
        <a href="#" class="cart-btn" onclick="showLoginPopup()">
            <img src="images/grocery-store.png" alt="Cart " class="cart-icon"> <span>(0)</span>
        </a>
    </li>
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
