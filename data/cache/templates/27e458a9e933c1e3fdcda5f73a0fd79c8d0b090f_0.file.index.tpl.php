<?php /* Smarty version 3.1.27, created on 2015-10-18 20:49:05
         compiled from "G:\xampp\htdocs\zend\public\template\backend\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:300685623e9a1703e42_00204425%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27e458a9e933c1e3fdcda5f73a0fd79c8d0b090f' => 
    array (
      0 => 'G:\\xampp\\htdocs\\zend\\public\\template\\backend\\index.tpl',
      1 => 1445192206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300685623e9a1703e42_00204425',
  'variables' => 
  array (
    'this' => 0,
    'urlImage' => 0,
    'urlCSS' => 0,
    'urlJS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5623e9a186fc09_72310624',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5623e9a186fc09_72310624')) {
function content_5623e9a186fc09_72310624 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '300685623e9a1703e42_00204425';
if (isset($_smarty_tpl->tpl_vars['urlCSS'])) {$_smarty_tpl->tpl_vars['urlCSS'] = clone $_smarty_tpl->tpl_vars['urlCSS'];
$_smarty_tpl->tpl_vars['urlCSS']->value = (URL_TEMPLATE).('/backend/css'); $_smarty_tpl->tpl_vars['urlCSS']->nocache = null; $_smarty_tpl->tpl_vars['urlCSS']->scope = 0;
} else $_smarty_tpl->tpl_vars['urlCSS'] = new Smarty_Variable((URL_TEMPLATE).('/backend/css'), null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['urlJS'])) {$_smarty_tpl->tpl_vars['urlJS'] = clone $_smarty_tpl->tpl_vars['urlJS'];
$_smarty_tpl->tpl_vars['urlJS']->value = (URL_TEMPLATE).('/backend/js'); $_smarty_tpl->tpl_vars['urlJS']->nocache = null; $_smarty_tpl->tpl_vars['urlJS']->scope = 0;
} else $_smarty_tpl->tpl_vars['urlJS'] = new Smarty_Variable((URL_TEMPLATE).('/backend/js'), null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['urlImage'])) {$_smarty_tpl->tpl_vars['urlImage'] = clone $_smarty_tpl->tpl_vars['urlImage'];
$_smarty_tpl->tpl_vars['urlImage']->value = (URL_TEMPLATE).('/backend/img'); $_smarty_tpl->tpl_vars['urlImage']->nocache = null; $_smarty_tpl->tpl_vars['urlImage']->scope = 0;
} else $_smarty_tpl->tpl_vars['urlImage'] = new Smarty_Variable((URL_TEMPLATE).('/backend/img'), null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['this']->value->doctype();?>

<html>
<head>
    <?php echo $_smarty_tpl->tpl_vars['this']->value->headTitle()->prepend('BookOnline');?>

    <?php echo $_smarty_tpl->tpl_vars['this']->value->headMeta()->appendName('viewport','width=device-width, initial-scale=1.0')->appendName('description','ZendVN - Zend framework 2.x')->setCharset('utf-8');?>


    <?php echo $_smarty_tpl->tpl_vars['this']->value->headLink()->appendStylesheet(array('rel'=>'shortcut icon','type'=>'image/x-icon','href'=>($_smarty_tpl->tpl_vars['urlImage']->value).('/favicon.ico')),'PREPEND')->appendStylesheet(($_smarty_tpl->tpl_vars['urlCSS']->value).('/bootstrap.min.css'))->appendStylesheet(($_smarty_tpl->tpl_vars['urlCSS']->value).('/fileinput.min.css'))->appendStylesheet(($_smarty_tpl->tpl_vars['urlCSS']->value).('/font-awesome.min.css'))->appendStylesheet(($_smarty_tpl->tpl_vars['urlCSS']->value).('/AdminLTE.css'))->appendStylesheet(($_smarty_tpl->tpl_vars['urlCSS']->value).('/datatables/dataTables.bootstrap.css'))->appendStylesheet(($_smarty_tpl->tpl_vars['urlCSS']->value).('/jquery.dataTables.min.css'))->appendStylesheet(($_smarty_tpl->tpl_vars['urlCSS']->value).('/datatables.css'))->appendStylesheet(($_smarty_tpl->tpl_vars['urlCSS']->value).('/template.css'));?>

    <?php echo '<script'; ?>
 src="<?php echo ($_smarty_tpl->tpl_vars['urlJS']->value).('/jquery.min.js');?>
" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo ($_smarty_tpl->tpl_vars['urlJS']->value).('/fileinput.min.js');?>
" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo URL_PUBLIC . '/scripts/ckeditor/ckeditor.js'?>" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body class="skin-blue">
<!-- HEADER START -->
<header class="header">
    <?php echo $_smarty_tpl->getSubTemplate ('html/nav-left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('html/nav-right.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</header>
<!-- HEADER END -->
<div class="wrapper row-offcanvas row-offcanvas-left"
     style="min-height: 599px;">
    <!-- SIDEBAR START -->
    <aside class="left-side sidebar-offcanvas" style="min-height: 1772px;">
        <?php echo $_smarty_tpl->getSubTemplate ('html/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </aside>
    <!-- SIDEBAR END -->

    <!-- CONTENT START -->
    <aside class="right-side">
        <section class="content-header">
            <?php echo $_smarty_tpl->getSubTemplate ('html/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </section>
        <section class="content">
            <?php echo $_smarty_tpl->tpl_vars['this']->value->content;?>

        </section>
    </aside>
    <!-- CONTENT END -->
</div>
<?php echo $_smarty_tpl->tpl_vars['this']->value->headScript()->appendFile(($_smarty_tpl->tpl_vars['urlJS']->value).('/bootstrap.min.js'))->appendFile(($_smarty_tpl->tpl_vars['urlJS']->value).('/AdminLTE/app.js'))->appendFile(($_smarty_tpl->tpl_vars['urlJS']->value).('/jquery.dataTables.min.js'))->appendFile(($_smarty_tpl->tpl_vars['urlJS']->value).('/datatables.js'))->appendFile(($_smarty_tpl->tpl_vars['urlJS']->value).('/function.js'))->appendFile(($_smarty_tpl->tpl_vars['urlJS']->value).('/ajax.js'));?>

<?php echo '<script'; ?>
 type="text/javascript">
    var classParent = '<?php echo '<?php ';?>echo $this->module . "-" . $this->controller;<?php echo '?>';?>';
    var classChild = '<?php echo '<?php ';?>echo $this->module . "-" . $this->controller . "-" . $this->action;<?php echo '?>';?>';
    $('ul.sidebar-menu > li.' + classParent).addClass('active');
    $('ul.treeview-menu > li.' + classChild).addClass('active');
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>