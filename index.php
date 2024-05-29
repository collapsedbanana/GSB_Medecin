<?php
include "controleur/controleurPrincipal.php";
include_once "modele/authentification.php"; // pour pouvoir utiliser isLoggedOn()

if(isset($_GET["action"])){
    $action=$_GET["action"];
}
else{
    $action="defaut";
}

$fichier = controleurPrincipal($action);
include "controleur/$fichier";




