<?php

require_once "connection.php";

function getPostsFromDB(mysqli $conn, int $postId, string $redirectUrl)
{
    $sql = "SELECT * FROM post WHERE post_id = $postId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        header('Location: ' . $redirectUrl, true, 303);
    }
}

$redirectUrl = "/home";
$postId = "не определено";

if (isset($_GET["id"])) {
    $postId = (int)($_GET["id"]);
} else {
    header('Location: ' . $redirectUrl, true, 303);
}

$conn = createDBConnection();
$post = getPostsFromDB($conn, $postId, $redirectUrl);
closeDBConnection($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['title'] ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./static/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <a class="to-home" href='/home'><img src="http://localhost:8001/static/images/Escape_Head.svg" alt="logo-Escape"></a>
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
    </header>
    <main>
        <div class="BlockIntro">
            <h1 class="IntroLora"><?= $post['title'] ?></h1>
            <h2 class="subtittle"><?= $post['subtitle'] ?></h2>
        </div>
        <img class="image" src="<?= $post['image_url'] ?>" alt="<?= $post['title'] ?>">
        <p class="text"><?= $post['content'] ?></p>
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

</html>