<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escape.author</title>
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
                <button class="user__exit"><img src="images/exit_button.png" alt="exit"></button>
            </div>
        </div>
    </header>
    <main>
        <div class="block_publich">
            <div class="block_publich__block_title">
                <h1 class="block_title__title">New Post</h1>
                <div class="block_title__subtitle">Fill out the form bellow and publish your article</div>
            </div>
            <button class="block_publich__button">Publish</button>
        </div>
        <div class="block_main">
            <h2 class="block_main__title">Main Information</h2>
            <div class="block_main__block_loading">
                <div class="block_new-post__info">
                    <form action="#" method="post">
                        <label for="title_input" class="info__title">Title</label>
                        <input type="text" class="title_input" id="title_input" name="title_input" placeholder="New Post" required>
                        <label for="Short_description" class="info__title">Short description</label>
                        <input type="text" class="Short_description" id="Short_description" name="Short_description" placeholder="Please, enter any description" required>
                        <label for="Author_name" class="info__title">Author name</label>
                        <input type="text" class="Author_name" id="Author_name" name="Author_name" required>
                        <div class="info__title">Author Photo</div>
                        <label for="Author_Photo" class="input_author-photo">
                            <input type="file" id="Author_Photo" name="Author_Photo" accept="image/jpeg, image/png, image/gif" required>
                            <img class="author_photo" src="images/input_camera.svg">
                        </label>
                        <label for="Publish_Date" class="info__title">Publish Date</label>
                        <input type="date" class="Publish_Date" id="Publish_Date" name="Publish_Date" placeholder="" required>
                        <div class="info__title">Hero Image</div>
                        <label for="Hero_Image" class="input_hero-image1">
                            <input type="file" id="Hero_Image" name="Hero_Image" accept="image/jpeg, image/png, image/gif" required>
                            <img class="hero_photo" src="images/input_camera.svg">
                        </label>
                        <div class="info__subtitle">Size up to 10mb. Format: png, jpeg, gif.</div>
                        <div class="info__title">Hero Image</div>
                        <label for="Hero_Image" class="input_hero-image2">
                            <input type="file" id="Hero_Image" name="Hero_Image" placeholder="Upload" accept="image/jpeg, image/png, image/gif" required>
                            <img class="hero_photo" src="images/input_camera.svg">
                        </label>
                        <div class="info__subtitle">Size up to 5mb. Format: png, jpeg, gif.</div>
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
                            <!--img src="" alt="" class="preview__card-image"-->
                            <div class="card-preview__main-info">
                                <div class="main-info__title">New Post</div>
                                <div class="main-info__Short_description">Please, enter any description</div>
                            </div>
                            <div class="block_author-data">
                                <div class="block_author-data__author">
                                    <div class="author__Author_Photo"></div>
                                    <div class="author__Author_name">Enter author name</div>
                                </div>
                                <div class="block_author-data__Publish_Date">4/19/2023</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="block-content">
            <h3 class="block-content__title">Content</h3>
            <form action="#" method="post">
                <div class="info__title">Post content (plain text)</div>
                <textarea class="input_content" name="content" placeholder="Type anything you want ..." required></textarea>
            </form>
        </div>
    </main>
    <footer></footer>
</body>
<script src="admin_author.js"></script>

</html>