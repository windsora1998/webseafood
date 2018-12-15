<?php 
$this->load->view('admin/admin/head', $this->data);
 ?>
 <hr>
 <html>

<div class="box border pl-5 pb-5"> 	 	
 	<h2 class="mt-5">Cập nhật thông tin quản trị viên</h2>
	<hr class="mb-5 w-75">
	<form id = "form" class = "form" method = "post" action="">
	<fieldset>
	  <div class="form-group row">
	    <label for="param_name" class="col-sm-2 col-form-label"> Họ và tên: </label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="param_name" name = "name" value="<?php echo $info->name ?>" placeholder="your name">
	    </div>
	    <div class = "clear_error" name = "name_error"> <?php echo form_error('name'); ?> </div>	    	    
	  </div>

	   <div class="form-group row">
	    <label for="param_username" class="col-sm-2 col-form-label"> Tên tài khoản: </label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="param_name" name = "username" value = "<?php echo $info->username ?>" placeholder="your username">
	    </div>
	    <div class = "clear_error"  name = "name_error"><?php echo form_error('username'); ?> </div>
	  </div>

		<div class="form-group row">
	    <label for="param_password" class="col-sm-2 col-form-label"> Mật khẩu: </label>
	    <div class="col-sm-8">
	      <input type="password" class="form-control" id="param_password" name = "password" placeholder="your password">
	    </div>
	    <div class = "clear_error"  name = "name_error"> <?php echo form_error('password'); ?> </div>	    
	  </div>
		
		<div class="form-group row">
	    <label for="param_re_password" class="col-sm-2 col-form-label"> Nhập lại mật khẩu: </label>
	    <div class="col-sm-8">
	      <input type="password" class="form-control" id="param_re_password" name = "re_password" placeholder="your password again">
	    </div>
	    <div class = "clear_error" name = "name_error"> <?php echo form_error('re_password');?> </div>
	  </div>			
	</fieldset>
	  <button type="submit" formaction = "" class="btn btn-primary mb-2" value = "Cập nhật">CẬP NHẬT</button>  
	</form>
</div>
</html>