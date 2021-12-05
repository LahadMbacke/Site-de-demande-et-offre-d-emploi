<?php 
session_start();
// $_SESSION['favorie'];
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
$id = $_GET['id'];

$statement = "SELECT cv,idCandidature FROM candidature  WHERE cv = :id ";
            $sth = $connect->prepare($statement);
            $sth->execute(array(":id" => $id));
            $row = $sth->fetch();
            $fichier = $row["cv"];
 
// ************************************upadte vu et non vu**************************
$idcc = $row["idCandidature"];
$req="UPDATE candidature SET statut = 1 WHERE idCandidature=$idcc";
$res=$connect->query($req);



 // Le chemin du fichier (path) 
  $file = "$fichier"; 
    
  // Type de contenu d'en-tête
  header("Content-type: application/pdf"); 
    
  header("Content-Length: " . filesize($file)); 
    
  // Envoyez le fichier au navigateur.
  readfile($file); 

?>