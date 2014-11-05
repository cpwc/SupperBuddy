<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function index()
	{
		$usenet = $this->session->userdata('usenet');
		$usenet_id = $usetnet['matric_no'];

		if (!$usenet_id) {
			redirect('/student/login');
			return;
		} else {
			redirect('/student/order');
			return;
		}
		
	}

	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('usenetid', 'USENET ID', 'required|callback_authenticate');

			$this->form_validation->set_message('authenticate', 'Invalid login. Please try again.');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('student_login');
				return;
			}

			redirect('/student/order');
		} else {
			$this->load->view('student_login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('usenet');
		redirect('/student/login');
	}

	public function authenticate()
	{
		$query = $this->db->query('SELECT * FROM student WHERE matric_no = "' . $this->input->post('usenetid') . '" LIMIT 1');

		if ($query->num_rows() > 0) {
			$user = $query->row();

			$success = $user->matric_no;
			$post = $this->input->post('usenetid');

			if($post == $success){

				$session = array(
					'matric_no' => $user->matric_no,
					'name' => $user->name,
					'email' => $user->email
				);
		
				$this->session->set_userdata('usenet', $session);
				return true;
			} else {
				return false;
			}
		}
		

		return false;	
	}

	public function orders($order_id = null)
	{
		$usenet = $this->session->userdata('usenet');
		$usenet_id = $usenet['matric_no'];

		if (!$usenet_id) {
			redirect('/student/login');
			return;
		}

		if (empty($order_id)) {
			$sql = "SELECT order.id, caterer.name as `caterer_name`, student.name as `student_name`, residence.name as `residence_name`, order.created_at, order.updated_at, order.status FROM `order`, `caterer`, `student`, `residence` WHERE order.caterer_id = caterer.id AND residence.id = student.residence_id AND order.created_by = student.matric_no";
			$orders = $this->db->query($sql);

			$data['orders'] = $orders->result();

			$this->load->view('student_order_view', $data);
		} else {
			$sql = "SELECT * FROM `order` WHERE order.id = " . $order_id . " LIMIT 1";
			$order = $this->db->query($sql);
			$data['order'] = $order->row();

			$sql = "SELECT student.name as student_name, matric_no, email, phone, residence.name as residence_name FROM `student`, `residence` WHERE student.residence_id = residence.id AND student.matric_no = '" . $order->row()->created_by . "' LIMIT 1";
			$student = $this->db->query($sql);
			$data['student'] = $student->row();

			$sql = "SELECT * FROM `caterer` WHERE caterer.id = '" . $order->row()->caterer_id . "' LIMIT 1";
			$caterer = $this->db->query($sql);
			$data['caterer'] = $caterer->row();

			$sql = "SELECT * FROM `sub_order` WHERE sub_order.order_id = " . $order_id;
			$suborders = $this->db->query($sql);
			$data['suborders'] = $suborders->result();

			$this->load->view('student_order_detail', $data);
		}
	}

}

/* End of file student.php */
/* Location: ./application/controllers/student.php */