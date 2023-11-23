<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // Définition du chemin racine de l'application
}

// Inclusion des fichiers de modèle nécessaires
include_once "$racine/modele/utilisateur.inc.php";
include_once "$racine/modele/information.inc.php";
include_once "$racine/modele/updateInformation.inc.php";
include_once "$racine/modele/postulation.inc.php";
include_once "$racine/modele/deleteAdd.inc.php";
include_once "$racine/modele/addEntreprise.inc.php";

if (isLoggedOn()) {

    // Récupération de l'adresse e-mail de l'utilisateur connecté

    
    $mail = getMailLoggedOn();
    $util = getUtilisateurByMail($mail);
    $info = getInformationbyIdUltilisateur($util['ult_ID']);
    $annoncesPostulees = getAnnoncePostule($util['ult_ID']);
    $offrePostule = getJobPostulebyID($util['ult_ID']);
    $verifEnt = verifUltWithEntreprise($util['ult_ID']);
    $getEntreprisebyID = selectAllEntrepriseByID($util['ent_ID']);
    $entreprises = selectAllEnt();

    // Définition du titre de la page
    $titre = "Mon profil";

    // Inclusion des vues pour la barre de navigation, le profil, et le pied de page
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueProfil.php";
    include "$racine/vue/vueFooter.php";

    // Gestion des actions liées aux formulaires
    if (isset($_POST['annonce_id'])) {
        deleteAnnoncePostule($_POST['annonce_id'], $util['ult_ID']);
    }
    if (isset($_POST['offre_id'])) {
        deleteAnnoncePostule($_POST['offre_id'], $util['ult_ID']);
        deleteOffrePostule($_POST['offre_id']);
        echo '<script>window.location.href = "?action=profil";</script>';
    }
    if (isset($_POST['descriptionEnt'])) {
        // Création d'une entreprise et association à l'utilisateur
        create_ent($_POST['nameEnt'], $_POST['typeEnt'], $_POST['villeEnt'], $_POST['adresseEnt'], $_POST['descriptionEnt']);
        $idEnt = getLastEntreprise();
        insertEntIDInUlt($util['ult_ID'], $idEnt['ent_ID']);
        echo '<script>window.location.href = "?action=profil";</script>';
    }
    if (isset($_POST['entrepriseID'])) {
        // Association de l'utilisateur à une entreprise existante
        insertEntIDInUlt($util['ult_ID'], $_POST['entrepriseID']);
        echo '<script>window.location.href = "?action=profil";</script>';
    }
}

?>