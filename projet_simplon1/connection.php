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
    <?php require ("configuration.php"); session_start();
    

    if(isset($_POST['pseudo']) AND ($_POST['password'])){  
        function validate($data){
           $data = trim($data);
            $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }
       
        $pseudo=validate($_REQUEST['pseudo']);
        $pass=validate($_REQUEST['password']);
        
    
        $insert= $conn->prepare( "INSERT INTO utilisateurs(pseudo,password) VALUES(?,?)");
        $insert->execute(array($pseudo, $pass));
        
   
} else header('location: index.php');
   ?>
    <div class="FormConnect mt-3">
        <div class="form-saisie ">
            <h1 class="form-text" class="box-title">Connexion</h1>
            <form method="POST" class="box" action="index.php">
                <span> Pseudo</span>
                <input type="text" name="pseudo" class="box-input">
                <span> Mot de passe</span>
                <input type="password" name="password" placeholder="Entrer votre mot de passe " class="box-input">

                <input type="submit" name="envoyer" class="btnConnect box-button"" value=" Connexion">
                <p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
                <?php if (! empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p>
                <?php } ?>
            </form>
        </div>
    </div>
</body>
</html>