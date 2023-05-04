<?php
    include 'db.inc.projet.php';

    $mes="";

    try{
        // Clé de chiffrement aléatoire
        $cleDeChiffrement = random_bytes(32);

        $objPDO=new PDO('mysql:dbname='.BDD.';host='.HOST.';port='.PORT,LOGIN,PASSW);

        $request = $objPDO->prepare('INSERT INTO Utilisateur ( nom, prenom, email, mdp) 
        Values (:nom, :prenom, :email, :mdp)');

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];

        $iv = random_bytes(openssl_cipher_iv_length('AES-256-CBC'));
        $crypNom=openssl_encrypt($nom, 'AES-256-CBC', $cleDeChiffrement, OPENSSL_RAW_DATA, $iv);
        $crypPrenom=openssl_encrypt($prenom, 'AES-256-CBC', $cleDeChiffrement, OPENSSL_RAW_DATA, $iv);
        $crypEmail=openssl_encrypt($prenom, 'AES-256-CBC', $cleDeChiffrement, OPENSSL_RAW_DATA, $iv);

        $request->bindValue(':nom',  $crypNom, PDO::PARAM_STR);
        $request->bindValue(':prenom', $crypPrenom, PDO::PARAM_STR);
        $request->bindValue(':email',  $crypEmail, PDO::PARAM_STR);
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
            <p><?php echo $mes;?></p>
            <!-- Bouton qui retourne vers la page du formulaire -->
            <div id="bouton" class="bouton">
                    <a href="formulaire_photo.php" >
                        <button>Participer</button>
                    </a>
            </div>
        </div>
    </body>
</html>