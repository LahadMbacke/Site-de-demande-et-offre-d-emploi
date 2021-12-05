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


    <style>
        #fav
        {
            display: inline-block;
            width: 55%;
        }
    </style>
</head>
<body>
   
    <?php
        include("Rec_header.php");
    ?>
    
    <div id="fav">
       
    </div>

    <!-- Page footer -->
    <?php
        include("footer.php");
    ?>



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
          url:"Recup_DepotCandidats.php",
          // data:"data"
          dataType: "html",
          success:function (response) {
            $("#fav").html(response);
          }
    });
}

    </script>
</body>
</html>