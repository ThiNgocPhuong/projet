<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css">
        <title>Inscription</title>
    </head>
    <body>
        <div id="conteneur">
            <form action="new_utilisateur.php" method="post" enctype="multipart/form-data">
                <h1>Inscription</h1>
                <div id="nom">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom"  placeholder="Veuillez saisir votre nom" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" require>
                </div>
                <div id="nom">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom"  placeholder="Veuillez saisir votre prénom" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" require>
                </div>
                <div id="email">
                    <label for="email">Adresse Mail</label>
                    <input type="text" name="email" id="email" placeholder="Veuillez saisir votre adresse mail" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
                </div>
                <div id="mdp">
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" placeholder="Veuillez saisir votre mot de passe" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{12,}$" required>
                </div>
                <div id="bouton" class="bouton">
                    <input type="submit" value="Inscription !">
                </div>
            </form>
        </div>
    </body>
</html>

yyyyuyy@gmail.com
Yyyyuyy@gmail.com9*