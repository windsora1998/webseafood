<?php
	
	//gọi file thư mục public
	function public_url($url = '') {
		return base_url('public/'.$url);
	}
	
	//in du lieu ra
	function pre($list, $check = TRUE) {
		echo '<pre>';
		print_r($list);
		if ($check) {
			die();
		}
	}
  ?>