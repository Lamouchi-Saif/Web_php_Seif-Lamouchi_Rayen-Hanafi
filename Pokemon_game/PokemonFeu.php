<?php
require_once 'Pokemon.php'; // on inclut la classe Pokemon
require_once 'PokemonEau.php'; // on inclut la classe PokemonEau
require_once 'PokemonPlante.php'; // on inclut la classe PokemonPlante

class PokemonFeu extends Pokemon{ // type feu deja dans le nom de la classe
    private $weakness = "Eau"; // faiblesse du pokemon 
    private $prey="Plante"; // proie du pokemon feu
    // faiblesse et proie du pokemon feu peuvent etre modifiees
    // par exemple si on veut que le pokemon feu soit faible contre l'eau et la terre

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
        //il faut modifier l'efficacite une seule fois
        if($target instanceOf PokemonPlante){ // si target est de type plante
           if($this->nbAttacks==0){ 
            $this->attackPokemon->efficace(2);// on double les degats
        } 
            //  echo"damage efficace "; // test pour voir si la condition est bien remplie
            $attack=parent::attack($target); // on appelle la methode attack de la classe mere

        }elseif($target instanceOf PokemonEau || $target instanceOf PokemonFeu){ // si target est de type eau
            if($this->nbAttacks==0){
                $this->attackPokemon->efficace(0.5); // on divise sur 2 les degats
                }
            //echo"damage pas efficace "; // test pour voir si la condition est bien remplie
            // echo "
            $attack=parent::attack($target); // on appelle la methode attack de la classe mere
        }else{ // si target est de type normal
            $attack=parent::attack($target); // on appelle la methode attack de la classe mere
        }
        $this->nbAttacks++; // on incremente le nombre d'attaques
        return $attack; 
    }
}