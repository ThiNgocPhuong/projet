<!--
    ANTONOVA & SAM le 17/11/2022
    formulaire_photo.fr
    HTML/PHP pour le formulaire du projet de Ged'Imagination
-->

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style_participer.css" rel="stylesheet" type="text/css">
        <title>Participation au jeu</title>
    </head>
    <body>
        <form action='get.php' method='POST'>
            <div id="participation">
                <h1>Allez-y! <br> Faites nous voir votre réalisation.</h1>
                <div id="participer" class="bouton" >
                    <a href="formulaire_photo.php"> 
                    <button id="bouton"> Participer au jeu </button> 
                    </a>
                </div>
                <script src="./patern_periode.js"></script>
            </div>
        </form>
        <form action='resultat.php'>
            <div id="classement" class="bouton">
                <a href="resultat.php">
                    <button id="btnClass"> Voir le classement </button> 
                </a>
            </div>
        </form>
    </body> 

</html>