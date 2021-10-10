<?php

function getFilm() {
    try {

        $PDO = connectDB();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $STATEMENT = $PDO->prepare("SELECT * FROM movies");

        $STATEMENT->execute();

        $movies_list = $STATEMENT->fetchAll();

        if (!empty($_GET)) {
            $id = $_GET["id"];
            $statement = $PDO->prepare("SELECT * FROM movies WHERE id = :id");

            $statement->execute(
                [
                    'id' => $id
                ]
            );

            $movies = $statement->fetch();
        }
        else {
            $statement = $PDO->prepare("SELECT * FROM movies WHERE id = :id");

            $statement->execute(
                [
                    'id' => 1
                ]
            );

            $movies = $statement->fetch();
        }

    } catch (Exception $e) {

        echo 'Error : ', $e->getMessage();
        die();

    }
}

function getActors() {
    try {

        $PDO = connectDB();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $STATEMENT = $PDO->prepare("SELECT * FROM actors");

        $STATEMENT->execute();

        $actors_list = $STATEMENT->fetchAll();

        if (!empty($_GET)) {
            $id = $_GET["id"];
            $statement = $PDO->prepare("SELECT * FROM actors WHERE id = :id");

            $statement->execute(
                [
                    'id' => $id
                ]
            );

            $actors = $statement->fetch();
        }
        else {
            $statement = $PDO->prepare("SELECT * FROM movies WHERE id = :id");

            $statement->execute(
                [
                    'id' => 1
                ]
            );

            $actors = $statement->fetch();
        }

    } catch (Exception $e) {

        echo 'Error : ', $e->getMessage();
        die();

    }
}