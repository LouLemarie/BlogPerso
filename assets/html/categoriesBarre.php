<?php

    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $req = $bdd->query('SELECT * FROM t_categories');


    echo '<ul>';

    while($categorie = $req->fetch()) {

        echo '<a>
                    <li class="col-sm-2 col-xs-12 btn-categorie">'.$categorie['categorie'].'</li>
              </a>';

    }

     echo '</ul>
';

?>

