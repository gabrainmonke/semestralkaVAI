$(document).ready(function (){

    var commentCount = 0;

    $("a").on("click",function (e){
        commentCount = commentCount + 2;

        $(".postedComments").load("includes/loadCommentsScript.php", {

            commentNewCount : commentCount

        })
    })
});
