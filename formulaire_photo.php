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
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>Formulaire</title>
    </head>
    <body>
        <div id="conteneur">
            <form action="./insert_projet.php" method="post">
                <h1>Formulaire de participation</h1>
                <!--Conteneur du formulaire-->
                    <div id="titre">
                        <label for="titre">Titre </label> <br>
                        <input type="text" name="titre" id="titre" placeholder="Veuillez écrire le titre de votre réalisation" patern="^[\w\s\W]{5,50}$" require>
                    </div>
                    <div id="description">
                        <label for="description">Description </label><br>
                        <textarea id="description" name="description" rows="6" placeholder="Veuillez écrire la description de votre réalisation" patern="^[\w\s\W]{10,1000}$" require></textarea>
                    </div>
                    <div id="debut">
                        <label for="debut">Début de la réalisation </label> 
                        <input type="date" name="debut" id="debut">
                    </div>
                    <div id="fin">
                        <label for="fin">Fin de la réalisation </label> 
                        <input type="date" name="fin" id="fin">
                    </div>
                    <div id="photo">
                        <label for="photo">Photo </label> 
                        <input type="file" id="photo" name="photo" accept="image/png, image/jpeg, image/gfifn, image/gif">
                    </div>
                    <div id="date">
                        <p> Participation le
                        <script>
                        date = new Date().toLocaleDateString();
                        document.write(date);
                        </script> </p>
                    </div>
                        <div id="bouton" class="bouton">
                        <input type="submit" value="Valider !">
                </div>
            </form>
        </div>
    </body>
</html>
