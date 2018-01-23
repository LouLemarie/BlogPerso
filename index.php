<?php

    session_start();
    $_SESSION['host'] = 'mysql:host=localhost;dbname=nfactoryblog;charset=utf8';
    $_SESSION['ndcSQL'] = 'root';
    $_SESSION['mdpSQL'] = '';

    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $_SESSION['login'] = false;
    $_SESSION['pseudo'] = '';
    $_SESSION['roleId'] = '';


    header('Location: ./assets/php/main.php');
    
?>

