<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php'; 
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $otp = rand(100000, 999999);
    $otp_expiry = date("Y-m-d H:i:s", strtotime("+5 minutes"));

    // Update existing record instead of deleting
    $sql = "UPDATE users_accounts SET otp_code = ?, otpCode_expire = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $otp, $otp_expiry, $email);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        sendOtpEmail($email, $otp);
        header("Location: verify.php?email=".urlencode($email));
        exit();
    } else {
        echo "Error: No user found with that email";
    }
}

function sendOtpEmail($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'fwizard0719@gmail.com';
        $mail->Password   = 'clnl ohtf njzq wgyy';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('fwizard0719@gmail.com', 'OTP VERIFICATION');
        $mail->addAddress($email);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP code is: <b>$otp</b><br><br>
                          The code will expire in 5 minutes.<br>
                          <a href='http://localhost/Exercise2/verify.php?email=".urlencode($email)."'>Click here to verify</a>";

        if ($mail->send()){
            echo "Message sent successfully";
        }else {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>