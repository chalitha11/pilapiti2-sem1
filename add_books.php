<?php
require_once 'config.php';
session_start();

// Redirect if not logged in as admin
if (!isset($_SESSION['admin_id'])) {
    header('location:login.php');
    exit;
}

$admin_id = $_SESSION['admin_id'];

function handleAddBook($conn) {
    $requiredFields = ['bid', 'bname', 'btitle', 'bpublished_date', 'category', 'price', 'bdesc', 'image'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field]) && (!isset($_FILES['image']) || empty($_FILES['image']['name']))) {
            return ['All fields are required!'];
        }
    }

    $bid = mysqli_real_escape_string($conn, $_POST['bid']);
    $bname = mysqli_real_escape_string($conn, $_POST['bname']);
    $btitle = mysqli_real_escape_string($conn, $_POST['btitle']);
    $bpublished_date = mysqli_real_escape_string($conn, $_POST['bpublished_date']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = (float)$_POST['price'];
    $desc = mysqli_real_escape_string($conn, $_POST['bdesc']);
    $image = $_FILES['image'];

    if ($price <= 0) {
        return ['Price must be a positive number!'];
    }
    if ($image['size'] > 2000000) {
        return ['Image size is too large!'];
    }

    $checkBookQuery = $conn->prepare("SELECT * FROM book_info WHERE bid = ?");
    $checkBookQuery->bind_param("s", $bid);
    $checkBookQuery->execute();
    $result = $checkBookQuery->get_result();

    if ($result->num_rows > 0) {
        return ['Book with this ISBN already exists!'];
    }

    $imgFilePath = './added_books/' . $image['name'];
    $addBookQuery = $conn->prepare("INSERT INTO book_info (bid, name, title, published_date, price, category, description, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $addBookQuery->bind_param("ssssisss", $bid, $bname, $btitle, $bpublished_date, $price, $category, $desc, $image['name']);

    if ($addBookQuery->execute()) {
        move_uploaded_file($image['tmp_name'], $imgFilePath);
        return ['New book added successfully!'];
    }
    return ['Failed to add the book!'];
}


// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
  $deleteId = $_GET['delete'];
  $deleteQuery = $conn->prepare("DELETE FROM book_info WHERE bid = ?");
  $deleteQuery->bind_param("s", $deleteId);
  if ($deleteQuery->execute()) {
      $messages[] = "Book deleted successfully!";
  } else {
      $messages[] = "Failed to delete the book!";
  }
  $deleteQuery->close();
}

// Handle update request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_book'])) {
  $updateId = $_POST['update_id'];
  $updateName = mysqli_real_escape_string($conn, $_POST['update_name']);
  $updateTitle = mysqli_real_escape_string($conn, $_POST['update_title']);
  $updatePublishedDate = mysqli_real_escape_string($conn, $_POST['update_published_date']);
  $updateDescription = mysqli_real_escape_string($conn, $_POST['update_description']);
  $updatePrice = (float)$_POST['update_price'];
  $updateCategory = mysqli_real_escape_string($conn, $_POST['update_category']);

  $updateQuery = $conn->prepare(
      "UPDATE book_info SET name = ?, title = ?, published_date = ?, description = ?, price = ?, category = ? WHERE bid = ?"
  );
  $updateQuery->bind_param("ssssiss", $updateName, $updateTitle, $updatePublishedDate, $updateDescription, $updatePrice, $updateCategory, $updateId);

  if ($updateQuery->execute()) {
      $messages[] = "Book updated successfully!";
  } else {
      $messages[] = "Failed to update the book!";
  }
  $updateQuery->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        form {
            margin: 20px 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background: #0056b3;
        }
        .messages {
            color: red;
            margin-bottom: 20px;
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
            padding: 10px;
            text-align: left;
        }
        th {
            background: #f4f4f4;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 8px;
            z-index: 1000;
        }
        .popup.active {
            display: block;
        }
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        .popup-overlay.active {
            display: block;
        }
    </style>
