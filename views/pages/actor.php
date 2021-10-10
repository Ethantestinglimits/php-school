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

        $acteurs = getActeurs($PDO);

        foreach ($acteurs as $key => $acteur) {

            $films = getFilmsByActeur($PDO, $acteur['id']);

            echo '<li>
                Nom : ' . $acteur['nom'] . '<br>
                Prénom : ' . $acteur['prenom'] . '<br>
                Films : ' . implode(', ',  array_map(function($film) {
                    return $film['nom'] . ' ' . $film['annee'] . ' ' . $film['score'];
                }, $films)) . ' 
            </li>';
        }

        ?>
    </ul>
</div>

</body>
</html>

