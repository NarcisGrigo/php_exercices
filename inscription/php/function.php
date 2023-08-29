<?php
require_once "base.php";
function getPost()
{
    $lesPosts = null;
    $dbconnect = dbConnexion(); // connexion a la bd
    // preparer la requette
    // $request = $dbconnect->prepare("SELECt id_post, likes,
    // membre_id, text, photo FROM posts WHERE membre_id IN(SELECT * FROM membres)");
    $request = $dbconnect->prepare("SELECT id_posts, likes, membre_id, text, photo, id_membres, pseudo FROM posts, membres WHERE posts.membre_id = membres.id_membres");

    // execution de la requette
    try {
        $request->execute();
        // transformer le résultat de la requette en tableau
        $lesPosts = $request->fetchAll();
    } catch (PDOException $erreur) {
        echo $erreur->getMessage();
    }
    return $lesPosts; // retourne la liste des posts
}