<?php 
session_start();
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="CSS/w3.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>"> -->
    <link rel="stylesheet" href="CSS/profil.css?t=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style type="text/css">
        #pnom{
           /* margin-left:280px;
            margin-top: -200px;*/
        }
        #nom{
            margin-left:30px;
            /*margin-top:-50px;*/
        }
        #coor{

            display: flex;
            margin-top: -200px;
            margin-left:280px;
        }
        #mycGcv
        {
            margin-top: 50px;
        }
        hr{
            width: 30%;
        }
    </style>

</head>
<body>
    <?php
        include("myHead.php");
    ?>
      <?php
           $pro = "SELECT * from membre M join candidat C on C.idMembre=M.idMembre join profil P on C.idMembre=P.idMembre where C.idMembre=?";
           $profil=$connect->prepare($pro);
           $profil->bindParam(1,$_SESSION['id']);
           $profil->execute();
           $infProfil=$profil->fetch()
            ?>
<section class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
          <div class="card-body myoffre" style="width:70%; margin: auto;display : flex;">
                <img style="margin-left: -130px"  src="<?php echo $infProfil['photo'];?>" class="picture-left" width="150"/>         
             </div>
             <div>
                  <?php 
       //////////////////////////// CV///////////////////////////
           if (!empty($infProfil['cv'])) {
              ?>
            
             <p class=" w3-padding-small"> <a href="affiche_MonCV.php?id=<?=$infProfil['cv']?>"><button style="width:10%;margin-left:100px" class="btn btn-danger"><i class="bi bi-file-pdf">Voir mon CV</i></button></a> </p>
            <?php 
              }
           ?>
             </div>



    <div id="coor">
            <div id="pnom">
               <h5 ><span><?php echo $infProfil["prenom"]; ?></span>
               </h5>
                <h5 ><span > <?php echo $infProfil["email"]; ?> </span>
                    <h5 ><span > Né(e) le : <?php echo $infProfil["dateNaiss"]; ?> </span>
           </h5>
            <h5 ><span > Adresse :  <?php echo $infProfil["adresse"]; ?> </span>
           </h5>

           </div>

        <div id="nom">
           <h5 ><span ><?php echo $infProfil["nom"]; ?> </span></h5>
           <h5 ><span > <?php echo $infProfil["tel"]; ?> </span>
           </h5>
            <h5 ><span >Habite à <?php echo $infProfil["ville"]; ?> </span>
           </h5>
       </div>
  </div>



<div id="mycGcv">
<!-- *************************************DIPLOME********************************* -->
 <div class="w3-content w3-margin-top" style="max-width:1232px;" >
            <div class="w3-section"> 
               <fieldset>
                <legend><h3 class="w3-text-blue w3-border-bottom w3-center">Diplome</h3></legend>
            <?php 

             $receive = "SELECT * FROM diplome where idMembre = ? ";
                $res=$connect->prepare("$receive");
                $res->bindParam(1,$_SESSION['id']);
                $res->execute();
            while ($diplome=$res->fetch()) {
               ?>
        
                
                <h4 class="w3-margin-left">Intitule : <span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $diplome["intitule"]; ?> </span></p>
                <h4 class="w3-margin-left">Niveau : <span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $diplome["niveau"]; ?> </span></p>
                <h4 class="w3-margin-left">Ecole : <span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $diplome["ecole"]; ?> </span></p>
                <h4 class="w3-margin-left">Date d'obtention : <span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $diplome["datObtenu"]; ?> </span></p>
                <hr></hr>

               <?php 
          }
        ?>
    </fieldset>
     </div>           
</div>

               <!-- *************************************DIPLOME********************************* -->
 <div class="w3-content w3-margin-top" style="max-width:1232px;" >
            <div class="w3-section"> 
               <fieldset>
                <legend><h3 class="w3-text-blue w3-border-bottom w3-center">Experience</h3></legend>
            <?php 

             $receive = "SELECT * FROM experience where idMembre = ? ";
                $res=$connect->prepare("$receive");
                $res->bindParam(1,$_SESSION['id']);
                $res->execute();
            while ($experience=$res->fetch()) {
               ?>
        
                
                <h4 class="w3-margin-left">Intitule : <span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $experience["intitule"]; ?> </span></p>
                <h4 class="w3-margin-left">Secteur : <span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $experience["secteur"]; ?> </span></p>
                <h4 class="w3-margin-left">Entreprise : <span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $experience["entreprise"]; ?> </span></p>
                <h4 class="w3-margin-left">Nombre d'annee d'experience: <span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $experience["anneeExperience"]; ?> </span></p>
                 <hr></hr>

               <?php 
          }
        ?>
    </fieldset>
     </div>           
</div>




    <!-- *************************************COMPETENCE********************************* -->
 <div class="w3-content w3-margin-top" style="max-width:1232px;" >
            <div class="w3-section"> 
               <fieldset>
                <legend><h3 class="w3-text-blue w3-border-bottom w3-center">Competence</h3></legend>
            <?php 

             $receive = "SELECT * FROM competences where idMembre = ? ";
                $res=$connect->prepare("$receive");
                $res->bindParam(1,$_SESSION['id']);
                $res->execute();
            while ($competence=$res->fetch()) {
               ?>              
                <h4 class="w3-margin-left"><span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $competence["libelle"]; ?> </span></p>
                 <hr></hr>
               <?php 
          }
        ?>
    </fieldset>
     </div>           
</div>


 <!-- *************************************LANGUE********************************* -->
 <div class="w3-content w3-margin-top" style="max-width:1232px;" >
            <div class="w3-section"> 
               <fieldset>
                <legend><h3 class="w3-text-blue w3-border-bottom w3-center">Langue</h3></legend>
            <?php 

             $receive = "SELECT * FROM langue where idMembre = ? ";
                $res=$connect->prepare("$receive");
                $res->bindParam(1,$_SESSION['id']);
                $res->execute();
            while ($langue=$res->fetch()) {
               ?>              
                <h4 class="w3-margin-left"><span class="w3-margin-left w3-pale-green w3-padding-small w3-round-xxlarge "> <?php echo $langue["typeLang"]." >>>".$langue["niveau"]; ?> </span></p>
                 <hr></hr>
               <?php 
          }
        ?>
    </fieldset>
     </div>           
</div>
</div>
</section>
</body>
</html>