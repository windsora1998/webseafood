<?php class Product extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('Product_model');
	}

	//Hiển thị danh sách sản phẩm danh mục
	function view() {
		//lấy id sản phẩm muốn xem
		$id = $this->uri->rsegment(3);
		$product = $this->Product_model->get_info($id);

		if (!$product) {
			redirect();
		}
		$this->data['product'] = $product;

		//lấy ảnh kèm theo
		$image_list = @json_decode($product->image_list);
		$this->data['image_list'] = $image_list;

		//hien thi ra view
		$this->data['temp'] = 'site/product/view';
		$this->load->view('site/layout', $this->data);
	}
}
?>