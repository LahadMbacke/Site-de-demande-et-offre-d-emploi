<?php
session_start(); 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

$id = $_SESSION['id'];

 $req = "SELECT * FROM langue where idMembre = '$id'";
$rep=$connect->prepare($req); //this instruction preparered the requete
        $rep->execute();//execute la requete 
         while ($row = $rep->fetch()) 
         { 
		?>
           

		<h3 class="w3-text-blue"> <?php echo $row["typeLang"]; ?> </h3> 
		<span> <?php echo $row["niveau"]; ?> </span> <br> 
		<p>
	               <form method="post" action="PreRemp_Langues.php">
		                    <input type="hidden" name="modif" value="<?php echo $row["idLang"]; ?>">
		                    <input class="droit btn btn-success" type="submit" name="ModifDiplome" value="Modifer">
	                </form>
		</p>
		<!-- **********************SUPRESSION************* -->
		<p>
	            <form method="post" action="PreRemp_Langues.php">
                    <input type="hidden" name="id" value="<?php echo $row["idLang"]; ?>">
                    <button class="droit btn btn-danger" type="submit" name="SuppLang">Supprimer</button>
	            </form>
		</p>
		<hr style="width:50%;text-align:left;margin-left:0">
	<!-- </div> -->
			
          
		<?php 
	}
?>

<?php

if (isset($_GET['id'])) {
	$id = $_GET['id'];

 $req = "SELECT * FROM langue where idMembre = '$id'";
$rep=$connect->prepare($req); //this instruction preparered the requete
        $rep->execute();//execute la requete 
         while ($row = $rep->fetch()) 
         { 
		?>
           
            	
		<h3 class="w3-text-blue"> <?php echo $row["typeLang"]; ?> </h3> 
		<span> <?php echo $row["niveau"]; ?> </span> <br> 
		<!-- <p><button type="button" class=" droit btn btn-success">Modifer</button></p>
		<p>
					<form method="post" action="supp_Lang.php">
		        <button type="button" name="supprimer" class=" droit btn btn-danger">Supprimer</button>
					</form>
				</p> -->
				<hr style="width:50%;text-align:left;margin-left:0">
            <!-- </div> -->
			
          
		<?php 
	}
}

?>