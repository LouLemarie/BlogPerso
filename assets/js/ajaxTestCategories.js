$(function() {


        $('.btn-categorie').click(function() {


            // /////////////////////////////////////// //
            // //////// INITIALISATIONS ////////////// //
            // /////////////////////////////////////// //


            // On initialise les variables
            var j = 0;
            var articleId = [];

            // On récupère le nom de la catégorie séléctionnée
            var categorie = $(this).text();
            console.log(categorie);

            // On selectionne tous nos articles
            var articles = $('.article');
            console.log(articles);

            // On sélectionne notre 1er article
            var article = articles.first();

            // On récupère les catégories de nos articles
            for(i=0; i<articles.length; i++) {

                if(article.children(".autre").children("span:contains("+ categorie +")").length != 0) {
                    articleId[j] = article.children('.Titre').children('.articleId').children('span').text();
                    j++
                }

                article = article.next();
            }

            console.log(articleId);




            // //////////////////////////////////// //
            // //////// GESTION AJAX ////////////// //
            // //////////////////////////////////// //

            $(".zoneText").load("../php/afficheArticleCategorie.php", { // accolades !
                articleId : articleId,

            });

            $(".zoneText").html("<p>En attente de connexion...</p>")
        })


})