<?php 

$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

// ************************************************MODIFER DIPLOMES***********************************************************
  
      if (isset($_POST["update_diplome"])) {
      	$id=$_POST['id'];

        try {          
                              
      if (isset($_POST["DateObten"])) {
        $DateObten = $_POST["DateObten"];
            }
   
       if (isset($_POST["TitreFormation"]) and isset($_POST["NomEcole"])) {
              $TitreFormation = $_POST["TitreFormation"];
              $NomEcole = $_POST["NomEcole"];
          }

                if (isset($_POST["NiveauEtude"])) {
                  $NiveauEtude = $_POST["NiveauEtude"];
                  // echo $_POST["NiveauEtude"];
                  }

     $req="UPDATE diplome SET intitule = ?, niveau= ?, ecole= ?, datObtenu= ? WHERE idDiplome =? ";

        $stmt= $connect->prepare($req); 
             $stmt->bindParam(1, $TitreFormation);
             $stmt->bindParam(2, $NiveauEtude);
             $stmt->bindParam(3, $NomEcole);
             $stmt->bindParam(4, $DateObten); 
             $stmt->bindParam(5, $id);                                   
             $stmt->execute(); 

       if ($stmt) {
                header("Location:profil.php");
             }
             else
              echo "echec";
      } catch (Exception $e) {
        
      }
  }


?>