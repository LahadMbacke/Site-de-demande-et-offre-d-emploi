<?php 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
  require('date.php');


 $req = "SELECT * FROM offre O INNER JOIN emploie E ON O.idOffre = E.idOffre ORDER by dateCreation DESC limit 10; ";
$rep=$connect->prepare($req); //this instruction preparered the requete
        $rep->execute();//execute la requete 
        while ($row = $rep->fetch()) 
         { 
            if ( $row["dateExpiration"] >= date("Y-m-d")) 
            {
                
            
		   ?>
		   <style >
    .myoffre
    {
       width:70%;
        margin: auto; 
         display : flex;
         height: 190px;
    }

    .paragraph-right
    {
      flex : 5;
     margin-top : 00px;
     margin-left: 20px;
    }
    .picture-left
    {
       flex: 1;
    }

    .paragraph
    {
        margin-left: 600px;
       margin-top: -30px;
    }
   p a
    {
     text-decoration: none;
    }

    #desc
      {
      height: 70px;
      overflow: hidden;
       background-color: #eee;
       margin-bottom: -2px;
      }
      small{
        font-size: 17px;
      }

</style>
            <div class="w3-row-padding w3-section w3-card-4 w3-border w3-round-large w3-light-grey myoffre">

                <img src="<?php echo $row['logoEntrprise'];?>" class="picture-left" width="150"/>
             <div class="paragraph-right">
				 <h2 class="w3-text-blue"> <?php echo $row["nom"]; ?>(H/F) </h2> 
				<small><?php echo $row["typeContrat"]; ?> * <strong> <?php echo $row["region"]; ?> </strong></small> <br>
                <!--  -->
                <div id="desc">
                    <p class="w3-leftbar w3-padding-small"> <?php echo $row["DescriptionPost"]; ?> </p>
                </div>
				<small class="w3-pale-blue"><?php  $dd=$row["dateCreation"];
                 echo(ago($dd)); ?></small> <br>
                <small class="w3-pale-red">Expire le <?php echo $row["dateExpiration"]; ?></small> <br>
				<p class="paragraph"><a id="plus"  class="w3-round-xxlarge w3-padding-small " href="detail_offre.php?id=<?= $row["idOffre"]?>">Voir l'offre</a></p>
             	
                </div> 
            </div> 
		   <?php 
           }
	}
   ?>

   <script type="text/javascript">
   	 var sav = document.querySelectorAll("#plus");
    for(var i=0; i<sav.length;i++)
    {
         sav[i].addEventListener("mouseover",function(){
         this.style.color="black";
        this.style.backgroundColor="grey";
      }) 
        sav[i].addEventListener("mouseout",function(){
        this.style.color="";
        this.style.backgroundColor="";
      })   
    }
   </script>
   <?php 
?>  