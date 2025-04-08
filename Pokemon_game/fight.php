<?php
require_once 'Pokemon.php';
require_once 'PokemonFeu.php';
require_once 'PokemonEau.php';
require_once 'PokemonPlante.php';
require_once 'affichage.php';
function fight($fighter1, $fighter2) {  
    echo "<div class=\"alert alert-primary\"> Les Combattants</div>";  
    $round = 1;
    affiche($fighter1, $fighter2);
    while (true) {
        echo "<div class=\"row bg-danger-subtle border border-danger-subtle rounded-3\"><p>Round $round </p>";
        echo "<div class=\"col bg-secondary-subtle border border-secondary-subtle rounded-3\">". $fighter1->attack($fighter2)."</div>";
        echo "<div class=\"col bg-secondary-subtle border border-secondary-subtle rounded-3\">".$fighter2->attack($fighter1) ."</div>";
        echo"</div>"; // fin row
        affiche($fighter1, $fighter2);
        $round++;
        if ($fighter1->isDead()) {
            echo "<div class=\"alert alert-success\">Le Vainqueur est : <img src=\"".$fighter2->getUrl()."\" alt=\"".$fighter2->getNom()."\" class=\"img-fluid\"></div>";
            break;
        } elseif ($fighter2->isDead()) {
            echo "<div class=\"alert alert-success\">Le Vainqueur est : <img src=\"".$fighter1->getUrl()."\" alt=\"".$fighter1->getNom()."\" class=\"img-fluid\"></div>";
            break;
        }
        echo "</div>";
    }
}
