<?php

require_once "connection.php";

function getFeaturedPostsFromDB(mysqli $conn): void
{
    $sql = "SELECT * FROM post WHERE featured=1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            include 'post_preview.php';
        }
    } else {
        echo "0 results";
    }
}

function getMostRecentPostsFromDB(mysqli $conn): void
{
    $sql = "SELECT * FROM post WHERE featured=0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            include 'posts_recent-preview.php';
        }
    } else {
        echo "0 results";
    }
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's do it together.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./static/styles/style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: rgba(247, 247, 247, 1);
        }
    </style>
</head>

<body>
    <header>
        <div class="banner">
            <div class="header">
                <div class="header__logo">
                    <a class="to-home" href='/home'><img src="http://localhost:8001/static/images/Escape_End.svg" alt="logo-Escape"></a>
                </div>
                <nav class="navigation">
                    <ul class="navigation__list">
                        <li class="navigation__item">
                            <a class="navigation__link" href="#">Home</a>
                        </li>
                        <li class="navigation__item">
                            <a class="navigation__link" href="#">Categories</a>
                        </li>
                        <li class="navigation__item">
                            <a class="navigation__link" href="#">About</a>
                        </li>
                        <li class="navigation__item">
                            <a class="navigation__link" href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="block-intro container">
                <h1 class="block-intro__tittle">Let's do it together.</h1>
                <h2 class="block-intro__subtittle">We travel the world in search of stories. Come along for the ride.
                </h2>
                <a class="block-intro__button" href="#">View Latest Posts</a>
            </div>
        </div>
    </header>
    <main>
        <div class="block-discription">
            <div class="block-discription__discription">
                <ul class="discription__list">
                    <li class="discription__item">
                        <a class="discription__link" href="#">Nature</a>
                    </li>
                    <li class="discription__item">
                        <a class="discription__link" href="#">Photography</a>
                    </li>
                    <li class="discription__item">
                        <a class="discription__link" href="#">Relaxation</a>
                    </li>
                    <li class="discription__item">
                        <a class="discription__link" href="#">Vacation</a>
                    </li>
                    <li class="discription__item">
                        <a class="discription__link" href="#">Travel</a>
                    </li>
                    <li class="discription__item">
                        <a class="discription__link" href="#">Adventure</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="block-feature">
            <h3 class="block-feature__tittle">Featured Posts</h3>
            <hr class="block-future__line">
            <div class="block-future__content-block1">
                <?php
                $conn = createDBConnection();
                getFeaturedPostsFromDB($conn);
                closeDBConnection($conn);
                ?>
            </div>
        </div>
        <div class="block-most">
            <h4 class="block-most__tittle">Most Recent</h4>
            <hr class="block-most__line">
            <div class="block-most__content-block2">
                <?php
                $conn = createDBConnection();
                getMostRecentPostsFromDB($conn);
                closeDBConnection($conn);
                ?>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-form">
            <h5 class="footer-form__title">Stay in Touch</h5>
            <hr class="footer-form__line">
            <div class="footer-form__input">
                <form action="#" method="GET"></form>
                <input type="email" name="email" placeholder="Enter your email address" required>
                <button class="input__button" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="footerColor">
            <div class="ContainerEnd">
                <div class="footer__inner">
                    <div class="footer__logo">
                        <a class="to-home" href='/home'><img src="http://localhost:8001/static/images/Escape_End.svg" alt="logo-Escape"></a>
                    </div>
                    <nav class="navigation">
                        <ul class="navigation__list">
                            <li class="navigation__item">
                                <a class="navigation__link" href="/home">Home</a>
                            </li>
                            <li class="navigation__item">
                                <a class="navigation__link" href="#">Categories</a>
                            </li>
                            <li class="navigation__item">
                                <a class="navigation__link" href="#">About</a>
                            </li>
                            <li class="navigation__item">
                                <a class="navigation__link" href="#">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</body>