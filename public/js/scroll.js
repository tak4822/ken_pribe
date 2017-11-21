const mq = window.matchMedia("(min-width: 1025px)");

if (matchMedia) {
    mq.addListener(WidthChange);
    WidthChange(mq);
}

//instance for fullpage js
//fullpage.js for book
function bookFullpage(){
    const numOfBooks = $('.subNav-li.books').length;
    const booksArr = [];
    for(let i=0; i<numOfBooks; i+=1 ){
        booksArr.push('Book_'+i);
    }
    $('#fullpageBook').fullpage({
        anchors: booksArr,
        menu: '#bookSubNav'
    });
    setTimeout(() => {
        $("#scrollDown").addClass('scroll-btn-anim');
    }, 3000);
    $("#scrollDown").removeClass('scroll-btn-anim');
}

//fullpage.js for aniamtion
function animFullpage(){
    $('#fullpageAnim').fullpage({
        anchors: ['demoReel', 'things', 'kids'],
        menu: '#AnimSubNav'
    });
    setTimeout(() => {
        $("#scrollDown").addClass('scroll-btn-anim');
    }, 3000);
    $("#scrollDown").removeClass('scroll-btn-anim');
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
        // bookFullpage();
        // animFullpage();
    } else {
        return false;
    }

}

