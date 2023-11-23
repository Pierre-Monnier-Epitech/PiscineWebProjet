<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/inscription.inc.php";
include_once "$racine/modele/utilisateur.inc.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    echo '<script>console.log("test");</script>';
    handleInscription();
}
    
$titre = "Inscription";
include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueInscription.php";
include "$racine/vue/vueFooter.php";


?>
