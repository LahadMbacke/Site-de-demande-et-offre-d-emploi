<?php 
session_start();
require('date.php');

 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


$id = $_SESSION['id'];
$req = "SELECT * FROM offre O INNER JOIN emploie E ON O.idOffre = E.idOffre where O.idRecruteur = '$id' order by O.dateCreation DESC";
$rep=$connect->prepare($req); //this instruction preparered the requete
$rep->execute();  //execute la requete 
 if ($rep->rowCount()==0) {
                 ?>   <div style=" margin-left: 100px; margin-top: 200px;" class="container card">
                      <div class="w3-row-padding w3-section w3-card-4 w3-border w3-round-large w3-light-grey myoffre">
                               <h3 style="margin:auto;">Vous n'avez pas encore postule une offre</h3>
                
                       </div> 
                       </div>
                 <?php
              }
?>

	 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>"> 
    <link rel="stylesheet" href="CSS/w3.css">
<style >
    .myoffre
    {
       width:70%;
        margin: auto; 
         display : flex;
         height: 200px;
    }

    .paragraph-right
    {
      flex : 5;
     margin-top : 00px;
    }
    .picture-left
    {
       flex: 1;
    }

    .paragraph
    {
        margin-left: 600px;
       margin-top: -115px;
    }
   p a
    {
     text-decoration: none;
    }
    #desc
      {
      height: 70px;
      overflow: hidden;
       background-color: #eee;
       margin-bottom: -2px;
      }
      small{
        font-size: 17px;
      }

</style>

        
</head>
<body>
    <!-- Page header -->
   <?php
        include("Rec_header.php");
    ?>
    
 <?php
  	 while ($row = $rep->fetch()) 
         { $DescriptionPost = str_replace(" "," ",$row["DescriptionPost"]);
		   ?>
            <div class="w3-row-padding w3-section w3-card-4 w3-border w3-round-large w3-light-grey myoffre">

                <img src="<?php echo $row['logoEntrprise'];?>" class="picture-left" width="150"/>
             <div class="paragraph-right">
				 <h2 class="w3-text-blue"> <?php echo $row["nom"]; ?>(H/F) </h2> 
				<h5><?php echo $row["typeContrat"]; ?> * <span> <?php echo $row["region"]; ?> </span></h5>
				<div id="desc">
                    <p class="w3-leftbar w3-padding-small"> <?php echo $DescriptionPost; ?> </p>
                </div>
                <small class="w3-pale-blue"><?php  $dd=$row["dateCreation"];
                  // echo $dd;
                 echo(ago($dd)); ?></small> <br>
                <small class="w3-pale-red">Expire le <?php echo $row["dateExpiration"]; ?></small> <br>
                     
                    <div class="paragraph">
                         <!-- *****************MODIFICATION******************** -->
                     <form method="post" action="PreRemp_PubOffre.php">
                        <input type="hidden" name="id" value="<?php echo $row["idOffre"]; ?>">
                        <button id="btnmodif" class="droit btn btn-success" type="submit" name="ModifPost" >Modifer</button>
                    </form>
                     <!-- ****************************SUPRESSION**************** -->
                   <p>
                     <form method="post" action="Modif_Sup_Publica.php">
                        <input type="hidden" name="id" value="<?php echo $row["idOffre"]; ?>">
                        <button id="btnn" class="droit btn btn-danger" type="submit" name="supprimerPost" >Supprimer</button>
                    </form>
                   </p> 
                    </div>
            
				<p><a id="plus" class="paragraph w3-round-xxlarge w3-padding-small " href="list_candidats.php?id=<?php echo $row["idOffre"]; ?>">Voir les Candidats</a></p>
                </div> 
            </div> 
		   <?php 
	}
?>  
    
    <!-- Page footer -->
    <?php
        include("footer.php");
    ?>





    <script>
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
         // **********************SUPP**************
    var btn = document.querySelectorAll("#btnn");
    for(var i=0; i<btn.length;i++)
    {
        btn[i].style.opacity="0";
         btn[i].addEventListener("mouseout",function(){
        this.style.opacity="0";
      }) 
        btn[i].addEventListener("mouseover",function(){
        this.style.opacity="1";
      })   
    }


    // **********************MODFI**************
     var btnmo = document.querySelectorAll("#btnmodif");
    for(var i=0; i<btnmo.length;i++)
    {
        btnmo[i].style.opacity="0";
         btnmo[i].addEventListener("mouseout",function(){
        this.style.opacity="0";
      }) 
        btnmo[i].addEventListener("mouseover",function(){
        this.style.opacity="1";
      })   
    }
    
</script>
</body>
</html>