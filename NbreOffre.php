<?php
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

$req = "SELECT count(*) as total from offre";
 $rep=$connect->query($req);
  if ($rep)
 {
 	if ($rep->rowCount()==0) 
    {
 		echo"echc";
 	}

 	else
     {
       $row = $rep->fetch();
       echo $row['total'];
     }
	
 }




?>