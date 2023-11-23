<?php 

#import de la base de donnée
include_once "connexionBDDepijob.inc.php";

function adv($id)
{
    try {
        $cnx = connexionPDO();
        #requette SQL pour prendre tout de la table annonce en fonction de l'ID
        $req = $cnx->prepare("SELECT * FROM annonce WHERE ann_ID = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
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