<?php /* Smarty version 3.1.27, created on 2015-10-18 20:49:05
         compiled from "G:\xampp\htdocs\zend\public\template\backend\html\sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:253155623e9a18cde68_73936669%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c24724eb5ea97ce2deba888f765516d3e19624d' => 
    array (
      0 => 'G:\\xampp\\htdocs\\zend\\public\\template\\backend\\html\\sidebar.tpl',
      1 => 1445191822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253155623e9a18cde68_73936669',
  'variables' => 
  array (
    'this' => 0,
    'arrMenus' => 0,
    'menu' => 0,
    'xhtmlChildMenu' => 0,
    'menuChild' => 0,
    'xhtmlMenu' => 0,
    'urlImage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5623e9a1aac995_76611623',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5623e9a1aac995_76611623')) {
function content_5623e9a1aac995_76611623 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '253155623e9a18cde68_73936669';
if (isset($_smarty_tpl->tpl_vars['arrMenus'])) {$_smarty_tpl->tpl_vars['arrMenus'] = clone $_smarty_tpl->tpl_vars['arrMenus'];
$_smarty_tpl->tpl_vars['arrMenus']->value = array(array('class'=>'index','name'=>'Control Panel','icon'=>'dashboard','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/index/index')),array('class'=>'config','name'=>'Config','icon'=>'cog','link'=>'#','children'=>array(array('class'=>'config-email','name'=>'Email','icon'=>'angle-double-right','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/config/email')),array('class'=>'config-image','name'=>'Image','icon'=>'angle-double-right','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/config/image')))),array('class'=>'group','name'=>'Nhóm Thành Viên','icon'=>'group','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/group/index')),array('class'=>'user','name'=>'Thành viên','icon'=>'user','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/user/index')),array('class'=>'manager-product','name'=>'Quản lý sản phẩm','icon'=>'credit-card','link'=>'#','children'=>array(array('class'=>'category','name'=>'Chuyên mục sản phẩm','icon'=>'suitcase','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/category/index')),array('class'=>'product','name'=>'Sản phẩm','icon'=>'book','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/product/index')),array('class'=>'manufacturer','name'=>'Nhà Sản Xuất','icon'=>'building-o','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/manufacturer/index')))),array('class'=>'manager-posts','name'=>'Quản lý tin tức','icon'=>'newspaper-o','link'=>'#','children'=>array(array('class'=>'posts-category','name'=>'Chuyên mục bài viết','icon'=>'suitcase','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/posts-category/index')),array('class'=>'posts','name'=>'Bài viết','icon'=>'book','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/posts/index')))),array('class'=>'cart','name'=>'Cart','icon'=>'shopping-cart','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/cart/index'))); $_smarty_tpl->tpl_vars['arrMenus']->nocache = null; $_smarty_tpl->tpl_vars['arrMenus']->scope = 0;
} else $_smarty_tpl->tpl_vars['arrMenus'] = new Smarty_Variable(array(array('class'=>'index','name'=>'Control Panel','icon'=>'dashboard','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/index/index')),array('class'=>'config','name'=>'Config','icon'=>'cog','link'=>'#','children'=>array(array('class'=>'config-email','name'=>'Email','icon'=>'angle-double-right','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/config/email')),array('class'=>'config-image','name'=>'Image','icon'=>'angle-double-right','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/config/image')))),array('class'=>'group','name'=>'Nhóm Thành Viên','icon'=>'group','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/group/index')),array('class'=>'user','name'=>'Thành viên','icon'=>'user','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/user/index')),array('class'=>'manager-product','name'=>'Quản lý sản phẩm','icon'=>'credit-card','link'=>'#','children'=>array(array('class'=>'category','name'=>'Chuyên mục sản phẩm','icon'=>'suitcase','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/category/index')),array('class'=>'product','name'=>'Sản phẩm','icon'=>'book','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/product/index')),array('class'=>'manufacturer','name'=>'Nhà Sản Xuất','icon'=>'building-o','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/manufacturer/index')))),array('class'=>'manager-posts','name'=>'Quản lý tin tức','icon'=>'newspaper-o','link'=>'#','children'=>array(array('class'=>'posts-category','name'=>'Chuyên mục bài viết','icon'=>'suitcase','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/posts-category/index')),array('class'=>'posts','name'=>'Bài viết','icon'=>'book','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/posts/index')))),array('class'=>'cart','name'=>'Cart','icon'=>'shopping-cart','link'=>$_smarty_tpl->tpl_vars['this']->value->basePath('admin/cart/index'))), null, 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['xhtmlMenu'])) {$_smarty_tpl->tpl_vars['xhtmlMenu'] = clone $_smarty_tpl->tpl_vars['xhtmlMenu'];
$_smarty_tpl->tpl_vars['xhtmlMenu']->value = ''; $_smarty_tpl->tpl_vars['xhtmlMenu']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlMenu']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlMenu'] = new Smarty_Variable('', null, 0);?>
<?php
$_from = $_smarty_tpl->tpl_vars['arrMenus']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['menu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars['menu'];
?>
    <?php if (!empty($_smarty_tpl->tpl_vars['menu']->value['children'])) {?>

        <?php if (isset($_smarty_tpl->tpl_vars['xhtmlChildMenu'])) {$_smarty_tpl->tpl_vars['xhtmlChildMenu'] = clone $_smarty_tpl->tpl_vars['xhtmlChildMenu'];
$_smarty_tpl->tpl_vars['xhtmlChildMenu']->value = ''; $_smarty_tpl->tpl_vars['xhtmlChildMenu']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlChildMenu']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlChildMenu'] = new Smarty_Variable('', null, 0);?>
        <?php
$_from = $_smarty_tpl->tpl_vars['menu']->value['children'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['menuChild'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['menuChild']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menuChild']->value) {
$_smarty_tpl->tpl_vars['menuChild']->_loop = true;
$foreach_menuChild_Sav = $_smarty_tpl->tpl_vars['menuChild'];
?>
            <?php if (isset($_smarty_tpl->tpl_vars['xhtmlChildMenu'])) {$_smarty_tpl->tpl_vars['xhtmlChildMenu'] = clone $_smarty_tpl->tpl_vars['xhtmlChildMenu'];
$_smarty_tpl->tpl_vars['xhtmlChildMenu']->value = (((((((((($_smarty_tpl->tpl_vars['xhtmlChildMenu']->value).('<li class="admin-')).($_smarty_tpl->tpl_vars['menuChild']->value['class'])).('">')).('<a href="')).($_smarty_tpl->tpl_vars['menuChild']->value['link'])).('" style="margin-left: 10px;"><i class="fa fa-')).($_smarty_tpl->tpl_vars['menuChild']->value['icon'])).('"></i><span>')).($_smarty_tpl->tpl_vars['menuChild']->value['name'])).('</span></a></li>'); $_smarty_tpl->tpl_vars['xhtmlChildMenu']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlChildMenu']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlChildMenu'] = new Smarty_Variable((((((((((($_smarty_tpl->tpl_vars['xhtmlChildMenu']->value).('<li class="admin-')).($_smarty_tpl->tpl_vars['menuChild']->value['class'])).('">')).('<a href="')).($_smarty_tpl->tpl_vars['menuChild']->value['link'])).('" style="margin-left: 10px;"><i class="fa fa-')).($_smarty_tpl->tpl_vars['menuChild']->value['icon'])).('"></i><span>')).($_smarty_tpl->tpl_vars['menuChild']->value['name'])).('</span></a></li>'), null, 0);?>
        <?php
$_smarty_tpl->tpl_vars['menuChild'] = $foreach_menuChild_Sav;
}
?>
        <?php if (isset($_smarty_tpl->tpl_vars['xhtmlMenu'])) {$_smarty_tpl->tpl_vars['xhtmlMenu'] = clone $_smarty_tpl->tpl_vars['xhtmlMenu'];
$_smarty_tpl->tpl_vars['xhtmlMenu']->value = (((((((((((($_smarty_tpl->tpl_vars['xhtmlMenu']->value).('<li class="treeview admin-')).($_smarty_tpl->tpl_vars['menu']->value['class'])).('">')).('<a href="')).($_smarty_tpl->tpl_vars['menu']->value['link'])).('"><i class="fa fa-')).($_smarty_tpl->tpl_vars['menu']->value['icon'])).('"></i><span>')).($_smarty_tpl->tpl_vars['menu']->value['name'])).('</span><i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">')).($_smarty_tpl->tpl_vars['xhtmlChildMenu']->value)).('</ul></li>'); $_smarty_tpl->tpl_vars['xhtmlMenu']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlMenu']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlMenu'] = new Smarty_Variable((((((((((((($_smarty_tpl->tpl_vars['xhtmlMenu']->value).('<li class="treeview admin-')).($_smarty_tpl->tpl_vars['menu']->value['class'])).('">')).('<a href="')).($_smarty_tpl->tpl_vars['menu']->value['link'])).('"><i class="fa fa-')).($_smarty_tpl->tpl_vars['menu']->value['icon'])).('"></i><span>')).($_smarty_tpl->tpl_vars['menu']->value['name'])).('</span><i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu">')).($_smarty_tpl->tpl_vars['xhtmlChildMenu']->value)).('</ul></li>'), null, 0);?>
    <?php } else { ?>
        <?php if (isset($_smarty_tpl->tpl_vars['xhtmlMenu'])) {$_smarty_tpl->tpl_vars['xhtmlMenu'] = clone $_smarty_tpl->tpl_vars['xhtmlMenu'];
$_smarty_tpl->tpl_vars['xhtmlMenu']->value = (((((((((($_smarty_tpl->tpl_vars['xhtmlMenu']->value).('<li class="admin-')).($_smarty_tpl->tpl_vars['menu']->value['class'])).('">')).('<a href="')).($_smarty_tpl->tpl_vars['menu']->value['link'])).('"><i class="fa fa-')).($_smarty_tpl->tpl_vars['menu']->value['icon'])).('"></i><span>')).($_smarty_tpl->tpl_vars['menu']->value['name'])).('</span></a></li>'); $_smarty_tpl->tpl_vars['xhtmlMenu']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlMenu']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlMenu'] = new Smarty_Variable((((((((((($_smarty_tpl->tpl_vars['xhtmlMenu']->value).('<li class="admin-')).($_smarty_tpl->tpl_vars['menu']->value['class'])).('">')).('<a href="')).($_smarty_tpl->tpl_vars['menu']->value['link'])).('"><i class="fa fa-')).($_smarty_tpl->tpl_vars['menu']->value['icon'])).('"></i><span>')).($_smarty_tpl->tpl_vars['menu']->value['name'])).('</span></a></li>'), null, 0);?>
    <?php }?>
<?php
$_smarty_tpl->tpl_vars['menu'] = $foreach_menu_Sav;
}
?>

<section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $_smarty_tpl->tpl_vars['urlImage']->value;?>
/avatar3.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Hello, Jane</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <?php echo $_smarty_tpl->tpl_vars['xhtmlMenu']->value;?>

    </ul>
</section><?php }
}
?>