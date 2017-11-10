$(function(){
    //fullpage.js for book
    $(document).ready(function() {
        $('#fullpageBook').fullpage({
            anchors: ['Book_1', 'Book_2', 'Book_3'],
            menu: '#bookSubNav'
        });
    });
    //fullpage.js for aniamtion
    $(document).ready(function() {
        $('#fullpageAnim').fullpage({
            anchors: ['demoReel', 'things', 'kids'],
            menu: '#AnimSubNav'
        });
    });

    $("#scrollDown").click(function(){
        $.fn.fullpage.moveSectionDown();
    });

    $("#scrollUp").click(function(){
        $.fn.fullpage.moveSectionUp();
    });



})
