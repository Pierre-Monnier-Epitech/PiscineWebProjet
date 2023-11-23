<?php
// Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";
include_once "verifieConnexion.inc.php"; // Assurez-vous que ce fichier est inclus si nécessaire

// Fonction pour obtenir les informations liées à un utilisateur en fonction de son ID
function getInformationbyIdUltilisateur($id) {
    $resultat = array();
    try {
        // Établir une connexion PDO à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour sélectionner les informations de l'utilisateur en fonction de son ID
        $req = $cnx->prepare("SELECT * FROM information WHERE ult_ID = :id");
        $req->bindParam(':id', $id, PDO::PARAM_STR);
        $req->execute();

        // Récupérer les résultats de la requête sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}
?>