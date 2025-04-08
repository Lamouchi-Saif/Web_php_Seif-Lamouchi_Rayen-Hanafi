<?php
require_once 'Pokemon.php'; // on inclut la classe Pokemon
require_once 'PokemonFeu.php'; // on inclut la classe PokemonFeu
require_once 'PokemonPlante.php'; // on inclut la classe PokemonPlante
class PokemonEau extends Pokemon{ // type Eau deja dans le nom de la classe
    private $weakness = "Plante"; // faiblesse du pokemon 
    private $prey="Feu"; // proie du pokemon Eau
    // faiblesse et proie du pokemon Eau peuvent etre modifiees

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
        if($target instanceOf PokemonFeu){ // si target est de type Feu
            if($this->nbAttacks==0){ 
                $this->attackPokemon->efficace(2);// on double les degats
            } 
            $attack=parent::attack($target); // on appelle la methode attack de la classe mere

        }elseif($target instanceOf PokemonPlante || $target instanceOf PokemonEau){ // si target est de type Plante ou Eau
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