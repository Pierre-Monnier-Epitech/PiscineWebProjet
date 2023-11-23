<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = ".."; // Étape 1: Détermination du chemin de la racine de l'application
}

include_once "$racine/modele/verifieConnexion.inc.php";

if (isset($_POST["mailUtilisateur"]) && isset($_POST["mdpUtilisateur"])) {
    // Étape 2: Vérification si les données de connexion (e-mail et mot de passe) ont été soumises via POST
    $mail = $_POST["mailUtilisateur"];
    $mdp = $_POST["mdpUtilisateur"];
    login($mail, $mdp); // Étape 3: Appel de la fonction de connexion avec les données de l'utilisateur

} else {
    $mail = "";
    $mdp = "";
}

if (isLoggedOn()) {
    // Étape 4: Vérification si l'utilisateur est connecté
    include "$racine/controleur/profil.php"; // Afficher le profil de l'utilisateur connecté
} else {    
    // Étape 5: Si l'utilisateur n'est pas connecté, afficher la page d'authentification
    $titre = "authentification";
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/vueFooter.php";
}
?>