<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catererorder extends CI_Controller {

	public function index()
	{
		$sql = "SELECT * FROM `order` WHERE order.caterer_id = 1 ";
		$orders = $this->db->query($sql);

		$data['orders'] = $orders->result();

		$this->load->view('caterer_order_view', $data);
	}

}

/* End of file CatererOrder.php */
/* Location: ./application/controllers/CatererOrder.php */