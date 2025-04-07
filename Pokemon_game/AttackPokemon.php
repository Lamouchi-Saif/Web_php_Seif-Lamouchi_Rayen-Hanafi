<?php

class AttackPokemon{
    private $attackMinimal;
    private $attackMaximal;
    private $specialAttack;
    private $probabilitySpecialAttack;

    public function __construct($attackMinimal=0, $attackMaximal=0, $specialAttack=0, $probabilitySpecialAttack=0){
        $this->attackMinimal = $attackMinimal;
        $this->attackMaximal = $attackMaximal;
        $this->specialAttack = $specialAttack;
        $this->probabilitySpecialAttack = max(0, min(100, $probabilitySpecialAttack)); // on ne peut pas avoir une probabilité négative ou supérieure à 100
    }
    public function getAttackMinimal(){
        return $this->attackMinimal;
    }
    public function setAttackMinimal($attackMinimal){
        $this->attackMinimal = $attackMinimal;
    }
    public function getAttackMaximal(){
        return $this->attackMaximal;
    }
    public function setAttackMaximal($attackMaximal){
        $this->attackMaximal = $attackMaximal;
    }
    public function getSpecialAttack(){
        return $this->specialAttack;
    }
    public function setSpecialAttack($specialAttack){
        $this->specialAttack = max(0, min(100,$specialAttack)); // on ne peut pas avoir d'attaque spéciale négative ou supérieure à 100
    }
    public function getProbabilitySpecialAttack(){
        return $this->probabilitySpecialAttack;
    }
    



}