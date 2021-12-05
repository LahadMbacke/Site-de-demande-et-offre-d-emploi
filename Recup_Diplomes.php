<?php
session_start(); 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

$id = $_SESSION['id'];

 $req = "SELECT * FROM diplome where idMembre = '$id'";
$rep=$connect->prepare($req); //this instruction preparered the requete
        $rep->execute();//execute la requete 
         while ($row = $rep->fetch()) 
         { 
		?>
            <!-- <div class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey"> -->
            	<style >
            		.droit
            		{
            		  width: 20%;
            		  /*float: right;*/
            		  margin-right: -2000px;
            		}
            	</style>
            	
				<h3 class="w3-text-blue"> <?php echo $row["intitule"]; ?> </h3> 
				<h4><span> <?php echo $row["niveau"]; ?> </span></h4>
				<h4 class="w3-pale-blue"><?php echo $row["ecole"]; ?></h4> 
				<h4 class=" w3-padding-small"> obtenu le <?php echo $row["datObtenu"]; ?> </h4>
				<!-- *****************MODIFICATION******************** -->
				<p>
                                       <form method="post" action="PreRemp_Diplomes.php">
                   	                    <input type="hidden" name="modif" value="<?php echo $row["idDiplome"]; ?>">
                   	                    <button id="btnn" class="droit btn btn-success" type="submit" name="ModifDiplome" >Modifer</button>
                                        </form>
				</p>
				<!-- ****************************SUPRESSION**************** -->
				   <p>
                                       <form method="post" action="PreRemp_Diplomes.php">
                   	                    <input type="hidden" name="id" value="<?php echo $row["idDiplome"]; ?>">
                   	                    <button id="supp" class="droit btn btn-danger" type="submit" name="supprimerDipl" >Supprimer</button>
                                        </form>
				   </p> 
				<hr style="width:50%;text-align:left;margin-left:0">
		<?php 
	}

                 

?>
<!-- ********************************************* LE PROFIL QUE LE RECRUTEUR VOIT************************ -->
<?php


if (isset($_GET['id'])) {
	
	$id = $_GET['id'];

 $req = "SELECT * FROM diplome where idMembre = '$id'";
$rep=$connect->prepare($req); 
        $rep->execute();//execute la requete 
         while ($row = $rep->fetch()) 
         { 
		?>
            	<style >
            		.droit
            		{
            		  width: 20%;
            		  /*float: right;*/
            		  margin-right: -2000px;
            		}
            	</style>
            	
		<h3 class="w3-text-blue"> <?php echo $row["intitule"]; ?> </h3> 
		<small><span> <?php echo $row["niveau"]; ?> </span></small> <br>
		<small class="w3-pale-blue"><?php echo $row["ecole"]; ?></small> <br><br>
		<p class=" w3-padding-small"> <?php echo $row["datObtenu"]; ?> </p>
		
                  

			<!-- <form method="post" action="supp_Diplomes.php">
                           <button type="button" name="supprimer" class=" droit btn btn-danger">Supprimer</button>
			</form>
		</p>  --> 
		<hr style="width:50%;text-align:left;margin-left:0">         
		<?php 
	}

        
}

?>
<script type="text/javascript">
	 // var btn = document.querySelectorAll("#btnn");
  //   for(var i=0; i<btn.length;i++)
  //   {
  //       btn[i].style.opacity="0";
  //        btn[i].addEventListener("mouseout",function(){
  //       this.style.opacity="0";
  //     }) 
  //       btn[i].addEventListener("mouseover",function(){
  //       this.style.opacity="1";
  //     })   
  //   }

    // *****************SUPP**************
    //  var btn = document.querySelectorAll("#supp");
    // for(var i=0; i<btn.length;i++)
    // {
    //     btn[i].style.opacity="0";
    //      btn[i].addEventListener("mouseout",function(){
    //     this.style.opacity="0";
    //   }) 
    //     btn[i].addEventListener("mouseover",function(){
    //     this.style.opacity="1";
    //   })   
    // }
</script>
<?php

?>