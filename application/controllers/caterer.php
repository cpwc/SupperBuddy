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
        $time     = now();
        
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