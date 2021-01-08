<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>otomContact</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<img src="otom.png" width=50  height=50 alt="/">
  <a class="navbar-brand" href="#">otomContact</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
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
        <a class="nav-link active" href="contact.php">Contact</a>
      </li>

    </ul>
</nav>

<div class="jumbotron">
  <h3 class="display-4">Veuillez remplir le formulaire</h3>
  <hr class="my-4">
  <div class="card" style="max-width: 35vw;">
    <div class="card-body">
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="Post">
            <strong><label class="col-form-label" for="ref">Nom</label></strong>
            <input type="text" class="form-control"  name="nom" id="nom" placeholder="Gharbi" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Email</label></strong>
            <input type="text" class="form-control" name="email" id="email" placeholder="votreIDmail@domaine.com" style="max-width: 33vw; max-height: 50vw;" required></br>
            <strong><label for="lib">Message</label></strong>
            <input type="text" class="form-control" name="message" id="message" placeholder="très très bien" style="max-width: 33vw; max-height: 50vw;" required></br>
            <button class="btn btn-success" type="submit" name="ok">Envoyer</button>
            
        </form> 
<?php
if(isset($_POST['ok']))
{
    $nom=htmlspecialchars($_POST['nom']);
    $email=htmlspecialchars($_POST['email']);
    $message=htmlspecialchars($_POST['message']);
    
    require_once"connexion.php";
    $sql="insert into contact values('$nom','$email','$message')";
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