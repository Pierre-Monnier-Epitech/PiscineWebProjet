<?php
include_once "connexionBDDepijob.inc.php";

include_once "utilisateur.inc.php";


function isLoggedOn()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mail"])) {
        $util = getUtilisateurByMail($_SESSION["mail"]);

        if (
            $util["mail"] == $_SESSION["mail"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        } else {
            $ret = false;
        }
    }
    
    return $ret;
}


function login($mail, $mdp)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMail($mail);

    if ($util) {
        $mdpBDD = $util["mdp"];
        $mailBDD = $util["mail"];
        $role = $util["role"];

        if ($mdp == $mdpBDD && $mail == $mailBDD)  {
            $_SESSION["mail"] = $mail;
            $_SESSION["mdp"] = $mdp;
            $_SESSION["role"] = $role;
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "E-mail inconnu";
    }
}


function getMailLoggedOn()
{
    if (isLoggedOn()) {
        $ret = $_SESSION["mail"];
    } else {
        $ret = "";
    }
    return $ret;
}


function logout()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    session_destroy();
}



?>
