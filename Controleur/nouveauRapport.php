<?php
include_once "modele/authentification.php";
include_once "modele/VisiteurDAO.php";
include_once "modele/Visiteur.php";
include_once "modele/Medecin.php";
include_once "modele/MedecinDAO.php";
include_once "modele/Rapport.php";
include_once "modele/RapportDAO.php";
include_once "modele/Medicament.php";
include_once "modele/MedicamentDAO.php";

//liste des mécedins
$dao=new MedecinDAO();
    $MedecinDAO=$dao->getMedecins();
    foreach ($MedecinDAO as $m) {
        $listeMedecins[] = array(
        "id" => $m->getId(),
        "nom" => $m->getNom(),
        "prenom" => $m->getPrenom(),
        "adresse" => $m->getAdresse(),
        "tel" => $m->getTel(),
        "specialite" => $m->getSpecialite(),
        "coefDepartement" => $m->getDepartement()
    );
}

//liste des médicaments
$dao=new MedicamentDAO();
    $MedicamentDAO=$dao->getMedicaments();
    foreach ($MedicamentDAO as $m) {
        $listeMedicaments[] = array(
        "id" => $m->getId(),
        "nomCommercial" => $m->getNomCommercial(),
        "composition" => $m->getComposition(),
        "effets" => $m->getEffets(),
        "contreIndications" => $m->getContreIndications(),
        "idFamille" => $m->getFamille()
    );
}

include "Vue/nouveauRapport.html.php";

if (isset($_POST["dateVisite"]) && isset($_POST["medecin"]) && isset($_POST["motif"]) && isset($_POST["bilan"])){
    $dao=new VisiteurDAO();
    $idV = $dao->getVisiteurByLogin(getLoginLoggedOn())->getId();
    
    $dao=new RapportDAO();
    $id = $dao->getSmallestIdRapport();
    $dateVisite = $_POST["dateVisite"];
    $medecin = $_POST["medecin"];
    $motif = $_POST["motif"];
    $bilan = $_POST["bilan"];

    $rapport = new Rapport($id, $dateVisite, $motif, $bilan, $idV, $medecin);

    $dao->addRapport($rapport);

    header("Location: ./?action=monProfil");
}
