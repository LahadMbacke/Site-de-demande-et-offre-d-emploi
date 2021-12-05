<?php
  session_start();
  ?>

  <!DOCTYPE html>
  <html>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
        <!-- <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>"> -->
        <link rel="stylesheet" href="CSS/w3.css">
    <title>Compte</title>
  <body>
         <?php 
            include("myHead.php");
          ?>
  
     <?php


          $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


     $receive = "SELECT * FROM membre M INNER JOIN candidat C ON C.idCandidat = M.idMembre where M.idMembre=? ";
             $resultat=$connect->prepare($receive); //permet de faire la requte preparer
              $resultat->bindParam(1, $_SESSION['id']);
              $resultat->execute();//execute la requete          

     while ($row = $resultat->fetch()) //parcours les valeurs de resultat s'il ya des elemnts il execute
                { ?>


                <div style="margin:auto;" class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey" style="max-width:1232px;height: 415px; margin-top:200px">
                  <h3 class="w3-bottombar w3-center w3-padding">Mon compte</h3>
                  <div class="w3-container w3-row-padding w3-margin-top">
                            <div class="w3-row-padding">
                                <div class="w3-col m6">
                                    <p> <span class="w3-bottombar">  Prénom :</span>  <?php echo $row['prenom'] ; ?></p>
                                </div>
                                <div class="w3-col m6">
                                    <p> <span class="w3-bottombar">Nom : </span> <?php echo $row['nom'] ; ?></p>
                                </div>
                                
                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m6">
                                    <p> <span class="w3-bottombar">Date de naissance : </span> <?php echo $row['dateNaiss'] ; ?></p>
                                </div>
                                <div class="w3-col m6">
                                    <p> <span class="w3-bottombar">Sexe : </span> <?php echo $row['sexe'] ; ?></p>
                                </div>

                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m6">
                                    <p> <span class="w3-bottombar">Téléphone : </span> <?php echo $row['tel'] ; ?></p>
                                </div>
                                <div class="w3-col m6">
                                    <p> <span class="w3-bottombar">E-mail : </span> <?php echo $row['email'] ; ?></p>
                                </div>
                            </div><br>
                            

                        </div>
  
                <?php 
                }
                

      ?>
          <div  class="">
            <a style="width:20%;margin-left: 500px;" class="w3-padding w3-green w3-block w3-button" href="update_compte_user.php">Modifier vos informations</a>
          </div>
<!-- ****************************************i will use it for modification****************************************** -->
              
       </div>

       <!-- Page footer -->
    <?php
        include("footer.php");
    ?>

  </body>
  </html>