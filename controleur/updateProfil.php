<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // Définition du chemin racine de l'application
}

// Inclusion des fichiers de modèle nécessaires
include_once "$racine/modele/utilisateur.inc.php";
include_once "$racine/modele/information.inc.php";
include_once "$racine/modele/updateInformation.inc.php";
include_once "$racine/modele/verificationRuleFormation.inc.php";

// Vérification de la connexion de l'utilisateur
if (isLoggedOn()) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Appelle la fonction "verif" pour effectuer une vérification (à définir ailleurs dans le code)
        verif();

        // Redirige l'utilisateur vers la page de profil
        header("Location: ?action=profil");
        exit();

    }
    
    // Obtention de l'adresse e-mail de l'utilisateur connecté
    $mail = getMailLoggedOn();
    
    // Récupération des informations de l'utilisateur à partir de son adresse e-mail
    $util = getUtilisateurByMail($mail);
    
    // Récupération des informations associées à l'utilisateur
    $info = getInformationbyIdUltilisateur($util['ult_ID']);
    
    // Définition du titre de la page
    $titre = "Mon profil";
    
    // Inclusion des vues pour la barre de navigation, la mise à jour du profil et le pied de page
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueUpdateProfil.php";
    include "$racine/vue/vueFooter.php";
}

?>