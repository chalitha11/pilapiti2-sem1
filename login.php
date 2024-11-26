<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:index.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>




<!DOCTYPE html>
    <html lang="en">
        <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookstore</title>
        <link rel="stylesheet" href="css/style.css">
        
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

             <div class="login-container">
                <div class="login-form">
                    <h2>Log IN</h2>
                    <form action="" method="post">
                        <!-- Email Input -->
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        
                        <!-- Password Input -->
                        <label for="password">Password</label>
                        <input type="password" id="password" name="pass" placeholder="Enter your password" required>
        
                        <!-- Forgot Password -->
                        <a href="#" class="forgot-password">forgot password?</a>
        
                        <!-- Submit Button -->
                        <button type="submit" name="submit" class="login-btn">Log IN</button>
                    </form>
                </div>
        
                <!-- Create Account Section -->
                <div class="create-account">
                    <p>If you don’t have an account already……</p>
                    <a href="register.php" class="create-link">Create one...</a>
                </div>
            </div>


<script src="js/function.js"></script>





        

            
        </body>
    </html>
</html>
