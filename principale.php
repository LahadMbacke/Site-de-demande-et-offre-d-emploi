<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sunu Liguey</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>">  -->
    <link rel="stylesheet" href="CSS/principale.css?t=<?php echo time();?>"> 
    <link rel="stylesheet" href="CSS/w3.css">
</head>
<body>
   <?php 
              include("header_principale.php");

   ?>
   <!-- *****************************LA RECHERCHE******************************************** -->
    <div class="w3-container">
         <!-- ************************NOMBRE D'offre d'emploi************************ -->
        <h2 id="nombre"  style="text-align:center;"> <em id="total"></em> OFFRES DISPONIBLES SUR SUNU LIGUEY</h2><br>
        <form action="RechercheEmploi.php" method="post" class="w3-form">
                <div class="w3-row">
                    <!-- ******************Secteur , metier**************** -->
                    <div class="w3-col m5 metier" >
                        <input type="text" name="titre" id="metier" class="form-control w3-input w3-light-grey HeightInput" placeholder="Titre de poste ou mot-clé" />  
                       <div id="metierList"></div>
                    </div>
                    <!-- ******************Region, Ville****************** -->
                    <div class="w3-col m5"> 
                        <input class="w3-input w3-light-grey HeightInput" id="lieu" type="text" name="lieu" placeholder="Lieu : ville, code postal ou région">
                         <div id="lieuList"></div>
                    </div>
                     
                    <!-- <button id="btns" type="submit" class="button">Recherche</button> -->
                    <div><button id="btns" class="btn"><i class="bi bi-search chrch"></i></button></div>
                </div>
                <br><br>  
        </form>
    </div>
             <!-- ******************LES ANNONCES PAR SECTEUR****************** -->
              
            <div class="container card quickSearch w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
                     <h1 style="text-align:center;">Les annonces par secteur</h1>
                      <form action="reche_emploi_par_secteur.php" method="post" class="w3-form">
                <ul>
                       <!-- INFORMATIQUE -->
                    <li>
                        <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="INFORMATIQUE">
                        </div>
                     </li>
                            <!-- COMPTABLITE -->
                       <li>
                        <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="COMPTABLITE">
                        </div> 
                        </li>
                        <!-- BANQUE -->
                       <li>
                        <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="BANQUE">
                        </div> 
                        </li>
                              <!-- RH -->
                     <li>
                      <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="RH">
                        </div> 
                         </li>
                             <!-- ADMINISTRATION -->
                          <li>
                               <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="ADMINISTRATION">
                        </div>
                          </li>
                                   <!-- COMMERCIALE -->
                           <li>
                               <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="COMMERCIALE">
                        </div>
                          </li>

                                          <!-- LOGISTIQUE -->
                          <li>
                               <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="LOGISTIQUE">
                        </div>
                          </li>
                                    <!-- FINANCE -->
                          <li>
                               <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="FINANCE">
                        </div>
                          </li>
                                         <!-- MARKETING -->
                          <li>
                               <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="MARKETING">
                        </div>
                          </li>
                                 <!-- INGENIERIE -->
                          <li>
                               <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="INGENIERIE">
                        </div>
                          </li>
                           <!-- ASSURANCE -->
                          <li>
                               <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="ASSURANCE">
                        </div>
                          </li>
                          <!-- Management -->
                          <li>
                               <div class="box">
                           <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                            <input type="submit" name="secteur[]" value="MANAGEMENT">
                        </div>
                          </li>
                </ul>
                </form>
            </div>

            <!-- //////////////////LES ANNONCES PAR VILLE////////////////////////////// -->
