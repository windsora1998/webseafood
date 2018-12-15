 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$data = array();
		$data['temp'] = 'site/home/index';

		//lay danh sach san pham
		$this->load->model('Product_model');
		$input = array();
		

		$this->load->view('site/layout', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
 ?>