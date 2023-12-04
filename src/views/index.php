<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des articles</title>
</head>
<body>
    <h1>Liste des articles</h1>
    <a href="/articles/create">Créer un nouvel article</a>
    <?php foreach ($posts as $post): ?>
        <div>
            <h2><a href="/articles/<?= $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a></h2>
            <p><?= htmlspecialchars($post['body']) ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
