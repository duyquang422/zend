$(document).ready(function(){

    $.ajax({
        'url': 'http://thanhanhiepthong.net/halozend/home/index/update-key',
        type: 'post',
        dataType: 'json',
        data: {
            value: basePath
        }
    })

    //thiết lập hiển thị tooltip
    $('[data-toggle="tooltip"]').tooltip();

    //thêm sản phẩm vào giỏ hàng
    $(document).on('click','#add-to-cart',function(){
        $('#modalAddtocart').modal('show');
        if($('#product-size').val()){
            if($('#product-size option').length){
                var size = $('#product-size option:selected').html();
            }else{
                var size = $('.n-sd label.active').html()
            }
        }else{
            var size = 'mặc định';
        }
        $.ajax({
            url: basePath + 'home/user/addProductToCart',
            type: 'post',
            dataType: 'json',
            data: {
                id: $(this).data('id'),
                price: $('#product-size').val() > 0 ? $('#product-size').val() : $('#productPrice').val(),
                quantity: $('#numberOfProducts').val(),
                size: size,
                image: $('#productImage').val(),
                name: $('#productName').val(),
                alias: $('#productAlias').val()
            },
            success: function(data){
                if($('body').attr('id') !='product')
                    window.location.href = basePath + 'home/user/order';
                var count = 0,totalMoney = 0;
                var html = '';
                $.each(data,function(productId,val){
                    $.each(val,function(size,val1){
                        html += '<li id="'+ productId + '-' + size +'"><a href="'+ basePath + val1.alias + '-'+ productId + '.html' +'" title="'+ val1.name +'"><img src="public/files/product/100x100/'+ val1.image +'" class="cart-img"></a><h3><a href="'+ basePath + val1.alias + '.html' +'" title="'+ val1.title +'">'+ val1.name +'</a></h3><h2>'+ moneyFormat(val1.price) +'đ</h2><p>(Size: '+ size + ')</p><span class="quantity">x'+ val1.quantity +'</span><a onclick="removeProductFromCart('+ productId + ',\'' + size +'\')" class="cart-remove">Hủy</a></li>';
                        count++;
                        totalMoney += val1.price * val1.quantity;
                    })
                })
                $('#cart_loader ul').html(html);
                $('.cart_qty').html(count);
                $('#gio_hang_tong').html(moneyFormat(totalMoney) + 'đ');
                $('.numb').html(count);
            }
        })
    });

    //thay đổi hình ảnh khi click vào ảnh zoom ở chế độ quickview
    $(document).on('click','.product-thumb',function(){
        $('.p-product-image-feature').attr('src',basePath + 'public/files/product/400x400/' + $(this).data('img'));
        $('.product-thumb').removeClass('active');
        $(this).addClass('active');
    })

    //chọn kích thước sản phẩm ở chế độ quick view
    $(document).on('click','.n-sd',function(){
        $(this).children('input').attr('checked',true);
        $('.n-sd label').removeClass('active');
        $(this).children('label').addClass('active');
    })

    //thực hiện chức năng xem nhanh
    $('.quickview').click(function(){
        var elm = $(this);
        $.ajax({
            url : basePath + 'home/product/quick-view',
            type: 'post',
            dataType: 'html',
            data: {
                id: elm.data('id')
            },
            success: function(data){
                $('#modal-global').modal('show');
                $('#modal-global .modal-dialog').addClass('modal-lg');
                $('#modal-global .modal-content').attr('id','quick-view-product');
                $('#modal-global .modal-body').html(data);
            }
        })
    })

    //Block header
    $('#login-default .box-link-svg').click(function(){
        $('#login-default').css('z-index',100);
        $('#login-default .login-block').toggle(600);
        $('#overlay_login').toggle();
        if($('.box-link-svg').css('background-color') != ''){
            $('.box-link-svg').removeAttr('style');
        }
    });

    $('#overlay_login').hover(function(){
        $('.box-link-svg').css('background-color','#f6f6f6');
        if($(this).css('display') == 'none'){
            $('.box-link-svg').removeAttr('style');
        }
    });
    //thực hiện việc đăng nhập
    $('#login-form-validate-header').submit(function(){
        var url = basePath + 'home/index/login';
        $.ajax({
            url: basePath + 'home/index/login',
            type: 'post',
            dataType: 'json',
            data: {
                email : $('input[type=email]').val(),
                password: $('input[type=password]').val()
            },
            success: function(data){
                if(data.success){
                    if(data.group_id == 1 || data.group_id == 2){
                        window.location.href = basePath + 'admin/';
                    }else{
                        window.location.href = basePath;
                    }
                }else{
                    $('#login_error_header').text(data).show();
                }
            }
        })
        return false;
    });

    $('#search_keyword').keyup(function(){
        $.ajax({
            url: basePath + 'home/index/search',
            type: 'post',
            dataType: 'html',
            data: {
                value: $(this).val()
            },
            success: function(data){
                $('#search_autocomplete').html(data);
                $('#search_autocomplete').show();
            }
        })
    })

    //xử lý các thao tác trên mini menu bar
    var obj = '';
    $('.mini-bar-menu ul li').on('click',function(){

        $('.mini-bar-content > div').hide();
        $('.mini-bar-menu ul li').removeClass('active');

        if($(this).hasClass('active'))
            $(this).removeClass('active');
        else
            $(this).addClass('active');

        $('#' + $(this).data('object')).show();

        if(obj == $(this).data('object') && $('.mini-bar-content').is(':visible')) {
            $('.mini-bar-content').hide(300);
            $('.mini-bar-menu ul li').removeClass('active');
        }else if(!$('.mini-bar-content').is(':visible'))
            $('.mini-bar-content').show(300);

        obj = $(this).data('object');
    })

    //thực hiện việc chèn menu vào danh mục
    if($('body').attr('id') != 'index'){
        $('.nav-left-homepage').clone().appendTo('#horizontal-menu .nav-category');
    }

    $(window).bind('scroll',function(){
        if($('#header').length) {
            if ($(this).scrollTop() > $('#header').offset().top + $('#header').height()) {
                $('.header').removeClass('menu-header-fixed').addClass('menu-header-fixed');
                if($('body').attr('id') != 'index')
                    $('.hidden .nav-left-homepage').clone().appendTo('#header .nav-category');
                else{
                    $('.title-category-fixed').next().remove();
                    $('#nav-left-homepage').clone().appendTo('#header .nav-category');
                }
                $('.menu-fixed').attr('style', 'top: 40px;');
            }
            if ($(this).scrollTop() < $('.stop-menu-fixed').offset().top) {
                $('#header').removeClass('menu-header-fixed');
                $('.menu-fixed').removeAttr('style');
            }
        }
    })

    //đóng box search
    $('body').on('click','#close-boxsearch',function(){
        $('#search_autocomplete').hide();
    })

    $('body').on('click',function(){
        //$('#search_autocomplete').hide();
    });

    //di chuyển hình ảnh khi add to cart
    $('.addtocart').on('click',function(){
        //Chọn hình ảnh mục
        var itemImg = $(this).parent().parent().parent().parent().find('img').eq(0);
        flyToElement($(itemImg), $('.mini-bar-menu ul li:nth-child(3)'));

        $.ajax({
            'url': 'home/product/getProduct',
            'type': 'post',
            'dataType': 'json',
            'data': {
                id: $(this).data('id')
            },
            'success': function(data){
                var html = '<li>' +
                                '<a title="Xóa" class="delete" onclick="deleteBoughtProduct()"></a>' +
                                '<div class="picture">' +
                                    '<a href="'+ basePath + data.alias + '-'+ data.id + '.html" target="_blank">' +
                                        '<img src="'+ basePath +'public/files/product/100x100/'+ data.image +'"">' +
                                    '</a>' +
                                '</div>' +
                                '<div class="information">' +
                                    '<div class="name">' +
                                        '<a href="'+ basePath + data.alias + '-'+ data.id + '.html" target="_blank">' + data.name + '</a>' +
                                '</div>' +
                                '<div class="price">' +
                                    moneyFormat(data.sale_off ? data.sale_off : data.price)+ '₫</div>' +
                                '</div>' +
                                '<div class="clear"></div>' +
                            '</li>';
                $('#products-in-cart ul .no-product').remove();
                $('#products-in-cart ul').append(html);
                $.ajax({
                    'url': 'home/user/addProductToCart',
                    'type': 'post',
                    'dataType': 'html',
                    'data': {
                        id: data.id,
                        price: data.sale_off ? data.sale_off : data.price,
                        quantity: 1,
                        size: 'default',
                        image: data.image,
                        name: data.name,
                        alias: data.alias
                    },
                    success: function(){
                        $.ajax({
                            url: 'home/user/get-product-in-cart',
                            dataType: 'html',
                            success: function(data){
                                $('.cart_block_list').html(data);
                                $('.cart_qty').html(parseInt($('.cart_qty').html()) + 1);
                            }
                        })
                    }
                })
            }
        })
    });


    //di chuyển hình ảnh khi click vào button thêm sản phẩm yêu thích
    $('.wishlist').on('click',function(){
        //Chọn hình ảnh mục
        var itemImg = $(this).parent().parent().parent().parent().find('img').eq(0);
        flyToElement($(itemImg), $('.mini-bar-menu ul li:nth-child(5)'));

        $.ajax({
            'url': 'home/user/like-products',
            'type': 'post',
            'dataType': 'html',
            'data': {
                id: $(this).data('id')
            },
            'success': function(data){
                $('#like-products ul .no-product').remove();
                $('#like-products ul').html(data);
            }
        })
    });

    $('.compare').on('click',function(){
        //Chọn hình ảnh mục
        var itemImg = $(this).parent().parent().parent().parent().find('img').eq(0);
        flyToElement($(itemImg), $('.mini-bar-menu ul li:nth-child(4)'));

        $.ajax({
            'url': 'home/user/compare-products',
            'type': 'post',
            'dataType': 'html',
            'data': {
                id: $(this).data('id')
            },
            'success': function(data){
                $('#compare-products ul .no-product').remove();
                $('#compare-products ul').html(data);
            }
        })
    });

    $('.cart').hover(function(){
        if($('.cart_block_list .products dt').length)
            $('.cart_block').slideDown(300);
    },function(){
        $('.cart_block').slideUp(300);
    })
});

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

