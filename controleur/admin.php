<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine ="..";
}

# import utilisé pour la page admin
include_once "$racine/modele/admin.inc.php";
include_once "$racine/modele/connexionBDDepijob.inc.php";
include_once "$racine/modele/supprimer_annonce.inc.php";
include_once "$racine/modele/supprimer_user.inc.php";
include_once "$racine/modele/update_role.inc.php";
include_once "$racine/modele/utilisateur.inc.php";
include_once "$racine/modele/edit_ad.inc.php";
include_once "$racine/modele/create_user.inc.php";
include_once "$racine/modele/create_ad.inc.php";
include_once "$racine/modele/ad.inc.php";
include_once "$racine/modele/verifieConnexion.inc.php";

$mail = getMailLoggedOn();
$util = getUtilisateurByMail($mail);


if ($util['role']=="admin"){

include "$racine/vue/vueNavbar.php";
print_r($util['role']);
include "$racine/vue/vueAdmin.php";
include "$racine/vue/vueFooter.php";

# créer un utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['createUser']) && isset($_POST['mdp'])) {
    $email = $_POST['createUser'];
    $password = $_POST['mdp'];

    // Appeler la fonction pour créer un utilisateur
    create_user($email, $password);
}

?>

    <?php

    # mettre à jour le rôle d'un utilisateur
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['role'])){
        
        $userID = $_POST['userID'];
        $newRole = $_POST['role'];

        // Appeler la fonction pour mettre à jour le rôle
        update_user_role($userID, $newRole);
        echo '<script>window.location.href = "?action=admin";</script>';

    }   

    ?>

    <?php

    # supprimer un utilisateur
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteUser'])) {
        $userID = $_POST['userID'];
        delete_user($userID);
    }
    ?>

    <?php

    # supprimer une annonce
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteAd'])) {
        $adID = $_POST['adID'];
        delete_ad($adID);
    }
    ?>

    <?php

    # mettre a jour une annonce
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adv'])) {
        $adId = $_POST['ad_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $vehicule = isset($_POST['vehicule']) ? 'Oui' : 'Non';
        $price = $_POST['price'];
        $status = $_POST['status'];

        update_ad($adId, $title, $description, $vehicle, $price, $status);

        echo "L'annonce a été mise à jour avec succès.";
    }

    ?>

    <?php

    # créer une annonce
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['createAd']) && isset($_POST['description'])) {
        $titre = $_POST['createAd'];
        $description = $_POST['description'];
        $heure = date('Y-m-d');
        $vehicule = $_POST['vehicule'];
        $prix = $_POST['prix'];
        $statue = $_POST['statue'];

        

        create_ad($titre, $description, $heure, $vehicule, $prix, $statue);
    }} else {
        echo '<script>window.location.href = "?action=menu";</script>';
    }
    ?>
