<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/narcis.css">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Réservation</h1>
        <hr>
        <form action="action.php" method="post">
            <div class="div_3">
                <div class="div_1">
                    <input type="text" id="nom" value="First Name" name="fname">
                    <input type="text" id="email" value="Last Name" name="email">
                    <input type="email" id="email" value="Email" name="email">
                </div>
                <div class="div_2">
                    <select id="plat">
                        <option selected="selected">Sélectionner votre sexe</option>
                        <?php
                        $sexe = array("Masculin", "Feminin", "Autre");
                        foreach ($sexe as $value) {
                            ?>
                            <option value="<?php echo ($value); ?>"><?php echo $value; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="" id="plat">
                        <option value="">Choisir un plat</option>
                        <option value="15">thiebou dieune </option>
                        <option value="12">salade de quinoa </option>
                        <option value="11">sushi burgers</option>
                        <option value="9">filets de poulets panés</option>
                    </select>
                    <select name="" id="dessert">
                        <option value="">Choisir un déssert</option>
                        <option value="churros maison">churros maison </option>
                        <option value="biscuits au pepites">biscuits au pepites</option>
                        <option value="buche de noel">buche de noel</option>
                        <option value="gateau au fromage">gateau au fromage</option>
                    </select>
                </div>
            </div>
            <div id="radioo">
                <label for="france" class="accepte">France</label>
                <input type="radio" class="check" name="pays" value="france">
                <label for="uk" class="accepte">UK</label>
                <input type="radio" class="check" name="pays" value="uk">
                <label for="allemagne" class="accepte">Allemagne</label>
                <input type="radio" class="check" name="pays" value="allemagne">
            </div>
            <div class="accepte">
                <input class="check" type="checkbox"> J’accepte les conditions générales
            </div>
            <div>
                <label for="phone">Numéro de téléphone</label>
                <input type="number" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
                <label for="date">Date de naissance</label>
                <input type="date" id="date" name="bday" required pattern="\d{4}-\d{2}-\d{2}" />
            </div>
            <div>
                <label for="comment" class="label">Commentaire</label>
                <textarea id="story" name="story" rows="5" cols="33"></textarea>
            </div>
            <p>
                <input type="submit">
            </p>
        </form>
    </div>
    <script src="formulaire_exo.js"></script>
</body>

</html>