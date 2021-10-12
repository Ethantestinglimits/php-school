<!DOCTYPE html>
<html lang="fr">

<head>

    <title>Projet Film</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no,  -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./views/styles/styles.css">

</head>

<body>

<nav>
    <div class="left">
        <a href="."><h1>ByeCiné!</h1></a>
    </div>
    <div class="right">
        <a class="nav-movie" href="./views/pages/movie.php">Films</a>
        <a class="nav-actors" href="./views/pages/actor.php">Acteurs</a>
    </div>
</nav>

<div class="home">
    Dites bye bye à AlloCiné et venez vous cultiver cinématographiquement dès maintenant sur <h2>ByeCiné!</h2>
</div>
<div class="home">

    <div class="container">
        <?php

        require_once "src/includes.php";
        require_once "src/config.php";

        $PDO = connectDB();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $films = getFilms($PDO);
        $rand_keys = array_rand($films, 3);

        foreach ($rand_keys as $rand_key) {
            $movie = $films[$rand_key];
            echo '<div class="card">' . '<img alt="Affiche film" src="' . $movie['image'] . '"> <h1>' . $movie['nom'] . '</h1>' . '</div>';
        }
        ?>
    </div>

</div>

</body>
</html>

