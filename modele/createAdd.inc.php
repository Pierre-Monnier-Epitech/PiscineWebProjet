<?php
// Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

// Inclusion du fichier annonce.inc.php (s'il contient des fonctions requises)
include_once "annonce.inc.php";

// Fonction pour créer une nouvelle annonce
function create_ad($titre, $description, $vehicule, $prix, $statue)
{
    // Récupère la date actuelle
    $heure = date('Y-m-d');

    try {
        // Établit une connexion PDO à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour insérer une nouvelle annonce avec le titre, la description, la date, vehiculisé ou pas, le prix et le statue dans la table annonce
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

// Fonction pour créer une requête de postulation
function createRequeteAdd($idUlt){

    // Récupère l'ID de la dernière annonce
    $idAnn = getLastAnnonce();
    // Récupère la date actuelle
    $heure = date('Y-m-d');

    try {
        // Établit une connexion PDO à la base de données
        $cnx = connexionPDO();
        // Requête SQL pour insérer une nouvelle requête de type 2 (candidature) avec l'ID de l'annonce, l'ID de l'utilisateur et la date de postulation
        $req = $cnx->prepare("INSERT INTO requete (type , ann_ID, ult_ID , datePostule ) VALUES (2, :ann_ID , :ult_ID, :date)");
        $req->bindParam(':ann_ID', $idAnn['ann_ID']);
        $req->bindParam(':ult_ID', $idUlt);
        $req->bindParam(':date', $heure);
            
        $req->execute();

        // Affiche un message de succès
        echo "Les données postulation ont été insérées avec succès.";
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>