<?php

# Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

# Fonction pour récupérer tous les utilisateurs
function user()
{
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Requête SQL pour récupérer toutes les lignes de la table "utilisateur"
        $req = $cnx->prepare("select * from utilisateur");
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

?>