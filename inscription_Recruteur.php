<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styleR.css">
</head>
<body>
<?php 
  include("header_principale.php");
 ?>
    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form id="form" method="POST" action="control_inscription_Recruteur.php">
                        <h2 class="form-title">Creer un compte recruteur</h2>
                        <fieldset>
                    <legend class="w3-center w3-text-blue">Informations confidentielles</legend>
                        <div class="form-group">
                            <input id="mail" type="email" class="form-input" name="mail" placeholder="E-mail"/>
                            <span id="merror"></span>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-input" name="pwd" placeholder="Password"/>
                            <span id="passwordError"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password2" class="form-input" name="confpwd" placeholder="confirmer votre mot depasse"/>
                            <span id="password2Error"></span><span id="corresp"></span>

                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="w3-center w3-text-blue">Informations de l'Entreprise</legend>
                        <div class="form-group">
                            <input id="nom" type="texte" class="form-input"  name="NomEntreprise" placeholder="Nom de l'entreprise"/>
                             <span id="nerror"></span>
                        </div>
                        <div class="form-group">
                             <input id="addr" type="texte" class="form-input" name="AdresseEntre" placeholder="Adresse de l'entreprise"/>
                             <span id="aerror"></span>
                        </div>
                        <div class="form-group">
                             <input id="num" type="texte" class="form-input" name="Numero" placeholder="votre numero de telephone"/>
                             <!-- <span id="aerror"></span> -->
                        </div>

                        <div class="form-group">
                             <input id="ville" type="texte" class="form-input" name="ville" placeholder="votre ville"/>
                             <!-- <span id="aerror"></span> -->
                        </div>

                        <div class="form-group">
                             <input id="region" type="texte" class="form-input" name="region" placeholder="votre region"/>
                             <!-- <span id="aerror"></span> -->
                        </div>

                        <div class="form-group">
                             <input type="texte" class="form-input" name="website" placeholder="Site Internet de l´entreprise"/>
                        </div>
                        <div class="form-group">
                              <label>Description de l'entreprise</label>
                            <textarea style="width: 100%;" name="DescriptionEntre"  cols="50" rows="10" placeholder="Saisissez une description detaillée de votre  entreprise"></textarea>
                        </div>
                    </fieldset>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Valider inscription"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Vous avez déjà un compte ?<a href="connexion_recruteur.php" class="loginhere-link">Connectez-vous</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="js/main.js"></script> -->
    <script type="text/javascript">
         var form = document.getElementById("form");
         let myRegex = /^[a-zA-Z-\s]+$/;
         // let maail =/[^@]+@[^@]+.[a-zA-Z]{2,6}/;
     form.addEventListener("submit",function (e) {
        // ***************EMAIL*************
        var mail = document.getElementById("mail");
          if (mail.value.trim()=="")
           {
            var MyMailerror = document.getElementById("merror");
            MyMailerror.innerHTML="Ce champ est requis";
            MyMailerror.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(mail.value)==false)
           // {
           //  var MyMailerror = document.getElementById("merror");
           //  MyMailerror.innerHTML="Le  mail doit comporter uniquement des lettre";
           //  MyMailerror.style.color="red";
           //  e.preventDefault();
           // }
// *******************PASWORD******************
          var password = document.getElementById("password");
        var password2 = document.getElementById("password2");
        const passwordValue = password.value.trim();
         const password2Value = password2.value.trim();
          if (passwordValue=="")
           {
            var MypasswordError = document.getElementById("passwordError");
            MypasswordError.innerHTML="Le mot de passe est requis";
            MypasswordError.style.color="red";
            e.preventDefault();
           }
           if (password2Value=="")
           {
            var Mypassword2Error = document.getElementById("password2Error");
            Mypassword2Error.innerHTML="Le mot de passe est requis";
            Mypassword2Error.style.color="red";
            e.preventDefault();
           }
           else if(passwordValue !== password2Value)
           {
              var CoError = document.getElementById("corresp");
                CoError.innerHTML="Les deux mot de passe ne correspondent pas";
                CoError.style.color="red";
                e.preventDefault();
           }


            // ***************NOm*************
        var nom = document.getElementById("nom");
          if (nom.value.trim()=="")
           {
            var MyNomerror = document.getElementById("nerror");
            MyNomerror.innerHTML="Ce champ est requis";
            MyNomerror.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(nom.value)==false)
           // {
           //  var MyNomerror = document.getElementById("nerror");
           //  MyNomerror.innerHTML="Le  mail doit comporter uniquement des lettre";
           //  MyNomerror.style.color="red";
           //  e.preventDefault();
           // }

           // ***************ADress*************
        var addr = document.getElementById("addr");
          if (addr.value.trim()=="")
           {
            var MyAdderror = document.getElementById("aerror");
            MyAdderror.innerHTML="Ce champ est requis";
            MyAdderror.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(addr.value)==false)
           // {
           //  var MyAdderror = document.getElementById("aerror");
           //  MyNomerror.innerHTML="Le  mail doit comporter uniquement des lettre";
           //  MyAdderror.style.color="red";
           //  e.preventDefault();
           // }
       });

    </script>
<?php
include("footer.php");
?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>