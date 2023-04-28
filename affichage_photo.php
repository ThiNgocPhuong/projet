<?php
$user = "Participation";
$pass = "C0nc0urs*";

$objetPDO = new PDO('mysql:host=localhost;dbname=gedimagination', $user, $pass);

$sql = "SELECT id_realisation, photo FROM Realisation";
$result = $objetPDO->prepare($sql);
$estValide = $result->execute();

if ($estValide) {
    // Récupération du lien de l'image
    $resultats = $result->fetchAll();
    foreach ($resultats as $row) {
        echo '<img src="' . $row['photo'] . '" alt="' . $row['id_realisation'] . '"/>';
    }
} else {
    echo "Aucun résultat trouvé";
}
?>
