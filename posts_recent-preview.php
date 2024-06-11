<a class="recent-posts__post-block" href='/post?id=<?= $row['post_id'] ?>'>
    <img class="recent-posts__post-wallpaper" src="http://localhost:8001/static/<?= $row['image_url'] ?>" alt="<?= $row['title'] ?>">
    <div class="recent-posts__post-preface">
        <div class="recent-posts__post-cite"><?= $row['title'] ?></div>
        <div class="recent-posts__post-notion"><?= $row['subtitle'] ?></div>
    </div>
    <div class="longline"></div>
    <div class="recent-posts__post-profile">
        <div class="recent-posts__profile-block">
            <img class="recent-posts__post-avatar" src="http://localhost:8001/static/<?= $row['author_url'] ?>" alt="<?= $row['author'] ?>">
            <div class="recent-posts__post-person"><?= $row['author'] ?></div>
        </div>
        <div class="recent-posts__post-datestamp"><?= $row['publish_date'] ?></div>
    </div>
</a>
