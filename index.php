<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
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

        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button:hover {
            background-color: #ff2c2c;
        }

        p {
            text-align: center;
        }
    </style>
    <img src="assets/mail.png" alt="email" width="150" height="150">
    <h2>Enter Your Email</h2>
    <form action="send_otp.php" method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>