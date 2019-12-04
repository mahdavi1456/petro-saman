<?php $u_id = $_SESSION['user_id']; $media = new media(); ?>
<header class="main-header">
	<a href="<?php get_url(); ?>index.php" class="logo">
		<span class="logo-mini">P<b>S</b></span>
		<span class="logo-lg">پترو<b> سامان</b></span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!--li class="dropdown messages-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  		<i class="fa fa-envelope-o"></i>
				  		<span class="label label-success">۴</span>
					</a>
					<ul class="dropdown-menu">
				  		<li class="header">You have 4 messages</li>
				  		<li>
							<ul class="menu">
								<li>
									<a href="#">
										<div class="pull-right">
											<img src="" class="img-circle" alt="User Image">
										</div>
										<h4>
											Reviewers
											<small><i class="fa fa-clock-o"></i> 2 days</small>
										</h4>
										<p>Why not buy a new awesome theme?</p>
									</a>
								</li>
							</ul>
				  		</li>
				  		<li class="footer"><a href="#">See All Messages</a></li>
					</ul>
			  	</li>
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i>
						<span class="label label-warning">۱۰</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 10 notifications</li>
						<li>
							<ul class="menu">
								<li>
									<a href="#">
										<i class="fa fa-users text-aqua"></i> 5 new members joined today
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-users text-red"></i> 5 new members joined
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-shopping-cart text-green"></i> 25 sales made
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-user text-red"></i> You changed your username
									</a>
								</li>
							</ul>
						</li>
						<li class="footer"><a href="#">View all</a></li>
					</ul>
				</li>
				<li class="dropdown tasks-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-flag-o"></i>
						<span class="label label-danger">۹</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 9 tasks</li>
						<li>
							<ul class="menu">
								<li>
									<a href="#">
										<h3>
											Design some buttons
											<small class="pull-left">20%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">20% Complete</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<h3>
											Create a nice theme
											<small class="pull-left">40%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">40% Complete</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<h3>
											Some task I need to do
											<small class="pull-left">60%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<h3>
											Make beautiful transitions
											<small class="pull-left">80%</small>
										</h3>
										<div class="progress xs">
											<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">80% Complete</span>
											</div>
										</div>
									</a>	
								</li>
							</ul>
						</li>
						<li class="footer">
							<a href="#">View all tasks</a>
						</li>
					</ul>
				</li-->

				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo $media->get_user_avatar($u_id); ?>" class="user-image">
						<span class="hidden-xs"><?php echo $_SESSION['name'] . " " . $_SESSION['family']; ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="<?php echo $media->get_user_avatar($u_id); ?>" class="img-circle">
							<p>
								<?php echo $_SESSION['name'] . " " . $_SESSION['family']; ?>
								<small><?php echo $_SESSION['level']; ?></small>
							</p>
						</li>
						<li class="user-footer">
							<div class="pull-right">
								<a href="<?php get_url(); ?>user/list-user.php" class="btn btn-default btn-flat">پروفایل</a>
							</div>
							<div class="pull-left">
								<a href="<?php get_url(); ?>index.php?logout=yes" class="btn btn-default btn-flat">خروج</a>
							</div>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php get_url(); ?>index.php?logout=yes"><i class="fa fa-power-off"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>