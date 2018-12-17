<?php 
class Upload_library {
	var $CI = '';
	
	function  __construct() {

		$this->CI = & get_instance();
	}

	function upload($upload_path = '', $file_name = '') {
		$config = $this->config($upload_path);
		$this->CI->load->library('upload', $config);
		if ($this->CI->upload->do_upload($file_name)) {
			$data = $this->CI->upload->data();
		} else {
			$data = $this->CI->upload->display_errors();
		}
		return $data;
	}

	function upload_file($upload_path = '', $file_name = '') {
		$config = $this->config($upload_path);

		$file = $_FILES['image_list'];
	    $count = count($file['name']);

	    $image_list = array();  
	    for ($i=0; $i<=$count-1; $i++) {	
		    $_FILES['userfile']['name'] = $file['name'][$i];
	        $_FILES['userfile']['type'] = $file['type'][$i];
	        $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
	        $_FILES['userfile']['error'] = $file['error'][$i];
	        $_FILES['userfile']['size'] = $file['size'][$i];
	  	
	  		$this->CI->load->library('upload', $config);

		  	if ($this->CI->upload->do_upload()) {
		  		$data = $this->CI->upload->data();
		  		$image_list[] = $data['file_name'];
			}
		}
		return $image_list;		
	}

	function config($upload_path='') {
		$config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '99999';
        $config['max_width']  = '9999';
        $config['max_height']  = '9999';

        return $config;
	}
}
