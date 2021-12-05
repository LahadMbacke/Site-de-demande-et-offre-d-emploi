<?php 
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


if (isset($_POST['supprimerDipl'])) {
	$id = $_POST['id'];
	$req="DELETE FROM diplome WHERE idDiplome = $id";
	$res=$connect->query($req);
	if ($res) {
		 header("Location:profil.php");
	}
}

// *****************************************************************************

if (isset($_POST['modif'])) {
	$idoff = $_POST['modif'];
	$req = "SELECT * FROM diplome where idDiplome = '$idoff'";
    $rep=$connect->prepare($req); //this instruction preparered the requete
    $rep->execute();//execute la requete 
    $row = $rep->fetch();

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

         <div class="modal-body">
            <h3 class="w3-texte-white w3-margin-top">NIVEAU D´ÉTUDES</h3>
        <form method="post" action="diplome_Modif_Sup.php">
                    <select class="w3-select w3-border w3-section" name="NiveauEtude">
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
                    
                    <div class="w3-container">
                        <p class="w3-bottombar">FORMATION</p>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                            <label for="">DATE D'OBTENSION</label>
                            <input value="<?php echo $row["datObtenu"]; ?>" class="inpute" type="date" name="DateObten" >
                                </div>
                                
                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m6">
                                    <input class="inpute" value="<?php echo $row["intitule"]; ?>" type="text" name="TitreFormation" placeholder="Titre complet de votre formation">
                                </div>
                                <div class="w3-col m6">
                                    <input class="inpute" type="text" value="<?php echo $row["ecole"]; ?>" name="NomEcole"  placeholder="Nom de l'ecole ou l'etablissement">
                                </div>

                            </div>
                            <br>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <input type="hidden" name="id" value="<?php echo $row["idDiplome"]; ?>">
        <button type="submit" class="btn btn-primary" name="update_diplome">Enregistrer la modification</button>
      </div>
    </form>
      </div>
       </div>
    </div>
     
</body>
</html>