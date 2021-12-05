<?php 
 require('date.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
        <link rel="stylesheet" href="CSS/w3.css">
	<title></title>
		   <style >
    #myoffre
    {
       /*width:70%;
        margin: auto; 
         display : flex;
         height: 190px;*/
        /* background-color: yellow;*/
    }

    .paragraph-right
    {
      flex : 5;
     margin-top : -200px;
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
</head>
<body>

<?php 


$connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");

//Include required PHPMailer files
	require 'PHPMailer/includes/PHPMailer.php';
	require 'PHPMailer/includes/SMTP.php';
	require 'PHPMailer/includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Creer une instance de PHPMailer
	$mail = new PHPMailer();
//Autorise Mailer a utiliser smtp
	$mail->isSMTP();
//Definir smtp host
	$mail->Host = "smtp.gmail.com";
//Autorise l'authentification de SMTP
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port pour se connecter a  smtp
	$mail->Port = "587";
//Mettre gmail de  username(Applicatin)
	$mail->Username = "sunuliguey94@gmail.com";
//Mettre gmail password(Applicatin)
	$mail->Password = "201808man";
//Le contenu du mail
	$mail->Subject = "Annonce Ofrre d'emploi";
//Set sender email
	$mail->setFrom('sunuliguey94@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	$mail->addEmbeddedImage('img/attachment.png','cidd');
//Email body

//////////////////////////////////////////////////////////////////////////////////
	$req="SELECT E.DescriptionPost, O.logoEntrprise, O.dateExpiration,O.dateCreation,O.idOffre,C.prenom ,A.mail,A.metier,O.region,O.typeContrat from (emploie E join offre O on O.idOffre=E.idOffre ) cross join (alerte A join candidat C on C.idMembre=A.idMembre) WHERE (O.dateCreation >= NOW() - INTERVAL 1 DAY) and( E.nom=A.metier or(O.region=A.lieu and E.nom=A.metier) or (O.region=A.lieu and E.nom=A.metier and A.emploi=O.typeContrat))";
$res=$connect->prepare($req);
 $res->execute();
 



 while ($row=$res->fetch()) {
 	            $region=$row["region"];
 	            $typeContrat=$row["typeContrat"];
            	$metier=$row["metier"];
            	$prenom=$row["prenom"];
            	$idOffre = $row['idOffre'];
            	$DateCre = $row['dateCreation'];
            	$DateExp = $row['dateExpiration'];
            	$destinataire = $row['mail'];
            	$logo = $row["logoEntrprise"];
            	$DescriptionPost = $row["DescriptionPost"];
            	 $mail->addEmbeddedImage($logo,'log');
            	 $Cree = ago($DateCre);
            	// DATEDIFF(NOW(),$row["dateCreation"]);
                $mail->Body = " <h1>SunuLiguey </h1></br>
                                   <p>Bonjour $prenom, Nous avons trouvé des offres récentes</p>
                                    
               <div id='myoffre' style=' background-color: #eee;width:70%;
        margin: auto; 
         display : flex;
         '>
		                 <div>
		                <img src='cid:log' class='picture-left' width='150' style=' flex: 1;'/>
		                </div>
                
                  <div class='paragraph-right' style='flex:5;margin-top : -200px;margin-left: 20px;'>
							 <h2 > $metier(H/F) </h2> 
							    <small style='font-size: 17px;'> $typeContrat * <strong> $region </strong></small> 
			                <div id='desc' style='height: 70px; overflow: hidden; background-color: #eee; margin-bottom: -2px;'>
			                    <p >$DescriptionPost</p>
			                </div>
							       <small style='font-size: 17px; color:blue;'>$Cree</small> <br>
			                    <small style='font-size: 17px; color:red;' >Expire le $DateExp</small> 
			                      <p><a href='http://localhost/MEMOIRE/detail_offre.php?id=$idOffre'>voir offre</a></p>
			             	
			                </div> 
               </div>
            ";  
            
          ///////////////////////////////////////////////////////////////////////////////////////////////////
	 
           
	

//Add recipient
	$mail->addAddress($destinataire);

//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error:";
	}
//Closing smtp connection
	$mail->smtpClose();

 }

?>

</body>
</html>



