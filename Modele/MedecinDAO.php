<?php

class MedecinDAO{
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addMedecin($medecin){
        try{
            $req = $this->conn->prepare("INSERT INTO medecin (idMedecin,nom,prenom,adresse,tel,specialite,departement) VALUES (:idMedecin,:nom,:prenom,:adresse,:tel,:specialite,:departement)");
            
            $req->bindValue(":idMedecin", $medecin->getId());
            $req->bindValue(":nom", $medecin->getNom());
            $req->bindValue(":prenom", $medecin->getPrenom());
            $req->bindValue(":adresse", $medecin->getAdresse());
            $req->bindValue(":tel", $medecin->getTel());
            $req->bindValue(":specialite", $medecin->getSpecialite());
            $req->bindValue(":departement", $medecin->getDepartement());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function updateMedecin($medecin){
        try{
            $req = $this->conn->prepare("UPDATE medecin SET nom=:nom,prenom=:prenom,adresse=:adresse,tel=:tel,specialite=:specialite,departement=:departement WHERE idMedecin=:idMedecin");
            
            $req->bindValue(":idMedecin", $medecin->getId());
            $req->bindValue(":nom", $medecin->getNom());
            $req->bindValue(":prenom", $medecin->getPrenom());
            $req->bindValue(":adresse", $medecin->getAdresse());
            $req->bindValue(":tel", $medecin->getTel());
            $req->bindValue(":specialite", $medecin->getSpecialite());
            $req->bindValue(":departement", $medecin->getDepartement());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteMedecin($medecin){
        try{
            $req = $this->conn->prepare("DELETE FROM medecin WHERE idMedecin=:idMedecin");
            
            $req->bindValue(":idMedecin", $medecin->getId());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getMedecins(){
        try{
            $req = $this->conn->prepare("SELECT * FROM medecin");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $medecins = array();
            foreach($result as $medecin){
                $medecins[] = new Medecin($medecin['IdMedecin'], $medecin['nom'], $medecin['prenom'], $medecin['adresse'], $medecin['tel'], $medecin['specialite'], $medecin['departement']);
            }
            return $medecins;
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}