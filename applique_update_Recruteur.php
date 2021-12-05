<?php
  session_start();

    $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


try {
    
if (isset($_POST["telephone"])) {
    $telephone = $_POST["telephone"];
}

 if (isset($_POST["adresse"])) {
    $adresse = $_POST["adresse"];
 }

 if (isset($_POST["siteweb"])) {
       $siteweb = $_POST["siteweb"];  
 }

if (isset($_POST['ville'])) {
    $ville = $_POST['ville'];
}
if (isset($_POST['region'])) {
    $region = $_POST['region'];
}
if (isset($_POST['description'])) {
   $description = $_POST['description'];
}

             ///////////////////////////////// CANDIDAT////////////////////  
  $sql = "UPDATE recruteur SET SiteWeb =:siteweb, Description =:description WHERE idRecruteur=:id";
   $stmt1 = $connect->prepare($sql);                                  
  $stmt1->bindParam(':siteweb', $_POST['siteweb']);     
  $stmt1->bindParam(':description',$_POST['description']);    
  $stmt1->bindParam(':id',$_SESSION['id']);
   $stmt1->execute();
// if ($stmt1) {
//     echo"okkk";
// }

   //////////////////////////////MEMEBRE///////////////////////////////////////////////
   $sql = "UPDATE membre SET tel =:telephone, adresse =:adresse, ville=:ville, region=:region WHERE idMembre=:id";
   $stmt = $connect->prepare($sql);                                  
  $stmt->bindParam(':telephone', $_POST['telephone']);  
  $stmt->bindParam(':adresse', $_POST['adresse']);     
  $stmt->bindParam(':ville',$_POST['ville']); 
  $stmt->bindParam(':region',$_POST['region']);    
  $stmt->bindParam(':id',$_SESSION['id']);
   $stmt->execute();
   if ($stmt and $stmt1) {
     header("Location:compte_Recruteur.php");
}

}
 catch (Exception $e) {
    
}
?>

      
  