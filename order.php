<?php
@include 'header.php';
@include 'configDatabase.php';


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert 4th order into the database
$order_id = 4;
$userID = 3; // Replace with actual userID
$name = "Kaveesha Manusarani";
$number = "0702489820";
$email = "kaveeshamanusaraniG786@gmail.com";
$payment_method = "Paypal";
$uAddress = "335/1,Neelammahara road, Godigamuwa,Maharagama";
$total_books = 1;
$total_price = 459.00;
$order_date = date("Y-m-d"); // Current date

$sql = "INSERT INTO confirm_order (order_id, userID, name, number, email, payment_method, uAddress, total_books, total_price, order_date) 
        VALUES ($order_id, $userID, '$name', '$number', '$email', '$payment_method', '$uAddress', '$total_books', $total_price, '$order_date')";



// Fetch all orders from the database
$sql = "SELECT * FROM confirm_order";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <h1 class="title">Order Confirmation</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Payment Method</th>
                <th>Address</th>
                <th>Total Books</th>
                <th>Total Price</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['order_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['number']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['payment_method']}</td>
                        <td>{$row['uAddress']}</td>
                        <td>{$row['total_books']}</td>
                        <td>£{$row['total_price']}</td>
                        <td>{$row['order_date']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No orders found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
