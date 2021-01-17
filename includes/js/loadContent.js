$(document).ready(function () {
    var commentCount = 0,
        articleCount = 2,
        url = window.location.href,
        filename = url.split('/').pop();

    $(".show").on("click", function () {

        switch (filename) {
            case 'gallery.php':
                commentCount = commentCount + 3;
                $(".postedComments").load("includes/loadCommentsScript.php", {

                    commentNewCount: commentCount

                });
                break;

            case 'index.php':
                articleCount = articleCount + 2;
                $(".articleContainer").load("includes/loadMainContent.php", {

                    articleNewCount: articleCount

                });
                break;
        }
    })
});
