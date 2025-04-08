<?php
require_once __DIR__ . '/Pokemon.php';
require_once __DIR__ . '/affichage.php';
require_once __DIR__ . '/fight.php';
require_once __DIR__ . '/PokemonEau.php';
require_once __DIR__ . '/PokemonFeu.php';
require_once __DIR__ . '/PokemonPlante.php';

$raichu = new Pokemon("Raichu", "https://img.pokemondb.net/sprites/home/normal/raichu.png", 400, 20, 100, 3, 50);
$charizard = new Pokemon("Charizard", "https://img.pokemondb.net/sprites/home/normal/charizard.png", 500, 20, 90, 2.5, 40);

fight($raichu, $charizard); // appel de la fonction fight avec les deux pokemons
echo "<div class=\"alert alert-primary\">New Fight with Types</div>";
$charizard = new PokemonFeu("Charizard", "https://img.pokemondb.net/sprites/home/normal/charizard.png", 500, 20, 90, 2.5, 40);
$venusaur = new PokemonPlante("Venusaur", "https://img.pokemondb.net/sprites/home/normal/venusaur.png", 500, 20, 90, 2.5, 40);
fight($charizard, $venusaur); // appel de la fonction fight avec les deux pokemons
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