<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "connexion.php";
    $ref=$_GET['ref'];
    $sql="delete from product where ref='$ref'";
    $res=$cnx->exec($sql);
    if ($res)
    {
        header("location:gestion_article.php");
    }
    else
    {
        echo "probléme de supression";
    }
    ?>
</body>
</html>