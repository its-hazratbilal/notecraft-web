<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create User | NoteCraft</title>

	<?php $this->load->view('templates/header-script'); ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<?php $this->load->view('templates/header'); ?>

	<?php $this->load->view('templates/sidebar'); ?>

	<div class="content-wrapper">
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1>Create User</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>">Home</a></li>
							<li class="breadcrumb-item">Users</li>
							<li class="breadcrumb-item active">Create</li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<form action="<?php echo site_url('users/add'); ?>" method="post">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h3 class="card-title">Create User</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Full Name</label>
												<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Email</label>
												<input type="email" class="form-control" name="email" placeholder="example@domain.com" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Gender</label>
												<select name="gender" class="form-control form-select">
													<option value="male" selected>Male</option>
													<option value="female">Female</option>
													<option value="other">Other</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Role</label>
												<select name="role" class="form-control form-select">
													<option value="admin">Admin</option>
													<option value="user">User</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Status</label>
												<select name="status" class="form-control form-select">
													<option value="active" selected>Active</option>
													<option value="blocked">Blocked</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Password</label>
												<input type="password" class="form-control" name="password" placeholder="********" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Confirm Password</label>
												<input type="password" class="form-control" name="confirm_password" placeholder="********" required>
											</div>
										</div>
									</div>

								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add User</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php $this->load->view('templates/footer'); ?>

</div>

<?php $this->load->view('templates/footer-script'); ?>

</body>
</html>
