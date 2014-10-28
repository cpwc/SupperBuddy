<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		$sql = "SELECT order.id, caterer.name as `caterer_name`, student.name as `student_name`, residence.name as `residence_name`, order.created_at, order.updated_at, order.status FROM `order`, `caterer`, `student`, `residence` WHERE order.caterer_id = caterer.id AND residence.id = student.residence_id AND order.created_by = student.matric_no";
		$orders = $this->db->query($sql);

		$data['orders'] = $orders->result();

		$this->load->view('order_view', $data);
	}

	public function create()
	{
		$sql = "INSERT INTO `order` (caterer_id, status, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
		$this->load->view('order_create');
	}

	public function suborder()
	{
		$this->load->view('suborder');
	}

	public function details()
	{
		$this->load->view('suborder_details');
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */