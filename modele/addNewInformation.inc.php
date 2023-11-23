<?php

# Inclusion des fichiers nécessaires
include_once "connexionBDDepijob.inc.php";
include_once "utilisateur.inc.php";

# Fonction pour vérifier et insérer de nouvelles informations
function verifNewInfo(){

    # Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $tel = $_POST['tel'];
    $description = $_POST['description'];
    $vehicule = $_POST['drone'];

    # Vérification si toutes les données nécessaires sont définies
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['tel']) && isset($_POST['description']) && isset($_POST['nom'])) {

        # Fonction de validation pour le prénom
        function validatePrenom($prenom) {
            return !empty($prenom);
        }

        # Fonction de validation pour le nom
        function validateNom($nom) {
            return !empty($nom);
        }

        # Fonction de validation pour l'email
        function validateEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        # Fonction de validation pour l'âge
        function validateAge($age) {
            return filter_var($age, FILTER_VALIDATE_INT) && (int)$age > 0;
        }

        # Fonction de validation pour le téléphone
        function validatePhone($phone) {
            return true;  
        }

        # Récupération de l'email de l'utilisateur actuel
        $mail = getLastUtilisateur();
        $newmail = getUtilisateurByMail($mail['mail']);

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $tel = $_POST['tel'];
        $description = $_POST['description'];
        $vehicule = $_POST['drone'];

        # Validation des données
        if (validateNom($nom) && validatePrenom($prenom) && validateEmail($newmail['mail']) &&
            validateAge($age) && validatePhone($tel)) {

            try {
                $cv = "CV.pdf";

                # Connexion à la base de données
                $cnx = connexionPDO();

                # Préparation de la requête SQL pour insérer de nouvelles informations dans la table "information"
                $req = $cnx->prepare("INSERT INTO information (nom, prenom, age, tel, description, vehicule, cv, ult_ID) VALUES (:nom, :prenom, :age, :tel, :description, :vehicule, :cv, :id)");
                $req->bindParam(':nom', $nom);
                $req->bindParam(':prenom', $prenom);
                $req->bindParam(':age', $age);
                $req->bindParam(':tel', $tel);
                $req->bindParam(':description', $description);
                $req->bindParam(':vehicule', $vehicule);
                $req->bindParam(':cv', $cv);
                $req->bindParam(':id', $newmail['ult_ID']);

                # Exécution de la requête
                $req->execute();

                echo "Les données ont été insérées avec succès.";
                header("Location: ?action=connexion");
                exit();
            } catch (PDOException $e) {
                echo "Erreur d'insertion : " . $e->getMessage();
            }
        } else {
            echo "Les informations fournies ne respectent pas les normes.";
        }
    }
}
?>