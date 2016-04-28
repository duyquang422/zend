$(function () {
    $('#slider-container').slider({
        range: true,
        min: 0,
        max: 1000000,
        values: [0, 1000000],
        slide: function (event, ui) {
            $('input[name=fromPrice]').val(moneyFormat(ui.values[0]));
            $('input[name=toPrice]').val(moneyFormat(ui.values[1]));
            filterAjax();
        }
    })
    //thực hiện việc di chuyển menu filter dưới dạng fixed
    $(window).bind('scroll',function(){
        if($('.col-right').height() > $('.filter-list').height()) {
            $('.col-left').height($('.col-right').height());
            if ($(this).scrollTop() > $('.col-left').offset().top + $('.filter-list').height() || $(this).scrollTop() + $('.filter-list').height() + 54 < $('#footer').offset().top) {
                $('.filter-list').addClass('fixed')
            }
            if ($(this).scrollTop() < $('.col-left').offset().top) {
                $('.filter-list').removeClass('fixed absolute')
            }
            if ($(this).scrollTop() + $('.filter-list').height() + 54 > $('#footer').offset().top) {
                $('.filter-list').removeClass('fixed').addClass('absolute');
            }
        }
    })

    function filterAjax(){
        $.ajax({
            url: 'home/category/sortBy',
            type: 'post',
            dataType: 'html',
            data: {
                attr: $('#filter-cate li.active').data('fil'),
                id: $('#category-id').val(),
                idCategory: $('.filter-body .filter-button.active').data('id'),
                star: $('.rating__stars-link.active').data('num') ? $('.rating__stars-link.active').data('num') : '',
                manuId: $('.manu.active').data('manuid') ? $('.manu.active').data('manuid') : '',
                fromPrice: parseInt($('.priceMin').val().replace(/\./g,'')),
                toPrice: parseInt($('.priceMax').val().replace(/\./g,''))
            },
            beforeSend: function(){
                $('.bg-load-ajax').height($('.col-left').height());
                $('.bg-load-ajax').show();
            },
            success: function(data){
                $('#products-listing-filter-load .row').html(data);
                $('.filter-list').removeClass('fixed absolute');
                window.scrollTo(0,0);
            },
            complete: function () {
                $('.bg-load-ajax').hide();
            }
        })
    }
    //lọc sản phẩm theo các thuộc tính
    $('#filter-cate li').on('click',function(){
        $('#filter-cate li').removeClass('active');
        $(this).addClass('active');
        filterAjax();
    })

    $('.filter-body .filter-button').on('click',function(){

        $('.filter-body .filter-button').removeClass('active');
        $(this).addClass('active');

        filterAjax();
    })

    $('.rating__stars-link').on('click',function(){
        $('.rating__stars-link').removeClass('active');
        $(this).addClass('active');
        filterAjax();
    })

    $('.manu').on('click',function(){
        $('.manu').removeClass('active');
        $(this).addClass('active');
        filterAjax();
    })

    $('.remove-filter').click(function(){
        window.location.reload();
    })
});