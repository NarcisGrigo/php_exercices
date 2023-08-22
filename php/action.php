<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "biblio";
try {
    $pdo = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected succesffully";
} catch (PDOException $e) {
    echo "Connecion failed: " . $e->getMessage();
}

echo "<pre>";
var_dump($_POST);
echo "</pre>";
die;

// Données à insérer
$firstname = "Narcis";
$lastname = "Grigoroscuta";
$email = "narcismihai724@gmail.com";
$msg = "Hi, It's my first message !!";

// Requete d'insertion préparée
$sql = "INSERT INTO user (firstname, lastname, email, message) VALUES (:firstname, :lastname, :email, :message)";
$stmt = $pdo->prepare($sql);

// Associer les valeurs aux paramètres
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':message', $message);

// Exécuter la requete
try {
    $stmt->execute();
    echo " Données insérées avec succès .";
} catch (PDOException $e) {
    echo " Erreur d'insertion : " . $e->getMessage();
}

?>