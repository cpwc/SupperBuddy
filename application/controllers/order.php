<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index($order_id = null)
	{
		echo 'Moved to student Controller.';
	}

	public function create()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('matric_no', 'Student ID', 'required');
			$this->form_validation->set_rules('caterer', 'Caterer', 'required');

			if ($this->form_validation->run() == FALSE) {
				redirect('/order/create'); // TODO: Show validation message.
			} else {
				if ($this->_create_order()) {
					$this->session->set_flashdata('status', 1);
					$this->session->set_flashdata('message', 'Order created successfully.');
				} else {
					$this->session->set_flashdata('status', 0);
					$this->session->set_flashdata('message', 'Error creating order. Please try again.');
				}
				redirect('/caterer/orders');
			}
		} else {
			$usenet = $this->session->userdata('usenet');
			$usenet_id = $usenet['matric_no'];

			$sql = "SELECT student.name as student_name, matric_no, email, phone, residence.name as residence_name FROM `student`, `residence` WHERE student.residence_id = residence.id AND student.matric_no = '" . $usenet_id . "' LIMIT 1"; // TODO: Select the particular student currently logged in as.
			$student = $this->db->query($sql);
			$data['student'] = $student->row();

			$sql = "SELECT * FROM `caterer`";
			$caterers = $this->db->query($sql);
			$data['caterers'] = $caterers->result();

			$this->load->view('student_order_create', $data);
		}
	}

	public function suborder($id)
	{
		echo 'Moved to student controller!';
	}

	public function suborderdetails($order_id)
	{
		$usenet = $this->session->userdata('usenet');
		$usenet_id = $usenet['matric_no'];

		if (!$usenet_id) {
			redirect('/student/login');
			return;
		}

		$sql = "SELECT student.name as student_name, matric_no, email, phone, residence.name as residence_name FROM `student`, `residence` WHERE student.residence_id = residence.id AND student.matric_no = '" . $usenet_id . "' LIMIT 1"; // TODO: Select the particular student currently logged in as.
		$student = $this->db->query($sql);
		$data['student'] = $student->row();

		$sql = "SELECT * FROM `order` WHERE order.id = " . $order_id . " LIMIT 1";
		$order = $this->db->query($sql);
		$data['order'] = $order->row();

		$sql = "SELECT * FROM `food` WHERE food.is_deleted = 0 AND food.caterer_id = " . $order->row()->caterer_id;
		$foods = $this->db->query($sql);
		$data['foods'] = $foods->result();

		$this->load->view('student_suborder_create', $data);
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
		
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */