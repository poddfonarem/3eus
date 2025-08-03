<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">
    <meta name="description" content=""/>
    <meta name="robots" content="index, follow"/>
    <meta name="google" content="index, follow"/>
    <meta name="googlebot" content="index, follow"/>
    <meta name="slurp" content="index, follow"/>
    <meta name="bingbot" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="author" content="vitaliy_0702"/>
    <meta name="copyright" lang="ru" content=""/>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link href="/assets/images/logo.png" rel="shortcut icon"/>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <title><?=$h1_content ?? ''?></title>
</head>
<body>
<?php require_once __DIR__ . "/alertSystem.php" ?>
<header class="site-navbar" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-12">
                <div class="site-logo">
                    <a href="/">MVC <span class="text-yellow pl-2">Starter</span></a>
                </div>
            </div>
        </div>
    </div>
</header>
<?= $content ?? '' ?>
<footer class="site-footer">
    <div class="container">
        <div class="row pt-2 mt-2 text-center">
            <div class="col-md-12">
                <div class="border-top pt-2">
                    <p>
                        Copyright &copy; MVC Starter <?=date('Y')?>
                        | All rights reserved
                        <br>
                        Created by poddfonarem
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="/assets/js/main.js"></script>
</body>
</html>