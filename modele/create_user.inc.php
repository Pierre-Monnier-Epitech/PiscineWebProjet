<?php
// Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

// Fonction pour créer un nouvel utilisateur
function create_user($email, $password)
{
    try {
        // Établit une connexion PDO à la base de données
        $cnx = connexionPDO();

        // Requête SQL pour insérer un nouvel utilisateur avec l'email, le mot de passe et le rôle
        $req = $cnx->prepare("INSERT INTO utilisateur (mail, mdp, role) VALUES (:mail, :mdp, :role)");
        $req->bindParam(':mail', $email, PDO::PARAM_STR);
        $req->bindParam(':mdp', $password, PDO::PARAM_STR);
        $req->bindValue(':role', 'client', PDO::PARAM_STR); // Par défaut, le nouveau utilisateur a le rôle 'client'
        $req->execute();

        // Affiche un message de succès
        echo "L'utilisateur a été créé avec succès.";

        // Redirige vers la page d'administration après la création de l'utilisateur
        header("Location: ?action=admin");
        exit();
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>