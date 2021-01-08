<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>otomShop/payement</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="otom.png" width=50  height=50 alt="/">
  <a class="navbar-brand" href="#">otomShop</a>
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
</nav>

<div class="jumbotron">
  <h3 class="display-4">Veuillez remplir le formulaire de payement</h3>
  <hr class="my-4">
  <div class="card" style="max-width: 35vw;">
    <div class="card-body">
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="Post">
            <strong><label class="col-form-label" for="ref">CIN</label></strong>
            <input type="text" class="form-control"  name="CIN" id="CIN" placeholder="12345678" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Titulaire carte</label></strong>
            <input type="text" class="form-control" name="tit_carte" id="tit_carte" placeholder="yassine" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Numero carte</label></strong>
            <input type="text" class="form-control" name="num_carte" id="num_carte" placeholder="1234 1234 1234 1234" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Date d'expiration</label></strong>
            <input type="date" class="form-control" name="dateex" id="dateex" placeholder="26/07/2022" HD - Processeur Intel, Quad Core 1.84 Ghz - RAM 2 Go - Stockage 32 Go " style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">CVV</label></strong>
            <input type="text" class="form-control" name="cvv" id="cvv" placeholder="999" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Type carte</label></strong>
            <input type="text" class="form-control" name="type_carte" id="type_carte" placeholder="visa" style="max-width: 33vw; max-height: 50vw;" required></br>
            <button class="btn btn-success" type="submit" name="ok">Acheter</button>
        </form> 
<?php
if(isset($_POST['ok']))
{
    $CIN=htmlspecialchars($_POST['CIN']);
    $tit_carte=htmlspecialchars($_POST['tit_carte']);
    $num_carte=htmlspecialchars($_POST['num_carte']);
    $dateex=htmlspecialchars($_POST['dateex']);  
    $cvv=htmlspecialchars($_POST['cvv']);
    $type_carte=htmlspecialchars($_POST['type_carte']);
    require_once"connexion.php";
    $sql="insert into payement values('$CIN','$tit_carte',$num_carte,'$dateex','$cvv','$type_carte')";
    $res=$cnx->exec($sql);
    if ($res)
    {
        header("location:accueil.php");
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