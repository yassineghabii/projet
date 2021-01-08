<!--
Here, we write code for login.
-->
<?php
//session_start();
require_once('connexion.php');

$login = $mdp = '';
$login = $_POST['login'];
$mdp = $_POST['mdp'];
$mdp = MD5($mdp);
$sql = "SELECT * FROM clients WHERE login='$login' AND mdp='$mdp'";

if ($result = $conn->query($sql)) {
  if ($row = $result -> fetch_row()) {
    //printf ("%s (%s)\n", $row[0], $row[1]);

  		$id = $row[0];
        $login = $row[3];
        $mdp = $row[9];
		
		$_SESSION['id'] = $id;
		$_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        
		header("Location: accueil.php");
  }
  $result -> free_result();
}

$conn -> close();

/*$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	if($row = mysqli_fetch_assoc($result))	{
		$id = $row["ID"];
		$email = $row["Email"];
		
		$_SESSION['id'] = $id;
		$_SESSION['firstname'] = $row["firstname"];
		$_SESSION['Lastname'] = $row["lastname"];
		$_SESSION['gender'] = $gender;
		$_SESSION['email'] = $email;
	}
	$_SESSION["id"] = '123';
	header("Location: welcome.php");
}
else {  
        header("Location: Login.php?error=1");
    }*/
?>