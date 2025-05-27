<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Update SQL to include email and default values
    $stmt = $conn->prepare("INSERT INTO users_accounts (username, email, password, verified, created_at) VALUES (?, ?, ?, 0, NOW())");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Registration successful! Please Log in.";
    } else {
        echo "Error:" . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body {
            width: 550px;
            margin: 150px auto;
            padding: 20px;
            text-align: center;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #c30010;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff2c2c;
        }

        p {
            text-align: center;
        }
    </style>
    <img src="assets/check.png" alt="verify_email" width="150" height="150">
    <form action="index.php" method="post">
        <p>Hello Congratulations to Sign Up. Please Verify your Email Address.</p>
        <button type="submit">Verify</button>
    </form>
</body>
</html>