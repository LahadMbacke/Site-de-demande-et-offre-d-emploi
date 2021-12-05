<?php
    session_start();
    

       $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");




       try {

         	if (isset($_POST["mail"]) and isset($_POST["pwd"])) 
                 	{      		            
       		            $Email = $_POST["mail"];
       		            $password = $_POST["pwd"];   
                	}
                	else
                		echo "you forget something";
       	
       } catch (Exception $e) {
       	
       }


//////////////////////////////////////Entreprise info/////////////////////////////////////
       try {  
              if (isset($_POST['NomEntreprise'])) {
                 $NomEntreprise = $_POST['NomEntreprise'];
              }
                     if (isset($_POST['AdresseEntre'])) {
                         $AdresseEntre = $_POST['AdresseEntre'];
                   }

                        if (isset($_POST['DescriptionEntre'])) {
                         $DescriptionEntre = $_POST['DescriptionEntre'];
                   }

                   if (isset($_POST['website'])) {
                         $website = $_POST['website'];
                   }
                   if (isset($_POST['Numero'])) {
                         $Numero = $_POST['Numero'];
                   }
                   if (isset($_POST['ville'])) {
                         $ville = $_POST['ville'];
                   }
                   if (isset($_POST['region'])) {
                         $region = $_POST['region'];
                   }
                              


           
       } catch (Exception $e) {
           
       }




       try {
                      // INSERTION DANS MEMBRE
       	      $req="INSERT INTO membre (email,motDePasse,adresse,tel,ville,region) VALUES(?,?,?,?,?,?)";
                $stmt = $connect->prepare($req);           
                $stmt->bindParam(1, $Email);
                $stmt->bindParam(2, $password);
                $stmt->bindParam(3, $AdresseEntre);
                 $stmt->bindParam(4, $Numero); 
                 $stmt->bindParam(5, $ville); 
                 $stmt->bindParam(6, $region);            
               $stmt->execute();
              $ID = $connect->lastInsertId();     
                                         // INSERTION DANS recruteur
          $req="INSERT INTO recruteur (idMembre,idRecruteur,nom,siteWeb,description) VALUES(?,?,?,?,?)";
                      $stmt1 = $connect->prepare($req);
                      $stmt1->bindParam(1, $ID); 
                      $stmt1->bindParam(2, $ID);   
                      $stmt1->bindParam(3, $NomEntreprise);
                      $stmt1->bindParam(4, $website);
                      $stmt1->bindParam(5, $DescriptionEntre);
                      $stmt1->execute();
                               
              
             if ($stmt and $stmt1) {
                  // echo "success";
                $_SESSION['id'] = $ID;
                header("Location:connexion_recruteur.php"); 
             }
       } catch (Exception $e) {
       	
       }
  ?>