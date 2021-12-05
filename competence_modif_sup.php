<?php 

$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");



if (isset($_POST['update_competence'])) {
   try {
    
    $id=$_POST['id'];
// if (isset($_POST['DateCre'])) {
//  $DateCre = $_POST['DateCre'];
// }

// if (isset($_POST['DateModif'])) {
//  $DateModif = $_POST['DateModif'];
// }

if (isset($_POST['libelle'])) {
 $libelle = $_POST['libelle'];
}
// if (isset($_POST['DetailForm'])) {
//  $DetailForm = $_POST['DetailForm'];
// }
     $req="UPDATE competences SET libelle = ? WHERE idCompetence =? ";

           $stmt= $connect->prepare($req);
           $stmt->bindParam(1, $libelle);
          //  $stmt->bindParam(2, $DateCre);
            $stmt->bindParam(2, $id );
             
                                                 
             $stmt->execute(); 
             if ($stmt) {
               header("Location:profil.php");
             }



  } catch (Exception $e) {
    
  }
}
 
?>