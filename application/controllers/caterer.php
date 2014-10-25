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
	    if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->_login_submit_validate() === false) {
                $this->login();
                return;
            }
            redirect('/caterer');
        } else {
            redirect('/caterer');
        }
	}

    private function _login_submit_validate()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        //$this->form_validation->set_message('authenticate', 'Invalid email or password. Please try again.');

        return $this->form_validation->run();
    }

    public function authenticate()
    {
        return false;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */