<?php
    //connextion à la database
    $user="root";
    $pass="";

    try
    {
        $objetPDO= new PDO('mysql:host=localhost;dbname=gedimagination', $user, $pass);

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
            $message = 'Votre formulaire a été validé.';
        }
        else
        {
            $message = 'L\'envoi de votre formulaire a échoué.';
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="style_insert.css" rel="stylesheet" type="text/css">
    <title>Validation du formulaire</title>
</head>
<body>
    <div id="affichage">
        <!-- Affiche le message de reussite ou echec -->
        <h1>Confirmation du formulaire</h1>
        <p><?php echo $message ?></p>
        <div id="bouton" class="bouton">
                <a href="formulaire_photo.php" >
                    <button>Retour</button>
                </a>
        </div>
    </div>
</body>
</html>

<!--JavaScript pour le poids de l'image-->
<script>
    var uploadField = document.getElementById("photo");

uploadField.onchange = function() {
    if(this.files[0].size > 10485760){  // sa vaut 10 Mo
       alert("Le fichier est trop volumineux!");
       this.value = "";
    };
};
</script>
