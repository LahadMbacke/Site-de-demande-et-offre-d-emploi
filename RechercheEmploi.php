<?php 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
 require('date.php');

 // ***************************Recherche par Titre,mot cle et Lieu*****************************************
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="CSS/principale.css?t=<?php echo time();?>">  -->
    <link rel="stylesheet" href="CSS/RechercheEmploi.css?t=<?php echo time();?>"> 
    <link rel="stylesheet" href="CSS/w3.css">
    <style type="text/css">
        p a{
            text-decoration: none;
        }
        .paragraph-right
        {
          flex : 5;
         margin-top : -110px;
         margin-left: 170px;
        }
    .picture-left
    {
       flex: 1;
        margin-top :10px;
    }

    .paragraph
    {
        margin-left: 600px;
       margin-top: -90px;
    }
     #desc
      {
      height: 140px;
      overflow: hidden;
      }
      small{
        font-size: 20px;
      }
    </style>

</head>
<body>
<section>
   <?php 
        include("header_principale.php");
   ?>
       <?php
       $F_id = 0;

if (isset($_POST['titre']) and isset($_POST['lieu'])) {


        $titre = $_POST['titre'];
        $lieu = $_POST['lieu'];


   $req = "SELECT * FROM offre O INNER JOIN emploie E ON O.idOffre = E.idOffre where O.region = ? or (E.secteur = ? or E.nom=?)";
      $stmt=$connect->prepare($req); //this instruction preparered the requete
      $stmt->bindParam(1,$lieu);
      $stmt->bindParam(2,$titre);
       $stmt->bindParam(3,$titre);
     $stmt->execute();//execute la requete 
     if ($stmt->rowCount()==0) {
        ?>

         <h2 class="w3-text-blue"> Pas d'offre pour votre recherche </h2> </a>

        <?php 
     }
     // else{



   ?>
   <div id="lag">
   <?php 
        $i = 0;
       while ($row = $stmt->fetch()) 
         {
             $id =  $row["idOffre"];
              if ($i==0) {
               $F_id = $row["idOffre"];
               $i++;
                }
                ?>
  <div id="monClikk" >
    <div class="w3-content container card"  >
        <div id="Rech_offre" >
            <div class="w3-row-padding  ">
                 <img src="<?php echo $row['logoEntrprise'];?>" class="picture-left" width="150"/>
                 <div class="paragraph-right">
                        <a> <h2 class="w3-text-blue"> <?php echo $row["nom"]; ?>(H/F) </h2> </a>  
                          <small><?php echo $row["typeContrat"]; ?> * <strong> <?php echo $row["region"]; ?> </strong></small> <br>          
                        <!-- <p class="w3-leftbar w3-padding-small"> <?php echo $row["DescriptionProfil"]; ?> </p> -->
                         <div id="desc">
                            <p class="w3-leftbar w3-padding-small"> <?php echo $row["DescriptionPost"]; ?> </p>
                        </div>
                        <small class="w3-pale-blue"><?php  $dd=$row["dateCreation"];
                          // echo $dd;
                         echo(ago($dd)); ?></small> <br>
                        <small class="w3-pale-red">Expire le <?php echo $row["dateExpiration"]; ?></small> <br>
                         <p><a id="link" class="w3-round-xxlarge w3-padding-small " href="detail.php?id=<?= $row["idOffre"]?>">a savoir plus</a></p>
             </div>
                 
            </div>
                        
          </div>
  </div>
</div>
                <?php 
}
        ?>
        </div>
        <?php 
   }


