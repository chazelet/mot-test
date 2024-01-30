<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// Assurez-vous de mettre les informations de connexion correctes
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mot_mystere_Adeline";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

    //Connexion et vérification

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Ici, la requête SQL est correctement intégrée dans le script PHP
    $sql = "SELECT world FROM mystery_world WHERE id_mystery_world = 1 ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mystery_word = $row["world"]; // Assignation du mot mystère à la variable
    } else {
        $mystery_word = "Mot mystère non trouvé.";
        }

    $conn->close();

?>

<p> Vous êtes les meilleurs =) : <?php echo $mystery_word; ?></p>


    <br>

    <a href="./update_profile.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Modification du profile</a>
    
</body>
</html>