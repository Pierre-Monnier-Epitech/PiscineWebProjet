<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine ="..";
}
include_once "$racine/modele/annonce.inc.php";
include_once "$racine/modele/connexionBDDepijob.inc.php";
include_once "$racine/modele/utilisateur.inc.php";
include_once "$racine/modele/information.inc.php";
include_once "$racine/modele/postulation.inc.php";
include_once "$racine/modele/createAdd.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['annonceID'])) {
    $annonceID = $_GET['annonceID'];
    $annonceDetails = getSuitAnnonce($annonceID);
    echo json_encode($annonceDetails);
    exit();
}

$annonce = getAnnonce();
$nbEmploi = getNumberAnnonce();

if (isLoggedOn()){
    $mail = getMailLoggedOn();
    $util = getUtilisateurByMail($mail);
    $info = getInformationbyIdUltilisateur($util['ult_ID']);
    if( $util['role'] == "employer" && $_SERVER['REQUEST_METHOD'] === 'POST') { 
        if  (isset($_POST['createAd'])) {
            $titre = $_POST['createAd'];
            $description = $_POST['description'];
            $heure = date('Y-m-d');
            $vehicule = $_POST['vehicule'];
            $prix = $_POST['prix'];
            $statue = $_POST['statue'];    
            create_ad($titre, $description, $heure, $vehicule, $prix, $statue);
            createRequeteAdd($util['ult_ID']);
            header("refresh: 0");

        }
    } 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['annonce_id']))) {
        echo '<script>console.log("test");</script>';
        postulationInsertClient();
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo '<script>console.log("perdu");</script>';
        postuleInsertUlt();
    }
} 

include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueAccueil.php";
include "$racine/vue/vueFooter.php";
?>