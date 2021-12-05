<?php
session_start();

 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
if ($_POST['metier']) {
	$metier = $_POST['metier'];
}

     if ($_POST['secteur']) {
	    $secteur = $_POST['secteur'];
       }

           if ($_POST['experience']) {
	           $experience = $_POST['experience'];
             }

                if ($_POST['competence']) {
	              $competence = $_POST['competence'];
                 }

						if ($_POST['diplome']) {
						$diplome = $_POST['diplome'];
						}

							if ($_POST['region']) {
								$region = $_POST['region'];
							}

								if ($_POST['contrat']) {
									$contrat = $_POST['contrat'];
								}


										if ($_POST['DescriptionPoste']) {
											$DescriptionPoste = $_POST['DescriptionPoste'];
										}

											if ($_POST['DescriptionProfil']) {
												$DescriptionProfil = $_POST['DescriptionProfil'];
											 }

					if ($_POST['Entreprise']) {
						$Entreprise = $_POST['Entreprise'];
					}
                    if ($_POST['DateExp']) {
                        $DateExp=$_POST['DateExp'];
                    }

    // *********************************FICHE DETAILLEE******************************
            if (isset($_FILES["fiche_cv"]) and $_FILES["fiche_cv"]['error']==0)
             {                                               

                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
              $extension_fichier = strtolower (substr(strrchr($_FILES["fiche_cv"]["name"], '.') ,1) );
              $extensions_ok = array('pdf');
                   if ( in_array($extension_fichier, $extensions_ok) )
                     {
                      // echo "Extension correcte";
                       echo "<br>";
                      $dhc=date("dmY_His",time());
                      $fic= "FicheOffres/".$dhc."_".$_FILES['fiche_cv']['name'];//Here I rename my file with the time

                        //My file is uploded to $fic
                   if(move_uploaded_file( $_FILES['fiche_cv']['tmp_name'],$fic))
                       {
                         $fiche_cv="FicheOffres/".$dhc."_".$_FILES['fiche_cv']['name']; 
                       }
              }
     }



// *********************************LOGO ENTRPRISE******************************
            if (isset($_FILES["logo"]) and $_FILES["logo"]['error']==0)
             {                                               

                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
              $extension_fichier = strtolower (substr(strrchr($_FILES["logo"]["name"], '.') ,1) );
              $extensions_ok = array('jpg','jpeg' , 'gif' , 'png' );
                   if ( in_array($extension_fichier, $extensions_ok) )
                     {
                      // echo "Extension correcte";
                       echo "<br>";
                      $dhc=date("dmY_His",time());
                      $fic= "LogoEntrp/".$dhc."_".$_FILES['logo']['name'];//Here I rename my file with the time

                        //My file is uploded to $fic
                   if(move_uploaded_file( $_FILES['logo']['tmp_name'],$fic))
                       {
                         $logo="LogoEntrp/".$dhc."_".$_FILES['logo']['name']; 
                       }
              }
     }



                             //INSERTION DANS OFFRE//
     $date = date("Y-m-d h:i:s");
	$reqq ="INSERT into offre (idMembre,idRecruteur,dateCreation,dateExpiration,Entreprise,region,typeContrat,logoEntrprise) VALUES(?,?,?,?,?,?,?,?)";
                      $stmt= $connect->prepare($reqq);
                           $stmt->bindParam(1, $_SESSION['id']);
                           $stmt->bindParam(2,$_SESSION['id']);
                           $stmt->bindParam(3, $date);
                           $stmt->bindParam(4, $DateExp);                                            
                          $stmt->bindParam(5,$Entreprise);
                          $stmt->bindParam(6,$region);
                          $stmt->bindParam(7,$contrat);
                          $stmt->bindParam(8,$logo);
                          $stmt->execute(); 
                          $IDoffre = $connect->lastInsertId(); 


        //INSERTION DANS EMPLOI//
$reqq ="INSERT into emploie(idOffre,idEmploie,nom,experience,niveauEtude,competence,secteur,DescriptionProfil,DescriptionPost,ficheDetaillee	
) VALUES(?,?,?,?,?,?,?,?,?,?)";
                      $stmt1= $connect->prepare($reqq);
                           $stmt1->bindParam(1, $IDoffre);
                           $stmt1->bindParam(2,$IDoffre);
                           $stmt1->bindParam(3, $metier);                                            
                           $stmt1->bindParam(4,$experience);
                           $stmt1->bindParam(5,$diplome);
                           $stmt1->bindParam(6,$competence);
                           $stmt1->bindParam(7,$secteur);
                           $stmt1->bindParam(8,$DescriptionProfil);  
                           $stmt1->bindParam(9,$DescriptionPoste);
                           $stmt1->bindParam(10,$fiche_cv);                          
                          $stmt1->execute(); 


          if ($stmt and $stmt1) {
                header("Location:Recruteur.php"); 
          }
                          
?>