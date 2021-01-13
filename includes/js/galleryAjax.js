$(document).ready(function (){

        $(".galeryContainer").on("click",".season a",function (event){

            event.preventDefault();

            var path = $(this).attr("href");

            $(".images").fadeOut("slow",function (){

                $(".galeryContainer").hide().load(path, function (){

                    $(this).fadeIn("slow");

                });
            })

        })
    });
