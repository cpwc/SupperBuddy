<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caterer extends CI_Controller {

	public function index()
	{
		redirect('/student/login');
	}

	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('nussid', 'NUSSID', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) {
				redirect('/student/login');
			} else {
				$this->_authenticate();
			}
		} else {
			$this->load->view('student_login');
		}
	}

	private function _authenticate()
	{
		$query = $this->db->query('SELECT * FROM student WHERE matric_no = "' . $this->input->post('nussid') . '" LIMIT 1');
		$user = $query->row();

		$hashed = $user->password;
		$password = $this->input->post('password');

		if ($this->phpass->check($password, $hashed)) {
		    echo 'logged in';
		} else {
		    echo 'wrong password';
		}
	}

}

/* End of file caterer.php */
/* Location: ./application/controllers/caterer.php */