<?php

class Medicament {
    private $id;
    private $nomCommercial;
    private $idFamille; 
    private $composition;
    private $effets;
    private $contreIndications;

    public function __construct($id, $nomCommercial, $idFamille, $composition, $effets, $contreIndications) {
        $this->id = $id;
        $this->nomCommercial = $nomCommercial;
        $this->famille = $idFamille;
        $this->composition = $composition;
        $this->effets = $effets;
        $this->contreIndications = $contreIndications;
    }

    // Accesseurs (getters)
    public function getId() {
        return $this->id;
    }

    public function getNomCommercial() {
        return $this->nomCommercial;
    }

    public function getFamille() {
        return $this->idFamille;
    }

    public function getComposition() {
        return $this->composition;
    }

    public function getEffets() {
        return $this->effets;
    }

    public function getContreIndications() {
        return $this->contreIndications;
    }

    // Mutateurs (setters)
    public function setId($id) {
        $this->id = $id;
    }

    public function setNomCommercial($nomCommercial) {
        $this->nomCommercial = $nomCommercial;
    }

    public function setFamille($idFamille) {
        $this->famille = $idFamille;
    }

    public function setComposition($composition) {
        $this->composition = $composition;
    }

    public function setEffets($effets) {
        $this->effets = $effets;
    }

    public function setContreIndications($contreIndications) {
        $this->contreIndications = $contreIndications;
    }
}
