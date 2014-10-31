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

			$this->form_validation->set_message('authenticate', 'Invalid login. Please try again.');

			if ($this->form_validation->run() == FALSE) {
				$this->load->vew('student_login');
				return
			}

			redirect('/order');

		} else {
			$this->load->view('student_login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('usenet');
		redirect('/student/login');
	}

	private function authenticate()
	{
		$query = $this->db->query('SELECT * FROM student WHERE matric_no = "' . $this->input->post('usenetid') . '" LIMIT 1');

		if ($query->num_rows() > 0) {
				$user = $query->row();
		
				$this->session->set_userdata('usenet', $user->matric_no);
				return true;
			} else {
				return false;
			}
		}

		return false;
	}

}

/* End of file student.php */
/* Location: ./application/controllers/student.php */