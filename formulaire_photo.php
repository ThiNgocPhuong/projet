<!--
    ANTONOVA & SAM le 17/11/2022
    style.css
    HTML/PHP pour le formulaire du projet de Ged'Imagination
-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="stylephp.css" rel="stylesheet" type="text/css">
        <title>Formulaire</title>
    </head>
    <body>
        <div id="conteneur">
            <form action="traitement.php" method="post">
                <h1>Formulaire</h1>
                <!--Conteneur du formulaire-->
                    <div id="titre">
                        <label for="titre">Titre : </label> <br>
                        <input type="text" name="titre" id="titre">
                    </div>
                    <div id="description">
                        <label for="description">Description : </label><br>
                        <input type="text" name="description" id="description" maxlength="2000">
                    </div>
                    <div id="debut">
                        <label for="debut">Début de la réalisation : </label> <br>
                        <input type="date" name="debut" id="debut">
                    </div>
                    <div id="fin">
                        <label for="fin">Fin de la réalisation : </label> <br>
                        <input type="date" name="fin" id="fin">
                    </div>
                    <div id="photo">
                        <label for="Photo">Photo : </label> <br>
                        <input type="file" id="Photo" accept="image/png, image/jpeg">
                    </div>
                    <div>
                        <p> Date de participation : 
                        <script>
                        date = new Date().toLocaleDateString();
                        document.write(date);
                        </script> </p>
                    </div>
                        <div class="bouton">
                        <input type="submit" >
                </div>
            </form>
        </div>
    </body>
</html>
