const mq = window.matchMedia("(min-width: 1025px)");

if (matchMedia) {
    mq.addListener(WidthChange);
    WidthChange(mq);
}

//instance for fullpage js
//fullpage.js for book
function bookFullpage(){
    $('#fullpageBook').fullpage({
        anchors: ['Book_1', 'Book_2', 'Book_3'],
        menu: '#bookSubNav'
    });
}

//fullpage.js for aniamtion
function animFullpage(){
    $('#fullpageAnim').fullpage({
        anchors: ['demoReel', 'things', 'kids'],
        menu: '#AnimSubNav'
    });
}

function WidthChange(mq) {
    if (mq.matches) {
        $(function(){
            $("#scrollDown").click(function(){
                $.fn.fullpage.moveSectionDown();
            });

            $("#scrollUp").click(function(){
                $.fn.fullpage.moveSectionUp();
            });

        });
        bookFullpage();
        animFullpage();
    } else {
        return false;
    }

}

