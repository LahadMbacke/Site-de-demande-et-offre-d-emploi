<?php
session_start();
// $_SESSION['favorie'];
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
         
 $statement = "SELECT * from profil limit 5";
            $sth = $connect->prepare($statement);
            $sth->execute(); 
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


<!-- <div class="w3-container"> -->
        <form action="aff_List_CVtheque.php" method="post" class="w3-form">
                <div class="w3-row" id="rech">
                    <!-- ******************CV**************** -->
                    <div class="w3-col m5 metier" >
                        <input type="text" id="cv" class="w3-input w3-light-grey HeightInput" name="profilCV" placeholder="profil de CV" />  
                       <div class="container card" id="cvList"></div>
                  </div>
                   <!-- <button id="btns" name="recherc" class="button"><i class="bi bi-search"></i></button> -->
                </div>
        </form>
    <!-- </div> -->






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
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                ?>
                 <tbody>
                     <tr>
                        <?php 
                        if ($row['cv']!=NULL) {
                           ?>
                           <td><a href="voir_profil_candidat.php?id=<?=$row['idMembre']?>"><button class="btn btn-secondary">Profil</button></a></td>
                           

                           <td><a a href="affiche_CVtheque.php?id=<?=$row['cv']?>"><button style="width:50%" class="btn btn-success"><i class="bi bi-file-pdf"> CV</i></button></a> </p></td>

                            <td id="cvDesc"><?php echo $row["DescriptionCV"]; ?></td> 
                            <?php 
                           }
                       ?>
                 </tr>
             </tbody>

                <?php 
            }
            ?>
        </table>
    </div>
     <?php 

?>

 <script src="jquery-3.6.0.min.js"></script>
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
 $(document).ready(function(){  
      $('#cv').keyup(function(){ 
       $("#cvT").hide(); 
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"Recup_Rech_CVtheque.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#cvList').fadeIn();  
                          $('#cvList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#cv').val($(this).text());  
           $('#cvList').fadeOut();  
      });  
 });  

</script>
</body>
</html>
