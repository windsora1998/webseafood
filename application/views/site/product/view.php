<!-- Single Product -->
<div class="single_product">
	<div class="container">
		<div class="row justify-content-center">
			<!-- Selected Image -->
			<div class="col-lg-6">
				<div class="image_selected"><img src="<?php echo base_url('upload/product/'.$product->image_link)?>"></div>
			</div>

			<!-- Description -->
			<div class="col-lg-4 mb-5">
				<div class="prdouct_description">
					<div class="product_name"> <?php echo $product->name ?> </div>
					<div class="product_text"><p><?php echo $product->content ?></p></div>
					<div class="order_info d-flex flex-row">
						<form action="#">
							<div class="clearfix">
								<!-- Product Quantity -->
								<div class="product_quantity clearfix">
									<span>Số lượng: </span>
									<input id="quantity_input" type="text" value="1">
									<div class="quantity_buttons">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
									</div>
								</div>
							</div>
							<div class="product_price"><?php echo $product->price - $product->discount ?> đ</div>
							<div class="product_price" style="text-decoration: line-through; "><?php echo $product->price - 0 ?> đ</div>
							<div class="button_container">
								<a href = "<?php echo base_url('cart/add/'.$product->id) ?>"> <button type="button" class="button cart_button"> Thêm Giỏ Hàng</button></a>
							</div>
						</form>
					</div>
				</div>
			</div>
			

			<?php if(is_array($image_list)): ?>
				<div class="owl-carousel owl-theme">
				<?php foreach ($image_list as $img): ?>
			
				<div class="items"> <span> <a> <img src="<?php echo base_url('upload/product/'.$img)?>"> </a> </span> </div>
		
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		</div>
	</div>
</div>
