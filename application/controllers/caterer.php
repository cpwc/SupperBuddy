<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caterer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('caterer_login');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('caterer_login');
		}
		else
		{
			$this->_authenticate();
			//$this->load->view('welcome_message');
		}
	}

	private function _authenticate()
	{
		$query = $this->db->query('SELECT * FROM caterer WHERE email = "' . $this->input->post('email') . '" LIMIT 1');

		$row = $query->row();
		echo $row->name;
	}

}

/* End of file caterer.php */
/* Location: ./application/controllers/caterer.php */