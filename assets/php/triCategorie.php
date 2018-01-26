<?php



$cnx = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '');

$page = (!empty($_GET['page']) ? $_GET['page'] : 1);
$limite = 5;
$debut = ($page - 1) * $limite;

 // on cherche l'id de la catégorie cliquée


// $idcat


/* On cherche la catégorie de chaque article */
/*function findCategorie($i ,$j){
    $req = $j -> prepare('SELECT * FROM `t_articles`left join t_categories_has_t_articles on idT_ARTICLES = T_ARTICLES_idT_ARTICLES   WHERE T_CATEGORIES_idT_CATEGORIES = ?');
    $req -> execute([$i]);
    $row = $req -> fetch();
    return $row[];
}


$query = 'SELECT SQL_CALC_FOUND_ROWS * FROM `t_articles` WHERE ID_Cat = '.$_SESSION['userId'].' ORDER BY dateHeure DESC LIMIT :limite OFFSET :debut';
$query = $cnx->prepare($query);
$query->bindValue('debut', $debut, PDO::PARAM_INT);
$query->bindValue('limite', $limite, PDO::PARAM_INT);
$query->execute();
$bdd = new PDO($_SESSION['host'], $_SESSION['ndcSQL'], $_SESSION['mdpSQL']);
$data = $bdd->query('SELECT * FROM t_articles WHERE ID_USER = '.$_SESSION['userId'].' ORDER BY idT_ARTICLES DESC');


while ($article = $query->fetch() ){
    // AFFICHAGE DU MESSAGE
    echo '<div class="article">';
    echo '    <div class="Titre"> <a class="articleId">#<span>'.$article['idT_ARTICLES'].'</span></a> ' . $article['titre'] . '</div>';
    echo '    <div class="autre">';
    echo 'statut : ' . $article['statut'] . ' auteur : ' . findAuthor($article['idT_ARTICLES'],$bdd) . '<br>' .  '  date : ' . $article['dateHeure'];
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
/* Ici on récupère le nombre d'éléments total. Comme c'est une requête, il ne
 * faut pas oublier qu'on ne récupère pas directement le nombre.
 * De plus, comme la requête ne contient aucune donnée client pour fonctionner,
 * on peut l'exécuter ainsi directement */
$resultFoundRows = $cnx->query('SELECT found_rows()');
/* On doit extraire le nombre du jeu de résultat */
$nombredElementsTotal = $resultFoundRows->fetchColumn();

$categorie = $(".btn-categorie").text(); */








?>