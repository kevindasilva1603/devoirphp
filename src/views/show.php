<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= htmlspecialchars($post['body']) ?></p>
    <a href="/articles/<?= $post['id'] ?>/edit">Modifier</a>
    <form action="/articles/<?= $post['id'] ?>/delete" method="post">
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
