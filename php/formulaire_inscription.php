<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>

<body>
    <h1>Inscription</h1>
    <form action="traitement_inscription.php" method="post" enctype="multipart/form-data">

        <label for="nom">Nom complet:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="motDePasse">Mot de passe:</label>
        <input type="password" id="motDePasse" name="motDePasse" required><br><br>

        <label for="confirmerMotDePasse">Confirmer le mot de passe:</label>
        <input type="password" id="confirmerMotDePasse" name="confirmerMotDePasse" required><br><br>

        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>