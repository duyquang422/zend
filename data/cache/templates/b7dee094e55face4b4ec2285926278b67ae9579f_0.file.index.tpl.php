<?php /* Smarty version 3.1.27, created on 2015-10-18 20:48:01
         compiled from "G:\xampp\htdocs\zend\public\template\error\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:217045623e961272d60_35118006%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7dee094e55face4b4ec2285926278b67ae9579f' => 
    array (
      0 => 'G:\\xampp\\htdocs\\zend\\public\\template\\error\\index.tpl',
      1 => 1445182528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217045623e961272d60_35118006',
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5623e961323003_14529520',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5623e961323003_14529520')) {
function content_5623e961323003_14529520 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '217045623e961272d60_35118006';
echo $_smarty_tpl->tpl_vars['this']->value->layout()->setTemplate('layout/error');?>

<h1><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('An error occurred');?>
</h1>
<h2><?php echo $_smarty_tpl->tpl_vars['this']->value->message;?>
</h2>

<?php if (isset($this->display_exceptions) && $this->display_exceptions): ?>

<?php if(isset($this->exception) && $this->exception instanceof Exception): ?>
<hr/>
<h2><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Additional information');?>
:</h2>
<h3><?php echo get_class($_smarty_tpl->tpl_vars['this']->value->exception);?>
</h3>
<dl>
    <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('File');?>
:</dt>
    <dd>
        <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['this']->value->exception->getFile();?>
:<?php echo $_smarty_tpl->tpl_vars['this']->value->exception->getLine();?>
</pre>
    </dd>
    <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Message');?>
:</dt>
    <dd>
        <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['this']->value->escapeHtml($_smarty_tpl->tpl_vars['this']->value->exception->getMessage());?>
</pre>
    </dd>
    <dt><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Stack trace');?>
:</dt>
    <dd>
        <pre class="prettyprint linenums"><?php echo $_smarty_tpl->tpl_vars['this']->value->escapeHtml($_smarty_tpl->tpl_vars['this']->value->exception->getTraceAsString());?>
</pre>
    </dd>
</dl>
<?php 
    $e = $this->exception->getPrevious();
    if ($e){
?>
<hr/>
<h2><?php echo $_smarty_tpl->tpl_vars['this']->value->translate('Previous exceptions');?>
:</h2>
<ul class="unstyled">
    <?php while($e){ ?>
    <li>
        <h3><?php echo get_class($e); ?></h3>
        <dl>
            <dt><?php echo $this->translate('File') ?>:</dt>
            <dd>
                <pre class="prettyprint linenums"><?php echo $e->getFile() ?>:<?php echo $e->getLine() ?></pre>
            </dd>
            <dt><?php echo $this->translate('Message') ?>:</dt>
            <dd>
                <pre class="prettyprint linenums"><?php echo $this->escapeHtml($e->getMessage()) ?></pre>
            </dd>
            <dt><?php echo $this->translate('Stack trace') ?>:</dt>
            <dd>
                <pre class="prettyprint linenums"><?php echo $this->escapeHtml($e->getTraceAsString()) ?></pre>
            </dd>
        </dl>
    </li>
    <?php 
        $e = $e->getPrevious();
        }
    ?>
</ul>
<?php  } ?>

<?php else: ?>

<h3><?php echo $this->translate('No Exception available') ?></h3>

<?php endif ?>

<?php endif

}
}
?>