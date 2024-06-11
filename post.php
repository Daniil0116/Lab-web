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
    <link rel="stylesheet" href="./static/styles/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
</head>


<body>
    <header class="wrapper">
        <nav class="inside_box">
            <div class="logo">
                <a class="to-home" href='/home'><img src="http://localhost:8001/static/images/Escape_Head.svg" alt="logo-Escape"></a>
            </div>
            <div class="navigation">
                <button class="burger"><input type="checkbox" id="burger-checkbox" class="burger-checkbox"></button>
                <ul class="spisok">
                    <li class="nav_element"><a href='/home' class="no_lines">HOME</a></li>
                    <li class="nav_element"><a href="#!" class="no_lines">CATEGORIES</a></li>
                    <li class="nav_element"><a href="#!" class="no_lines">ABOUT</a></li>
                    <li class="nav_element"><a href="#!" class="no_lines">CONTACT</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="main">
        <div class="title_all">
            <h1 class="headline"><?= $post['title'] ?></h1>
            <h2 class="annotation"><?= $post['subtitle'] ?></h2>
        </div>
        <img class="lights_png" src="<?= $post['image_url'] ?>" alt="<?= $post['title'] ?>">
        <div class="text_frame">
            <p class="main_text"><?= $post['content'] ?></p>
        </div>
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
                    <div class="vorona">
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

</html>