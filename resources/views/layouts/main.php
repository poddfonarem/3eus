<!doctype html>
<html lang="uk">
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
    <meta name="version" content="<?= config('app.version') ?>"/>
    <meta name="author" content="<?= config('app.creator') ?>"/>
    <meta name="copyright" lang="uk" content=""/>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link href="<?= config('app.favicon') ?>" rel="shortcut icon"/>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <title><?= $h1_content ?? '' ?></title>
</head>
<body>
<?php require_once __DIR__ . "/alertSystem.php" ?>
<header class="site-navbar" role="banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 d-flex justify-content-between align-items-center bg-black">
                <div class="site-logo">
                    <a href="/" class="navbar-brand text-lowercase">
                        <?= config('app.name') ?>
                        <span class="text-yellow pl-2 text-capitalize">Starter</span>
                    </a>
                </div>
                <nav class="navbar navbar-expand-lg mobile">
                    <div class="collapse navbar-collapse show">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="https://github.com/<?= config('app.creator') ?>/<?= config('app.name') ?>/tree/main/docs"
                                   class="nav-link">
                                    Docs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/<?= config('app.creator') ?>/<?= config('app.name') ?>/tree/main"
                                   class="nav-link">
                                    Files
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/<?= config('app.creator') ?>/<?= config('app.name') ?>/blob/main/README.md"
                                   class="nav-link">
                                    Instruction
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"
                                   class="nav-link">
                                    Report
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<?= $content ?? '' ?>
<footer class="site-footer">
    <div class="container">
        <div class="row pt-2 mt-2 text-center">
            <div class="col-md-12">
                <div class="pt-3 bg-black pb-1">
                    <p>
                        Copyright &copy; <?= config('app.name') . " " . date('Y') ?> | All rights reserved
                        <br>
                        Created by <?= config('app.creator') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="/assets/js/main.js"></script>
</body>
</html>