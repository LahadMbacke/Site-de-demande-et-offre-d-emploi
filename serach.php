<?php 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

 if(isset($_POST["query"]))  
 {  
     echo'';  
      $query = "SELECT distinct secteur FROM emploie WHERE secteur LIKE '%".$_POST["query"]."%'";  
      $rep=$connect->query($query); 
      echo '<ul class="list-unstyled Sul">';  
      if($rep->rowCount() > 0)  
      {  
           while($row = $rep->fetch())  
           {  
               echo'<li id="metier" class="Sli">'.$row["secteur"].'</li>';  
           }  
      }  
      else  
      {  
          echo'<li class="Sli">Aucun correspondant à votre recherche</li>';  
      }  
     echo'</ul ">';  
      // echo $output;  
 }  

 /////////////////////////////////////////////////////LIEU////////////////////////////////////
 if(isset($_POST["queryL"]))  
 {  
      echo'';  
      $query = "SELECT distinct region FROM offre WHERE region LIKE '%".$_POST["queryL"]."%'";  
      $rep=$connect->query($query); 
      echo'<ul class="list-unstyled Sul">';  
      if($rep->rowCount() > 0)  
      {  
           while($row = $rep->fetch())  
           {  
               echo'<li id="lieu" class="Sli">'.$row["region"].'</li>';  
           }  
      }  
      else  
      {  
          echo'<li class="Sli">Aucune offre correspondant à votre recherche</li>';  
      }  
     echo'</ul ">';  
      // echo $output;  
 }  
?>