<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Films</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no,  -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">


</head>


<body>

<nav>
    <nav>
        <div class="left">
            <a href="../../index.php"><h1>ByeCiné!</h1></a>
        </div>
        <div class="right">
            <a class="nav-movie" href="./movie.php">Films</a>
            <a class="nav-actors" href="./actor.php">Acteurs</a>
        </div>
    </nav>
</nav>

<div>
    <ul>
        <?php

        require_once "../../src/includes.php";
        require_once "../../src/config.php";

        $PDO = connectDB();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $acteurs = getActeurs($PDO);

        foreach ($acteurs as $key => $acteur) {

            $films = getFilmsByActeur($PDO, $acteur['id']);

            echo '<li>
                <strong>Nom :</strong> ' . $acteur['nom'] . '<br>
                <strong>Prénom :</strong> ' . $acteur['prenom'] . '<br>
                <strong>Films :</strong> ' . implode(', ',  array_map(static function($film) {
                    return $film['nom'] . ' ' . $film['annee'] . ' ' . $film['score'];
                }, $films)) . ' 
            </li>';
        }

        ?>
    </ul>

    <a href="./update_actor.php" class="add">
        Ajouter
    </a>
</div>

</body>
</html>

