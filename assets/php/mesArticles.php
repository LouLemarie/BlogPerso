<?php
    /**
     * Created by PhpStorm.
     * User: Admin
     * Date: 19/01/2018
     * Time: 14:20
     */
    // Partie "Requête"
    $cnx = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '');

    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 5;


    $debut = ($page - 1) * $limite;
    /* Ne pas oublier d'adapter notre requête */
    $query = 'SELECT SQL_CALC_FOUND_ROWS * FROM `t_articles` WHERE ID_USER = '.$_SESSION['userId'].' ORDER BY dateHeure DESC LIMIT :limite OFFSET :debut';
    $query = $cnx->prepare($query);
    $query->bindValue('debut', $debut, PDO::PARAM_INT);
    $query->bindValue('limite', $limite, PDO::PARAM_INT);
    $query->execute();

    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
    $data = $bdd->query('SELECT * FROM t_articles WHERE ID_USER = '.$_SESSION['userId'].' ORDER BY idT_ARTICLES DESC');




        // AFFICHAGE DU MESSAGE

        afficherArticle();





    /* Ici on récupère le nombre d'éléments total. Comme c'est une requête, il ne
     * faut pas oublier qu'on ne récupère pas directement le nombre.
     * De plus, comme la requête ne contient aucune donnée client pour fonctionner,
     * on peut l'exécuter ainsi directement */
    $resultFoundRows = $cnx->query('SELECT found_rows()');
    /* On doit extraire le nombre du jeu de résultat */
    $nombredElementsTotal = $resultFoundRows->fetchColumn();


    // Partie "Liens"
    /* On calcule le nombre de pages */
    $nombreDePages = ceil($nombredElementsTotal / $limite);

    /* Si on est sur la première page, on n'a pas besoin d'afficher de lien
     * vers la précédente. On va donc l'afficher que si on est sur une autre
     * page que la première */
    if ($page > 1):
        ?><a href="?page=<?php echo $page - 1; ?>">Page précédente</a> — <?php
    endif;

    /* On va effectuer une boucle autant de fois que l'on a de pages */
    for ($i = 1; $i <= $nombreDePages; $i++):
        ?><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
    endfor;

    /* Avec le nombre total de pages, on peut aussi masquer le lien
     * vers la page suivante quand on est sur la dernière */
    if ($page < $nombreDePages):
        ?>— <a href="?page=<?php echo $page + 1; ?>">Page suivante</a><?php
    endif;






    // FUNCTIONS //

    function findAuthor($idarticle , $db){
        $req = $db -> prepare('SELECT * FROM `t_users`left join t_articles_has_t_users on idT_USERS = t_users_id_user WHERE t_articles_id_article = ?');
        $req -> execute([$idarticle]);
        $row = $req -> fetch();
        return $row['pseudo'];
    }


    function contenu($var, $max) {
        // On récupère la chaine de caractère sous forme de tableau de mots
        $contenu = explode(" ", $var);

        // On test que notre tableau contienne plus de mots que notre maximum à afficher
        if($max > count($contenu)) {
            $max = count($contenu);
        }

        // On affiche les $max premiers messages
        for($i=0; $i<$max; $i++) {
            echo ' ' . $contenu[$i];
        }

        // On ouvre la balise <span> qui cachera notre contenu
        echo '<span class="contenu-inactif">';

        // On affiche le reste du tableau
        if($max < count($contenu)) {
            for($i=$max; $i<count($contenu); $i++) {
                echo ' ' . $contenu[$i];
            }
        }

        // On ferme la balise <span>
        echo '</span>';
    }
?>

