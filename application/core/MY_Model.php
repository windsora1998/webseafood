<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	//name talbe
	var $table = '';

	//Key of table
	var $key = 'id';

	//Order sample ($order = array('id', '...'))
	var $order ='';

	//Select ($select = 'id, name')
	var $select = '';

	// add new row
	function create($data = array()) {
		//Truy xuất vào db, sau đó insert([bảng dữ liệu ta muốn truyền vào], [tham số ta muốn truyền vào])
		if ($this->db->insert($this->table, $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	//update data row
	//id: primary key
	//data: table want to update 
	function update($id, $data) {
		if (!$id) {
			return FALSE;
		}
		//where: condition want to update 
		$where = array();
		$where[$this->key] = $id;
		$this->update_rule($where, $data);

		return TRUE;
	}

	function update_rule($where, $data) {
		if (!$where) {
			return FALSE;
		} 

		$this->db->where($where);
		$this->db->update($this->table, $data);

		return TRUE;
	}

	//delete row
	//id: primary key
	//data: table want to update 
	function delete($id) {
		if (!$id) {
			return FALSE;
		}
		
		if (is_numeric($id)) {
			$where = array($this->key=>$id);
		} else {
			//IN -> EXPORT DATA LIKE $ID
			$where = array($this->key."IN(".$id.")");	
		}
		$this->delete_rule($where);
	}

	function delete_rule($where) {
		if (!$where) {
			return FALSE;
		} 

		$this->db->where($where);
		$this->db->delete($this->table);

		return TRUE;
	}

	//$sql: cau lenh truyen vao
	function query($sql) {
		$rows = $this->db->query($sql);
		return $rows->result();
	}

	//get information
	function get_info($id, $field = '') {
		if (!$id) {
			return FALSE;
		}

		$where = array();
		$where[$this->key] = $id;

		return $this->get_info_rule($where, $field);
	}

	//field la truong du lieu muon lay (row)
	function get_info_rule($where = array(), $field = '') {
		if ($field) {
			$this->db->select($field);
		}
		$this->db->where($where);
		$query = $this->db->get($this->table);
		if ($query->num_rows()) {
			return $query->row();
		}
		return FALSE;
	}

	//lấy tổng số
	function get_total($input = array()) {
		$this->get_list_set_input($input);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}

	//get row
	function get_row($input = array()) {
		$this->get_list_set_input($input);

		//thuc hien cau truy va
		$query = $this->db->get($this->table);

		//tra ve doi tuong
		return($query)->row();
	}

	//get list
	function get_list($input = array()) {
		$this->get_list_set_input($input);

		//thuc hien cau truy va
		$query = $this->db->get($this->table);

		//tra ve doi tuong
		return($query)->result();
	}

	//Gan cac thuoc tinh trong input khi lay danh sach
	function get_list_set_input($input = array()) {
		//them dieu kien cho input qua bien 'where'
		//vd input['where'] = array('phone'=>'0857456125')
		if ((isset($input['where'])) && $input['where']) {
			$this->db->where($input['where']);
		}

		//tim kiem du lieu
		//$input['like'] = array('name', 'phong')
		if ((isset($input['like'])) && $input['like']) {
			$this->db->like($input['like'][0], $input['like'][1]);
		} 

		//sap xep
		//vd $input['order'] = array('id', 'DESC')
		if ( isset($input['order'][0]) && isset($input['order'][1])) {
			$this->db->order_by($input['order'][0], $input['order'][1]);
		} else {
			$order = ($this->order == '') ? array($this->table.'.'.$this->key, 'desc') : $this->order;
			$this->db->order_by($order[0], $order[1]);	
		}

		//Them dieu kien limit cho cau van
		if (isset( $input['limit'][0]) && isset($input['limit'][1])) {
			$this->db->limit($input['limit'][0], $input['limit'][1]);
		}

	}

	//Kiem tra xem su ton tai cua kieu du lieu
	function check_exits($where = array()) {
		$this->db->where($where);

		$query = $this->db->get($this->table);

		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

}

/* End of file MY_Model.php */
/* Location: ./application/models/MY_Model.php */