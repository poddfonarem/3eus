# 📧 3eus Starter — Mail Integration Guide (v2.1)

This document explains how to use **PHPMailer** in your 3eus Starter project.

---

## ⚙️ 1. Installation

Install PHPMailer via Composer:

```bash
composer require phpmailer/phpmailer
```

---

## 🧩 2. Configuration

Create or update your `.env` file with SMTP credentials:

```env
MAIL_ENABLE=on
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_EMAIL=your_email@gmail.com
MAIL_FROM_NAME="3eus Starter"
```

Then, create the file `config/mail.php`:

```php
<?php
return [
    'enabled'     => getenv('MAIL_ENABLE') === 'on',
    'host'        => getenv('MAIL_HOST'),
    'username'    => getenv('MAIL_USERNAME'),
    'password'    => getenv('MAIL_PASSWORD'),
    'port'        => getenv('MAIL_PORT'),
    'encryption'  => getenv('MAIL_ENCRYPTION'),
    'from_email'  => getenv('MAIL_FROM_EMAIL'),
    'from_name'   => getenv('MAIL_FROM_NAME'),
];
```

---

## 🛠 3. Helper Setup (`app/helpers/mail_helper.php`)

```php
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

function sendMail($to, $subject, $body)
{
    $config = require __DIR__ . '/../../config/mail.php';
    if (!$config['enabled']) return false;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = $config['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $config['username'];
        $mail->Password   = $config['password'];
        $mail->SMTPSecure = $config['encryption'];
        $mail->Port       = $config['port'];

        $mail->setFrom($config['from_email'], $config['from_name']);
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail error: {$mail->ErrorInfo}");
        return false;
    }
}
```

---

## 📤 4. Controller Example (`app/controllers/MailController.php`)

```php
<?php

class MailController
{
    public function send()
    {
        require_once __DIR__ . '/../helpers/mail_helper.php';

        $to = 'client@example.com';
        $subject = 'Тест листа';
        $body = '<h1>Привіт!</h1><p>Це тестовий лист від PHP Mailer.</p>';

        if (sendMail($to, $subject, $body)) {
            echo '✅ Лист успішно надіслано!';
        } else {
            echo '❌ Помилка при надсиланні листа.';
        }
    }
}
```

---

## 🌐 5. Routing (`routes/web.php`)

```php
$router->get('/send-mail', 'MailController@send');
```

Visit `http://localhost:8000/send-mail` to test email delivery.

---

## 🧩 6. Troubleshooting

* Ensure less secure app access is enabled for Gmail or use an App Password.
* Check your `.env` file for typos or missing values.
* Verify that your firewall or antivirus doesn’t block outgoing SMTP connections.
* Use `error_log()` or `var_dump($mail->ErrorInfo)` to debug sending issues.

---

## 🏁 Done!

Your 3eus Starter project is now **email-ready** 🎉
You can extend this functionality to send contact forms, password resets, order confirmations, and more.
