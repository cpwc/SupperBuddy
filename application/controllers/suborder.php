<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubOrder extends CI_Controller {

	public function index()
	{
		echo 'Hello, SubOrder!';
	}

	public function create($order_id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('foods', 'Foods', 'required');
			$this->form_validation->set_rules('quantities', 'Quantities', 'required');

			if ($this->form_validation->run() == FALSE) {
				//redirect('/');
			} else {
				$this->_create($order_id);
			}
		}
	}

	public function edit($food_id = null)
	{
		if (empty($food_id)) {
			redirect('/food');
			return;
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/food');
			} else {
				$this->_edit($food_id);
			}
		} else {
			$sql = "SELECT * FROM `food` WHERE id = " . $food_id;
			$food = $this->db->query($sql);
			$data['food'] = $food->row();

			$this->load->view('caterer_food_edit', $data);
		}
	}

	public function detail($food_id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$sql = "SELECT price FROM `food` WHERE food.is_deleted = 0 AND id = " . $food_id;
			$foods = $this->db->query($sql)->row();

			header('Content-Type: application/json');
			echo json_encode($foods);
		}
	}

	public function delete($food_id)
	{
		$sql = "UPDATE `food` SET food.is_deleted = 1 WHERE food.id = " . $food_id;
		$this->db->query($sql);

		if ($this->db->affected_rows() > 0) {
			$sql = "SELECT * FROM `food` WHERE food.id = " . $food_id;
			$food = $this->db->query($sql);

			$this->session->set_flashdata('status', 1);
			$this->session->set_flashdata('message', 'Food [' . $food->row()->name . '] deleted successfully.');
		} else {
			$sql = "SELECT * FROM `food` WHERE food.id = " . $food_id;
			$food = $this->db->query($sql);

			$this->session->set_flashdata('status', 0);
			$this->session->set_flashdata('message', 'Error deleting Food [' . $food->row()->name . '].');
		}
 
		redirect('/food');
	}

	private function _create($order_id)
	{
		$student = $this->session->userdata('usenet');
		$student_id = $student['matric_no'];
		
		if (!$student_id) {
			redirect('/student/login');
			return;
		}

		$time = date('Y-m-d H:i:s');
		$total_price = 0;
		$foods = $this->input->post('foods');
		$prices = $this->input->post('prices');
		$quantities = $this->input->post('quantities');

		var_dump($this->input->post());

		for ($i = 0; $i < count($this->input->post('prices')); $i++) {
			$price = $prices[$i];
			$quantity = $quantities[$i];
			$total_price += $price * $quantity;
		}

		$params = array(
			'order_id' => $order_id,
			'ordered_by' => $student_id,
			'total_price' => $total_price,
			'paid' => false,
			'created_at' => $time,
			'updated_at' => $time
		);
		$sql = "INSERT INTO `sub_order` (order_id, ordered_by, total_price, paid, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
		$this->db->query($sql, $params);
		$suborder_id = $this->db->insert_id();

		for ($i = 0; $i < count($this->input->post('prices')); $i++) {
			$price = $prices[$i];
			$quantity = $quantities[$i];
			$total_price += $price * $quantity;

			$params = array(
				'suborder_id' => $suborder_id,
				'food_id' => $foods[$i],
				'quantity' => $quantities[$i]
			);
			$sql = "INSERT INTO `sub_order_detail` (suborder_id, food_id, quantity) VALUES (?, ?, ?)";
			$this->db->query($sql, $params);
		}
		
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 1);
			$this->session->set_flashdata('message', 'SubOrder created successfully.');
		} else {
			$this->session->set_flashdata('status', 0);
			$this->session->set_flashdata('message', 'Error creating SubOrder. Please try again.');
		}

		redirect('/student/orders/' . $order_id);
	}

}

/* End of file suborder.php */
/* Location: ./application/controllers/suborder.php */