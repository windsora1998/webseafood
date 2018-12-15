 <?php 
$this->load->view('admin/catalog/head', $this->data);
 ?>
 <hr>
 <html>

<div class="box border pl-5 pb-5"> 	 	
 	<h2 class="mt-5">Thêm mới danh mục sản phẩm </h2>
	<hr class="mb-5 w-75">
	<form id = "form" class = "form" method = "post" action="">
	<fieldset>

	  <div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Tên sản phẩm: </label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="param_name" name = "name" value="<?php echo set_value('name') ?>">
	    </div>
	    <div class = "clear_error" name = "name_error"> <?php echo form_error('name'); ?> </div>	    	    
	  </div>		

	<div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Danh mục cha: </label>
	    <div class="col-sm-8">
	      <select class="form-control" id="param_sort_order" name = "parent_id">
	      	<option value = "0"> Là danh mục cha </option>
	      	<?php foreach ($list as $row): ?>
				<option value="<?php echo $row->id ?>"> <?php echo $row->name ?></option>
	      	<?php endforeach ?>
	      </select> 
	    </div>
	    <div class = "clear_error" name = "parent_id_error"> <?php echo form_error('parent_id'); ?> </div>	    	    
	  </div>		

	  <div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Thứ tự hiển thị: </label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="param_sort_order" name = "sort_order" value="<?php echo set_value('sort_order') ?>" >
	    </div>
	    <div class = "clear_error" name = "sort_order_error"> <?php echo form_error('sort_order'); ?> </div>	    	    
	  </div>		

	</fieldset>
	  <button type="submit" formaction = "" class="btn btn-primary mb-2" value = "Thêm mới">Thêm mới</button>  
	</form>
</div>
</html>
 