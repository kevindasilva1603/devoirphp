<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'article</title>
</head>
<body>
    <h1>Modifier l'article</h1>
    <form action="/articles/<?= $post['id'] ?>" method="post">
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>"><br><br>
        
        <label for="body">Contenu:</label>
        <textarea id="body" name
