<?php

# Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

# Inclusion du fichier utilisateur.inc.php (non inclus dans le code, assurez-vous qu'il existe)
include_once "utilisateur.inc.php";

# Fonction pour vérifier les données du formulaire
function verif(){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $tel = $_POST['tel'];
    $description = $_POST['description'];
    $vehicule = $_POST['drone'];

    # Vérification de l'existence de données
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['age']) && isset($_POST['tel']) && isset($_POST['description']) && isset($_POST['nom']) ){
        # Fonctions de validation pour chaque champ
        function validatePrenom($prenom) {
            return !empty($prenom);
        }

        function validateNom($nom) {
            return !empty($nom);
        }

        function validateEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        function validateAge($age) {
            return filter_var($age, FILTER_VALIDATE_INT) && (int)$age > 0;
        }

        function validatePhone($phone) {
            return true;  # Personnalisez cette fonction pour valider les numéros de téléphone
        }

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $tel = $_POST['tel'];
        $description = $_POST['description'];
        $vehicule = $_POST['drone'];

        # Vérification des données avec les fonctions de validation
        if (validateNom($nom) && validatePrenom($prenom) && validateEmail($email) &&
            validateAge($age) && validatePhone($tel)) {
            try {
                # Récupération de l'adresse e-mail de l'utilisateur
                $mail =getUtilisateurByMail($email);

                $cnx = connexionPDO();
                # Prépare une requête SQL pour mettre à jour les informations de l'utilisateur
                $req = $cnx->prepare("UPDATE information SET nom = :nom, prenom = :prenom, age = :age, tel = :tel, description = :description, vehicule = :vehicule, CV = :cv WHERE ult_ID = :id");
                $req->bindParam(':nom', $nom);
                $req->bindParam(':prenom', $prenom);
                $req->bindParam(':age', $age);
                $req->bindParam(':tel', $tel);
                $req->bindParam(':description', $description);
                $req->bindParam(':vehicule', $vehicule);
                $req->bindParam(':cv', $cv);  # Le nom du fichier CV doit être précisé
                $req->bindParam(':id', $mail['ult_ID']);

                $req->execute();

                echo "Les données ont été insérées avec succès.";

            } catch (PDOException $e) {
                echo "Erreur d'insertion : " . $e->getMessage();
            }      
        }
        else {
            echo "Les informations fournies ne respectent pas les normes.";
        }
    }
}

# Note : Assurez-vous que le nom du fichier CV est correctement spécifié dans le code.

?>
