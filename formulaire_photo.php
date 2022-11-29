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
            <form action="./insert_projet.php" method="post" enctype="multipart/form-data">
                <h1>Formulaire de participation</h1>
                <!--Conteneur du formulaire-->
                <!--Titre de réalisation-->
                    <div id="titre">
                        <label for="titre">Titre </label> <br>
                        <input type="text" name="titre" id="titre" placeholder="Veuillez écrire le titre de votre réalisation" patern="^[\w\s\W]{5,50}$" require>
                    </div>
                    <!--Description de réalisation-->
                    <div id="description">
                        <label for="description">Description </label><br>
                        <textarea id="description" name="description" rows="6" placeholder="Veuillez écrire la description de votre réalisation" patern="^[\w\s\W]{10,1000}$" require></textarea>
                    </div>
                    <!--Date de début de réalisation-->
                    <div id="debut">
                        <label for="debut">Début de la réalisation </label> 
                        <input type="date" name="debut" id="debut">
                    </div>
                    <!--Date de fin de réalisation-->
                    <div id="fin">
                        <label for="fin">Fin de la réalisation </label> 
                        <input type="date" name="fin" id="fin">
                    </div>
                    <!--Photo à transmettre-->
                    <div id="photo">
                        <label for="fileUpload">Photo </label> 
                        <input type="file" id="fileUpload" name="photo" accept="image/png, image/jpeg" required/> 
                    </div>    
                    <div id="infos"> 
                        <p><strong>Attention</strong> : Le fichier ne doit pas dépasser 10 Mo.</p>
                    </div>
                    <!--Date de participation-->
                    <div id="date">
                        <p> Participation le
                        <!--JavaScript-->
                        <script> 
                        date = new Date().toLocaleDateString();
                        document.write(date);
                        </script> </p>
                    </div>
                    <!--Bouton pour envoyer le formulaire-->
                        <div id="bouton" class="bouton">
                        <input type="submit" value="Valider !">
                </div>
            </form>
        </div>
    </body>
    <script src="./poids_photo.js"></script>
</html>


