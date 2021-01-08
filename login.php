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
<form action="verification.php" method="POST">
<div class="jumbotron">
<h1 class="display-3">Bienvenue dans notre boutique</h1>
  <p class="lead">Vous trouverez les meilleurs articles avec des prix imbattables</p>
  <hr class="my-4">
  <div class="card" style="max-width: 35vw;">
    <div class="card-body">
                
               <label class="col-form-label">Login</label>
                <input type="text" class="form-control" placeholder="Entrer le nom d'utilisateur" name="login" style="max-width: 33vw; max-height: 50vw;" required></br>

                <label>Mot de passe</label>
                <input type="password" class="form-control" placeholder="Entrer le mot de passe" name="mdp" style="max-width: 33vw; max-height: 50vw;" required></br>

                <input  class="btn btn-success" type="submit" id='submit' value='Login' ></br>
                <p>Vous n'avez pas encore de compte ? Cliquez <a class="nav-link" href="inscription.php">ici</a></p>
                

                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>
