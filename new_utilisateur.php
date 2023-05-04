<?php
    include 'db.inc.projet.php';

    $mes="";

    try{
        $objPDO=new PDO('mysql:dbname='.BDD.';host='.HOST.';port='.PORT,LOGIN,PASSW);

        $request = $objPDO->prepare('INSERT INTO Utilisateur ( nom, prenom, email, mdp) 
        Values (:nom, :prenom, :email, :mdp)');

        $request->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $request->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $request->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $pass= password_hash($_POST['mdp'],PASSWORD_DEFAULT);
        $request->bindValue(':mdp', $pass, PDO::PARAM_STR);

        $insertValid = $request->execute();

        if($insertValid){
            $mes = 'Votre inscription a bien été prise en compte.';
        }
        else{
            $mes = 'Votre inscription n\'a pas été prise en compte.';
        }
    }catch(PDOException $e){

        print "Erreur : ".$e->getMessage()."<br/>";
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style_insert.css" rel="stylesheet" type="text/css">
        <title>Inscription</title>
    </head>
    <body>
        <div id="affichage">
            <!-- Affiche le message de reussite ou echec -->
            <h1>Confirmation de l'inscription</h1>
            <!-- Affichage des messages appelés -->
            <p><?php echo $mes;  echo $pass;?></p>
            <!-- Bouton qui retourne vers la page du formulaire -->
            <div id="bouton" class="bouton">
                    <a href="formulaire_photo.php" >
                        <button>Participer</button>
                    </a>
            </div>
        </div>
    </body>
</html>
