<!--
Here, we write code for registration.
-->
<?php
require_once('connexion.php');
$nom = $prenom = $login = $sexe = $tel = $adresse = $mail = $mdp = '';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$sexe = $_POST['sexe'];
$tel = $_POST['tel'];
$adresse = $_POST['adresse'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$mdp = MD5($mdp) ;

if (isset($_POST['signup'])) {
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
        $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
        $mail = mysqli_real_escape_string($conn, $_POST['mail']);
        $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);
        if (!preg_match("/^[a-zA-Z ]+$/",$nom)) {
            $name_error = "Name must contain only alphabets and space";
        }
         if (!preg_match("/^[a-zA-Z ]+$/",$prenom)) {
            $name_error = "Name must contain only alphabets and space";
        }
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)) {
            $mail_error = "Please Enter Valid Email ID";
        }
        if(strlen($mdp) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }
         
        if (!$error) {
            if(mysqli_query($conn, "INSERT INTO `clients`(`nom`, `prenom` , `sexe`, `mail`, `mdp`) VALUES ('$nom','$prenom','$sexe','$mail','$mdp)")) {
             header("location: login.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }

$sql = "INSERT INTO clients (nom,prenom,sexe,mail,mdp) VALUES ('$nom','$prenom','$sexe','$mail','$mdp')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: login.php");
}
else
{
	echo "Error :".$sql;
}
?>