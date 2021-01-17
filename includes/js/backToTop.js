const backToTopButton = document.getElementById("backToTop");

window.addEventListener("scroll", scrollFunction);

function scrollFunction() {
    if (window.pageYOffset> 200) {
        if (!backToTopButton.classList.contains("btnFadeIn")){
            backToTopButton.classList.remove("btnFadeOut");
            backToTopButton.classList.add("btnFadeIn");
            backToTopButton.style.display = "block";
        }
    } else {
        if (backToTopButton.classList.contains("btnFadeIn")){
            backToTopButton.classList.remove("btnFadeIn");
            backToTopButton.classList.add("btnFadeOut");
            setTimeout(function (){
                backToTopButton.style.display = "none";
            },500)

        }

    }
}

backToTopButton.addEventListener("click",backToTopFunction)

function backToTopFunction(){
    window.scrollTo(0,0);
}

