<!DOCTYPE html>
<html>
<link href="styles.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <title>Ajout acteur</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no,  -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>

<nav>
    <div class="left">
        <a href="../../index.php"><h1>ByeCiné!</h1></a>
    </div>
    <div class="right">
        <a class="nav-movie" href="./movie.php">Films</a>
        <a class="nav-actors" href="./actor.php">Acteurs</a>
    </div>
</nav>

<form method="post" action="#">

    <input type="text" name="nom" id="nom" placeholder="Nom" required>

    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>

    <br>
    <button type="submit">Envoyer</button>

</form>

<br>
<br>

<h3>
    <?php

    if (!empty($_POST)) {

        require_once "../../src/includes.php";
        require_once "../../src/config.php";

        $PDO = connectDB();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Vérifier les données
        if (strlen($_POST['nom']) > 255) echo 'Le nom est trop long !';
        else if (strlen($_POST['prenom']) > 255) echo 'Le prénom est trop long';
        else {
            //ajout du film dans la base de données
            $sqlStmt = 'INSERT INTO acteur (nom, prenom) VALUES (:nom, :prenom)';
            $PDO->prepare($sqlStmt)->execute($_POST);

            echo '<div class="success-notif">Entrée ajoutée dans la base de donnée !</div>';
        }
    }
    ?>
</h3>

</body>
</html>
