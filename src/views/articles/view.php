<h1><?= $article->getName() ?></h1>

<?php if($article->getImg() !== null)  : ?>
    <img  class="img-fluid" src="<?= $article->getImg() ?>" alt="">
<?php endif; ?>

<p><?= $article->getText() ?></p>

<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>