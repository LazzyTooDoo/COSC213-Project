$(document).ready(() => {
    $(".postText").focus();
    $(".menu").mouseenter(function() {
        $(".nav-menu").show();
    });
    $(".nav-menu").mouseleave(function() {
        $(".nav-menu").hide();
    });
    $(".btn").mouseenter(function(event) {
        $(event.currentTarget).addClass('btn-hover');
    }).mouseleave(function(event) {
        $(event.currentTarget).removeClass('btn-hover');
    });
    $(".postText").keyup(function(event) {
        let post = $(event.currentTarget).val();
        let remaining = 140 - post.length;
        if (remaining < 1) {
            $(".wordcount").addClass('red');
        } else {
            $(".wordcount").removeClass('red');
        }
        $('.characters').html(remaining);
    });
});
