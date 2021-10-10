<?php

function getFilms($PDO) {
    try {

        $STATEMENT = $PDO->prepare("SELECT * FROM film");
        $STATEMENT->execute();

        return $STATEMENT->fetchAll();

    } catch (Exception $e) {

        echo 'Error : ', $e->getMessage();
        die();
    }
}

function getActeurs($PDO) {
    try {

        $STATEMENT = $PDO->prepare("SELECT * FROM acteur");
        $STATEMENT->execute();

        return $STATEMENT->fetchAll();


    } catch (Exception $e) {

        echo 'Error : ', $e->getMessage();
        die();

    }
}

function getActeursByFilm ($PDO, $film_id) {

    $stmt = $PDO
        ->prepare('SELECT acteur_id FROM casting WHERE film_id = :film_id');
    $stmt->bindParam(':film_id', $film_id, PDO::PARAM_INT);
    $stmt->execute();
    $acteurs_ids = $stmt->fetchAll();
    $acteurs = array();

    foreach ($acteurs_ids as $acteur) {

        $stmt = $PDO->prepare("SELECT * FROM acteur WHERE id = :acteur_id");
        $stmt->bindParam(':acteur_id', $acteur['acteur_id'], PDO::PARAM_INT);
        $stmt->execute();

        array_push($acteurs, $stmt->fetch());
    }

    return $acteurs;
}


function getFilmsByActeur ($PDO, $acteur_id) {

    $films_ids = $PDO
        ->prepare("SELECT film_id FROM casting WHERE acteur_id = :acteur_id")
        ->execute(array( ':acteur_id' => $acteur_id))
        ->fetchAll();

    $films = array();

    foreach ($films_ids as $film_id) {

        $film = $PDO
            ->prepare("SELECT * FROM film WHERE id = :film_id")
            ->execute(array(':film_id' => $film_id))
            ->fetchAll();

        array_push($films, $film[0]);
    }

    return $films;
}