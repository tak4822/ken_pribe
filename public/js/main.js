$(function(){
    $().fancybox({
        selector : '[data-fancybox="images"]',
        loop     : true
    });
    //drawings show
    $('.chara-wrap').each(function(i, el){
        $(el).css({
            'opacity':0,
            'transform': 'translateY(-100px)'
        });
        setTimeout(function(){
            $(el).css({
                'opacity':1.0,
                'transform': 'translateY(0px)'
            });
        },300 + ( i * 140 ));
    });
});

//news button
function news(){
    $('.news-btn').click(function(){
        $('html, body').animate({'scrollTop': $('#news').offset().top}, 1000);
    });
}

function emailFilter(){
    const f = "animationbooks";
    const arr = "@";
    const g = "gmail";
    const dot = ".";
    const c = "com";
    document.getElementById("emailText").href = "mail" + "to:" + f + arr + g + dot + c;
}