<h1>Редактирование статьи: <?= $article->getName() ?></h1>

<form action="" method="POST">
    <label>Название статьи: <input type="text" name="name" value="<?= $article->getName() ?>"></label><br>
    <label>Текст статьи: <textarea name="text" rows="10" cols="80"><?= $article->getText() ?></textarea></textarea></label><br>
    <input type="submit" value="Обновить">
</form>


