<nav class="navbar navbar-static-top" role="navigation">
    <div class="title-admin">
        <span>Hệ Thống Trang Quản Trị Phiên Bản 1.1</span>
    </div>
	<div class="navbar-right">
		<ul class="nav navbar-nav">
			<!-- User Account: style can be found in dropdown.less -->
			<li class="dropdown user user-menu"><a href="#"
				class="dropdown-toggle" data-toggle="dropdown"> <i
					class="glyphicon glyphicon-user"></i> <span><?php echo $this->identity()->username ?><i
						class="caret"></i></span>
			</a>
				<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header bg-light-blue"><img src="<?php echo $urlImage;?>/avatar3.png"
						class="img-circle" alt="User Image" />
						<p>
							<?php echo $this->identity()->username ?> - Web Developer
						</p></li>
					<!-- Menu Body -->
					
					<!-- Menu Footer-->
					<li class="user-footer">
						<div class="pull-right">
							<a href="<?php echo $this->url('frontendRoute/default', array('controller' => 'index', 'action' => 'log-out')) ?>" class="btn btn-default btn-flat">Đăng Xuất</a>
						</div>
					</li>
				</ul></li>
		</ul>
	</div>
    <div class="list-notification">
        <a target="_blank" href="<?php echo $this->url('home') ?>">Trang chủ</a>
    </div>
    <!--<div class="list-notification">
        <ul>
            <li><i class="fa fa-user"></i></li>
            <li><i class="fa fa-comments"></i></li>
            <li><i class="fa fa-globe"></i></li>
        </ul>
    </div>-->
</nav>