<?php 
	class Login extends MY_Controller {
		
		function index() {

			$this->load->library('form_validation');

 			$this->load->helper('form');

 			if ($this->input->post()) {
 				$this->form_validation->set_rules('login','login','callback_check_login');
 				if ($this->form_validation->run()) {

 					//Tao bien bao ra admin da dang nhap thanh cong
 					$this->session->userdata('login', true);
 					redirect(admin_url('home'));
 				}
 			}

			$this->load->view('admin/login/index');
		}

		function check_login() {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password = md5($password);

			$this->load->model('Admin_model');
			$where = array('username' => $username, 'password' => $password);
			if ($this->Admin_model->check_exits($where)) { 	
				return true;
			}

			$this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
			return false;
		}	
	}
 ?>