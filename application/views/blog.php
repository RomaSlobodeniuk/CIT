<div class="container">
    <div class="jumbotron">
            <h1><?= $data[0];?></h1>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="blog/add/">Add an article</a>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <?php foreach ($data[1] as $article): ?>
        <div class="well well-sm">
            <h1><?= $article['title']; ?></h1>
            <p><?= substr($article['text'], 0, 255) . '...'; ?>
                <a href="blog/page/<?= $article['id']; ?>">Read more</a>
            </p>
            <em><q>Author: <?= $article['author']; ?></q></em>
            <em><q>Date: <?= $article['date']; ?></q></em>
            <a href="blog/edit/<?= $article['id']; ?>">Edit</a>
        </div>
    <?php endforeach; ?>
</div>