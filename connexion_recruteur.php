<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form-v5 by Colorlib</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/roboto-font.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/styleCR.css"/>
</head>
<body class="form-v5">
<?php 
  include("header_principale.php");
 ?>
    <div class="page-content">
        <div class="form-v5-content">
            <form class="form-detail"  method="post" action="control_connexion_Recruteur.php">
                <h2> Compte Recruteur</h2>
                <div class="form-row">
                    <label for="your-email">Votre Email</label>
                    <input type="text" name="login" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="form-row">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
                    <i class="fas fa-lock"></i>
                </div>
                <div class="form-row-last">
                    <input type="submit" name="register" class="register" value="Se Connecter">
                </div>
                <div class="text-center">Pas encore de compte? <a href="inscription_Recruteur.php"> Créez-le ici</a></div>
            </form>
        </div>
    </div>
<?php
include("footer.php");
?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>