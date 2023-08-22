<?php
if (isset($_POST['valider'])) {

    // récupération des données
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    $imgName = $_FILES['image']['name']; // nom de l'image
    $tmpName = $_FILES['image']['tmp_name']; // localisation temporaire sur le serveur

    // $_SERVER['DOCUMENT_ROOT'] point a la racine du serveur c'est a dire le dossier principal
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/W.B_GIT/www/img/' . $imgName; // destination finale de mon img
    echo $destination;
    move_uploaded_file($tmpName, $destination);

    // echo "$nom $email $message";
}