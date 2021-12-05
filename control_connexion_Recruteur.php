
<?php
      session_start();

       $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

       try {


           $req = "SELECT * FROM membre M INNER JOIN recruteur R ON R.idRecruteur = M.idMembre WHERE email = ?";
           $res=$connect->prepare($req);
            $res->execute([$_POST['login']]);
                 $row = $res->fetch();
             if (($_POST['password']==$row['motDePasse']))
             {
                $_SESSION['id']=$row['idRecruteur']; 
               header("Location:Recruteur.php");  
             } 
             else {
                // echo "string";
                      header("Location:connexion_recruteur.php");
                    }
           

       } catch (Exception $e) {
           
       }
  ?>