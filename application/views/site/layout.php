<html>
	<head>
		<!-- load head -->
		<?php $this->load->view('site/head'); ?>	
	</head>
	<body>
	
	<header id="header">
		<!-- top header -->
		<div class="top_header">
			<?php $this->load->view('site/header'); ?>	
		</div>

		<!-- bot header -->
		<div class="bot_header">
			<?php $this->load->view('site/botheader'); ?>	
		</div>	
	</header><!-- /header -->

	<!-- menu navbar -->
	<div class="top_menu">
		<?php $this->load->view('site/topmenu', $this->data); ?>			
	</div>
		
		<!-- product  -->
		<div class = "product_content">
			<div class="container">
				<div class="row">
					<?php $this->load->view($temp, $this->data); ?>
				</div>
			</div>
		</div>

	<footer class = "footer">
		<?php $this->load->view('site/footer'); ?>					
	</footer>
	
	<!-- script -->
	<?php $this->load->view('site/script'); ?>					
	</body>
</html>