<?php
session_start(); // à mettre avant le html c'est pour démarrer une session
if(!isset($_SESSION['id_membres'])) { // si il n'y a pas de session active
    header("Location: connexion.php"); // rediger vers le formulaire de connexion
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "nav.php"; ?>
</body>
</html>