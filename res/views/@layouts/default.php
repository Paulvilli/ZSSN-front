<?php

use function Francerz\Http\Utils\baseUrl;
use function Francerz\Http\Utils\siteUrl;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= baseUrl('/assets/bootstrap/css/bootstrap.min2.css') ?>">
    <title><?= $title ?? 'Website' ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg head">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= siteUrl() ?>"><img style="width: 50px;" src="<?= baseUrl("\assets\img\logo.png") ?>" alt="MDN" />  ZSSN</a>
        </div>
    </nav>
    <?= $layout->section('content') ?>
</body>

<footer>
    <!-- bootstrap and popper js -->
    <script src="<?= baseUrl('/assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</footer>

</html>