<?php
    session_start();
    

       $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");




       try {

         	if (isset($_POST["mypname"]) and isset($_POST["myname"]) and isset($_POST["mysex"]) and isset($_POST["mydate"]) and isset($_POST["myphone"]) and isset($_POST["myaddress"]) and isset($_POST["myregion"]) and isset($_POST["myville"]) and isset($_POST["mymail"]) and isset($_POST["mypwd"]) and isset($_POST["myconfpwd"])
               ) 
                 	{
       		            $mypname = $_POST["mypname"];
       		            $myname = $_POST["myname"];
       		            $sex = $_POST['mysex'];
       		            $annee_nais = $_POST['mydate'];
       		            $telephone = $_POST["myphone"];
       		            $adresse = $_POST["myaddress"];
       		            $region = $_POST["myregion"];
       		            $ville = $_POST["myville"];
       		            $Email = $_POST["mymail"];
       		            $password = $_POST["mypwd"];
 	                    
                	}
                	else
                		echo "you forget something";
       	
       } catch (Exception $e) {
       	
       }

       try {
                      // INSERTION DANS MEMBRE
       	      $req="INSERT INTO membre (adresse,ville,region,tel,email,motDePasse) VALUES(?,?,?,?,?,?)";
                $stmt = $connect->prepare($req);           
             $stmt->bindParam(1, $adresse);
             $stmt->bindParam(2, $ville);
             $stmt->bindParam(3, $region);
             $stmt->bindParam(4, $telephone);                                    
             $stmt->bindParam(5, $Email);
             $stmt->bindParam(6, $password);
             $stmt->execute();
              $ID = $connect->lastInsertId(); 


                                         // INSERTION DANS CANDIDAT
                      $req="INSERT INTO candidat (idMembre,idCandidat,nom,prenom,dateNaiss,sexe) VALUES(?,?,?,?,?,?)";
                      $stmt1 = $connect->prepare($req);
                      $stmt1->bindParam(1, $ID); 
                      $stmt1->bindParam(2, $ID);   
                       $stmt1->bindParam(3, $myname);
                       $stmt1->bindParam(4, $mypname);
                       $stmt1->bindParam(5, $annee_nais);
                       $stmt1->bindParam(6, $sex);   
                        $stmt1->execute();
              // **************************************************
            $reqq ="INSERT into profil (idProfil,idMembre,idCandidat) VALUES(?,?,?)";
          $stmtt= $connect->prepare($reqq);
               $stmtt->bindParam(1, $ID);
               $stmtt->bindParam(2,$ID);
               $stmtt->bindParam(3,$ID);
              $stmtt->execute(); 
              // $idProfil = $connect->lastInsertId(); 
                 // *****************************************************************************************
             if ($stmt and $stmt1 ) {
                  echo "success";
                $_SESSION['id'] = $ID;
             	$_SESSION['prenom'] = $mypname;
             	$_SESSION['nom'] = $myname;
             	$_SESSION['date_de_naiss'] = $annee_nais;
             	$_SESSION['sexe'] = $sex;
                $_SESSION['adresse'] = $adresse;
                $_SESSION['region'] = $region;
                $_SESSION['ville'] = $ville;
                header("Location:connexion.php"); 
             }
       } catch (Exception $e) {
       	
       }
  ?>