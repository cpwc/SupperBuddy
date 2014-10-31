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
			$this->form_validation->set_rules('email', 'Email', 'required');
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
					'email'     => $user->email
				);
				$this->session->set_userdata('caterer', $session);
				return true;
			} else {
				return false;
			}
		}

		return false;
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