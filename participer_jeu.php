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
        <div id="participation">
            <h1>Allez y! <br> Faites nous voir votre réalisation.</h1>
            <div id="participer" class="bouton" >
                <a href="formulaire_photo.php"> 
                  <button id="bouton"> Participer Au Jeu </button> 
                </a>
            </div>
        </div>
    </body> 
    <script>
      var participe = document.getElementById("bouton")

        participe.onclick = function (){
        var debut= new Date(2023,1,09);
        var fin=new Date(2023,2,12);
        if(Date.now() < debut){
            alert("Le concours n'a pas encore commencer !");
        } else{
            if(Date.now() > fin)
            alert("Le concours est terminer !");
        }
        };
    </script>
</html>
