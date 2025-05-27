<?php
require 'config.php';

// Pre-fill email if coming from send_otp.php
$email = isset($_GET['email']) ? trim($_GET['email']) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        body {
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
            width: 550px;
            margin: 150px auto;
            padding: 20px;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }

        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #c30010;
            border-radius: 4px;
            text-align: center;
            font-size: 20px;
            color: #c30010;
        }

        .otp-box {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            margin: 5px;
            border: 2px solid #c30010;
            border-radius: 5px;
        }

        .otp-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
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
    </style>
</head>

<body>
    <img src="assets/verify.png" alt="Verify_OTP" width="150" height="150">
    <h2>Verify Your OTP</h2>
    <h3>Your OTP is already sent to your gmail. Please check your gmail</h3>
    <form action="verify_otp.php" method="POST">
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required readonly><br>
        <div class="otp-container">
            <input type="text" name="otp1" class="otp-box" maxlength="1" required>
            <input type="text" name="otp2" class="otp-box" maxlength="1" required>
            <input type="text" name="otp3" class="otp-box" maxlength="1" required>
            <input type="text" name="otp4" class="otp-box" maxlength="1" required>
            <input type="text" name="otp5" class="otp-box" maxlength="1" required>
            <input type="text" name="otp6" class="otp-box" maxlength="1" required>
        </div>
        <button type="submit">Verify</button>
    </form>
</body>

</html>