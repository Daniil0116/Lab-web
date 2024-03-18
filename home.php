<?php
$posts = [
    [
        
        'tittle' => 'The Road Ahead',
        'subtittle' => 'The road ahead might be paved - it might not be.',
        
        'author' => 'Mat Vogels',
        'date' => 'September 25, 2015',
        // другие свойства этого поста
    ],
    [
        
        'tittle' => 'From Top Down',
        'subtittle' => 'Once a year, go someplace you’ve never been before.',
        
        'author' => 'William Wong',
        'date' => 'September 25, 2015',
        // свойства второго поста
    ],
];
?>

<!DOCTYPE html>
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
                    <img src="images/Escape_End.svg" alt="Логотип-Escape">
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
                foreach ($posts as $post) {
                    include 'post_preview.php';
                }
                ?>
            </div>
        </div>
        <div class="block-most">
            <h4 class="block-most__tittle">Most Recent</h4>
            <hr class="block-most__line">
            <div class="block-most__content-block2">
                <a class="content-block2__article" href="#">
                    <img src="/static/images/image_article3.svg" alt="balloon">
                    <div class="block-most__main">
                        <div class="most-article__tittle">Still Standing Tall</div>
                        <div class="most-article__subtittle">Life begins at the end of your comfort zone.</div>
                    </div>
                    <div class="most-article__information">
                        <div class="most-article__author">
                            <img src="/static/images/William_Wong.svg" alt="Mat_Vogels">
                            <div class="most-article__name">William Wong</div>
                        </div>
                        <div class="most-article__date">9/25/2015</div>
                    </div>
                </a>
                <a class="content-block2__article" href="#">
                    <img src="/static/images/image_article4.svg" alt="bridge">
                    <div class="block-most__main">
                        <div class="most-article__tittle">Sunny Side Up</div>
                        <div class="most-article__subtittle">No place is ever as bad as they tell you it’s going to be.
                        </div>
                    </div>
                    <div class="most-article__information">
                        <div class="most-article__author">
                            <img src="/static/images/Mat_Vogels.svg" alt="Mat_Vogels">
                            <div class="most-article__name">Mat Vogels</div>
                        </div>
                        <div class="most-article__date">9/25/2015</div>
                    </div>
                </a>
                <a class="content-block2__article" href="#">
                    <img src="/static/images/image_article5.svg" alt="dawn">
                    <div class="block-most__main">
                        <div class="most-article__tittle">Water Falls</div>
                        <div class="most-article__subtittle">We travel not to escape life, but for life not to escape
                            us.
                        </div>
                    </div>
                    <div class="most-article__information">
                        <div class="most-article__author">
                            <img src="/static/images/Mat_Vogels.svg" alt="Mat Vogels">
                            <div class="most-article__name">Mat Vogels</div>
                        </div>
                        <div class="most-article__date">9/25/2015</div>
                    </div>
                </a>
                <a class="content-block2__article" href="#">
                    <img src="/static/images/image_article6.svg" alt="Ocean">
                    <div class="block-most__main">
                        <div class="most-article__tittle">Through the Mist</div>
                        <div class="most-article__subtittle">Travel makes you see what a tiny place you occupy in the
                            world.</div>
                    </div>
                    <div class="most-article__information">
                        <div class="most-article__author">
                            <img src="/static/images/William_Wong.svg" alt="William Wong">
                            <div class="most-article__name">William Wong</div>
                        </div>
                        <div class="most-article__date">9/25/2015</div>
                    </div>
                </a>
                <a class="content-block2__article" href="#">
                    <img src="/static/images/image_article7.svg" alt="fog">
                    <div class="block-most__main">
                        <div class="most-article__tittle">Awaken Early</div>
                        <div class="most-article__subtittle">Not all those who wander are lost.</div>
                    </div>
                    <div class="most-article__information">
                        <div class="most-article__author">
                            <img src="/static/images/Mat_Vogels.svg" alt="Mat Vogels">
                            <div class="most-article__name">Mat Vogels</div>
                        </div>
                        <div class="most-article__date">9/25/2015</div>
                    </div>
                </a>
                <a class="content-block2__article" href="#">
                    <img src="/static/images/image_article8.svg" alt="Waterfall">
                    <div class="block-most__main">
                        <div class="most-article__tittle">Try it Always</div>
                        <div class="most-article__subtittle">The world is a book, and those who do not travel read only
                            one page.</div>
                    </div>
                    <div class="most-article__information">
                        <div class="most-article__author">
                            <img src="/static/images/Mat_Vogels.svg" alt="Mat Vogels">
                            <div class="most-article__name">Mat Vogels</div>
                        </div>
                        <div class="most-article__date">9/25/2015</div>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footerColor">
            <div class="ContainerEnd">
                <div class="footer__inner">
                    <div class="footer__logo">
                        <img src="/static/images/Escape_End.svg" alt="logo-Escape">
                    </div>
                    <nav class="nav">
                        <a class="navEnd" href="index.html">Home</a>
                        <a class="navEnd" href="#">Categories</a>
                        <a class="navEnd" href="#">About</a>
                        <a class="navEnd" href="#">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>