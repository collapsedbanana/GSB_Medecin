<?php

class FamilleDAO{
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addFamille($famille){
        try{
            $req = $this->conn->prepare("INSERT INTO famille (idFamille,libelle) VALUES (:idFamille,:libelle)");

            $req->bindValue(":idFamille", $famille->getId());
            $req->bindValue(":libelle", $famille->getLibelle());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function updateFamille($famille){
        try{
            $req = $this->conn->prepare("UPDATE famille SET libelle=:libelle WHERE idFamille=:idFamille");

            $req->bindValue(":idFamille", $famille->getId());
            $req->bindValue(":libelle", $famille->getLibelle());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteFamille($famille){
        try{
            $req = $this->conn->prepare("DELETE FROM famille WHERE idFamille=:idFamille");

            $req->bindValue(":idFamille", $famille->getId());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getFamilles(){
        try{
            $req = $this->conn->prepare("SELECT * FROM famille");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $familles = array();
            foreach($result as $famille){
                $familles[] = new Famille($famille['idFamille'], $famille['libelle']);
            }
            return $familles;
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}