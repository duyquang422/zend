<?php /* Smarty version 3.1.27, created on 2015-10-18 20:49:05
         compiled from "G:\xampp\htdocs\zend\public\template\backend\html\nav-right.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:28345623e9a18b2b49_79494772%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54f54a5c357a03416667bbc92d0a345cc88e238b' => 
    array (
      0 => 'G:\\xampp\\htdocs\\zend\\public\\template\\backend\\html\\nav-right.tpl',
      1 => 1419653907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28345623e9a18b2b49_79494772',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5623e9a18c39f9_35954363',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5623e9a18c39f9_35954363')) {
function content_5623e9a18c39f9_35954363 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '28345623e9a18b2b49_79494772';
?>
<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
		<span class="sr-only">Toggle navigation</span> 
		<span class="icon-bar"></span> 
		<span class="icon-bar"></span> 
		<span class="icon-bar"></span>
	</a>
	
	<div class="navbar-right">
		<ul class="nav navbar-nav">
			<!-- User Account: style can be found in dropdown.less -->
			<li class="dropdown user user-menu"><a href="#"
				class="dropdown-toggle" data-toggle="dropdown"> <i
					class="glyphicon glyphicon-user"></i> <span>Jane Doe <i
						class="caret"></i></span>
			</a>
				<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header bg-light-blue"><img src="<?php echo '<?php ';?>echo $urlImage;<?php echo '?>';?>/avatar3.png"
						class="img-circle" alt="User Image" />
						<p>
							Jane Doe - Web Developer <small>Member since Nov. 2012</small>
						</p></li>
					<!-- Menu Body -->
					
					<!-- Menu Footer-->
					<li class="user-footer">
						<div class="pull-left">
							<a href="#" class="btn btn-default btn-flat">Profile</a>
						</div>
						<div class="pull-right">
							<a href="#" class="btn btn-default btn-flat">Sign out</a>
						</div>
					</li>
				</ul></li>
		</ul>
	</div>
</nav><?php }
}
?>