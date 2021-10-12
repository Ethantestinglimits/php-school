<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout de films</title>
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

    <label for="nom"><input type="text" name="nom" id="nom" placeholder="Nom du film" required></label>

    <label for="annee"><input type="number" name="annee" id="annee" placeholder="Année de sortie"></label>

    <label for="score"><input type="number" name="score" id="score" placeholder="Score du film"></label>

    <label for="nbVotants"><input type="number" name="nbVotants" id="nbVotants" placeholder="Nombre de votants"></label>

    <label for="image"><input type="text" name="image" id="image" placeholder="Lien image du film"></label>

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
        if ($_POST['annee'] > 2050 || $_POST['annee'] < 1800) {
            echo 'L\'année n\'est pas valide !';
        }
        else if ($_POST['score'] < 0 || $_POST['score'] > 10) {
            echo 'Le score n\'est pas valide !';
        }
        else {
            //Vérifier si le film existe déjà dans la base de donnée
            $stmt = $PDO->prepare('SELECT * FROM film WHERE nom = :nom');
            $stmt->bindParam(':nom', $_POST['nom']);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result)
                //le film existe déjà
            {
                $sqlStmt = 'UPDATE film SET nom = :nom, annee = :annee, score = :score, nbVotants = :nbVotants WHERE id = ' . $result['id'];
            }
            else
                //il faut rajouter le film
            {
                $sqlStmt = 'INSERT INTO film (nom, annee, score, nbVotants) VALUES (:nom, :annee, :score, :nbVotants)';
            }

            $PDO->prepare($sqlStmt)->execute($_POST);

            echo '<div class="success-notif">Entrée ajoutée dans la base de donnée !</div>';
        }
    }
    ?>
</h3>

</body>
</html>
