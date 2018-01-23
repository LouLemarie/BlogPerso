<?php
$dsn = "mysql: dbname=nfactoryblog; host=localhost; charset=utf8";

$username = "root";
$password = '';

// $db = new PDO($dsn, $username, $password);

try {
    $db = new PDO($dsn, $username, $password);
}

catch (PDOException $e) {
    echo($e -> getMessage());
}
$sql = "SELECT * FROM t_articles"
$resultat = $db -> query($sql);

while(($article = $resultat -> fetch())){
    echo $article['contenu'];
}
// Requête d'insertion
$sql ="INSERT INTO T_ARTICLE...";
$nbrLignes = $db -> exec($sql);
echo $nbrLignes;



unset($db);
///////////////////////////////////////////////////////////
$db = new PDO($dns, $username, $password);

$db -> setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC);

// Formatage pour un jeu de résultats
$résultat = $db -> query("SELECT *...");
$resultat -> setFetchMode(PDO::FETCH_ASSOC);

while (($article = $ resultat -> fetch())){
    var_dump($articles) //afficher ce qu'il y a dans la ()
}

// à  chaque appel
$resultat = $db -> query("SELECT * ...");
while (($article = $resultat -> fetch(PDO:: FETCH_ASSOC)));{
    var_dump($article);
}




