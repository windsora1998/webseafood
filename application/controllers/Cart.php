<?php 
class Cart extends MY_Controller {
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->library('cart');
 	}

 	function add() {
		$id = $this->uri->rsegment(3);
		$product = $this->Product_model->get_info($id);

		if (!$product) {
			redirect();
		}

		$price = $product->price;
		if ($product->discount > 0) {
			$price = $product->price - $product->discount;
		}
		$qty = 1;
		$data = array();
		$data['id'] = $product->id;
		$data['qty'] = $qty;
		$data['name'] = url_title($product->name);
		$data['image_link'] = $product->image_link;
		$data['price'] = $price;	

		$this->cart->insert($data);

		//chuyen sang trang danh sach
		redirect(base_url('cart'));
 	}

 	//Hien thi danh sach san pham vao gio hang
 	function index() {
 		$cart = $this->cart->contents();
 		$total_cart = $this->cart->total_items();

 		$this->data['carts'] = $cart;
 		$this->data['total_cart'] = $total_cart;

 		//hien thi ra view
		$this->data['temp'] = 'site/cart/index';
		$this->load->view('site/layout', $this->data);
 	}

 	function update() {
 		$cart = $this->cart->contents();
 		foreach ($carts as $key => $row) {
			$total_qty = $this->input->post('qty_'.$row['id']);
			$data = array();
			$data['rowid'] = $key;
			$data['qty'] = $total_qty;
			$this->cart->update($data);
		}
	}


 	function del() {
 		$id = $this->uri->rsegment(3);
		$id = intval($id);

		if ($id > 0) {
			$carts = $this->cart->contents();
			foreach ($carts as $key => $row) {
				if ($row['id'] == $id) {
					$data = array();
					$data['rowid'] = $key;
					$data['qty'] = 0;
					$this->cart->update($data);
				}
			}
		} else {
			$this->cart->destroy();
		}
		redirect(base_url('cart'));
 	}
 }
 ?>