<div class="container card w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
    <h1 style="text-align:center">Les annonces par ville</h1>
     <form action="reche_emploi_par_lieu.php" method="post" class="w3-form">
       <div id="conteneur">
         
              <button type="submit" class="dakar region" name="lieu[]" value="dakar">
                <div > <h3>DAKAR</h3> </div>
              </button>  
                <!-- <div class="touba">TOUBA </div> -->
              <button type="submit" class="thies region" name="lieu[]" value="thies">
                  <div ><h3>THIES </h3></div>
               </button>
               <button type="submit" class="diourbel region" name="lieu[]" value="diourbel">
                <div> <h3>DIOURBEL</h3> </div>
               </button>
               <button type="submit" class="saint-louis region" name="lieu[]" value="saint-louis">
                <div ><h3>SAINT-LOUIS</h3> </div>
              </button>
              <button type="submit" class="louga region" name="lieu[]" value="louga">
                <div ><h3>LOUGA</h3> </div>
              </button>
                 <!-- <div class="saly">SALY </div> -->
                  <!-- <div class="pikine">PIKINE </div> -->
               <button type="submit" class="kaolack region" name="lieu[]" value="kaolack">
                <div ><h3>KAOLACK</h3> </div>
               </button> 
               <button type="submit" class="ziguinchor region" name="lieu[]" value="ziguinchor">
                <div><h3>ZIGUENCHOR</h3> </div>
              </button>
               <button type="submit" class="matam region" name="lieu[]" value="matam">
                <div ><h3>MATAM</h3> </div>
               </button>
               <button type="submit" class="fatick region" name="lieu[]" value="fatick">
                <div><h3>FATICK</h3> </div>
              </button>
              <button type="submit" class="kedougou region" name="lieu[]" value="kedougou">
                <div ><h3>KEDOUGOU</h3> </div>
              </button>
              <button type="submit" class="kolda region" name="lieu[]" value="kolda">
                <div ><h3>KOLDA</h3> </div>
               </button>
               <button type="submit" class="tambacounda region" name="lieu[]" value="tambacounda">
                <div ><h3>TAMBACOUNDA</h3> </div>
            </button>
                <!-- <div class="sedhiou"><h3>SEDHIOU</h3> </div> -->
            </div>
        </form>
</div>

<!-- ///////////////////////////////////////////////CV/////////////////////////////////// -->
  <div class="depot_cv">
       <div class="inf_cv">
          <h1>DÉPOSEZ VOTRE CV SUR SUNULIGUEY !</h4>
          <h2>Des recruteurs consultent les CVs déposés sur SunuLiguey.</br>
            Deposez votre cv pour etre directement contacter par votre futur employeur
          </h5>
            <a href="connexion.php"><button class="btn btn-success"> je depose mon cv </button></a> 
      </div>
  </div>

  <div id="offre" class="w3-container w3-blue-grey">
      
  </div>

    
    <?php
        include("footer.php");
    ?>
   
    <script src="jquery-3.6.0.min.js"></script>
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        
// **********************************CHARGER LES OFFRES*************************************

///////////////////////////////////SECteur metier//////////////////////////
 $(document).ready(function(){  
      $('#metier').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"serach.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#metierList').fadeIn();  
                          $('#metierList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '#metier', function(){  
           $('#metier').val($(this).text());  
           $('#metierList').fadeOut();  
      });  
 });  

/////////////////////////////////////Lieu region ville//////////////////////////////////
$(document).ready(function(){  
      $('#lieu').keyup(function(){  
           var queryL = $(this).val();  
           if(queryL != '')  
           {  
                $.ajax({  
                     url:"serach.php",  
                     method:"POST",  
                     data:{queryL:queryL},  
                     success:function(data)  
                     {  
                          $('#lieuList').fadeIn();  
                          $('#lieuList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '#lieu', function(){  
           $('#lieu').val($(this).text());  
           $('#lieuList').fadeOut();  
      });  
 });  
////////////////////////////////////////////////////////////////////////////////////



$(document).ready(function (argument) {
  getOffre();
   getNbreOffre();
});

function getOffre()
{
    $.ajax({

          type:"type",
          url:"RecuperationDesOffres.php",
          // data:"data"
          dataType: "html",
          success:function (response) {
            $("#offre").html(response);
          }
    });
}
function getNbreOffre()
{
    $.ajax({

          type:"type",
          url:"NbreOffre.php",
          // data:"data"
          dataType: "html",
          success:function (response) {
            $("#total").html(response);
          }
    });
}

var secteur = document.querySelectorAll(".box");
for(var i=0;i<secteur.length;i++)
{
    secteur[i].addEventListener("mouseover",function(){
        this.style.backgroundColor="#9A616D";
    });
    secteur[i].addEventListener("mouseout",function(){
        this.style.backgroundColor="";
    });
}
    </script>
    <script type="text/javascript" src="scrollreveal.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>