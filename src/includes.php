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

function getActeursByFilm ($PDO, $film_id): array {

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

        $acteurs[] = $stmt->fetch();
    }

    return $acteurs;
}


function getFilmsByActeur ($PDO, $acteur_id) {

    $stmt = $PDO->prepare("SELECT film_id FROM casting WHERE acteur_id = :acteur_id");
    $stmt->execute(array( ':acteur_id' => $acteur_id));
    $stmt->execute();
    $films_ids = $stmt->fetchAll();

    $films = array();

    foreach ($films_ids as $film_id) {

        $stmt = $PDO->prepare("SELECT * FROM film WHERE id = :film_id");
        $stmt->bindParam(':film_id', $film_id['film_id'], PDO::PARAM_INT);
        $stmt->execute();

        $films[] = $stmt->fetch();
    }

    return $films;
}