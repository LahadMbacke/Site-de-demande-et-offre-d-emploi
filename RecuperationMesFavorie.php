<?php
session_start();
// $_SESSION['favorie'];
  require('date.php');

 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


         $idUser=$_SESSION['id'];
         
    $statement = "SELECT * FROM emploie E INNER JOIN offre O  INNER JOIN favorie F ON O.idOffre = E.idOffre and  F.idOffre=O.idOffre WHERE F.idCandidat = :idUser ";
            $sth = $connect->prepare($statement);
            $sth->execute(array(":idUser" => $idUser));
             if ($sth->rowCount()==0) {
                 ?>   
                   <div style=" margin-left: 300px; margin-top: 200px;" class="container card">
                      <div class="w3-row-padding w3-section ">
                               <h3>Vous n'avez pas encore ajouter de favorie</h3>
                
                       </div> 
                       </div>
                 <?php
              }
              else
              {

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
         height: 195px;
    }

    .paragraph-right
    {
      flex : 5;
     margin-top : 00px;
     margin-left: 20px;
    }
    .picture-left
    {
       flex: 1;
    }

    .paragraph
    {
        margin-left: 600px;
       margin-top: -170px;
    }
    .paragraphSAV
    {
         margin-left: 600px;
       margin-top: -30px;
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
        include("myHead.php");
    ?>
    
 <?php
     while ($row = $sth->fetch()) 
         { 
           ?>
            <div class="w3-row-padding w3-section w3-card-4 w3-border w3-round-large w3-light-grey myoffre">

                <img src="<?php echo $row['logoEntrprise'];?>" class="picture-left" width="150"/>
             <div class="paragraph-right">
                 <h1 class="w3-text-blue"> <?php echo $row["nom"]; ?>(H/F) </h1> 
                <h6><?php echo $row["typeContrat"]; ?> * <strong> <?php echo $row["region"]; ?> </strong></h6>
                <!--  -->
                <div id="desc">
                    <p class="w3-leftbar w3-padding-small"> <?php echo $row["DescriptionPost"]; ?> </p>
                </div>
                <small class="w3-pale-blue"><?php  $dd=$row["dateCreation"];
                 echo(ago($dd)); ?></small> <br>
                <small class="w3-pale-red">Expire le <?php echo $row["dateExpiration"]; ?></small> <br>
                <p class="paragraphSAV"><a id="sav"  class="w3-round-xxlarge w3-padding-small " href="detail_offre.php?id=<?= $row["idOffre"]?>">A savoir plus</a></p>
                
                <!-- ****************************SUPRESSION**************** -->
                <div class="paragraph">
                   <p>
                     <form method="post" action="supp_Favo.php">
                        <input type="hidden" name="id" value="<?php echo $row["idOffre"]; ?>">
                        <button id="btnn" class="droit btn btn-danger" type="submit" name="supprimerFav" >Supprimer</button>
                    </form>
                   </p> 
                </div>
                </div> 
            </div> 
           <?php 
    }
}
?>  

<script>
   var sav = document.querySelectorAll("#sav");
    for(var i=0; i<sav.length;i++)
    {
         sav[i].addEventListener("mouseover",function(){
        this.style.color="black";
        this.style.backgroundColor="grey";
      }) 
        sav[i].addEventListener("mouseout",function(){
        this.style.color="black";
        this.style.backgroundColor="";
      })   
    }
   // **********************************************

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
    
</script>
</body>
</html>