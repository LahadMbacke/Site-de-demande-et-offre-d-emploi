
<?php
       $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

       try {


           $req = "SELECT * FROM administrateur  WHERE login = ?";
           $res=$connect->prepare($req);
            $res->execute([$_POST['login']]);
                 $row = $res->fetch();
             if (($_POST['password']==$row['password']))
             {
                // $_SESSION['id']=$row['idRecruteur']; 
               header("Location:Accueil_Admin.php");  
             } 
             else {
                // echo "string";
                      header("Location:connexion_Admin.php");
                    }
           

       } catch (Exception $e) {
           
       }
  ?>