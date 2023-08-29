<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "nav.php"; ?>
    <form action="traits.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <textarea name="message" id="" cols="30" rows="10" placeholder="votre message"></textarea>
        <button name="publier">publier</button>
    </form>
</body>
</html>