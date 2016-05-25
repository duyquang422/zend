<?php
$arrMenus = array(
    array('class' => 'index', 'name' => 'Trang Chính', 'icon' => 'tachometer', 'link' => $this->basePath('admin/index/index')),
    array('class' => 'config', 'name' => 'Cấu Hình', 'icon' => 'cogs', 'link' => $this->basePath('admin/config/index')),
//    array('class' => 'index', 'name' => 'Bảng Điều Khiển', 'icon' => '', 'link' => $this->basePath('admin/home/index')),
    array('class' => 'manager-user', 'name' => 'Quản Lý Thành Viên', 'icon' => 'users', 'link' => '#', 'children' => array(
        array('class' => 'group', 'name' => 'Nhóm Thành Viên', 'icon' => 'group', 'link' => $this->basePath('admin/group/index')),
        array('class' => 'user', 'name' => 'Thành viên', 'icon' => 'user', 'link' => $this->basePath('admin/user/index')),
    )),
    array('class' => 'manager-product', 'name' => 'Quản Lý Sản Phẩm', 'icon' => 'credit-card', 'link' => '#', 'children' => array(
        array('class' => 'category', 'name' => 'Chuyên mục sản phẩm', 'icon' => 'suitcase', 'link' => $this->basePath('admin/category/index')),
        array('class' => 'product', 'name' => 'Sản phẩm', 'icon' => 'book', 'link' => $this->basePath('admin/product/index')),
        array('class' => 'product', 'name' => 'Hết hàng', 'icon' => 'warning', 'link' => $this->basePath('admin/product-in-stock/index')),
        array('class' => 'manufacturer', 'name' => 'Thương Hiệu', 'icon' => 'building-o', 'link' => $this->basePath('admin/manufacturer/index')),
        array('class' => 'gift-and-size', 'name' => 'thuộc tính và kích thước', 'icon' => 'delicious', 'link' => $this->basePath('admin/attributes-and-size/index')),
        array('class' => 'comment', 'name' => 'Bình Luận', 'icon' => 'comments-o', 'link' => $this->basePath('admin/comment/index'))
    )),
    array('class' => 'manager-posts', 'name' => 'Quản lý tin tức', 'icon' => 'newspaper-o', 'link' => '#', 'children' => array(
        array('class' => 'posts-category', 'name' => 'Chuyên mục bài viết', 'icon' => 'suitcase', 'link' => $this->basePath('admin/posts-category/index')),
        array('class' => 'posts', 'name' => 'Bài viết', 'icon' => 'book', 'link' => $this->basePath('admin/posts/index'))
    )),

    array('class' => 'cart', 'name' => 'Xử Lý Đơn Hàng', 'icon' => 'shopping-cart', 'link' => $this->basePath('admin/cart/index')),
    array('class' => 'pages', 'name' => 'Quản Lý Trang', 'icon' => 'file-o', 'link' => $this->basePath('admin/pages/index')),
    array('class' => 'tags', 'name' => 'Thẻ Hỗ Trợ SEO', 'icon' => 'tags', 'link' => $this->basePath('admin/tags/index')),
    array('class' => 'vgchat', 'name' => 'Quản Lý Chát', 'icon' => 'comment', 'link' => $this->basePath('admin/vchat/index')),
    array('class' => 'page365', 'name' => 'Tiếp Thị Với Facebook', 'icon' => 'facebook-square', 'link' => $this->basePath('admin/facebook/index')),
    array('class' => 'seo', 'name' => 'Hỗ Trợ SEO', 'icon' => 'globe', 'link' => '#'),
    array('class' => 'google', 'name' => 'Thống Kê Của Google', 'icon' => 'google', 'link' => $this->basePath('admin/google/index'))
);

$xhtmlMenu = '';
foreach ($arrMenus as $menu) {
    if (!empty($menu['children'])) {
        $xhtmlChildMenu = '';
        foreach ($menu['children'] as $menuChild) {
            $xhtmlChildMenu .= sprintf('<li class="admin-%s">
    <a href="%s" style="margin-left: 10px;">
        <i class="fa fa-%s"></i> %s
    </a>
</li>', $menuChild['class'], $menuChild['link'], $menuChild['icon'], $menuChild['name']);
        }
        $xhtmlMenu .= sprintf('<li class="treeview admin-%s">
    <a href="%s">
        <i class="fa fa-%s"></i> <span>%s</span><i class="fa fa-angle-right pull-right"></i>
    </a>
    <ul class="treeview-menu">
        %s
    </ul>
</li>', $menu['class'], $menu['link'], $menu['icon'], $menu['name'], $xhtmlChildMenu);
    } else {
        $xhtmlMenu .= sprintf('<li class="admin-%s">
    <a href="%s">
        <i class="fa fa-%s"></i><span>%s</span>
    </a>
</li>', $menu['class'], $menu['link'], $menu['icon'], $menu['name']);
    }
}

?>


<section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <div class="show-username"><?php echo substr($this->identity()->username,strrpos($this->identity()->username,' '),2)?></div>
        </div>
        <div class="pull-left info">
            <p><?php echo $this->identity()->username ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <?php echo $xhtmlMenu; ?>
    </ul>
</section>