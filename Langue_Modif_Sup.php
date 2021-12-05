<?php 


$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

// ************************************************LANGUE*************************************************************
if (isset($_POST['EnvoyerLangue'])) {
	$id = $_POST['id'];
 try {
    if (isset($_POST["langue"])) {
     $langue = $_POST["langue"];
   }

   if (isset($_POST['NiveauLangue'])) {
     $NiveauLangue = $_POST['NiveauLangue'];
   }
      $req="UPDATE langue SET typeLang = ?, niveau= ?  WHERE idLang =? ";
           // $req = "INSERT INTO langue (idMembre,idCandidat,idProfil,typeLang,niveau) VALUES(?,?,?,?,?)";
           $stmt= $connect->prepare($req);
            $stmt->bindParam(1, $langue);  
             $stmt->bindParam(2, $NiveauLangue);
             $stmt->bindParam(3, $id);
                                               
             $stmt->execute(); 
             if ($stmt) {
               header("Location:profil.php");
             }
             else
             {
             	echo "Erreur langue";
             }

} catch (Exception $e) {
  
}
}


?>