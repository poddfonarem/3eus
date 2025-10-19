<?php

namespace App\Controllers;

class MailController
{
    public function sendMessage(): void
    {
        require_once __DIR__ . '/../helpers/mail_helper.php';

        $to      = 'client@example.com';
        $subject = 'Тест листа';
        $body    = '<h1>Привіт!</h1><p>Це тестовий лист від PHP Mailer.</p>';

        if (sendMail($to, $subject, $body)) {
            $_SESSION['success'] = 'Letter sent!';
        } else {
            $_SESSION['error'] = 'Mail send failed!';
        }
    }
}