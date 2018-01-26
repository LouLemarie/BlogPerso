<?php


                                                    // FUNCTIONS //


// AFFICHER ARTICLE

function afficherArticle($data) {
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    while ($article = $data->fetch() ){

        // AFFICHAGE DU MESSAGE
        echo '<div class="article ';
        classerCategories($article['idT_ARTICLES']);
        echo '">';
        echo '    <div class="Titre"> <a class="articleId">#<span>'.$article['idT_ARTICLES'].'</span></a> ' . $article['titre'] . '</div>';
        echo '    <div class="autre">';
        echo 'statut : ' . $article['statut'] . ' auteur : ' . findAuthor($article['idT_ARTICLES'],$bdd) . '<br>' .  '  date : ' . $article['dateHeure'] . ' ' .  afficherCategories($article['idT_ARTICLES']);
        echo '    </div>';
        echo '<br>';
        echo '    <div class="commenter">';
        echo '         <button class="btn-commenter btn-5 pop-up-button-sign-in">Commenter !</button>';
        echo '    </div>';
        echo '    <div class="voir">';
        echo '         <button class="btn-voir btn-5">+</button>';
        echo '    </div>';
        echo '<br>';
        echo '    <div class="Contenu"> ';
        contenu($article['contenu'], 70);
        echo '    </div>';
        echo '<br>';
        echo '</div>';
    }
}


// FIND AUTHOR

function findAuthor($idarticle , $db){
    $req = $db -> prepare('SELECT * FROM `t_users`left join t_articles_has_t_users on idT_USERS = t_users_id_user WHERE t_articles_id_article = ?');
    $req -> execute([$idarticle]);
    $row = $req -> fetch();
    return $row['pseudo'];
}


// CONTENU

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




// Afficher Catégories

function afficherCategories($articleId) {
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $reqStatement = '
                SELECT *
                FROM t_categories
                INNER JOIN t_categories_has_t_articles ON t_categories.idT_CATEGORIES  = t_categories_has_t_articles.T_CATEGORIES_idT_CATEGORIES
                WHERE t_categories_has_t_articles.T_ARTICLES_idT_ARTICLES	 = ' . $articleId . '
            ';

    //die($reqStatement);

    $requete = $bdd->query($reqStatement);


    // On affiche la catégorie

    echo '<span class="categories">';

    while($categorie = $requete->fetch()) {
        echo $categorie['categorie'] . ' ';
    }

    echo '</span><br>';

}





// Classer Catégories

function classerCategories($articleId) {
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $reqStatement = '
                        SELECT *
                        FROM t_categories
                        INNER JOIN t_categories_has_t_articles ON t_categories.idT_CATEGORIES  = t_categories_has_t_articles.T_CATEGORIES_idT_CATEGORIES
                        WHERE t_categories_has_t_articles.T_ARTICLES_idT_ARTICLES	 = ' . $articleId . '
                    ';

    //die($reqStatement);

    $requete = $bdd->query($reqStatement);


    // On affiche la catégorie

    while($categorie = $requete->fetch()) {
        echo ' ' . $categorie['categorie'] . ' ';
    }

}

?>