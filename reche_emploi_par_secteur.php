<?php 
 require('date.php');
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

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
          <style >
    .myoffre
    {
       width:70%;
        margin: auto; 
         display : flex;
    }

     p a{
            text-decoration: none;
        }
        .paragraph-right
        {
         margin-top : -110px;
         margin-left: 150px;
        }

    .picture-left
    {
        flex: 1;
        margin-top :20px;
        margin-left: -15px;
    }

    .paragraph
    {
        margin-left: 600px;
       /*margin-top: 100px;*/
    }
    #desc
      {
        /*width: 200px;*/
      height: 140px;
      /*background-color: #eee;*/
      overflow: hidden;
      }
        #filtre
      {
        /*background-color: grey;*/
         /*border: 1px solid black;*/
         height: 70px;
         display: flex;

          /*margin-right: -100px;*/
      }
     /* #largeur
      {
       width: 10%;
        height: 30px;
        margin-left: 30px;
        margin-top: 20px;
        /*margin: auto;
      }*/
</style>
</head>
<body>
<section>
   <?php 
       include("header_principale.php");
   ?>
<?php

$F_id =0;

if (isset($_POST['secteur'])) {
$nom =null;
$secteur = $_POST['secteur'];
foreach ($secteur as $color){ 
   $nom =  $color;
   // echo $nom;
}


   $req = "SELECT * FROM offre O INNER JOIN emploie E ON O.idOffre = E.idOffre where  E.secteur like '%$nom%'";
      $stmt=$connect->query($req); //this instruction preparered the requete
      // $stmt->bindParam(1,$nom);
      // $stmt->bindParam(2,$titre);
      //  $stmt->bindParam(3,$titre);
      // $stmt->bindParam(3,$lieu);

   ?>
   <!-- <div id="filtre">
      <select id="largeur" class="form-select form-select-sm" aria-label=".form-select-sm example" >

        <option value="" disabled selected>Type d'emploi</option>
          <option value="cdd">CDD</option>
          <option value="stage">Stage</option>
          <option value="cdi">CDI</option>
    </select> -->

    <!-- <select id="largeur" class="form-select form-select-sm" aria-label=".form-select-sm example" >
        <option value="" disabled selected>Lieu</option>
          <option value="Dakar">Dakar</option>
          <option value="2">Diourbel</option>
          <option value="Diourbel">Fatick</option>
          <option value="3">Kaffrine</option>
          <option value="Kaffrine">Kaolack</option>
          <option value="Kedougou">Kedougou</option>
          <option value="Kolda">Kolda</option>
          <option value="Louga">Louga</option>
          <option value="Matam">Matam</option>
          <option value="Saint-Louis">Saint-Louis</option>
          <option value="Sédhiou">Sédhiou</option>
          <option value="Tambacounda">Tambacounda </option>
          <option value="Thiès">Thiès </option>
          <option value="Ziguinchor">Ziguinchor </option>

    </select>
 -->
   <!--  <select id="largeur" class="form-select form-select-sm" aria-label=".form-select-sm example" >
        <option value="" disabled selected>Date de publication</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
    </select> -->

  <!--  <select id="largeur" class="form-select form-select-sm" aria-label=".form-select-sm example" >
        <option value="" disabled selected>Niveau d'experience</option>
          <option value="1">Pas d'experience</option>
          <option value="2">1 ans </option>
          <option value="3">1 a 3 ans </option>
          <option value="3">3 a 5 ans </option>
          <option value="3">5 a 10 ans </option>
          <option value="3">plus de 10 ans </option>
    </select>
    
    </div> -->
   <div id="lag">
   <?php 
        // $stmt->execute();//execute la requete 
         $i=0;
       while ($row = $stmt->fetch()) 
         {
            // Pour recuperer le 1er id
            if ($i==0) {
               $F_id = $row["idOffre"];
               $i++;
            }
             // $id =  $row["idOffre"];
                ?>
  <div id="monClikk" >
    <div class="w3-content container card"  >
        <div id="Rech_offre" >
            <div class="w3-row-padding  ">
                 <img src="<?php echo $row['logoEntrprise'];?>" class="picture-left" width="150"/>

                 <div class="paragraph-right">
                        <a> <h2 class="w3-text-blue"> <?php echo $row["nom"]; ?>(H/F) </h2> </a>
                        <small><?php echo $row["typeContrat"]; ?> * <strong> <?php echo $row["region"]; ?> </strong></small> <br>             
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
                <!-- <a href="postule.php"><button type="button" class="lgbouton btn btn-success">POSTULEER</button></a> -->
            </p> 
              
            <?php   
            }
        ?>
    </div>
</div>
    </div>
<!-- <section id="Detail" class="container card">
        
</section> -->




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

// // ******************************************CLIQUER SUR DIV**************************************************
// var lag = document.getElementById('lag');

// lag.style.cursor = 'pointer';
// lag.onclick = function() {
//     // do monClikk...
// };


 var sav = document.querySelectorAll("#plus");
    for(var i=0; i<sav.length;i++)
    {
         sav[i].addEventListener("mouseover",function(){
         this.style.color="black";
        this.style.backgroundColor="grey";
      }) 
        sav[i].addEventListener("mouseout",function(){
        this.style.color="";
        this.style.backgroundColor="";
      })   
    }

    var cach = document.getElementById("link");
var inf = document.getElementById("info");
cach.addEventListener("click",function () {
    inf.style.visibility="hidden";
});


////////////////////////background???///////////////////////////////////////////////
    </script>
</section>
</body>
</html>