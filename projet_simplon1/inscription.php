<?php
include "configuration.php";


if (isset($_POST ["envoyer"])){

    if(!empty($_POST['nom']) AND !empty($_POST['prenoms']) AND !empty($_POST['email']) AND !empty($_POST['pseudo']) AND !empty($_POST['password'])){  
        function validate($data){
           $data = trim($data);
            $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }
       
        $nom= validate($_POST['nom']);
        $prenom=validate($_POST['prenoms']);
        $mail=validate($_POST['email']);
        $pseudo=validate($_POST['pseudo']);
        $pass=validate($_POST['password']);
        
    
        $insert= $conn->prepare( "INSERT INTO utilisateurs(nom, prenom, email,pseudo,password) VALUES(?,?,?,?,?)");
        $insert->execute(array($nom, $prenom,$mail,$pseudo, $pass));
        header ("Location:");
       
        
if($insert){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='connection.php'>connecter</a></p>
			 </div>";
    }
    }
    
}
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="FormConnect mt-3">
    <div class="form-saisie ">
        <h1 class="form-text" class=" box-title" >ENREGISTREMENT</h1>
        <form method="POST" action="" class="box">
                 <span> Nom</span>
                 <input type="text" name="nom" class="box-input" >
                 <span> Prenom</span>
                 <input type="text" name="prenoms" class="box-input" >
                 <span> Email<span>
                 <input type="text" name="email" class="box-input">
                 <span> Pseudo</span>
                 <input type="text" name="pseudo" class="box-input" >
                 <span> Mot de passe</span>
                 <input type="password" class="box-input" name="password" placeholder="Entrer votre mot de passe ">
                
                 <input type="submit" class="box-input" name="envoyer" class="btnConnect" value="Connexion"  >
                
                 <p class="box-register">Déjà inscrit? <a href="connection.php">Connectez-vous ici</a></p>
</form>

         </div>
    </div>
</body>
</html>