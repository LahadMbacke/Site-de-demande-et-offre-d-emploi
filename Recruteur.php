<?php
session_start();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
        <link rel="stylesheet" href="CSS/Acc_recru.css?t=<?php echo time();?>">
        <link rel="stylesheet" href="CSS/w3.css">
    <title>Document</title>

    
</head>
<body>
    <!-- Page header -->
    <?php
        include("Rec_header.php");
    ?>
    <!-- Page content -->
    <div id="ann">
        <h1 style="color:white">Recrutez facilement les bons candidats</br> pour votre entreprise</h1>
        <a href="Poser_offres.php" class="nav-link text-uppercase font-weight-bold"><button class="btn btn-success">Publier une offre</button></a>

    </div>

    <div class="w3-container w3-blue-grey" id="search_cv">
        <h3 id="tittl" >SL vous permet de trouver les bons candidats plus facilement et de les contacter plus rapidement.</br> Plus d’instantanéité, moins de tâches chronophages, pour vous faire gagner en efficacité et dégager du temps pour construire une relation de confiance avec les candidats et les embaucher. </h3>
         <a href="Banque_cv.php" class="nav-link text-uppercase font-weight-bold"><button class="btn btn-success">Trouver votre candidat</button></a>

        <img id="pict" src="backg/cvvv.png">
    </div>


    <!-- Page footer -->
    <?php
        include("footer.php");
    ?>
</body>
</html>