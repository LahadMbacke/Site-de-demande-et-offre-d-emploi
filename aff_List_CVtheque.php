<?php 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

 if(isset($_POST["profilCV"]))  
 {  
    $val= $_POST["profilCV"];
      $query = "SELECT idMembre, cv,DescriptionCV FROM profil WHERE DescriptionCV LIKE '%$val%'";  
      $rep=$connect->query($query); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="CSS/Banque_cv.css?t=<?php echo time();?>"> 
    <link rel="stylesheet" href="CSS/w3.css">
    <title></title>
</head>
<body>
   <?php
        include("Rec_header.php");
    ?> 
<section>
 <div id="cvT" class="w3-row-padding w3-section w3-card-4 w3-border w3-round-large w3-light-grey" style="margin-left: 10px; margin-top:40px;">

        
          <table class=" table table-success table-striped">
                        <thead class="table-dark">
                        <tr>
                          <th scope="col">Profil</th>
                          <th scope="col">Cv</th>
                          <th scope="col">profil de CV </th>
                        </tr>
                     </thead>
              <?php
      if($rep->rowCount() > 0)  
      {  
           while($row = $rep->fetch())  
           {  
            ?>
                <tbody>
                     <tr>
                        <?php 
                        if ($row['cv']!=NULL) {
                           ?>
                           <td>
                            <a href="voir_profil_candidat.php?id=<?=$row['idMembre']?>"><button class="btn btn-secondary">Profil</button></a>
                           </td>
                           

                           <td><a a href="affiche_CVtheque.php?id=<?=$row['cv']?>"><button style="width:30%" class="btn btn-success"><i class="bi bi-file-pdf"> CV</i></button></a> </td>

                            <td><?php echo $row["DescriptionCV"]; ?></td> 
                            <?php 
                           }
                       ?>
                 </tr>
             </tbody>
        <?php   
           } 
          
      } 
      else  
      {  
        ?>
        </table>
          <li >Aucun correspondant à votre recherche</li>
          <?php 
      }  
 }  
 
?>


    </div>  
</section>

</body>
</html>
