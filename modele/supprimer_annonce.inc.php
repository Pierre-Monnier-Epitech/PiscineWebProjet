<?php
# Import de la base de données
include_once "connexionBDDepijob.inc.php";

# Vérifier si la méthode de la requête est POST et si 'deleteAd' est défini dans la requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteAd'])) {
    # Récupérer l'ID de l'annonce à supprimer depuis la requête POST
    $idToDelete = $_POST['adID'];
    # Appeler la fonction delete_ad avec l'ID de l'annonce à supprimer
    delete_ad($idToDelete);
}

# Fonction pour supprimer une annonce en fonction de son ID
function delete_ad($id)
{
    try {
        $cnx = connexionPDO();
        # Préparer une requête SQL pour supprimer une annonce en fonction de son ID
        $stmt = $cnx->prepare("DELETE FROM annonce WHERE ann_ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        # Exécuter la requête SQL pour supprimer l'annonce
        $stmt->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>