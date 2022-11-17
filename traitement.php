<!--
    ANTONOVA & SAM le 17/11/2022
    traitement.php
    HTML/PHP pour le formulaire du projet de Ged'Imagination
-->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire</title>
    </head>
    <body>
        <?php
       
       //Création de variable
       $titre="";
       $description="";
       $debut="";
       $fin="";

       //// Récupération du titre & Test si validation form
       if(isset($_POST['titre']) && $_POST['titre'] > '')
       {
           $titre=$_POST['titre'];
           if(isset($_POST['description']))
           $description=$_POST['description'];
           if(isset($_POST['debut']))
           $debut=$_POST['debut'];
           if(isset($_POST['fin']))
           $fin=$_POST['fin'];
       }
       ?>
       
       <div id="conteneur01">
            <p><strong>Titre :</strong> <?php echo $titre; ?></p>
            <p><strong>Description:</strong> <?php echo $description; ?></p>
            <p><strong>Début de la réalisation :</strong> <?php echo $debut; ?></p>
            <p><strong>Fin de la réalisation :</strong> <?php echo $fin; ?></p>
        </div>
    </body>

<html>
