<a class="content-block1__article" href='/post?id=<?= $row['post_id'] ?>'>
    <div class="featured-posts_<?= $row['post_id'] ?>">
        <div class="featured-posts__post-block_left">
            <div class="featured-posts__post-head_left"><?= $row['title'] ?></div>
            <div class="featured-posts__post-annotation_left"><?= $row['subtitle'] ?></div>
            <div class="featured-posts__profile">
                <div class="featured-posts__person">
                    <img class="person__image" src="http://localhost:8001/static/<?= $row['author_url'] ?>" alt="<?= $row['author'] ?>">
                    <div class="person__name"><?= $row['author'] ?></div>
                </div>
                <div class="featured-posts__post-datestamp"><?= $row['publish_date'] ?></div>
            </div>
        </div>
    </div>
</a>

