<?php
$aliasName = array(
    'controller' => array(
        'group' => 'Quản Lý Nhóm',
        'user' => 'Quản Lý Thành Viên',
        'category' => 'Chuyên Mục Sản Phẩm',
        'cart' => 'Quản Lý Đơn Hàng',
        'index' => 'Trang Quản Trị',
        'config' => 'Cấu Hình',
        'product' => 'Quản Lý Sản phẩm',
        'postscategory' => 'Chuyên Mục Tin Tức',
        'posts' => 'Quản Lý Tin Tức',
        'manufacturer' => 'Quản Lý Thương Hiệu',
        'hosting' => 'Hosting',
        'giftandsize' => 'Quà tặng và kích thước',
        'comment' => 'Bình Luận',
        'tags' => 'Thẻ Hỗ Trợ SEO',
        'google' => 'Thống Kê Của Google',
        'pages' => 'Quản Lý Trang',
        'home' => 'Bảng Điều Khiển'
    )
);
$headerNameParent = $aliasName['controller'][$this->controller];
$xhtmlHeader = sprintf('<h2>%s</h2>', $headerNameParent);
?>

<!-- HEADER -->
<div class="row">
    <?php
        echo '<div class="col-sm-6 title">',$xhtmlHeader, '</div>';
        if($this->controller != 'index'
            && $this->controller != 'hosting'
            && $this->controller != 'cart'
            && $this->controller != 'home'
            && $this->controller != 'user'
        )
            echo '<div class="col-sm-6 btn-function">',$this->btnFunction($this->controller), '</div>';
        if($this->controller == 'index'){?>
            <div class="easy-pie-char">
                <div class="list-chart">
                    <span class="income" data-percent="85">
                        <span class="percent"></span>
                    </span>
                    <span class="title">Doanh Thu</span>
                </div>
                <div class="list-chart">
                    <span class="order" data-percent="70">
                        <span class="percent"></span>
                    </span>
                    <span class="title">Đơn Hàng</span>
                </div>
                <div class="list-chart">
                    <span class="bought" data-percent="90">
                        <span class="percent"></span>
                    </span>
                    <span class="title">Đã Bán</span>
                </div>
            </div>
            <script>
                showChar('.income','#00acec');
                showChar('.order','#f8a326');
                showChar('.bought','#f34541');
                function showChar(object,color){
                    document.addEventListener('DOMContentLoaded', function() {
                        var chart = window.chart = new EasyPieChart(document.querySelector(object), {
                            easing: 'easeOutElastic',
                            delay: 5000,
                            barColor: color,
                            trackColor: '#eee',
                            scaleColor: false,
                            lineWidth: 4,
                            size:48,
                            trackWidth: 4,
                            lineCap: 'butt',
                            onStep: function (from, to, percent) {
                                this.el.children[0].innerHTML = Math.round(percent);
                            }
                        });
                    })
                }
            </script>
       <?php } ?>
</div>