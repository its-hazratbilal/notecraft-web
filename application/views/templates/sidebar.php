<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="<?php echo site_url('home'); ?>" class="brand-link">
		<img src="<?php echo base_url('assets/img/logo.png') ?>" alt="NoteCraft" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">NoteCraft</span>
	</a>

	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url('assets/img/avatar.png') ?>" class="img-circle elevation-2" alt="Admin">
			</div>
			<div class="info">
				<a href="<?php echo site_url('home'); ?>" class="d-block"><?php echo $this->session->userdata('full_name'); ?></a>
			</div>
		</div>

		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?php echo site_url('home'); ?>" class="nav-link">
						<i class="nav-icon fa fa-home"></i>
						<p>Home</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-users"></i>
						<p>
							Users <i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo site_url('users/create'); ?>" class="nav-link">
								<i class="fa fa-plus-square nav-icon"></i>
								<p>Create</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('users'); ?>" class="nav-link">
								<i class="fa fa-list nav-icon"></i>
								<p>View</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?php echo site_url('notes'); ?>" class="nav-link">
						<i class="nav-icon fa fa-file-text"></i>
						<p>Notes</p>
					</a>
				</li>

				<li class="nav-header">ACCOUNT</li>
				<li class="nav-item">
					<a href="<?php echo site_url('logout'); ?>" class="nav-link">
						<i class="nav-icon fa fa-user"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
