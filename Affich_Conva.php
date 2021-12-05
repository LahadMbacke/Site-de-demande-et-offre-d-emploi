<?php
require('date.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>"> 
    <link rel="stylesheet" href="CSS/w3.css">


    <style>
       
        .content {
        padding: 16px;
        }

        .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        }

        .sticky + .content {
        padding-top: 60px;
        }
       

           .paragraph-right
		    {
		      flex : 5;
		     margin-top : 50px;
		    } 
			   #ens{
			   	style="max-width:1232px;
			   	 margin: auto;
			   	 color: black;
			   }
    </style>
</head>
<body>
    
    <?php 
        include("myHead.php");
    ?>


<section >
	    <div id="ens" class="w3-content w3-margin-top"  >
	<?php 
		$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
       if (isset($_POST['conv'])) {
       	$id =$_POST['id'];

		$req = "SELECT * FROM planificationentretien where idConvacation = '$id' ";
		$rep=$connect->prepare($req); //this instruction preparered the requete
				$rep->execute();//execute la requete 
				while ($row = $rep->fetch()) 
				{ ?>

					<div class="w3-row-padding w3-section   w3-card-4 w3-border w3-round-large w3-light-grey">
                  <div class="paragraph-right">
							<h3 class="w3-text-blue w3-border-bottom w3-center">Convaction </h3><br>
							<h4 class="w3-margin-left"><strong class="w3-text-black"><?php echo $row["convacation"]; ?></strong>
							 </h4>

						</div>
					</div>


			<?php	}
       }
		
		?>
</div>

</section>    
    <?php
        include("footer.php");
    ?>
    
</body>
</html>







