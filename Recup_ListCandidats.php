<?php
session_start();
// $_SESSION['favorie'];
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");


 $idUser=$_SESSION['id'];
 $id = $_GET['id'];
         
 $statement = "SELECT O.idOffre,Cdd.idMembre,Cdd.datee,Cdd.cv FROM candidature Cdd INNER JOIN recruteur R INNER JOIN offre O INNER JOIN emploie E ON O.idOffre = Cdd.idOffre and E.idOffre=O.idOffre WHERE R.idRecruteur = ? and O.idOffre= ?";
            $sth = $connect->prepare($statement);
            // $sth->execute(array(":idUser" => $idUser,
            //                       ":id" => $id));
            $sth->bindParam(1,$idUser);
               $sth->bindParam(2,$id);
              $sth->execute(); 
              if ($sth->rowCount()==0) {
                 ?>   <div style=" margin-left: 300px; margin-top: 200px;" class="container card">
                      <div class="w3-row-padding w3-section w3-card-4 w3-border w3-round-large w3-light-grey myoffre">
                         <h3>Vous n'avez pas encore de candidat pour cette offre</h3>             
                       </div> 
                       </div>
                 <?php
              }
              else
              {
    ?>
             <div class="container card" style="margin-left: 300px; margin-top: 100px;">
                <table class="table table-success table-striped">
                        <thead class="table-dark">
                        <tr>
                          <th scope="col">Profil</th>
                          <th scope="col">Cv</th>
                          <th scope="col">Date de candidature</th>
                          <th scope="col">Convocation</th>
                          <th scope="col">Supprimer</th>
                          
                        </tr>
                     </thead>
            <?php
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            	?>
                 <tbody>
                     <tr>
                        <td><a href="voir_profil_candidat.php?id=<?=$row['idMembre']?>"><button class="btn btn-secondary">Profil</button></a></td>
                        <td><a href="affiche_CV.php?id=<?=$row['cv']?>"><button style="width:50%" class="btn btn-success"><i class="bi bi-file-pdf"> CV</i></button></a> </p></td>
                        <td><?php echo $row["datee"]; ?></td>
                        <td>



                                      <?php 
                           // echo $row['idOffre'];
                          $req = "SELECT * FROM planificationentretien WHERE  idOffre= ? and idMembre = ?";
                           $res=$connect->prepare($req);
                            $res->bindParam(1,$row['idOffre']);
                            $res->bindParam(2,$row['idMembre']);
                             $res->execute(); 
                             // $row = $res->fetch();
                                  if ($res->rowCount()==0)
                                  {
                                    ?>
                                      <a href="convacation.php?id=<?=$row['idMembre']?>&idoffre=<?=$row['idOffre']?>"><button class="btn btn-warning">Convoquer</button></a>
                                    <?php 
                                   }

                                    else
                                    {
                                        ?>
                                        <span style="color: green;">Convocation envoye</span>
                                      
                                        <?php
                                    }
                                ?>
                        </td>
                        <td><a href=""><button class="btn btn-danger">Supprimer</button></a></td>
                     </tr>
             </tbody>

            	<?php 
            }
            ?>
        </table>
    </div>
     <?php 
    }
?>
