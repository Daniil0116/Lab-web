<a class="content-block1__article" href='/post?id=<?= $row['post_id'] ?>'>
    <div class="article__background_<?= $row['post_id'] ?>">
        <div class="future-article__tittle"><?= $row['title'] ?></div>
        <div class="future-article__subtittle"><?= $row['subtitle'] ?></div>
        <div class="future-article__information">
            <div class="future-article__author">
                <img src="http://localhost:8001/static/<?= $row['author_url'] ?>" alt="<?= $row['author'] ?>">
                <div class="future-article__name"><?= $row['author'] ?></div>
            </div>
            <div class="future-article__date"><?= $row['publish_date']?></div>
        </div>
    </div>
</a>