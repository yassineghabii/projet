<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Document</title>
</head>
<body>
<?php
   
   
   require_once "connexion.php";
   $ref1=$_GET['ref1'];
   $sql1="select * from product where ref='$ref1' ";
   $res1=$cnx->query($sql1);
   $article1=$res1->fetch(PDO::FETCH_ASSOC);
      
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Separated link</a>
        </div>
      </li>
    </ul>
</nav>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
  <li class="breadcrumb-item"><a href="authen.php">Login</a></li>
  <li class="breadcrumb-item"><a href="gestion_article.php">Sort Products</a></li>
  <li class="breadcrumb-item active">Ajout Produit</li>
</ol>
<div class="jumbotron">
  <h3 class="display-4">modifier un produit</h3>
  <hr class="my-4">
  <div class="card" style="max-width: 35vw;">
    <div class="card-body">
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="Post">
            <strong><label class="col-form-label" for="ref">Reference</label></strong>
            <input type="text" class="form-control" placeholder="e.g. 1" name="ref" id="ref" value="<?=$article1['ref']?>" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Libelle</label></strong>
            <input type="text" class="form-control" name="lib" id="lib" placeholder=" Computer" value="<?=$article1['lib']?> " style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Prix</label></strong>
            <input type="text" class="form-control" name="pr" id="pr" placeholder="100" value="<?=$article1['prix']?>" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Description</label></strong>
            <input type="text" class="form-control" name="des" id="des" value="<?=$article1['description']?>" placeholder="Ecran 14" HD - Processeur Intel, Quad Core 1.84 Ghz - RAM 2 Go - Stockage 32 Go " style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Image</label></strong>
            <input type="text" class="form-control" name="ph" id="im" value="<?=$article1['photo']?>" placeholder="image url" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Promo</label></strong>
            <input type="text" class="form-control" name="pro" id="pro" value="<?=$article1['promo']?>" placeholder="1 or 0" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Quantite</label></strong>
            <input type="text" class="form-control" name="qte" id="qte" value="<?=$article1['qte']?>" placeholder="100" style="max-width: 33vw; max-height: 50vw;" required></br>
            <button class="btn btn-success" type="submit" name="ok">modifier</button>
        </form> 

 
<?php
if(isset($_POST['ok']))
{
    $ref=htmlspecialchars($_POST['ref']);
    $lib=htmlspecialchars($_POST['lib']);
    $prix=htmlspecialchars($_POST['pr']);
    $des=htmlspecialchars($_POST['des']);  
    $photo=htmlspecialchars($_POST['ph']);
    $promo=htmlspecialchars($_POST['pro']);
    $qte=htmlspecialchars($_POST['qte']);
    require_once "connexion.php";
    $sql="UPDATE  product SET prix=$prix,photo='$photo',des='$des',promo=$promo,qte=$qte where ref=$ref";
    $res=$cnx->exec($sql);
    if ($res)
    {
        header("location:gestion_article.php");
    }
    else
    echo "probléme de modification";
}
?>
</div>
</div>
</div>
</body>
</html>
