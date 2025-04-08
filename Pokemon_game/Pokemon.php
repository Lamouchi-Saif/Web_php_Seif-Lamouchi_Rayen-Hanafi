<?php
require_once 'AttackPokemon.php';

class Pokemon{
    protected $nom; // nom du pokemon
    protected $url; // url de l'image
    protected $hp; // points de vie
    protected $attackPokemon;
    protected $nbAttacks=0; // nombre d'attaques du pokemon pour assurer que l'efficacité est modifiée une seule fois en cas de combat entre types

    public function __construct($nom="", $url="", $hp=0, $minimalAttack=0, $maximalAttack=0, $specialAttack=0, $probabilitySpecialAttack=0){
        $this->nom = $nom;
        $this->url = $url;
        $this->hp = max(0, $hp); // on ne peut pas avoir de points de vie négatifs
        $this->attackPokemon = new AttackPokemon($minimalAttack, $maximalAttack, $specialAttack, $probabilitySpecialAttack);
    }
    //getters and setters
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getUrl(){
        return $this->url;
    }
    public function setUrl($url){
        $this->url = $url;
    }
    public function getHp(){
        return $this->hp;
    }
    public function setHp($hp){
        $this->hp =  $hp; 
    }
    public function getAttackPokemon(){
        return $this->attackPokemon;
    }
    public function setAttackPokemon($attackPokemon){
        $this->attackPokemon = $attackPokemon;
    }
    // fin getters and setters

    public function isDead(){ // verifie si le pokemon est mort
        return $this->hp <= 0;
    }

    public function attack(Pokemon $target){ // attaque un pokemon
        $attack = rand($this->attackPokemon->getAttackMinimal(), $this->attackPokemon->getAttackMaximal());
        $chance = rand(1, 100);
        if($chance <= $this->attackPokemon->getProbabilitySpecialAttack()){
            $attack *= $this->attackPokemon->getSpecialAttack();
        }
        $target->setHp($target->getHp() - $attack);

        return $attack; 
    }

    public function whoAmI(){ // affiche le nom du pokemon
        echo "<div class=\"card\">";
        echo "<div class=\"alert alert-secondary\" ><h2>". $this->getNom() ."</h2></div>";
        echo "<img src=\"".$this->getUrl()."\" alt=\"".$this->getNom()."\" class=\"img-fluid\"> <hr>";
        echo "<p>Points de vie : ".$this->getHp()."</p><hr>";
        echo "<p>Attaque minimale : ".$this->attackPokemon->getAttackMinimal()."</p> <hr>";
        echo "<p>Attaque maximale : ".$this->attackPokemon->getAttackMaximal()."</p> <hr>";
        echo "<p>Attaque spéciale : ".$this->attackPokemon->getSpecialAttack()."</p> <hr>";
        echo "<p>Probabilité d'attaque spéciale : ".$this->attackPokemon->getProbabilitySpecialAttack()."%</p>";
        echo "</div>";
    }



}