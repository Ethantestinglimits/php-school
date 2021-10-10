<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Films</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no,  -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>


<body>

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
                Titre : ' . $film['nom'] . '<br>
                Année de sortie : ' . $film['annee'] . '<br>
                Score : ' . $film['score'] . '<br>
                Nombre de votants : ' . $film['nbVotants'] . '<br>
                Acteurs : ' . implode(', ',  array_map(function($acteur) {
                    return $acteur['prenom'] . ' ' . $acteur['nom'];
                }, $acteurs)) . ' 
            </li>';
        }

        ?>
    </ul>
</div>

</body>
</html>

