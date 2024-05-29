<?php

include_once "modele/authentification.php";
include_once "modele/VisiteurDAO.php";
include_once "modele/Visiteur.php";

$dao=new VisiteurDAO();
    $VisiteursDAO=$dao->getVisiteurs();
    foreach ($VisiteursDAO as $v) {
        $listeVisiteurs[] = array(
        "login" => $v->getLogin(),
    );
}

ob_start();

if(isLoggedOn()){
    include "Vue/monProfil.html.php";
}
else{
    include "Vue/inscription.html.php";
}

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) && isset($_POST["cp"]) && isset($_POST["ville"]) && isset($_POST["dateEmbauche"]) && isset($_POST["login"]) && isset($_POST["mdp"]) && isset($_POST["mdpVerif"])){
    $id = $dao->getSmallestIdVisiteur();
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $cp = $_POST["cp"];
    $ville = $_POST["ville"];
    $dateEmbauche = $_POST["dateEmbauche"];
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];

    // A AJOUTER : HASHAGE DES MOTS DE PASSE
    //$mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
    //$mdpVerifHash = password_hash($mdpVerif, PASSWORD_DEFAULT);

    $visiteur = new Visiteur($id, $nom, $prenom, $login, $mdp /*$mdpHash*/,$adresse, $cp, $ville, $dateEmbauche);
    $dao->addVisiteur($visiteur);

    login($login, $mdp);

    if(isLoggedOn()){
        header("Location: ./?action=monProfil");
    }
    else{
        header("Location: ./?action=connexion");
    }
}

// Fin de la mise en tampon de sortie et envoi du contenu au navigateur
ob_end_flush();
