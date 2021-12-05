<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
	<link rel="stylesheet" href="emploi.css?t=<?php echo time();?>">
	<title></title>
</head>
<body>
   <div class="container">
    <form class="card connexion" method="post" action="control_connexion.php">
			  <div class="col">
				<!-- IDENTIFAINT -->
				<div class="col">
					<label>Identifiant ou E-mail</label>
     	               <input type="text" class="form-control" name="myIdenti" placeholder="Identifiant ou E-mail">
				</div>
				<!-- PASSWORD -->
				    <div class="col">
					  <label>Mot de passe</label>
     	                 <input type="password" class="form-control" name="myPWD" placeholder="mot de passe">
				   </div>
                              <!-- <div>mot de passe oubliee</div> -->
                              <!-- CONNECTER -->
				 <div  class="col-md-12 text-center">
				       	<button type="submit" class=" form-control btn btn-success">Se Connecter</button>
				    </div>
                              
                              <!-- LIEN VERS INSCRIPTION -->
                              <div class="text-center">Pas encore de compte? <a href="inscription.php"> Créez-le ici</a></div>
			 </div>
				
	</form>
    </div>
</body>
</html>