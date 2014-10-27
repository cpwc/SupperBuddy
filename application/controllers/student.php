<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function index()
	{
		redirect('/student/login');
	}

	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('usenetid', 'USENET ID', 'required');

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
		$query = $this->db->query('SELECT * FROM student WHERE matric_no = "' . $this->input->post('usenetid') . '" LIMIT 1');
		$user = $query->row();

		if ($user != null) {
		    echo 'logged in';
		} else {
		    redirect('/student/login');
		}
	}

}

/* End of file caterer.php */
/* Location: ./application/controllers/caterer.php */