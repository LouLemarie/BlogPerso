$(function() {

            // GESTION DE '.btn-commenter'

    // Lorsque l'on clique sur le bouton '.btn-commenter'
    $('.btn-commenter').click(function(e) {
        // On recupère la div article
        $article = $(this).parent().parent();

        // On récupère l'enfant
        $span = $article.children('.Titre').children('a').children('span');

        // On récupère articleId
        articleId = $span[0].textContent;

        // On selectionne notre input dans le formulaire
        $input = $('.form-comment').children('.article-id');

        // On lui envoie notre articleId
        $input.val(articleId);
    })


/*
    $('#submit-comment').click(function(e) {
        e.preventDefault();
    })
*/
})