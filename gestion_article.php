<?php
session_start();
if(isset($_SESSION['log'])&& $_SESSION['log']==="admin")
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>otomAdmin/Gestion des articles</title>
</head>
<body>

<?php
   require_once "connexion.php";
   $sql="select * from product ";
   $res=$cnx->query($sql);
   $article=$res->fetchAll(PDO::FETCH_NUM);
   
   ?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <img src="otom.png" width=50  height=50 alt="/">
  <a class="navbar-brand" href="#">otomAdmin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="gestion_article.php">Gestion des articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/projet/moussa/back/index.php">Gestion des laboratoires</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/projet/projet/back/views/quiz.php">Gestion des quizs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/projet/proj/php/clients.php">Gestion des clients</a>
      </li>

    </ul>
      <form class="form-inline my-2 my-lg-0" method="post">
    <a href="logout.php" class="btn btn-outline-secondary">déconnexion</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
</div>
</nav>

<div class="jumbotron">
  <h1 class="display-3">Bienvenue  <?=$_SESSION['log'];?></h1>
  <a href="add.php" class="btn btn-outline-success" style="text-align:center;">ajouter</a></h1>
  <hr class="my-4">
  <table class="table table-hover">
  <thead>
 <tr class="table-success">
      <th scope="row" rowspan="1"><strong></strong>Reference</strong></th>
      <td><strong>libelle</strong></td>
      <td><strong>prix</strong></td>
      <td><strong>image</strong></td>
      <td colspan="12"><strong>action</strong></th>
      <?php
    foreach ($article as  $article) {?>
        <tr >
        <td><strong><?=$article[0]?></strong></td>
        <td><strong><?=$article[1]?></strong></td>
        <td><strong><?=$article[2]?> Dt</strong></td>
        <td><img src="<?=$article[4]?>" alt="im" style="max-width: 30vw; max-height: 10vw;"></td>
        
        <td>
        <a href="modifier.php?ref1=<?=$article[0]?>"class="btn btn-outline-info"><strong>Modifier</strong></a>
        </td>
        <td>
            
        
         <a href="delete.php?ref=<?=$article[0]?>"class="btn btn-outline-danger"><strong>Supprimer</strong></a>
        </td>
        </tr>
    <?php }?>
    </tr>
    </tbody>
    
    </table>
    </body>
</html>
<?php }
else
header("location:authen.php?etat=1");
?>
    
    




   
      
