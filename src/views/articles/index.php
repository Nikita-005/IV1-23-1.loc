<h1>Статьи</h1>
<?php foreach($articles as $article):  ?>
    <h2><?= $article->getName() ?></h2>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <a href="article/<?= $article->getId() ?>">Подробнее</a>
    <hr>
<?php endforeach; ?>