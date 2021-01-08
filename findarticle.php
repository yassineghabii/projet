<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>otomShop/Search</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

  
    <?php
require_once "connexion.php"; 
    $art=$_POST['art'];
   $sql="select * from product where lib like'%$art%' ";
   $res=$cnx->query($sql);
   $article=$res->fetchAll(PDO::FETCH_NUM); 
   if($article){
   ?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <img src="otom.png" width=50  height=50 alt="/">
  <a class="navbar-brand" href="#">otomShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
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
    <a href="panier2.php" type="button" class="btn btn-warning btn-lg">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <form action="findarticle.php" method="post">
        <div class="input-group">
    <input class="form-control mr-sm-2" type="text" name="art" placeholder="Search">
       <span class="input-group-btn">
      <button class="btn btn-secondary my-2 my-sm-0" name="ok" type="submit">Search</button>
</span>
        </div>
      </form>
  </div>
</nav>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="findall.html.php">liste des produits </a></li>
  <li class="breadcrumb-item active">produits</li>
</ol>
<div class="jumbotron">
  <h1 class="display-3">Bienvenue dans notre boutique </h1>
  <p class="lead">Vous trouverez les meilleurs articles avec des prix imbattables</p>
  <hr class="my-4"> 
  <div class="row">
  <?php
    foreach ($article as  $article) {?>
     
    <div class="col-4">
    <div class="shadow p-3 mb-5 bg-white rounded">
    <div class="card" style="max-width: 33vw; max-height: 50vw;">
    <div class="text-center">
    <img src="<?=$article[4]?>" alt="im" style="max-width: 30vw; max-height: 10vw;">   
    </div>
  <div class="card-body">
    <div class="card-title" >
    <div style="font-size: 120% ;">
    <strong><?=$article[1]?></strong>&nbsp;&nbsp;&nbsp;
    <?php if($article[5]==1){?>
            <span class="badge badge-pill badge-danger">Promo</span>
            <?php }?>   
    </div></br>
    <strong>Reference: </strong><?=$article[0]?></br>
    <?php if($article[5]==1){?>
              <del><?=$article[2]?> DT</del>&nbsp;<?=($article[2]-($article[2]*10)/100)?>
            <?php 
            }
            else echo ($article[2]);
          ?> DT
            </br>
            <a href="détail.php?ref=<?=$article[0]?>" class="btn btn-outline-info">voir détail</a>
            <a href="panier2.php?ref=<?=$article[0]?>&libelle=<?=$article[1]?>&prix=<?=$article[2]?>&photo=<?=$article[3]?>&description=<?=$article[4]?>" class="btn btn-outline-success">ajouter panier</a>
    </div>
    </div>
  </div>
</div>
    </div>
    <?php }?>
    <?php } ?>
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
</html



   
 
 
  