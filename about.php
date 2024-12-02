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

              <!-- Main Content -->
    <main>
        <section class="info-section">
            <div class="topic">
                <h2>About Us</h2>
                <p>Welcome to our bookstore! We are passionate about bringing a diverse selection of books to readers of all ages and interests. Our mission is to foster a love of reading by providing a platform where anyone can find something they’ll enjoy.</p>
            </div>

            <div class="topic">
                <h2>Terms & Conditions</h2>
                <p>Our Terms & Conditions outline the rules and guidelines for using our website and services. They cover topics such as account registration, order policies, and user responsibilities. Please read through them to understand your rights and obligations while using our platform.</p>
            </div>

            <div class="topic">
                <h2>Privacy Policy</h2>
                <p>Your privacy is important to us. Our Privacy Policy explains how we collect, use, and protect your personal information. We are committed to ensuring your data is safe and used responsibly. Learn more about what data we collect and how we use it.</p>
            </div>

            <div class="topic">
                <h2>Contact Us</h2>
                <p>If you have any questions, feedback, or need assistance, don’t hesitate to get in touch! Our customer support team is here to help you with any inquiries or issues you may encounter. Reach us by email, phone, or visit our store in person.</p>
                <section class="contact">

            </div>
        </section>
    </main>

      

    <?php include 'index_footer.php'; ?> 

</body>
</html>
</html>

