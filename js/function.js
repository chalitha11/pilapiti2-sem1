// Function to show the login popup
function showLoginPopup() {
    document.getElementById('loginPopup').style.display = 'flex';
}

// Function to close the login popup
function closeLoginPopup() {
    document.getElementById('loginPopup').style.display = 'none';
}

// Function to redirect to login page (you can replace the URL with your login page)
function redirectToLogin() {
    window.location.href = 'login.php'; // Update this URL to your login page
}

// Function to redirect to login page
function redirectToLogin() {
    window.location.href = 'login.php'; // Path to your login page file
}

function redirectToCreateAccount() {
    closeLoginPopup(); // Close the popup
    window.location.href = 'register.php'; // Redirect to the Create Account page
}




