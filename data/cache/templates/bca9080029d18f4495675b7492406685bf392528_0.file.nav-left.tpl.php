<?php /* Smarty version 3.1.27, created on 2015-10-18 20:49:05
         compiled from "G:\xampp\htdocs\zend\public\template\backend\html\nav-left.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:27175623e9a189bcc7_60915665%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bca9080029d18f4495675b7492406685bf392528' => 
    array (
      0 => 'G:\\xampp\\htdocs\\zend\\public\\template\\backend\\html\\nav-left.tpl',
      1 => 1445182049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27175623e9a189bcc7_60915665',
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5623e9a18a6952_73838502',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5623e9a18a6952_73838502')) {
function content_5623e9a18a6952_73838502 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '27175623e9a189bcc7_60915665';
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url('adminRoute');?>
" class="logo">
	ZendVN Bookstore
</a><?php }
}
?>