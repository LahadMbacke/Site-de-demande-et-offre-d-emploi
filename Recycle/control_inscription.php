<?php

       $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=Emploi","root","");




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
       	      $req="INSERT INTO Membre (adresse,ville,region,tel,email,mot_de_passe) VALUES(?,?,?,?,?,?)";
                $stmt = $connect->prepare($req);
            
             $stmt->bindParam(1, $adresse);
             $stmt->bindParam(2, $ville);
             $stmt->bindParam(3, $region);
             $stmt->bindParam(4, $telephone);                                    
             $stmt->bindParam(5, $Email);
             $stmt->bindParam(6, $password);
             $stmt->execute(); 
             if ($stmt) {
             	$_SESSION['prenom']=$mypname;
             	$_SESSION['nom']=$myname;
             	$_SESSION['date_de_naiss']=$annee_nais;
             	$_SESSION['sexe']=$sex;
                // header("Location:connexion.php");  

             }

       } catch (Exception $e) {
       	
       }
  ?>