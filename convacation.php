<?php 
$idCandidat = $_GET['id'];
$idoffre = $_GET['idoffre'];


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
        <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>">
        <link rel="stylesheet" href="CSS/w3.css">
	<title></title>
</head>
<body>
<?php
        include("Rec_header.php");

    ?>


 <div class="w3-content" style="max-width:932px;">
        <div id="regForm"class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">

          <div class="tab1">
          	<script src="ckeditor/ckeditor.js"></script>
            <form id="form" method="post" action="control_convacation.php">
                
                    <div class="w3-container">
                        <h3 style="text-align: center;" class="w3-bottombar w3-blue-grey">Convacation</h3>
                        <div class="w3-container w3-border w3-row-padding">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <textarea id="editor" name="editor"  cols="100" rows="10" placeholder="Saisissez une description detaillée de l'entreprise">
                                    </textarea>
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="idC" value="<?php echo $idCandidat ?>">
                 <input type="hidden" name="id" value="<?php echo $idoffre ?>">
                <button style="width:50%; margin: auto;" type="submit" name="envoyer" class="w3-block w3-green w3-margin-top">Envoyer</button>



            </form>  <!-- FIN Form -->
        </div>
    </div>

</div>
<?php 
include("footer.php")
?>
<script >
	CKEDITOR.replace("editor");
</script>

</body>
</html>