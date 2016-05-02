$(document).ready(function(){

    $(document).on('click', '#group-table tbody tr', function () {
        $(this).toggleClass('selected');
        var id = $(this).attr('id');
        $('#' + id + ' .icheckbox_minimal-blue').toggleClass('checked');
    });

    $(document).on('click', '#group-table tbody .data-name', function () {
        $(this).popover('show');
        $('body').append("<div class='cart-overlay'></div>");
    });
    
    $(document).on('click', '#user-table tbody .group_name', function () {
        $(this).popover('show');
        $('body').append("<div class='cart-overlay'></div>");
    });

    $('#publishing .span6 input').attr('readonly',true);
    $('#tag').attr('readonly',false);

    $(document).on('change','#checkall',function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    $(document).on('change','#picture',function(){
        if($('#action').val() == 'add')
            $('#upload').hide();
        else
            $('#upload').show();
    });
    //định dạng hiển thị giá
    $(document).on('keyup','#price,#num_sales_criteria',function(){
        var price = $(this).val().replace(/\./g,'');
       $(this).val(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    });

    $(document).on('keypress', '#num_sales_criteria', function (event) {
        return (((event.which > 47) && (event.which < 58)) || (event.which == 13));
    });

    //định dạng hiện thị giá giảm
    $(document).on('keyup','#sale-off',function(){
        var price = $(this).val().replace(/\./g,'');
       $(this).val(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    });

    //định dạng hiện thị giá cho kích thước sản phẩm
    $(document).on('keyup','#price-by-size',function(){
        var price = $(this).val().replace(/\./g,'');
       $(this).val(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    });

    //tính toán phần giá giảm và phần trăm giảm dựa trên giá
    $(document).on('keyup','#sale-off',function(){
        var price = parseInt($('#price').val().replace(/\./g,''));
        var saleOff = parseInt($(this).val().replace(/\./g,''));
        $('#percent-discount').val(parseInt((price - saleOff) * 100 / price));
    });

    $(document).on('keyup','#percent-discount',function(){
        var price = parseInt($('#price').val().replace(/\./g,''));
        var percentDiscount = parseInt($(this).val());
        if(percentDiscount > 0)
            $('#sale-off').val(parseInt((100 - percentDiscount) * price / 100).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    });
    //tạo alias cho phần nhập name
    $(document).on('keyup','#name',function(){
        $('#alias').val(toAlias($(this).val()));
    });

    //thêm kích thước và giá theo kích thước cho sản phẩm
    $(document).on('click','.size-results li',function(){
        var flag = true;
        $('.list-size').show();
        var value = '';
        value = $(this).html();
        var elm = $(this);
        if($('.list-size ul li').length > 0) {
            $('.list-size ul li').each(function () {
                if ($(this).children('.size-name').html() == value) {
                    flag = false;
                    return false;
                }
            })
        }
        if(flag){
            var stt = $('.list-size ul li').length + 1;
            var sclass = stt % 2 ? 'odd' : 'even';
            var sizeName = elm.data('size');
            var sizeId = elm.data('id');
            var productId = $('#id').val();
            var html = '<li class="'+ sclass + '">' +
                '<div class="stt">'+ $('.list-size ul li').length +'</div>' +
                '<div class="size-name">'+ sizeName +'</div>' +
                '<div class="price"><input type="text" name="price" id="price-by-size" placeholder="Giá tiền" class="form-control"></div>' +
                '<div style="float: right" id="save-data" data-product-id="'+ productId +'" data-size-id="'+ sizeId +'"><i class="fa fa-floppy-o"></i></div>' +
                '</li>';
            $('.list-size ul').append(html);
        }else{
            alert('Kích thước đã tồn tại trong sản phẩm. Vui lòng chọn kích thước khác!');
        }
    });

    //hiển thị phần chọn ngày tháng trong phần thống kê
    $('.pull-right').click(function(){
        if($('#datepicker').hasClass('hide'))
            $('#datepicker').removeClass('hide');
        else
            $('#datepicker').addClass('hide');
    })

    $('body').on('click',function(){
       $('.size-drop').hide();
    });

    /*Loading*/
    $(window)
        .load(function () {
            setTimeout(function () {
                $('.loading-container')
                    .addClass('loading-inactive');
            }, 0);
        });

    var colors = ['#689F38', '#f4543c', '#e08e0b'];
    var random_color = colors[Math.floor(Math.random() * colors.length)];
    $('.show-username').css('background', random_color);

    $('.datatables').removeAttr('style');
    $('.treeview').hover(function(){
        $(this).children('a').css({
            'background': '#282b30'
        })
    },function(){
        $(this).children('a').css({
            'background': 'none'
        });
    })

    $('.list-controller ul li').click(function(){
        $('.list-action ul').hide();
        $('.list-controller ul li').removeClass('active');
        $('.list-action ul[data-controller='+ $(this).data('controller')+ ']').show();
        $(this).addClass('active');
    })

    //them class active cho buotton khi phan quyen cho group
    $(document).on('click','.list-action .btn-success',function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('#permission-'+ $(this).data('id')).prop('checked', true);
    })

    $(document).on('click','.btn-danger',function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        $('#permission-'+ $(this).data('id')).prop('checked', false);
    })
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip()
});


function toAlias(str){
    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    str= str.replace(/^\-+|\-+$/g,"");
    return str;
}

function closePopover() {
    $('[data-toggle="popover"]').popover('hide');
    $('.cart-overlay').remove();
}
function showModal(nameModal){
    $('#product-image img').remove();
    $('#category-image img').remove();
    $('#manufacturer-image img').remove();
    $('#up-img').hide();
    $("input[type=text]").val("");
    $('#action').val('add');
    $('#upload').hide();
    $('.choose-size').remove();
    if(typeof (CKEDITOR.instances['description']) != 'undefined')
        CKEDITOR.instances['description'].setData('');
    $('#parent option[value = 0]').attr('selected','selected');
    $('.' + nameModal).modal('show');
    $('.modal-footer #save-item').attr('type','submit');
}

function moneyFormat(value){
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
function converMoneyToDouble(price){
    return price.replace(/\./g,'');
}