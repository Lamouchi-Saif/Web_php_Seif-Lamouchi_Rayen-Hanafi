<?php

class Etudiant{
    private $nom;
    private $notes;

    public function __construct($nom="", $notes = []){
        $this->nom = $nom;
        $this->notes = $notes;
    }
        public function getNom(){
            return $this->nom;
        }
    
        public function setNom($nom){
            $this->nom = $nom;
        }
    
        public function getNotes(){
            return $this->notes;
        }
    
        public function setNotes($notes){
            $this->notes = $notes;
        }
    
        public function addNote($note){
            $this->notes[] = $note;
        }
    
        public function getMoyenne(){
            if (count($this->notes) == 0) {
                return 0;
            }
            return array_sum($this->notes) / count($this->notes);
        }
        public function displayNotes(){
            foreach ($this->notes as $note) {
                if($note<10){
                    $color = "alert alert-danger";
                }
                elseif($note==10){
                    $color = "alert alert-warning";
                }
                else{
                    $color = "alert alert-success";
                }
                echo "<div class=\"$color\" role='alert'> $note  </div>";
            }
        }
        public function displayMoyenne(){
            $moyenne = $this->getMoyenne();
            if($moyenne<10){
                $color = "alert alert-danger";
                $admis="non admis";
            }
            else{
                $color = "alert alert-success";
                $admis="admis";
            }
            echo "<div class=\"alert alert-primary\" role='alert'> Votre Moyenne est $moyenne </div>";
            echo "<div class=\"$color\" role='alert'> Vous êtes $admis </div>";
        }
        public function display(){
            $this->displayNotes();
            $this->displayMoyenne();
        }
        public function __toString(){
            return "Nom: " . $this->nom . ", Notes: " . implode(", ", $this->notes) . ", Moyenne: " . $this->getMoyenne();
        }

}