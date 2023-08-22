<?php
// inclure le fichier "database" qui contient la fonction permettant de se connecter à la base de données
require_once("database.php");
if(isset($_POST['envoi'])) {
    // récupération des données saisie par l'utilisateur
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);

    // crypter le mot de passe "hasher"
    $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);

    // il faut se connecter à la base de données
    $db = dbConnexion(); // permet d'établir la connexion avec la bd "base de données"

    // préparation de la requette
    $request = $db->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp) VALUE (?, ?, ?, ?)");

    // éxécution de la requette
    try { // essayer d'entregistrer les info dans la tables "utilisateurs"
        $request->execute(array($nom, $prenom, $email, $mdpCrypt));
    }catch (PDOException $e) {
        echo $e->getMessage(); // afficher l'erreur sql généré
    }
}