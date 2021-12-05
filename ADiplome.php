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
      <h3 class="w3-text-blue w3-margin-top">NIVEAU D´ÉTUDES</h3>
        <form id="dform" method="post" action="control_profil.php" enctype="multipart/form-data">
                    <select id="niveau" class="w3-select w3-border w3-section" name="NiveauEtude">
                        <option value="" disabled selected>choisir votre niveau d'etude</option>
                        <option value="avant bac">avant bac</option>
                        <option value="bac">bac </option>
                        <option value="bac+1">bac+1</option>
                        <option value="bac+2">bac+2</option>
                        <option value="bac+3">bac+3</option>
                        <option value="bac+4">bac+4</option>
                        <option value="bac+5">bac+5</option>
                        <option value="bac+5 et plus">bac+5 et plus</option>
                        
                    </select>
                    <span id="niverror"></span>
                    
                    <div class="w3-container">
                        <p class="w3-bottombar">FORMATION</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <!-- <div class="w3-row-padding"> -->
                                <div class="w3-col m12">
                                    <label for="">DATE D'OBTENSION</label>
                                    <p><input style="width:100%" id="ddate" class="inpute" type="text" name="DateObten" ></p>
                                    <span id="derror" ></span>
                                </div>
                                
                            <!-- </div> -->
                            <br>
                            <div style="margin: auto;" class="w3-row-padding">
                                <div class="w3-col m6">
                                    <input style="width:100%" id="titre" class="inpute" type="text" name="TitreFormation" placeholder="Titre complet de votre formation">
                                    <span id="titerror"></span>
                                </div>
                                <div class="w3-col m6">
                                    <input style="width:100%" id="ecole" class="inpute" type="text" name="NomEcole"  placeholder="Nom de l'ecole ou l'etablissement">
                                    <span id="ecerror"></span>
                                </div>

                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea style="width: 100%;" name="DetailDiplom"  cols="(50" rows="5" placeholder="Saisir une description detaillee de votre formation"></textarea>
                                </div>
                            </div><br>
                            

                        </div>
                    </div>
                    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="EnvoyerDiplomes">Enregistrer</button>
      </div>
                </form>
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
     $("#ddate").datepicker(
        {
        	dateFormat: 'yy-mm-dd',
             maxDate: 0
    });
});


    // **************************DIPLO**********************
var dform = document.getElementById("dform");
dform.addEventListener("submit",function (e) {

    var date = document.getElementById("ddate").value;
    var varDate = new Date(date); //dd-mm-YYYY
    var today = new Date();
    today.setHours(0,0,0,0);

        if(varDate > today || date=="") {
        var Derror = document.getElementById("derror");
            Derror.innerHTML="Vous devez saisir une date inferieur ou egal a Aujourd'hui";
            Derror.style.color="red";
            e.preventDefault();
        }


           // ***************NIVEAU*************
        var niveau = document.getElementById("niveau");
          if (niveau.value.trim()=="")
           {
            var MynivError = document.getElementById("niverror");
            MynivError.innerHTML="Ce champ est requis";
            MynivError.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(niveau.value)==false)
           // {
           //  var MynivError = document.getElementById("niverror");
           //  MynivError.innerHTML="Le nom doit comporter uniquement des lettre";
           //  MynivError.style.color="red";
           //  e.preventDefault();
           // }
           // ***************TITRE*************
        var titre = document.getElementById("titre");
          if (titre.value.trim()=="")
           {
            var MytitError = document.getElementById("titerror");
            MytitError.innerHTML="Ce champ est requis";
            MytitError.style.color="red";
            e.preventDefault();
           }
           else if(myRegex.test(titre.value)==false)
           {
            var MytitError = document.getElementById("titerror");
            MytitError.innerHTML="Le nom doit comporter uniquement des lettre";
            MytitError.style.color="red";
            e.preventDefault();
           }

           // ***************ECOLE*************
        var ecole = document.getElementById("ecole");
          if (ecole.value.trim()=="")
           {
            var MyecError = document.getElementById("ecerror");
            MyecError.innerHTML="Ce champ est requis";
            MyecError.style.color="red";
            e.preventDefault();
           }
           else if(myRegex.test(ecole.value)==false)
           {
            var MyecError = document.getElementById("ecerror");
            MyecError.innerHTML="Le nom doit comporter uniquement des lettre";
            MyecError.style.color="red";
            e.preventDefault();
           }
});

</script>
</body>
</html>