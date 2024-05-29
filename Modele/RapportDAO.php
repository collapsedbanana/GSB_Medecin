<?php

class RapportDAO{
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addRapport($rapport){
        try{
            $req = $this->conn->prepare("INSERT INTO rapport (idRapport,dateRapport,motif,bilan,idVisiteur,idMedecin) VALUES (:idRapport,:dateRapport,:motif,:bilan,:visiteur,:medecin)");
            $req->bindValue(":idRapport", $rapport->getId());
            $req->bindValue(":dateRapport", $rapport->getDate());
            $req->bindValue(":motif", $rapport->getMotif());
            $req->bindValue(":bilan", $rapport->getBilan());
            $req->bindValue(":visiteur", $rapport->getVisiteur());
            $req->bindValue(":medecin", $rapport->getMedecin());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function updateRapport($rapport){
        try{
            $req = $this->conn->prepare("UPDATE rapport SET dateRapport=:dateRapport,motif=:motif,bilan=:bilan,visiteur=:visiteur,medecin=:medecin WHERE idRapport=:idRapport");
            $req->bindValue(":idRapport", $rapport->getId());
            $req->bindValue(":dateRapport", $rapport->getDate());
            $req->bindValue(":motif", $rapport->getMotif());
            $req->bindValue(":bilan", $rapport->getBilan());
            $req->bindValue(":visiteur", $rapport->getVisiteur());
            $req->bindValue(":medecin", $rapport->getMedecin());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteRapport($rapport){
        try{
            $req = $this->conn->prepare("DELETE FROM rapport WHERE idRapport=:idRapport");
            $req->bindValue(":idRapport", $rapport->getId());
            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getRapports(){
        try{
            $req = $this->conn->prepare("SELECT * FROM rapport");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $rapports = array();
            foreach($result as $rapport){
                $rapports[] = new Rapport($rapport['idRapport'], $rapport['dateRapport'], $rapport['motif'], $rapport['bilan'], $rapport['visiteur'], $rapport['medecin']);
            }
            return $rapports;
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getSmallestIdRapport(){
        try{
            $req = $this->conn->prepare("SELECT MIN(r.IdRapport + 1)
                                        FROM Rapport r 
                                        LEFT JOIN Rapport r_next   
                                        ON r.IdRapport + 1 = r_next.IdRapport 
                                        WHERE r_next.IdRapport IS NULL LIMIT 1");
            $req->execute();
                
            return $req->fetch(PDO::FETCH_ASSOC)["MIN(r.IdRapport + 1)"];
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}