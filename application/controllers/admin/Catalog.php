
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Catalog extends MY_Controller {
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('Catalog_model');
 	}
 
 	public function index()
 	{
 		$list = $this->Catalog_model->get_list();
 		$this->data['list'] = $list;

 		//Lấy ra nội dung của biến mess
 		$mess =$this->session->flashdata('mess');
 		//Gửi dữ liệu sang View
 		$this->data['mess'] = $mess;

 		//load view
 		$this->data['temp'] = 'admin/catalog/index';
 		$this->load->view('admin/main', $this->data);
 	}
 
	//load form them moi catalog 
 	function add() {
 		$this->load->library('form_validation');
 		$this->load->helper('form');

 		//kiem tra du lieu post len
 		if ($this->input->post()) {
 			$this->form_validation->set_rules('name','Tên', 'required');

 			//Chay phuong thuc
 			if ($this->form_validation->run()) {
 				//Them va database
 				$name = $this->input->post('name');
 				$parent_id = $this->input->post('parent_id');
 				$sort_order = $this->input->post('sort_order');

 				//tạo dữ liệu cần thêm vào
 				$data = array(
 					'name'=> $name,
 					'parent_id'=> $parent_id,
 					'sort_order' => intval($sort_order)
 				);

 				//thêm mới
 				if ($this->Catalog_model->create($data)) {
 					$this->session->set_flashdata('mess', 'Thêm dữ liệu thành công');
 				}
 				else {
 					$this->session->set_flashdata('mess', 'Không thêm được dữ liệu!');
 				}
 				//chuyển đến trang admin
 				redirect(admin_url('Catalog'));
 			}
 		}
 		//lấy danh sách thư mục cha
 		$input = array();
 		$input['where'] = array('parent_id' => 0);
 		$list = $this->Catalog_model->get_list($input);
 		$this->data['list'] = $list;

		$this->data['temp'] = 'admin/catalog/add';
 		$this->load->view('admin/main', $this->data);
 	}

	//edit du lieu catalog 
 	function edit() {
 		$this->load->library('form_validation');
 		$this->load->helper('form');

 		//lay id cua catalog
 		$id = $this->uri->rsegment(3);
 		$info = $this->Catalog_model->get_info($id);	

 		if (!$info) {
 			$this->session->set_flashdata('mess', 'Không tồn tại sản phẩm này');
			//chuyển đến trang catalog
 			redirect(admin_url('catalog')); 			
 		}
 		//Gửi sang view
 		$this->data['info'] = $info;

 		//kiem tra du lieu post len
 		if ($this->input->post()) {
 			$this->form_validation->set_rules('name','Tên', 'required');

 			//Chay phuong thuc
 			if ($this->form_validation->run()) {
 				//Them va database
 				$name = $this->input->post('name');
 				$parent_id = $this->input->post('parent_id');
 				$sort_order = $this->input->post('sort_order');

 				//tạo dữ liệu cần thêm vào
 				$data = array(
 					'name'=> $name,
 					'parent_id'=> $parent_id,
 					'sort_order' => intval($sort_order)
 				);

 				//thêm mới
 				if ($this->Catalog_model->update($id, $data)) {
 					$this->session->set_flashdata('mess', 'Thêm dữ liệu thành công');
 				}
 				else {
 					$this->session->set_flashdata('mess', 'Không thêm được dữ liệu!');
 				}
 				//chuyển đến trang admin
 				redirect(admin_url('Catalog'));
 			}
 		}
 		//lấy danh sách thư mục cha
 		$input = array();
 		$input['where'] = array('parent_id' => 0);
 		$list = $this->Catalog_model->get_list($input);
 		$this->data['list'] = $list;

		$this->data['temp'] = 'admin/catalog/edit';
 		$this->load->view('admin/main', $this->data);
 	}

 	//Xoa du lieu
	function delete() {
	
		$id = $this->uri->rsegment('3');
		$id = intval($id); //Ép kiểu về số nguyên phòng trường hợp người dùng nhập id lung tung trên thanh http làm sinh ra lỗi
		//Lay thong tin của quản trị viên
		$info = $this->Catalog_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('mess', 'Không tồn tại danh mục sản phẩm');
		//chuyển đến trang 
			redirect(admin_url('catalog')); 			
		}
		//Thuc hien xoa
		$this->Catalog_model->delete($id);

		$this->session->set_flashdata('mess', 'Xóa dữ liệu thành công');
		//chuyển đến trang 
		redirect(admin_url('catalog')); 	
	}

 }
 
 /* End of file Catalog.php */
 /* Location: ./application/controllers/Catalog.php */ ?>