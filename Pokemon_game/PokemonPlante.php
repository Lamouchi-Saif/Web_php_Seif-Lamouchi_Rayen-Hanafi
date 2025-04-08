<?php
require_once 'Pokemon.php'; // on inclut la classe Pokemon
require_once 'PokemonEau.php'; // on inclut la classe PokemonEau
require_once 'PokemonFeu.php'; // on inclut la classe PokemonFeu

class PokemonPlante extends Pokemon{ // type Plante deja dans le nom de la classe
    private $weakness = "Feu"; // faiblesse du pokemon 
    private $prey="Eau"; // proie du pokemon Plante
    // faiblesse et proie du pokemon Plante peuvent etre modifiees

    public function __construct($nom="", $url="", $hp=0, $minimalAttack=0, $maximalAttack=0, $specialAttack=0, $probabilitySpecialAttack=0){
        parent::__construct($nom, $url, $hp, $minimalAttack, $maximalAttack, $specialAttack, $probabilitySpecialAttack);
    }
    //getters and setters
    public function getPrey(){
        return $this->prey;
    }
    public function setPrey($prey){
        $this->prey = $prey;
    }
    public function getWeakness(){
        return $this->weakness;
    }
    public function setWeakness($weakness){
        $this->weakness = $weakness;
    }
    // fin getters and setters
    //Override de la methode attack pour prendre en compte la proie et la faiblesse
    public function attack(Pokemon $target){ // attaque un pokemon
        if($target instanceOf PokemonEau){ // si target est de type Eau
            if($this->nbAttacks==0){ 
                $this->attackPokemon->efficace(2);// on double les degats
            } 
            $attack=parent::attack($target); // on appelle la methode attack de la classe mere

        }elseif($target instanceOf PokemonFeu || $target instanceOf PokemonPlante){ // si target est de type Feu ou Plante
            if($this->nbAttacks==0){
                $this->attackPokemon->efficace(0.5); // on divise sur 2 les degats
                }
            $attack=parent::attack($target); // on appelle la methode attack de la classe mere
        }else{ // si target est de type normal
            $attack=parent::attack($target); // on appelle la methode attack de la classe mere
        }
        $this->nbAttacks++; // on incremente le nombre d'attaques
        return $attack; 
    }
}