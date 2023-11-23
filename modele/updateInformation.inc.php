<?php
# Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

# Fonction pour récupérer les informations d'un utilisateur par son ID
function updateInfo(){
    $result = array();

    try {
        $cnx = connexionPDO();
        
        # Prépare une requête SQL pour sélectionner les informations d'un utilisateur avec un ID spécifique (dans ce cas, ID 1)
        $req = $cnx->prepare("SELECT * FROM utilisateur WHERE ult_id = 1");
        $req->execute();
        
        # Récupère les informations de l'utilisateur sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

        # Encode les informations en format JSON et les affiche
        echo json_encode($resultat);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    return $resultat;
}
?>