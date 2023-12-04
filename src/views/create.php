<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un nouvel article</title>
</head>
<body>
    <h1>Créer un nouvel article</h1>
    <form action="/articles" method="post">
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title"><br><br>
        
        <label for="body">Contenu:</label>
        <textarea id="body" name="body"></textarea><br><br>

        <input type="submit" value="Créer">
    </form>
</body>
</html>
