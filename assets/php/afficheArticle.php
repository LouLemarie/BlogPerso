<?php

    // On ouvre la bdd
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    // On effectue une requète vers t_articles
    $req = $bdd->query('SELECT * FROM t_articles ORDER BY ID_ARTICLE DESC');

    // On effectue une boucle qui lit chaque lignes de t_artices ($req)
    while($data = $req->fetch()) {

        // INITIALISATION DES VARIABLES

        $titre = $data['titre'];
        $auteur = $data['auteur'];
        $contenu = $data['contenu'];
        $articleId = $data['ID_ARTICLE'];

        // APRES
        $categoriesId = recupCategorieId($articleId);
        $categories = ' ###';




        // AFFICHAGE DU MESSAGE

        echo '
            <div class="article">
                <div class="content">
                   <h2>'.$titre.'</h2>
                    <div class="post">Author : '.$auteur.' / Catégories :';

                    for($i=0; $i<count($categoriesId); $i++) {
                        echo ' ' . recupCategorie($categoriesId[$i]);
                    }

                    echo '</div>
                    <div class="contenu">
                        ' . $contenu . '
                    </div>
                </div>
                <div class="button">
                    ';

                    include_once './button/supprimer.php';

                    echo '<button class="btn btn-5">COMMENTER</button>
                </div>
            </div>
    
        ';

    }




    // FUNCTION

    function recupCategorieId($articleId) {
        // On ouvre la bdd
        $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

        // On effectue une requète vers t_articles
        $req = $bdd->query('SELECT * FROM t_categories_has_t_articles');

        // On initialise $i
        $i = 0;

        while($article = $req->fetch()) {
            if($article['T_ARTICLES_ID_ARTICLE'] == $articleId) {
                $categorieId[$i] = $article['T_CATEGORIES_ID_CATEGORIE'];
                $i++;
            }
        }

        return $categorieId;

    }


    function recupCategorie($catId) {
        // On ouvre la bdd
        $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

        // On effectue une requète vers t_categories
        $req = $bdd->query('SELECT * FROM t_categories WHERE ID_CATEGORIE = '.$catId);

        // On récupère la valeur de la catégrie
        $categorie = $req->fetch()['CATLIBELLE'];

        return $categorie;
    }


?>

