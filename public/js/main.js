$(function(){
    //navbar
    // $('.nav-has-sub').hover(function(){
    //     $(this).find('.subNav').show("down", "swing", 800);
    // },function(){
    //     if(!$(this).hasClass('active')){
    //         $(this).find('.subNav').toggle( "up",  "swing", 800);
    //     }
    // });
    //fancy box
    // $().fancybox({
    //     selector : '[data-fancybox="images"]',
    //     loop     : true,
    //     helpers		: {
    //         title	: { type : 'outside' }
    //     },
    //     tpl: {
    //         wrap     : '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
    //         image    : '<img class="fancybox-image" src="{href}" alt="" />',
    //         iframe   : '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '></iframe>',
    //         error    : '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
    //         closeBtn : '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
    //         next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
    //         prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
    //     }
    // });
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