$(window).on('load',function(){
    if($(window).width() > 600) {
        $('.block-collection .slide-collection .col-item').height(parseFloat($('.women-col2 .lazy').height() / 2 + 5));
        $(window).resize(function () {
            if($(window).width() > 600) {
                $('.block-collection .slide-collection .col-item').height(parseFloat($('.women-col2 .lazy').height() / 2 + 5));
            }
        })
    }
})
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
   setInterval(autoLoadGetHistories,200000);

    $('#change-logo').click(function(){
        $('.show-modal').modal('show');
    })

    //thực hiện việc cập nhật ảnh nền của category trên trang home
    $('.sub-cate-inner .btn-edit').click(function(){
        var elm = $(this);
        $('.show-modal').modal('show');
        getConfigImg('Thay đổi ảnh nền quảng cáo cho chuyên mục','edit-nav-left-homepage',elm);
    })

    $(document).on('submit','#edit-nav-left-homepage',function(){
        var data = new FormData(this);
        data.append('id',$(this).data('id'));
        uploadImg('edit-nav-left-homepage',data);
        return false;
    })


    //thực hiện việc cập nhật ảnh cho slideshow
    $('#slide_home_top .btn-edit').click(function(){
        var elm = $(this);
        $('.show-modal').modal('show');
        getConfigImg('Thay đổi ảnh cho slideshow','edit-slideshow',elm);
    })

    $(document).on('submit','#edit-slideshow',function(){
        var data = new FormData(this);
        data.append('id',$(this).data('id'));
        uploadImg('edit-slideshow',data);
        return false;
    })


    //cập nhật logo
    $('.logo .btn-edit').click(function(){
        var elm = $(this);
        $('.show-modal').modal('show');
        getConfigImg('Thay đổi logo thương hiệu','edit-logo',elm);
    })

    $(document).on('submit','#edit-logo',function(){
        var data = new FormData(this);
        uploadImg('edit-logo',data);
        return false;
    })
});

function getConfigImg(title,action,elm){
    $.ajax({
        url: 'home/index/' + action,
        cache: false,
        success: function(data){
            if(elm.data('id'))
                $('.data-form').attr('data-id',elm.data('id'));
            $('.data-form').attr('id',action);
            $('.modal-update .data-form').html(data);
            $('.modal-title').html(title);
            if(elm.data('img'))
                $('#update-img').html('<img src="'+ basePath + 'public/files/upload/' + elm.data('img') + '" >' );
        }
    })
}

function uploadImg(action,data){
    $.ajax({
        url: 'home/index/' + action,
        type: 'post',
        dataType: 'json',
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            $('#update-img').html('<img src="'+ basePath + 'public/files/upload/' + data + '" >' );
            window.location.reload();
        }
    });
}