<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v4 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="CSS/style.css?t=<?php echo time();?>">
    <!-- <link rel="stylesheet" href="css/style.css"/> -->
</head>
 <?php 
    include("header_principale.php");
    ?>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
				<h2>INFORMATION</h2>
				<p class="text-2"><span>Candidat:</span> Les candidats disposent d'un panel complet sur leur compte pour pouvoir télécharger leurs cv en ligne ou de créer leurs cv en ligne en indiquant les expériences, les diplômes et bien d'autre sinformations qui constitus le CV. Ils peuvent également gérer en quelques cliques sur une dasboard leurs différentes candidatures.</p>
				<p class="text-2"><span>Recruteur:</span> Les employeurs quand à eux peuvent poser des appels à candidature sur le site web et de pouvoir gérer simplement les candidatures des postulants.</p>
				<!-- <div class="form-left-last">
					<input type="submit" name="account" class="account" value="Have An Account">
				</div> -->
			</div>
			<form id="form" class="form-detail" method="post" action="control_inscription.php" >
				<h2> INSCRIPTION</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">Prenom</label>
						<input type="text" name="mypname" id="prenom" class="input-text">
						<span id="error"></span>
					</div>
					<!-- **************************NOM********************* -->
					<div class="form-row form-row-1">
						<label for="last_name">Nom</label>
						<input type="text" name="myname" id="nom" class="input-text">
						<span id="nomError"></span>
					</div>
				</div>
				 <div class="form-group">
				 	<!-- ************************SEXE********************* -->
				 <div class="form-row form-row-1">    
							<label>Sexe</label> 
                    <select id="genre" name="mysex">
                        <option value="" disabled selected>Genre</option>
                        <option value="Masculin">Masculin</option>
                        <option value="Feminin">Feminin</option>
                    </select>

							<!-- 	<input type="radio" name="mysex" value="Masculin">
								<label class="form-check-label">Masculin</label>
								<input type="radio" name="mysex" value="Feminin">
								<label class="form-check-label">Feminin</label> -->	
						</div>
				 	<div class="form-row form-row-1">          
							<label>Date de naissance</label>
							<input id="datee" type="date" class="form-control" name="mydate" placeholder="date de naissance">
				 	</div>
				 </div>
				 <!-- ****************************ADRESSE************************* -->
                   <div class="form-group">
                   	  <div class="form-row form-row-1">
                   	  	<label for="phone">Telephone</label>
							<input id="phone" type="text" class="form-control" name="myphone" placeholder="Telephone">
							<span id="phoneError"></span>
                   	  </div>
                   	  <div class="form-row form-row-1">
                   	  	<label for="addr">Adresse</label>
							<input id="addr" type="text" class="form-control" name="myaddress" placeholder="Adresse">
							<span id="addrError"></span>
                   	  </div>
                   	  <!-- ************************REG-VILLE***************** -->
                   </div>
                       <div class="form-group">
                       	  <div class="form-row form-row-1">
                       	  	<label for="region">Region</label>
							<input id="region" type="text" class="form-control" name="myregion" placeholder="Region">
							<span id="regError"></span>
                       	  </div>
                       	  <div class="form-row form-row-1">
                       	  	<label for="ville">Ville</label>
							<input id="ville" type="text" class="form-control" name="myville" placeholder="Ville">
							<span id="villeError"></span>
                       	  </div>
                       </div>
				<!-- ***************************EMAIL*************************** -->
				<div class="form-row">
					<label for="your_email">Votre Email</label>
					<input type="text" name="mymail" id="mail" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					<span id="mailError"></span>
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Password</label>
						<input type="password" name="mypwd" id="password" class="input-text" required>
						<span id="passwordError"></span>
					</div>
					<div class="form-row form-row-1">
						<label for="comfirm-password">Comfirm Password</label>
						<input type="password" name="myconfpwd" id="comfirm_password" class="input-text" required>
						<span id="password2Error"></span>
					</div>
				</div>
				<!-- <div class="form-checkbox">
					<label class="container"><p>I agree to the <a href="#" class="text">Terms and Conditions</a></p>
					  	<input type="checkbox" name="checkbox">
					  	<span class="checkmark"></span>
					</label>
				</div> -->
				<div class="form-row-last">
					<button style="margin:auto; margin-right:200px ; width:100%" type="submit" name="register" class="register" value="Register">Valider inscription</button>
				</div>
				<div class="form-row-last">
					<div class="text-center">
							Vous avez déjà un compte ?
							<a href="connexion.php">Connectez-vous</a>
						</div>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	<script>

		  $(function(){
     $("#datee").datepicker(
        {
          minDate: 0
    });
});
		 var form = document.getElementById("form");
         let myRegex = /^[a-zA-Z-\s]+$/;
         let numRegex = /^[0-9\s]+$/;
         let maail =/[^@]+@[^@]+.[a-zA-Z]{2,6}/;
     form.addEventListener("submit",function (e) {
     	// ***************PRENOM*************
        var prenom = document.getElementById("prenom");
          if (prenom.value.trim()=="")
           {
           	var Myerror = document.getElementById("error");
           	Myerror.innerHTML="Le champ prenom est requis";
           	Myerror.style.color="red";
           	e.preventDefault();
           }
           else if(myRegex.test(prenom.value)==false)
           {
           	var Myerror = document.getElementById("error");
           	Myerror.innerHTML="Le  prenom doit comporter uniquement des lettre";
           	Myerror.style.color="red";
           	e.preventDefault();
           }

           // ***************NOM*************
        var nom = document.getElementById("nom");
          if (nom.value.trim()=="")
           {
           	var MynomError = document.getElementById("nomError");
           	MynomError.innerHTML="Le champ nom est requis";
           	MynomError.style.color="red";
           	e.preventDefault();
           }
           else if(myRegex.test(nom.value)==false)
           {
           	var MynomError = document.getElementById("nomError");
           	MynomError.innerHTML="Le nom doit comporter uniquement des lettre";
           	MynomError.style.color="red";
           	e.preventDefault();
           }


           // ***************TELEPHONE*************
        var phone = document.getElementById("phone");
          if (phone.value.trim()=="")
           {
           	var MyphoneError = document.getElementById("phoneError");
           	MyphoneError.innerHTML="Le champ telephone est requis";
           	MyphoneError.style.color="red";
           	e.preventDefault();
           }
           else if(numRegex.test(phone.value)==false)
           {
           	var MyphoneError = document.getElementById("phoneError");
           	MyphoneError.innerHTML="Le numero doit comporter uniquement des chiffres";
           	MyphoneError.style.color="red";
           	e.preventDefault();
           }


           // ***************ADRESSE*************
        var addr = document.getElementById("addr");
          if (addr.value.trim()=="")
           {
           	var MyaddrError = document.getElementById("addrError");
           	MyaddrError.innerHTML="Le champ adresse est requis";
           	MyaddrError.style.color="red";
           	e.preventDefault();
           }
           // else if(myRegex.test(addr.value)==false)
           // {
           // 	var MyaddrError = document.getElementById("addrError");
           // 	MyaddrError.innerHTML="L'adresse doit comporter uniquement des lettre";
           // 	MyaddrError.style.color="red";
           // 	e.preventDefault();
           // }
            

            // ***************REGION*************
        var region = document.getElementById("region");
          if (region.value.trim()=="")
           {
           	var MyregError = document.getElementById("regError");
           	MyregError.innerHTML="Le champ region est requis";
           	MyregError.style.color="red";
           	e.preventDefault();
           }
           // else if(myRegex.test(region.value)==false)
           // {
           // 	var MyregError = document.getElementById("regError");
           // 	MyregError.innerHTML="La region doit comporter uniquement des lettre";
           // 	MyregError.style.color="red";
           // 	e.preventDefault();
           // }



           // ***************VILLE*************
        var ville = document.getElementById("ville");
          if (ville.value.trim()=="")
           {
           	var MyvilleError = document.getElementById("villeError");
           	MyvilleError.innerHTML="Le champ ville est requis";
           	MyvilleError.style.color="red";
           	e.preventDefault();
           }
           // else if(myRegex.test(ville.value)==false)
           // {
           // 	var MyvilleError = document.getElementById("villeError");
           // 	MyvilleError.innerHTML="La ville doit comporter uniquement des lettre";
           // 	MyvilleError.style.color="red";
           // 	e.preventDefault();
           // }
                
             

           // ***************E-MAIL*************
        var mail = document.getElementById("mail");
          if (mail.value.trim()=="")
           {
           	var MymailError = document.getElementById("mailError");
           	MymailError.innerHTML="Le champ E-mail est requis";
           	MymailError.style.color="red";
           	e.preventDefault();
           }
           else if(maail.test(mail.value)==false)
           {
           	var MymailError = document.getElementById("mailError");
           	MymailError.innerHTML="Le mail doit comporter  des lettre";
           	MymailError.style.color="red";
           	e.preventDefault();
           }


	             // ***************PASSWORD*************

                   

        var password = document.getElementById("password");
        var password2 = document.getElementById("password2");
        const passwordValue = password.value.trim();
	     const password2Value = password2.value.trim();
          if (passwordValue=="")
           {
           	var MypasswordError = document.getElementById("passwordError");
           	MypasswordError.innerHTML="Le mot de passe est requis";
           	MypasswordError.style.color="red";
           	e.preventDefault();
           }
           if (password2Value=="")
           {
           	var Mypassword2Error = document.getElementById("password2Error");
           	Mypassword2Error.innerHTML="Le mot de passe est requis";
           	Mypassword2Error.style.color="red";
           	e.preventDefault();
           }
           else if(passwordValue !== password2Value)
           {
              var CoError = document.getElementById("corresp");
             	CoError.innerHTML="Les deux mot de passe ne correspondent pas";
           	    CoError.style.color="red";
           	    e.preventDefault();
           }

     });

	</script>
	<?php
        include("footer.php");
    ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>