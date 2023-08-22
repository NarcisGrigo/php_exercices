<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    // Ajout et suppression d'éléments
    // Créez un tableau vide.
    // Ajoutez les nombres de 1 à 5 à ce tableau.
    // Supprimez le troisième élément.
    // Affichez le contenu final du tableau.

    $tableau = [];
    array_push($tableau, 1, 2, 3, 4, 5);
    unset($tableau[3]);
    print_r($tableau);

    // Recherche et modification
    // Créez un tableau contenant plusieurs noms de pays.
    // Vérifiez si "France" est présent dans le tableau.
    // Si oui, remplacez "France" par "Espagne".
    // Affichez le tableau modifié.

    $table = ["France", "England", "Greece"];
    $replace = array(0 => "Espagne");
    $newtable = array_replace($table, $replace);
    print_r($newtable);

    # Tirage du loto :
    /*
    - on veut 5 n° au hasard
    - on des n° différents
    - numéros de 1 à 49
    - comment savoir si le n° est déjà sorti ?
    - Trier les n° pour l'affichage final
    - les numeros doivent etre séparé par des tirets (-) dans l'affichage final
    - exemple : 5-7-12-49-34
    - utilisez la fonction rand pour générer un nombre aléatoire
    - exemple : $nombreAleatoire = rand(1, 49);
    */

    $numbers = array();

    for ($n = 0; $n < 5; ) {
        // Generate a random number
        $r = rand(1, 49);

        // Checking if the number is not in the array
        if (!in_array($r, $numbers)) {
            $numbers[$n] = $r;
            $n++;
        }
    }

    // Order the array in ascending order
    sort($numbers);

    // Print the numbers drawn with hyphens
    for ($n = 0; $n < 5; $n++) {
        if ($numbers[$n] == 0) {
            echo ("<td>?</td>");
        } else {
            echo ("<td>" . $numbers[$n] . "</td>");
        }

        // Add a hyphen between numbers (except for the last number)
        if ($n < 4) {
            echo ("<td>-</td>");
        }
    }

    # Tirage EuroMillions
    /*
    - Pour jouer à EuroMillions, il vous faut cocher 7 numéros :
    - 5 numéros sur une grille de 50 numéros
    - et 2 étoiles sur une grille de 12 numéros.
    -Vous remportez le jackpot si vous avez 5 numéros gagnants et les 2 étoiles.

    - écrure une fonction "tirage" qui prends deux paramétres
    - le premier paramétre correspond au nombre de numéros a tirer
    - le second correspond au nombre maximum que les numéros ne doivent pas dépasser
    */

    // function tirage($nombreNumeros, $nombreMaxNumeros, $nombreEtoiles, $nombreMaxEtoiles) {
    // // Vérification des paramètres
    // if ($nombreNumeros <= 0 || $nombreEtoiles <= 0 || $nombreMaxNumeros <= 0 || $nombreMaxEtoiles <= 0) {
    //     return "Les paramètres doivent être supérieurs à zéro.";
    // }

    // if ($nombreNumeros > $nombreMaxNumeros || $nombreEtoiles > $nombreMaxEtoiles) {
    //     return "Le nombre de numéros ou d'étoiles à tirer ne doit pas dépasser le nombre maximum.";
    // }

    // $tirageNumeros = array();
    // $tirageEtoiles = array();

    // // Génération aléatoire des numéros
    // while (count($tirageNumeros) < $nombreNumeros) {
    //     $numero = rand(1, $nombreMaxNumeros);
    //     if (!in_array($numero, $tirageNumeros)) {
    //         $tirageNumeros[] = $numero;
    //     }
    // }

    // // Génération aléatoire des étoiles
    // while (count($tirageEtoiles) < $nombreEtoiles) {
    //     $etoile = rand(1, $nombreMaxEtoiles);
    //     if (!in_array($etoile, $tirageEtoiles)) {
    //         $tirageEtoiles[] = $etoile;
    //     }
    // }

    // sort($tirageNumeros); // Trie les numéros dans l'ordre croissant
    // sort($tirageEtoiles); // Trie les étoiles dans l'ordre croissant

    // return array('numeros' => $tirageNumeros, 'etoiles' => $tirageEtoiles);
    // }

    // // Exemple d'utilisation
    // $nombreNumeros = 5;
    // $nombreMaxNumeros = 50;
    // $nombreEtoiles = 2;
    // $nombreMaxEtoiles = 12;

    // $resultat = tirage($nombreNumeros, $nombreMaxNumeros, $nombreEtoiles, $nombreMaxEtoiles);

    // echo "Numéros tirés : " . implode(", ", $resultat['numeros']) . "<br>";
    // echo "Étoiles tirées : " . implode(", ", $resultat['etoiles']);

    // Correction

    function tirage($num, $max)
    {
        $numeros = [];
        while (count($numeros) < $num) {
            $numeroAleatoire = rand(1, $max);
            if (!in_array($numeroAleatoire, $numeros)) {
                $numeros[] = $numeroAleatoire;
            }
        }
        sort($numeros);
        return $numeros;
    }
    $numeros = tirage(5, 50);
    $etoiles = tirage(2, 12);
    echo implode('-', $numeros) . " " . implode('-', $etoiles);
    ?>
</body>

</html>