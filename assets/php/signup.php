<?php
    session_start();

    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    if(isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['mdp'])) {
        if(!testExist('email') && !testExist('pseudo')) {
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $req = $bdd->prepare('INSERT INTO t_users(pseudo, email, mdp, T_ROLES_ID_ROLE) VALUES(:pseudo, :email, :mdp, :role)');
                $req->execute(array(
                    'pseudo' => $_POST['pseudo'],
                    'email' => $_POST['email'],
                    'mdp' => $_POST['mdp'],
                    'role' => 1,
                ));
            }
        } else {
            echo 'Pseudo ou email déjà utilisé';
        }
    }


    header('Location: ./main.php');






    // FUNCTION TESTEXIST()

    function testExist($var) {
        $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
        $requete = $bdd->query('SELECT * FROM t_users');
        $test = false;

        while($user = $requete->fetch()) {
            if($user[$var] == $_POST[$var]) {
                $test = true;
            }
        }

        return $test;
    }