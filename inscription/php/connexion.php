<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz@10..48&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
</head>

<body>
    <?php include_once 'nav.php'; ?>
    <form action="traits.php" method="post">
        <div class="psdo">
            <label for="pseudo" name="pseudo"></label>
            <input type="text" name="pseudo" placeholder="Votre pseudo" class="grey" required />
        </div>
        <div class="md">
            <label for="mdp" name="mdp"></label>
            <input type="password" name="mdp" placeholder="Mot de passe" class="grey" required />
        </div>
        <div class="inscr">
          <input type="submit" name="connexion" value="Inscription" class="inscription" />
        </div>
    </form>
</body>

</html>