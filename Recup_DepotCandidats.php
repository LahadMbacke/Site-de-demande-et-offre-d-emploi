<?php
session_start();
// $_SESSION['favorie'];
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


         $idUser=$_SESSION['id'];
         
  $statement = "SELECT * FROM offre  WHERE idMembre = :idUser ";
            $sth = $connect->prepare($statement);
            $sth->execute(array(":idUser" => $idUser));
    ?>
             <div class="container card" style="margin-left: 300px; margin-top: 100px;">
                <table class="table table-success table-striped">
                        <thead class="table-dark">
                        <tr>
                          <th scope="col">Reference</th>
                          <th scope="col">candidats</th>
                          <th scope="col">Supprimer</th>
                          <!-- <th scope="col">etat</th> -->
                        </tr>
                     </thead>
            <?php
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            	?>
                 <tbody>
                     <tr>
                        <td><?php echo $row["idOffre"]; ?></td>
                    
                        <td><a href="list_candidats.php?id=<?=$row['idOffre']?>">voir candidatures</a></td>
                        <td><a href="">Supprimer</a></td>
                 </tr>
             </tbody>

            	<?php 
            }
            ?>
        </table>
    </div>
     <?php 

?>
