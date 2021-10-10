<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Update/add Acteur</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no,  -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>

<body>

<form action="#" method="post">
    <p>Nom</p><input type="text" name="nom">
    <p>Prénom</p><input type="text"  name="prenom">
    <p>Films</p><input type="name"name="movie">
    <input type="submit" value="Valider">
</form>

</body>

</html>

<?php

if(isset($_POST['nom'])) {

    $PDO = connectDB();
    $STATEMENT = $PDO->prepare('INSERT INTO acteurs (nom, prenom, movie) VALUES (:nom, :prenom, :movie)');
    $STATEMENT->execute(array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'movie' => $_POST['movie']));
}