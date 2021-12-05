
<?php
      session_start();

       $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

       try {


           $req = "SELECT * FROM membre M INNER JOIN candidat C ON C.idCandidat = M.idMembre WHERE email = ?";
           $res=$connect->prepare($req);
            $res->execute([$_POST['myIdenti']]);
                 $row = $res->fetch();
             if (($_POST['myPWD']==$row['motDePasse']))
             {
                $_SESSION['id']=$row['idMembre']; 
                $_SESSION["prenom"]=$row["prenom"];
                $_SESSION["nom"]=$row["nom"];
                 $_SESSION["tel"]=$row["tel"];
                  $_SESSION["email"]=$row["email"];
                   $_SESSION["adresse"]=$row["adresse"];
                    $_SESSION["ville"]=$row["ville"];
                     $_SESSION["region"]=$row["region"];
               header("Location:profil.php");  
             } 
             else {
                // echo "string";
                      header("Location:connexion.php");
                    }
           

       } catch (Exception $e) {
           
       }
  ?>