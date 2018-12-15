<!-- Cart -->
<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cart_container">
					<div class="cart_title"> <span>Giỏ Hàng có <?php echo $total_cart ?> sản phẩm </span></div>
					<?php $sum = 0; ?>
					<?php foreach ($carts as $row):?>	
					<?php $sum = $sum + $row['subtotal']; ?>				
					<div class="cart_items">
						<ul class="cart_list">
							<li class="clearfix">
								<div class="cart_item_image">
									<img src="<?php echo base_url('upload/product/'.$row['image_link'])?>">
								</div>
								<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
									<div class="cart_item_name cart_info_col">
										<div class="cart_item_title">Tên Sản Phẩm</div>
										<div class="cart_item_text"><?php echo $row['name'] ?></div>
									</div>
									<div class="cart_item_quantity cart_info_col">
										<div class="cart_item_title">Số lượng</div>
										<div class="cart_item_text"> <?php echo $row['qty'] ?></div>
									</div>
									<div class="cart_item_price cart_info_col">
										<div class="cart_item_title">Giá</div>
										<div class="cart_item_text"><?php echo $row['price'] ?> VNĐ</div>
									</div>
									<div class="cart_item_total cart_info_col">
										<div class="cart_item_title">Tổng Cộng</div>
										<div class="cart_item_text"><?php echo $row['subtotal'] ?> VNĐ</div>
									</div>
									<div class="cart_item_color cart_info_col">
										<div class="cart_item_title">Xóa</div>
										<div class="cart_item_text" >
											<a href="<?php echo base_url('cart/del/'.$row['id']) ?>"><button class="remove"> <i class="fas fa-trash"></i> </button> <span></span> </a>
										</div>
									</div>
								</div>
								
							</li>
						</ul>
					</div>
					<?php endforeach;?>
					<!-- Order Total -->
					<div class="order_total">
						<div class="order_total_content text-md-right">
							<div class="order_total_title">Tổng số tiền:</div>
							<div class="order_total_amount"><strong><?php echo number_format($sum) ?></strong></div>
						</div>
					</div>

					<div class="cart_buttons">
						<a  href="<?php echo base_url('cart/del/') ?>"> <button type="submit" class="button cart_button_checkout bg-danger"> Xóa toàn bộ</button></a>
						<button type="submit" class="button cart_button_checkout"> Thanh Toán</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
