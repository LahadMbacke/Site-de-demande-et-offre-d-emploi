<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="CSS/emploi.css?t=<?php// echo time();?>"> -->
    <link rel="stylesheet" href="CSS/w3.css">


    <style>
        body {
        margin: 0;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        }

        .header {
        background-color: #f1f1f1;
        padding: 10px;
        }

        #navbar {
        overflow: hidden;
        background-color: #333;
        }

        #navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }
        .droite {
            float: right;
            display: inline-block;
        }
        .droit {
            float: right;
            display: inline-block;
        margin-top: 5px;
        }
        .droite a{
            text-decoration: none;
        }
        h1{
        display: inline-block;
        }
        

        #navbar a:hover {
        background-color: #ddd;
        color: black;
        }

        #navbar a.active {
        background-color: #04AA6D;
        color: white;
        }

        .content {
        padding: 16px;
        }

        .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        }

        .sticky + .content {
        padding-top: 60px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SUNU LIGUEY</h1>
        <div class="droite">
            <a href="connexion_recruteur.php" class=" w3-button  w3-round-large">Deconnection</a>
        </div>
        
    </div>
    
    <div id="navbar">
        <a class="w3-green" href="Recruteur.php"> Accueil Recruteur</a>
        <a href="Poser_offres.php"> Publier offre</a>
        <a href="">Candidat</a>
        <a href="MesPublications.php">Mes publications</a>
        <a href="">Banque CV </a>
        <div class="droit">
                <a href="Compte.php">
                    <img src="image/imag_header.jpg" class="w3-circle" style="height:35px;width:35px" alt="Avatar">
                </a>
                <a href="compte_recruteur.php">
                    <p class="w3-texte-white">Mon Compte</p>
                </a>
        </div>
           
    </div>
    
    <script>
        window.onscroll = function () { myFunction() };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
</body>
</html>