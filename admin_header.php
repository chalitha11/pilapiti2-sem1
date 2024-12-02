<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Page</title>
</head>
<body>
    
<header>
    <div class="admin-header">
        <!-- Reduced-size logo -->
        <div class="logo">
            <a href="admin_index.php">
                <img src="images/logo.jpeg" alt="Bookstore Logo">
            </a>
        </div>
        <p class="admin-title">Admin Panel</p>
        
        <!-- Navigation Menu -->
        <nav class="nav">
            <a href="admin_index.php" class="active">Home</a>
            <a href="add_books.php">Add Stock</a>
            <a href="admin_orders.php">Orders</a>
            <a href="users_detail.php">Users</a>
        </nav>
        
        <!-- Greeting and Logout -->
        <div class="right">
            <div class="log_info">
                <p>Hello <?php echo $_SESSION['admin_name']; ?></p>
            </div>
            <a class="logout-btn" href="logout.php?logout=<?php echo $_SESSION['admin_name']; ?>">Logout</a>
        </div>
    </div>
</header>

</body>
</html>
