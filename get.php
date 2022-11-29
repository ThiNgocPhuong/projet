<?php

    //connexion à la base de données
    $user = 'Participation';
    $password = 'C0nc0urs';

    $email="oble@gmail.com";

    try

    {
        $objetPDO = new PDO ('mysql:host=localhost;dbname=gedimagination', $user, $password);

        //préparation de la reqête SELECT
        $pdoStat = $objetPDO->prepare('SELECT count(id_realisation) as "nb_mail" from Realisation where email= :email_participant' );
        $pdoStat->bindValue(":email_participant",$email,PDO::PARAM_STR);
        $pdoStat->execute();
        $res = $pdoStat->fetch(PDO::FETCH_ASSOC);

        /*$requestU = $objetPDO->prepare('INSERT INTO ( email ) VALUES (:email_participant)');
        $requestU->bindValue(':email_participant',$email,PDO::PARAM_STR);
        $requestU->execute();*/

        //éxécution
        
        if($res["nb_mail"] == 0)
        {
        header('location: formulaire_photo.php');
        }
        else
        {
            $message = "Vous avez déjà participé !";
        }
    }
    catch (PDOException $e)
    {
        print "Erreur:" . $e->getMessage() . "<br/>";
        die;
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="style_insert.css" rel="stylesheet" type="text/css">
    <title>Validation du formulaire</title>
</head>
<body>
    <div id="affichage">
        <!-- Affiche le message de reussite ou echec -->
        <h1>ERREUR !</h1>
        <p><?php echo $message ?></p>
        <div id="bouton" class="bouton">
                <a href="participer_jeu.php" >
                    <button>Retour</button>
                </a>
        </div>
    </div>
</body>
</html>
