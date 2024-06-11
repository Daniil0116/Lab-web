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
    <link rel="stylesheet" href="./static/styles/style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: rgba(247, 247, 247, 1);
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="header__panel">
            <div class="header__logo">
                <a class="to-home" href='/home'><img src="http://localhost:8001/static/images/Escape_End.svg" alt="logo-Escape"></a>
            </div>
            <div class="vorona">
                <button class="burger"><input type="checkbox" id="burger-checkbox" class="burger-checkbox"></button>
                <!-- <label for="burger-checkbox" class="burger"></label> -->
                <ul class="header__panel-navigation">
                    <li class="header__panel-menu"><a href="/home" class="header__menu-link">HOME</a></li>
                    <li class="header__panel-menu"><a href="#!" class="header__menu-link">CATEGORIES</a></li>
                    <li class="header__panel-menu"><a href="#!" class="header__menu-link">ABOUT</a></li>
                    <li class="header__panel-menu"><a href="#!" class="header__menu-link">CONTACT</a></li>
                </ul>
            </div>
        </nav>
        <div class="header__cite-block">
            <h1 class="header__cite">Let's do it together.</h1>
            <div class="header__notion">
                <p class="header__notion">We travel the world in search of stories. Come along for the ride.</p>
            </div>
            <div class="header__button">
                <a href="#!" class="header__menu-link">View Latest Posts</a>
            </div>
        </div>
    </header>
    <main>
        <section class="main-menu">
            <nav class="main-menu__navigation">
                <ul class="main-menu__list">
                    <li class="main-menu__selection"><a href="#!" class="main-menu__link">Nature</a></li>
                    <li class="main-menu__selection"><a href="#!" class="main-menu__link">Photography</a></li>
                    <li class="main-menu__selection"><a href="#!" class="main-menu__link">Relaxation</a></li>
                    <li class="main-menu__selection"><a href="#!" class="main-menu__link">Vacation</a></li>
                    <li class="main-menu__selection"><a href="#!" class="main-menu__link">Travel</a></li>
                    <li class="main-menu__selection"><a href="#!" class="main-menu__link">Adventure</a></li>
                </ul>
            </nav>
        </section>
        <section class="declaration-section">
            <div class="featured-posts">
                <div class="featured-posts__title">
                    <h1 class="featured-posts__caption">Featured Posts</h1>
                    <div class="line"></div>
                </div>
                <div class="featured-posts__block">
                    <?php
                    $conn = createDBConnection();
                    getFeaturedPostsFromDB($conn);
                    closeDBConnection($conn);
                    ?>
                </div>
            </div>
            <div class="recent-posts">
                <div class="recent-posts__title">
                    <h1 class="recent-posts__caption">Most Recent</h1>
                    <div class="line"></div>
                </div>
                <div class="recent-posts__block">
                    <?php
                    $conn = createDBConnection();
                    getMostRecentPostsFromDB($conn);
                    closeDBConnection($conn);
                    ?>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer_block">
        <div class="pre-footer">
            <div class="pre-footer__block">
                <h3 class="pre-footer__cite">Stay in Touch</h3>
                <div class="pre-footer__line"></div>
            </div>
            <div class="pre-footer__input">
                <input class="enter-email" placeholder="Enter your email address">
                <div class="submit"><a class="pre-footer__button">Submit</a></div>
            </div>
        </div>
        <div class="footer_background">
            <div class="footer_list">
                <nav class="footer_nav">
                    <div class="footer_logo">
                        <a href='/home'><img src="http://localhost:8001/static/images/Escape_End.svg" alt="Escape"></a>
                    </div>
                    <div class="footer_nav__spisok">
                        <ul>
                            <li class="down_item"><a href='/home' class="white_lines">HOME</a></li>
                            <li class="down_item"><a href="#!" class="white_lines">CATEGORIES</a></li>
                            <li class="down_item"><a href="#!" class="white_lines">ABOUT</a></li>
                            <li class="down_item"><a href="#!" class="white_lines">CONTACT</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </footer>
</body>