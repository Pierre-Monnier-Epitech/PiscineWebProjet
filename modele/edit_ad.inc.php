<?php
// Fonction pour mettre à jour une annonce
function update_ad($ad_Id, $title, $description, $vehicle, $price, $status) {
    try {
        // Établit une connexion PDO à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour mettre à jour les informations de l'annonce en fonction de son ID
        $stmt = $cnx->prepare("UPDATE annonce SET titre = :title, description = :description, vehicule = :vehicle, prix = :price, statue = :status WHERE ann_ID = :ad_id");
        $stmt->bindParam(':ad_id', $ad_Id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':vehicle', $vehicle, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>