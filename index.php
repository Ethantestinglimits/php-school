<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Projet Film</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no,  -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>


<body>

<div>
    <ul>
        <?php

        require_once "./src/includes.php";

        $PDO = connectDB();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        ?>
    </ul>
</div>

</body>
</html>

