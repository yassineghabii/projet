<?php
session_start();
session_unset();
session_destroy();
//header("location:authen.php?etat=2");
header("location:findall.html.php?etat=2");
?>