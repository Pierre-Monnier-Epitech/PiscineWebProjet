<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // Définition du chemin racine de l'application
}

include "$racine/modele/verifieConnexion.inc.php"; // Inclusion du fichier de modèle pour vérifier la connexion

logout(); // Appel de la fonction pour se déconnecter de la session

header('Refresh:0; url=?action=menu'); // Redirection vers la page d'accueil après déconnexion

$titre = "authentification";
include "$racine/vue/vueNavbar.php"; // Inclusion de la vue pour la barre de navigation
include "$racine/vue/vueCorpsAccueil.php"; // Inclusion de la vue pour le corps de la page d'accueil
include "$racine/vue/vueFooter.php"; // Inclusion de la vue pour le pied de page

?>