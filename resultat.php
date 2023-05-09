<!--
    ANTONOVA & SAM le 30/03/2023
    resultats.php
    HTML/PHP pour le formulaire du projet de Ged'Imagination
-->
<?php
    
    $servername = 'localhost';
    $user = 'Gestion';
    $password = 'Ger@ant2023';
    $dbname = "gedimagination";

    $conn = new PDO('mysql:dbname='.$dbname.';host='.$servername.';port=3306', $user,$password);


    //Requête SQL pour récuperer les données
    $result = $conn->prepare("SELECT titre_realisation, description_realisation, nbGaime, photo FROM Realisation ORDER BY nbGaime DESC ");
    

    $validRes = $result->execute();     
    

   

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link href="style_resultats.css" rel="stylesheet" type="text/css">
        <title>Classement</title>
    </head>
    <body>
        <div class = "conteneur">
            <h1>Classement</h1>
            <div id = "tableau">
            <?php
                //echo $validRes;
                //var_dump($result);
                if($tmp = $result->fetchAll() ){
                    
                //if ($result->num_rows > 0) {
                        echo "<table><thead><tr><th>Place</th><th>Titre</th><th>Description</th><th>Nombre de Gaimes</th><th>Photo</th></tr></thead><tbody>";
                        $i = 0;
                    //while($row = $result->fetch_assoc()) {
                        foreach($tmp as $row){
                        $i++;
                        echo "<tr><td>" . $i . "</td><td>" . $row["titre_realisation"] . "</td><td>" . $row["description_realisation"] . "</td><td>" . $row["nbGaime"] ."</td><td> <img src='" . $row['photo'] . "'/></td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "Aucun résultat trouvé.";
                }
                

            ?>
        </div>
    </body>
</html>
