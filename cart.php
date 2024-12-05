<?php
include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];
$user_name =$_SESSION['user_name'];

if(!isset($user_id)){
   header('location:login.php');
}


if(isset($_GET['remove'])){
    $remove_id=$_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id='$remove_id'") or die('query failed');
    $message[]='Removed Successfully';
    header('location:cart.php');
}
if(isset($_POST['update'])){
    $update_cart_id =$_POST['cart_id'];
    $book_price=$_POST['book_price'];
    $update_quantity =$_POST['update_quantity'];
    $total_price =$book_price * $update_quantity;
    mysqli_query($conn, "UPDATE `cart` SET `quantity`='$update_quantity', `total`='$total_price' WHERE `id`='$update_cart_id'") or die('query failed');
    
    $message[]=''.$user_name.' your cart updated successfully';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
   
</head>

<body>
    <?php
    include 'index_header.php';
    ?>
    <div class="cart_form">
    <?php
    if(isset($message)){
      foreach($message as $message){
        echo '
        <div class="message" id="messages"><span>'.$message.'</span>
        </div>
        ';
      }
    }
    ?>
    <main>
    <a href="index.php" class="back-to-cart"><< Back to Home</a>

    <section class="order-summary">
      <h2>Order Summary</h2>
      <div class="item">
        <img src="images/GOT.webp" alt="Item Image">
        <p>Title</p>
        <p>Quantity</p>
        <p>Unit Price</p>
      </div>
      <div class="item">
        <img src="images/Mer.jpg" alt="Item Image">
        <p>Title</p>
        <p>Quantity</p>
        <p>Unit Price</p>
      </div>
    </section>

    <section class="address">
      <h2>Address</h2>
      <form>
        <input type="text" placeholder="Street no">
        <input type="text" placeholder="Full Name">
        <textarea placeholder="Address Line"></textarea>
        <input type="email" placeholder="Email">
        <input type="text" placeholder="Post Code">
        <input type="text" placeholder="Phone Number">
      </form>
    </section>

    <section class="payment-method">
      <h2>Payment Method</h2>
      <div class="payment-options">
        <label><input type="radio" name="payment"> <img src="images/money.png" alt="MasterCard"></label>
        <label><input type="radio" name="payment"> <img src="images/symbols.png" alt="American Express"></label>
        <label><input type="radio" name="payment"> <img src="images/visa.png" alt="Visa"></label>
      </div>
    </section>

    <section class="price">
      <h2>Price</h2>
      <p>1. Item 01 $100</p>
      <p>2. Item 02 $100</p>
      <p>Shipping cost $100</p>
    </section>

    <section class="payment-details">
      <form>
        <input type="text" placeholder="Card Number">
        <input type="text" placeholder="Expiry Date">
        <input type="text" placeholder="Name">
        <input type="text" placeholder="CVV">
        <button type="submit">Pay now</button>
      </form>
    </section>

  </main>
   
                
                <?php
                $total = 0;
                $select_book = $conn->query("SELECT id, name,price, image ,quantity,total  FROM cart Where user_id= $user_id");
                if ($select_book->num_rows  > 0) {

                    while ($row = $select_book->fetch_assoc()) {
                ?>
                        <tr>
                            <td><img style="height: 90px;" src="./added_books/<?php echo $row['image']; ?>" alt=""></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="number" name="update_quantity" min="1" max="10" value="<?php echo $row['quantity']; ?>">
                                    <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                                    <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $row['price'] ?>">
                                <!-- <input type="submit" name="update" value="update"> -->
                                <button style="background:transparent ;" name="update"><img style="height: 26px; cursor:pointer;" src="./images/update1.png" alt="update"></button> | 
                                <a style="color: red;" href="cart.php?remove=<?php echo $row['id'];?>"> Remove</a>
                                </form>
                           
                            
                        </td>
                            <td><?php $sub_total=$row['price']*$row['quantity']; echo $subtotal=number_format($row['price']*$row['quantity']); ?></td>
                            </tr>

                            <div class="cart-frame">
    <?php
    $total += $sub_total;
        }
    } else {
        echo '<p class="empty">There is nothing in cart yet !!!!!!!!</p>';
    }
    ?>
    <div class="cart-total-container">
    <div class="cart-total">
        <p>Total ₹ <?php echo $total; ?>/-</p>
    </div>
    <a href="checkout.php" class="btn cart-btn1" 
        style="display:<?php if($total > 1){ echo 'inline-block'; }else{ echo 'none'; };?>"> 
        Proceed to Checkout
    </a>
    <a class="cart-btn2" href="index.php">Continue Shopping</a>
</div>
<?php include 'index_footer.php'; ?> 

    
    <script>
setTimeout(() => {
  const box = document.getElementById('messages');

  // 👇️ hides element (still takes up space on page)
  box.style.display = 'none';
}, 5000);
</script>

</body>

</html>

