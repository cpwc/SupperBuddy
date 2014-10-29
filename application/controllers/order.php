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
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('matric_no', 'Student ID', 'required');
			$this->form_validation->set_rules('caterer', 'Caterer', 'required');

			if ($this->form_validation->run() == FALSE) {
				redirect('/order/create'); // TODO: Show validation message.
			} else {
				$this->_create_order();
			}
		} else {
			$sql = "SELECT student.name as student_name, matric_no, email, phone, residence.name as residence_name FROM `student`, `residence` WHERE student.residence_id = residence.id LIMIT 1"; // TODO: Select the particular student currently logged in as.
			$student = $this->db->query($sql);
			$data['student'] = $student->row();

			$sql = "SELECT * FROM `caterer`";
			$caterers = $this->db->query($sql);
			$data['caterers'] = $caterers->result();

			$this->load->view('order_create', $data);
		}
	}

	public function suborder($id)
	{
			$sql = "SELECT * FROM `order` WHERE order.id = " . $id;
			$order = $this->db->query($sql);
			$data['orders'] = $order->row();

			$sql = "SELECT student.name as student_name, matric_no, email, phone, residence.name as residence_name FROM `student`, `residence` WHERE student.residence_id = residence.id LIMIT 1";
			$student = $this->db->query($sql);
			$data['student'] = $student->row();

			$sql = "SELECT * FROM `caterer` WHERE caterer.id = '" . echo $order->caterer_id . "' LIMIT 1";
			$caterers = $this->db->query($sql);
			$data['caterers'] = $caterers->row();

			$sql = "SELECT * FROM `sub_order` WHERE sub_order.order_id = " . $id;
			$suborders = $this->db->query($sql);
			$data['suborders'] = $suborders->result();

			$this->load->view('suborder', $data);
	}

	public function suborderdetails()
	{
		$sql = "SELECT food.name as food_name, food.price as food_price, food.id FROM `food`, `caterer` WHERE food.caterer_id = caterer.id";
		$food = $this->db->query($sql);
		$data['foods'] = $food->result();

		$this->load->view('suborder_details');
	}

	private function _create_order()
	{
		$sql = "INSERT INTO `order` (caterer_id, status, created_by, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
		$time = date('Y-m-d H:i:s');
		$params = array(
			'caterer_id' => $this->input->post('caterer'),
			'status' => 'OPEN',
			'created_by' => $this->input->post('matric_no'),
			'created_at' => $time,
			'updated_at' => $time
		);
		$this->db->query($sql, $params);
		
		echo $this->db->affected_rows();
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */