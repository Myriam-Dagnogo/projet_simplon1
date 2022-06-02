<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["pseudo"])){
		header("Location: connection.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?>!</h1>
		<p>C'est votre espace utilisateur.</p>
		<a href="deconnexion.php">Déconnexion</a>
		</div>
	</body>
</html>