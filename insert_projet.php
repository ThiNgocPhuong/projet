<?php
    //connextion à la database
    $user="Participant";
    $pass="C0nc0urs*";

    try
    {
        $objetPDO= new PDO('mysql:host=localhost;dbname=GEDIMAGINATION', $user, $pass);

        //préparation de la requête
        $requete=$objetPDO->prepare('INSERT INTO Realisation (photo, titre_realisation,description_realisation, date_debut_realisation, date_fin_realisation, date_participation)  VALUES (:photo, :titre, :description, :debut, :fin, :date)');

        //liaison de chaque valeur
        $requete->bindValue(':photo', $_POST['photo'], PDO::PARAM_STR);
        $requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
        $requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $requete->bindValue(':debut', $_POST['debut'], PDO::PARAM_STR);
        $requete->bindValue(':fin', $_POST['fin'], PDO::PARAM_STR);
        $requete->bindValue(':date', date("Y-m-d"));  

        //exécution de la requette préparer
        $insertValid = $requete->execute();

        if($insertValid)
        {
            $message = 'Votre formulaire a été valider .';
        }
        else
        {
            $message = 'L envoie de votre formulaire a échouer .';
        }
    }
    catch (PDOException $a)
    {
        print "Erreur : ".$a->getMessage()."<br/>";
        die;
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- affiche le message de reussite ou echec -->
    <h1>Insertion des contacts</h1>
    <p><?php echo $message ?></p>
    <a href="formulaire_photo.php">Retour</a>
</body>
</html>
