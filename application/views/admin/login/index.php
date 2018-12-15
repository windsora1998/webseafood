<html> 
	
	<head>
		<?php $this->load->view('admin/head'); ?>
	</head>

	<body class="bg-info">

    	<div class="container">
    	 	<div class="card card-login mx-auto mt-5">
        		<div class="card-header">Đăng nhập</div>
        			<div class="card-body">
          				<form  id="form" action="" method="post">
            					<div class="form-group">
              						<div class="form-label-group">
                							<input type="text" id="username" class="form-control" placeholder="Tên tài khoản" required="required" name = "username" autofocus="">
                							<label for="inputEmail">Tên tài khoản</label>
              						</div>
            					</div>

           						<div class="form-group">
              						<div class="form-label-group">
                						<input type="password" name = "password" id="password" class="form-control" placeholder="Mật khẩu" required="required">
                						<label for="inputPassword">Mật khẩu</label>
              						</div>
            					</div>
            					<div class="bg-danger text-center text-white" > <?php echo form_error('login'); ?></div>
            					<div class="form-group">
              						<div class="checkbox">
                						<label>
                  							<input type="checkbox" value="remember-me">
                 							Nhớ mật khẩu
                						</label>
              						</div>
            					</div>
            				<button class="btn btn-primary btn-block" type="submit" value = "Đăng nhập"> Đăng nhập </button>
          				</form> 
          			<div class="text-center">
            			<a class="d-block small mt-3" href="register.html">Đăng kí</a>
            			<a class="d-block small" href="forgot-password.html">Quên mật khẩu</a>
          			</div>
        		</div>
      		</div>
    	</div>

		<?php $this->load->view('admin/script'); ?>
	</body>

</html>