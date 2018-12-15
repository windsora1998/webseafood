<?php $this->load->view('admin/product/head'); ?>
<?php 
$this->load->view('admin/mess', $this->data);
?>
 <hr>
 <html>

<div class="box border pl-5 pb-5"> 	 	
 	<h2 class="mt-5">Thêm mới sản phẩm </h2>
	<hr class="mb-5 w-75">
	<form enctype="multipart/form-data" class = "form" method = "post" action="<?php echo admin_url('product/add') ?>">
	<fieldset>

	<div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Tên sản phẩm: </label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="param_name" name = "name">
	    </div>
	   <!-- <div class = "clear_error" name = "name_error"> <?php echo form_error('name'); ?> </div>	    	    	     -->
	</div>		
	
	<div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Hình ảnh: </label>
	    <div class="col-sm-8">
			<input type="file" name="image" id="image">		    	
	    </div>
	    <!-- <div class = "clear_error" name = "name_error"> <?php echo form_error('name'); ?> </div>	    	    	    -->
	  </div>	

	<div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Ảnh kèm theo: </label>
	    <div class="col-sm-8">
			<input type="file" name='image_list[]' multiple="">
	    </div>
	    <!-- <div class = "clear_error" name = "name_error"> <?php echo form_error('name'); ?> </div>	    	     -->
	  </div>	

	<div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Giá (VNĐ): </label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="param_price" name = "price">
	    </div>
	    <!-- <div class = "clear_error" name = "name_error"> <?php echo form_error('name'); ?> </div>	    	     -->
	</div>		
	
	<div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label">Giảm giá (VNĐ): </label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="param_discout" name = "discount">
	    </div>
	    <!-- <div class = "clear_error" name = "name_error"> <?php echo form_error('name'); ?> </div>	    	     -->
	</div>		
	
	<div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Thể loại: </label>
	    <div class="col-sm-8">
	      <select class="form-control" id="param_sort_order" name = "catalog">
	      	<option value = "0"> Lựa chọn danh mục</option>
	      	<?php foreach ($catalogs as $row): ?>
				<option  value="<?php echo $row->id ?>"> <?php echo $row->name ?></option>
	      	<?php endforeach ?>
	      </select> 
	    </div>
	  </div>
	
	<div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label">Nội dung: </label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="param_content" name = "content">
	    </div>
	    <!-- <div class = "clear_error" name = "name_error"> <?php echo form_error('name'); ?> </div>	    	     -->
	</div>
	  		
	</fieldset>
	  <button type="submit" formaction = "" class="btn btn-primary mb-2" id = "submit" name = "submit" value = "submit">Thêm mới</button>  
	</form>
</div>
</html>
