<?php 
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
if(isset($_GET['user'])){
    $user = (String) trim($_GET['user']);
 
    $req = $DB->query("SELECT *
      FROM emploie
      WHERE nom LIKE ?
      LIMIT 10",
      array("$user%"));
 
    $req = $req->fetchALL();
  
    foreach($req as $r){
      ?>   
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['nom']?></div><?php    
    }
  } 

?>