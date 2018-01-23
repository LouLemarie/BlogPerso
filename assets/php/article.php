<?php

    session_start();
    $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);

    $articleId = 'rien';





    if(isset($_POST['titre']) && isset($_POST['contenu'])) {
        if(!testExist('titre')) {

                // GESTION DE T_ARTICLES
            $req = $bdd->prepare('INSERT INTO t_articles(titre, contenu, auteur) VALUES(:titre, :contenu, :auteur)');
            $req->execute(array(
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'auteur' => $_SESSION['pseudo']
            ));

            // Récupération du dernier ID article
            $articleId = $bdd->lastInsertId();

            echo $articleId;



                 // GESTION DE T_CATEGORIE_HAS_T_ARTICLE
            foreach($_POST['categorie'] as $valeur) {
                  $req = $bdd->prepare('INSERT INTO t_categories_has_t_articles(T_CATEGORIES_ID_CATEGORIE,T_ARTICLES_ID_ARTICLE) VALUES(:T_CATEGORIES_ID_CATEGORIE, :T_ARTICLES_ID_ARTICLE)');
                  $req->execute(array(
                      'T_CATEGORIES_ID_CATEGORIE' => $valeur,
                      'T_ARTICLES_ID_ARTICLE' => $articleId,
                  ));
            }
        }
    };


    header('Location: ./main.php');


        // FUNCTION TESTEXIST()

        function testExist($var) {
            $bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
            $requete = $bdd->query('SELECT * FROM t_articles');
            $test = false;

            while($user = $requete->fetch()) {
                if($user[$var] == $_POST[$var]) {
                    $test = true;
                }
            }

            return $test;
        }



        function test($var) {
            $i = 0;
            foreach($_POST[$var] as $valeur)
            {
                $retour[$i] = $valeur;
                $i ++;
            }

            return $retour;
        }
/*

        // Qu'est ce que je veux faire ?
            Poster un article


        // De quoi j'ai besoin ?
            ARTICLE :                     ID_ARTICLE
                                          titre
                                          contenu
                                          auteur
                                          date

            T_CATEGORIE_HAS_T_ARTICLE :   T_CATEGORIES_ID_CATEGORIE
                                          T_ARTICLES_ID_ARTICLE



        // Qu'est ce que j'ai ?
            formArticle : titre - contenu - categorie[]



        // Qu'est ce que je peux aller chercher
            $_SESSION['user'] : auteur
            date : autogérée
            ID_ARTICLE : autogéré

            T_ARTICLES_ID_ARTICLE : lastId()

*/
?>