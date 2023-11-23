<?php

# Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

# Fonction pour récupérer un utilisateur par son adresse e-mail
function getUtilisateurByMail($mail)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        # Prépare une requête SQL pour sélectionner un utilisateur par son adresse e-mail
        $req = $cnx->prepare("SELECT * FROM utilisateur WHERE mail=:mailUtilisateur");
        $req->bindValue(':mailUtilisateur', $mail, PDO::PARAM_STR);
        $req->execute();

        # Récupère les informations de l'utilisateur sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

# Fonction pour récupérer le dernier utilisateur enregistré
function getLastUtilisateur(){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        # Prépare une requête SQL pour récupérer le dernier utilisateur enregistré
        $req = $cnx->prepare("SELECT * FROM utilisateur ORDER BY ult_ID DESC LIMIT 1;");
        $req->execute();

        # Récupère les informations du dernier utilisateur sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

# Fonction pour vérifier si un utilisateur est associé à une entreprise
function verifUltWithEntreprise($id){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        # Prépare une requête SQL pour vérifier si l'utilisateur est associé à une entreprise
        $req = $cnx->prepare("SELECT * from utilisateur WHERE ent_ID IS NULL and ult_ID = :id");
        $req->bindValue(':id', $id);
        $req->execute();

        # Récupère les informations de l'utilisateur sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

# Fonction pour récupérer le rôle d'un utilisateur
function getRoleUlt($id){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        # Prépare une requête SQL pour récupérer le rôle d'un utilisateur
        $req = $cnx->prepare("SELECT role from utilisateur WHERE ult_ID = :id");
        $req->bindValue(':id', $id);
        $req->execute();

        # Récupère le rôle de l'utilisateur sous forme de tableau associatif
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

# Fonction pour insérer l'ID de l'entreprise dans un utilisateur
function insertEntIDInUlt($idu, $idE){
    try {
        $cnx = connexionPDO();
        # Prépare une requête SQL pour mettre à jour l'ID de l'entreprise et le rôle de l'utilisateur
        $req = $cnx->prepare("UPDATE utilisateur SET ent_ID = (:idEnt), role = 'employer' where ult_ID = :idu");
        $req->bindValue(':idEnt', $idE);
        $req->bindValue(':idu', $idu);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>
