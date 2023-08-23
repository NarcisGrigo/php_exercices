<?php
session_start();
    // inclure le fichier "database" qui contient la fonction permettant de se connecter à la base de données
    require_once("base.php");
    if (isset($_POST['inscription'])) {

    // récupération des données saisie par l'utilisateur
    $email = htmlspecialchars($_POST['email']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['mdp']);

    // crypter le mot de passe "hasher"
    $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT);

    // traitement de l'image
    $nomImage = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/php_exos/inscription/img/' . $nomImage;
    move_uploaded_file($tmp, $destination);

    // il faut se connecter à la base de données
    $db = dbConnexion(); // permet d'établir la connexion avec la bd "base de données"

    // préparation de la requette
    $request = $db->prepare("INSERT INTO membres (email, pseudo, mdp, img) VALUE (?, ?, ?, ?)");

    // éxécution de la requette
    try { // essayer d'entregistrer les info dans la tables "utilisateurs"
        $request->execute(array($email, $pseudo, $mdpCrypt, $nomImage));
    } catch (PDOException $e) {
        echo $e->getMessage(); // afficher l'erreur sql généré
    }
    }

    // pour la connexion
    if(isset($_POST['connexion'])) {
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];

    // établir la connexion avec la bd
    $connect = dbConnexion();

    // préparer la réquette
    $connexionRequest = $connect->prepare("SELECT * FROM membres WHERE pseudo = ? ");

    // éxécuter la réquette
    $connexionRequest->execute(array($pseudo));

    // récupérer le résultat de la réquette
    $utilisateur = $connexionRequest->fetch(PDO::FETCH_ASSOC); // convértir le résultat de la réquette en tableau pour le manipuler
    if(empty($utilisateur)) { // si le tableau "$utilisateur" est vide
        echo "Utilisateur inconnu...";
    }else { // sinon
        // on vérifie le mot de passe
        if(password_verify($mdp, $utilisateur['mdp'])) {
            // créer les variables de la session
            $_SESSION["pseudo"] = $utilisateur['pseudo'];
            $_SESSION["img"] = $utilisateur['img'];
            $_SESSION["id_membres"] = $utilisateur['id_membres'];

            header("Location: accueil.php");
        }else {
            echo "mot de passe incorrect";
            header("Location: accueil.php");
        }
    }
    }
