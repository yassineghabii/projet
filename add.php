<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>otomAdmin/Ajouter produit</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="otom.png" width=50  height=50 alt="/">
  <a class="navbar-brand" href="#">otomAdmin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="gestion_article.php">Gestion des articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Stastique des ventes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Gestion des stocks</a>
      </li>

    </ul>
</nav>

<div class="jumbotron">
  <h3 class="display-4">Ajouter un produit</h3>
  <hr class="my-4">
  <div class="card" style="max-width: 35vw;">
    <div class="card-body">
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="Post">
            <strong><label class="col-form-label" for="ref">Reference</label></strong>
            <input type="text" class="form-control" placeholder="e.g. 1" name="ref" id="ref" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Libelle</label></strong>
            <input type="text" class="form-control" name="lib" id="lib" placeholder="Bavette" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Prix</label></strong>
            <input type="text" class="form-control" name="pr" id="pr" placeholder="26" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Description</label></strong>
            <input type="text" class="form-control" name="des" id="des" placeholder="Complement alimentaire" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Image</label></strong>
            <input type="text" class="form-control" name="ph" id="ph" placeholder="image url" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Promo</label></strong>
            <input type="text" class="form-control" name="pro" id="pro" placeholder="1 or 0" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Quantite</label></strong>
            <input type="text" class="form-control" name="qte" id="qte" placeholder="100" style="max-width: 33vw; max-height: 50vw;" required></br>
            <button class="btn btn-success" type="submit" name="ok">Ajouter</button>
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
    require_once"connexion.php";
    $sql="insert into product values('$ref','$lib',$prix,'$des','$photo','$promo','$qte')";
    $res=$cnx->exec($sql);
    if ($res)
    {
        header("location:gestion_article.php");
    }
    else
    echo "Problème d'ajout";
}
?>
</div>
  </div>
</div>
</body>
</html>