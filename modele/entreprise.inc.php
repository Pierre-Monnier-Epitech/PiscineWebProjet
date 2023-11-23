<?php
// Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

// Fonction pour obtenir les informations de l'entreprise en fonction de l'ID de l'utilisateur
function getEntreprisebyIDUtilisateur($IDutilisateur) {
    $resultat = array();
    try {
        // Établir une connexion PDO à la base de données
        $cnx = connexionPDO();
        
        // Requête SQL pour sélectionner les informations de l'entreprise liée à l'utilisateur
        $req = $cnx->prepare("SELECT e.* FROM entreprise e JOIN utilisateur u ON e.ent_ID = u.ent_ID WHERE u.ult_ID = :IDutilisateur");
        $req->bindParam(':IDutilisateur', $IDutilisateur, PDO::PARAM_STR);
        $req->execute();
        
        // Récupérer les résultats de la requête sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur
        print "Erreur !: " . $e->getMessage();
        die();
    }

    return $resultat;

    // Ce code n'est pas nécessaire ici et n'aura aucun effet car il est situé après le "return".
    // Vous pouvez le supprimer.
    if (!empty($resultat)) {
        echo "<script type='text/javascript'>
        alert('Tableau non vide')
        document.location.href = '../?action=connxeion';</script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Tableau vide')
        document.location.href = '../?action=connexion';</script>";
    }
}
?>