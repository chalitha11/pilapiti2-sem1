<?php
@include 'header.php';
@include 'configDatabase.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userID = $_SESSION['user_id'] ?? null;

// Fetch user details
if ($userID) {
    $userQuery = "SELECT uname, email FROM user WHERE userID = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $userResult = $stmt->get_result();
    $user = $userResult->fetch_assoc();
    $userName = $user['uname'] ?? '';
    $userEmail = $user['email'] ?? '';
} else {
    die("Error: User not logged in.");
}

// Calculate total amount and shipping fee
$queryTotal = "SELECT book.bprice FROM book JOIN cart ON book.bookID = cart.bookID WHERE cart.userID = ?";
$stmt = $conn->prepare($queryTotal);
$stmt->bind_param("i", $userID);
$stmt->execute();
$resultTotal = $stmt->get_result();

$totalAmount = 0;
$totalBooks = 0;
$shippingFee = 0;

while ($row = $resultTotal->fetch_assoc()) {
    $bookPrice = $row['bprice'];
    $totalAmount += $bookPrice;
    $totalBooks++;
    $shippingFee += ($totalBooks == 1) ? 3 : 1;
}
$totalAmount += $shippingFee;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $paymentMethod = $_POST['payment_method'];
    $uAddress = $_POST['uAddress'];
    $totalBooks = $_POST['total_books'];
    $totalPrice = $_POST['amount'];
    $orderDate = date('Y-m-d');

    $orderQuery = "INSERT INTO confirm_order (userID, name, number, email, payment_method, uAddress, total_books, total_price, order_date)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($orderQuery);
    $stmt->bind_param("isssssids", $userID, $name, $number, $email, $paymentMethod, $uAddress, $totalBooks, $totalPrice, $orderDate);

    if ($stmt->execute()) {
        header("Location: order.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <title>Checkout</title>
    <style>
       /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

h2 {
    color: #333;
    text-align: center;
    margin-bottom: 40px;
    font-size: 28px;
    font-weight: bold;
}

.checkout-container {
    background-color: #fff;
    width: 800px;
    padding:40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="email"],
textarea,
select {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    width: 100%;
    box-sizing: border-box;
    background-color: #f9f9f9;
    transition: border 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus,
select:focus {
    border: 1px solid #007bff;
    background-color: #fff;
    outline: none;
}

textarea {
    resize: none;
}

.breakdown {
    background-color: #f1f1f1;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 14px;
}

.breakdown p {
    margin: 5px 0;
    font-weight: bold;
    color: #555;
}

button {
    padding: 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}


    </style>
</head>
<body>
<div class="checkout-container">
    <h2>Checkout</h2>
    <form action="checkout.php" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $userName; ?>" readonly required>

        <label for="number">Phone Number:</label>
        <input type="text" id="number" name="number" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $userEmail; ?>" readonly required>

        <label for="payment_method">Payment Method:</label>
        <select id="payment_method" name="payment_method" required>
            <option value="cash on delivery">Cash on Delivery</option>
        </select>

        <label for="uAddress">Address:</label>
        <textarea id="uAddress" name="uAddress" rows="4" required></textarea>

        <label for="total_books">Total Books:</label>
        <input type="text" id="total_books" name="total_books" value="<?php echo $totalBooks; ?>" readonly>

        <div class="breakdown">
            <p>Base Price: $<?php echo $totalAmount - $shippingFee; ?></p>
            <p>Shipping Fee: $<?php echo $shippingFee; ?></p>
            <p><strong>Total Price: $<?php echo $totalAmount; ?></strong></p>
        </div>

        <input type="hidden" name="amount" value="<?php echo $totalAmount; ?>">

        <button type="submit" name="checkout">Place Order</button>
    </form>
</div>


</body>
</html>
