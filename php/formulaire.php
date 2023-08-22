<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="traitement.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="nom">
        <br>
        <input type="text" name="email" placeholder="email">
        <br>
        <textarea name="message" id="" cols="30" rows="10"></textarea><br>
        <input type="file" name="image"><br>
        <input type="file" name="photo"><br>
        <button name="valider">Envoyer</button>
    </form>
</body>

</html>