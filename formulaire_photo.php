<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire</title>
    </head>
    <body>
        <form>
            <h1>Formulaire</h1>
            <br>
            <label for="titre">Titre : </label>
            <input type="text" name="titre" id="titre">
            <br>
            <label for="Description">Description : </label>
            <input type="text"  id="Description" name="description" maxlength="2000">
            <br>
            <label for="debut">Début de la réalisation : </label>
            <input type="date" name="debut" id="debut">
            <br>
            <label for="fin">Fin de la réalisation : </label>
            <input type="date" name="fin" id="fin">
            <br>
            <label for="photo">Photo : </label>
            <input type="file" name="photo" id="photo" accept="image/png, image/jpeg">
            <br>
            <input type="button" value="Valider !">
        </form>

        <?php
        
        ?>
    </body>
</html>