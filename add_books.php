<?php
include 'config.php';

session_start();

// Ensure the admin is logged in
/*if (!isset($_SESSION['admin_id'])) {
    header('location:login.php');
    exit;
}

$admin_id = $_SESSION['admin_id'];*/

// Add a book
if (isset($_POST['add_books'])) {
    $bid = mysqli_real_escape_string($conn, $_POST['bid']);
    $bname = mysqli_real_escape_string($conn, $_POST['bname']);
    $btitle = mysqli_real_escape_string($conn, $_POST['btitle']);
    $bpublished_date = mysqli_real_escape_string($conn, $_POST['bpublished_date']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = $_POST['price'];
    $desc = mysqli_real_escape_string($conn, $_POST['bdesc']);
    $img = $_FILES["image"]["name"];
    $img_temp_name = $_FILES["image"]["tmp_name"];
    $img_file = "./added_books/" . $img;

    // Input validation
    if (empty($bid) || empty($bname) || empty($btitle) || empty($bpublished_date) || empty($price) || empty($category) || empty($desc) || empty($img)) {
        $message[] = 'All fields are required!';
    } elseif (!is_numeric($price) || $price < 0) {
        $message[] = 'Price must be a positive number!';
    } elseif ($_FILES['image']['size'] > 2000000) {
        $message[] = 'Image size is too large!';
    } else {
        // Check if the book already exists
        $check_book_query = mysqli_query($conn, "SELECT * FROM `book_info` WHERE bid = '$bid'");
        if (mysqli_num_rows($check_book_query) > 0) {
            $message[] = 'Book with this ISBN already exists!';
        } else {
            // Insert the new book
            $add_book_query = "INSERT INTO `book_info`(`bid`, `name`, `title`, `published_date`, `price`, `category`, `description`, `image`) 
                               VALUES('$bid', '$bname', '$btitle', '$bpublished_date', '$price', '$category', '$desc', '$img')";

            if (mysqli_query($conn, $add_book_query)) {
                move_uploaded_file($img_temp_name, $img_file);
                $message[] = 'New book added successfully!';
            } else {
                $message[] = 'Failed to add the book!';
            }
        }
    }
}

// Delete a book
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = "DELETE FROM `book_info` WHERE bid = '$delete_id'";
    if (mysqli_query($conn, $delete_query)) {
        header('location:add_books.php');
        exit;
    } else {
        $message[] = 'Failed to delete the book!';
    }
}

