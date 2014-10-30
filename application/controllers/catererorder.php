<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catererorder extends CI_Controller {

	public function index()
	{
		$sql = "SELECT * FROM `order` WHERE order.caterer_id = 1 ";
		$orders = $this->db->query($sql);

		$data['orders'] = $orders->result();

		$this->load->view('caterer_order_view', $data);
	}

	public function details($id)
	{
	  $sql = "SELECT food.name as food_name, sub_order_detail.quantity as quantity, food.price as price, sub_order.ordered_by as ordered_by, sub_order.created_at as created_at, sub_order.updated_at as updated_at FROM `sub_order`, `sub_order_detail`, `food` WHERE sub_order.id = sub_order_detail.suborder_id AND sub_order_detail.food_id = food.id AND sub_order.order_id = " . $id;

	  $details = $this->db->query($sql);
	  $data['details'] = $details->result();

	  $this->load->view('caterer_order_detail', $data);
	}

}

/* End of file CatererOrder.php */
/* Location: ./application/controllers/CatererOrder.php */