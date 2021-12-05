<?php 
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
// $id = $_GET['id'];
// echo $id;


// *****************************************************************************

if (isset($_POST['modif'])) {
	$idoff = $_POST['modif'];
	$req = "SELECT * FROM experience where idExperience = '$idoff'";
    $rep=$connect->prepare($req); //this instruction preparered the requete
    $rep->execute();//execute la requete 
    $row = $rep->fetch();

}


if (isset($_POST['SupprimerExp'])) {
    $id = $_POST['id'];
    $req="DELETE FROM experience WHERE idExperience = $id";
    $res=$connect->query($req);
    if ($res) {
         header("Location:profil.php");
    }
}
	

?>

<!DOCTYPE html>
<html>
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
	<?php
        include("myHead.php");
    ?>
    <div class="w3-content" style="max-width:1532px;">
        <div id="regForm"class="w3-border w3-card-2 w3-round-large">

                 <h3 id="h2" class="w3-text-blue w3-margin-top " >Niveau d´expérience global</h3>
            <div class="tab2">
                <form method="post" action="Experience_modif_sup.php">
                
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
                           <!--  <div class="w3-row-padding">
                                <div class="w3-col m6">
                                    <label for="">DATE DE DÉBUT</label><input  type="date" name="DateDeb" >
                                </div>
                                <div class="w3-col m6">
                                    <label for="">DATE DE FIN</label><input  type="date" name="DateFin" >
                                </div>
                            </div>
                            <br> -->
                            <div class="w3-row-padding">
                                <div class="w3-col m4">
                                    <input  type="text" name="intitule" value="<?php echo $row["intitule"]; ?>" placeholder="Intitulé du poste">
                                </div>
                                <div class="w3-col m4">
                                    <input  type="text" name="NomEntreprise" value="<?php echo $row["entreprise"]; ?>"  placeholder="Nom de l'entreprise">
                                </div>
                                <div class="w3-col m4">
                                    <input type="text" name="secteur" value="<?php echo $row["secteur"]; ?>" placeholder="Secteur">
                                </div>

                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea  style="width: 100%;" name="DetailExperience"  cols="50" rows="5" placeholder="Saisissez une description detaillée de votre expérience professionnelle (recoommandé :au moins 150 caracteres)"></textarea>
                                </div>
                            </div><br>
                            

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <input type="hidden" name="id" value="<?php echo $row["idExperience"]; ?>" >
                        <button type="submit" name="update_xperience" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>    
            </div>
           
       </div>
    </div>
     

</body>
</html>