// Update a book
if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_title = mysqli_real_escape_string($conn, $_POST['update_title']);
    $update_published_date = mysqli_real_escape_string($conn, $_POST['update_published_date']);
    $update_description = mysqli_real_escape_string($conn, $_POST['update_description']);
    $update_price = $_POST['update_price'];
    $update_category = mysqli_real_escape_string($conn, $_POST['update_category']);
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = './added_books/' . $update_image;
    $update_old_image = $_POST['update_old_image'];

    // Update the book details
    $update_query = "UPDATE `book_info` SET 
                     `name` = '$update_name', 
                     `title` = '$update_title', 
                     `published_date` = '$update_published_date', 
                     `description` = '$update_description', 
                     `price` = '$update_price', 
                     `category` = '$update_category' 
                     WHERE `bid` = '$update_p_id'";

    if (mysqli_query($conn, $update_query)) {
        if (!empty($update_image)) {
            if ($update_image_size > 2000000) {
                $message[] = 'Image size is too large!';
            } else {
                $update_image_query = "UPDATE `book_info` SET `image` = '$update_image' WHERE `bid` = '$update_p_id'";
                if (mysqli_query($conn, $update_image_query)) {
                    move_uploaded_file($update_image_tmp_name, $update_folder);
                    unlink('./added_books/' . $update_old_image); // Remove old image
                }
            }
        }
        header('location:add_books.php');
        exit;
    } else {
        $message[] = 'Failed to update the book!';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/admin.css">
  <title>Add Books</title>
</head>

<body>
  <?php include './admin_header.php'; ?>

  <?php
  if (isset($message)) {
    foreach ($message as $msg) {
      echo '<div class="message" id="messages"><span>' . htmlspecialchars($msg) . '</span></div>';
    }
  }
  ?>

  <a class="update_btn" style="position: fixed; z-index: 100;" href="total_books.php">See All Books</a>

  <div class="container_box">
    <form action="" method="POST" enctype="multipart/form-data">
      <h3>Add Books To <a href="index.php"><span>Book</span> <span>Store</span></a></h3>
      <input type="text" name="bid" placeholder="Enter book ISBN Number" class="text_field" required>
      <input type="text" name="bname" placeholder="Enter book Name" class="text_field" required>
      <input type="text" name="btitle" placeholder="Enter Author name" class="text_field" required>
      <input type="text" name="bpublished_date" placeholder="Enter Published Date" class="text_field" required>
      <input type="number" min="0" name="price" class="text_field" placeholder="Enter book price" required>
      <select name="category" class="text_field" required>
        <option value="Adventure">Adventure</option>
        <option value="Magic">Magic</option>
        <option value="Knowledge">Knowledge</option>
      </select>
      <textarea name="bdesc" placeholder="Enter book description" class="text_field" cols="18" rows="5" required></textarea>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="text_field" required>
      <input type="submit" value="Add Book" name="add_books" class="btn text_field">
    </form>
  </div>

  <section class="show-products">
    <div class="box-container">
      <?php
      $stmt = $conn->prepare("SELECT * FROM book_info ORDER BY date DESC LIMIT 2");
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        while ($book = $result->fetch_assoc()) {
          echo '<div class="box">';
          echo '<img class="books_images" src="added_books/' . htmlspecialchars($book['image']) . '" alt="Book Image">';
          echo '<div class="name">Author: ' . htmlspecialchars($book['title']) . '</div>';
          echo '<div class="name">Name: ' . htmlspecialchars($book['name']) . '</div>';
          echo '<div class="price">Price: ₹ ' . htmlspecialchars($book['price']) . '/-</div>';
          echo '<a href="add_books.php?update=' . htmlspecialchars($book['bid']) . '" class="update_btn">Update</a>';
          echo '<a href="add_books.php?delete=' . htmlspecialchars($book['bid']) . '" class="delete_btn" onclick="return confirm(\'Delete this book?\');">Delete</a>';
          echo '</div>';
        }
      } else {
        echo '<p class="empty">No products added yet!</p>';
      }
      ?>
    </div>
  </section>

  <section class="edit-product-form">
    <?php
    if (isset($_GET['update'])) {
      $update_id = $_GET['update'];
      $stmt = $conn->prepare("SELECT * FROM book_info WHERE bid = ?");
      $stmt->bind_param("s", $update_id);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
        ?>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="update_p_id" value="<?php echo htmlspecialchars($book['bid']); ?>">
          <input type="hidden" name="update_old_image" value="<?php echo htmlspecialchars($book['image']); ?>">
          <img src="./added_books/<?php echo htmlspecialchars($book['image']); ?>" alt="Book Image">
          <input type="text" name="update_name" value="<?php echo htmlspecialchars($book['name']); ?>" class="box" required placeholder="Enter Book Name">
          <input type="text" name="update_title" value="<?php echo htmlspecialchars($book['title']); ?>" class="box" required placeholder="Enter Author Name">
          <select name="update_category" class="text_field" required>
            <option value="Adventure" <?php echo ($book['category'] == 'Adventure') ? 'selected' : ''; ?>>Adventure</option>
            <option value="Magic" <?php echo ($book['category'] == 'Magic') ? 'selected' : ''; ?>>Magic</option>
            <option value="Knowledge" <?php echo ($book['category'] == 'Knowledge') ? 'selected' : ''; ?>>Knowledge</option>
          </select>
          <textarea name="update_description" class="box" required placeholder="Enter book description"><?php echo htmlspecialchars($book['description']); ?></textarea>
          <input type="number" name="update_price" value="<?php echo htmlspecialchars($book['price']); ?>" min="0" class="box" required placeholder="Enter book price">
          <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
          <input type="submit" value="Update" name="update_product" class="delete_btn">
          <input type="reset" value="Cancel" id="close-update" class="update_btn">
        </form>
    <?php
      } else {
        echo '<p class="empty">Book not found!</p>';
      }
    }
    ?>
  </section>

  <script src="js/admin.js"></script>
  <script>
    setTimeout(() => {
      const box = document.getElementById('messages');
      if (box) box.style.display = 'none';
    }, 8000);
  </script>
</body>

</html>
