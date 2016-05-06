if($(window).width() > 600) {
    $('.women-col3 .lazy').height(parseFloat($('.women-col2 .lazy').height() / 2 - 2));
    $('.block-collection .slide-collection .col-item').height(parseFloat($('.women-col2 .lazy').height() / 2 + 5));
    $(window).resize(function () {
        if($(window).width() > 600) {
            $('.women-col3 .lazy').height(parseFloat($('.women-col2 .lazy').height() / 2 - 2));
            $('.block-collection .slide-collection .col-item').height(parseFloat($('.women-col2 .lazy').height() / 2 + 5));
        }
    })
}

//tự động lấy dánh sách nhật ký
function autoLoadGetHistories(){
    $.ajax({
        url: 'home/index/get-histories',
        cache: false,
        success: function(data){
            $('.list-history').fadeOut(800, function(){
                $('.list-history').html(data).fadeIn().delay(2000);
            });
        }
    })
}


$('document').ready(function(){
   setInterval(autoLoadGetHistories,20000);

    $('#change-logo').click(function(){
        $('.show-modal').modal('show');
    })

    $('.sub-cate-inner').click(function(){
        $('.show-modal').modal('show');ss
    })
});
