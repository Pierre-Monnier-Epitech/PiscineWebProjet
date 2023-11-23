<?php
// Inclusion du fichier de connexion à la base de données
include_once "connexionBDDepijob.inc.php";

// Fonction pour traiter le processus d'inscription
function handleInscription() {
    $errors = array();

    if (isset($_POST['mdpInscription']) && isset($_POST['mailInscription']) && isset($_POST['mdpVerif'])) {
        $cnx = connexionPDO(); // Établir une connexion PDO à la base de données

        // Valider l'adresse e-mail
        if (!filter_var($_POST['mailInscription'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse e-mail n'est pas valide.";
        }

        // Vérifier les doublons d'adresse e-mail
        $req = $cnx->prepare("SELECT mail FROM utilisateur");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultat as $verif) {
            if ($verif['mail'] == $_POST['mailInscription']) {
                $errors[] = "Cette adresse e-mail est déjà utilisée.";
                break;
            }
        }

        // Vérifier la correspondance des mots de passe
        if ($_POST['mdpInscription'] !== $_POST['mdpVerif']) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }

        // Insérer dans la base de données s'il n'y a pas d'erreurs
        if (empty($errors)) {
            try {
                $mail = $_POST['mailInscription'];
                $mdp = $_POST['mdpInscription'];

                $req = $cnx->prepare("INSERT INTO utilisateur (mail, mdp, role) VALUES (:mail, :mdp, 'client')");
                $req->bindParam(':mail', $mail);
                $req->bindParam(':mdp', $mdp);
                $req->execute();

                $_SESSION['registration_success'] = true;
            } catch (PDOException $e) {
                $errors[] = "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }
    } else {
        $errors[] = "Tous les champs doivent être remplis.";
    }

    return $errors;
}
?>