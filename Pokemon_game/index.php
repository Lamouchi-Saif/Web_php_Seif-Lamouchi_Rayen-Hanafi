<?php
require_once 'Pokemon.php';
require_once 'affichage.php';

$raichu = new Pokemon("Raichu", "https://img.pokemondb.net/sprites/home/normal/raichu.png", 400, 20, 100, 3, 50);
$charizard = new Pokemon("Charizard", "https://img.pokemondb.net/sprites/home/normal/charizard.png", 500, 20, 90, 2.5, 40);
$round = 1;
affiche($raichu, $charizard);
while (true) {
    echo "<div class=\"row bg-danger-subtle border border-danger-subtle rounded-3\"><p>Round $round </p>";
    echo "<div class=\"col bg-secondary-subtle border border-secondary-subtle rounded-3\">". $raichu->attack($charizard)."</div>";
    echo "<div class=\"col bg-secondary-subtle border border-secondary-subtle rounded-3\">".$charizard->attack($raichu) ."</div>";
    echo"</div>"; // fin row
    affiche($raichu, $charizard);
    $round++;
    if ($raichu->isDead()) {
        echo "<div class=\"alert alert-success\">Le Vainqueur est : <img src=\"".$charizard->getUrl()."\" alt=\"".$charizard->getNom()."\" class=\"img-fluid\"></div>";
        break;
    } elseif ($charizard->isDead()) {
        echo "<div class=\"alert alert-success\">Le Vainqueur est : <img src=\"".$raichu->getUrl()."\" alt=\"".$raichu->getNom()."\" class=\"img-fluid\"></div>";
        break;
    }
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <link rel="stylesheet" href="../essential_stuff/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>