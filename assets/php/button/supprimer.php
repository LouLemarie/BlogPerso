<?php

    if(isset($_SESSION['pseudo'])) {
        // Ouverture de la bdd
        $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

        // On effectue une requète
        $req = $bdd->query('
            SELECT t_users.T_ROLES_ID_ROLE,t_roles.ID_ROLE
            FROM t_users
            INNER JOIN t_roles ON t_users.T_ROLES_ID_ROLE=t_roles.ID_ROLE
            WHERE t_users.pseudo = $_SESSION[\'pseudo\']
        ');

        // On lance la requète
        $data = $req->fetch();

        // On test si l'id rôle est bon
        if($data >= 2) {
            echo '<button class="btn btn-5">SUPPRIMER</button>';
        }
    }

