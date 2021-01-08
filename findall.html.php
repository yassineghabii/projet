<?php
session_start();
require_once "connexion.php";

if (isset($_POST["add_to_cart"])) {
  if (isset($_SESSION["shopping_cart"])) {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if (!in_array($_GET["id"], $item_array_id)) {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'      =>  $_GET["id"],
        'item_name'      =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'    =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    } elseif (in_array($_GET["id"], $item_array_id)) {
      foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if ($values["item_id"] == $_GET["id"]) {
          unset($_SESSION["shopping_cart"][$keys]);
        }
      }
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'      =>  $_GET["id"],
        'item_name'      =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'    =>  $_POST["quantity"] + 1
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
  } else {
    $item_array = array(
      'item_id'      =>  $_GET["id"],
      'item_name'      =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'    =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>otomShop/Liste des produits</title>
</head>
<body>
<!--<a href="authen.php">connexion</a>-->
<?php
   require_once "connexion.php";
   $sql="select * from product ";
   $res=$cnx->query($sql);
   $article=$res->fetchAll(PDO::FETCH_NUM);
   $quantity = 0;
  if (!empty($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      $quantity = $quantity + ($values["item_quantity"]);
    }
  }
   
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
      <li class="nav-item active">
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
    <form>


<a href="panier2.php" type="button" class="btn btn-info btn-lg">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
  </svg>&nbsp;&nbsp;<span class="badge badge-light"><?php echo ($quantity) ?></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
  

    <form class="form-inline my-2 my-lg-0" method="post">
    <a href="authen.php" class="btn btn-outline-secondary">Connexion</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
    <form action="findarticle.php" method="post">
        <div class="input-group">
    <input class="form-control mr-sm-2" type="text" name="art" placeholder="Search">
       <span class="input-group-btn">
      <button class="btn btn-secondary my-2 my-sm-0" name="ok" type="submit">Rechercher</button>
</span>
        </div>
      </form>
  </div>
</nav>
<ol class="breadcrumb">
  <li class="breadcrumb-item active"><a href="findall.html.php">Liste des produits</a></li>
  <li class="breadcrumb-item "><a href="panier2.php">Panier</a></li>
</ol> 

<div class="jumbotron">
  <h1 class="display-3">Bienvenue dans notre boutique </h1>
  <p class="lead">Vous trouverez les meilleurs articles avec des prix imbattables</p>
  <hr class="my-4"> 
  <div class="row">
  <?php
    foreach ($article as  $article) {?>
     
    <div class="col-4">
    <form method="post" action="findall.html.php?action=add&id=<?php echo $article[0]; ?>">
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
            <span class="badge badge-pill badge-warning">Promo</span>
            <?php }?>   
    </div></br>
    <strong>Reference: </strong><?=$article[0]?></br>
    <strong>Prix: </strong>
    <?php if($article[5]==1){?>
              <del><?=$article[2]?> DT</del>&nbsp;<?=($article[2]-($article[2]*10)/100)?>
            <?php 
            }
            else echo ($article[2]);
          ?> DT
            </br>
            <strong>Quantité: </strong><?= $article[6] ?></br></br>
                  <input type="hidden" name="quantity" value="1" />

                  <input type="hidden" name="hidden_name" value="<?php echo $article[1]; ?>" />

                  <input type="hidden" name="hidden_price" value="<?php echo $article[2]; ?>" />
                  <button type="submit" name="add_to_cart" class="btn btn-outline-success">Ajouter au pannier&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                      <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                      <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg></button>
            <a href="détail.php?ref=<?=$article[0]?>" class="btn btn-outline-info">Voir détail</a>
            
    </div>
    </div>
  </div>
</div>
          </form>
    </div>
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
  
</footer>
</html>