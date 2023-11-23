<?php
// Fonction pour supprimer une offre à laquelle un utilisateur a postulé
function deleteOffrePostule($idA) {


    try {
        // Établit une connexion PDO à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour supprimer une annonce en fonction de son ID
        $req = $cnx->prepare("DELETE FROM annonce WHERE ann_ID = :id_ann");

        // Lie l'ID de l'annonce à la variable de la requête
        $req->bindParam(':id_ann', $idA);
    
        // Exécute la requête de suppression
        $req->execute();
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>