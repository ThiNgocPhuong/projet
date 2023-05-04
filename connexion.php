<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>Connexion</title>
    </head>
    <body>
        <div id="conteneur">
            <h1>Connexion</h1>
            <div id="identifiant">
                <label for="identifiant"> Identifiant</label>
                <input type="text" name="identifiant" id="identifiant" placeholder="Veuillez saisir votre identifiant" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" required>
            </div>
            <div id="mdp">
                <label for="mdp">Mot de passe</label>
                <input type="text" name="mdp" id="mdp" placeholder="Veuillez saisir votre mot de passe" pattern="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/" required>
            </div>
            <div id="bouton" class="bouton">
                <input type="submit" value="Connexion !">
            </div>
        </div>
    </body>
</html>