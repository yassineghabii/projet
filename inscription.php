<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>otom/Inscription</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="otom.png" width=50  height=50 alt="/">
  <a class="navbar-brand" href="#">otom</a>
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
</nav>

<div class="jumbotron">
<form class="form-horizontal" action="controle_saisie_inscription.php" method="POST">
  <h3 class="display-4">Veuillez remplir le formulaire d'inscription</h3>
  <hr class="my-4">
  <div class="card" style="max-width: 35vw;">
    <div class="card-body">
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="Post">
            <strong><label class="col-form-label" for="ref">Nom</label></strong>
            <input type="text" class="form-control" placeholder="gharbi" name="nom" id="nom" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Prenom</label></strong>
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="yassine" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Login</label></strong>
            <input type="text" class="form-control" name="login" id="login" placeholder="atou" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Date de naissance</label></strong>
            <input type="date" class="form-control" name="daten" id="daten" placeholder="26/07/2000" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib"><b>Sexe</b>
                        <br>
                       Homme<input type="radio" class="form-control" name="sexe" value="homme" ><label for=""></label>
                       Femme<input type="radio" class="form-control" name="sexe" value="femme" ><label for=""></label>
                       </label></strong>
            
            <strong><label for="lib">Telephone</label></strong>
            <input type="tel" class="form-control" name="tel" id="tel" placeholder="xx-xxx-xxx" style="max-width: 33vw; max-height: 50vw;" pattern="[0-9]{2}-{0-9]{3}-{0-9]{3}" required></br>
            <strong><label for="lib">Adresse</label></strong>
            <input type="text" class="form-control" name="adresse" id="adresse" placeholder="la sokra" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Email</label></strong>
            <input type="email" class="form-control" name="mail" id="mail" placeholder="votreIDmail@domaine.com" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Mot de passe</label></strong>
            <input type="password" class="form-control" name="mdp" id="mdp" placeholder="abcABC123" style="max-width: 33vw; max-height: 50vw;" required></br>
            <button class="btn btn-success" type="submit" name="ok">S'inscrire</button>
        </form> 
<?php
if(isset($_POST['ok']))
{
    $nom=htmlspecialchars($_POST['nom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $login=htmlspecialchars($_POST['login']);
    $daten=htmlspecialchars($_POST['daten']);
    $sexe=htmlspecialchars($_POST['sexe']);  
    $tel=htmlspecialchars($_POST['tel']);
    $adresse=htmlspecialchars($_POST['adresse']);
    $mail=htmlspecialchars($_POST['mail']);
    $mdp=htmlspecialchars($_POST['mdp']);
    require_once"connexion.php";
    $sql="insert into clients values('$id','$nom','$prenom','$login',$daten,'$sexe','$tel','$adresse','$mail','$mdp')";
    $res=$cnx->exec($sql);
    if ($res)
    {
        header("location:authen.php");
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