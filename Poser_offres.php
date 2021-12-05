<?php
session_start();
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
$idRec=$_SESSION['id'];
$req = "SELECT * FROM recruteur where idRecruteur = '$idRec'";
    $rep=$connect->prepare($req); //this instruction preparered the requete
    $rep->execute();//execute la requete 
    $row = $rep->fetch();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
        <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>">
        <link rel="stylesheet" href="CSS/w3.css">
        <link rel="stylesheet" href="jquery-ui.min.css">
    <title>Document</title>
    <style>
        /* Style the form */
        #regForm {
        background-color: white;
        margin: 100px auto;
        padding: 40px;
        width: 70%;
        min-width: 300px;
        }

        /* Style the input fields */
        input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        }

        #titre{
            text-align: center;
        }

    </style>
</head>
<body>
    <!-- Page header -->
    <?php
        include("Rec_header.php");
    ?>
    <!-- Page content -->
    <div class="w3-content" style="max-width:1532px;">
        <div id="regForm"class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">

            <h1 id="titre" class=" w3-center" >Poster un offre</h1>
            <br><br>
          <div class="tab1">
            <script src="ckeditor/ckeditor.js"></script>
            <form id="form" method="post" action="control_Poser_Offre.php" enctype="multipart/form-data">
                
<!-- ********************************************** offre emploi****************************************************** -->
                    <div class="w3-container">
                        <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">Critere de l'offre</h3>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding w3-margin-top">
                                <div class="w3-col m6">
                                    <input class="inpute" id="metier" type="texte" name="metier" placeholder="Nom (metier)" >
                                    <span id="error"></span>
                                </div>
                                <div class="w3-col m6">
                                    <input id="secteur" class="inpute" type="texte" name="secteur" placeholder="Nom de secteur" >
                                    <span id="serror"></span>
                                </div>
                                
                            </div>
                            <br>
                            
                                <!-- <div class="w3-col m6">
                                    <input id="compt" class="inpute" type="text" name="competence"  placeholder="Compétence">
                                    <span id="cerror"></span>
                                </div> -->
                                
                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-row-padding">
                                    <div class="w3-col m6">
                                        <select id="diplo" class="w3-select w3-border w3-section" name="diplome">
                                            <option value="" disabled selected>Diplome</option>
                                            <option value="avant bac">avant bac</option>
                                            <option value="bac">bac </option>
                                            <option value="bac+1">bac+1</option>
                                            <option value="bac+2">bac+2</option>
                                            <option value="bac+3">bac+3</option>
                                            <option value="bac+4">bac+4</option>
                                            <option value="bac+5">bac+5</option>
                                            <option value="bac+5 et plus">bac+5 et plus</option>
                                        </select>
                                        <span id="derror"></span>
                                    </div>
                                    <div class="w3-col m6">
                                        <select id="reg" style="font-size: 20px;padding:10px" class="w3-select w3-border w3-section" name="region" >
                                            <option value="" disabled selected value="">Région</option>
                                            <option value="Dakar">Dakar</option>
                                            <option value="Diourbel">Diourbel</option>
                                            <option value="Fatick">Fatick</option>   
                                            <option value="Kaffrine">Kaffrine</option>
                                            <option value="Kaolack">Kaolack</option>
                                            <option value="Kédougou">Kédougou</option>
                                            <option value="Kolda">Kolda</option> 
                                            <option value="Louga">Louga</option>
                                            <option value="Matam">Matam</option>
                                            <option value="Saint-Louis">Saint-Louis</option> 
                                            <option value="Sédiou">Sédiou</option>
                                            <option value="Tambacounda">Tambacounda</option>
                                            <option value="Thies">Thies</option>
                                            <option value="Ziguinchor">Ziguinchor</option>
                                            
                                            
                                        </select>
                                         <span id="rerror"></span>
                                    </div>
                                        <!-- <div class="w3-col m12">
                                    <input class="inpute" type="text" name="contrat"  placeholder="Type de contrat">
                                </div> -->
                                 <div class="w3-col m12">
                                        <select id="contrat" style="font-size: 20px;padding:10px" class="w3-select w3-border w3-section" name="contrat" >
                                        <option value="" disabled selected value="">Type de contrat</option>
                                            <option value="CDI">CDI</option>
                                            <option value="CDD">CDD</option>
                                            <option value="Interim">Interim</option>
                                            <option value="Stage">Stage</option>
                                            <option value="Alternace/Apprentissage">Alternace/Apprentissage</option>
                                            <option value="Independant">Independant</option>
                                        </select>
                                        <span id="conrerror"></span>
                                    </div>
                                    <!-- DATE EXPIRATION -->
                              <div class="w3-row-padding">
                                <div class="w3-col m6">
                                    <label for="">DATE D'EXPIRATION</label>
                                    <input id="dadate" class="inpute" type="text" name="DateExp" >
                                    <span id="dexerror" ></span>
                                </div>
                                
                               </div>
                                </div>
                            </div>
                            <br>
                            
                        </div>
                    </div>
                    <br>
                         <div class="w3-row-padding">
                                <!-- <div class="w3-container"> -->
                                    <div class="w3-container w3-border w3-row-padding">
                                        <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">Experience</h3>
                        <div class="w3-container w3-border w3-row-padding">
                                        <div class="w3-row-padding">
                                            <div class="w3-col m12">
                                               <!--  <textarea id="exper" style="width: 100%;" name="experience" cols="100" rows="10" placeholder="Experience"></textarea> -->
                                                <textarea id="exper" name="experience"  cols="100" rows="10" placeholder="Saisissez une description detaillée de l'entreprise">
                                                </textarea>
                                            </div>
                                            <span id="eerror"></span>
                                        </div><br>
                                    </div>
                                </div>
                                <div class="w3-container w3-border w3-row-padding">
                                    <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">Competence</h3>
                        <div class="w3-container w3-border w3-row-padding">
                                    <!-- <div class="w3-row-padding"> -->
                                        <div class="w3-col m12">
                                            <!-- <textarea id="compt" style="width: 100%;" name="competence" cols="100" rows="10" placeholder="Compétence"></textarea> -->
                                            <textarea id="compt" name="competence"  cols="100" rows="10" placeholder="Saisissez une description detaillée de l'entreprise">
                                    </textarea>
                                        </div>
                                        <span id="cerror"></span>
                                    <!-- </div> -->
                                    <br>
                                </div>
                            </div>
                    <!-- ********************************************** Description du poste****************************************************** -->
                    <div class="w3-container">
                        <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">Description du poste</h3>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea id="poste" style="width: 100%;" name="DescriptionPoste" cols="100" rows="10" placeholder="Saisissez une description du poste"></textarea>
                                    <!-- <textarea id="poste" name="DescriptionPoste"  cols="100" rows="10" placeholder="Saisissez une description detaillée de l'entreprise">
                                    </textarea> -->
                                </div>
                                <span id="perror"></span>
                            </div><br>
                        </div>
                    </div>
                    <br>
                   <!-- ********************************************** Description du profil****************************************************** -->
                    <div class="w3-container">
                        <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">Description du profil</h3>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                   <!--  <textarea id="profil" style="width: 100%;" name="DescriptionProfil"  cols="100" rows="10" placeholder="Saisissez une description detaillée du profil)"></textarea>
                                </div> -->
                                <textarea id="profil" name="DescriptionProfil"  cols="100" rows="10" placeholder="Saisissez une description detaillée de l'entreprise">
                                    </textarea>
                                <span id="prerror"></span>
                            </div><br>
                        </div>
                    </div>
                    <br>
                    <!-- ********************************************** Entreprise****************************************************** -->
                    <div class="w3-container">
                        <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">A propos de l'Entreprise</h3>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea style="width: 100%;" name="Entreprise"  cols="100" rows="10" placeholder="Saisissez une description detaillée de l'entreprise"
                                    ><?php echo $row["Description"]; ?> </textarea>
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <br>

