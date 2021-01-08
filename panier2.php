<?php session_start();
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

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
      if ($values["item_id"] == $_GET["id"]) {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="findall.php"</script>';
      }
    }
  }
  if ($_GET["action"] == "delete_cart") {


    unset($_SESSION["shopping_cart"]);
    echo '<script>alert("panier vide")</script>';
    echo '<script>window.location="panier2.php"</script>';
  }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>otomShop/Panier</title>
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
    <form >
    <a href="panier2.php" type="button" class="btn btn-info btn-lg">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <form class="form-inline my-2 my-lg-0" method="post">
      <a href="authen.php" class="btn btn-outline-secondary ">Connexion</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
    </form>
    </div>
    </nav> 
    <ol class="breadcrumb">
  <li class="breadcrumb-item "><a href="findall.html.php">Liste des produits</a></li>
  <li class="breadcrumb-item active"><a href="panier2.php">Panier</a></li>
</ol> 
    <table class="table table-bordered">
                  <tr>
                    <th width="40%">Nom du produit</th>
                    <th width="10%">Quantité</th>
                    <th width="20%">Prix</th>
                    <th width="15%">Total</th>
                    <th width="5%">Action</th>
                  </tr>
                  <?php
                  if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                  ?>
                      <tr>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><?php echo $values["item_quantity"]; ?></td>
                        <td><?php echo $values["item_price"]; ?> Dt</td>
                        <td><?php echo ($values["item_quantity"] * $values["item_price"]); ?> Dt</td>
                        <td><a href="findall.html.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="btn btn-danger">Enlever</a></td>
                      </tr>
                    <?php
                      $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                    <tr>
                      <td colspan="3" align="right">Total</td>
                      <td align="right"><?php echo ($total); ?> Dt</td>
                      <td></td>
                    </tr>
                    
                  <?php
                  }
                  ?>

                </table>
                <a href="payement.php" class="btn btn-success">Acheter</a>
                <a href="panier2.php?action=delete_cart" class="btn btn-danger">Vider Panier</a>
                
</body>

</html>
