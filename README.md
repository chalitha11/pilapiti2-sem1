# BookMart

# A streamlined and user-friendly web application for managing bookstore inventory and facilitating seamless online shopping experiences.

INTRO of the project.
 • A web-based program called the Bookshop Management System was created to make managing books at a store more efficient. 
 • While giving customers a flawless purchasing experience, it gives administrators strong capabilities to manage inventories.
  • Administrators have the ability to add and edit book details, keep an eye on stock levels, and guarantee precise inventory management. 
  • Through an easy checkout process, customers can peruse the books that are offered, add products to their cart, and finish purchases. • This system's user identification, secure stock management, and user-friendly interface make it the perfect choice for effectively running a bookshop.


## Installation

### Prerequisites
- Ensure you have the following installed:
  - PHP (version 7.4 or higher)
  - MySQL
  - Web server (PHPMyadmin)
  - Composer (for dependency management, if required)

### Steps to Install Dependencies
1. Clone this repository to your local machine:
   bash
   git clone <repository_url>
   
2. Navigate to the project directory:
   bash
   cd <project_directory>
   
3. If the project uses Composer, install PHP dependencies:
   bash
   composer install
   

## Database Setup

### Import the Database
1. Open your MySQL client or database management tool (phpMyAdmin).
2. Create a new database:
   sql
   CREATE DATABASE bookmart;
   
3. Import the database dump file provided in the project:
   bash
   mysql -u <username> -p bookmart < path/to/dump_file.sql
   
   Replace <username>, bookmart, and <path/to/dump_file.sql> with your actual values.

### Configuration
1. Locate the configuration file (config.php).
2. Update database connection details:
   php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'bookmart');
   define('DB_USER', '');
   define('DB_PASSWORD', '');
   

## Running the Application
1. Start your web server.
2. Place the project folder in your web server's root directory ( htdocs for XAMPP).
3. Access the application in your browser:
   
   http://localhost/Website
   

## Screencast
A screencast demonstrating the application's key features is included in the project folder as screencast.mp4. Ensure to watch it for an overview of the application functionality.
(https://drive.google.com/file/d/17hRtQgkuYcHXIVoYPFPLX_bWxxvGrHfE/view?usp=share_link)

## Additional Notes
- The project should work as described if the above steps are followed. If you encounter issues, ensure all prerequisites are correctly installed or consult the documentation.

---

### Contact
For any questions or assistance, please contact: 
- pilapiti2@coventry.ac.uk
- Chalitha Pilapitiya





# Features Walkthrough

# Feature 1:
Admin - Manage Stock Levels
Log in as admin.
On the home page, click the Admin Panel button to view or add stock.
Use the Add Stock form to add books with the required details.

# Feature 2: 
View Stock Levels
Displays the list of books with:
Thumbnail image
Title
ISBN-13
Price
Edit and remove the stock

# Feature 3: 
Home Screen and Shopping Cart Icon
Displays books in stock with their titles and thumbnails.
Includes an Add to cart button for each book.
The shopping cart icon shows the count and total cost of items in the cart.

# Feature 4: 
Shopping Cart
Clicking the cart icon displays the cart details:
Books added (title, thumbnail, price, and quantity).
Ability to remove items or cancel the order.

# Feature 5:
 Checkout
Validates  and adjusts total price.
Includes shipping costs: £3 for the first book and £1 for each additional book.
Simulated payment screen.
