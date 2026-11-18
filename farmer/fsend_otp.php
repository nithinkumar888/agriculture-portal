
<?php
session_start();
require('../sql.php');

if (!isset($_SESSION['farmer_login_user'])) {
    echo "not exist";
    exit;
}

$email = $_SESSION['farmer_login_user'];

// Find the farmer using a prepared statement
$stmt = mysqli_prepare($conn, "SELECT email FROM farmerlogin WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    $otp = random_int(11111, 99999);

    // Save OTP in the database
    $update = mysqli_prepare($conn, "UPDATE farmerlogin SET otp = ? WHERE email = ?");
    mysqli_stmt_bind_param($update, "is", $otp, $email);
    mysqli_stmt_execute($update);

    $html = "Your OTP verification code for Agriculture Portal is " . $otp;

    if (smtp_mailer($email, 'OTP Verification', $html)) {
        echo "yes";
    } else {
        // Clear OTP if email could not be sent
        $clear = mysqli_prepare($conn, "UPDATE farmerlogin SET otp = NULL WHERE email = ?");
        mysqli_stmt_bind_param($clear, "s", $email);
        mysqli_stmt_execute($clear);

        echo "mail error";
    }

} else {
    echo "not exist";
}


function smtp_mailer($to, $subject, $msg) {

    require_once("../smtp/class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';

    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;

    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';

    // Add your real Gmail SMTP credentials securely later
    $mail->Username = "";
    $mail->Password = "";

    $mail->SetFrom("agricultureportal01@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    if (!$mail->Send()) {
        return false;
    }

    return true;
}
?>
