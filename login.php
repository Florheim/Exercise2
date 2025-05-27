<?php
require 'config.php';

// Check if user is verified
if (isset($_GET['email'])) {
    $email = trim($_GET['email']);
    $check_sql = "SELECT verified FROM users_accounts WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0 && $result->fetch_assoc()['verified'] == 1) {
        // User is verified - show login form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/style.css">
            <title>Login</title>
        </head>
        <body>
            <h2>Welcome!</h2>
            <p>Your email <?php echo htmlspecialchars($email); ?> has been verified.</p>
            <a href="login.html"><button>Login</button></a>
        </body>
        </html>
        <?php
    } else {
        header("Location: welcome_msg.php");
        exit();
    }
} else {
    header("Location: welcome_msg.php");
    exit();
}
?>