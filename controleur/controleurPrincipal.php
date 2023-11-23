<?php

function controleurPrincipal($action)
{
    // Étape 1: Définition d'un tableau associatif pour associer des actions à des fichiers
    $lesActions = array();
    $lesActions["defaut"] = "menu.php";  // Action par défaut
    $lesActions["profil"] = "profil.php";  // Page de profil
    $lesActions["updateProfil"] = "updateProfil.php";  // Page de mise à jour du profil
    $lesActions["updateAd"] = "updateAd.php";  // Page de mise à jour d'annonce
    $lesActions["connexion"] = "connexion.php";  // Page de connexion
    $lesActions["inscription"] = "inscription.php";  // Page d'inscription
    $lesActions["deconnexion"] = "deconnexion.php";  // Page de déconnexion
    $lesActions["admin"] = "admin.php";  // Page d'administration
    $lesActions["newInformation"] = "newInformation.php";  // Page de création d'informations
    $lesActions["deleteAnnonceUser"] = "admin.php";  // Page de suppression d'annonce par l'utilisateur

    // Étape 2: Vérification si l'action spécifiée existe dans le tableau
    if (array_key_exists($action, $lesActions)) {
        // Étape 3: Si l'action est trouvée, retourne le nom du fichier associé à l'action
        return $lesActions[$action];
    } else {
        // Étape 4: Si l'action n'est pas trouvée, retourne par défaut la page du menu
        return $lesActions["defaut"];
    }
}