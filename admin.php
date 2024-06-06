<?php
const HOST = 'localhost';
const USERNAME = 'DaniilAdmin';
const PASSWORD = 'Dan13586';
const DATABASE = 'blog';

function authBySession()
{
    session_name('auth');
    session_start();
    if (!(array_key_exists('user_id', $_SESSION))) {
        header('HTTP/1.1 401 Unauthorized');
        die();
    }
}
authBySession();

function createDBConnection(): mysqli
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeDBConnection(mysqli $conn): void
{
    $conn->close();
}

function getUserEmailById(mysqli $conn, int $id): string
{
    $query = "SELECT email FROM user WHERE user_id = '$id'";
    $result = $conn->query($query);
    $result->num_rows;
    $row = $result->fetch_assoc();
    $email = $row['email'];
    return $email;
}
$conn = createDBConnection();
$email = getUserEmailById($conn, $_SESSION['user_id']);
closeDBConnection($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escape.admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            background: rgba(247, 247, 247, 1);
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header__block">
            <div class="block__logo">
                <img src="images/Escape_Admin_author.png" alt="logo-Escape">
                <div class="logo__author">author</div>
            </div>
            <div class="block__user">
                <div class="user__photo"><img src="images/Avatar.png" alt="Avatar"></div>
                <button type="submit" id="exit-button" class="user__exit"><img src="images/exit_button.png" alt="exit"></button>
            </div>
        </div>
    </header>
    <main>
        <div class="block_publich">
            <div class="block_publich__block_title">
                <h1 class="block_title__title">New Post</h1>
                <div class="block_title__subtitle">Fill out the form bellow and publish your article</div>
            </div>
            <button type="submit" name="submit" class="block_publich__button" form="add_post">Publish</button>
        </div>
        <div class="publish_message-error" id="publish_message-error">
            <img src="/images/message-error.svg">
            <div class="publish_message-error__text">Whoops! Some fields need your attention :o</div>
        </div>
        <div class="publish_message-complete" id="publish_message-complete">
            <img src="/images/massage-complete.svg">
            <div class="publish_message-complete__text">Publish Complete!</div>
        </div>
        <div class="block_main">
            <h2 class="block_main__title">Main Information</h2>
            <div class="block_main__block_loading">
                <div class="block_new-post__info">
                    <form action="#" method="post" id="add_post" name="add_post">
                        <label for="title_input" class="info__title">Title</label>
                        <input type="text" class="title_input" id="title_input" name="title_input" maxlength="30" placeholder="New Post">
                        <div class="title_input_error" id="title_input_error"></div>
                        <label for="Short_description" class="info__title">Short description</label>
                        <input type="text" class="Short_description" id="Short_description" name="Short_description" maxlength="70" placeholder="Please, enter any description">
                        <div class="Short_description_error" id="Short_description_error"></div>
                        <label for="Author_name" class="info__title">Author name</label>
                        <input type="text" class="Author_name" id="Author_name" name="Author_name" placeholder="Enter author name">
                        <div class="Author_name_error" id="Author_name_error"></div>
                        <div class="info__title">Author Photo</div>
                        <div class="author-photo" id="author-photo">
                            <img class="author-photo__preview" id="author-photo__preview" />
                            <label for="Author_Photo" class="author-photo__input" id="input_author-photo">
                                <input type="file" id="Author_Photo" name="Author_Photo" accept="image/jpeg, image/png, image/gif, image\svg">
                                <div class="input__upload" id="input__upload">
                                    <img class="upload__photo" id="author_photo" src="images/input_camera.svg">
                                    <img class="upload__text" id="upload__text" src="/images/upload_new.svg">
                                </div>
                            </label>
                            <button class="delete_authorPhoto" id="delete_authorPhoto">
                                <img src="/images/remove_img.svg">
                                <img src="/images/remove_text.svg">
                            </button>
                        </div>
                        <div class="Author_Photo_error" id="Author_Photo_error"></div>
                        <label for="Publish_Date" class="info__title">Publish Date</label>
                        <input type="date" class="Publish_Date" id="Publish_Date" name="Publish_Date" placeholder="">
                        <div class="Publish_Date_error" id="Publish_Date_error"></div>
                        <div class="info__title">Hero Image</div>
                        <img class="input_hero-image1__preview" id='input_hero-image1__preview'>
                        <div class="input_hero-image1_block" id="input_hero-image1_block">
                            <label for="Hero_Image" class="input_hero-image1" id="input_hero-image1">
                                <input type="file" id="Hero_Image" name="Hero_Image" accept="image/jpeg, image/png, image/gif">
                                <div class="input_uploadHero" id="input_uploadHero">
                                    <img class="hero_photo" src="images/input_camera.svg">
                                    <img class="upload_uploadHero1__text" id="upload_uploadHero1__text" src="/images/upload_new.svg">
                                </div>
                            </label>
                            <div class="input_hero-image1_error" id="input_hero-image1_error"></div>
                            <div class="info__subtitle" id="info__subtitle1">Size up to 10mb. Format: png, jpeg, gif.</div>
                            <button class="delete_HeroImage" id="delete_HeroImage1">
                                <img src="/images/remove_img.svg">
                                <img src="/images/remove_text.svg">
                            </button>
                        </div>
                        <div class="info__title">Hero Image</div>
                        <img class="input_hero-image2__preview" id='input_hero-image2__preview'>
                        <div class="input_hero-image2_block" id="input_hero-image2_block">
                            <label for="Hero_Image" class="input_hero-image2" id="input_hero-image2">
                                <input type="file" id="Hero_Image" name="Hero_Image" placeholder="Upload" accept="image/jpeg, image/png, image/gif">
                                <div class="input_uploadHero" id="input_uploadHero">
                                    <img class="hero_photo" src="images/input_camera.svg">
                                    <img class="upload_uploadHero2__text" id="upload_uploadHero2__text" src="/images/upload_new.svg">
                                </div>
                            </label>
                            <div class="input_hero-image2_error" id="input_hero-image2_error"></div>
                            <div class="info__subtitle" id="info__subtitle2">Size up to 5mb. Format: png, jpeg, gif.</div>
                            <button class="delete_HeroImage" id="delete_HeroImage2">
                                <img src="/images/remove_img.svg">
                                <img src="/images/remove_text.svg">
                            </button>
                        </div>
                    </form>
                </div>
                <section class="block_loading__block_preview">
                    <h3 class="block_preview__title">Article preview</h3>
                    <div class="block_preview__external_border">
                        <div class="external_border__internal_border">
                            <div class="internal_border__block_ellipse">
                                <div class="block_ellipse__ellipse"></div>
                                <div class="block_ellipse__ellipse"></div>
                                <div class="block_ellipse__ellipse"></div>
                            </div>
                            <div class="internal_border__preview">
                                <div class="preview__main-info">
                                    <div class="preview__title">New Post</div>
                                    <div class="preview__Short_description">Please, enter any description</div>
                                </div>
                                <div class="preview__Hero_Image"></div>
                                <img src="" alt="" class="preview__card-image">
                            </div>
                        </div>
                    </div>
                    <h4 class="block_preview__title">Post card preview</h4>
                    <div class="block_card-preview">
                        <div class="card-preview__border">
                            <div class="card-preview__Hero_Image"></div>
                            <div class="card-preview__main-info">
                                <div class="main-info__title">New Post</div>
                                <div class="main-info__Short_description">Please, enter any description</div>
                            </div>
                            <div class="block_author-data">
                                <div class="block_author-data__author">
                                    <div class="author__Author_Photo"></div>
                                    <div class="author__Author_name">Enter author name</div>
                                </div>
                                <div class="block_author-data__Publish_Date">гггг-мм-дд</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="block-content">
            <h3 class="block-content__title">Content</h3>
            <form action="#" method="post" id="add_post" name="add_post">
                <div class="info__title">Post content (plain text)</div>
                <textarea class="input_content" id="input_content" name="input_content" placeholder="Type anything you want ..." required></textarea>
                <div class="input_content_error" id="input_content_error"></div>
            </form>
        </div>
    </main>
    <footer></footer>
</body>
<script src="admin_author.js"></script>

</html>