</head>
<body>
<?php include'admin_header.php';?>
    <div class="container">
        <h1>Book Management</h1>

        <?php if (!empty($messages)): ?>
            <div class="messages">
                <?php foreach ($messages as $message): ?>
                    <p><?= htmlspecialchars($message) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Add Book Form -->
        <h2>Add a New Book</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="bid">ISBN:</label>
                <input type="text" name="bid" id="bid" required>
            </div>
            <div class="form-group">
                <label for="bname">Book Name:</label>
                <input type="text" name="bname" id="bname" required>
            </div>
            <div class="form-group">
                <label for="btitle">Author:</label>
                <input type="text" name="btitle" id="btitle" required>
            </div>
            <div class="form-group">
                <label for="bpublished_date">Published Date:</label>
                <input type="date" name="bpublished_date" id="bpublished_date" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" required>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-Fiction">Non-Fiction</option>
                    <option value="Biography">Biography</option>
                    <option value="Science">Science</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="bdesc">Description:</label>
                <textarea name="bdesc" id="bdesc" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <button type="submit" name="add_books">Add Book</button>
            </div>
        </form>

        <!-- Display Books -->
        <?php foreach ($messages as $msg): ?>
        <div class="message" id="messages"><span><?= htmlspecialchars($msg); ?></span></div>
    <?php endforeach; ?>

    <section class="show-products">
        <div class="box-container">
            <?php
            $stmt = $conn->prepare("SELECT * FROM book_info ORDER BY date DESC");
            if ($stmt) {
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($book = $result->fetch_assoc()) {
                        ?>
                        <div class="box">
                            <img class="books_images" src="added_books/<?= htmlspecialchars($book['image']); ?>" alt="Book Image">
                            <div class="name">Author: <?= htmlspecialchars($book['title']); ?></div>
                            <div class="name">Name: <?= htmlspecialchars($book['name']); ?></div>
                            <div class="price">Price: ₹ <?= htmlspecialchars($book['price']); ?>/-</div>
                            <button class="update_btn" onclick="openUpdatePopup(<?= htmlspecialchars(json_encode($book)); ?>)">Update</button>
                            <a href="add_books.php?delete=<?= htmlspecialchars($book['bid']); ?>" class="delete_btn" onclick="return confirm('Delete this book?');">Delete</a>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="empty">No books found!</p>';
                }
                $stmt->close();
            }
            ?>
        </div>
    </section>

    <!-- Update Pop-up -->
    <div class="popup-overlay" id="popup-overlay"></div>
    <div class="popup" id="update-popup">
        <form action="" method="POST">
            <h3>Update Book</h3>
            <input type="hidden" name="update_id" id="update-id">
            <input type="text" name="update_name" id="update-name" class="box" required placeholder="Enter Book Name">
            <input type="text" name="update_title" id="update-title" class="box" required placeholder="Enter Author Name">
            <input type="text" name="update_published_date" id="update-published-date" class="box" required placeholder="Enter Published Date">
            <select name="update_category" id="update-category" class="box" required>
                <option value="Adventure">Adventure</option>
                <option value="Magic">Magic</option>
                <option value="Knowledge">Knowledge</option>
            </select>
            <textarea name="update_description" id="update-description" class="box" required placeholder="Enter book description"></textarea>
            <input type="number" name="update_price" id="update-price" class="box" required placeholder="Enter book price" min="0">
            <input type="submit" value="Update" name="update_book" class="btn">
            <button type="button" class="btn" onclick="closePopup()">Cancel</button>
        </form>
    </div>

    <script>
        function openUpdatePopup(book) {
            document.getElementById('update-id').value = book.bid;
            document.getElementById('update-name').value = book.name;
            document.getElementById('update-title').value = book.title;
            document.getElementById('update-published-date').value = book.published_date;
            document.getElementById('update-category').value = book.category;
            document.getElementById('update-description').value = book.description;
            document.getElementById('update-price').value = book.price;

            document.getElementById('popup-overlay').classList.add('active');
            document.getElementById('update-popup').classList.add('active');
        }

        function closePopup() {
            document.getElementById('popup-overlay').classList.remove('active');
            document.getElementById('update-popup').classList.remove('active');
        }
    </script>
    </div>
</body>
</html>

