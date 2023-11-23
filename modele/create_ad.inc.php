<?php
// Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

// Fonction pour créer une nouvelle annonce
function create_ad($titre, $description, $heure, $vehicule, $prix, $statue)
{
    // Obtient la date et l'heure actuelles
    $heure = date('Y-m-d');

    try {
        // Établit une connexion PDO à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour insérer une nouvelle annonce avec les données fournies
        $req = $cnx->prepare("INSERT INTO annonce (titre, description, heure, vehicule, prix, statue) VALUES (:titre, :description, :heure, :vehicule, :prix, :statue)");
        $req->bindParam(':titre', $titre, PDO::PARAM_STR);
        $req->bindParam(':description', $description, PDO::PARAM_STR);
        $req->bindParam(':heure', $heure, PDO::PARAM_STR); 
        $req->bindParam(':vehicule', $vehicule, PDO::PARAM_STR);
        $req->bindParam(':prix', $prix, PDO::PARAM_INT);
        $req->bindParam(':statue', $statue, PDO::PARAM_STR);
        $req->execute();

        // Affiche un message de succès
        echo "L'annonce a été créée avec succès.";
        
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>