<?php

# Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

# Fonction pour récupérer toutes les annonces triées par heure décroissante
function getAnnonce()
{
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Requête SQL pour récupérer toutes les annonces triées par heure décroissante
        $req = $cnx->prepare("select * from annonce ORDER BY heure DESC");
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = array();

        # Boucle pour parcourir toutes les lignes de résultat
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $resultat;
}

# Fonction pour récupérer les détails d'une annonce en fonction de son ID
function getSuitAnnonce($annonce_ID)
{
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Requête SQL pour récupérer les détails d'une annonce en fonction de son ID
        $req = $cnx->prepare("SELECT vehicule, prix, statue FROM annonce WHERE ann_ID = :id");
        $req->bindParam(':id', $annonce_ID);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = array();

        # Boucle pour parcourir toutes les lignes de résultat
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $resultat;
}

# Fonction pour obtenir le nombre total d'annonces
function getNumberAnnonce()
{
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Requête SQL pour obtenir le nombre total d'annonces
        $req = $cnx->prepare("SELECT COUNT(*) AS total FROM annonce");
        $req->execute();
        
        $ligne = $req->fetchColumn();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $ligne;
}

# Fonction pour récupérer les détails d'une annonce en fonction de l'ID de l'utilisateur
function getAnnonceId($id)
{
    $resultat = array();
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Requête SQL pour récupérer les détails d'une annonce en fonction de l'ID de l'utilisateur
        $req = $cnx->prepare("SELECT * from annonce where uld_ID=:id");
        $req->bindValue(':id', $id);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $resultat;
}

# Fonction pour obtenir la dernière annonce (triée par ID décroissant)
function getLastAnnonce(){
    $resultat = array();
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Requête SQL pour obtenir la dernière annonce (triée par ID décroissant)
        $req = $cnx->prepare("SELECT * FROM annonce ORDER BY ann_ID DESC LIMIT 1;");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $resultat;
}

?>