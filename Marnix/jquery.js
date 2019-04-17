$(document).ready(function(){
    $("button").click(function(){
        if($(".hamburger").hasClass("is-inactive")){
            $(".hamburger").removeClass("is-inactive");
            $(".hamburger").addClass("is-active");
            $(".menu").toggle();
        } else {
            $(".hamburger").removeClass("is-active");
            $(".hamburger").addClass("is-inactive");
            $(".menu").toggle();
        }
    });
});