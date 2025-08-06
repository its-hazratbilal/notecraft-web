<script type="text/javascript"> var BASE_URL = '<?php echo base_url(); ?>';</script>

<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/adminlte.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/toastr.min.js') ?>"></script>

<script src="<?php echo base_url('assets/js/script.js') ?>"></script>

<?php if ($this->session->flashdata('success_message')) { ?>
	<script> toastr["success"]("<?php echo $this->session->flashdata('success_message'); ?>") </script>
<?php } ?>
<?php if ($this->session->flashdata('warning_message')) { ?>
	<script> toastr["warning"]("<?php echo $this->session->flashdata('warning_message'); ?>") </script>
<?php } ?>
<?php if ($this->session->flashdata('error_message')) { ?>
	<script> toastr["error"]("<?php echo $this->session->flashdata('error_message'); ?>") </script>
<?php } ?>
