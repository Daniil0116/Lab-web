<link rel="stylesheet" href="./style1.css">
<div class="article__background">
    <div class="future-article__tittle"><?= $post['tittle'] ?></div>
    <div class="future-article__subtittle"><?= $post['subttitle'] ?></div>
    <div class="future-article__information">
        <div class="future-article__author">
            <?= $post['img_modifier'] ?>
            <div class="future-article__name"><?= $post['author'] ?></div>
        </div>
        <div class="future-article__date"><?= $post['date'] ?></div>
    </div>
</div>