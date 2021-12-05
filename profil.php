
<?php
session_start();
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

$receive = "SELECT * FROM profil  where idProfil=? ";
             $resultat=$connect->prepare($receive); //permet de faire la requte preparer
              $resultat->bindParam(1, $_SESSION['id']);
              $resultat->execute();//execute la requete  
              // echo $_SESSION['id'];  
            $row = $resultat->fetch();//parcours les valeurs de resultat s'il ya des elemnts il execute
                // {
                    // echo $row['idMembre']; 

            // }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="CSS/w3.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>">
    <link rel="stylesheet" href="CSS/profil.css?t=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
   

</head>
<body>
    <?php
        include("myHead.php");
    ?>

<section class=" seccc w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">      
<section id="photo_cv" class="container card w3-container w3-blue-grey">
    <!-- Modal -->
<div class="modal fade" id="photo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Photo profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
                   <form method="post" action="control_profil.php" enctype="multipart/form-data">
                <div class="w3-row-padding">
                      <div class="w3-col m6">
                        <label for="">JOIGNEZ VOTRE PHOTO</label> 
                        <input type="file" name="photo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" name="EnvoyerPhoto" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>

      </div>
     
    </div>
  </div>
</div>
  <div align="center">
       <?php 
       ////////////////////////////PHOTO PROFIL///////////////////////////
           if (!empty($row['photo'])) {
              ?>
                
             <button type="button" class="" data-bs-toggle="modal" data-bs-target="#photo"> <img src="<?php echo $row['photo'];?>" width="100"/></button>
            <?php 
           }
             else
             {
                ?>
                  <button type="button" class="" data-bs-toggle="modal" data-bs-target="#photo">Ajouter une photo</button>
                 <?php
             }

          ?>
            
       
            
     <h4> <?php echo $_SESSION['prenom']." ".$_SESSION['nom'] ; ?></h4>
 </div>

  <div id="Adres_Coor"> 
    <div id="coor">
   <!-- <h3>Coordonnees</h3>  -->

 <h4> <i class="bi bi-phone-fill"> </i><?php echo $_SESSION['tel'] ; ?></h4>   
 <h4> <i class="bi bi-envelope"> </i><?php echo $_SESSION['email'] ; ?></h4>                                                        
</div>

<div id="adress">
   <!-- <h3>Adresse</h3>  -->
   <h6> <i class="bi bi-geo-alt-fill"> </i><?php echo $_SESSION['adresse'] ; ?></h6> 
   <h6> <i class="bi bi-geo-alt-fill"> </i><?php echo $_SESSION['region']." ,".$_SESSION['ville'] ; ?></h6>  
</div>
</div>
   
</section>
<!-- ************************************CV*************************************** -->
<section id="cv" class="container card w3-container w3-blue-grey">
    <h5 class="h5CV">Mon CV</h5>
   <!--  <i class="bi bi-file-earmark-arrow-up"></i> -->
    <div class="modal fade" id="mycv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CV</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
            <form method="post" action="control_profil.php" enctype="multipart/form-data">
                <div class="w3-row-padding">
                    <div class="w3-row-padding">
                        <input  type="text" name="DescJobb"  placeholder="Metier recherche">
                    </div>
                    <div class="w3-col m6">
                        <label for="">JOIGNEZ VOTRE CV</label> 
                        <input class="inpute" type="file" name="cv">
                    </div>
                </div>
                   <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" name="EnvoyerCV" class="btn btn-primary">Enregistrer</button>
                  </div>
            </form>

      </div>
    </div>
  </div>
</div>

     <div align="center">
       <?php 
       //////////////////////////// CV///////////////////////////
           if (!empty($row['cv'])) {
              ?>
            
             <p class=" w3-padding-small"> <a href="affiche_MonCV.php?id=<?=$row['cv']?>"><button style="width:30%" class="btn btn-danger"><i class="bi bi-file-pdf">Voir mon CV</i></button></a> </p>
            <?php 
           }
             else
             {
                ?>
                  <button type="button" class="btn_depser_cv" data-bs-toggle="modal" data-bs-target="#mycv"><img style="width:100px" src="CVusers/cv.png"></button></br>
                  <span>Vous n'avez pas encore de CV</span>
                 <?php
             }
          ?>
 </div>
    
</section>


 <section class="SectioPro">



                   <!-- ********************************************** Diplomes****************************************************** -->
<!-- Modal -->
<div class="modal fade" id="diplome" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content ">
      <div class="modal-header">
           <div id="diplome" >
               
           </div>
        <h3 class="modal-title" id="exampleModalLabel">Diplomes</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
     </div>
    </div>

</div>

<!-- ///////////////////ADD////////////////////////// -->
     <div class="container">
       <!-- <div class="jumbotron"> -->
         <div class="card">
           <h3>Diplomes</h3>
           <!-- ///recup des diplomes? -->
           <div id="dipplome" >
    
           </div>
         </div>
           <div class="card">
             <div class="card-body">
              <a href="ADiplome.php"> <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#diplome">+ Ajouter une diplome</button></a>
             </div>
           </div>
       </div>
     </div>
                   
<!-- **********************************************Experience***************************************************** -->
         <!-- Modal -->
<div class="modal fade" id="experience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content ">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel">Experience</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      </div>
    </div>
  </div>
</div>

<!-- ///////////////////ADD////////////////////////// -->
     <div class="container">
       <div class="jumbotron">
         <div class="card">
           <p>Experience</p>
           <div id="exxperience" >
               
           </div>

         </div>
           <div class="card">
             <div class="card-body">
              <a href="AExperience.php"> <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#experience">+ Ajouter une experience</button></a>
             </div>
           </div>
       </div>
     </div>


