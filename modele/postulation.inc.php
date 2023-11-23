<?php


function postulationInsertClient(){
    
    if (isset($_POST['annonce_id']) && isset($_POST['motivation']) && isset($_POST['utilisateur_id'])) {
        $motiv = $_POST['motivation'];
        $idAnnonce = $_POST['annonce_id'];
        $idUtilisateur = $_POST['utilisateur_id'];
        $heure = date('Y-m-d');



        try {

        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO requete (type, ann_ID, ult_ID, motivation, `datePostule`) VALUES (1, :ann_ID, :ult_ID, :motivation, :date)");
        $req->bindParam(':ann_ID', $idAnnonce);
        $req->bindParam(':ult_ID', $idUtilisateur);
        $req->bindParam(':motivation', $motiv);
        $req->bindParam(':date', $heure);
        $req->execute();

        echo "Les données postulation ont été insérées avec succès.";
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    }
}

function postulationInsertClientNew(){
    
    if (isset($_POST['annonce_id']) && isset($_POST['motivation'])) {
        $motiv = $_POST['motivation'];
        $idAnnonce = $_POST['annonce_id'];
        $idUtilisateur = getLastUtilisateur();
        try {

        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO requete (type , ann_ID, ult_ID , motivation ) VALUES (1, :ann_ID , :ult_ID, :motivation)");
        $req->bindParam(':ann_ID', $idAnnonce);
        $req->bindParam(':ult_ID', $idUtilisateur['ult_ID']);
        $req->bindParam(':motivation', $motiv);
        $req->execute();

        echo "Les données postulation ont été insérées avec succès.";
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    }
}


function getAnnoncePostule($id) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT a.titre AS titre_annonce, r.datePostule, a.ann_ID FROM annonce a JOIN requete r ON a.ann_ID = r.ann_ID JOIN utilisateur u ON r.ult_ID = u.ult_ID WHERE u.ult_ID = :id AND type=1;");
        $req->bindParam(':id', $id);
        $req->execute();

        // Récupérer tous les résultats sous forme de tableau associatif
        $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function deleteAnnoncePostule($idA , $idU) {

    try {
    $cnx = connexionPDO();
    $req = $cnx->prepare("DELETE FROM requete WHERE ult_ID = :id_ult && ann_ID = :id_ann");
    $req->bindParam(':id_ult', $idU);
    $req->bindParam(':id_ann', $idA);
    
    $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function empecheDoublonPostule($idA , $idU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COUNT(*) as total FROM requete WHERE ann_ID = :ida and ult_id= :idu and type=1");
        $req->bindParam(':idu', $idU);
        $req->bindParam(':ida', $idA);
        $req->execute();
        

        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function postuleInsertUlt(){

    if (isset($_POST['mail']) ) {
        $mail = $_POST['mail'];
        try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO utilisateur (mail , mdp, role) VALUES (:mail, 'password' , 'client')");
        $req->bindParam(':mail', $mail);
        $req->execute();
        addInformationID();
        postulationInsertClientNew();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    }
}


function addInformationID(){

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['tel'])) {

        try {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $tel = $_POST['tel'];
        $cv = "CV.pdf";
        $id = getLastUtilisateur();


        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO information SET nom = :nom, prenom = :prenom, age = :age, tel = :tel, CV = :cv, ult_ID = :id");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':age', $age);
        $req->bindParam(':tel', $tel);
        $req->bindParam(':cv', $cv);
        $req->bindParam(':id', $id['ult_ID']);

        $req->execute();

        echo "Les données ont été insérées avec succès.";

        
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    }
}

function getJobPostulebyID($id){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT a.titre AS titre_annonce, r.datePostule, a.ann_ID FROM annonce a JOIN requete r ON a.ann_ID = r.ann_ID JOIN utilisateur u ON r.ult_ID = u.ult_ID WHERE u.ult_ID = :id AND type=2;");
        $req->bindParam(':id', $id);
        $req->execute();

        // Récupérer tous les résultats sous forme de tableau associatif
        $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>