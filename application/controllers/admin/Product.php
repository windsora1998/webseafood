
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Product extends MY_Controller {
 
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('Product_model');
 	}
 
 	public function index()
 	{
 		$total_row = $this->Product_model->get_total();
 		$this->data['total_row'] = $total_row;
 		
 		//load thư viện phân trang
 		$this->load->library('pagination');
 		$config = array();

 		//tong san pham
 		$config['total_row'] ='$total_row';
 		$config['base_url'] = admin_url('product/index');
 		$config['per_page'] = 10;//so luong san phan hien thi trong 1 trang
 		$config['uri_segment'] = 5; //phan doan hien thi so trang
	 	
 		//khởi tạo 
 		$this->pagination->initialize($config);

 		//limit phan doan hien thi
 		$segment = $this->uri->segment(4);
 		$segment = intval($segment);
 		$input = array();
 		$input['limit'] = array($config['per_page'], $segment);
 		
 		//Kiem tra co thuc hien loc du lieu hay khong
 		$id = $this->input->get('id');
 		$id = intval($id);
 		if ($id > 0) {
 			$input['where']['id'] = $id;  
 		}
 		//loc theo ten
 		$name = $this->input->get('name');
 		if ($name) {
 			$input['like'] = array('name', $name);
 		}
 		$catalog_id = $this->input->get('catalog');
 		$catalog_id = intval($catalog_id);
 		if ($catalog_id > 0) {
 			$input['where']['catalog_id'] = $catalog_id;
 		}

 		//lay danh sach ra
 		$list = $this->Product_model->get_list($input);
 		$this->data['list'] = $list;


 		//lay danh muc san pham dua len view
 		$this->load->model('Catalog_model');
 		$input = array();
 		$input['where'] = array('parent_id' => 0);
 		$catalogs = $this->Catalog_model->get_list();
 		foreach ($catalogs as $row) {
 			$input['where'] = array('parent_id'=>$row->id);
 			$children = $this->Catalog_model->get_list($input);
 			$row->children = $children;
 		}
 		//Gui du lieu sang view
 		$this->data['catalogs'] = $catalogs;

 		//Lấy ra nội dung của biến mess
 		$mess =$this->session->flashdata('mess');
 		//Gửi dữ liệu sang View
 		$this->data['mess'] = $mess;

 		//load view
 		$this->data['temp'] = 'admin/product/index';
 		$this->load->view('admin/main', $this->data);
 	}

 	function add() {
 		$this->load->library('form_validation');
 		$this->load->helper('form');

 		//kiem tra du lieu post len
 		if ($this->input->post()) {
 			$this->form_validation->set_rules('name','Tên', 'required');
 			$this->form_validation->set_rules('catalog','Thể loại', 'required');
 			$this->form_validation->set_rules('price','Giá', 'required');

 			//Chay phuong thuc
 			if ($this->form_validation->run()) {
 				//Them va database
 				$name = $this->input->post('name');
 				$catalog_id = $this->input->post('catalog');
 				$price = $this->input->post('price');
 				$discount = $this->input->post('discount');
 				$discount = intval($discount);
 				$price = intval($price);	

 				//lấy file ảnh upload lên
 				$this->load->library('upload_library');
 				$upload_path = './upload/product';
 				$upload_data = $this->upload_library->upload($upload_path, 'image');
 				$image_link =''; 				
 				if (isset($upload_data['file_name'])) {
 					$image_link = $upload_data['file_name'];
 				}

 				//lấy ảnh kèm theo
 				$image_list = array();
 				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
 				$image_list = json_encode($image_list);

 				//tạo dữ liệu cần thêm vào
 				$data = array(
 					'name'=> $name,
 					'catalog_id'=> intval($catalog_id),
 					'price' => $price,
 					'image_link' => $image_link,
 					'image_list' => $image_list,
 					'discount' => $discount,
 					'content' => $this->input->post('content'),
 					'created' => now(),
 				);

 				//thêm mới
 				if ($this->Product_model->create($data)) {
 					$this->session->set_flashdata('mess', 'Thêm dữ liệu thành công');
 				}
 				else {
 					$this->session->set_flashdata('mess', 'Không thêm được dữ liệu!');
 				}
 				//chuyển đến trang admin
 				redirect(admin_url('product'));
 			}
 		}
 		//lay danh muc san pham dua len view
 		$this->load->model('Catalog_model');
 		$input = array();
 		$input['where'] = array('parent_id' => 0);
 		$catalogs = $this->Catalog_model->get_list();
 		foreach ($catalogs as $row) {
 			$input['where'] = array('parent_id'=>$row->id);
 			$children = $this->Catalog_model->get_list($input);
 			$row->children = $children;
 		}
 		//Gui du lieu sang view
 		$this->data['catalogs'] = $catalogs;

 	 	$this->data['temp'] = 'admin/product/add';
 		$this->load->view('admin/main', $this->data); 	
 	}

 	function edit() {
 		$this->load->library('form_validation');
 		$this->load->helper('form');

 		//lay id cua catalog
 		$id = $this->uri->rsegment(3);
 		$info = $this->Product_model->get_info($id);	

 		if (!$info) {
 			$this->session->set_flashdata('mess', 'Không tồn tại sản phẩm này');
			//chuyển đến trang catalog
 			redirect(admin_url('product')); 			
 		}
 		//Gui sang view
 		$this->data['info'] = $info;

 		//kiem tra du lieu post len
 		if ($this->input->post()) {
 			$this->form_validation->set_rules('name','Tên', 'required');
 			$this->form_validation->set_rules('catalog','Thể loại', 'required');
 			$this->form_validation->set_rules('price','Giá', 'required');

 		}
 		 		//kiem tra du lieu post len
 		if ($this->input->post()) {
 			$this->form_validation->set_rules('name','Tên', 'required');
 			$this->form_validation->set_rules('catalog','Thể loại', 'required');
 			$this->form_validation->set_rules('price','Giá', 'required');

 			//Chay phuong thuc
 			if ($this->form_validation->run()) {
 				//Them va database
 				$name = $this->input->post('name');
 				$catalog_id = $this->input->post('catalog');
 				$price = $this->input->post('price');
 				$discount = $this->input->post('discount');
 				$discount = intval($discount);
 				$price = intval($price);	

 				//lấy file ảnh upload lên
 				$this->load->library('upload_library');
 				$upload_path = './upload/product';
 				$upload_data = $this->upload_library->upload($upload_path, 'image');
 				$image_link =''; 				
 				if (isset($upload_data['file_name'])) {
 					$image_link = $upload_data['file_name'];
 				}

 				//lấy ảnh kèm theo
 				$image_list = array();
 				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
 				$image_list = json_encode($image_list);

 				//tạo dữ liệu cần thêm vào
 				$data = array(
 					'name'=> $name,
 					'catalog_id'=> intval($catalog_id),
 					'price' => $price,
 					'image_link' => $image_link,
 					'image_list' => $image_list,
 					'discount' => $discount,
 					'content' => $this->input->post('content')
 				);

 				//thêm mới
 				if ($this->Product_model->update($id, $data)) {
 					$this->session->set_flashdata('mess', 'Thêm dữ liệu thành công');
 				}
 				else {
 					$this->session->set_flashdata('mess', 'Không thêm được dữ liệu!');
 				}
 				//chuyển đến trang admin
 				redirect(admin_url('product'));
 			}
 		}	
 		//lay danh muc san pham dua len view
 		$this->load->model('Catalog_model');
 		$input = array();
 		$input['where'] = array('parent_id' => 0);
 		$catalogs = $this->Catalog_model->get_list();
 		foreach ($catalogs as $row) {
 			$input['where'] = array('parent_id'=>$row->id);
 			$children = $this->Catalog_model->get_list($input);
 			$row->children = $children;
 		}
 		//Gui du lieu sang view
 		$this->data['catalogs'] = $catalogs;

 	 	$this->data['temp'] = 'admin/product/edit';
 		$this->load->view('admin/main', $this->data); 
 	}

 	function delete() {
 		//lay id cua catalog
 		$id = $this->uri->rsegment(3);
 		$info = $this->Product_model->get_info($id);
 		if (!$info) {
 			$this->session->set_flashdata('mess', 'Không tồn tại sản phẩm này');
			//chuyển đến trang catalog
 			redirect(admin_url('product')); 			
 		}
 		$this->Product_model->delete($id);

 		$image_link = './upload/product/'.$info->image_link;
 		if (file_exists($image_link)) {
 			unlink($image_link);
 		}	
 		$image_list = json_decode($info->image_list);
 		if (is_array($image_list)) {
 			foreach ($image_list as $img) {
 		 		$image_link = './upload/product/'.$img;		
 				if (file_exists($img)) {
 					unlink($image_link);
 				}	
 			}
 		}
 	}
 }
 /* End of file Product.php */
 /* Location: ./application/controllers/Product.php */ ?>