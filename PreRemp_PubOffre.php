<?php
session_start();

 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

if (isset($_POST['ModifPost'])) {
    $idoff = $_POST['id'];
    $req = "SELECT * FROM offre O INNER JOIN emploie E ON O.idOffre = E.idOffre where O.idOffre = '$idoff'";
    $rep=$connect->prepare($req); //this instruction preparered the requete
    $rep->execute();//execute la requete 
    $row = $rep->fetch();
  }

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
        <div id="regForm"class="w3-border w3-card-2 w3-round-large">

            <h1 id="titre" class=" w3-center" >Poser un offre</h1>
            <br><br>
            <div class="tab1">
                <form method="post" action="control_Modif_Publica.php" enctype="multipart/form-data">
                
<!-- ********************************************** offre emploi****************************************************** -->
                    <div class="w3-container">
                        <p class="w3-bottombar w3-blue">Critere de l'offre</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding w3-margin-top">
                                <div class="w3-col m6">
                                    <input value="<?php echo $row["nom"]; ?>" class="inpute" type="texte" name="metier" placeholder="Nom (metier)" >
                                </div>
                                <div class="w3-col m6">
                                    <input value="<?php echo $row["secteur"]; ?>" class="inpute" type="texte" name="secteur" placeholder="Nom de secteur" >
                                </div>                                
                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-row-padding">
                                    <div class="w3-col m6">
                                        <select class="w3-select w3-border w3-section" name="diplome">
                                            <option value="" disabled selected>Diplome</option>
                                            <option value="avant bac">avant bac</option>
                                            <option value="bac">bac </option>
                                            <option value="bac+1">bac+1</option>
                                            <option value="bac+2">bac+2</option>
                                            <option value="bac+3">bac+3</option>
                                            <option value="bac+4">bac+4</option>
                                            <option value="bac+2">bac+5</option>
                                            <option value="bac+5 et plus">bac+5 et plus</option>
                                        </select>
                                    </div>
                                    <div class="w3-col m6">
                                        <select style="font-size: 20px;padding:10px" class="w3-select w3-border w3-section" name="region" >
                                            <option value="" disabled selected value="">Région</option>
                                            <option value="Dakar">Dakar</option>
                                            <option value="Thies">Thies</option>
                                            <option value="Louga">Louga</option>
                                            <option value="Diourbel">Diourbel</option>
                                            <option value="Fatick">Fatick</option>
                                            <option value="Matam">Matam</option>
                                            <option value="Kaolack">Kaolack</option>
                                            <option value="Saint Louis">Saint Louis</option>
                                            <option value="Kédougou">Kédougou</option>
                                            <option value="Sédiou">Sédiou</option>
                                            <option value="Tambacounda">Tambacounda</option>
                                            <option value="Ziguinchor">Ziguinchor</option>
                                            <option value="Kaffrine">Kaffrine</option>
                                            <option value="Kolda">Kolda</option>
                                    
                                        </select>
                                    </div>
                                        <!-- <div class="w3-col m12">
                                    <input class="inpute" type="text" name="contrat"  placeholder="Type de contrat">
                                </div> -->
                                 <div class="w3-col m12">
                                        <select style="font-size: 20px;padding:10px" class="w3-select w3-border w3-section" name="contrat" >
                                        <option value="<?php echo $row["typeContrat"]; ?>" disabled selected >Type de contrat</option>
                                            <option value="CDI">CDI</option>
                                            <option value="CDD">CDD</option>
                                            <option value="Interim">Interim</option>
                                            <option value="Stage">Stage</option>
                                            <option value="Alternace/Apprentissage">Alternace/Apprentissage</option>
                                            <option value="Independant">Independant</option>
                                                                               
                                        </select>
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
                                        <div class="w3-row-padding">
                                            <div class="w3-col m12">
                                                <textarea id="exper" style="width: 100%;" name="experience" cols="100" rows="10" placeholder="Experience"><?php echo $row["experience"]; ?></textarea>
                                            </div>
                                            <span id="eerror"></span>
                                        </div><br>
                                    </div>
                                 <!-- </div> -->
                               
                                <!-- <div class="w3-col m6">
                                    <input id="exper" class="inpute" type="text" name="experience" placeholder="Experience">
                                    <span id="eerror"></span>
                                </div> -->
                                <div class="w3-container w3-border w3-row-padding">
                                    <!-- <div class="w3-row-padding"> -->
                                        <div class="w3-col m12">
                                            <textarea id="compt" style="width: 100%;" name="competence" cols="100" rows="10" placeholder="Compétence"><?php echo $row["competence"]; ?></textarea>
                                        </div>
                                        <span id="cerror"></span>
                                    <!-- </div> -->
                                    <br>
                                </div>
                                <!-- <div class="w3-col m6">
                                    <input id="compt" class="inpute" type="text" name="competence"  placeholder="Compétence">
                                    <span id="cerror"></span>
                                </div> -->
                                
                            </div>
                            <br>
                    <!-- ********************************************** Description du poste****************************************************** -->
                    <div class="w3-container">
                        <p class="w3-bottombar w3-blue">Description du poste</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea  style="width: 100%;" name="DescriptionPoste" cols="100" rows="10" placeholder="Saisissez une description detaillée du poste"> <?php echo $row["DescriptionPost"]; ?></textarea>
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <br>
                   <!-- ********************************************** Description du profil****************************************************** -->
                    <div class="w3-container">
                        <p class="w3-bottombar w3-blue">Description du profil</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea style="width: 100%;" name="DescriptionProfil"  cols="100" rows="10" placeholder="Saisissez une description detaillée du profil"><?php echo $row["DescriptionProfil"]; ?></textarea>
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <br>
                    <!-- ********************************************** Entreprise****************************************************** -->
                    <div class="w3-container">
                        <p class="w3-bottombar w3-blue">A propos de l'Entreprise</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea  style="width: 100%;" name="Entreprise"  cols="100" rows="10" placeholder="Saisissez une description detaillée de votre expérience professionnelle (recoommandé :au moins 150 caracteres)"> <?php echo $row["Entreprise"]; ?></textarea>
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <br>

<!-- ********************************** Logo entreprise *********************************** -->
                     <div class="w3-container">
                        <p class="w3-bottombar w3-blue">Logo de l'entreprise</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="col-md-4 ">
                               <input  type="file" class="btn" name="logo">
                            </div>
                        </div>
                    </div>


 <!-- **********************************Fiche Ofrre d'emploi*********************************** -->
                     <div class="w3-container">
                        <p class="w3-bottombar w3-blue">Fiche d'offre d'emploi</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="col-md-4 ">
                               <input  type="file" class="btn" name="fiche_cv">
                            </div>
                        </div>
                    </div>
                  <input type="hidden" name="id" value="<?php echo $row["idOffre"]; ?>">
                <button type="submit" name="Update_PubOffre" class="w3-block w3-green w3-margin-top">Envoyer</button>



            </form>  <!-- FIN Form -->
        </div>
    </div>

    </div>

    <!-- Page footer -->
    <?php
        include("footer.php");
    ?>
</body>
</html>