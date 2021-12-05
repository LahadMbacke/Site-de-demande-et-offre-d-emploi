<?php
session_start();
      $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

           $receive = "SELECT * FROM membre M INNER JOIN recruteur R ON R.idMembre = M.idMembre where R.idMembre=? ";
             $resultat=$connect->prepare($receive); //permet de faire la requte preparer
              $resultat->bindParam(1, $_SESSION['id']);
              $resultat->execute();//execute la requete          
               $row = $resultat->fetch();




      ?>

  <!DOCTYPE html>
  <html>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
        <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>">
        <link rel="stylesheet" href="CSS/w3.css">
    <title>Compte</title>
  <body>
         <?php
            include("Rec_header.php");
         ?>
  


<!-- ****************************************i will use it for modification****************************************** -->
<div class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey" style="max-width:1232px; height: 415px; margin-top:50px">
          <h3 class="w3-bottombar w3-center w3-padding">Mon compte</h3>
          <form method="post" class="w3-container w3-row-padding w3-margin-top w3-form" action="applique_update_Recruteur.php" >
            <div class="w3-row-padding">
                <div class="w3-col m6">
                    <p> <span class="w3-bottombar">  telephone : </span>  <input type="texte" name="telephone" value="<?php echo $row['tel'] ?>"></p>
                </div>
                <div class="w3-col m6">
                    <p> <span class="w3-bottombar">Adresse : </span> <input type="texte" name="adresse" value="<?php echo $row['adresse'] ?>"></p>
                </div>
                
            </div>
            <br>
            <div class="w3-row-padding">
                <div class="w3-col m6">
                    <p> <span class="w3-bottombar">Siteweb : </span> <input type="texte" name="siteweb" value="<?php echo $row['SiteWeb'] ?>"></p>
                </div>
                <div class="w3-col m6">
                    <p> <span class="w3-bottombar">description de l'entreprise : </span> <input type="texte" name="description" value ="<?php echo $row['Description'] ?>"></p>
                </div>

            </div>
            <br>
            <div class="w3-row-padding">
                <div class="w3-col m6">
                    <p> <span class="w3-bottombar">Region : </span> <input type="texte" name="region" value="<?php echo $row['region'] ?>"></p>
                </div>
                <div class="w3-col m6">
                    <p> <span class="w3-bottombar">Ville : </span> <input type="texte" name="ville" value ="<?php echo $row['ville'] ?>"></p>
                </div>

            </div>
            <br>
            <input style="width:20%;margin:auto" type="submit" class="w3-padding w3-green w3-block w3-button" name="updatt" value="Enregistrer les modifications"> 
           </form>
          
        </div>


        <!-- Page footer -->
    <?php
        include("footer.php");
    ?>
              
       

  </body>
  </html>