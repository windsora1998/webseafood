	 <?php foreach ($catalog_list as $row): ?>
		<!-- Sản phẩm cá -->
		<div class = "text-center text-md-left py-4"> 
			<!-- tiêu đề -->
			<div class ="icon_product">
				<span> <a href="#"> <?php echo $row->name ?> </a> </span>
			</div>
		</div>
		
		<!-- slider sản phẩm <-->
		<div class="owl-carousel owl-theme">
			<?php foreach ($product_list as $value): ?>
			<?php if($value->catalog_id == $row->id): ?>
				<div class="items"> <span> <a> <img src="<?php echo base_url('upload/product/'.$value->image_link)?>"> </a> </span> </div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
	<?php endforeach; ?>