<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		$this->load->view('order_list');
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */