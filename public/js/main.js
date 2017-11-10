$(function(){
    //navbar
    $('.nav-has-sub').hover(function(){
        $(this).find('.subNav').show("down", "swing", 800);
    },function(){
        if(!$(this).hasClass('active')){
            $(this).find('.subNav').toggle( "up",  "swing", 800);
        }
    });
    //fancy box
    $().fancybox({
        selector : '[data-fancybox="images"]',
        loop     : true
    });


});
