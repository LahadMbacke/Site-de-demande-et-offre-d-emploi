<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
        <!-- <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>"> -->
        <link rel="stylesheet" href="CSS/w3.css">
        <link rel="stylesheet" href="jquery-ui.min.css">
	<title></title>
</head>
<body>
 <?php
        include("myHead.php");
    ?>
    <div class="w3-content" style="max-width:703px;">
        <div id="regForm"class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
<div class="modal-body">
                      <h3 id="h2" class="w3-text-blue w3-margin-top " >Niveau d´expérience global</h3>
            <div class="tab2">
                <form id="eform" method="post" action="control_profil.php" enctype="multipart/form-data">
                
                    <select class="w3-select w3-border w3-section" name="AnneeExper">
                        <option value="" disabled selected>choisir votre expérience</option>
                        <option value="avant bac">Etudiant, jeune diplômé</option>
                        <option value="0">Pas d'experience professionelle</option>
                        <option value="1">1 an d'experience</option>
                        <option value="2">2 ans d'experience</option>
                        <option value="3">3 ans d'experience</option>
                        <option value="4">4 ans d'experience</option>
                        <option value="5">5 ans d'experience</option>
                        <option value="6">6 ans d'experience</option>
                        <option value="7">7 ans d'experience</option>
                        <option value="8">8 ans d'experience</option>
                        <option value="9">9 ans d'experience</option>
                        <option value="10">10 ans d'experience</option>
                        <option value="11">plus de 10 ans d'experience</option>
                    </select>
                    
                    <div class="w3-container">
                        <p class="w3-bottombar">Expérience professionnelle</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m6">
                                    <label for="">DATE DE DÉBUT</label>
                                    <input id="dateD" type="text" name="DateDeb" >
                                    <span id="deberror"></span>
                                </div>
                                <div class="w3-col m6">
                                    <label for="">DATE DE FIN</label>
                                    <input id="dateF"  type="text" name="DateFin" >
                                    <span id="finerror"></span>
                                </div>
                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m4">
                                    <input id="intitule" type="text" name="intitule"  placeholder="Intitulé du poste">
                                    <span id="inerror"></span>
                                </div>
                                <div class="w3-col m4">
                                    <input id="entreprise"  type="text" name="NomEntreprise"  placeholder="Nom de l'entreprise">
                                    <span id="enterror"></span>
                                </div>
                                <div class="w3-col m4">
                                    <input id="secteur" type="text" name="secteur"  placeholder="Secteur">
                                    <span id="secerror"></span>
                                </div>

                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea style="width: 100%;" name="DetailExperience"  cols="50" rows="5" placeholder="Saisissez une description detaillée de votre expérience professionnelle (recoommandé :au moins 150 caracteres)"></textarea>
                                </div>
                            </div><br>
                            

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" name="EnvoyerExperience" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>    
            </div>
    </div>
</div>
</div>
<?php
    include("footer.php");
  ?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script>


    $(function(){
     $("#dateD").datepicker(
        {  
          dateFormat: 'yy-mm-dd',	
          maxDate: 0
    });
});

     $(function(){
     $("#dateF").datepicker(
        {
        	dateFormat: 'yy-mm-dd',
             maxDate: 0
    });
});

    // **************************EXPER**********************
var eform = document.getElementById("eform");
eform.addEventListener("submit",function (e) {

    var dateD = document.getElementById("dateD").value;
    var varDate = new Date(dateD); //dd-mm-YYYY
    var today = new Date();
    today.setHours(0,0,0,0);

        if(varDate > today || dateD=="") {
        var Deberror = document.getElementById("deberror");
            Deberror.innerHTML="Vous devez saisir une date inferieur ou egal a Aujourd'hui";
            Deberror.style.color="red";
            e.preventDefault();
        }



    var dateF = document.getElementById("dateF").value;
    var varDate = new Date(dateF); //dd-mm-YYYY
    var today = new Date();
    today.setHours(0,0,0,0);

        if(varDate > today || dateF=="" || dateF<dateD) {
        var Finerror = document.getElementById("finerror");
            Finerror.innerHTML="Vous devez saisir une date inferieur ou egal a Aujourd'hui";
            Finerror.style.color="red";
            e.preventDefault();
        }


        // ***************INTITULE*************
        var intitule = document.getElementById("intitule");
          if (intitule.value.trim()=="")
           {
            var MyintError = document.getElementById("inerror");
            MyintError.innerHTML="Ce champ est requis";
            MyintError.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(intitule.value)==false)
           // {
           //  var MyintError = document.getElementById("inerror");
           //  MyintError.innerHTML="Le nom doit comporter uniquement des lettre";
           //  MyintError.style.color="red";
           //  e.preventDefault();
           // }


           // ***************ENTREPRISE*************
        var entreprise = document.getElementById("entreprise");
          if (entreprise.value.trim()=="")
           {
            var MyentError = document.getElementById("enterror");
            MyentError.innerHTML="Ce champ est requis";
            MyentError.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(entreprise.value)==false)
           // {
           //  var MyentError = document.getElementById("enterror");
           //  MyentError.innerHTML="Le nom doit comporter uniquement des lettre";
           //  MyentError.style.color="red";
           //  e.preventDefault();
           // }
           // ***************SECTEUR*************
        var secteur = document.getElementById("secteur");
          if (secteur.value.trim()=="")
           {
            var MysecError = document.getElementById("secerror");
            MysecError.innerHTML="Ce champ est requis";
            MysecError.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(secteur.value)==false)
           // {
           //  var MysecError = document.getElementById("secerror");
           //  MysecError.innerHTML="Le nom doit comporter uniquement des lettre";
           //  MysecError.style.color="red";
           //  e.preventDefault();
           // }
});
</script>
</body>
</html>