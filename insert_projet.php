<!--
    ANTONOVA & SAM le 17/11/2022
    style.css
    CSS pour la participation au jeu du projet de Ged'Imagination
-->

<?php
    //connexion à la database
    $user="root";
    $pass="";

    //variable message - pour l'afficher
    $mes="";

    //Vérification si le formulaire a été soumis
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Vérification du fichier s'il a été upload sans erreurs
        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"]==0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];

            //Vérification de l'extension de la photo
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext,$allowed)) die("Erreur : Veuillez séléctionner un format de fichier valide.");

            //Vérification de la taille de la photo (max 10Mo)
            $maxsize = 9 * 2048 * 1536;
            if($filesize > $maxsize) die("Error : La taille du fichier est supérieure à la taille autorisée.");

            $exten=substr($filetype,6);
            $filename=uniqid();
            $nom_fichier=$filename .".". $exten;

            //Vérification du type - MIME de la photo
            if(in_array($filetype, $allowed)){
                //Vérification de l'existense de la photo avant de la télécharger
                if(file_exists("C:\laragon\www\projet\photos/" . $_FILES["photo"]["name"])){
                    echo $_FILES["photo"]["name"] . " existe déjà.";
                    }
                    else {
                        move_uploaded_file($_FILES["photo"]["tmp_name"], "C:\laragon\www\Ged/photos/" . "{$nom_fichier}");
                        $mes="Votre image a été télérchagée avec succès.";
                    }
            } else {
                echo "Error: Il y a eu un problème de téléchargement de votre image. Veuillez réesayer!";
            }
        } else {
            echo "Error: " . $_FILES["photo"]["error"];
        }
    }

    try
    {
        $objetPDO= new PDO('mysql:host=localhost;dbname=gedimagination', $user, $pass);

        //préparation de la requête
        $requete=$objetPDO->prepare('INSERT INTO Realisation ( titre_realisation,description_realisation, date_debut_realisation, date_fin_realisation, date_participation, photo)  VALUES ( :titre, :description, :debut, :fin, :date, :chemin)');

        //liaison de chaque valeur
        $requete->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
        $requete->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $requete->bindValue(':debut', $_POST['debut'], PDO::PARAM_STR);
        $requete->bindValue(':fin', $_POST['fin'], PDO::PARAM_STR);
        $requete->bindValue(':date', date("Y-m-d"));  
        $requete->bindValue(':chemin','\www\Ged\photos\\' .$nom_fichier, PDO::PARAM_STR);

        //exécution de la requette préparer
        $insertValid = $requete->execute();

        if($insertValid)
        {
            $message = 'Votre formulaire a été validé.';
        }
        else
        {
            $message = 'L\'envoi de votre formulaire a échoué.';
        }
    }
    catch (PDOException $a)
    {
        print "Erreur : ".$a->getMessage()."<br/>";
        die;
    }

?>

<!-- La page qui s'affiche une fois qu'on a validé le formulaire -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="style_insert.css" rel="stylesheet" type="text/css">
    <title>Validation du formulaire</title>
</head>
<body>
    <div id="affichage">
        <!-- Affiche le message de reussite ou echec -->
        <h1>Confirmation du formulaire</h1>
        <!-- Affichage des messages appelés -->
        <p><?php echo $mes ?> <br> <br> <?php echo $message ?> </p>
        <!-- Bouton qui retourne vers la page du formulaire -->
        <div id="bouton" class="bouton">
                <a href="formulaire_photo.php" >
                    <button>Retour</button>
                </a>
        </div>
    </div>
</body>
</html>
