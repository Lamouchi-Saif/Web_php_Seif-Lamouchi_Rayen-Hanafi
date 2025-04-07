<?php 
require_once 'Etudiant.php';
$etudiant1 = new Etudiant("Aymen", [11, 13, 18, 7,10,13,2,5,1]);
$etudiant2 = new Etudiant("Skander", [15, 9, 8, 16]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5" >
        <div class="row">
            <div class="col ">
            <?php  echo "<div class=\"alert alert-secondary\" ><h2>". $etudiant1->getNom() ."</h2></div>";
            $etudiant1->display();
            ?>
            </div>
            <div class="col">
            <?php  echo "<div class=\"alert alert-secondary\" ><h2>". $etudiant2->getNom() ."</h2></div>";
                $etudiant2->display();
            ?>
            </div>
    </div>
    
    
</body>
</html>