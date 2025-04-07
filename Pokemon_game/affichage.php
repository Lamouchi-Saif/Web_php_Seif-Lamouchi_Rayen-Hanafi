<?php
require_once 'Pokemon.php';
function affiche(Pokemon $pokemon1, Pokemon $pokemon2){
    echo "<div class='container-sm'>";
    echo "<div class=\"row\">";
    echo "<div class=\"col\">";
    $pokemon1->whoAmI();
    echo "</div>";
    echo "<div class=\"col\">";
    $pokemon2->whoAmI();
    echo "</div>";
    echo "</div>"; // fin row
}

?>