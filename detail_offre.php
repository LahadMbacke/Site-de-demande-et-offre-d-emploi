<?php
require('date.php'); 
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


    <style>
       
        .content {
        padding: 16px;
        }

        .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        }

        .sticky + .content {
        padding-top: 60px;
        }
        a {
            text-decoration: none
        }
          .lgbouton
          {
            width: 20%;
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
			        /*margin-left: 450px;*/
			       /*margin-top: -110px;*/
			    }
			    .namEmploi
			    {
			    	 margin-left: 400px;
			       margin-top: -110px;
			    }
    </style>
</head>
<body>
    
    <?php 
        include("myHead.php");
    ?>


    <div class="w3-content w3-margin-top" style="max-width:1232px;" >
	<?php 
		$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

		$id =htmlentities(trim($_GET['id']));

		$req = "SELECT * FROM offre O INNER JOIN emploie E ON O.idOffre = E.idOffre where O.idOffre = '$id' ";
		$rep=$connect->prepare($req); //this instruction preparered the requete
				$rep->execute();//execute la requete 
				while ($row = $rep->fetch()) 
				{ ?>

					<div class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
						<div class="w3-section">
							<img src="<?php echo $row['logoEntrprise'];?>" class="picture-left" width="200"/>
						<div class="paragraph">
							<div class="namEmploi">
							<p class="w3-margin-left"><h1 class="w3-margin-left w3-padding-small w3-round-xxlarge "> <?php echo $row["nom"]; ?>(H/F) </h1> </p>
							</div>
						</div>
             <div class="paragraph-right">
							<h3 class="w3-text-blue w3-border-bottom w3-center">Critéres de l'offre </h3><br>
							<h4 class="w3-margin-left"><strong class="w3-text-blue">Métier :</strong> <span class="w3-padding-small w3-round-xxlarge "> <?php echo $row["nom"]; ?> </span> </h4>
							<h4 class="w3-margin-left"><strong class="w3-text-blue">Expérience :</strong> <span class="w3-margin-left  w3-padding-small w3-round-xxlarge "> <?php echo $row["experience"]; ?> </span></h4>
							<h4 class="w3-margin-left"><strong class="w3-text-blue">Compétence :</strong> <span class="w3-margin-left  w3-padding-small w3-round-xxlarge "> <?php echo $row["competence"]; ?> </span></h4>
							<h4 class="w3-margin-left"><strong class="w3-text-blue">Diplome :</strong> <span class="w3-padding-small w3-round-xxlarge "> <?php echo $row["niveauEtude"]; ?> </span></h4>
							<h4 class="w3-margin-left"><strong class="w3-text-blue">Région :</strong> <span class="w3-padding-small w3-round-xxlarge "> <?php echo $row["region"]; ?> </span></h4>
							<h5 class="w3-pale-blue w3-margin-left">Postule <?php  $dd=$row["dateCreation"]; echo(ago($dd)); ?></h5>
                <h5 class="w3-pale-red w3-margin-left">Expire le <?php echo $row["dateExpiration"]; ?></h5> <br>

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
						<br>
                          <?php 
                            if (!empty($row['fiche_detaillee'])) {
                            	?>
                            	<div class="w3-section">
							    <h3 class="w3-text-blue w3-border-bottom w3-center">visualiser l'offre</h3><br>
							    <h4 style="text-align: center;" class="w3-padding-small"> <a href="affiche_fiche_offre.php?id=<?=$row['fiche_detaillee']?>"><button style="width:10%;" class="btn btn-danger"><i class="bi bi-file-pdf"> l'offre en PDF</i></button></a> </h4>
						        </div>
						    <br>
                          <?php
                            }
						?>
						<p class="w3-center">
                            <a  href="postule.php?id=<?= $row["idOffre"]?>"><button type="button" class="lgbouton btn btn-success">POSTULEER</button></a>
                        </p> 
					</div>


			<?php	}
		?>
    </div>
</div>
    
    <?php
        include("footer.php");
    ?>
    <script src="jquery-3.6.0.min.js"></script>
    
</body>
</html>







