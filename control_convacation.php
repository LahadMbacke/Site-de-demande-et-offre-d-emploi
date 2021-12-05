<?php
session_start();
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
  if (isset($_POST["envoyer"])) {
  	$convacation = $_POST['editor'];
  	$idcandidat = $_POST['idC'];
  	$idoffre = $_POST['id'];
		

    $req = "SELECT * FROM planificationentretien WHERE idMembre = ? and idOffre= ?";
           $res=$connect->prepare($req);
            $res->bindParam(1,$idcandidat);
            $res->bindParam(2,$idoffre);
             $res->execute(); 
             $row = $res->fetch();
              if($row){
             if ($idoffre==$row['idOffre'])
             {
                if ($idcandidat == $row['idMembre'])
                {
                     echo "Vous avez deja postule pour cette offre";
                ?>s
                   <div>
                       <h4 style="visibility: hidden;" id="alert">Vous avez deja convoquer ce candidat</h4>
                   </div>
                <?php 
               }
            }
        }



 else
     {
  		$req="INSERT INTO planificationentretien (idMembre,idCandidat,idOffre,convacation) VALUES(?,?,?,?)";
                $stmt = $connect->prepare($req);           
             $stmt->bindParam(1, $idcandidat);
             $stmt->bindParam(2, $idcandidat);
             $stmt->bindParam(3, $idoffre);
             $stmt->bindParam(4, $convacation);                                    
             $stmt->execute();
             if ($stmt) {
                  ?>
                    <h4 style="visibility:hidden;" id="succ">OKKKKKKKK</h4>
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

     if (alrt =="Vous avez deja convoquer ce candidat")
     {
        swal({
              title: "Echec!",
              text: "Vous avez deja convoquer ce candidat",
               type: 'warning',
              showConfirmButton: true
            }, function(){
               window.location.href = "http://localhost/MEMOIRE/MesPublications.php" ;
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
              text: "Votre convaction a ete envoye avec succes",
               type: 'success',
              // timer: 2000,
              showConfirmButton: true
            }, function(){
                  window.location.href = "http://localhost/MEMOIRE/MesPublications.php" ;
            });

       } 
}
</script>