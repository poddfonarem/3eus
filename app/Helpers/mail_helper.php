<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $body): bool
{

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = config('mailer.host');
        $mail->SMTPAuth = true;
        $mail->Username = config('mailer.username');
        $mail->Password = config('mailer.password');
        $mail->SMTPSecure = config('mailer.encryption');
        $mail->Port = config('mailer.port');

        $mail->setFrom(config('mailer.from_email'), config('mailer.from_name'));
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail error: {$mail->ErrorInfo}");
        return false;
    }
}
