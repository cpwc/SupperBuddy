<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catererorder extends CI_Controller {

	public function index()
	{
		$caterer = $this->session->userdata('caterer');
		$caterer_id = $caterer['id'];

		if (!$caterer_id) {
			redirect('/caterer/login');
			return;
		}

		$sql = "SELECT * FROM `order` WHERE order.caterer_id = " . $caterer_id;
		$orders = $this->db->query($sql);

		$data['orders'] = $orders->result();

		$this->load->view('caterer_order_view', $data);
	}

	public function search()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//$this->form_validation->set_rules('hall', 'Hall', 'required');

			if ($this->form_validation->run() == FALSE) {
				redirect('/catererorder/search'); // TODO: Show validation message.
			} else {
				$this->_search();
			}
		} else {
			$caterer = $this->session->userdata('caterer');
			$caterer_id = $caterer['id'];

			if (!$caterer_id) {
				redirect('/caterer/login');
				return;
			}
			
			$sql = "SELECT * FROM `order` WHERE order.caterer_id = " . $caterer_id;
			$orders = $this->db->query($sql);

			$data['orders'] = $orders->result();

			$this->load->view('caterer_order_view', $data);
		}
	}

	private function _search()
	{
		$caterer = $this->session->userdata('caterer');
		$caterer_id = $caterer['id'];

		if (!$caterer_id) {
			redirect('/caterer/login');
			return;
		}

		$sql = "SELECT * FROM `order` WHERE order.status = '" . $this->input->post('hall') . "' AND order.caterer_id = '" . $caterer_id . "'  ";
		$orders = $this->db->query($sql);
		$data['orders'] = $orders->result();

		$this->load->view('caterer_order_view', $data);
	}

}

/* End of file CatererOrder.php */
/* Location: ./application/controllers/CatererOrder.php */