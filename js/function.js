
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
// JavaScript to toggle the popup visibility
document.getElementById('user-btn').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default link behavior

    // Toggle the popup visibility
    const popup = document.getElementById('user-popup');
    popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
});

// Hide popup when clicking outside
document.addEventListener('click', function (event) {
    const popup = document.getElementById('user-popup');
    const userButton = document.getElementById('user-btn');

    if (!popup.contains(event.target) && event.target !== userButton) {
        popup.style.display = 'none';
    }
});

// Logout button action to redirect to logout.php
document.getElementById('logout-btn').addEventListener('click', function () {
    window.location.href = 'logout.php'; // Redirect to logout.php
});




