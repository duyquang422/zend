$(document).ready(function(){
    $('#menu .icon-open-menu').hover(function(){
        $('.list-menu').addClass('show');
    });
    $('#header').mouseleave(function(){
        $('.list-menu').removeClass('show');
    });

    $(window).bind('scroll',function() {
        if ($(this).scrollTop() > $('#header').offset().top + $('#header').height()) {
            $('#header').addClass('header-fixed');
        }
        if($(this).scrollTop() == 0){
            $('#header').removeClass('header-fixed');
        }
    })

    $('body').animate({
        scrollTop: 0
    }, 500);
});

function scrolltop()
{
    var id_button = '.scroll-top';

    // Kéo xuống khoảng cách 220px thì xuất hiện button
    var offset = 220;

    // THời gian di trượt là 0.5 giây
    var duration = 500;

    // Thêm vào sự kiện scroll của window, nghĩa là lúc trượt sẽ
    // kiểm tra sự ẩn hiện của button
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery(id_button).fadeIn(duration);
        } else {
            jQuery(id_button).fadeOut(duration);
        }
    });

    // Thêm sự kiện click vào button để khi click là trượt lên top
    jQuery(id_button).click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
}