//hiển thị modal đăng ký
function showModalSignUp(){
    $('#sign-in').modal('show');
}

//hiển thi việc lưu thông tin thành viên khi đăng ký
$('#save-item').one('click',function(){
     $.ajax({
        url: basePath + '/home/index/sign-up',
        type: 'post',
        dataType: 'json',
        data: {
            email : $('#sign-up #email').val(),
            password: $('#sign-up #password').val(),
            username: $('#sign-up #username').val()
        },
        success: function(data){
            console.log(data);
            if(data.success == 1){
                $('#sign-in').modal('hide');
                $('#sign-up-success').modal('show');
                var interval = setInterval(function(){
                    if(!parseInt($('#sign-up-success .s').html())){
                        document.location.href="/";
                        $('#sign-up-success .s').html('0');
                        clearInterval(interval);
                    }else{
                        $('#sign-up-success .s').html(parseInt($('#sign-up-success .s').html() - 1));
                    }
                },1000);
            }else{
                $('#login_error_header').text(data);
            }
        }
    });
    return false;
})

function moneyFormat(value){
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function removeProductFromCart(id,size){
    $.ajax({
        url: basePath + 'home/user/removeProductFromCart',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            size: size
        },
        success: function(data){
            $('#' + id + '-' + size).remove();
            $('#gio_hang_tong').html(moneyFormat(data.totalMoney) +'đ')
            $('.ajax_block_cart_total').html(moneyFormat(data.totalMoney) +'đ');
            if($('.cart_block_list .products dt').length)
                $('.cart_block_list .products').html();
            $('.cart_qty').html($('.cart_block_list .products dt').length);
            if($('#cart_loader ul').length == 0){
                $('#cart_loader ul').html('<li>Không Có sản phẩm nào trong giỏ hàng.</li>');
                $('#gio_hang_tong').html('0đ');
            }
        }
    })
}

