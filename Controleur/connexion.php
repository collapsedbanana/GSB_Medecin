<?php

include_once "modele/authentification.php";
include_once "modele/VisiteurDAO.php";
include_once "modele/Visiteur.php";


$dao=new VisiteurDAO();
    $VisiteurDAO=$dao->getVisiteurs();
    foreach ($VisiteurDAO as $v) {
        $listeVisiteurs[] = array(
        "login" => $v->getLogin(),
        "mdp" => $v->getMdp()
    );
}



if(isset($_POST['login'])&&isset($_POST['mdp'])){
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
}
else{
    $login="";
    $mdp="";
}

login($login,$mdp);

if(isLoggedOn()){
    include "Vue/monProfil.html.php";
}
else{
    include "Vue/connexion.html.php";
}