<!-- ********************************** Logo entreprise *********************************** -->
                     <div class="w3-container">
                        <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">Logo de l'entreprise</h3>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="col-md-4 ">
                               <input  type="file" class="btn" name="logo">
                            </div>
                        </div>
                    </div>


 <!-- **********************************Fiche Ofrre d'emploi*********************************** -->
                     <div class="w3-container">
                        <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">Fiche d'offre d'emploi</h3>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="col-md-4 ">
                               <input  type="file" class="btn" name="fiche_cv">
                            </div>
                        </div>
                    </div>
                <button type="submit" name="" class="w3-block w3-green w3-margin-top">Envoyer</button>



            </form>  <!-- FIN Form -->
        </div>
    </div>

    </div>

    <!-- Page footer -->
    <?php
        include("footer.php");
    ?>

 

 <!-- <script src="jquery-3.6.0.min"></script> -->
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script>
             CKEDITOR.replace("profil");
             CKEDITOR.replace("compt");
             CKEDITOR.replace("exper");

    $(function(){
     $("#dadate").datepicker(
        {
            dateFormat: 'yy-mm-dd',
          minDate: 0
    });
});
        var form = document.getElementById("form");
         let myRegex = /^[a-zA-Z-\s]+$/;
        form.addEventListener("submit",function (e) {

    
      var date = document.getElementById("dadate").value;
    var varDate = new Date(date); //dd-mm-YYYY
    var today = new Date();
    today.setHours(0,0,0,0);

        if(date=="") {
        var Dexrror = document.getElementById("dexerror");
            Dexrror.innerHTML="Vous devez saisir une date superieur ou egal a Aujourd'hui";
            Dexrror.style.color="red";
            e.preventDefault();
        }
        // **********************METIER**********************

            var metier = document.getElementById("metier");
          if (metier.value.trim()=="")
           {
            var Myerror = document.getElementById("error");
            Myerror.innerHTML="Ce champ est requis";
            Myerror.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(metier.value)==false)
           // {
           //  var Myerror = document.getElementById("error");
           //  Myerror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Myerror.style.color="red";
           //  e.preventDefault();
           // }

           // **********************SECTEUR*************
           var secteur = document.getElementById("secteur");
          if (secteur.value.trim()=="")
           {
            var Serror = document.getElementById("serror");
            Serror.innerHTML="Ce champ est requis";
            Serror.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(secteur.value)==false)
           // {
           //  var Serror = document.getElementById("serror");
           //  Serror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Serror.style.color="red";
           //  e.preventDefault();
           // }


           // **********************Experience*************
           var exper = document.getElementById("exper");
          if (exper.value.trim()=="")
           {
            var Eerror = document.getElementById("eerror");
            Eerror.innerHTML="Ce champ est requis";
            Eerror.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(exper.value)==false)
           // {
           //  var Eerror = document.getElementById("eerror");
           //  Eerror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Eerror.style.color="red";
           //  e.preventDefault();
           // }

           // **********************Competence*************
          //  var compt = document.getElementById("compt");
          // if (compt.value.trim()=="")
          //  {
          //   var Cerror = document.getElementById("cerror");
          //   Cerror.innerHTML="Ce champ est requis";
          //   Cerror.style.color="red";
          //   e.preventDefault();
          //  }
           // else if(myRegex.test(compt.value)==false)
           // {
           //  var Cerror = document.getElementById("cerror");
           //  Cerror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Cerror.style.color="red";
           //  e.preventDefault();
           // }

           // **********************Diplome*************
           var diplo = document.getElementById("diplo");
          // if (diplo.value.trim()=="")
          //  {
          //   var Derror = document.getElementById("derror");
          //   Derror.innerHTML="Ce champ est requis";
          //   Derror.style.color="red";
          //   e.preventDefault();
          //  }
           // else if(myRegex.test(diplo.value)==false)
           // {
           //  var Derror = document.getElementById("derror");
           //  Derror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Derror.style.color="red";
           //  e.preventDefault();
           // }

           // **********************Region*************
          //  var reg = document.getElementById("reg");
          // if (reg.value.trim()=="")
          //  {
          //   var Rerror = document.getElementById("rerror");
          //   Rerror.innerHTML="Ce champ est requis";
          //   Rerror.style.color="red";
          //   e.preventDefault();
          //  }
           // else if(myRegex.test(reg.value)==false)
           // {
           //  var Rerror = document.getElementById("rerror");
           //  Rerror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Rerror.style.color="red";
           //  e.preventDefault();
           // }

           // **********************Type de Contrat*************
           var contrat = document.getElementById("contrat");
          if (contrat.value.trim()=="")
           {
            var Conerror = document.getElementById("conrerror");
            Conerror.innerHTML="Ce champ est requis";
            Conerror.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(contrat.value)==false)
           // {
           //  var Conerror = document.getElementById("conrerror");
           //  Conerror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Conerror.style.color="red";
           //  e.preventDefault();
           // }
             // **********************Poste*************
           var poste = document.getElementById("poste");
          if (poste.value.trim()=="")
           {
            var Ponerror = document.getElementById("perror");
            Ponerror.innerHTML="Ce champ est requis";
            Ponerror.style.color="red";
            e.preventDefault();
           }
           // else if(myRegex.test(poste.value)==false)
           // {
           //  var Ponerror = document.getElementById("perror");
           //  Ponerror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Ponerror.style.color="red";
           //  e.preventDefault();
           // }


           // **********************Profil*************
           var profil = document.getElementById("profil");
          // if (profil.value.trim()=="")
          //  {
          //   var Pronerror = document.getElementById("prerror");
          //   Pronerror.innerHTML="Ce champ est requis";
          //   Pronerror.style.color="red";
          //   e.preventDefault();
           // }
           // else if(myRegex.test(profil.value)==false)
           // {
           //  var Pronerror = document.getElementById("prerror");
           //  Pronerror.innerHTML="Ce champ doit comporter uniquement des lettre";
           //  Pronerror.style.color="red";
           //  e.preventDefault();
           // }
                 
// ***************************************************************************
// if ((profil.value.trim()!="") (&& metier.value.trim()!="") (&& secteur.value.trim()!="") && (exper.value.trim()!="") && (compt.value.trim()!="") && (diplo.value.trim()!="") && (reg.value.trim()!="") && (contrat.value.trim()!="") && (poste.value.trim()!="") ) {

//                swal({
//               title: "Success!",
//               text: "Votre offre a ete envoye",
//                type: 'success',
//               // timer: 2000,
//               showConfirmButton: true
//             }, function(){
//                   window.location.href = "http://localhost/MEMOIRE/Poser_offres.php" ;
//             });

//                    }
});


    </script>
</body>
</html>