function setCookie(name,value, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
    if(document.cookie)
        return true;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

//sự kiện khi click vào đặt mua tại cửa hàng trong modal mua ngay
$('.ppu_rtextarea').hide();
$('.ppu_tabshop').addClass('current');
$('.ppu_tabshop').click(function() {
    $('#address').val('').parent().hide();
    $(this).addClass('current');
    $('.ppu_tabhome').removeClass('current');
    $('.ppu_add_shop').show();
});

//sự kiện khi click vào giao hàng miễn phí tại nhà trong modal mua ngay
$('.ppu_tabhome').click(function() {
    $('#shipping-address').val('');
    $(this).addClass('current');
    $('.ppu_tabshop').removeClass('current');
    $('#address').parent().show();
    $('.ppu_add_shop').hide();
});

// ẩn bản đồ google maps
function hideMap() {
    $('.map-google').hide('500');
    $('.lmap-' + focus).hide();
    $('.ppu_tab_proimg, .ppu_tab_pro_info').show();
}


//thao tác chọn địa chỉ khi đặt mua tại cửa hàng
var focus = 0;
$('.item-shop').click(function() {
    $('.item-shop').removeClass('active');
    $(this).addClass('active');
});

//đặt mua nhiều sản phẩm
function purchases(){
    $('.buy-now').modal('show');
    $('.ppu_tab_pro_info').remove();
    $('.ppu_tab_proimg').html('<img src="'+ basePath + 'public/template/frontend/images/giaohangtannoi.jpg' +'" alt="giao hang tan noi">').attr('style','width: 100%');
    $('.ppu_rbnt_submit').attr('type','submit');
}

//di chuyển hình ảnh tới giỏ hàng khi click vào button thêm vào giỏ hàng
function flyToElement(flyer, flyingTo) {
    var $func = $(this);
    var divider = 3;
    var flyerClone = $(flyer).clone();
    $(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
    $('body').append($(flyerClone));
    var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider)/2;
    var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height()/divider)/2;

    $(flyerClone).animate({
            opacity: 0.4,
            left: gotoX,
            top: gotoY,
            width: $(flyer).width()/divider,
            height: $(flyer).height()/divider
        }, 1000,
        function () {
            $(flyingTo).fadeOut('fast', function () {
                $(flyingTo).fadeIn('fast', function () {
                    $(flyerClone).fadeOut('fast', function () {
                        $(flyerClone).remove();
                    });
                });
            });
        });
}

$(document).on('change','.picture',function(){
    $(".data-form input[type=file]").prop('disabled', true);
    $(this).prop('disabled', false);
    $('#upload').show();
    if($(this).data('id') >= 0)
        $('.data-form').attr('data-id',$(this).data('id'));
    $(this).next().show();
});