<?php 
session_start();
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

<?php
 include("Rec_header.php");
if (isset( $_GET['id'])) {

     $id_off = $_GET['id'];
   // chrcher si le candidat avit deja postule
    $req = "SELECT idMembre,idOffre FROM candidature WHERE idMembre = $id and idOffre= $id_off";
           $res=$connect->query($req);
             $row = $res->fetch();
             if($row){
             if ($id_off==$row['idOffre'])
             {
                if ($id == $row['idMembre'])
                {// echo "Vous avez deja postule pour cette offre";
                ?>
                   <div>
                       <h4 style="visibility: hidden;" id="alert">Vous avez deja postule pour cette offre</h4>
                   </div>
              <?php 
             }
            }
        }
             else{
               
     $date = date("Y-m-d h:i:s");

                           
            if (isset($_FILES["cv"]) and $_FILES["cv"]['error']==0)
             {                                               

                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
              $extension_fichier = strtolower (substr(strrchr($_FILES["cv"]["name"], '.') ,1) );
              $extensions_ok = array('pdf');
                   if ( in_array($extension_fichier, $extensions_ok) )
                     {
                      // echo "Extension correcte";
                       echo "<br>";
                      $dhc=date("dmY_His",time());
                      $fic= "CVpostule/".$dhc."_".$_FILES['cv']['name'];//Here I rename my file with the time

                        //My file is uploded to $fic
                   if(move_uploaded_file( $_FILES['cv']['tmp_name'],$fic))
                       {
                         $cv="CVpostule/".$dhc."_".$_FILES['cv']['name']; 
                         $etat=0;
                         $req = "INSERT INTO candidature (idMembre,idCandidat,idOffre,statut,datee,cv) VALUES(?,?,?,?,?,?)";
                         $stmt = $connect->prepare($req);           
                                 $stmt->bindParam(1, $_SESSION['id']);
                                 $stmt->bindParam(2, $_SESSION['id']);
                                 $stmt->bindParam(3, $id_off); 
                                 $stmt->bindParam(4, $etat);                                 
                                 $stmt->bindParam(5, $date);
                                 $stmt->bindParam(6, $cv);
              
                     $stmt->execute();
                        if ($stmt)
                         {                   
                             ?>
                               <h4 style="visibility:hidden;" id="succ">OKKKKKKKK</h4>
                             <?php 
                         }                       
                       }
                    }
                      else
                        ?>
                         <h4 style="visibility:hidden;" id="Error">Errrrrr ext</h4>
                    <?php 
                                                                                                                    
                }
            }
    
  }

?>






<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"/></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
     <script src="jquery-3.6.0.min.js"></script>


<script type="text/javascript">
    
    try

    {


   if (document.getElementById("alert").textContent != "") {
     var alrt = document.getElementById("alert").textContent;

     if (alrt =="Vous avez deja postule pour cette offre")
     {
        swal({
              title: "Echec!",
              text: "Vous avez deja postule pour cette offre",
               type: 'warning',
              showConfirmButton: true
            }, function(){
               window.location.href = "http://localhost/MEMOIRE/postule.php?id=<?php echo $_GET['id'];?>" ;
            });
     }
   }
 }
 catch(error)
 {

 }

finally{
    var suucc = document.getElementById("succ").textContent;
     if (suucc == "OKKKKKKKK") {
            swal({
              title: "Success!",
              text: "Votre candidature a ete envoye",
               type: 'success',
              // timer: 2000,
              showConfirmButton: true
            }, function(){
                  window.location.href = "http://localhost/MEMOIRE/mesCandidatures.php?id=<?php echo $_GET['id'];?>" ;
            });

       } 

       // ********************************************************
     //    var MError = document.getElementById("Error").textContent;
     // if (MError == "Errrrrr ext") {
     //        swal({
     //          title: "Success!",
     //          text: "Vous devez fournir un document pdf",
     //           type: 'success',
     //          // timer: 2000,
     //          showConfirmButton: true
     //        }, function(){
     //              window.location.href = "http://localhost/MEMOIRE/postule.php?id=<?php echo $_GET['id'];?>" ;
     //        });

     //   } 
}




    
       


</script>
</body>
</html>