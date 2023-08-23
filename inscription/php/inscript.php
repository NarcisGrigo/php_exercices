<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz@10..48&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css" />
  <title>Document</title>
</head>

<body>
  <?php include_once "nav.php"; ?>
  <section>
    <form action="traits.php" method="post" enctype="multipart/form-data">
      <div class="page">
        <p>Page d'Inscription</p>
      </div>
      <div class="space">
        <div class="btnn">
          <button>Connexion</button>
        </div>
        <div class="mail">
          <label for="email" name="email"></label>
          <input type="email" name="email" placeholder="Votre email" class="grey" required />
        </div>
        <div class="psdo">
          <label for="pseudo" name="pseudo"></label>
          <input type="text" name="pseudo" placeholder="Votre pseudo" class="grey" required />
        </div>
        <div class="md">
          <label for="mdp" name="mdp"></label>
          <input type="password" name="mdp" placeholder="Mot de passe" class="grey" required />
        </div>
        <div class="cmd">
          <label for="cmdp" name="cmdp"></label>
          <input type="password" name="cmdp" placeholder="Confirmation du mot de passe" class="grey" required />
        </div>
        <div class="upd">
          <label for="file-upload" class="custom-file-upload" name="img"></label>
          <input id="file-upload" type="file" name="img" />
        </div>
        <div class="inscr">
          <input type="submit" name="inscription" value="Inscription" class="inscription" />
        </div>
      </div>
    </form>
  </section>
</body>

</html>