
<?php
      session_start();
      $_SESSION['id']=null; 
                $_SESSION["prenom"]=null;
                $_SESSION["nom"]=null;
       $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=Emploi","root","");

       try {


           $req = "SELECT * FROM Membre WHERE email = ?";
           $res=$connect->prepare($req);
            $res->execute([$_POST['myIdenti']]);
                 $row = $res->fetch();
             if (($_POST['myPWD']==$row['mot_de_passe']))
             {
                $_SESSION['id']=$row['Id_membre']; 
                // $_SESSION["prenom"]=$row["prenom"];
                // $_SESSION["nom"]=$row["nom"];
               header("Location:principal.php");  
             } 
             else {
                // echo "string";
                      header("Location:connexion.php");
                    }
           
       } catch (Exception $e) {
           
       }
  ?>