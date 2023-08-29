<?php
session_start(); // à mettre avant le html c'est pour démarrer une session
require_once 'function.php';
if (!isset($_COOKIE['id_user'])) { // si il n'y a pas de session active
    header("Location: connexion.php"); // rediger vers le formulaire de connexion
}

$listPost = getPost(); // récupérer la liste des posts
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <?php include_once "nav.php"; ?>
    <div class="container">
        <?php foreach ($listPost as $post) { ?>
            <div class="post">
                <div class="posting">
                    <img src="../img/<?= $post['photo']; ?>" alt="image">
                </div>
                <p>
                    <?= $post['text']; ?>
                </p>
                <span>
                    <?= $post['likes']; ?>likes
                </span>
                <a href="traits.php?idpost=<?= $post['id_posts']; ?>">
                    <i class="fa-regular fa-thumbs-up"></i>
                </a>
            </div>
        <?php } ?>
    </div>
</body>

</html>