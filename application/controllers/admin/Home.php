<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/main', $this->data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */