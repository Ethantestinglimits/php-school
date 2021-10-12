<?php
function connectDB() {
    $host = 'localhost';
    $user = 'root';
    $db = 'iut_php';
    $pwd = '';
    try {
        return new PDO('mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8', $user, $pwd);
    } catch (Exception $e) { exit('Error :' . $e->getMessage()); }
}

