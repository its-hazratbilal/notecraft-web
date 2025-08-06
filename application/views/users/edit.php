<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit User | NoteCraft</title>

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
						<h1>Edit User</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>">Hme</a></li>
							<li class="breadcrumb-item">Users</li>
							<li class="breadcrumb-item active">Edit</li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="content">

			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<form action="<?php echo site_url('users/update'); ?>" method="post">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h3 class="card-title">Edit User</h3>
								</div>
								<div class="card-body">
									<input type="hidden" name="id" value="<?php echo $user->id; ?>" />
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Full Name</label>
												<input type="text" class="form-control" value="<?php echo $user->full_name; ?>" name="full_name" placeholder="Full Name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Email</label>
												<input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>" placeholder="example@domain.com" readonly required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Gender</label>
												<select name="gender" class="form-control form-select">
													<option value="male" <?php echo $user->gender=="male"?"selected":""; ?>>Male</option>
													<option value="female" <?php echo $user->gender=="female"?"selected":""; ?>>Female</option>
													<option value="other" <?php echo $user->gender=="other"?"selected":""; ?>>Other</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Role</label>
												<select name="role" class="form-control form-select">
													<option value="admin" <?php echo $user->role=="admin"?"selected":""; ?>>Admin</option>
													<option value="user" <?php echo $user->role=="user"?"selected":""; ?>>User</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Status</label>
												<select name="status" class="form-control form-select">
													<option value="active" <?php echo $user->status=="active"?"selected":""; ?>>Active</option>
													<option value="blocked" <?php echo $user->status=="blocked"?"selected":""; ?>>Blocked</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Password <small>(optional)</small></label>
												<input type="password" class="form-control" name="password" placeholder="********">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Confirm Password <small>(optional)</small></label>
												<input type="password" class="form-control" name="confirm_password" placeholder="********">
											</div>
										</div>
									</div>

								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Update User</button>
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
