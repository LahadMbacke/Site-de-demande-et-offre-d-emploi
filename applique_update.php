<?php
  session_start();

    $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


try {
    
if (isset($_POST["prenom"])) {
    $prenom = $_POST["prenom"];
}

 if (isset($_POST["nom"])) {
    $nom = $_POST["nom"];
 }

 if (isset($_POST["DateNaiss"])) {
       $DateNaiss = $_POST["DateNaiss"];  
 }

if (isset($_POST['telephone'])) {
    $telephone = $_POST['telephone'];
}
if (isset($_POST['mail'])) {
   $mail = $_POST['mail'];
}

             ///////////////////////////////// CANDIDAT////////////////////  
  $sql = "UPDATE candidat SET nom =:nom, prenom =:prenom, dateNaiss=:DateNaiss WHERE idCandidat=:id";
   $stmt = $connect->prepare($sql);                                  
  $stmt->bindParam(':nom', $_POST['nom']);     
  $stmt->bindParam(':prenom',$_POST['prenom']);    
  $stmt->bindParam(':DateNaiss',$_POST['DateNaiss']);
  $stmt->bindParam(':id',$_SESSION['id']);
   $stmt->execute();
if ($stmt) {
    header("Location:compte_user.php");
}

   //////////////////////////////MEMEBRE///////////////////////////////////////////////
   $sql = "UPDATE membre SET tel =:telephone, email =:mail WHERE IdMembre=:id";
   $stmt = $connect->prepare($sql);                                  
  $stmt->bindParam(':telephone', $_POST['telephone']);     
  $stmt->bindParam(':mail',$_POST['mail']);    
  $stmt->bindParam(':id',$_SESSION['id']);
   $stmt->execute();
   if ($stmt) {
     header("Location:compte_user.php");
}

}
 catch (Exception $e) {
    
}
?>

      
  