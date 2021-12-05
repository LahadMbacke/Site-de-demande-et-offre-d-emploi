<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="CSS/Rec_header.css?t=<?php echo time();?>">
</head>
<body>



<header class="header">
   <nav class="navbar navbar-expand-lg fixed-top py-3">
       <div class="container"><a href="principale.php" class="navbar-brand text-uppercase font-weight-bold"> <h1>OKKKK</h1></a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="Poser_offres.php" class="nav-link text-uppercase font-weight-bold">Publier offre </span></a></li>
                    <li class="nav-item"><a href="MesPublications.php" class="nav-link text-uppercase font-weight-bold">Mes Publications</a></li>
                    <li class="nav-item"><a href="Banque_cv.php" class="nav-link text-uppercase font-weight-bold">Banque CV</a></li>
                    <!-- <li class="nav-item"><a href="depot_Candidats.php" class="nav-link text-uppercase font-weight-bold">candidat</a></li> -->
                    <li class="nav-item"><a href="compte_Recruteur.php" class="nav-link text-uppercase font-weight-bold">Mon Compte</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<!-- For demo purpose -->


 <script src="jquery-3.6.0.min.js"></script>
<script>
       
$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
});



    </script>
</body>
</html>