<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="CSS/emploi.css?t=<?php echo time();?>"> -->
    <link rel="stylesheet" href="CSS/w3.css">
</head>
<body>
    <?php 
        include("header_principale.php");
    ?>
    <section class="vh-100" style="background-color: #4ca1af; margin-top:-70px">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img style="height:510px; width:110%" 
                src="backg/jobbber.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form class="connexion " method="post" action="control_connexion.php">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                   <div style="margin: auto;"> <span class="h1 fw-bold mb-0">Compte candidat</span></div>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; text-align: center;">Connectez a votre compte </h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example17" class="form-control form-control-lg" placeholder="Email address" name="myIdenti"/>
                    <!-- <label class="form-label" for="form2Example17">Email address</label> -->
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Password" name="myPWD"/>
                    <!-- <label class="form-label" for="form2Example27">Password</label> -->
                  </div>

                  <div class="pt-1 mb-4">
                    <button style="width:100%" class="btn btn-dark btn-lg btn-block" type="submit">Se Connecter</button>
                  </div>

                  <a class="small text-muted" href="forgot.php">Vous avez oublie votre mot de passe?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81; text-align: center;">Pas encore de compte ? <a href="inscription.php" style="color: #393f81;">Créez-le ici</a></p>
                  <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a> -->
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

	<?php
        include("footer.php");
    ?>
</body>
</html>