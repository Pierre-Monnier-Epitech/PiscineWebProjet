<?php
// Fonction pour établir une connexion PDO à la base de données MySQL
function connexionPDO()
{
    // Paramètres de connexion à la base de données
    $login = "root";            // Nom d'utilisateur de la base de données
    $mdp = "";                   // Mot de passe de la base de données (vide ici)
    $bd = "epijob";              // Nom de la base de données à laquelle se connecter
    $serveur = "localhost";      // Adresse du serveur de base de données (dans ce cas, local)

    try {
        // Crée une nouvelle instance de la classe PDO et établit une connexion
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

        // Configure le mode d'erreur de PDO pour afficher les exceptions en cas d'erreur
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Renvoie l'objet de connexion PDO pour une utilisation ultérieure
        return $conn;
    } catch (PDOException $e) {
        // En cas d'erreur lors de la connexion, affiche un message d'erreur
        print "Erreur de connexion PDO : " . $e->getMessage();

        // Termine le script en cas d'échec de la connexion
        die();
    }
}
?>