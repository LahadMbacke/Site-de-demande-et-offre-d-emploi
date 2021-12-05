<!DOCTYPE html>
<html>
<head>
	<title></title>
	 
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
	<link rel="stylesheet" href="emploi.css?t=<?php echo time();?>">
   <link rel="stylesheet" type="text/css" href="css/">
</head>
<body>
	<header>
		<h1>Find Your Work</h1>
	</header>
	<nav>
		<li>
			<ul>
				<a href="accueil.html">Accueil</a>
			</ul>
			<ul>
			  <a href="offres.html">Offres</a>
			</ul>
			<ul>
			  <a href="connexion.html">Connexion</a>
			</ul>
			  <ul>
			 	<a href="inscription.html">Inscription</a>
			 </ul>
		</li>
	</nav>
   <form class="col-md-6" >
   	   <h3>Informations Générales</h3>
        <div class="row ">
   		    <div class="col-md-5">
   			  <label for="validationCustom01" class="form-label">Prenom</label>
   			  <input type="text" class="form-control " id="validationCustom01" name="Pre">   			  
   		    </div>
   		       <div class="col-md-4">
   			      <label for="validationCustom01" class="form-label">Nom</label>
   			      <input type="text"  class="form-control" id="validationCustom01" name="nomm">
   		       </div>
   		</div>
   		        <div class="row">
   		             <div class="col-md-5">
   			            <label>Date de Naissance</label>
   			            <input type="Date" class="form-control" name="date">
   		             </div>
   		                <div class="col-md-5">
   		                   <label id="validationCustom01">Lieu de Naissance</label>
   		                   <input type="text" class="form-control" id="validationCustom01" name="LieuNaiss">
   		                </div>
   		         </div>
   		                   <div>
   			                 <label>Sexe</label>
   			                 <input type="texte" name="sexe">
   		                   </div>
   		                   <div class="row">

   		                     <div class="col-md-5">
   			                     <label>E-mail</label>
   			                     <input type="mail" class="form-control" name="mymail">
   		                     </div>
   		                             <div class="col-md-5">
   			                             <label>Numero Telephone</label>
   			                             <input type="text" class="form-control" name="mynumber">
   		                             </div>
   		                    </div>
   		                               <div class="row">
   		                                   <div class="col-md-5">
   		                                   	   <label>Region</label>
   		                                   	   <input type="text" class="form-control" name="region">
   		                                   </div>
   		                                        <div class="col-md-5">
   		                                        	<label>Departement</label>
   		                                        	<input type="text" class="form-control" name="departement">
   		                                        </div>
   		                                </div>
   		                                         <div class="row">
   		                                            <div class="col-md-5">
   		                                            	<label>Mot de passe</label>
   		                                            	<input type="password" class="form-control" name="mdp">
   		                                            </div>
   		                                               <div class="col-md-5">
   		                                            	<label>Confirmer mot de passe</label>
   		                                            	<input type="password" class="form-control" name="mdp">
   		                                               </div>
   		                                           </div>

   		               <div> <input type="submit" class="btn btn-success" value="Creer un compte"></div>

   </form>
</body>
</html>