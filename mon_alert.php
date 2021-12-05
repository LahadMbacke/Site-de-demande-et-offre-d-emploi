<?php
session_start();
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

$req = "SELECT * FROM membre where idMembre = ? and idMembre not in (SELECT idMembre from alerte)";
            $res = $connect->prepare($req);
            $res->bindParam(1,$_SESSION['id']);
            $res->execute();
            $row = $res->fetch();
// *********************************************************************
            //   {
           $req = "SELECT * FROM membre where idMembre=?";
            $res = $connect->prepare($req);
            $res->bindParam(1,$_SESSION['id']);
            $res->execute();
            $row = $res->fetch();

// *********************************************************************

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
    <!-- <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>"> -->
    <link rel="stylesheet" href="CSS/alerte.css?t=<?php echo time();?>">
    <!-- <script src="javascript/jquery-3.6.0.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body>
    <?php
        include("myHead.php");
    ?>
    <section >
<div id="mesAletes" class="w3-row-padding w3-section w3-card-4 w3-border w3-round-large w3-light-grey">
     <div class="" id="alerte" align="center">
        <div id="entet">
        <h4> Créez votre alerte email</h4>
          <p>Recevez en 1er les offres qui vous correspondent</p>
              <!-- <button  id="btn">Je crée mon alerte</button> -->
        </div>

                 <div class="alerte">
                     <form  id="form" method="post" action="control_alert.php">
                     <div id="form">
                       <div class="row">
                         <div class="col-md-4">
                           <label for="validationCustom01" class="form-label">Mot(s) clé(s)</label>
                            <input  id="metier" type="text" class="form-control alt" name="metier" placeholder="Metiers , mot-cles, entrepise">
                            <span id="emetier"></span>
                        </div>
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">Région pour ma recherche</label>
                            <!-- <input id="lieu" type="text" class="form-control alt" name="lieu" placeholder="Ville, departement,region"> -->
                            <select id="lieu" style="font-size: 20px;padding:10px" class="w3-select w3-border w3-section" name="lieu" >
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
                            <span id="elieu"></span>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4">
                          <label for="validationCustom02" class="form-label">Type(s) de contrat</label>
                            <!-- <input id="emploi" type="text" class="form-control alt" name="emploi" placeholder="Stage, Emploi"> -->
                             <select id="emploi" style="font-size: 20px;padding:10px" class="w3-select w3-border w3-section" name="emploi" >
                                        <option value="" disabled selected value="">Type de contrat</option>
                                            <option value="CDI">CDI</option>
                                            <option value="CDD">CDD</option>
                                            <option value="Interim">Interim</option>
                                            <option value="Stage">Stage</option>
                                            <option value="Alternace/Apprentissage">Alternace/Apprentissage</option>
                                            <option value="Independant">Independant</option>
                                        </select>
                            <span id="eemploi"></span>
                        </div>
                        <div class="col-md-4">
                           <label for="validationCustom02" class="form-label">Email</label>
                            <input id="mail" type="E-mail" class="form-control alt" name="mail" value="<?php echo $row['email'] ?>">
                            <span id="eemail"></span>
                        </div>
                    </div>
                        <div class="col-md-4">
                       <label for="validationCustom02" class="form-label"></label>
                        <button  id="Cralerte" type="submit" class="form-control btn w3-blue">Creer alerte</button>
                        </div>
                    </div>
                     </form>
                 </div>
           </div>
        </div>
</section> 

  <?php
    include("footer.php");
  ?>
   <script>
   

     


        





// ***********************************LES CONTROLES******************************************
var form = document.getElementById("form");
         let myRegex = /^[a-zA-Z-\s]+$/;
         let numRegex = /^[0-9\s]+$/;
         let maail =/[^@]+@[^@]+.[a-zA-Z]{2,6}/;
     form.addEventListener("submit",function (e) {
        // ***************Metier*************
        var metier = document.getElementById("metier");
          if (metier.value.trim()=="")
           {
            var MyEmetier= document.getElementById("emetier");
            MyEmetier.innerHTML="Ce champ est requis";
            MyEmetier.style.color="red";
            e.preventDefault();
           }
           else if(myRegex.test(metier.value)==false)
           {
            var MyEmetier = document.getElementById("emetier");
            MyEmetier.innerHTML="Ce champ doit comporter uniquement des lettre";
            MyEmetier.style.color="red";
            e.preventDefault();
           }



           // ***************Lieu*************
        var lieu = document.getElementById("lieu");
          if (lieu.value.trim()=="")
           {
            var MyElieu= document.getElementById("elieu");
            MyElieu.innerHTML="Ce champ est requis";
            MyElieu.style.color="red";
            e.preventDefault();
           }
           else if(myRegex.test(lieu.value)==false)
           {
            var MyElieu = document.getElementById("elieu");
            MyElieu.innerHTML="Ce champ doit comporter uniquement des lettre";
            MyElieu.style.color="red";
            e.preventDefault();
           }



           // ***************EMPLOI*************
        var emploi = document.getElementById("emploi");
          if (emploi.value.trim()=="")
           {
            var MyEemploi= document.getElementById("eemploi");
            MyEemploi.innerHTML="Ce champ est requis";
            MyEemploi.style.color="red";
            e.preventDefault();
           }
           else if(myRegex.test(emploi.value)==false)
           {
            var MyEemploi = document.getElementById("eemploi");
            MyEemploi.innerHTML="Ce champ doit comporter uniquement des lettre";
            MyEemploi.style.color="red";
            e.preventDefault();
           }


           // ***************MAIL*************
        var mail = document.getElementById("mail");
          if (mail.value.trim()=="")
           {
            var MyEmail= document.getElementById("eemail");
            MyEmail.innerHTML="Ce champ est requis";
            MyEmail.style.color="red";
            e.preventDefault();
           }
    });

   </script>    
</body>
</html>