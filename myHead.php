<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="CSS/cssMyheader.css?t=<?php echo time();?>">


</head>
<body>

<header class="header">
   <nav class="navbar navbar-expand-lg fixed-top py-3">
       <div class="container"><a href="principale.php" class="navbar-brand text-uppercase font-weight-bold"> <h1>OKKK</h1></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <div id="MenuCenter">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="profil.php" class="nav-link text-uppercase font-weight-bold mforme">Profil et CV </a></li>
                    <li class="nav-item active"><a href="Voir_profil.php" class="nav-link text-uppercase font-weight-bold mforme">Mon Profil</a></li>
                    <li class="nav-item"><a href="MesFavories.php" class="nav-link text-uppercase font-weight-bold mforme">Mes favoris</a></li>
                    <li class="nav-item"><a href="mon_alert.php" class="nav-link text-uppercase font-weight-bold mforme">Alertes</a></li>
                    <li class="nav-item"><a href="mesCandidatures.php" class="nav-link text-uppercase font-weight-bold mforme">Mes candidatures</a></li>
                 </div>
                </ul>
                <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                 	<a href="compte_user.php" class="nav-link text-uppercase font-weight-bold">
                    	<div class="dropdown">
                    		<i class="bi bi-person-circle"></i>
								  <div class="dropdown-content">
								    <a href="profil.php"><i class="bi bi-person">Profil</i></a>
								    <a href="connexion.php">Deconnexion</a>
								   </div>
                    	   </div>
                    </a>
                </li>
              </ul>
             </div>
    </nav>
</header>


<!-- For demo purpose -->


 <script src="jquery-3.6.0.min.js"></script>
<script>
       

// **********************************CHARGER LES OFFRES*************************************


$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
});


 var sav = document.querySelectorAll(".mforme");
    for(var i=0; i<sav.length;i++)
    {
         sav[i].addEventListener("mouseover",function(){
         this.style.color="black";
        this.style.backgroundColor="grey";
        this.style.borderRadius="15px"
      }) 
        sav[i].addEventListener("mouseout",function(){
        this.style.color="";
        this.style.backgroundColor="";
      })   
    }



    </script>
</body>
</html>