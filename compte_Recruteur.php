<?php
  session_start();
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
     <?php


          $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


           $receive = "SELECT * FROM membre M INNER JOIN recruteur R ON R.idMembre = M.idMembre where R.idMembre=? ";
             $resultat=$connect->prepare($receive); //permet de faire la requte preparer
              $resultat->bindParam(1, $_SESSION['id']);
              $resultat->execute();//execute la requete          

              while ($row = $resultat->fetch()) //parcours les valeurs de resultat s'il ya des elemnts il execute
              { ?>


              <div class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
                <h3 class="w3-bottombar w3-center w3-padding">Mon compte</h3>
                <div class="w3-container w3-row-padding w3-margin-top">
                          <div class="w3-row-padding">
                              <div class="w3-col m6">
                                  <p> <span class="w3-bottombar">  Télephone :</span>  <?php echo $row['tel'] ; ?></p>
                              </div>
                              <div class="w3-col m6">
                                  <p> <span class="w3-bottombar">Email : </span> <?php echo $row['email'] ; ?></p>
                              </div>
                              
                          </div>
                          <br>
                          <div class="w3-row-padding">
                              <div class="w3-col m6">
                                  <p> <span class="w3-bottombar">  Adresse :</span>  <?php echo $row['adresse'] ; ?></p>
                              </div>
                              <div class="w3-col m6">
                                  <p> <span class="w3-bottombar">SiteWeb : </span> <?php echo $row['SiteWeb'] ; ?></p>
                              </div>
                              
                          </div>
                          <br>
                          <div class="w3-row-padding">
                              <div class="w3-col m6">
                                  <p> <span class="w3-bottombar">Description de l'entreprise : </span> <?php echo $row['Description'] ; ?></p>
                              </div>
                              <div class="w3-col m6">
                                  <p> <span class="w3-bottombar">Ville : </span> <?php echo $row['ville'] ; ?></p>
                              </div>

                          </div>
                          <br>
                      </div>

              <?php 
              }
              

    ?>
        <div  class="">
          <a style="width:20%;margin-left: 600px;" href="update_compte_Recruteur.php"> <button class="btn btn-success" >Modifier vos informations</button></a>
        </div>
<!-- ****************************************i will use it for modification****************************************** -->
            
     </div>

     <!-- Page footer -->
  <?php
      include("footer.php");
  ?>

</body>
</html>