<?php 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

 if(isset($_POST["query"]))  
 {  
     // echo'';  
      $query = "SELECT idMembre, cv,DescriptionCV FROM profil WHERE DescriptionCV LIKE '%".$_POST["query"]."%'";  
      $rep=$connect->query($query); 
?>
<ul class="list-unstyled Sul">
   <?php
      if($rep->rowCount() > 0)  
      {  
           while($row = $rep->fetch())  
           {  
            ?>            
                <li class="Sli"><?php echo $row["DescriptionCV"]; ?></li> <?php 
            }   
        } 
          
      } 
      else  
      {  
        ?>
          <li class="Sli" >Aucun correspondant à votre recherche</li>
    </ul>
          <?php 
      }   
 
?>