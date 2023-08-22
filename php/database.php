<?php
function dbConnexion() {
    $connexionDb = null; // variable qui doit stocker notre instance de connexion à la base de données
    try { // essaye de se connecter à la base de données
        // on récupére l'objet de connexion à la base des données dans la variable "$connexionDb"
        $connexionDb = new PDO("mysql:host=localhost;dbname=cours_db", "root", "");
    } catch(PDOException $e) { // si la connexion échoue
        $connexionDb = $e; // on récupére notre erreur dans "$connexionDb"
    }
    return $connexionDb; // retourne l'objet (la connexion ou l'erreur)
}