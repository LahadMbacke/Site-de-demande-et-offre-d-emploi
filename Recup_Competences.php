<?php
session_start(); 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

$id = $_SESSION['id'];

 $req = "SELECT * FROM competences where idMembre = '$id'";
$rep=$connect->prepare($req); //this instruction preparered the requete
        $rep->execute();//execute la requete 
         while ($row = $rep->fetch()) 
         { 
		?>
            <!-- <div class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey"> -->
            	
				<h3 class="w3-text-blue"> <?php echo $row["libelle"]; ?> </h3>  
				<p>
                                       <form method="post" action="PreRemp_Competence.php">
                   	                    <input type="hidden" name="modif" value="<?php echo $row["idCompetence"]; ?>">
                   	                    <input class="droit btn btn-success" type="submit" name="ModifCompetence" value="Modifer">
                                        </form>
				</p>
				<!-- ****************SUPRESSION************** -->
		<p>
                       <form method="post" action="PreRemp_Competence.php">
   	                    <input type="hidden" name="id" value="<?php echo $row["idCompetence"]; ?>">
   	                    <button class="droit btn btn-danger" type="submit" name="SuppCompetence">Supprimer</button>
                        </form>
		</p>
				<hr style="width:50%;text-align:left;margin-left:0">  
		<?php 
	}
 ?>

<!-- ********************************************************************************************* -->
<?php 
  if (isset($_GET['id'])) 
  {
  	
  	$id = $_GET['id'];

 $req = "SELECT * FROM competences where idMembre = '$id'";
$rep=$connect->prepare($req); 
        $rep->execute();//execute la requete 
         while ($row = $rep->fetch()) 
         { 
		?>
		<h3 class="w3-text-blue"> <?php echo $row["libelle"]; ?> </h3>  
		
		<hr style="width:50%;text-align:left;margin-left:0">
		<?php 
	}
  }


?>
