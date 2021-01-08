 <?php 
 session_start();
 if (isset($_GET['etat']))
 {
 $etat=$_GET['etat'];
  switch ($etat) {
      case 1:
          echo "<script>
          alert('vous devez vous connecter');
          </script>";
          
          break;
      case 2:
        echo "<script>
        alert('vous étes déconnecter');
        </script>";
      
      default :
      echo "<script>
      alert('login/mdp incorrect');
      </script>";
          break;
  }
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a class="nav-link" href="contact.php">Contact</a>
      </li>

    </ul>
    </nav>
    <
<div class="jumbotron">
  <h1 class="display-3">Bienvenue dans notre boutique</h1>
  <p class="lead">Vous trouverez les meilleurs articles avec des prix imbattables</p>
  <hr class="my-4">
  <div class="card" style="max-width: 33vw; max-height: 50vw;">
  <div class="card-body">
  <?php
if (isset($_POST['ok']))
{
$log=htmlspecialchars($_POST['log']);
$mdp=htmlspecialchars($_POST['pass']);
 /*if ($log==="user"&& $mdp==="user")
 {
     $_SESSION['log']=$log;
     $_SESSION['pass']=$mdp;
   header("location:user_page1.php");
 }*/
 if ($log==="admin" && $mdp==="admin123")
{
    $_SESSION['log']=$log;
    $_SESSION['pass']=$mdp;
    header("location:gestion_article.php");
}
else
 header("location:authen.php?etat=3");

}
?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="Post">
            <label class="col-form-label" for="log">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="log" id="log" style="max-width: 33vw; max-height: 50vw;" required>
            <label for="pass">Password</label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" style="max-width: 33vw; max-height: 50vw;" required></br>
            <button class="btn btn-success" type="submit" name="ok">Login</button>
</form>
</div>
</div>
</div>

    
</body>
</html>