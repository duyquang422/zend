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
        'home' => 'Bảng Điều Khiển',
        'productinstock' => 'Sản Phẩm Tồn Kho'
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
            && $this->controller != 'productinstock'
        )
            echo '<div class="col-sm-6 btn-function">',$this->btnFunction($this->controller), '</div>';
        if($this->controller == 'index'){
            echo $this->criteria();
        } ?>
</div>