<?php

#import de la base de donnée
include_once "connexionBDDepijob.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user_role'])) {
    $userID = $_POST['userID'];
    $newRole = $_POST['role'];

    update_user_role($userID, $newRole);

    echo "Le rôle de l'utilisateur avec l'ID $userID a été mis à jour avec le rôle $newRole.";
}

function update_user_role($id, $role)
{
    try {
        $cnx = connexionPDO();
        #requette SQL pour modifier le role d'un utilisateur dans la table utilisateur en fonction de l'ID
        $stmt = $cnx->prepare("UPDATE utilisateur SET role = :role WHERE ult_ID = :id");
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
