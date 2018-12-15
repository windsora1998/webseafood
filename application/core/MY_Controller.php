<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	//Tạo biến cục bộ đẩy dữ liệu sang view
	public $data = array();	
	
	public function __construct()
	{
		parent::__construct();

		$controller = $this->uri->segment(1);
		switch ($controller) {
			case 'admin': {
				// Xử lí dữ liệu khi truy cập trang admin
				$this->load->helper('admin');
				//$this->_check_login_user();
				break;
			}
			default:
			{
				// Xử lí dữ liệu ở trang ngoài admin
				$this->load->model('Catalog_model');
				
				//catalog
				$input = array();
				$catalog_list = $this->Catalog_model->get_list();

				$this->data['catalog_list']= $catalog_list;

				//product
				$this->load->model('Product_model');
				$product_list = $this->Product_model->get_list();
				
				$this->data['product_list'] = $product_list;

			}
		}
	}

	/*private function _check_login_user() {
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);

		$login = $this->session->userdata('login');

		if (!$login && $controller != 'login') {
			redirect(admin_url('login'));
			
		}	

		if ($login && $controller == 'login') {
			redirect(admin_url('home'));				
	 	}
	}*/

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */?> 