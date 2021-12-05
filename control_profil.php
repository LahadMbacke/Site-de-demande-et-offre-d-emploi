<?php
  session_start();
  $id =  $_SESSION['id'];
  // echo $_SESSION['id'];


 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

  //**************************************************RECUPERATION CV ET PHOTO***************************************
  if (isset($_POST['EnvoyerPhoto'])) {
    if (isset($_FILES["photo"]) and $_FILES["photo"]['error']==0)
             {                                               

                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
              $extension_fichier = strtolower (substr(strrchr($_FILES["photo"]["name"], '.') ,1) );
              $extensions_ok = array('jpg','jpeg' , 'gif' , 'png' );
                   if ( in_array($extension_fichier, $extensions_ok) )
                     {
                      // echo "Extension correcte";
                       echo "<br>";
                      $dhc=date("dmY_His",time());
                      $fic= "PhotosUser/".$dhc."_".$_FILES['photo']['name'];//Here I rename my file with the time

                        //My file is uploded to $fic
                   if(move_uploaded_file( $_FILES['photo']['tmp_name'],$fic))
                       {
                         $url="PhotosUser/".$dhc."_".$_FILES['photo']['name']; 
                         $updatephoto = $connect->prepare('UPDATE profil SET photo = :photo WHERE idMembre = :id');
                          $updatephoto->execute(array(
                             'photo' =>  $url,
                             'id' => $_SESSION['id']
                             ));
                          header('Location: profil.php?id='.$_SESSION['id']);                        
                               }

                       }
                       else
                         echo "Erreur d'extension";                                                                                                
                        }
                            else
                              echo "Erreur d'extension";
  }

  // ?????????????????????????????????????CV????????????????????????????????
  if (isset($_POST["DescJobb"])) {
        $DescJobb = $_POST["DescJobb"];
            }
    if (isset($_POST['EnvoyerCV'])) {
    if (isset($_FILES["cv"]) and $_FILES["cv"]['error']==0)
             {                                               

                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
              $extension_fichier = strtolower (substr(strrchr($_FILES["cv"]["name"], '.') ,1) );
              $extensions_ok = array('pdf');
                   if ( in_array($extension_fichier, $extensions_ok) )
                     {
                      // echo "Extension correcte";
                       echo "<br>";
                      $dhc=date("dmY_His",time());
                      $fic= "CVpostule/".$dhc."_".$_FILES['cv']['name'];//Here I rename my file with the time

                        //My file is uploded to $fic
                   if(move_uploaded_file( $_FILES['cv']['tmp_name'],$fic))
                       {
                         $url="CVpostule/".$dhc."_".$_FILES['cv']['name']; 
                         $updatephoto = $connect->prepare('UPDATE profil SET cv = :cv,DescriptionCV=:dsc WHERE idMembre = :id');
                          $updatephoto->execute(array(
                             'cv' => $url,
                             'dsc' => $DescJobb,
                             'id' => $_SESSION['id']
                             ));
                          header('Location: profil.php?id='.$_SESSION['id']);                        
                               }

                       }
                       else
                         echo "Erreur d'extension";                                                                                                
                        }
                            else
                              echo "Erreur d'extension";
  }

// ************************************************DIPLOMES***********************************************************
  
      if (isset($_POST["EnvoyerDiplomes"])) {
        try {
        
                        
                              
      if (isset($_POST["DateObten"])) {
        $DateObten = $_POST["DateObten"];
        // echo $DateObten;
            }
   
       if (isset($_POST["TitreFormation"]) and isset($_POST["NomEcole"])) {
              $TitreFormation = $_POST["TitreFormation"];
              $NomEcole = $_POST["NomEcole"];
          }

                if (isset($_POST["NiveauEtude"])) {
                  $NiveauEtude = $_POST["NiveauEtude"];
                  // echo $_POST["NiveauEtude"];
                  }

                    if (isset($_POST['DetailDiplom'])) {
                      $DetailDiplom = $_POST['DetailDiplom'];
                    }

           // insertion de diplom dans la base 
      $req = "INSERT INTO diplome(idMembre,idCandidat,intitule,niveau,ecole,datObtenu) VALUES(?,?,?,?,?,?)";
        $stmt= $connect->prepare($req);
             $stmt->bindParam(1, $_SESSION['id']);
             $stmt->bindParam(2, $_SESSION['id']); 
             $stmt->bindParam(3, $TitreFormation);
             $stmt->bindParam(4, $NiveauEtude);
             $stmt->bindParam(5, $NomEcole);
             $stmt->bindParam(6, $DateObten);                                   
             $stmt->execute(); 

       if ($stmt) {
                header("Location:profil.php");
             }
             else
              echo "echec";
      } catch (Exception $e) {
        
      }
  }



