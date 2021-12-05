<?php 
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
// $id = $_GET['id'];
// echo $id;



if (isset($_POST['SuppLang'])) {
    $id = $_POST['id'];
    $req="DELETE FROM langue WHERE idLang = $id";
    $res=$connect->query($req);
    if ($res) {
         header("Location:profil.php");
    }
}
// *****************************************************************************

if (isset($_POST['modif'])) {
	$idoff = $_POST['modif'];
	$req = "SELECT * FROM langue where idLang = '$idoff'";
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
                     <h3 class="w3-text-blue w3-margin-top" >Langues</h3>
                <form method="post" action="Langue_Modif_Sup.php" >
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
                <input type="texte" name="id" value="<?php echo $row["idLang"]; ?>">
                <button type="submit" name="EnvoyerLangue"  class="btn btn-primary">Enregistrer</button>
              </div>
                </form>
            </div>




       </div>
    </div>
     

</body>
</html>