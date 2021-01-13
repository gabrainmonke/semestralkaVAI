$(document).ready(function (){

    var commentCount = 0;

    $("button").click(function (){

        commentCount = commentCount + 2;

        $(".postedComments").load("includes/loadCommentsScript.php", {

            commentNewCount : commentCount

        })
    })
});