//**********************************************************EXPERIENCE************************************************


if (isset($_POST["EnvoyerExperience"])) 
{
     try {

          if (isset($_POST["AnneeExper"])) {
           $AnneeExper = $_POST["AnneeExper"];
           // echo $AnneeExper;
          }


              if (isset($_POST["DateDeb"]) and isset($_POST["DateFin"])) {
                $DateDeb = $_POST["DateDeb"];
                $DateFin = $_POST["DateFin"];
                 // echo $DateFin;
              }


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
$req = "INSERT INTO experience(idMembre,idCandidat,intitule,entreprise,secteur,detailExper,anneeExperience) VALUES(?,?,?,?,?,?,?)";
         $stmt = $connect->prepare($req);
              $stmt->bindParam(1, $_SESSION['id']); 
              $stmt->bindParam(2, $_SESSION['id']); 
             $stmt->bindParam(3, $intitule);
             $stmt->bindParam(4, $NomEntreprise);
             $stmt->bindParam(5, $secteur);
             $stmt->bindParam(6, $DetailExperience);
             $stmt->bindParam(7, $AnneeExper);                                   
             $stmt->execute(); 
             if ($stmt) {

              header("Location:profil.php");
             }
             else
              echo "echec";


     
   } 
   catch (Exception $e) {
      echo "Erreur de saisi sur experience";
   }
}
 //********************************************************COORDONNEES************************************************    
  // if ($_POST['prenom']) {
  //  $prenom =$_POST['prenom'];
  // }

  //     if ($_POST['nom']) {
  //      $nom =$_POST['nom'];
  //      }

  //      if ($_POST['adresse']) {
  //           $adresse =$_POST['adresse'];
  //        }

  //          if ($_POST['DateNais']) {
  //           $DateNais =$_POST['DateNais'];
  //           }
  //               if ($_POST['ville']) {
  //                 $ville=$_POST['ville'];
  //                }

  //                   if ($_POST['telephone']) {
  //                     $telephone =$_POST['telephone'];
  //                    }
// ********************************************FORMATION//COMPETENCES***********************************************************

if (isset($_POST['EnvoyerCompetence'])) {
   try {
    
if (isset($_POST['DateCre'])) {
 $DateCre = $_POST['DateCre'];
}

// if (isset($_POST['DateModif'])) {
//  $DateModif = $_POST['DateModif'];
// }

if (isset($_POST['libelle'])) {
 $libelle = $_POST['libelle'];
}
// if (isset($_POST['DetailForm'])) {
//  $DetailForm = $_POST['DetailForm'];
// }

$req = "INSERT INTO competences(idMembre,idCandidat,libelle) VALUES(?,?,?)";
           $stmt= $connect->prepare($req);
           $stmt->bindParam(1, $_SESSION['id']);
           $stmt->bindParam(2, $_SESSION['id']);
            $stmt->bindParam(3, $libelle );
                                                 
             $stmt->execute(); 
             if ($stmt) {
               header("Location:profil.php");
             }



  } catch (Exception $e) {
    
  }
}
 










// ************************************************LANGUE*************************************************************
if (isset($_POST['EnvoyerLangue'])) {
 try {
    if (isset($_POST["langue"])) {
     $langue = $_POST["langue"];
   }

   if (isset($_POST['NiveauLangue'])) {
     $NiveauLangue = $_POST['NiveauLangue'];
   }
      
           $req = "INSERT INTO langue (idMembre,idCandidat,idProfil,typeLang,niveau) VALUES(?,?,?,?,?)";
           $stmt= $connect->prepare($req);
            $stmt->bindParam(1, $_SESSION['id']);
             $stmt->bindParam(2, $_SESSION['id']);
            $stmt->bindParam(3, $idProfil);
            $stmt->bindParam(4, $langue);  
             $stmt->bindParam(5, $NiveauLangue);
                                               
             $stmt->execute(); 
             if ($stmt) {
               header("Location:profil.php");
             }

} catch (Exception $e) {
  
}
}

  ?>