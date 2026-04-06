<h1>Статьи</h1>
<?php if($user): ?>
    <p><a href="/IV1-23-1.loc/articles/add">Добавить статью</a></p>
<?php endif ?>
<?php foreach($articles as $article):  ?>
    <h2><?= $article->getName() ?></h2>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <a href="article/<?= $article->getId() ?>">Подробнее</a>
    <hr>
<?php endforeach; ?>