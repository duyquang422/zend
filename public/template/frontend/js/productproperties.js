// Bi?n dùng ki?m tra n?u đang g?i ajax th? ko th?c hi?n g?i thêm
var is_busy = false;

// Bi?n lưu tr? trang hi?n t?i
var page = 1;

// Bi?n lưu tr? r?ng thái phân trang
var stopped = false;
$(window).scroll(function(){

    $element = $('#products-listing-filter-load');

    if ($(window).scrollTop() + $(window).height() >= $element.height()){

        // N?u đang g?i ajax th? ngưng
        if (is_busy == true){
            return false;
        }

        // Nếu hết dữ liệu thì ngưng
        if (stopped == true){
            return false;
        }

        // Thiết lập đang gửi ajax
        is_busy = true;

        // Tăng s? trang lên 1
        page++;

        $('.bg-load-ajax').removeClass('hidden');
        setTimeout(function() {
            $.ajax({
                url: basePath + 'home/product-properties/load-product-with-ajax?page=' + page + '&action=' + $('#action').val(),
                type: 'get',
                async: false,
                dataType: 'html',
                success: function (data) {
                    $('.load-more .row').append(data);
                }
            }).always(function () {
                // Sau khi th?c hi?n xong ajax th? ?n hidden và cho tr?ng thái g?i ajax = false
                $('.bg-load-ajax').addClass('hidden');
                is_busy = false;
            });
        },1500);
        return false;
    }
})
