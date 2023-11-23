<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // Définition du chemin racine de l'application
}

// Inclusion des fichiers de modèle nécessaires
include_once "$racine/modele/updateAd.inc.php";
include_once "$racine/modele/edit_ad.inc.php";

// Vérification de la requête HTTP (POST) et de la présence de la variable "editAd"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editAd'])) {

    // Récupération de l'ID de l'annonce depuis le formulaire
    $adID = $_POST['ad_id'];
    
}

// Définition du titre de la page
$titre = "Annonce";

// Inclusion des vues pour la barre de navigation, la mise à jour de l'annonce et le pied de page
include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueUpdateAd.php";
include "$racine/vue/vueFooter.php";

?>