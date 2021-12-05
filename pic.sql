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
                         $updatephoto = $connect->prepare('UPDATE profile SET photo = :photo WHERE idMembre = :id');
                          $updatephoto->execute(array(
                             'photo' => $_SESSION['id'].".".$extension_fichier,
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