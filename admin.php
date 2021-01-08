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
    <title>Document</title>
</head>
<body>
<h2>Bienvenue. <?=$_SESSION['log'];?></h2>    
</body>
</html>
<?php }
else
header("location:authen.php?etat=1");
?>