<?php

# Exercice : Formulaire d'Inscription
/*
Dans cet exercice, vous allez créer un formulaire d'inscription en HTML et traiter les données soumises en utilisant PHP. Le formulaire d'inscription demandera aux utilisateurs de saisir leur nom, leur adresse e-mail, un mot de passe et de confirmer le mot de passe.

Créez un fichier HTML nommé formulaire_inscription.html contenant un formulaire d'inscription avec les champs suivants :
Nom complet (input de type texte)
Adresse e-mail (input de type email)
Mot de passe (input de type password)
Confirmer le mot de passe (input de type password)
Créez un fichier PHP nommé traitement_inscription.php pour traiter les données du formulaire d'inscription. Dans ce fichier :

Utilisez la méthode POST pour récupérer les données soumises du formulaire ($_POST).
Vérifiez si les champs nom, adresse e-mail, mot de passe et confirmation du mot de passe ne sont pas vides.
Vérifiez si le mot de passe et la confirmation du mot de passe correspondent.
Si tous les champs sont remplis et les mots de passe correspondent, affichez un message de confirmation.
Si au moins un champ est vide ou les mots de passe ne correspondent pas, affichez un message d'erreur et indiquez les champs manquants ou incohérents.
Dans le fichier HTML, assurez-vous que le formulaire envoie les données soumises à la page de traitement PHP (traitement_inscription.php) en utilisant la méthode POST.
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $motDePasse = htmlspecialchars($_POST['motDePasse']);
    $confirmerMotDePasse = htmlspecialchars($_POST['confirmerMotDePasse']);

    if (empty($nom) || empty($email) || empty($motDePasse) || empty($confirmerMotDePasse)) {
        echo "Tous les champs doivent être remplis.";
    } elseif ($motDePasse != $confirmerMotDePasse) {
        echo "Les mots de passe ne correspondent pas.";
    } else {
        echo "Inscription réussie pour $nom avec l'adresse e-mail $email.";
    }
}