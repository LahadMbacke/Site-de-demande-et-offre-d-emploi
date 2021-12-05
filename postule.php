<?php 
 session_start();
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
 $id = $_GET['id'];
  $req = "SELECT * FROM offre WHERE idOffre = $id";
  $res=$connect->query($req);
  $row=$res->fetch();
 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Postuler</title>
	    <link rel="stylesheet" href="CSS/w3.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>"> -->
    <link rel="stylesheet" href="CSS/postule.css?t=<?php echo time();?>">
    <script src="javascript/jquery-3.6.0.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<div id="contenu">
<body>
	<?php
        include("myHead.php");
    ?>
  <div class="container ">
  	 <form method="post" action="postule_enregis.php?id=<?php echo $row['idOffre'];?>" enctype="multipart/form-data">
  	 	<div class="mycontainer card">
  	 		<div class="row ">
  	 		  <div class="col-md-4">
  	 			<label for="inputPassword5" class="form-label">Prenom</label>
                <input type="text" id="prenom" class="form-control" value="<?php echo $_SESSION['prenom'] ; ?>">
               </div>
            <div class="col-md-4">
                 <label for="inputPassword5" class="form-label">Nom</label>
                <input type="text" id="nom" class="form-control" value="<?php echo $_SESSION['nom'] ; ?>">
            </div>

  	 		</div>
  	 		 <div class="col-md-8">
                 <label for="inputPassword5" class="form-label">E-mail</label>
                <input type="E-mail" id="email" class="form-control" value="<?php echo $_SESSION['email'] ; ?>">
            </div>
            <!-- *****************************CV************************* -->
            <div class="col-md-4 ">
            	<!-- <label><i class="bi bi-cloud-arrow-up-fill"> Deposer votre CV</i></label> -->
            	 <input  type="file" class="btn btn-dark depotcv" name="cv">
            </div>
            <!-- *************************************TEXT****************************** -->
              <div class="w3-row-padding">
                <div class="w3-col m12">
                    <textarea style="width: 100%;" name="DetailDiplom"  cols="(50" rows="10">Bonjour,

Je vous propose ma candidature pour le poste de Concepteur Développeur Confirmé H/F qui a retenu toute mon attention.
Vous trouverez mes coordonnées et mon CV en pièce jointe.
Je me tiens à votre disposition pour toutes informations complémentaires.

Bien cordialement.</textarea>
                </div>
            </div><br>
             <div >
             	
  	 	    	
  	 	    		<button id="bttn" type="submit" class="lgbouton btn btn-success">POSTULER</button>
  	 	    	<!-- </a> -->
  	 	    </div>
  	 	</div>
  	 	   
  	 </form>
  </div>
</body>
 
</div>
</html>