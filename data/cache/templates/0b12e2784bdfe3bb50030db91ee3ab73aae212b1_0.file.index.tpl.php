<?php /* Smarty version 3.1.27, created on 2015-10-18 20:49:05
         compiled from "G:\xampp\htdocs\zend\module\Admin\view\admin\product\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:310475623e9a1337eb0_45658878%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b12e2784bdfe3bb50030db91ee3ab73aae212b1' => 
    array (
      0 => 'G:\\xampp\\htdocs\\zend\\module\\Admin\\view\\admin\\product\\index.tpl',
      1 => 1445194143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '310475623e9a1337eb0_45658878',
  'variables' => 
  array (
    'this' => 0,
    'arr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5623e9a13bcaa8_89100747',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5623e9a13bcaa8_89100747')) {
function content_5623e9a13bcaa8_89100747 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '310475623e9a1337eb0_45658878';
echo $_smarty_tpl->tpl_vars['this']->value->btnFunction();?>

<?php if (isset($_smarty_tpl->tpl_vars['arr'])) {$_smarty_tpl->tpl_vars['arr'] = clone $_smarty_tpl->tpl_vars['arr'];
$_smarty_tpl->tpl_vars['arr']->value = array(array('title'=>'Tên Sản Phẩm'),array('title'=>'Code'),array('title'=>'Thương hiệu'),array('title'=>'Tình trạng'),array('title'=>'Nổi bật'),array('title'=>'Hot'),array('title'=>'Chuyên mục'),array('title'=>'Giá gốc (VNĐ)'),array('title'=>'Giá bán (VNĐ)'),array('title'=>'Xem'),array('title'=>'Chức năng'),array('title'=>'Id')); $_smarty_tpl->tpl_vars['arr']->nocache = null; $_smarty_tpl->tpl_vars['arr']->scope = 0;
} else $_smarty_tpl->tpl_vars['arr'] = new Smarty_Variable(array(array('title'=>'Tên Sản Phẩm'),array('title'=>'Code'),array('title'=>'Thương hiệu'),array('title'=>'Tình trạng'),array('title'=>'Nổi bật'),array('title'=>'Hot'),array('title'=>'Chuyên mục'),array('title'=>'Giá gốc (VNĐ)'),array('title'=>'Giá bán (VNĐ)'),array('title'=>'Xem'),array('title'=>'Chức năng'),array('title'=>'Id')), null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['this']->value->datatable('product',$_smarty_tpl->tpl_vars['arr']->value);?>


<?php }
}
?>