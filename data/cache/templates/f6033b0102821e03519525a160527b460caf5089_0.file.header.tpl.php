<?php /* Smarty version 3.1.27, created on 2015-10-18 20:49:05
         compiled from "G:\xampp\htdocs\zend\public\template\backend\html\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:299205623e9a1abfc75_52297496%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6033b0102821e03519525a160527b460caf5089' => 
    array (
      0 => 'G:\\xampp\\htdocs\\zend\\public\\template\\backend\\html\\header.tpl',
      1 => 1445193107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '299205623e9a1abfc75_52297496',
  'variables' => 
  array (
    'this' => 0,
    'aliasName' => 0,
    'headerNameParent' => 0,
    'headerNameChild' => 0,
    'xhtmlHeader' => 0,
    'xhtmlBreadcrumb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5623e9a1b994e3_97474235',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5623e9a1b994e3_97474235')) {
function content_5623e9a1b994e3_97474235 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '299205623e9a1abfc75_52297496';
if (isset($_smarty_tpl->tpl_vars['aliasName'])) {$_smarty_tpl->tpl_vars['aliasName'] = clone $_smarty_tpl->tpl_vars['aliasName'];
$_smarty_tpl->tpl_vars['aliasName']->value = array('controller'=>array('group'=>'Manage Group','user'=>'Manage User','category'=>'Manage Category','book'=>'Manage Book','cart'=>'Manage Cart','index'=>'Dashboard','config'=>'Config','product'=>'Product','postscategory'=>'Quản lý bài viết','posts'=>'Bài viết','manufacturer'=>'Thương Hiệu'),'action'=>array('index'=>'List','info'=>'Info','add'=>'Add','edit'=>'Edit','delete'=>'Delete','email'=>'Email','image'=>'Image','form'=>'info','reload'=>'reload','test'=>'test')); $_smarty_tpl->tpl_vars['aliasName']->nocache = null; $_smarty_tpl->tpl_vars['aliasName']->scope = 0;
} else $_smarty_tpl->tpl_vars['aliasName'] = new Smarty_Variable(array('controller'=>array('group'=>'Manage Group','user'=>'Manage User','category'=>'Manage Category','book'=>'Manage Book','cart'=>'Manage Cart','index'=>'Dashboard','config'=>'Config','product'=>'Product','postscategory'=>'Quản lý bài viết','posts'=>'Bài viết','manufacturer'=>'Thương Hiệu'),'action'=>array('index'=>'List','info'=>'Info','add'=>'Add','edit'=>'Edit','delete'=>'Delete','email'=>'Email','image'=>'Image','form'=>'info','reload'=>'reload','test'=>'test')), null, 0);?>
	<?php if (isset($_smarty_tpl->tpl_vars['headerNameParent'])) {$_smarty_tpl->tpl_vars['headerNameParent'] = clone $_smarty_tpl->tpl_vars['headerNameParent'];
$_smarty_tpl->tpl_vars['headerNameParent']->value = $_smarty_tpl->tpl_vars['aliasName']->value['controller'][$_smarty_tpl->tpl_vars['this']->value->controller]; $_smarty_tpl->tpl_vars['headerNameParent']->nocache = null; $_smarty_tpl->tpl_vars['headerNameParent']->scope = 0;
} else $_smarty_tpl->tpl_vars['headerNameParent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['aliasName']->value['controller'][$_smarty_tpl->tpl_vars['this']->value->controller], null, 0);?>
	<?php if (isset($_smarty_tpl->tpl_vars['headerNameChild'])) {$_smarty_tpl->tpl_vars['headerNameChild'] = clone $_smarty_tpl->tpl_vars['headerNameChild'];
$_smarty_tpl->tpl_vars['headerNameChild']->value = $_smarty_tpl->tpl_vars['aliasName']->value['action'][$_smarty_tpl->tpl_vars['this']->value->action]; $_smarty_tpl->tpl_vars['headerNameChild']->nocache = null; $_smarty_tpl->tpl_vars['headerNameChild']->scope = 0;
} else $_smarty_tpl->tpl_vars['headerNameChild'] = new Smarty_Variable($_smarty_tpl->tpl_vars['aliasName']->value['action'][$_smarty_tpl->tpl_vars['this']->value->action], null, 0);?>

	<?php if (isset($_smarty_tpl->tpl_vars['xhtmlHeader'])) {$_smarty_tpl->tpl_vars['xhtmlHeader'] = clone $_smarty_tpl->tpl_vars['xhtmlHeader'];
$_smarty_tpl->tpl_vars['xhtmlHeader']->value = (((('<h1>').($_smarty_tpl->tpl_vars['headerNameParent']->value)).('<small>')).($_smarty_tpl->tpl_vars['headerNameChild']->value)).('</small></h1>'); $_smarty_tpl->tpl_vars['xhtmlHeader']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlHeader']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlHeader'] = new Smarty_Variable((((('<h1>').($_smarty_tpl->tpl_vars['headerNameParent']->value)).('<small>')).($_smarty_tpl->tpl_vars['headerNameChild']->value)).('</small></h1>'), null, 0);?>

 	<?php if (isset($_smarty_tpl->tpl_vars['xhtmlBreadcrumb'])) {$_smarty_tpl->tpl_vars['xhtmlBreadcrumb'] = clone $_smarty_tpl->tpl_vars['xhtmlBreadcrumb'];
$_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->value = ''; $_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlBreadcrumb'] = new Smarty_Variable('', null, 0);?>
 	<?php if ($_smarty_tpl->tpl_vars['this']->value->controller != 'index') {?>
 		<?php if ($_smarty_tpl->tpl_vars['this']->value->action == 'index') {?>
 			<?php if (isset($_smarty_tpl->tpl_vars['xhtmlBreadcrumb'])) {$_smarty_tpl->tpl_vars['xhtmlBreadcrumb'] = clone $_smarty_tpl->tpl_vars['xhtmlBreadcrumb'];
$_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->value = (((('<li class="active">').($_smarty_tpl->tpl_vars['headerNameParent']->value)).('</li><li class="active">')).($_smarty_tpl->tpl_vars['headerNameChild']->value)).('</li>'); $_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlBreadcrumb'] = new Smarty_Variable((((('<li class="active">').($_smarty_tpl->tpl_vars['headerNameParent']->value)).('</li><li class="active">')).($_smarty_tpl->tpl_vars['headerNameChild']->value)).('</li>'), null, 0);?>
 		<?php } else { ?>
            <?php if (isset($_smarty_tpl->tpl_vars['xhtmlBreadcrumb'])) {$_smarty_tpl->tpl_vars['xhtmlBreadcrumb'] = clone $_smarty_tpl->tpl_vars['xhtmlBreadcrumb'];
$_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->value = (((((('<li class="active"><a href="').($_smarty_tpl->tpl_vars['this']->value->url('adminRoute/default',array('controller'=>$_smarty_tpl->tpl_vars['this']->value->controller,'action'=>'index')))).('">')).($_smarty_tpl->tpl_vars['headerNameParent']->value)).('</a></li><li class="active">')).($_smarty_tpl->tpl_vars['headerNameChild']->value)).('</li>'); $_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->nocache = null; $_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->scope = 0;
} else $_smarty_tpl->tpl_vars['xhtmlBreadcrumb'] = new Smarty_Variable((((((('<li class="active"><a href="').($_smarty_tpl->tpl_vars['this']->value->url('adminRoute/default',array('controller'=>$_smarty_tpl->tpl_vars['this']->value->controller,'action'=>'index')))).('">')).($_smarty_tpl->tpl_vars['headerNameParent']->value)).('</a></li><li class="active">')).($_smarty_tpl->tpl_vars['headerNameChild']->value)).('</li>'), null, 0);?>
        <?php }?>
    <?php }?>
<!-- HEADER -->
<?php echo $_smarty_tpl->tpl_vars['xhtmlHeader']->value;?>

<ol class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url('adminRoute');?>
"><i class="fa fa-dashboard"></i> Home</a></li>
	<?php echo $_smarty_tpl->tpl_vars['xhtmlBreadcrumb']->value;?>

</ol>
<?php }
}
?>