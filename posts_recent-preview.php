<a class="content-block2__article" href='/post?id=<?= $row['post_id'] ?>'>
    <img class="image" src="<?= $row['image_url'] ?>" alt="<?= $row['title'] ?>">
    <div class="block-most__main">
        <div class="most-article__tittle"><?= $row['title'] ?></div>
        <div class="most-article__subtittle"><?= $row['subtitle'] ?></div>
    </div>
    <div class="most-article__information">
        <div class="most-article__author">
            <img src="<?= $row['author_url'] ?>" alt="<?= $row['author'] ?>">
            <div class="most-article__name"><?= $row['author'] ?></div>
        </div>
        <div class="most-article__date"><?= $row['publish_date'] ?></div>
    </div>
</a>