<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Caterer extends CI_Controller
{
	
	public function index()
	{
		redirect('/caterer/login');
	}
	
	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/caterer/login');
			} else {
				$this->_authenticate();
			}
		} else {
			$this->load->view('caterer_login');
		}
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

	public function addfood()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('food_name', 'name', 'required');
			$this->form_validation->set_rules('food_price', 'price', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/caterer/addfood');
			} else {
				$this->_addfood();
			}
		} else {
			$this->load->view('caterer_food');
		}
	}

	private function _addfood()
	{
		$caterer_id = 1;
		$time = time();
		$params = array(
			'name' => $this->input->post('food_name'),
			'price' => $this->input->post('food_price'),
			'caterer' => $caterer_id,
			'created' => $time,
			'updated' => $time
		);

		$sql = "INSERT INTO food (name, price, caterer_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
		$this->db->query($sql, $params);
		
		echo $this->db->affected_rows();
	}
	
	private function _authenticate()
	{
		$query = $this->db->query('SELECT * FROM caterer WHERE email = "' . $this->input->post('email') . '" LIMIT 1');
		$user  = $query->row();
		
		$hashed   = $user->password;
		$password = $this->input->post('password');
		
		if ($this->phpass->check($password, $hashed)) {
			echo 'logged in';
		} else {
			echo 'wrong password 1';
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