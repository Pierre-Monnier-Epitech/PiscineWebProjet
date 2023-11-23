<?php
# Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

# Fonction pour créer une entreprise avec des informations spécifiées
function create_ent($nom, $type, $ville, $adresse, $description)
{
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Préparation de la requête SQL pour insérer une nouvelle entreprise
        $req = $cnx->prepare("INSERT INTO entreprise (nom, titre, ville, adresse, description) VALUES (:nom, :titre, :ville, :adresse, :description)");
        
        # Liaison des paramètres avec les valeurs
        $req->bindParam(':nom', $nom);
        $req->bindParam(':titre', $type);
        $req->bindParam(':ville', $ville); 
        $req->bindParam(':adresse', $adresse);
        $req->bindParam(':description', $description);
        
        # Exécution de la requête
        $req->execute();

        echo "L'entreprise a été créée avec succès.";
    } catch (PDOException $e) {
        # Gestion des erreurs PDO
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

# Fonction pour récupérer la dernière entreprise créée
function getLastEntreprise(){
    $resultat = array();
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Préparation de la requête SQL pour sélectionner la dernière entreprise
        $req = $cnx->prepare("SELECT * FROM entreprise ORDER BY ent_ID DESC LIMIT 1;");
        $req->execute();

        # Récupération de la dernière entreprise sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        # Gestion des erreurs PDO
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

# Fonction pour sélectionner toutes les entreprises
function selectAllEnt(){
    $resultat = array();
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Préparation de la requête SQL pour sélectionner toutes les entreprises
        $req = $cnx->prepare("SELECT * FROM entreprise");
        $req->execute();

        # Récupération de toutes les entreprises sous forme d'un tableau de tableaux associatifs
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        # Gestion des erreurs PDO
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

# Fonction pour sélectionner une entreprise spécifique par son ID
function selectAllEntrepriseByID($id){
    $resultat = array();
    try {
        # Connexion à la base de données
        $cnx = connexionPDO();

        # Préparation de la requête SQL pour sélectionner une entreprise par son ID
        $req = $cnx->prepare("SELECT * FROM entreprise where ent_ID=:id");
        $req->bindParam(':id', $id);
        $req->execute();

        # Récupération de l'entreprise sous forme d'un tableau de tableaux associatifs
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        # Gestion des erreurs PDO
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>