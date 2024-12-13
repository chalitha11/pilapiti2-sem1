<?php
@include 'configDatabase.php';
@include 'header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userID = $_SESSION['user_id'] ?? null;
if (!$userID) {
    die("Error: User not logged in.");
}

// Fetch the most recent order for the user
$orderQuery = "SELECT * FROM confirm_order WHERE userID = ? ORDER BY order_id DESC LIMIT 1";
$stmt = $conn->prepare($orderQuery);
$stmt->bind_param("i", $userID);
$stmt->execute();
$orderResult = $stmt->get_result();
$order = $orderResult->fetch_assoc();

if (!$order) {
    die("Error: No order found.");
}

// Fetch user details
$userQuery = "SELECT uname, email FROM user WHERE userID = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("i", $userID);
$stmt->execute();
$userResult = $stmt->get_result();
$user = $userResult->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }
        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .receipt-details {
            margin: 20px 0;
        }
        .receipt-details p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }
        .total {
            font-weight: bold;
            font-size: 18px;
            color: #000;
        }
        .print-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }
        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <h2>Order Receipt</h2>
        <div class="receipt-details">
            <p><strong>Buyer Name:</strong> <?php echo htmlspecialchars($user['uname']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($order['number']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($order['uAddress']); ?></p>
            <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order['order_date']); ?></p>
            <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($order['payment_method']); ?></p>
            <p><strong>Total Books:</strong> <?php echo htmlspecialchars($order['total_books']); ?></p>
            <p class="total"><strong>Total Amount:</strong> £<?php echo htmlspecialchars($order['total_price']); ?></p>
        </div>
        <button class="print-button" onclick="window.print()">Print Receipt</button>
    </div>
</body>
</html>