$(document).ready(function(){
    $(".hamburger").click(function(){
        if($(".hamburger").hasClass("is-inactive")){
            $(".hamburger").removeClass("is-inactive");
            $(".hamburger").addClass("is-active");
            $(".menu").slideToggle();
        } else {
            $(".hamburger").removeClass("is-active");
            $(".hamburger").addClass("is-inactive");
            $(".menu").slideToggle();
        }
    });
});