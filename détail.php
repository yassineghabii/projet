<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>otomShop/detail</title>
</head>
<body>
   <?php
   require_once "connexion.php";
   $ref=$_GET['ref'];
   $sql="select * from product where ref='$ref' ";
   $res=$cnx->query($sql);
   $article=$res->fetch(PDO::FETCH_ASSOC);
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
    <form class="form-inline my-2 my-lg-0" method="post">
    <a href="authen.php" class="btn btn-outline-secondary">Connexion</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
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
  <li class="breadcrumb-item active"><a href="findall.html.php">Liste des produits</a></li>
  <li class="breadcrumb-item"><a href="panier2.php">Panier</a></li>
</ol>

<div class="jumbotron">
  <h1 class="display-3">Meilleurs qualités ,meilleurs prix</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4"> 
  
    <div class="shadow p-3 mb-5 bg-white rounded">
    <div class="card" style="max-width: 100vw; max-height: 100vw;">
    <div class="text-center">
    <img src="<?=$article['photo']?>" alt="im" style="max-width: 100vw; max-height: 100vw;">   
    </div>
    <div class="card-body">
    <div class="card-title" >
    <div style="font-size: 120% ;">
    <strong><?= $article['lib'] ?></strong></div></br>
    <strong>Réference :  </strong><?=$article['ref']?></br>
    <strong>Prix:  </strong><?=$article['prix']?> Dt</br>
    <strong>Descrition:  </strong><?=$article['des']?></br>
    <strong>Quantite:  </strong><?=$article['qte']?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  
   
   
   
</body>
</html>