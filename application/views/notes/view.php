<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Notes | NoteCraft</title>

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
						<h1>Notes</h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>">Home</a></li>
							<li class="breadcrumb-item active">Notes</li>
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
								<h3 class="card-title">All Notes</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="data-table" class="table table-sm table-hover table-bordered">
										<thead>
										<tr>
											<th>ID</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Title</th>
											<th>Description</th>
											<th>Status</th>
											<th>Created At</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>

										<?php foreach ($notes as $item) { ?>
											<tr>
												<td><?php echo $item->id; ?></td>
												<td><?php echo $item->full_name; ?></td>
												<td><?php echo $item->email; ?></td>
												<td title="<?php echo $item->title; ?>"><?php echo strlen($item->title) > 14 ? substr($item->title, 0, 14) . '...' : $item->title; ?></td>
												<td title="<?php echo $item->description; ?>"><?php echo strlen($item->description) > 26 ? substr($item->description, 0, 26) . '...' : $item->description; ?></td>
												<td>
													<?php if ($item->status == "active") { ?>
														<span class="badge bg-success"><?php echo ucfirst($item->status); ?></span>
													<?php } else { ?>
														<span class="badge bg-danger"><?php echo ucfirst($item->status); ?></span>
													<?php } ?>
												</td>
												<td><?php echo date('d-M-Y', strtotime($item->created_at)); ?></td>
												<td class="text-center">
													<?php if ($view_by == "user") { ?>
														<a href="<?php echo site_url('users/delete-note/'.$user_id.'/'.$item->id); ?>" class="btn btn-secondary btn-xs ml-1" title="Delete"><i class="fa fa-fw fa-trash"></i></a>
													<?php } else { ?>
														<a href="<?php echo site_url('notes/delete/'.$item->id); ?>" class="btn btn-secondary btn-xs ml-1" title="Delete"><i class="fa fa-fw fa-trash"></i></a>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>

										</tbody>
									</table>
								</div>

							</div>
							<div class="card-footer"></div>
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
