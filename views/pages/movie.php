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
        <div class="left">
            <a href="../../index.php"><h1>ByeCiné!</h1></a>
        </div>
        <div class="right">
            <a class="nav-movie" href="./movie.php">Films</a>
            <a class="nav-actors" href="./actor.php">Acteurs</a>
        </div>
    </nav>

<div>
    <ul>
        <?php

        require_once "../../src/includes.php";
        require_once "../../src/config.php";

        $PDO = connectDB();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $films = getFilms($PDO);

        foreach ($films as $key => $film) {

            $acteurs = getActeursByFilm($PDO, $film['id']);

            echo '<li>
                <div class="movie-name">' . $film['nom'] . '</div>
                <strong>Année de sortie :</strong> ' . $film['annee'] . '<br>
                <strong>Score :</strong> ' . $film['score'] . '<br>
                <strong>Nombre de votants :</strong> ' . $film['nbVotants'] . '<br>
                <details class="collapse">
                    <summary class="title">Acteurs</summary>
                    <ul class="description">
                    ' . implode('',  array_map(static function($acteur) {
                        return '<li class="collapsable-element">'. $acteur['prenom'] . ' ' . $acteur['nom'] . '</li>';
                    }, $acteurs)) . '
                    </ul>
                </details>
            </li>';
        }

        ?>
    </ul>

    <a href="./update_movie.php" class="add">
        Ajouter
    </a>

</div>

</body>
</html>

