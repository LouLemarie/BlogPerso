$(function() {

    var categorie = [];

        $('.btn-categorie').click(function() {

            // On vérifie que notre tableau ne contient pas la catégorie séléctionnée
            if($(this).hasClass('checked')) {

                // On retire la class checked
                $(this).removeClass('checked');

                // On supprime du tableau la catégorie séléctionnée
                for(i=0; i<categorie.length; i++) {
                    if($(this).text() == categorie[i]) {
                        categorie.splice(i, i+1);
                    }
                }

            } else {
                // On ajoute la class checked
                $(this).addClass('checked');

                // On récupère le nom de la catégorie séléctionnée
                categorie.push($(this).text());
            }

            console.log(categorie)

            // //////////////////////////////////// //
            // //////// GESTION AJAX ////////////// //
            // //////////////////////////////////// //

            $(".zoneText").load("../php/afficheArticle.php", { // accolades !
                categorie : categorie,
            });

            //$(".zoneText").html("<p>En attente de connexion...</p>")
        })

});