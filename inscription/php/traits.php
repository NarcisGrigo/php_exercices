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
            // création du cookie qui va stocker l'identifiant de l'utilisateur pour permettre d'une meilleure expérience
            // c'est a dire qu'on va le connecter automatiquement aprés la verification du cookie
            setcookie("id_user", $utilisateur['id_membres'], time() + 3600, '/', 'localhost', false, true);

            header("Location: accueil.php");
        }else {
            echo "mot de passe incorrect";
            header("Location: accueil.php");
        }
    }
    }

    if(isset($_POST['publier'])) {
        $message = htmlspecialchars($_POST['message']);

        $img_name = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];
        $destination = $_SERVER['DOCUMENT_ROOT'] . '/php_exos/inscription/img/' . $img_name;

        move_uploaded_file($tmp, $destination);
        // connexion a la bd
        $dbconnect = dbConnexion();
        // preparation a la requette
        $request = $dbconnect->prepare("INSERT INTO posts (membre_id, photo, text) VALUES(?,?,?)");
        try {
            $request->execute(array($_SESSION['id_membres'], $img_name, $message));
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    if(isset($_GET['idpost'])) {
        $dbconnect = dbConnexion(); // connexion a la bd
        // preparer la requette
        $request = $dbconnect->prepare("SELECT likes FROM posts WHERE id_posts = ?");
        // executer la requette
        $request->execute(array($_GET['idpost']));
        // on récupére le résultat
        $likes = $request->fetch();

        // echo $likes['likes'];
        // réquette pour modifier le nombre de likes
        $request1 = $dbconnect->prepare("UPDATE posts SET likes = ? WHERE id_posts = ?");
        // éxécutionner la réquette
        $request1->execute(array($likes['likes']+1, $_GET['idpost']));
        header("Location: accueil.php");
    }
