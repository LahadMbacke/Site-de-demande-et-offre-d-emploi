<!DOCTYPE html>
<html>
<head>
	<title></title>
	 
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
	<link rel="stylesheet" href="emploi.css?t=<?php echo time();?>">
</head>
<body>
	<div class="container" >
		<form class="form-group Inscription" method="post" action="control_inscription.php">
			<fieldset>
				<legend>Information personnelle</legend>
			<div class="row ">
				<!-- PRENOM -->
				<div class="col-md-6">
					<label>Prenom</label>
     	               <input type="text" class="form-control" name="mypname" placeholder="Prenom">
				</div>
				<!-- NOM -->
				    <div class="col-md-6">
					  <label>Nom</label>
     	                 <input type="text" class="form-control" name="myname" placeholder="Nom">
				   </div>
				<!-- :::::::SEX -->

				<div class="col-md-6">
					 <label>Sexe</label> 	
				   
     	               <div class="sex">    
     	                 	
     		               <input type="radio" name="mysex" value="Masculin">
     		               <label class="form-check-label">Masculin</label>
     		               <input type="radio" name="mysex" value="Feminin">
     		               <label class="form-check-label">Feminin</label>
     	               </div>
     	                        
     	        </div>
				       <!-- TELEPHONE -->
				          <div class="col-md-6">
					      <label>Date de naissance</label>
     	                      <input type="Date" class="form-control" name="mydate" placeholder="date de naissance">
				          </div>
				
			</fieldset>


			<fieldset>
				<legend>Vos contact</legend>
				  <div class="row ">
				     <!-- TELEPHONE -->
				          <div class="col-md-6">
					      <label>Telephone</label>
     	                      <input type="text" class="form-control" name="myphone" placeholder="Telephone">
				          </div>

				               <!-- TELEPHONE -->
				                   <div class="col-md-6">
					                  <label>Adresse</label>
     	                                 <input type="text" class="form-control" name="myaddress" placeholder="Adresse">
				                   </div>
				                <!-- REGION -->
				                   <div class="col-md-6">
					                  <label>Region</label>
     	                                 <input type="text" class="form-control" name="myregion" placeholder="Region">
			                    	</div>
			                    	  <!-- DEPARTEMENT -->
			                    	      <div class="col-md-6">
					                         <label>Ville</label>
     	                                         <input type="text" class="form-control" name="myville" placeholder="Ville">
			                    	</div>
			                  </div>
             </fieldset>


                   <fieldset>
                   	   <legend>Informations confidentielles</legend>
                   	   <div class="col-md-12">
                   	         <!-- MAIL -->
				              <div >
					             <label>E-mail</label>
     	                            <input type="E-mail" class="form-control" name="mymail" placeholder="E-mail">
				              </div> 
                          <!-- PASSWORD -->
				              <div >
					             <label>Password</label>
     	                            <input type="text" class="form-control" name="mypwd" placeholder="Password">
				              </div>
				              <!-- CONFIRMATION PASSWORD -->
                           
				                  <div>
					               <label>Confirmation</label>
     	                              <input type="text" class="form-control" name="myconfpwd" placeholder="confirmer votre mot depasse">
				                  </div>
				             <!-- BOUTON VALIDER -->
				       <div  class="col-md-12 text-center">
				       	<button type="submit" class=" form-control btn btn-info">Valider inscription</button>
				       </div>
                                    <!-- LIEN VERS LA CONNEXION -->
				        <div class="text-center">Vous avez déjà un compte ?<a href="connexion.php">Connectez-vous</a></div>
			</div>
			</div>
			 </fieldset>
			
		</form>
		
	</div>
  <!-- <section id="contenu">
     <form method="post" action="" class="container myform"> 
       <div class="row">
     	<div class="col">
     		<label class="col-form-label">Prenom</label>
     	    <input type="text" class="form-control" name="mypname">
     	    <label class="col-form-label">Nom</label>
     		<input type="text" class="form-control" name="myname">
     	</div>
       </div>

     	
      <label>Sexe</label>
     	<div>     		
     		  <input type="radio" name="mysex" value="Masculin">
     		  <label class="form-check-label">Masculin</label>
     	</div>
     	<div>    		
     		  <input type="radio" name="mysex" value="Feminin">
     		  <label class="form-check-label">Feminin</label>
     	</div>

           <div class="row">
     	<div class="col">
     		<label class="col-form-label">E-mail</label>
     	    <input type="text" class="form-control" name="mymail">
     	    <label class="col-form-label">Numero telephone</label>
     		<input type="text" class="form-control" name="myphone">
     	</div>
       </div>
            <div class="row">
     	<div class="col">
     		<label class="col-form-label">Region</label>
     	    <input type="text" class="form-control" name="myregion">
     	    <label class="col-form-label">Departement</label>
     		<input type="text" class="form-control" name="myDpt">
     	</div>
       </div>

           <div class="row">
     	    <div class="col">
     	         	<label class="col-form-label">Entrer votre login</label>
     	         	<input type="text" class="form-control" name="mylogin">

     	           	  <label class="col-form-label">Entrer votre mot de passe</label>
     	           	  <input type="password" class="form-control col-md-4" name="mymdp">

     	           	  <label class="col-form-label">Confirm votre mot de passe</label>
     	           	   <input type="password" class="form-control" name="mymdpCheck">
     	      </div>
     	 </div>

     	      <div class="col-form-label " id="valid"><input type="submit" value="Valider votre inscription"  class="btn btn-warning"></div>
     </form>
   </section> -->
</body>
</html>