<?php

use app\mvc\controllers\Login;

$login = new Login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= PUBLIC_PATH . './assets/img/iconlogo.png' ?>" />
    <title><?= 'Shirley | ' . htmlspecialchars($params['title']) ?></title>

    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;1,200;1,300;1,400&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <?php if (is_array($params['css'])) : ?>
        <?php foreach ($params['css'] as $key => $value) : ?>
            <link rel="stylesheet" href="<?= $this->getCss($value) ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="header_top">
                <marquee behavior="" direction="left" scrollAmount="" scrollDelay="">
                    <ul class="block_icons">
                        <li class="block_icon">
                            <i class="icon fa fa-phone-square"></i>
                            <span class="noti" style="font-weight: 700;">+20-800-33-000</span>
                        </li>
                        <li class="block_icon">
                            <i class="icon fa-solid fa-location-dot"></i>
                            <span class="noti" style="font-weight: 400;">3/2 DAI HOC CAN THO</span>
                        </li>
                        <li class="block_icon">
                            <i class="icon fa-solid fa-clock"></i>
                            <span class="noti" style="font-weight: 400;">Monday-Sunday 9:00 - 23:00</span>
                        </li>
                    </ul>

                </marquee>
            </div>
            <div class="header_nav">
                <div class="row">
                    <div class="offset-lg-1 col-lg-2 logo">
                        <a href="<?= BASE_URL . "/" ?>"><img src=" <?= PUBLIC_PATH . '/assets/img/logoshirley.avif' ?>" alt=""></a>
                    </div>
                    <div class="col-lg-6 nav_search">
                        <input type="text" class="input-search" placeholder="Search Our Store...">
                        <button class="icon-search"><i class="fa-solid fa-magnifying-glass "></i></button>
                    </div>
                    <div class="col-lg-2 nav_icon">
                        <div class="nav_user">
                            <button><i class="fa fa-user icon-u"></i></button>
                            <ul class="user_list">
                                <li class="user_item <?= $params['page'] === 'cart' ? 'active' : '' ?>">
                                    <a href="<?= BASE_URL . "/cart" ?>" class="user_link">Cart</a>
                                </li>
                                <?php if (!$login->isUserLoginClient()) : ?>
                                    <li class="user_item <?= $params['page'] === 'login' ? 'active' : '' ?>">
                                        <a href="<?= BASE_URL . "/login" ?>" class="user_link">Login</a>
                                    </li>
                                    <li class="user_item <?= $params['page'] === 'register' ? 'active' : '' ?>">
                                        <a href="<?= BASE_URL . "/register" ?>" class="user_link">Register</a>
                                    </li>
                                <?php else : ?>

                                    <li class="user_item <?= $params['page'] === 'bill' ? 'active' : '' ?>">
                                        <a href="<?= BASE_URL . "/bill" ?>" class="user_link">Bill</a>
                                    </li>

                                    <li class="user_item">
                                        <a href="<?= BASE_URL . "/logout" ?>" class="user_link">Log out</a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                        <span>Account</span>
                    </div>
                </div>
            </div>
            <!-- mobile -->
            <div class="header_nav_mobile">
                <div class="logo">
                    <a href="index.html"><img src="<?= PUBLIC_PATH . '/assets/img/logoshirley.avif' ?>" alt=""></a>
                </div>
                <div class="navbar">
                    <form action="<?= BASE_URL . '/product?search=' ?>" method="get" class="nav_search">
                        <input type="text" name="search" class="input-search" placeholder="Search Our Store...">
                        <button class="icon-search"><i class="fa-solid fa-magnifying-glass "></i></button>
                    </form>
                    <div class="nav_icon">
                        <div class="nav_user">
                            <button><i class="fa fa-user icon-u"></i></button>
                            <ul class="user_list">
                                <li class="user_item">
                                    <a href="<?= BASE_URL . "/login" ?>" class="user_link">Login</a>
                                </li>
                                <li class="user_item">
                                    <a href="<?= BASE_URL . "/register" ?>" class="user_link">Register</a>
                                </li>
                                <li class="user_item">
                                    <a href="<?= BASE_URL . "/account" ?>" class="user_link">My Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>