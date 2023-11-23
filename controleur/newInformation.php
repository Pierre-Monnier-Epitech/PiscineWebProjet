<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // Définition du chemin racine de l'application
}

// Inclusion des fichiers de modèle nécessaires
include "$racine/modele/inscription.inc.php"; // Gestion de l'inscription d'un nouvel utilisateur
include "$racine/modele/addNewInformation.inc.php"; // Gestion de l'ajout de nouvelles informations utilisateur

// Récupération des informations du dernier utilisateur (potentiellement le nouvel utilisateur)
$util = getLastUtilisateur();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verifNewInfo(); // Vérification et ajout de nouvelles informations utilisateur (informations personnelles, etc.)
}

// Définition du titre de la page
$titre = "Inscription";

// Inclusion des vues pour la barre de navigation, la nouvelle information utilisateur et le pied de page
include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueNewInformation.php";
include "$racine/vue/vueFooter.php";