<?php 
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
// $id = $_GET['id'];
// echo $id;

if (isset($_POST['SuppCompetence'])) {
    $id = $_POST['id'];
    $req="DELETE FROM competences WHERE idCompetence = $id";
    $res=$connect->query($req);
    if ($res) {
         header("Location:profil.php");
    }
}
// *****************************************************************************

if (isset($_POST['modif'])) {
	$idoff = $_POST['modif'];
	$req = "SELECT * FROM competences where idCompetence = '$idoff'";
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
          section{
            margin-top: 200px;
          }
    </style>
</head>
<body>
	<?php
        include("myHead.php");
    ?>
    <section>
        <div class="w3-content" style="max-width:1332px; margin-bottom: -20px;">
        <div id="regForm"class="w3-border w3-card-2 w3-round-large">
         <h3 id="p" class="w3-text-blue w3-margin-top " >Vos compétences</h3>
            <div class="tab5">

                 <form method="post" action="competence_modif_sup.php">

                    <div class="w3-container">
                        <p class="w3-bottombar">Compétences professionnelles</p>
                          <!-- <div class="w3-container w3-border w3-row-padding"> -->
                            <!-- <div class="w3-row-padding">
                                <div class="w3-col m6">
                                    <label for="">DATE DE CREATION</label>
                                    <input  type="date" name="DateCre" >
                                </div> -->
                                <!-- <div class="w3-col m6">
                                    <label for="">DATE DE MODIFICATION</label><input  type="date" name="DateModif" > -->
                                <!-- </div> -->
                            <!-- </div> -->
                            <br>
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <input  type="text" name="libelle" value="<?php echo $row["libelle"]; ?>"  placeholder="Libellé de votre compétence">
                                </div>

                            </div>
                            <br>
                            

                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <input type="hidden" name="id" value="<?php echo $row["idCompetence"]; ?>">
                        <button type="submit" name="update_competence" class="btn btn-primary">Enregistrer</button>
                      </div>
                 </form> 


            </div>
         </div> 
      </div>  
    </section>

   <?php
    include("footer.php");
  ?>  
</body>
</html>