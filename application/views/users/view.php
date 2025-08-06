<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users | NoteCraft</title>

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
						<h1>Users</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>">Home</a></li>
							<li class="breadcrumb-item active">Users</li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="content">

			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">All Users</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data-table" class="table table-sm table-hover table-bordered">
										<thead>
										<tr>
											<th>ID</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Gender</th>
											<th>Role</th>
											<th>Status</th>
											<th>Created At</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>

										<?php foreach ($users as $item) { ?>
											<tr>
												<td><?php echo $item->id; ?></td>
												<td><?php echo $item->full_name; ?></td>
												<td><?php echo $item->email; ?></td>
												<td><?php echo $item->gender; ?></td>
												<td>
													<?php if ($item->role == "admin") { ?>
														<span class="badge bg-primary"><?php echo ucfirst($item->role); ?></span>
													<?php } else { ?>
														<?php echo ucfirst($item->role); ?>
													<?php } ?>
												</td>
												<td>
													<?php if ($item->status == "active") { ?>
														<span class="badge bg-success"><?php echo ucfirst($item->status); ?></span>
													<?php } else { ?>
														<span class="badge bg-danger"><?php echo ucfirst($item->status); ?></span>
													<?php } ?>
												</td>
												<td><?php echo date('d-M-Y', strtotime($item->created_at)); ?></td>
												<td class="text-center">
													<a href="<?php echo site_url('users/edit/'.$item->id); ?>" class="btn btn-secondary btn-xs" title="Edit"><i class="fa fa-fw fa-edit"></i></a>
													<a href="<?php echo site_url('users/view-notes/'.$item->id); ?>" class="btn btn-secondary btn-xs ml-1" title="View Notes"><i class="fa fa-fw fa-file-text"></i></a>
													<a href="<?php echo site_url('users/delete/'.$item->id); ?>" class="btn btn-secondary btn-xs ml-1" title="Delete"><i class="fa fa-fw fa-trash"></i></a>
												</td>
											</tr>
										<?php } ?>

										</tbody>
									</table>
								</div>

							</div>
							<div class="card-footer">
							</div>
						</div>
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
