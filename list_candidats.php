<?php 
$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
$id =htmlentities(trim($_GET['id']));
?>


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
            width: 100%;
            margin: auto;
            margin-left: -190px;
        }
         table{
            width: 100%;
         }
        th{
            font-size: 20px;
        }
        td
        {
            font-size:20px;
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
    // $.ajax({

    //       type:"type",
    //       url:"Recup_DepotCandidats.php",
    //       // data:"data"
    //       dataType: "html",
    //       success:function (response) {
    //         $("#fav").html(response);
    //       }
    // });

    // function getOffre(){
   id = <?php echo($id); ?>;//recupere l'ID du destinataire
    info ='?id='+id;
    var xhr=new XMLHttpRequest();
    var url="Recup_ListCandidats.php";
    url+=info;
    xhr.open('GET',url);
  xhr.send(null);

  xhr.onreadystatechange=function()
  {
  
  if (xhr.readyState == 4 && xhr.status == 200) 
      {
        //document.write(xhr.responseText);
        document.querySelector("#fav").innerHTML=xhr.responseText;
        // document.getElementById('load').scrolltop=document.getElementById('load');
         // scrollDown();
      }
    }
 // };
}

    </script>
</body>
</html>