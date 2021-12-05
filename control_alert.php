<?php 
session_start();
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
 if (isset($_POST['metier']) and isset($_POST['lieu']) and isset($_POST['emploi']) and isset($_POST['mail'])) {
 	$metier = $_POST['metier'];
 	$lieu = $_POST['lieu'];
 	$emploi = $_POST['emploi'];
 	$mail = $_POST['mail'];

    $req = "INSERT INTO alerte (idMembre,idCandidat,metier,lieu,emploi,mail) values(?,?,?,?,?,?)";
    $stmt= $connect->prepare($req);
             $stmt->bindParam(1, $_SESSION['id']);
             $stmt->bindParam(2, $_SESSION['id']);
             $stmt->bindParam(3, $metier);
             $stmt->bindParam(4, $lieu);                                    
             $stmt->bindParam(5, $emploi);
             $stmt->bindParam(6, $mail);
             $stmt->execute();
          if ($stmt) {
                  ?>
                    <h4 style="visibility:hidden;" id="succ">OKKKKKKKK</h4>
                  <?php 
                }
 }

// *********************************************UPDATE*******************************************

    if (isset($_POST['Update'])) {
      $id = $_POST['id'];
       if (isset($_POST['Umetier']) and isset($_POST['Ulieu']) and isset($_POST['Uemploi']) and isset($_POST['Umail'])) {
            $metier = $_POST['Umetier'];
            $lieu = $_POST['Ulieu'];
            $emploi = $_POST['Uemploi'];
            $mail = $_POST['Umail'];


   $sql = "UPDATE alerte SET metier = :metier, lieu=:lieu, emploi=:emploi, mail=:mail WHERE idAlerte = :id";
   $stmt = $connect->prepare($sql);                                  
  $stmt->bindParam(':metier',$metier);     
  $stmt->bindParam(':lieu',$lieu);    
  $stmt->bindParam(':emploi',$emploi);
  $stmt->bindParam(':mail',$mail);
  $stmt->bindParam(':id',$id);
   $stmt->execute();
       header("Location:mon_alert.php");
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
    
 
// finally{
    var suucc = document.getElementById("succ").textContent;
     if (suucc == "OKKKKKKKK") {
            swal({
              title: "Success!",
              text: "Votre alerte a ete envoye avec succes",
               type: 'success',
              // timer: 2000,
              showConfirmButton: true
            }, function(){
                  window.location.href = "http://localhost/MEMOIRE/mon_alert.php" ;
            });

       } 
// }
</script>