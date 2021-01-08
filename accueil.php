<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>otomHome/accueil</title>
</head>
<body>
<?php
   require_once "connexion.php";
   $sql="select * from product ";
   $res=$cnx->query($sql);
   $article=$res->fetchAll(PDO::FETCH_NUM);
   ?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <img src="otom.png" width=50  height=50 alt="/">
  <a class="navbar-brand" href="#">otomHome</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="accueil.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="findall.html.php">Liste des produits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="moussa/front/AfficherLabos.php">Liste des laboratoires</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="projet/front/views/quiz.php">Quiz</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
    <a href="authen.php" class="btn btn-outline-secondary">connexion</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
    <form action="findarticle.php" method="post">
        <div class="input-group">
    <input class="form-control mr-sm-2" type="text" name="art" placeholder="Search">
       <span class="input-group-btn">
      <button class="btn btn-secondary my-2 my-sm-0" name="ok" type="submit">rechercher</button>
</span>
        </div>
      </form>
  </div>
</nav>

<div class="jumbotron" style="background-color:white">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="covid2021.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="info.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
</div>
<video src="pub.mp4" width=1300  height=600 controls autoplay>
  Cette vidéo ne peut être affichée sur votre navigateur Internet.<br>
  Une version est disponible en téléchargement sous <a href="URL">adresse du lien </a> . 
</video>

<div class="row">
		           
		            <div class="col-md-3 col-sm-3 col-xs-6">
						<div class="single-counter wow animated animated" data-wow-duration="1.5s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.3s;">
							<div class="counter-info">
								<span class="fcount">
									<span class="counter">950</span>
								</span>
								<h3>ONLINE USERS</h3>								
							</div>
						</div>		                
		            </div>
		            
		           
		        </div>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<div class="jumbotron">
  <h1 class="display-3">Ne ratez pas l'occasion ! </h1>
  <p class="lead">Vous trouverez ic nos promos du mois</p>

<hr class="my-4"> 
  <div class="row">
  
  <?php
    foreach ($article as  $article) {
        if($article[5]==1){
        ?>
     
    <div class="col-4" style="background-color:white">
    <div class="shadow p-3 mb-5 bg-white rounded">
    <div class="card" style="max-width: 33vw; max-height: 50vw;">
    <div class="text-center">
    <img src="<?=$article[4]?>" alt="im" style="max-width: 30vw; max-height: 10vw;">   
    </div>
  <div class="card-body" >
    <div class="card-title" >
    <div style="font-size: 120% ;">
    <strong><?=$article[1]?></strong>&nbsp;&nbsp;&nbsp;
    
            <span class="badge badge-pill badge-warning">Promo</span>
              
    </div></br>
    <strong>Reference: </strong><?=$article[0]?></br>
    
              <del><?=$article[2]?> DT</del>&nbsp;<?=($article[2]-($article[2]*10)/100)?>
             
        
            </br>
            
            <a href="panier2.php?ref=<?=$article[0]?>&libelle=<?=$article[1]?>&prix=<?=$article[2]?>&photo=<?=$article[4]?>&description=<?=$article[3]?>" class="btn btn-outline-success">Ajouter au panier</a>
            <a href="détail.php?ref=<?=$article[0]?>" class="btn btn-outline-info">Voir détail</a>
    </div>
    </div>
  </div>
</div>
    </div>
    <?php }?>
    <?php }?>
  </div>
</div>

</body>
<footer class=" text-white text-center text-lg-start"style="background-color:  rgb(0, 0, 0.918)">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">SERVICES</h5>




        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-white">.</a>
          </li>
          <li>
            <a href="#!" class="text-white">Mon compte</a>
          </li>
          <li>
            <a href="#!" class="text-white">FAQ & Contact</a>
          </li>
          <li>
            <a href="#!" class="text-white">CGV</a>
          </li>
          <li>
            <a href="#!" class="text-white">Politique de confidentialité</a>
          </li>
        </ul>
        
      </div>
    
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Suivez-nous sur les réseaux sociaux</h5>

        <ul class="list-unstyled mb-0">
          
          <li>
          <img src="fb.png" width=50  height=50 alt="/">
            <a href="#!" class="text-white">Facebook</a>
          </li>
          <li>
          <img src="insta.png" width=40  height=40 alt="/">
            <a href="#!" class="text-white">Instagram</a>
          </li>
          <li>
          <img src="twit.png" width=50  height=50 alt="/">
            <a href="#!" class="text-white">Twitter</a>
          </li>
          
        </ul>
      </div>
    
      
    
    </div>
 
  </div>
  </div>
</footer>
</html>