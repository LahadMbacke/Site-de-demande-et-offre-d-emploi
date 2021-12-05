<?php 
 require('date.php');
		$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

		$id =htmlentities(trim($_GET['id']));

		$req = "SELECT * FROM offre O INNER JOIN emploie E ON O.idOffre = E.idOffre where O.idOffre = '$id' ";
		$rep=$connect->prepare($req); //requete preparee 
				$rep->execute();//execute la requete 
				while ($row = $rep->fetch()) 
				{ 
					?>
			<section class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
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
</section>
    <script type="text/javascript">
    	var ht = document.getElementById("heart");
    	ht.addEventListener("mouseover",function(){
    		this.style.backgroundColor = "black";  
    	});
    </script>