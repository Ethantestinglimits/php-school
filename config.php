<?php
function connectDB() {
    $host = '';
    $user = '';
    $db = '';
    $pwd = '';
    try {
        $PDO = new PDO('mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8', $user, $pwd);

        return $PDO;

    } catch (Exception $e) {

        exit('Error :' . $e->getMessage());
    }
}

if (isset($_POST['nom'])) {

    $bdd = connectDB();
    $query = $bdd->prepare('INSERT INTO movie (name, year, score,nbVotants) VALUES(:name,:year,:score,:nbVotants)');
    $query->execute(array('name' => $_POST['name'], 'score' => (float)$_POST['score'], 'year' => (int)$_POST['year'], 'nbVotants' => (int)$_POST['votant']));
    // print_r($query->errorInfo());
}

