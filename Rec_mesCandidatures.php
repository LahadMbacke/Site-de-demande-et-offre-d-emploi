<?php
session_start();
// $_SESSION['favorie'];
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
         $idUser=$_SESSION['id'];
         // *********************************************************************


// $statement = "SELECT R.nom  candidat C INNER JOIN candidature cd INNER JOIN offre O INNER JOIN recruteur R ON O.idOffre = Cd.idOffre and  C.idCandidat=Cd.idCandidat and R.idOffre=O.idOffre WHERE C.idCandidat = :idUser ";
//             $sth = $connect->prepare($statement);
//             $sth->execute(array(":idUser" => $idUser));




         // *************************************************************************
         
  $statement = "SELECT Cd.idCandidat as cd ,P.idCandidat cdp,P.idConvacation, P.convacation, O.idOffre, E.nom , Cd.datee,Cd.statut,O.entreprise FROM candidat C  JOIN candidature cd on C.idCandidat=Cd.idCandidat  JOIN offre O on O.idOffre = Cd.idOffre  JOIN emploie E on E.idOffre=O.idOffre LEFT join planificationentretien P on E.idOffre=P.idOffre WHERE Cd.idCandidat= :idUser and (P.idCandidat=:idUser or P.idCandidat is null)";
            $sth = $connect->prepare($statement);
            $sth->execute(array(":idUser" => $idUser));
    ?>
             <div class="container " style="margin-left: 400px; margin-top: 100px;">
                <table class="table table-success ">
                        <thead class="table-dark">
                        <tr>
                          <th scope="col">Nom</th>
                          <th scope="col">Entreprise</th>
                          <th scope="col">Date</th>
                          <th scope="col">etat</th>
                          <th scope="col">convacation</th>
                        </tr>
                     </thead>
            <?php
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            	?>
                 <tbody>
                     <tr>
                        <td id="nom"><?php echo $row["nom"]; ?></td> <div id="desc">
                        <td id="entr">
                            <div id="desc">
                            <?php echo $row["entreprise"]; ?>
                            </div>
                            <p class="paragraph"><a style="text-decoration: none;" id="plus"  class="w3-round-xxlarge w3-padding-small " href="detail_offre.php?id=<?= $row["idOffre"]?>">Voir l'offre</a>
                            </p>
                        </td>
                        <td id="date"><?php echo $row["datee"]; ?></td>
                        <td id="etat">
                            <?php 
                                  if ($row["statut"]==0)
                                  {
                                    ?>
                                    <span style="color: red;">En attente</span>
                                  <?php 
                                     }

                                    else
                                    {
                                        ?>
                                    <span style="color: green;">Lu</span>
                                      
                                    <?php
                                    }
                                ?>
                                
                            </td>
                            <td id="etat">
                            <?php 
                                  if ($row["convacation"]==null)
                                  {
                                    ?>
                                    <span style="color: red;">Pas encore de convacation</span>
                                  <?php 
                                     }

                                    else
                                    {
                                        ?>
                                    <form method="post" action="Affich_Conva.php">
                                        <input type="hidden" name="id" value="<?php echo $row["idConvacation"]; ?>">
                                         <button type="submit" name="conv">Voir la convacation</button>
                                    </form>
                                    <!-- <span style="color: green;">Vous avez recu une convacation</span> -->
                                      
                                    <?php
                                    }
                                ?>
                                
                            </td>
                 </tr>
             </tbody>

            	<?php 
            }
            ?>
        </table>
    </div>
     <?php 

?>
