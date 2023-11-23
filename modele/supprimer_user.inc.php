<?php

#import de la base de donnée
include_once "connexionBDDepijob.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteUser'])) {
    $idToDelete = $_POST['userID'];
    delete_user($idToDelete);
}

function delete_user($id)
{
    try {
        $cnx = connexionPDO();
        #requette SQL pour supprimer le information d'un utilisateur en fonction de l'ID de l'utilisateur
        $stmt = $cnx->prepare("DELETE FROM information WHERE ult_ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        #requette SQL pour supprimer un utilisateur en fonction de son ID
        $stmt = $cnx->prepare("DELETE FROM utilisateur WHERE ult_ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

?>