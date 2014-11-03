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
			$this->form_validation->set_rules('searchfunction', 'SearchFunction', 'required');

			if ($this->form_validation->run() == FALSE) {
				redirect('/catererorder/caterer_order_view'); // TODO: Show validation message.
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

	public function details($id)
	{
	 	$sql = "SELECT student.name as student_name, matric_no, email, phone, residence.name as residence_name FROM `student`, `residence`, `order` WHERE student.residence_id = residence.id AND student.matric_no = order.created_by AND order.id = " . $id . " LIMIT 1";
		$student = $this->db->query($sql);
		$data['student'] = $student->row(); 

		$sql = "SELECT student.name as student_name, food.name as food_name, sub_order_detail.quantity as quantity, food.price as price, sub_order.ordered_by as ordered_by, sub_order.created_at as created_at, sub_order.updated_at as updated_at FROM `sub_order`, `sub_order_detail`, `food`, `student` WHERE student.matric_no = sub_order.ordered_by AND sub_order.id = sub_order_detail.suborder_id AND sub_order_detail.food_id = food.id AND sub_order.order_id = " . $id;

		$details = $this->db->query($sql);
		$data['details'] = $details->result();

		$this->load->view('caterer_order_detail', $data);
	}

	private function _search()
	{
		$caterer = $this->session->userdata('caterer');
		$caterer_id = $caterer['id'];

		if (!$caterer_id) {
			redirect('/caterer/login');
			return;
		}

		$sql = "SELECT * FROM `order` WHERE order.status = '" . $this->input->post('searchfunction') . "' AND order.caterer_id = '" . $caterer_id . "'  ";
		$orders = $this->db->query($sql);
		$data['orders'] = $orders->result();
	}

}

/* End of file CatererOrder.php */
/* Location: ./application/controllers/CatererOrder.php */