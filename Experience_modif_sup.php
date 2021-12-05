<?php 


 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

//**********************************************************EXPERIENCE************************************************


if (isset($_POST["update_xperience"])) {

    $id = $_POST['id'];
     try {

          if (isset($_POST["AnneeExper"])) {
           $AnneeExper = $_POST["AnneeExper"];
          }


              // if (isset($_POST["DateDeb"]) and isset($_POST["DateFin"])) {
              //   $DateDeb = $_POST["DateDeb"];
              //   $DateFin = $_POST["DateFin"];
              // }


                   if (isset($_POST["intitule"])) {
                     $intitule = $_POST["intitule"];
                   }

                      if (isset($_POST["secteur"])) {
                        $secteur = $_POST["secteur"];
                      }

                         if (isset($_POST["NomEntreprise"])) {
                           $NomEntreprise = $_POST["NomEntreprise"];
                         }

                           if (isset($_POST["DetailExperience"])) {
                             $DetailExperience = $_POST["DetailExperience"];
                           }



    // insertion de Experience dans la base 
  $req="UPDATE experience SET intitule = ?, entreprise= ?, secteur= ?, detailExper= ?, anneeExperience= ? WHERE idExperience =? ";
// $req = "INSERT INTO experience(idMembre,idCandidat,intitule,entreprise,secteur,detailExper,anneeExperience ) VALUES(?,?,?,?,?,?,?)";
         $stmt = $connect->prepare($req);
             $stmt->bindParam(1, $intitule);
             $stmt->bindParam(2, $NomEntreprise);
             $stmt->bindParam(3, $secteur);
             $stmt->bindParam(4, $DetailExperience);
             $stmt->bindParam(5, $AnneeExper);
            //  $stmt->bindParam(6, $DateDeb);
            //  $stmt->bindParam(7, $DateFin); 
             $stmt->bindParam(6, $id); 

             $stmt->execute(); 
             if ($stmt) {
              header("Location:profil.php");
             }
             else
              echo "echec";


     
   } catch (Exception $e) {
      echo "Erreur de saisi sur experience";
   }
}



?>