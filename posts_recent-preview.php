<div class="content-block2__article">
    <img src="/static/images/<?= $posts_recent['image'] ?>" alt="<?= $posts_recent['image_description'] ?>">
    <div class="block-most__main">
        <div class="most-article__tittle"><?= $posts_recent['tittle'] ?></div>
        <div class="most-article__subtittle"><?= $posts_recent['subtittle'] ?></div>
    </div>
    <div class="most-article__information">
        <div class="most-article__author">
            <img src="/static/images/<?= $posts_recent['photo_author'] ?>" alt="<?= $posts_recent['author'] ?>">
            <div class="most-article__name"><?= $posts_recent['author'] ?></div>
        </div>
        <div class="most-article__date"><?= date("n/d/y", $posts_recent['date'] )?></div>
    </div>
</div>