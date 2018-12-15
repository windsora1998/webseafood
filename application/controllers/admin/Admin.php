<?php 
class Admin extends MY_Controller
 {
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('Admin_model');
 	}

 	//lay danh sach admin
 	function index() {
 		$input = array();
 		$list = $this->Admin_model->get_list($input);
 		$this->data['list'] = $list;

 		$total = $this->Admin_model->get_total();
 		$this->data['total'] = $total;

 		//Lấy ra nội dung của biến mess
 		$mess =$this->session->flashdata('mess');
 		//Gửi dữ liệu sang View
 		$this->data['mess'] = $mess;

 		$this->data['temp'] = 'admin/admin/index';
 		$this->load->view('admin/main', $this->data);
 	}

 	function check_username() {
 		$username = $this->input->post('username');
 		$where = array('username' => $username);
 		if ($this->Admin_model->check_exits($where)) {
 			$this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
 			return false;
 		} return true;
 	}

 	//load form them moi admin 
 	function add() {
 		$this->load->library('form_validation');
 		$this->load->helper('form');

 		//kiem tra du lieu post len
 		if ($this->input->post()) {
 			$this->form_validation->set_rules('name','Tên', 'required|min_length[8]');
  			$this->form_validation->set_rules('username','Tên tài khoản đăng nhập', 'required|callback_check_username');
 			$this->form_validation->set_rules('password','Mật khẩu', 'required|min_length[6]');
 			$this->form_validation->set_rules('re_password','Nhập lại mật khẩu', 'matches[password]');

 			//Chay phuong thuc
 			if ($this->form_validation->run()) {
 				//Them va database
 				$name = $this->input->post('name');
 				$username = $this->input->post('username');
 				$password = $this->input->post('password');
 				$data = array(
 					'name'=> $name,
 					'username'=> $username,
 					'password' => md5($password)
 				);
 				if ($this->Admin_model->create($data)) {
 					$this->session->set_flashdata('mess', 'Thêm dữ liệu thành công');
 				}
 				else {
 					$this->session->set_flashdata('mess', 'Không thêm được dữ liệu!');
 				}
 				//chuyển đến trang admin
 				redirect(admin_url('admin'));
 			}
 		}

 		$this->data['temp'] = 'admin/admin/add';
 		$this->load->view('admin/main', $this->data);
 	}

 	//chinh sua thong tin quan tri vien
 	function edit() {
 		$this->load->library('form_validation');
 		$this->load->helper('form');
 		$id = $this->uri->rsegment('3');
 		$id = intval($id); //Ép kiểu về số nguyên phòng trường hợp người dùng nhập id lung tung trên thanh http làm sinh ra lỗi
 		//Lay thong tin của quản trị viên
 		$info = $this->Admin_model->get_info($id);
 		if (!$info) {
 			$this->session->set_flashdata('mess', 'Không tồn tại quản trị viên');
			//chuyển đến trang admin
 			redirect(admin_url('admin')); 			
 		}
 		//gửi sang view
 		$this->data['info'] = $info;

 		if ($this->input->post()) {
 			$this->form_validation->set_rules('name','Tên', 'required|min_length[8]');
  			$this->form_validation->set_rules('username','Tên tài khoản đăng nhập', 'required|callback_check_username');
 			$this->form_validation->set_rules('password','Mật khẩu', 'required|min_length[6]');
 			$this->form_validation->set_rules('re_password','Nhập lại mật khẩu', 'matches[password]');

 			//Chay phuong thuc
 			if ($this->form_validation->run()) {
 				//Them va database
 				$name = $this->input->post('name');
 				$username = $this->input->post('username');
 				$password = $this->input->post('password');

 				$data = array(
 					'name'=> $name,
 					'username'=> $username,
 					'password' => md5($password)
 				);
 				if ($this->Admin_model->update($id, $data)) {
 					$this->session->set_flashdata('mess', 'Cập nhật dữ liệu thành công');
 				}
 				else {
 					$this->session->set_flashdata('mess', 'Không cập nhật được dữ liệu!');
 				}
 				//chuyển đến trang admin
 				redirect(admin_url('admin'));
 			}
 		}
 		$this->data['temp'] = 'admin/admin/edit';
 		$this->load->view('admin/main', $this->data);
 	}

 	//Xoa du lieu

	function delete() {
	
		$id = $this->uri->rsegment('3');
		$id = intval($id); //Ép kiểu về số nguyên phòng trường hợp người dùng nhập id lung tung trên thanh http làm sinh ra lỗi
		//Lay thong tin của quản trị viên
		$info = $this->Admin_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('mess', 'Không tồn tại quản trị viên');
		//chuyển đến trang admin
			redirect(admin_url('admin')); 			
		}
		//Thuc hien xoa
		$this->Admin_model->delete($id);

		$this->session->set_flashdata('mess', 'Xóa dữ liệu thành công');
		//chuyển đến trang admin
		redirect(admin_url('admin')); 	
	}

	function logout() {
 		if ($this->session->userdata('login')) {
	 		$this->session->unset_userdata('login');
	 	}
	 	redirect(admin_url('login'));
	}
 } 
 ?>

