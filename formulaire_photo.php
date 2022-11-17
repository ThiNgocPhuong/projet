<!--
    ANTONOVA & SAM le 17/11/2022
    style.css
    CSS pour le formulaire du projet de Ged'Imagination
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
        <form>
            <h1>Formulaire</h1>
            <!--Conteneur du formulaire-->
            <div id="conteneur">
                <br>
                <br>
                <label for="titre">Titre : </label> <br>
                <input type="text"  id="titre">
                <br>
                <label for="Description">Description : </label> <br>
                <input type="text"  id="Description" maxlength="2000">
                <br>
                <label for="realisationD">Début de la réalisation : </label> <br>
                <input type="date"  id="realisationD">
                <br>
                <label for="realisationF">Fin de la réalisation : </label> <br>
                <input type="date" id="realisationF">
                <br>
                <label for="Photo">Photo : </label> <br>
                <input type="file" id="Photo" accept="image/png, image/jpeg">
                <div>
                    <p> Date de participation :
                    <script>
                    date = new Date().toLocaleDateString();
                    document.write(date);
                    </script>
                </div>
                <br>
                <input type="button" value="Valider !">
            </div>
        </form>
    </body>
</html>
