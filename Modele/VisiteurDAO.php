<?php

class VisiteurDAO{
    private $conn;

    public function __construct(){
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addVisiteur($visiteur){
        try{
            $req = $this->conn->prepare("INSERT INTO visiteur (idVisiteur,nom,prenom,login,mdp,adresse,cp,ville,dateEmbauche) VALUES (:idVisiteur,:nom,:prenom,:login,:mdp,:adresse,:cp,:ville,:dateEmbauche)");
            $req->bindValue(":idVisiteur", $visiteur->getId());
            $req->bindValue(":nom", $visiteur->getNom());
            $req->bindValue(":prenom", $visiteur->getPrenom());
            $req->bindValue(":login", $visiteur->getLogin());
            $req->bindValue(":mdp", $visiteur->getMdp());
            $req->bindValue(":adresse", $visiteur->getAdresse());
            $req->bindValue(":cp", $visiteur->getCp());
            $req->bindValue(":ville", $visiteur->getVille());
            $req->bindValue(":dateEmbauche", $visiteur->getDateEmbauche());

            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function updateVisiteur($visiteur){
        try{
            $req = $this->conn->prepare("UPDATE visiteur SET nom=:nom,prenom=:prenom,login=:login,mdp=:mdp,adresse=:adresse,cp=:cp,ville=:ville,dateEmbauche=:dateEmbauche WHERE idVisiteur=:idVisiteur");
            $req->bindValue(":idVisiteur", $visiteur->getId());
            $req->bindValue(":nom", $visiteur->getNom());
            $req->bindValue(":prenom", $visiteur->getPrenom());
            $req->bindValue(":login", $visiteur->getLogin());
            $req->bindValue(":mdp", $visiteur->getMdp());
            $req->bindValue(":adresse", $visiteur->getAdresse());
            $req->bindValue(":cp", $visiteur->getCp());
            $req->bindValue(":ville", $visiteur->getVille());
            $req->bindValue(":dateEmbauche", $visiteur->getDateEmbauche());

            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function deleteVisiteur($visiteur){
        try{
            $req = $this->conn->prepare("DELETE FROM visiteur WHERE idVisiteur=:idVisiteur");
            $req->bindValue(":idVisiteur", $visiteur->getId());

            $req->execute();
        } catch(PDOException $e){
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getVisiteurs(){
        try{
            $req = $this->conn->prepare("SELECT * FROM visiteur");

            $req->execute();

            $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
            if($resultat){
                foreach($resultat as $ligne){
                    $visiteur = new Visiteur(
                        $ligne["idVisiteur"],
                        $ligne["nom"],
                        $ligne["prenom"],
                        $ligne["login"],
                        $ligne["mdp"],
                        $ligne["adresse"],
                        $ligne["cp"],
                        $ligne["ville"],
                        $ligne["dateEmbauche"]
                    );
                    $visiteurs[] = $visiteur;
                }
                return $visiteurs;
            }
            else{
                return null;
            }

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }

    public function getVisiteurById($id){
        try{
            $req = $this->conn->prepare("SELECT * FROM visiteur WHERE idVisiteur=:idVisiteur");
            $req->bindValue(":idVisiteur", $id);

            $req->execute();

            $resultat=$req->fetch(PDO::FETCH_ASSOC);
            if($resultat){
                $visiteur = new Visiteur(
                    $resultat["idVisiteur"],
                    $resultat["nom"],
                    $resultat["prenom"],
                    $resultat["loginV"],
                    $resultat["mdpV"],
                    $resultat["adresse"],
                    $resultat["cp"],
                    $resultat["ville"],
                    $resultat["dateEmbauche"]
                );
                return $visiteur;
            }
            else{
                return null;
            }

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }

    public function getVisiteurByLogin($login){
        try{
            $req = $this->conn->prepare("SELECT * FROM visiteur WHERE login=:login");
            $req->bindValue(":login", $login);

            $req->execute();

            $resultat=$req->fetch(PDO::FETCH_ASSOC);
            if($resultat){
                $visiteur = new Visiteur(
                    $resultat["idVisiteur"],
                    $resultat["nom"],
                    $resultat["prenom"],
                    $resultat["loginV"],
                    $resultat["mdpV"],
                    $resultat["adresse"],
                    $resultat["cp"],
                    $resultat["ville"],
                    $resultat["dateEmbauche"]
                );
                return $visiteur;
            }
            else{
                return null;
            }

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }

    public function getSmallestIdVisiteur(){
        try{
            $req = $this->conn->prepare("SELECT MIN(v.idVisiteur + 1)
                                        FROM Visiteur v 
                                        LEFT JOIN Visiteur v_next   
                                        ON v.idVisiteur + 1 = v_next.idVisiteur 
                                        WHERE v_next.idVisiteur IS NULL LIMIT 1");
            $req->execute();
                
            return $req->fetch(PDO::FETCH_ASSOC)["MIN(v.idVisiteur + 1)"];

        } catch(PDOException $e){
            print "Erreur !: ". $e->getMessage();
            die();
        }
    }
    
}