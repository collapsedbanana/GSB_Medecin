<?php

class MedicamentDAO{
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addMedicament($medicament){
        try{
            $req = $this->conn->prepare("INSERT INTO medicament (idMedicament,nomCommercial,composition,effets,contreIndications,idFamille) VALUES (:idMedicament,:nomCommercial,:composition,:effets,:contreIndications,:idFamille)");
            $req->bindValue(":idMedicament", $medicament->getId());
            $req->bindValue(":nomCommercial", $medicament->getNomCommercial());
            $req->bindValue(":composition", $medicament->getComposition());
            $req->bindValue(":effets", $medicament->getEffets());
            $req->bindValue(":contreIndications", $medicament->getContreIndications());
            $req->bindValue(":idFamille", $medicament->getFamille());

            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    } 

    public function updateMedicament($medicament){
        try{
            $req = $this->conn->prepare("UPDATE medicament SET nomCommercial=:nomCommercial,composition=:composition,effets=:effets,contreIndications=:contreIndications, idFamille=:idFamille WHERE idMedicament=:idMedicament");
            $req->bindValue(":idMedicament", $medicament->getId());
            $req->bindValue(":nomCommercial", $medicament->getNomCommercial());
            $req->bindValue(":composition", $medicament->getComposition());
            $req->bindValue(":effets", $medicament->getEffets());
            $req->bindValue(":contreIndications", $medicament->getContreIndications());
            $req->bindValue(":idFamille", $medicament->getFamille());

            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteMedicament($medicament){
        try{
            $req = $this->conn->prepare("DELETE FROM medicament WHERE idMedicament=:idMedicament");
            $req->bindValue(":idMedicament", $medicament->getId());
            
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getMedicaments(){
        try{
            $req = $this->conn->prepare("SELECT * FROM medicament");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $medicaments = array();
            foreach($result as $medicament){
                $medicaments[] = new Medicament($medicament['idMedicament'], $medicament['nomCommercial'], $medicament['composition'], $medicament['effets'], $medicament['contreIndications'], $medicament['idFamille']);
            }
            return $medicaments;
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}