```php
<?php

require_once("class.phpmailer.php");

function smtp_mailer($to, $subject, $msg) {

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';

    $mail->Host = "";
    $mail->Port = 465;

    $mail->IsHTML(true);

    // Add your SMTP credentials later using secure configuration
    $mail->Username = "";
    $mail->Password = "";

    $mail->SetFrom("enquiry@marchingants.net");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message has been sent";
    }
}

?>
```