<?php 
session_start();
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 

if (isset($_POST['supprimerFav'])) {
	$id = $_POST['id'];
	$idM=$_SESSION['id'];
	$req="DELETE FROM favorie WHERE idOffre = $id and idMembre =$idM";
	$res=$connect->query($req);
	if ($res) {
		?>
		  <h1 style="visibility: hidden;" id="supp">Supprimer</h1>
		 <?php
	}
}

?>
<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"/></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
     <script src="jquery-3.6.0.min.js"></script>

     <script type="text/javascript">
     	      
		     var alrt = document.getElementById("supp").textContent;

		     if (alrt =="Supprimer")
		     {
		        swal({
		              title: "Success!",
		              text: "Supprime avec succes",
		               type: 'success',
		              showConfirmButton: true
		            }, function(){
		               window.location.href = "http://localhost/MEMOIRE/MesFavories.php" ;
		            });
		     }
     </script>
</body>
</html>