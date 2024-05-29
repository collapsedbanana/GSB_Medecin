<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    $lesActions["menuPrincipal"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["nouveauRapport"] = "nouveauRapport.php";
    $lesActions["modifRapport"] = "modifRapport.php";


    if (array_key_exists($action, $lesActions)){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}