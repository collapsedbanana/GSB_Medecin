<?php
include_once 'connexionPDO.php';
include_once "VisiteurDAO.php";


function login($login, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $VisiteurDAO = new VisiteurDAO();
    $Visit = $VisiteurDAO->getVisiteurByLogin($login);
        if($Visit){
            $mdpBD = $Visit->getMdp();//IMPOSSIBLE DE TROUVER LE MOT DE PASSE D'UN UTILISATEUR INEXISTANT!!

        if (trim($mdpBD) == trim($mdp)) {
            // le mot de passe est celui de l'utilisateur dans la base de donnees
            $_SESSION["login"] = $login;
            $_SESSION["mdp"] = $mdpBD;
        }
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["login"]);
    unset($_SESSION["mdp"]);
}

function getLoginLoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["login"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["login"])) {
        $VisiteurDAO = new VisiteurDAO();
        $Visit = $VisiteurDAO->getVisiteurByLogin($_SESSION["login"]);
        if ($Visit->getLogin() == $_SESSION["login"] && $Visit->getMdp() == $_SESSION["mdp"]){
            $ret = true;
        }
    }
    return $ret;
}