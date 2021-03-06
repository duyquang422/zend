//chèn thư viện fb vào website
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1239429816072262";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



var defaultPrice = $('.detail_product_price strong').html();
$(document).ready(function () {

    /*//cập nhật bảng history khi user click vào đánh giá
    $('.unit-rating li a').click(function(){
        $.ajax({
            url: basePath + 'home/product/rating?id='+ $('#productId').val(),
            type: 'get',
            dataType: 'html'
        })
    })*/

    //tạo slider cho phần mô tả sản phẩm
    $("#characteristics").owlCarousel({
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

    //tính giá sản phẩm khi sản phẩm thay đổi
    $('#product-size').change(function(){
        if($(this).val() > 0)
            $('.detail_product_price strong').html($(this).val().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + '₫');
        else
            $('.detail_product_price strong').html(defaultPrice);
        caculatorPrice();
    });

    //tạo sự kiện giảm số lượng
    $(document).on('click','.quantity button:nth-child(2)',function(){
        if($('#numberOfProducts').val() > 1)
            $('#numberOfProducts').val(parseInt($('#numberOfProducts').val()) - 1);
        caculatorPrice();
    })
    //sự kiện tăng số lượng
    $('.quantity button:last-child').click(function(){
        $('#numberOfProducts').val(parseInt($('#numberOfProducts').val()) + 1);
        caculatorPrice();
    })
    //tính giá sản phẩm khi số lượng thay đổi
    $('#numberOfProducts').change(function(){
        caculatorPrice();
    })

    $('#txtEditor').click(function(){
        $('#showdropdown').show();
    })

    $('#js_activity_feed_form').submit(function(){
        if(!$('#sendwithname').val() && !$('#sendwithemail').val() && $('#sendwithname').length){
            alert('Vui lòng nhập tên và email vào!');
            return false;
        }
        else if(!$('#sendwithname').val() && $('#sendwithname').length) {
            alert('Vui lòng nhập tên vào!');
            return false;
        }
        else if(!$('#sendwithemail').val() && $('#sendwithname').length) {
            alert('Vui lòng nhập email vào!');
            return false;
        }
    })

    $('.closeIfo').click(function(){
        $('.showdropdown').hide();
    })

    //thực hiện việc scroll
    var positionStickybar = $('#liSpec').offset().top;
    $(window).scroll(function () {
        if ($(this).scrollTop() > $('#liSpec').offset().top) {
            $('.stickybar').css({
                position: 'fixed',
                top: '50px'
            })
        }
        if ($(this).scrollTop() < positionStickybar) {
            $('.stickybar').css({
                position: 'relative',
                top: 0
            })
        }
        if ($(this).scrollTop() > $('#product-info').offset().top && $(this).scrollTop() < $('.boxtable').offset().top) {
            $('#liSpec').addClass('actbox');
            $('#liImg').removeClass('actbox');
            $('#liCmt').removeClass('actbox');
        }
        if ($(this).scrollTop() > $('.boxtable').offset().top && $(this).scrollTop() < $('.fb-comments').offset().top) {
            $('#liSpec').removeClass('actbox');
            $('#liImg').addClass('actbox');
            $('#liCmt').removeClass('actbox');
        }
        if ($(this).scrollTop() > $('.fb-comments').offset().top) {
            $('#liSpec').removeClass('actbox');
            $('#liImg').removeClass('actbox');
            $('#liCmt').addClass('actbox');
        }
    })
});

function caculatorPrice(){
    if($('#product-size').val() > 0)
        $('.detail_product_price strong').html(parseInt($('#numberOfProducts').val() * $('#product-size').val()).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + '₫');
    else{
        $('.detail_product_price strong').html((parseInt(defaultPrice.replace(/\./g,'')) * $('#numberOfProducts').val()).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + '₫');
    }
}

//xử lý sự kiện cho button mua hàng
function purchase(id) {
    $('#modalAddtocart').modal('hide');
    $('.buy-now').modal('show');
    $.ajax({
        'url': 'home/product/get-product',
        type: 'get',
        dataType: 'json',
        data: { id: id},
        success: function(data){
            $('.ppu_tab_proimg').html('<img src="public/files/product/203x235/'+ data.image +'" />');
            $('.ppu_tab_pro_name').html(data.name);
            if($('#product-size').val() > 0)
                $('#sizeName').html('Kích thước: ' + $('#product-size option:selected').html());
            $('#quantity').html('Số lượng: ' + $('#numberOfProducts').val());
            $('#totalMoney').html('Tổng tiền: ' + $('.detail_product_price strong').html());
            $('.ppu_rbnt_submit').attr({
                'data-product-id': data.id,
                'data-product-name': data.name,
                'data-product-price': data.sale_off ? data.sale_off : data.price 
            });
            if(data.sale_off){
                $('.lineprice').html('<div class="ppu_tab_pro_price">Giá: <b>'+ data.sale_off.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") +'</b>&nbsp;đ</div>');
            }else{
                $('.lineprice').html('<div class="ppu_tab_pro_price">Giá: <b>'+ data.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") +'</b>&nbsp;đ</div>');
            }
        }
    })
}

$('body').one('click','.ppu_rbnt_submit',function(){
    var price,sizeName,totalMoney;
    if($('#product-size').val() > 0){
        price = $('#product-size').val();
        sizeName = $('#product-size option:selected').html();
        totalMoney = parseInt($('#numberOfProducts').val() * price);
    }else{
        price = $(this).data('product-price');
        sizeName = '';
        totalMoney = parseInt(price * $('#numberOfProducts').val());
    }

    $.ajax({
        url: 'home/user/buy',
        type: 'post',
        dataType: 'html',
        data: {
            productId: $(this).data('product-id'),
            productName: $(this).data('product-name'),
            price: price,
            quantity: $('#numberOfProducts').val(),
            sizeName: sizeName,
            totalMoney: totalMoney,
            customerName: $('input[name=full_name]').val(),
            phone: $('input[name=phone]').val(),
            email: $('#email').val(),
            shippingAddress: $('#address').val() ? $('#address').val() : $('#shipping-address').val(),
            note: $('#note').val()
        },
        success: function(data){
            $('.buy-now').modal('hide');
            $('.buy-success').modal('show');
            var interval = setInterval(function(){
                if(!parseInt($('.s').html())){
                    document.location.href="/";
                    $('.s').html('0');
                    clearInterval(interval);
                }else{
                    $('.s').html(parseInt($('.s').html() - 1));
                }
            },1000);
        }
    });
})

if($(window).width() > 690) {
    $('#characteristics .item img').height(parseInt($('.promotion_box_left').height()));
}

$(window).resize(function(){
    if($(window).width() > 690) {
        $('#characteristics .item img').height(parseInt($('.promotion_box_left').height()))
    }
})