<?php
@include 'header.php';
@include 'configDatabase.php';

// Start session and get userID
if (session_status() === PHP_SESSION_NONE) {
  session_start();

session_start();
$userID = $_SESSION['user_id'];
}

$userQuery = "SELECT uname, email FROM user WHERE userID = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("i", $userID);
$stmt->execute();
$userResult = $stmt->get_result();
$user = $userResult->fetch_assoc();

// Check if user details are fetched successfully
if ($user) {
    $userName = $user['uname'];
    $userEmail = $user['email'];
} else {
    echo "Error: User details not found.";
}

// Calculate Total Amount and Total Books
$queryTotal = "SELECT SUM(book.bprice) AS total_price, COUNT(cart.bookID) AS total_books
    FROM book
    JOIN cart ON book.bookID = cart.bookID
    WHERE cart.userID = $userID";
$resultTotal = $conn->query($queryTotal);
$rowTotal = $resultTotal->fetch_assoc();
$totalAmount = $rowTotal['total_price'];
$totalBooks = $rowTotal['total_books'];

// Handle Checkout Submission
if (isset($_POST['checkout'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $paymentMethod = $_POST['payment_method'];
    $uAddress = $_POST['uAddress'];
    $orderDate = date('Y-m-d');

    // Insert into confirm_order table
    $checkout_sql = "INSERT INTO confirm_order 
                    (userID, name, number, email, payment_method, uAddress, total_books, total_price, order_date) 
                     VALUES 
                    ('$userID', '$name', '$number', '$email', '$paymentMethod', '$uAddress', '$totalBooks', '$totalAmount', '$orderDate')";
    if ($conn->query($checkout_sql) === TRUE) {
        $orderID = $conn->insert_id;
        echo "Order placed successfully! Order ID: $orderID";
        // Optional: Redirect to a confirmation page
        // header("Location: confirmation.php?orderID=$orderID");
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
    <link href="css\bootstrap-4.4.1.css" rel="stylesheet">
    <link href="css\headerFooter.css" rel="stylesheet" type="text/css">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f5f5f5;
        }

        .checkout-container {
            max-width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 175vh;
            padding: 15px;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        form {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="text"]:read-only,
        input[type="email"]:read-only {
            background-color: #f3f3f3;
        }

        textarea {
            resize: none;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            form {
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }

            button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <form action="" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['uname']; ?>" required>

            <label for="number">Phone Number:</label>
            <input type="text" id="number" name="number" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="cash on delivery">Cash on Delivery</option>
                <option value="Debit card">Debit Card</option>
                <option value="Amazon Pay">Amazon Pay</option>
                <option value="Paypal">PayPal</option>
                <option value="Google Pay">Google Pay</option>
            </select>

            <label for="uAddress">Address:</label>
            <textarea id="uAddress" name="uAddress" rows="4" required></textarea>

            <label for="total_books">Total Books:</label>
            <input type="text" id="total_books" name="total_books" value="<?php echo $totalBooks; ?>" readonly>

            <label for="total_amount">Total Price:</label>
            <input type="text" id="total_amount" name="totalAmount" value="<?php echo $totalAmount; ?>" readonly>

            <button type="submit" name="checkout">Place Order</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
