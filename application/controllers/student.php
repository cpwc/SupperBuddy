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
			redirect('/order');
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

			$success = $user->matric_no;
			$post = $this->input->post('usenetid');

			if($this->phpass->check($post, $success)){

				$session = array(
					'matric_no' => $user->matric_no,
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

}

/* End of file student.php */
/* Location: ./application/controllers/student.php */