?>
    
    <div id="droite"> 
        <!-- <h1 id="info" style="margin:auto;">Cliquer sur a savoir plus pour voir les detail de l'offre.</h1> -->
        <?php 
        $req = "SELECT * FROM offre O INNER JOIN emploie E ON O.idOffre = E.idOffre where O.idOffre = '$F_id' ";
        $rep=$connect->prepare($req); //requete preparee 
                $rep->execute();//execute la requete 
                while ($row = $rep->fetch()) 
                { 
                    ?>
            <div id="info" class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
            <div class="w3-section ">
             <div class="card-body myoffre" style="width:70%; margin: auto;display : flex;">
                <img style="flex: 1; margin-left: -90px" src="<?php echo $row['logoEntrprise'];?>" class="picture-left" width="150"/>
                  <div style=" flex : 5;margin-top : 50px;" class="paragraph-rightT">
                    <h2 class="w3-margin-left"><span class="w3-padding-small w3-round-xxlarge "> <?php echo $row["nom"]; ?> (H/F)</span> </h2>
                    <h5 style="margin-top:10px"><!-- AJOUT AUX FAVORIES -->
                     <a href="Ajoutfavories.php?id=<?= $row["idOffre"]?>">
                         <!-- <button type="button" class="btn btn-dark">Sauvegarder</button> -->
                         <i id="heart" style="margin-left:160px;font-size: 30px;" class="bi bi-heart"></i>
                     </a></h5>

                  </div>
             </div>
                <h3 class="w3-text-blue w3-border-bottom w3-center">Critéres de l'offre </h3><br>
                
                <h4 class="w3-margin-left"><strong class="w3-text-blue">Expérience : </strong> <span class=" w3-padding-small w3-round-xxlarge "> <?php echo $row["experience"]; ?> </span></h4>
                <h4 class="w3-margin-left">Compétence : <span class=" w3-padding-small w3-round-xxlarge "> <?php echo $row["competence"]; ?> </span></h4>
                <h4 class="w3-margin-left"><strong class="w3-text-blue">Diplome :</strong> <span class="w3-padding-small w3-round-xxlarge "> <?php echo $row["niveauEtude"]; ?> </span></h4>
                <h4 class="w3-margin-left"><strong class="w3-text-blue">Région :</strong> <span class=" w3-padding-small w3-round-xxlarge "> <?php echo $row["region"]; ?> </span></h4>
            <h4 class="w3-margin-left"><small class="w3-pale-blue "><?php  $dd=$row["dateCreation"]; echo(ago($dd)); ?></small> </h4>
            <h4 class="w3-margin-left"> <small class="w3-pale-red">Expire le <?php echo $row["dateExpiration"]; ?></small> </h4>

            </div>

            <div class="w3-section">
                <h3 class="w3-text-blue w3-border-bottom w3-center">L'entreprise</h3><br>
                <h4 class="w3-padding-small"> <?php echo $row["entreprise"]; ?> </h4>
            </div>

            <div class="w3-section">
                <h3 class="w3-text-blue w3-border-bottom w3-center">Description du poste</h3><br>
                <h4 class=" w3-padding-small"> <?php echo $row["DescriptionPost"]; ?> </h4>
            </div>

            <div class="w3-section">
                <h3 class="w3-text-blue w3-border-bottom w3-center">Description de profil</h3><br>
                <h4 class=" w3-padding-small"> <?php echo $row["DescriptionProfil"]; ?> </h4>
            </div>
             <?php 
                if (!empty($row['ficheDetaillee'])) {
                    ?>
                    <div class="w3-section" style="margin:auto;">
                    <h3 class="w3-text-blue w3-border-bottom w3-center">visualiser l'offre</h3><br>
                    <p class=" w3-padding-small"> <a href="affiche_fiche_offre.php?id=<?=$row['ficheDetaillee']?>"><button style="width:100%" class="btn btn-danger"><i class="bi bi-file-pdf"> l'offre en PDF</i></button></a> </p>
                    </div>
              <?php
                }
            ?>
            <p class="w3-center">
                <a href="postule.php?id=<?=$row["idOffre"]?>"><button type="button" class="lgbouton btn btn-success">POSTULER</button></a>
            </p> 
              
            <?php   
            }
        ?>
    </div>
</div>


    <?php
        include("footer.php");
    ?>
    <script src="jquery-3.6.0.min.js"></script>
    <script>
       
// **********************************CHARGER LES OFFRES*************************************




$("a").click(function(e) {
  e.preventDefault(); // <-------stop the def behavior here.
  var id = this.href.split('=').pop(); // extract the id here
  $.ajax({
    type: "get",
    url: "detail.php",
    data: {id:id}, // now pass it here
    success: function(data) {
      $('#droite').html(data); //copy and paste for your special case
    }
  });
});

// ******************************************CLIQUER SUR DIV**************************************************
// var lag = document.getElementById('lag');

// lag.style.cursor = 'pointer';
// lag.onclick = function() {
//     // do monClikk...
// };
// ************************************************************************************
var cach = document.getElementById("link");
var inf = document.getElementById("info");
cach.addEventListener("click",function () {
    inf.style.visibility="hidden";
});


// cach.addEventListener("mouseover",function () {
//     this.style.backgroundColor="grey";
// });


////////////////////////background???///////////////////////////////////////////////
    </script>
</section>
</body>
</html>