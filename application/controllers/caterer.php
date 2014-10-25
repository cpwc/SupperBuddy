<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caterer extends CI_Controller {

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
			$this->form_validation->set_rules('rpassword', 'Re-type Password', 'required');

			if ($this->form_validation->run() == FALSE) {
				redirect('/caterer/register');
			} else {
				$this->_register();
			}
		} else {
			$this->load->view('caterer_register');
		}
	}

	private function _authenticate()
	{
		$query = $this->db->query('SELECT * FROM caterer WHERE email = "' . $this->input->post('email') . '" LIMIT 1');
		$user = $query->row();

		$hashed = $user->password;
		$password = $this->input->post('password');

		if ($this->phpass->check($password, $hashed)) {
		    echo 'logged in';
		} else {
		    echo 'wrong password 1';
		}
	}

	private function _register()
	{
		return FALSE;
	}

}

/* End of file caterer.php */
/* Location: ./application/controllers/caterer.php */