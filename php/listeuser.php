<?php
require_once 'database.php';

// établir la connexion avec la base de données
$db = dbConnexion();

// préparation de la requette
$request = $db->prepare("SELECT * FROM utilisateur");

// éxécuter la requete
try {
    $request->execute();
    $users = $request->fetchAll(PDO::FETCH_ASSOC);
    // pour avoir uniquement un tableau associatif on utilise fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
    $e->getMessage();
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
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <!-- afficher les informations des utilisateur dans le tableau html -->
            <?php foreach($users as $u) { ?>
                <tr>
                    <td><?= $u['nom']; ?></td>
                    <td><?= $u['prenom']; ?></td>
                    <td><?= $u['email']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>