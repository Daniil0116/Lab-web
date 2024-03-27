<a class="content-block1__article" href='/post?id=<?= $post['id'] ?>'>
    <div class="article__background_<?= $post['id'] ?>">
        <div class="future-article__tittle"><?= $post['tittle'] ?></div>
        <div class="future-article__subtittle"><?= $post['subtittle'] ?></div>
        <div class="future-article__information">
            <div class="future-article__author">
                <img src="./static/images/<?= $post['photo_author'] ?>" alt="<?= $post['author'] ?>">
                <div class="future-article__name"><?= $post['author'] ?></div>
            </div>
            <div class="future-article__date"><?= date("F j, Y", $post['date'])?></div>
        </div>
    </div>
</a>