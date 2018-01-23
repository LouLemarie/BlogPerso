<?php
    session_start();

    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $req = $bdd->query('SELECT * FROM t_users');

    while($user = $req->fetch()) {

        if(($user['email'] || $user['pseudo']  == $_POST['email']) && $user['mdp'] == $_POST['mdp']) {
            $_SESSION['login'] = true;
            $_SESSION['pseudo'] = $user['pseudo'];
        }
    }


    header('Location: ./main.php');




