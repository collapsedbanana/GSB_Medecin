<?php

class Rapport {
    private $id;
    private $date;
    private $motif;
    private $bilan;
    private $visiteur; //objet
    private $medecin; //objet

    public function __construct($id, $date, $motif, $bilan, $visiteur, $medecin) {
        $this->id = $id;
        $this->date = $date;
        $this->motif = $motif;
        $this->bilan = $bilan;
        $this->visiteur = $visiteur;
        $this->medecin = $medecin;
    }

    // Accesseurs (getters)
    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getMotif() {
        return $this->motif;
    }

    public function getBilan() {
        return $this->bilan;
    }

    public function getVisiteur() {
        return $this->visiteur;
    }

    public function getMedecin() {
        return $this->medecin;
    }

    // Mutateurs (setters)
    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setMotif($motif) {
        $this->motif = $motif;
    }

    public function setBilan($bilan) {
        $this->bilan = $bilan;
    }

    public function setVisiteur($visiteur) {
        $this->visiteur = $visiteur;
    }

    public function setMedecin($medecin) {
        $this->medecin = $medecin;
    }
}