<!-- *********************************************Competences***************************************************** -->

<div class="modal fade" id="competence" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content ">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel">Competence</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                   <h3 id="p" class="w3-text-blue w3-margin-top " >Vos compétences</h3>
            <div class="tab5">
               <form id="cform" method="post" action="control_profil.php" enctype="multipart/form-data">
                    
                    <div class="w3-container">
                        <p class="w3-bottombar">Compétences professionnelles</p>
                        <div class="w3-container w3-border w3-row-padding">
                           
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <input id="lib"  type="text" name="libelle"  placeholder="Libellé de votre compétence">
                                    <span id="libError"></span>
                                </div>

                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea style="width: 100%;" name="DetailForm"  cols="50" rows="5" placeholder="Saisissez une description detaillée de votre expérience professionnelle (recoommandé :au moins 150 caracteres)"></textarea>
                                </div>
                            </div><br>
                            

                        </div>
                    </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" name="EnvoyerCompetence" class="btn btn-primary">Enregistrer</button>
                      </div>
                </form>
            </div>
      </div>
     
    </div>
  </div>
</div>

<!-- ///////////////////ADD////////////////////////// -->
     <div class="container">
       <div class="jumbotron">
         <div class="card">
           <p>Competence</p>
           <div id="coompetence">
               
           </div>
         </div>
           <div class="card">
             <div class="card-body">
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#competence">+ Ajouter une competence</button>
             </div>
           </div>
       </div>
     </div>

               

<!-- *******************************************LANGUE************************************************************ -->
          

           
<!-- Modal -->
<div class="modal fade" id="langue" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content ">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel">Langue</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                     <h3 class="w3-text-blue w3-margin-top" >Langues</h3>
                <form method="post" action="control_profil.php" enctype="multipart/form-data">
                <div class="w3-row-padding ">
                    <div class="w3-col m12">
                        <p class="w3-bottombar">J'utilise la langue</p>   
                        <select class="w3-select w3-border w3-section" name="langue">
                            <option value="" disabled selected>Française</option>
                            <option value="Francais">Français</option>
                            <option value="Anglais">Anglais</option>
                        </select>
                    </div>
                    <div class="w3-col m12">
                        <p class="w3-bottombar">votre niveau de la langue</p>   
                        <select class="w3-select w3-border w3-section" name="NiveauLangue">
                            <option value="" disabled selected>Moyen</option>
                            <option value="moyen">Moyen</option>
                            <option value="bon">Bon</option>
                            <option value="TresBon">Tres Bien</option>
                        </select>
                    </div>
                </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" name="EnvoyerLangue"  class="btn btn-primary">Enregistrer</button>
                  </div>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>

<!-- ///////////////////ADD////////////////////////// -->
     <div class="container">
       <div class="jumbotron">
         <div class="card">
           <p>Langue</p>
           <div id="laangue">
               
           </div>
         </div>
           <div class="card">
             <div class="card-body">
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#langue">Ajouter une langue</button>
             </div>
           </div>
       </div>
     </div>


 </section>
 
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script type="text/javascript">

// **********************************CHARGER LES PROFILSS*************************************

$(document).ready(function (argument) {
  getDiplome();
  getExperience();
  getCompetence();
  getLangue();
  $(function(){
     $("#ddate").datepicker();
});
  
});
// **********************************CHARGER LES DIPLOMES*************************************

function getDiplome()
{
    $.ajax({

          type:"type",
          url:"Recup_Diplomes.php",
          // data:"data"
          dataType: "html",
          success:function (response) {
            $("#dipplome").html(response);
          }
    });
}
// **********************************CHARGER LES EXPERINECES*************************************



function getExperience()
{
    $.ajax({

          type:"type",
          url:"Recup_Experience.php",
          // data:"data"
          dataType: "html",
          success:function (response) {
            $("#exxperience").html(response);
          }
    });
}


// **********************************CHARGER LES COMPETENCES*************************************



function getCompetence()
{
    $.ajax({

          type:"type",
          url:"Recup_Competences.php",
          // data:"data"
          dataType: "html",
          success:function (response) {
            $("#coompetence").html(response);
          }
    });
}


// **********************************CHARGER LES COMPETENCES*************************************



function getLangue()
{
    $.ajax({

          type:"type",
          url:"Recup_Langues.php",
          // data:"data"
          dataType: "html",
          success:function (response) {
            $("#laangue").html(response);
          }
    });
}
 let myRegex = /^[a-zA-Z-\s]+$/;
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
// **************************COMPETEN**********************
var cform = document.getElementById("cform");
cform.addEventListener("submit",function (e) {

    var date = document.getElementById("cdate").value;
    var varDate = new Date(date); //dd-mm-YYYY
    var today = new Date();
    today.setHours(0,0,0,0);

        if(varDate > today || date=="" ) {
        var Cerror = document.getElementById("cerror");
            Cerror.innerHTML="Vous devez saisir une date inferieur ou egal a Aujourd'hui";
            Cerror.style.color="red";
            e.preventDefault();
        }


           // ***************LIBELLE*************
        var lib = document.getElementById("lib");
          if (lib.value.trim()=="")
           {
            var MylibError = document.getElementById("libError");
            MylibError.innerHTML="Le champ nom est requis";
            MylibError.style.color="red";
            e.preventDefault();
           }
           else if(myRegex.test(MylibError.value)==false)
           {
            var MylibError = document.getElementById("nomError");
            MylibError.innerHTML="Le nom doit comporter uniquement des lettre";
            MylibError.style.color="red";
            e.preventDefault();
           }
});

    </script>
</section>
<?php
        include("footer.php");
?>
</body>
</html>