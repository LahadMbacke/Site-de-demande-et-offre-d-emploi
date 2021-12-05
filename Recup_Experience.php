<?php
session_start(); 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

$id = $_SESSION['id'];

 $req = "SELECT * FROM experience where idMembre = '$id'";
$rep=$connect->prepare($req); 
        $rep->execute();//execute la requete 
         while ($row = $rep->fetch()) 
         { 
		?>
				<h3 class="w3-text-blue"> <?php echo $row["intitule"]; ?> </h3> 
				<h4><span> <?php echo $row["entreprise"]; ?> </span></h4>
				<h4 class="w3-pale-blue"><?php echo $row["secteur"]; ?></h4>
				<h4 class=" w3-padding-small"> <?php echo $row["anneeExperience"]; echo " ans"; ?> </h4>
				<!-- ************************MODIF******************* -->
				<form method="post" action="PreRemp_Experience.php">
                <input type="hidden" name="modif" value="<?php echo $row["idExperience"]; ?>">
                <button class="droit btn btn-success" type="submit" name="ModifDiplome" >Modifer</button>
        </form>
        <!-- ***********************SUPPRESIION***************** -->
        <p>
				<form method="post" action="PreRemp_Experience.php">
                <input type="hidden" name="id" value="<?php echo $row["idExperience"]; ?>">
                <button class="droit btn btn-danger" type="submit" name="SupprimerExp">Supprimer</button>
        </form>
      </p>
				<hr style="width:50%;text-align:left;margin-left:0">
		<?php 
	}
?>




  <!-- ********************************** LE PROFIL QUE LE RECRUTEUR VOIT************************ -->

<?php 

  if (isset($_GET['id'])) {
	
	$id = $_GET['id'];
   	
 $req = "SELECT * FROM experience where idMembre = '$id'";
$rep=$connect->prepare($req); 
        $rep->execute();//execute la requete 
         while ($row = $rep->fetch()) 
         { 
		?>
            	
		<h3 class="w3-text-blue"> <?php echo $row["intitule"]; ?> </h3> 
		<small><span> <?php echo $row["entreprise"]; ?> </span></small> <br>
		<small class="w3-pale-blue"><?php echo $row["secteur"]; ?></small> <br><br>
		<p class=" w3-padding-small"> <?php echo $row["anneeExperience"]; echo " ans"; ?> </p>
		<!-- <p><button type="button" class=" droit btn btn-success" >Modifer</button></p>
		
			<form method="post" action="supp_Diplomes.php">
        <button type="button" name="supprimer" class=" droit btn btn-danger">Supprimer</button>
			</form>
		</a></p> -->
		<hr style="width:50%;text-align:left;margin-left:0">
			
		<?php 
	}
   }

?>