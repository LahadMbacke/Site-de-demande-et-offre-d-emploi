<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
        <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>">
        <link rel="stylesheet" href="CSS/w3.css">
    <title>Document</title>


   <!--  <style>
        #fav
        {
            display: inline-block;
            width: 55%;
        }
    </style> -->
</head>
<body>
    <!-- Page header -->
    <?php
        include("myHead.php");
    ?>
    
    <!-- Page content -->
    <div id="fav" class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
    </div>
    

    <!-- Page footer -->
    <?php
        include("footer.php");
    ?>

<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"/></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

   <script src="jquery-3.6.0.min.js"></script>
   <script>
        $(document).ready(function (argument) {
  getOffre();

  
});
// **********************************CHARGER LES MES_FAVORIES*************************************

function getOffre()
{
    $.ajax({

          type:"type",
          url:"RecuperationMesFavorie.php",
          // data:"data"
          dataType: "html",
          success:function (response) {
                $("#fav").html(response);
          }
    });
}


      var alrt = document.getElementById("nosucc").textContent;
   
             if (alrt=="okk")
             {
                alert(alrt);
                swal({
                      title: "Echec!",
                      text: "Vous n'avez pas encore ajoute de favories",
                       type: 'warning',
                      showConfirmButton: true
                    }, function(){
                       window.location.href = "http://localhost/MEMOIRE/profil.php" ;
                    });
             }

    </script>
</body>
</html>