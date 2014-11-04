<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Caterer extends CI_Controller
{
	
	public function index()
	{
		$caterer = $this->session->userdata('caterer');
		$caterer_id = $caterer['id'];

		if (!$caterer_id) {
			redirect('/caterer/login');
			return;
		} else {
			redirect('/catererorder');
			return;
		}
	}
	
	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_authenticate');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$this->form_validation->set_message('authenticate', 'Invalid login. Please try again.');
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('caterer_login');
				return;
			}


			redirect('/catererorder');
		} else {
			$this->load->view('caterer_login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('caterer');
		redirect('/caterer/login');
	}
	
	public function register()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('organizationname', 'Organization Name', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('rpassword', 'Re-type Password', 'required|matches[password]');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/caterer/register');
			} else {
				$this->_register();
			}
		} else {
			$this->load->view('caterer_register');
		}
	}
	
	public function forgetpassword()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/caterer/forgetpassword');
			} else {
				$this->_forgetpassword();
			}
		} else {
			$this->load->view('caterer_forgetpassword');
		}
	}

	public function detail($id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$sql = "SELECT id, name, email, phone, address, description FROM `caterer` WHERE id = " . $id;
			$caterer = $this->db->query($sql)->row();

			header('Content-Type: application/json');
			echo json_encode($caterer);
		}
	}
	
	public function authenticate()
	{
		$query = $this->db->query('SELECT * FROM caterer WHERE email = "' . $this->input->post('email') . '" LIMIT 1');
		
		if ($query->num_rows() > 0) {
			$user = $query->row();

			$hashed = $user->password;
			$password = $this->input->post('password');
			
			if ($this->phpass->check($password, $hashed)) {
				$session = array(
					'id'  => $user->id,
					'name' => $user->name,
					'email' => $user->email,
					);
				$this->session->set_userdata('caterer', $session);
				return true;
			} else {
				return false;
			}
		}

		return false;
	}

	public function orders()
	{
		$caterer = $this->session->userdata('caterer');
		$caterer_id = $caterer['id'];

		if (!$caterer_id) {
			redirect('/caterer/login');
			return;
		}

		$sql = "SELECT * FROM `residence`";
		$data['residences'] = $this->db->query($sql)->result();

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			// $this->form_validation->set_rules('search', 'Search', 'required');
			// // $this->form_validation->set_rules('search[residence]', 'Residence', '');
			// // $this->form_validation->set_rules('status', 'Status', '');
			
			// if ($this->form_validation->run() == FALSE) {
			// 	$this->load->view('caterer_order_view', $data);
			// 	return;
			// }

			$residence = $this->input->post('residence');
			$status = $this->input->post('status');

			$params = array(
				'residence.name' => $this->input->post('residence'),
				'order.status' => $this->input->post('status'),
				'caterer_id' => $caterer_id,
				);

			if ($residence && $status) {
				$sql = "SELECT order.id, residence.name as `residence_name`, student.name, status, created_at, updated_at FROM `order`, `student`, `residence` WHERE order.created_by = student.matric_no AND student.residence_id = residence.id AND (residence.name = ? AND order.status = ?) AND caterer_id = ?";
			} else {
				$sql = "SELECT order.id, residence.name as `residence_name`, student.name, status, created_at, updated_at FROM `order`, `student`, `residence` WHERE order.created_by = student.matric_no AND student.residence_id = residence.id AND (residence.name = ? OR order.status = ?) AND caterer_id = ?";
			}

			$orders = $this->db->query($sql, $params);
			$data['orders'] = $orders->result();

			$this->load->view('caterer_order_view', $data);
		} else {
			$sql = "SELECT order.id, residence.name as `residence_name`, student.name, status, created_at, updated_at FROM `order`, `student`, `residence` WHERE order.created_by = student.matric_no AND student.residence_id = residence.id AND caterer_id = " . $caterer_id;
			$orders = $this->db->query($sql);
			$data['orders'] = $orders->result();
			
			$this->load->view('caterer_order_view', $data);
		}
	}
	
	private function _register()
	{
		$password = $this->input->post('password');
		$hashed   = $this->phpass->hash($password);
		$time     = date('Y-m-d H:i:s');
		
		$params = array(
			'name' => $this->input->post('organizationname'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'password' => $hashed,
			'created_at' => $time,
			'updated_at' => $time
			);
		
		$sql = "INSERT INTO caterer (name, email, address, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
		$this->db->query($sql, $params);
		
		echo $this->db->affected_rows();
	}
	
	private function _forgetpassword()
	{
		$email = $this->input->post('email');
		
		$sql  = "SELECT * FROM caterer WHERE email = '" . $email . "' LIMIT 1";
		$user = $query->row();
		
		if ($user != null) {
			echo $user->password;
		} else {
			echo 'Empty record.';
		}
	}
	
}

/* End of file caterer.php */
/* Location: ./application/controllers/caterer.php */