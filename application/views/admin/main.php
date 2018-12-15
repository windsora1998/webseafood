<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('admin/head'); ?>
	</head>

	<body id = "page-top">
		<!-- load header -->
		<?php $this->load->view('admin/header'); ?>
		
	<div id="wrapper">
		<?php $this->load->view('admin/left'); ?>
	
	</div>
		<!-- content -->
		<div id="content-wrapper">
			
			<div class="container-fluid">

				<?php $this->load->view($temp, $this->data); ?>	
			
			</div>
		</div>
		<!-- end content -->

		<?php $this->load->view('admin/script'); ?>
	</body>
</html>