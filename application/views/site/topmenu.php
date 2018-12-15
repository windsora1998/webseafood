<div class="container">
	<div class="navbar navbar-expand-lg navbar-light rounded">			
		<div class="navbar-nav m-auto">
			<li class = "nav-item"> <a href="<?php echo base_url('home') ?>">Trang chủ</a> </li>
		</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar3">
			    		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar3">

			<?php foreach ($catalog_list as $row): ?>
  			<div class="dropdown m-auto">
    			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"> <?php echo $row->name ?> </button>
    			<div class="dropdown-menu">
    				<?php foreach ($product_list as $value): ?>
    					<?php if($value->catalog_id == $row->id): ?>
				      <a class="dropdown-item" href="<?php echo base_url('product/view/'.$value->id) ?>"> <?php echo $value->name ?> </a>
				  <?php endif; ?>
				  <?php endforeach; ?>
   				</div>
  			</div>
			<?php endforeach; ?>
  			<div class="navbar-nav m-auto">
				<li class = "nav-item"> <a href="#">Liên hệ</a> </li>
			</div>
		</div>
	</div>
</div>