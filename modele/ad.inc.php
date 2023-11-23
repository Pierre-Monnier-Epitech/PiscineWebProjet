<?php

# Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

# Définition de la fonction "ad"
function ad()
{
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Requête SQL pour sélectionner l'ID, le titre et l'heure depuis la table "annonce"
        $req = $cnx->prepare("select ann_ID, titre, heure from annonce");
        $req->execute();

        # Initialisation d'un tableau vide pour stocker les résultats
        $resultat = array();

        # Boucle pour parcourir les résultats et les ajouter au tableau
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        # Gestion des erreurs PDO
        print "Erreur !: " . $e->getMessage();
        die();
    }

    # Retourne le tableau de résultats
    return $resultat;
}

?>