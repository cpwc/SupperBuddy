<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Food extends CI_Controller {

	public function index()
	{
		$sql = "SELECT * FROM `food` WHERE food.caterer_id = 1 ";
		$foods = $this->db->query($sql);

		$data['foods'] = $foods->result();

		$this->load->view('food_view', $data);
	}

	public function create()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('food_name', 'name', 'required');
			$this->form_validation->set_rules('food_price', 'price', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				redirect('/food/create');
			} else {
				$this->_create();
			}
		} else {
			$this->load->view('caterer_food');
		}
	}

	private function _create()
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

}

/* End of file food.php */
/* Location: ./application/controllers/food.php */