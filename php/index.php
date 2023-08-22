<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="traitre.php" enctype="multipart/form-data">

        <div>
            <div>
                <label for="name">Nom Complet</label><br>
                <input type="text" name="nom"><br>
            </div>
            <div>
                <label for="prenom">Prenom</label><br>
                <input type="text" name="prenom"><br>
            </div>
            <div>
                <label for="email">E-Mail :</label><br>
                <input type="email" name="email"><br>
            </div>
            <div>
                <input type="password" name="mdp" placeholder="Mot de Passe"><br>
            </div>

            <input type="submit" class="envoi" name="envoi">
        </div>

    </form>
</body>

</html>
