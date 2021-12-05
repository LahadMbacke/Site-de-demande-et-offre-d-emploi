<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
	<link rel="stylesheet" href="emploi.css?t=<?php echo time();?>">
	<title>bienvenu a find work</title>
</head>
<body>
      <header>
          <nav>
              <h1>FIND YOUR JOB</h1>
               <div class="gauch">
                 <a href="principal.php"> <p>Accueil</p></a>
                 <a href=""> <p>Offre d'emploi</p></a>
                <a href=""><p>Espace recruteur</p></a>               
                <!-- <a href=""><p>Mon Compte</p></a> -->
                </div>
                 <div class="droite">
                <a href="connexion.php"><p>Connexion</p></a>
                <a href="inscription.php"><p>Inscription</p></a>
              </div>
          </nav>

          <section class="presentation">
            <div class="first_present">
              <!-- BARRE DE RECHERCHE: -->
              <div>
                <h2>Trouver plus facilement le travail de votre reve</h2>
                <form>
                   <div class="container">
                       <div class="search">
                          <div class="row">
                             <div class="col-md-6">
                                   <div class="search-1"> 
                                    <i class='bx bx-search-alt'></i> 
                                    <input type="text" placeholder="Titre de poste ou mot cle">
                                   </div>
                             </div>
                                   <div class="col-md-6">
                                        <div>
                                           <div class="search-2"> 
                                            <i class='bx bxs-map'></i> 
                                            <input type="text"placeholder="Lieu: Vile , Departement ou Region">
                                             <button>Search</button> 
                                           </div>
                                        </div>
                                   </div>
                          </div>
                        </div>
                    </div>
                  </form>
               </div>
                      <!-- RECHERCHE POPULAIRE -->
                    <div>
                       
                    </div>
            </div>
          </section>
      </header>

      <section class="presentation">
        <div class="second_present">
          <h1>Les derniers offres d'emplois</h1>
        </div>
      </section>

          <footer>
            <p>condition generale</p>
            <p>condition d'utilisation</p>
          </footer>
</body>
</html>